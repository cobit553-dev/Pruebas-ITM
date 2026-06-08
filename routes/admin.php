<?php

use Illuminate\Support\Facades\Route;

// RUTAS: ADMINISTRADOR

Route::middleware(['auth', 'verified'])->group(function () {

    // ADMINISTRADOR: Dashboard
    Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    // ADMINISTRADOR: Alumnos
    Route::get('/admin/alumnos', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'alumnos'])
        ->name('admin.alumnos');

    // ADMINISTRADOR: Maestros
    Route::get('/admin/maestros', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'maestros'])
        ->name('admin.maestros');

    // ADMINISTRADOR: Materias
    Route::get('/admin/materias', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'materias'])
        ->name('admin.materias');

    // ADMINISTRADOR: Secciones
    Route::get('/admin/secciones', [\App\Http\Controllers\Admin\SeccionController::class, 'index'])
        ->name('admin.secciones');

    Route::get('/admin/secciones/{id}', [\App\Http\Controllers\Admin\SeccionController::class, 'show'])
        ->name('admin.secciones.show');

    Route::get('/admin/secciones/{id}/editar', [\App\Http\Controllers\Admin\SeccionController::class, 'edit'])
        ->name('admin.secciones.edit');

    Route::put('/admin/secciones/{id}', [\App\Http\Controllers\Admin\SeccionController::class, 'update'])
        ->name('admin.secciones.update');

    // ADMINISTRADOR: Encargados
    Route::get('/admin/encargados', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'encargados'])
        ->name('admin.encargados');

    // ADMINISTRADOR: Inscripciones
    Route::get('/admin/inscripciones', [\App\Http\Controllers\Admin\InscripcionController::class, 'index'])
        ->name('admin.inscripciones');
    Route::post('/admin/inscripciones', [\App\Http\Controllers\Admin\InscripcionController::class, 'store'])
        ->name('admin.inscripciones.store');

    // ADMINISTRADOR: Notas
    Route::get('/admin/notas', [\App\Http\Controllers\Admin\NotaController::class, 'index'])
        ->name('admin.notas');
    Route::post('/admin/notas', [\App\Http\Controllers\Admin\NotaController::class, 'store'])
        ->name('admin.notas.store');

    // ADMINISTRADOR: Boletas
    Route::get('/admin/boletas', [\App\Http\Controllers\Admin\BoletaController::class, 'index'])
        ->name('admin.boletas');
    Route::get('/admin/boletas/{alumno_id}', [\App\Http\Controllers\Admin\BoletaController::class, 'show'])
        ->name('admin.boletas.show');

    // ADMINISTRADOR: Mensualidades
    Route::get('/admin/mensualidades', [\App\Http\Controllers\Admin\MensualidadController::class, 'index'])
        ->name('admin.mensualidades');

    // ADMINISTRADOR: Pagos
    Route::get('/admin/pagos', [\App\Http\Controllers\Admin\PagoController::class, 'index'])
        ->name('admin.pagos');

    Route::get('/maestros', [\App\Http\Controllers\Admin\MaestroController::class, 'index'])->name('admin.maestros');
    Route::get('/maestros/{id}', [\App\Http\Controllers\Admin\MaestroController::class, 'show'])->name('admin.maestros.show');
    Route::post('/maestros/{id}/asignar', [\App\Http\Controllers\Admin\MaestroController::class, 'asignar'])->name('admin.maestros.asignar');
    Route::delete('/maestros/{maestro_id}/desasignar/{detalle_id}', [\App\Http\Controllers\Admin\MaestroController::class, 'desasignar'])->name('admin.maestros.desasignar');

});
