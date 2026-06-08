<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nota;
use App\Models\Alumno;
use App\Models\DetalleCurso;
use App\Models\Curso;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index()
    {
        $cursos = Curso::with('detalleCursos.materia')->where('activo', 1)->get();
        $notas  = Nota::with(['alumno', 'detalleCurso.materia', 'detalleCurso.maestro'])->get();
        return view('admin.notas', compact('cursos', 'notas'));
    }

    public function store(Request $request)
    {
        $nota = Nota::updateOrCreate(
            ['alumno_id' => $request->alumno_id, 'detalle_curso_id' => $request->detalle_curso_id],
            [
                'laboratorio'    => $request->laboratorio,
                'examen_teorico' => $request->examen_teorico,
                'practica'       => $request->practica,
                'sos'            => $request->sos,
                'registrado_por' => auth()->id(),
            ]
        );
        return redirect()->route('admin.notas')->with('success', 'Nota guardada correctamente.');
    }
}
