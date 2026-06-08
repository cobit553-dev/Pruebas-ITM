<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Nota;
use App\Models\Curso;

class BoletaController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::with(['notas.detalleCurso.materia', 'inscripciones.curso'])->get();
        return view('admin.boletas', compact('alumnos'));
    }

    public function show($alumno_id)
    {
        $alumno = Alumno::with([
            'notas.detalleCurso.materia',
            'notas.detalleCurso.maestro',
            'inscripciones.curso',
        ])->findOrFail($alumno_id);

        $promedio_general = $alumno->notas->avg('promedio');
        return view('admin.boleta-detalle', compact('alumno', 'promedio_general'));
    }
}
