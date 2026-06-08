<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use App\Models\Maestro;

class AsistenciaController extends Controller
{
    public function index()
    {
        $maestro = Maestro::where('user_id', auth()->id())->firstOrFail();
        return view('docente.asistencia', compact('maestro'));
    }
}
