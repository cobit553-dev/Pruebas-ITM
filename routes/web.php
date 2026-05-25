<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ── Docente: registro de notas ──────────────────────────────────────────────
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/docente/notas', [\App\Http\Controllers\NotasDocenteController::class, 'index'])
        ->name('docente.notas');
    Route::post('/docente/notas/guardar', [\App\Http\Controllers\NotasDocenteController::class, 'guardar'])
        ->name('docente.notas.guardar');
});
// ── Alumno: dashboard ───────────────────────────────────────────────────────
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/alumno/dashboard', [\App\Http\Controllers\AlumnoDashboardController::class, 'index'])
        ->name('alumno.dashboard');
    Route::post('/alumno/inscribirse', [\App\Http\Controllers\AlumnoDashboardController::class, 'inscribirse'])
        ->name('alumno.inscribirse');
});
