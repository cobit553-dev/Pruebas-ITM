<?php

namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Inscripcion;
use App\Models\Nota;
use App\Models\Mensualidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class AlumnoDashboardController extends Controller
{
    // ═══════════════════════════════════════════════════════════════════════════════════════════
    // PRIVADO: Obtener alumno autenticado
    // ═══════════════════════════════════════════════════════════════════════════════════════════
    private function getAlumno()
    {
        $alumno = Alumno::where('user_id', Auth::id())->first();
        if (!$alumno) {
            abort(403, 'Acceso no autorizado para este rol.');
        }
        return $alumno;
    }

    // ═══════════════════════════════════════════════════════════════════════════════════════════
    // DASHBOARD
    // ═══════════════════════════════════════════════════════════════════════════════════════════
    public function index()
    {
        $alumno = $this->getAlumno();

        $inscripcion = Inscripcion::with('curso')
            ->where('alumno_id', $alumno->id)
            ->where('activa', true)
            ->first();

        $notas = collect();
        if ($inscripcion) {
            $notas = Nota::with(['detalleCurso.materia', 'detalleCurso.maestro'])
                ->where('alumno_id', $alumno->id)
                ->whereHas('detalleCurso', fn($q) => $q->where('curso_id', $inscripcion->curso_id))
                ->get();
        }

        $cursosDisponibles = collect();
        if (!$inscripcion) {
            $cursosDisponibles = Curso::where('activo', true)
                ->where('anio_lectivo', (int) now()->year)
                ->get();
        }

        $promedio = $notas->whereNotNull('promedio')->avg('promedio');

        $mensualidades = Mensualidad::where('alumno_id', $alumno->id)
            ->orderBy('mes', 'asc')
            ->get();

        return view('alumno.dashboard', compact(
            'alumno', 'inscripcion', 'notas', 'cursosDisponibles', 'promedio', 'mensualidades'
        ));
    }

    // ═══════════════════════════════════════════════════════════════════════════════════════════
    // INSCRIPCIÓN
    // ═══════════════════════════════════════════════════════════════════════════════════════════
    public function inscripcion()
    {
        $alumno = $this->getAlumno();

        $inscripcion = Inscripcion::with('curso')
            ->where('alumno_id', $alumno->id)
            ->whereIn('estado', ['pendiente', 'aprobada'])
            ->latest()
            ->first();

        $cursosDisponibles = collect();
        if (!$inscripcion) {
            $cursosDisponibles = Curso::where('activo', true)
                ->where('anio_lectivo', (int) now()->year)
                ->get();
        }

        return view('alumno.inscripcion', compact('alumno', 'inscripcion', 'cursosDisponibles'));
    }

    // ═══════════════════════════════════════════════════════════════════════════════════════════
    // ENVIAR SOLICITUD CON FORMULARIO DIGITAL + FIRMA + PDF AUTOMÁTICO
    // ═══════════════════════════════════════════════════════════════════════════════════════════
    public function enviarSolicitud(Request $request)
    {
        $alumno = $this->getAlumno();

        $request->validate([
            'curso_id'             => 'required|exists:cursos,id',
            'encargado_nombre'     => 'required|string|max:255',
            'encargado_parentesco' => 'required|string|max:50',
            'firma_alumno'         => 'required|string',
            'firma_encargado'      => 'required|string',
        ]);

        // Verificar que no tenga solicitud activa o pendiente
        $existente = Inscripcion::where('alumno_id', $alumno->id)
            ->whereIn('estado', ['pendiente', 'aprobada'])
            ->first();

        if ($existente) {
            return back()->with('error', 'Ya tienes una solicitud pendiente o inscripción activa.');
        }

        $curso = Curso::findOrFail($request->curso_id);

        // Generar PDF con datos y firmas digitales
        $pdf = Pdf::loadView('alumno.pdf.solicitud-inscripcion', [
            'alumno'               => $alumno,
            'curso'                => $curso,
            'cursosDisponibles'    => collect([$curso]),
            'encargado_nombre'     => $request->encargado_nombre,
            'encargado_telefono'   => $request->encargado_telefono,
            'encargado_parentesco' => $request->encargado_parentesco,
            'encargado_dui'        => $request->encargado_dui,
            'firma_alumno'         => $request->firma_alumno,
            'firma_encargado'      => $request->firma_encargado,
            'fecha'                => now(),
        ])->setPaper('a4', 'portrait');

        // Guardar PDF en storage
        $filename = 'solicitudes/solicitud-' . $alumno->codigo . '-' . time() . '.pdf';
        Storage::disk('public')->put($filename, $pdf->output());

        // Crear inscripción en estado pendiente
        Inscripcion::create([
            'alumno_id'         => $alumno->id,
            'curso_id'          => $request->curso_id,
            'fecha_inscripcion' => now()->toDateString(),
            'activa'            => false,
            'estado'            => 'pendiente',
            'documento_path'    => $filename,
            'observacion'       => json_encode([
                'encargado_nombre'     => $request->encargado_nombre,
                'encargado_telefono'   => $request->encargado_telefono ?? '—',
                'encargado_parentesco' => $request->encargado_parentesco,
                'encargado_dui'        => $request->encargado_dui ?? '—',
            ]),
        ]);

        return back()->with('success', '¡Solicitud enviada correctamente! El administrador la revisará pronto.');
    }

    // ═══════════════════════════════════════════════════════════════════════════════════════════
    // NOTAS
    // ═══════════════════════════════════════════════════════════════════════════════════════════
    public function notas()
    {
        $alumno = $this->getAlumno();

        $inscripcion = Inscripcion::with('curso')
            ->where('alumno_id', $alumno->id)
            ->where('activa', true)
            ->first();

        $notas = collect();
        if ($inscripcion) {
            $notas = Nota::with(['detalleCurso.materia', 'detalleCurso.maestro'])
                ->where('alumno_id', $alumno->id)
                ->whereHas('detalleCurso', fn($q) => $q->where('curso_id', $inscripcion->curso_id))
                ->get();
        }

        $promedio = $notas->whereNotNull('promedio')->avg('promedio');

        return view('alumno.notas', compact('alumno', 'inscripcion', 'notas', 'promedio'));
    }

    // ═══════════════════════════════════════════════════════════════════════════════════════════
    // PAGOS
    // ═══════════════════════════════════════════════════════════════════════════════════════════
    public function pagos()
    {
        $alumno = $this->getAlumno();

        $mensualidades = Mensualidad::where('alumno_id', $alumno->id)
            ->orderBy('mes', 'asc')
            ->get();

        return view('alumno.pagos', compact('alumno', 'mensualidades'));
    }

    // ═══════════════════════════════════════════════════════════════════════════════════════════
    // INSCRIBIRSE DIRECTO (método anterior — ya no se usa con el nuevo flujo)
    // ═══════════════════════════════════════════════════════════════════════════════════════════
    public function inscribirse(Request $request)
    {
        $alumno = $this->getAlumno();

        $yaInscrito = Inscripcion::where('alumno_id', $alumno->id)
            ->where('activa', true)
            ->exists();

        if ($yaInscrito) {
            return back()->with('error', 'Ya estás inscrito en una sección.');
        }

        $request->validate(['curso_id' => 'required|exists:cursos,id']);

        Inscripcion::create([
            'alumno_id'         => $alumno->id,
            'curso_id'          => $request->curso_id,
            'fecha_inscripcion' => now()->toDateString(),
            'activa'            => true,
            'estado'            => 'aprobada',
        ]);

        return back()->with('success', '¡Inscripción realizada correctamente!');
    }

    // ═══════════════════════════════════════════════════════════════════════════════════════════
    // DESCARGAR PDF (método anterior)
    // ═══════════════════════════════════════════════════════════════════════════════════════════
    public function descargarPdf()
    {
        $alumno            = $this->getAlumno();
        $cursosDisponibles = Curso::where('activo', true)->where('anio_lectivo', 2026)->get();

        $pdf = Pdf::loadView('alumno.pdf.solicitud-inscripcion', compact('alumno', 'cursosDisponibles'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('solicitud-inscripcion-' . $alumno->codigo . '.pdf');
    }

    // ═══════════════════════════════════════════════════════════════════════════════════════════
    // SUBIR DOCUMENTO (método anterior)
    // ═══════════════════════════════════════════════════════════════════════════════════════════
    public function subirDocumento(Request $request)
    {
        $alumno = $this->getAlumno();

        $request->validate([
            'curso_id'  => 'required|exists:cursos,id',
            'documento' => 'required|file|mimes:pdf|max:5120',
        ]);

        $existente = Inscripcion::where('alumno_id', $alumno->id)
            ->whereIn('estado', ['pendiente', 'aprobada'])
            ->first();

        if ($existente) {
            return back()->with('error', 'Ya tienes una solicitud pendiente o inscripción activa.');
        }

        $path = $request->file('documento')->store('solicitudes', 'public');

        Inscripcion::create([
            'alumno_id'         => $alumno->id,
            'curso_id'          => $request->curso_id,
            'fecha_inscripcion' => now()->toDateString(),
            'activa'            => false,
            'estado'            => 'pendiente',
            'documento_path'    => $path,
        ]);

        return back()->with('success', 'Solicitud enviada correctamente. El administrador la revisará pronto.');
    }
}
