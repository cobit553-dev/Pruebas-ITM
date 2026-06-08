<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mensualidad;
use App\Models\Alumno;
use Illuminate\Http\Request;

class MensualidadController extends Controller
{
    public function index()
    {
        $mensualidades = Mensualidad::with(['alumno', 'pagos'])->orderBy('mes', 'desc')->get();
        return view('admin.mensualidades', compact('mensualidades'));
    }
}