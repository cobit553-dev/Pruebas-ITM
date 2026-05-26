<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// ═══════════════════════════════════════════════════════════════════════════════════════════════
// RUTAS: COMÚN
// ═══════════════════════════════════════════════════════════════════════════════════════════════

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

// ═══════════════════════════════════════════════════════════════════════════════════════════════
// IMPORTAR RUTAS POR ROL
// ═══════════════════════════════════════════════════════════════════════════════════════════════

require __DIR__.'/docente.php';
require __DIR__.'/alumno.php';
require __DIR__.'/admin.php';
