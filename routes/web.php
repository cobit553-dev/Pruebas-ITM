<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// ─────────────────────────────────────────────
// RUTAS: COMÚNES
// ─────────────────────────────────────────────
Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard alumno
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Alumno\AlumnoDashboardController::class, 'index'])->name('dashboard');
});

// Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/docente.php';
require __DIR__.'/alumno.php';
require __DIR__.'/admin.php';
