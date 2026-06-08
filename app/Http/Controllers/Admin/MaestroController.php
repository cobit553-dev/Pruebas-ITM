<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maestro;
use App\Models\Curso;
use App\Models\Materia;
use App\Models\DetalleCurso;
use Illuminate\Http\Request;

class MaestroController extends Controller
{
    public function index()
    {
        $maestros = Maestro::with('detalleCursos.materia', 'detalleCursos.curso')->get();
        return view('admin.maestros', compact('maestros'));
    }

    public function show($id)
    {
        $maestro  = Maestro::with('detalleCursos.materia', 'detalleCursos.curso')->findOrFail($id);
        $cursos   = Curso::where('activo', 1)->get();
        $materias = Materia::orderBy('nombre')->get();
        return view('admin.maestro-detalle', compact('maestro', 'cursos', 'materias'));
    }

    public function asignar(Request $request, $id)
    {
        DetalleCurso::firstOrCreate([
            'maestro_id' => $id,
            'curso_id'   => $request->curso_id,
            'materia_id' => $request->materia_id,
        ]);
        return redirect()->route('admin.maestros.show', $id)->with('success', 'Asignación realizada correctamente.');
    }

    public function desasignar($maestro_id, $detalle_id)
    {
        DetalleCurso::where('id', $detalle_id)->where('maestro_id', $maestro_id)->delete();
        return redirect()->route('admin.maestros.show', $maestro_id)->with('success', 'Asignación eliminada.');
    }
}
