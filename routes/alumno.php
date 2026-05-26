<?php

use Illuminate\Support\Facades\Route;

// ═══════════════════════════════════════════════════════════════════════════════════════════════
// RUTAS: ALUMNO
// ═══════════════════════════════════════════════════════════════════════════════════════════════

Route::middleware(['auth', 'verified'])->group(function () {

    // ──────────────────────────────────────────────────────────────────────────────────────
    // ALUMNO: Dashboard
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::get('/alumno/dashboard', [\App\Http\Controllers\Alumno\AlumnoDashboardController::class, 'index'])
        ->name('alumno.dashboard');

    // ──────────────────────────────────────────────────────────────────────────────────────
    // ALUMNO: Inscripción
    // ──────────────────────────────────────────────────────────────────────────────────────
    Route::post('/alumno/inscribirse', [\App\Http\Controllers\Alumno\AlumnoDashboardController::class, 'inscribirse'])
        ->name('alumno.inscribirse');

});
