<?php

use Illuminate\Support\Facades\Route;

// ═══════════════════════════════════════════════════════════════════════════════════════════════
// RUTAS: ADMINISTRADOR
// ═══════════════════════════════════════════════════════════════════════════════════════════════

Route::middleware(['auth', 'verified'])->group(function () {

    // ──────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Dashboard
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    // ──────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Usuarios
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::get('/admin/usuarios', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'usuarios'])
        ->name('admin.usuarios');

    // ──────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Cursos
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::get('/admin/cursos', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'cursos'])
        ->name('admin.cursos');

    // ──────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Docentes
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::get('/admin/docentes', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'docentes'])
        ->name('admin.docentes');

    // ──────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Reportes
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::get('/admin/reportes', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'reportes'])
        ->name('admin.reportes');

});
