<?php

use Illuminate\Support\Facades\Route;

// RUTAS: DOCENTE

Route::middleware(['auth', 'verified'])->group(function () {

    // DOCENTE: Dashboard
    Route::get('/docente/dashboard', [\App\Http\Controllers\Docente\DocenteDashboardController::class, 'index'])
        ->name('docente.dashboard');

    // DOCENTE: Registro de Notas
    Route::get('/docente/notas', [\App\Http\Controllers\Docente\NotasController::class, 'index'])
        ->name('docente.notas');
    Route::post('/docente/notas/guardar', [\App\Http\Controllers\Docente\NotasController::class, 'guardar'])
        ->name('docente.notas.guardar');
        Route::get('/docente/asistencia', [\App\Http\Controllers\Docente\AsistenciaController::class, 'index'])->name('docente.asistencia');

});
