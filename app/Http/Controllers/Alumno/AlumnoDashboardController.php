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

class AlumnoDashboardController extends Controller
{
    // ═══════════════════════════════════════════════════════════════════════════════════════════
    // ALUMNO: DASHBOARD
    // ═══════════════════════════════════════════════════════════════════════════════════════════

    /**
     * Obtener datos del alumno autenticado
     */
    private function getAlumno()
    {
        return Alumno::where('user_id', Auth::id())->firstOrFail();
    }

    /**
     * Mostrar dashboard del alumno con sus notas, inscripción y mensualidades
     */
    public function index()
    {
        $alumno = $this->getAlumno();

        // ─────────────────────────────────────────────────────────────────────────────────
        // Obtener inscripción y notas del alumno
        // ─────────────────────────────────────────────────────────────────────────────────
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

        // ─────────────────────────────────────────────────────────────────────────────────
        // Obtener cursos disponibles si no está inscrito
        // ─────────────────────────────────────────────────────────────────────────────────
        $cursosDisponibles = collect();
        if (!$inscripcion) {
            $cursosDisponibles = Curso::where('activo', true)
                ->where('anio_lectivo', 2026)
                ->get();
        }

        // ─────────────────────────────────────────────────────────────────────────────────
        // Calcular promedio y obtener mensualidades
        // ─────────────────────────────────────────────────────────────────────────────────
        $promedio = $notas->whereNotNull('promedio')->avg('promedio');

        $mensualidades = Mensualidad::where('alumno_id', $alumno->id)
            ->orderBy('mes', 'asc')
            ->get();

        return view('alumno.dashboard', compact(
            'alumno','inscripcion','notas','cursosDisponibles','promedio','mensualidades'
        ));
    }

    /**
     * Inscribir alumno en un curso
     */
    public function inscribirse(Request $request)
    {
        $alumno = $this->getAlumno();

        // ─────────────────────────────────────────────────────────────────────────────────
        // Validar que no esté ya inscrito
        // ─────────────────────────────────────────────────────────────────────────────────
        $yaInscrito = Inscripcion::where('alumno_id', $alumno->id)
            ->where('activa', true)
            ->exists();

        if ($yaInscrito) {
            return back()->with('error', 'Ya estás inscrito en una sección.');
        }

        // ─────────────────────────────────────────────────────────────────────────────────
        // Validar y crear inscripción
        // ─────────────────────────────────────────────────────────────────────────────────
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
