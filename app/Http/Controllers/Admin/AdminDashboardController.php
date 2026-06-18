<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Encargado;
use App\Models\Maestro;
use App\Models\Materia;
use App\Models\Curso;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    // ═══════════════════════════════════════════════════════════════════════════════════════════
    // ADMINISTRADOR: DASHBOARD
    // ═══════════════════════════════════════════════════════════════════════════════════════════

    public function index()
    {
        return view('admin.dashboard');
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Alumnos
    // ─────────────────────────────────────────────────────────────────────────────────────────
    public function alumnos()
    {
        $alumnos = Alumno::with([
            'inscripciones' => fn($q) => $q->where('activa', 1)->with('curso'),
            'user'
        ])->get();

        $cursos       = Curso::where('activo', 1)->orderBy('nombre')->get();
        $totalAlumnos = $alumnos->count();
        $activos      = $alumnos->where('activo', 1)->count();
        $inactivos    = $alumnos->where('activo', 0)->count();

        return view('admin.alumnos', compact('alumnos', 'cursos', 'totalAlumnos', 'activos', 'inactivos'));
    }

    public function storeAlumno(Request $request)
    {
        $request->validate([
            'nombre'           => 'required|string|max:255',
            'apellido'         => 'required|string|max:255',
            'codigo'           => 'required|string|unique:alumnos,codigo',
            'fecha_nacimiento' => 'nullable|date',
            'sexo'             => 'nullable|in:M,F',
            'telefono'         => 'nullable|string|max:20',
            'direccion'        => 'nullable|string|max:255',
            'email'            => 'required|email|unique:users,email',
            'password'         => 'required|min:8|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name'     => $request->nombre . ' ' . $request->apellido,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'alumno',
        ]);

        Alumno::create([
            'user_id'          => $user->id,
            'nombre'           => $request->nombre,
            'apellido'         => $request->apellido,
            'codigo'           => $request->codigo,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero'           => $request->sexo,
            'telefono'         => $request->telefono,
            'direccion'        => $request->direccion,
            'activo'           => 1,
        ]);

        return redirect()->route('admin.alumnos')->with('success', 'Alumno registrado correctamente.');
    }

    public function updateAlumno(Request $request, $id)
    {
        $alumno = Alumno::findOrFail($id);

        $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $alumno->user_id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Actualizar datos del alumno
        $alumno->update([
            'nombre'   => $request->nombre,
            'apellido' => $request->apellido,
        ]);

        // Actualizar email en users
        $alumno->user->update([
            'name'  => $request->nombre . ' ' . $request->apellido,
            'email' => $request->email,
        ]);

        // Actualizar contraseña solo si se ingresó
        if ($request->filled('password')) {
            $alumno->user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        // Actualizar curso si se seleccionó uno
        if ($request->filled('curso_id')) {
            // Desactivar inscripción anterior
            Inscripcion::where('alumno_id', $alumno->id)
                ->where('activa', 1)
                ->update(['activa' => 0, 'estado' => 'inactiva']);

            // Crear nueva inscripción
            Inscripcion::create([
                'alumno_id'         => $alumno->id,
                'curso_id'          => $request->curso_id,
                'fecha_inscripcion' => now()->toDateString(),
                'activa'            => 1,
                'estado'            => 'aprobada',
            ]);
        }

        return redirect()->route('admin.alumnos')->with('success', 'Alumno actualizado correctamente.');
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Maestros
    // ─────────────────────────────────────────────────────────────────────────────────────────
    public function maestros()
    {
        $maestros = Maestro::with('detalleCursos.materia')->get();
        return view('admin.maestros', compact('maestros'));
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Materias
    // ─────────────────────────────────────────────────────────────────────────────────────────
    public function materias()
    {
        $materias = Materia::orderBy('nombre')->get();
        return view('admin.materias', compact('materias'));
    }

    public function storeMateria(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:5|unique:materias,codigo',
            'nombre' => 'required|string|max:255',
        ]);

        Materia::create([
            'codigo' => strtoupper($request->codigo),
            'nombre' => $request->nombre,
            'activa' => 1,
        ]);

        return redirect()->route('admin.materias')->with('success', 'Materia registrada correctamente.');
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Encargados
    // ─────────────────────────────────────────────────────────────────────────────────────────
    public function encargados()
    {
        $encargados = Encargado::with('alumnos')->get();
        return view('admin.encargados', compact('encargados'));
    }
}
