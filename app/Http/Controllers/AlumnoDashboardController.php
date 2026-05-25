<?php
namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Inscripcion;
use App\Models\Nota;
use App\Models\Mensualidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumnoDashboardController extends Controller
{
    private function getAlumno() {
        return Alumno::where('user_id', Auth::id())->firstOrFail();
    }

    public function index() {
        $alumno = $this->getAlumno();

        $inscripcion = Inscripcion::with('curso')
            ->where('alumno_id', $alumno->id)
            ->where('activa', true)
            ->first();

        $notas = collect();
        if ($inscripcion) {
            $notas = Nota::with(['detalleCurso.materia','detalleCurso.maestro'])
                ->where('alumno_id', $alumno->id)
                ->whereHas('detalleCurso', fn($q) => $q->where('curso_id', $inscripcion->curso_id))
                ->get();
        }

        $cursosDisponibles = collect();
        if (!$inscripcion) {
            $cursosDisponibles = Curso::where('activo', true)
                ->where('anio_lectivo', 2026)
                ->get();
        }

        $promedio = $notas->whereNotNull('promedio')->avg('promedio');

        $mensualidades = Mensualidad::where('alumno_id', $alumno->id)
            ->orderBy('mes', 'asc')
            ->get();

        return view('alumno.dashboard', compact(
            'alumno','inscripcion','notas','cursosDisponibles','promedio','mensualidades'
        ));
    }

    public function inscribirse(Request $request) {
        $alumno = $this->getAlumno();

        $yaInscrito = Inscripcion::where('alumno_id', $alumno->id)->where('activa', true)->exists();
        if ($yaInscrito) {
            return back()->with('error', 'Ya estás inscrito en una sección.');
        }

        $request->validate(['curso_id' => 'required|exists:cursos,id']);

        Inscripcion::create([
            'alumno_id'         => $alumno->id,
            'curso_id'          => $request->curso_id,
            'fecha_inscripcion' => now()->toDateString(),
            'activa'            => true,
        ]);

        return back()->with('success', '¡Inscripción realizada correctamente!');
    }
}
