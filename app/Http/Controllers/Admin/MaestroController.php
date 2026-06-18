<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maestro;
use App\Models\Curso;
use App\Models\Materia;
use App\Models\DetalleCurso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MaestroController extends Controller
{
    public function index()
    {
        $maestros = Maestro::with('detalleCursos.materia', 'detalleCursos.curso')->get();
        return view('admin.maestros', compact('maestros'));
    }

    public function show($id)
    {
        $maestro   = Maestro::with('detalleCursos.materia', 'detalleCursos.curso')->findOrFail($id);
        $maestros  = Maestro::with('detalleCursos.materia')->get();
        $cursos    = Curso::where('activo', 1)->get();
        $materias  = Materia::orderBy('nombre')->get();
        $totalMaestros = Maestro::count();
        return view('admin.maestro-detalle', compact('maestro', 'maestros', 'cursos', 'materias', 'totalMaestros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'codigo' => 'required|string|unique:maestros,codigo',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->nombre . ' ' . $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'maestro',
        ]);

        Maestro::create([
            'user_id' => $user->id,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'codigo' => $request->codigo,
            'activo' => true,
        ]);

        return redirect()->route('admin.maestros')->with('success', 'Maestro registrado correctamente.');
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
