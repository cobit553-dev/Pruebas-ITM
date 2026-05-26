<?php

use Illuminate\Support\Facades\Route;

// ═══════════════════════════════════════════════════════════════════════════════════════════════
// RUTAS: ALUMNO
// ═══════════════════════════════════════════════════════════════════════════════════════════════

Route::middleware(['auth', 'verified'])->group(function () {

    // ──────────────────────────────────────────────────────────────────────────────────────
    // ALUMNO: Dashboard / Inicio
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::get('/alumno/dashboard', [\App\Http\Controllers\Alumno\AlumnoDashboardController::class, 'index'])
        ->name('alumno.dashboard');

    // ──────────────────────────────────────────────────────────────────────────────────────
    // ALUMNO: Inscripción
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::get('/alumno/inscripcion', [\App\Http\Controllers\Alumno\AlumnoDashboardController::class, 'inscripcion'])
        ->name('alumno.inscripcion');

    Route::post('/alumno/inscribirse', [\App\Http\Controllers\Alumno\AlumnoDashboardController::class, 'inscribirse'])
        ->name('alumno.inscribirse');

    // ──────────────────────────────────────────────────────────────────────────────────────
    // ALUMNO: Mis Notas
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::get('/alumno/notas', [\App\Http\Controllers\Alumno\AlumnoDashboardController::class, 'notas'])
        ->name('alumno.notas');

    // ──────────────────────────────────────────────────────────────────────────────────────
    // ALUMNO: Estado de Pagos
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::get('/alumno/pagos', [\App\Http\Controllers\Alumno\AlumnoDashboardController::class, 'pagos'])
        ->name('alumno.pagos');

});
