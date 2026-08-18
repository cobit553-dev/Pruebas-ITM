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
        $maestros = Maestro::with('detalleCursos.materia', 'detalleCursos.curso', 'user')->get();
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

    private function generarCodigoMaestro(string $nombre, string $apellido): string
    {
        $limpiar = function (string $texto): string {
            $texto = trim($texto);
            $texto = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $texto) ?: $texto;
            $texto = preg_replace('/[^a-zA-Z\s]/', '', $texto);
            return $texto;
        };

        $nombreLimpio   = $limpiar($nombre);
        $apellidoLimpio = $limpiar($apellido);

        $palabrasNombre   = array_values(array_filter(explode(' ', $nombreLimpio)));
        $palabrasApellido = array_values(array_filter(explode(' ', $apellidoLimpio)));

        $iniciales = '';
        foreach (array_slice($palabrasNombre, 0, 2) as $p) {
            $iniciales .= strtoupper($p[0] ?? '');
        }
        foreach (array_slice($palabrasApellido, 0, 2) as $p) {
            $iniciales .= strtoupper($p[0] ?? '');
        }

        $max = Maestro::where('codigo', 'like', $iniciales . '%')->max('codigo');
        $numero = 1;
        if ($max) {
            $numStr = preg_replace('/[^0-9]/', '', $max);
            $numero = (int) $numStr + 1;
        }

        return $iniciales . str_pad((string) $numero, 3, '0', STR_PAD_LEFT);
    }

    public function siguienteCodigoMaestro(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        $codigo = $this->generarCodigoMaestro($request->nombre, $request->apellido);

        return response()->json([
            'codigo' => $codigo,
            'email'  => strtolower($codigo) . '@itm.edu.sv',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $codigo = $this->generarCodigoMaestro($request->nombre, $request->apellido);

        $user = User::create([
            'name' => $request->nombre . ' ' . $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'docente',
        ]);

        Maestro::create([
            'user_id' => $user->id,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'codigo' => $codigo,
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

    public function update(Request $request, $id)
    {
        $maestro = Maestro::findOrFail($id);
        $user = $maestro->user;

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'codigo' => 'required|string|unique:maestros,codigo,' . $maestro->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->nombre . ' ' . $request->apellido,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        $maestro->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'codigo' => $request->codigo,
        ]);

        return redirect()->route('admin.maestros')->with('success', 'Maestro actualizado correctamente.');
    }
}
