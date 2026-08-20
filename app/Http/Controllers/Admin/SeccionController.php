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
        return view('admin.cursos', compact('cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'seccion' => 'required|string|max:2',
            'nivel' => 'required|string|in:Matutino,Vespertino',
            'anio_lectivo' => 'required|integer|min:2020|max:2099',
            'activo' => 'sometimes|boolean',
        ]);

        Curso::create([
            'nombre' => $request->nombre,
            'seccion' => strtoupper($request->seccion),
            'nivel' => $request->nivel,
            'anio_lectivo' => $request->anio_lectivo,
            'activo' => $request->filled('activo') ? 1 : 0,
        ]);

        return redirect()->route('admin.cursos')->with('success', 'Curso registrado correctamente.');
    }

    public function show($id)
    {
        $curso = Curso::with([
            'inscripciones.alumno',
            'detalleCursos.materia',
            'detalleCursos.maestro',
        ])->findOrFail($id);

        return view('admin.curso-detalle', compact('curso'));
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view('admin.curso-editar', compact('curso'));
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->update($request->only(['nombre', 'nivel', 'seccion', 'anio_lectivo', 'activo']));
        return redirect()->route('admin.cursos')->with('success', 'Curso actualizado correctamente.');
    }
}
