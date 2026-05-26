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
    // ADMINISTRADOR: Alumnos
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::get('/admin/alumnos', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'alumnos'])
        ->name('admin.alumnos');

    // ──────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Maestros
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::get('/admin/maestros', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'maestros'])
        ->name('admin.maestros');

    // ──────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Materias
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::get('/admin/materias', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'materias'])
        ->name('admin.materias');

    // ──────────────────────────────────────────────────────────────────────────────────────
    // ADMINISTRADOR: Secciones
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::get('/admin/secciones', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'secciones'])
        ->name('admin.secciones');

});
