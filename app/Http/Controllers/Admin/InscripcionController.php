<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inscripcion;
use App\Models\Alumno;
use App\Models\Curso;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripcion::with(['alumno', 'curso'])->orderBy('fecha_inscripcion', 'desc')->get();
        $alumnos = Alumno::where('activo', 1)->orderBy('nombre')->get();
        $cursos = Curso::where('activo', 1)->orderBy('nombre')->get();
        $alumnosInscritos = Inscripcion::where('activa', 1)->pluck('alumno_id')->toArray();

        return view('admin.inscripciones', compact('inscripciones', 'alumnos', 'cursos', 'alumnosInscritos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'curso_id' => 'required|exists:cursos,id',
        ]);

        Inscripcion::create([
            'alumno_id' => $request->alumno_id,
            'curso_id' => $request->curso_id,
            'fecha_inscripcion' => now()->toDateString(),
            'activa' => 1,
            'estado' => 'aprobada',
        ]);

        return redirect()->route('admin.inscripciones')->with('success', 'Alumno inscrito correctamente.');
    }

    public function desactivar($id)
    {
        Inscripcion::findOrFail($id)->update(['activa' => 0, 'estado' => 'inactiva']);
        return redirect()->route('admin.inscripciones')->with('success', 'Inscripción desactivada correctamente.');
    }

    public function solicitudes()
    {
        $pendientes = Inscripcion::with(['alumno', 'curso'])
            ->where('estado', 'pendiente')
            ->orderBy('created_at', 'desc')
            ->get();

        $procesadas = Inscripcion::with(['alumno', 'curso'])
            ->whereIn('estado', ['aprobada', 'rechazada'])
            ->where('created_at', '>', now()->subDays(7))
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('admin.solicitudes', compact('pendientes', 'procesadas'));
    }

    public function aprobar($id)
    {
        Inscripcion::findOrFail($id)->update(['estado' => 'aprobada', 'activa' => 1]);
        return back()->with('success', 'Solicitud aprobada correctamente.');
    }

    public function rechazar(Request $request, $id)
    {
        Inscripcion::findOrFail($id)->update(['estado' => 'rechazada', 'activa' => 0, 'observacion' => $request->observacion]);
        return back()->with('success', 'Solicitud rechazada correctamente.');
    }
}