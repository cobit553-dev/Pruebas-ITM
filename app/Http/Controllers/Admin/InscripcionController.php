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
        $inscripciones = Inscripcion::with(['alumno', 'curso'])->orderBy('created_at', 'desc')->get();
        $alumnos = Alumno::orderBy('nombre')->get();
        $cursos = Curso::where('activo', 1)->orderBy('nombre')->get();
        return view('admin.inscripciones', compact('inscripciones', 'alumnos', 'cursos'));
    }

    public function store(Request $request)
    {
        Inscripcion::create([
            'alumno_id'         => $request->alumno_id,
            'curso_id'          => $request->curso_id,
            'fecha_inscripcion' => now(),
            'activa'            => 1,
        ]);
        return redirect()->route('admin.inscripciones')->with('success', 'Inscripción registrada correctamente.');
    }
}
