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
    // ADMINISTRADOR: Usuarios
    // ─────────────────────────────────────────────────────────────────────────────────────────
    public function usuarios()
    {
        return view('admin.usuarios');
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Cursos
    // ─────────────────────────────────────────────────────────────────────────────────────────
    public function cursos()
    {
        return view('admin.cursos');
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Docentes
    // ─────────────────────────────────────────────────────────────────────────────────────────
    public function docentes()
    {
        return view('admin.docentes');
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Reportes
    // ─────────────────────────────────────────────────────────────────────────────────────────
    public function reportes()
    {
        return view('admin.reportes');
    }
}
