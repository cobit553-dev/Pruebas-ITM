<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Barryvdh\DomPDF\Facade\Pdf;

class BoletaController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::with(['notas.detalleCurso.materia', 'inscripciones.curso'])->get();
        return view('admin.boletas', compact('alumnos'));
    }

    public function show($alumno_id)
    {
        $alumno = Alumno::with([
            'notas.detalleCurso.materia',
            'notas.detalleCurso.maestro',
            'inscripciones.curso',
        ])->findOrFail($alumno_id);

        $promedio_general = $alumno->notas->avg('promedio');
        return view('admin.boleta-detalle', compact('alumno', 'promedio_general'));
    }

    public function generarPdf($alumno_id)
    {
        $alumno = Alumno::with([
            'notas.detalleCurso.materia',
            'notas.detalleCurso.maestro',
            'inscripciones.curso',
        ])->findOrFail($alumno_id);

        $promedio_general = $alumno->notas->whereNotNull('promedio')->avg('promedio');

        // Concepto según promedio
        $concepto = function($p) {
            if ($p >= 9)  return 'E';
            if ($p >= 8)  return 'MB';
            if ($p >= 7)  return 'B';
            if ($p >= 6)  return 'R';
            return 'D';
        };

        $pdf = Pdf::loadView('admin.pdf.boleta', compact('alumno', 'promedio_general', 'concepto'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('boleta-' . $alumno->codigo . '-' . now()->year . '.pdf');
    }
}
