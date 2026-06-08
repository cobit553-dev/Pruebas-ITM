<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Encargado;

class EncargadoController extends Controller
{
    public function index()
    {
        $encargados = Encargado::with('alumnos')->orderBy('nombre')->get();
        return view('admin.encargados', compact('encargados'));
    }
}
