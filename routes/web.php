<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard general: despacha a cada rol hacia su propio panel.
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function (Request $request) {

        /** @var \App\Models\User $usuario */
        $usuario = $request->user();

        return match ($usuario->role) {
            'admin'   => redirect()->route('admin.dashboard'),
            'docente' => redirect()->route('docente.dashboard'),
            'alumno'  => redirect()->route('alumno.dashboard'),
            default   => abort(403, 'Rol no reconocido.'),
        };
    })->name('dashboard');
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
