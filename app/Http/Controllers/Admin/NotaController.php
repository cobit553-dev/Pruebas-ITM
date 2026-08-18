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
        $request->validate([
            'alumno_id'        => 'required|exists:alumnos,id',
            'detalle_curso_id' => 'required|exists:detalle_cursos,id',
            'laboratorio'      => 'nullable|numeric|min:0|max:10',
            'examen_teorico'   => 'nullable|numeric|min:0|max:10',
            'practica'         => 'nullable|numeric|min:0|max:10',
            'sos'              => 'nullable|numeric|min:0|max:10',
            'conducta'         => 'nullable|string|max:2',
        ]);

        $nota = Nota::updateOrCreate(
            ['alumno_id' => $request->alumno_id, 'detalle_curso_id' => $request->detalle_curso_id],
            [
                'laboratorio'    => $request->laboratorio,
                'examen_teorico' => $request->examen_teorico,
                'practica'       => $request->practica,
                'sos'            => $request->sos,
                'conducta'       => $request->conducta,
                'registrado_por' => auth()->id(),
            ]
        );
        return redirect()->route('admin.notas')->with('success', 'Nota guardada correctamente.');
    }
}
