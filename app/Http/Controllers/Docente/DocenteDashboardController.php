<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use App\Models\Maestro;
use App\Models\DetalleCurso;
use Illuminate\Support\Facades\Auth;

class DocenteDashboardController extends Controller
{
    // ═══════════════════════════════════════════════════════════════════════════════════════════
    // DOCENTE: DASHBOARD
    // ═══════════════════════════════════════════════════════════════════════════════════════════

    public function index()
    {
        $docente = Maestro::where('user_id', Auth::id())->firstOrFail();

        $cursos = DetalleCurso::with('curso', 'materia')
            ->where('maestro_id', $docente->id)
            ->get()
            ->groupBy('curso_id');

        return view('docente.dashboard', compact('docente', 'cursos'));
    }
}
