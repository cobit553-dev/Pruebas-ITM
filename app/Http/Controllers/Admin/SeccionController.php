<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function index()
    {
        $cursos = Curso::withCount('inscripciones')->orderBy('seccion')->get();
        return view('admin.secciones', compact('cursos'));
    }

    public function show($id)
    {
        $curso = Curso::with([
            'inscripciones.alumno',
            'detalleCursos.materia',
            'detalleCursos.maestro',
        ])->findOrFail($id);

        return view('admin.seccion-detalle', compact('curso'));
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view('admin.seccion-editar', compact('curso'));
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->update($request->only(['nombre', 'nivel', 'seccion', 'anio_lectivo', 'activo']));
        return redirect()->route('admin.secciones')->with('success', 'Sección actualizada correctamente.');
    }
}
