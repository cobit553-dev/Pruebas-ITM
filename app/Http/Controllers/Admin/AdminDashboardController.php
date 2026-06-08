<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Encargado;
use App\Models\Maestro;
use App\Models\Materia;

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
        return view('admin.alumnos');
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
        $materias = Materia::all();

        return view('admin.materias', compact('materias'));
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
