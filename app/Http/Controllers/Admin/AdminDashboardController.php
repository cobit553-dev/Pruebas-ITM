<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.maestros');
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Materias
    // ─────────────────────────────────────────────────────────────────────────────────────────
    public function materias()
    {
        return view('admin.materias');
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Secciones
    // ─────────────────────────────────────────────────────────────────────────────────────────
    public function secciones()
    {
        return view('admin.secciones');
    }
}
