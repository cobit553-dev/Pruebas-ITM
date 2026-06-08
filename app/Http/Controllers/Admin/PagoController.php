<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pago;
use App\Models\Mensualidad;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with(['mensualidad.alumno'])->orderBy('fecha_pago', 'desc')->get();
        return view('admin.pagos', compact('pagos'));
    }
}