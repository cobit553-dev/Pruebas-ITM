<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mensualidad;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Pago;
use App\Models\Inscripcion;
use Illuminate\Http\Request;

class MensualidadController extends Controller
{
    private array $meses = [
        '01' => 'Enero',   '02' => 'Febrero', '03' => 'Marzo',
        '04' => 'Abril',   '05' => 'Mayo',     '06' => 'Junio',
        '07' => 'Julio',   '08' => 'Agosto',   '09' => 'Septiembre',
        '10' => 'Octubre', '11' => 'Noviembre','12' => 'Diciembre',
    ];

    public function index()
    {
        $cursos = Curso::where('activo', 1)
            ->with(['inscripciones' => fn($q) => $q
                ->where('activa', 1)
                ->where('estado', 'aprobada')
                ->with('alumno')
            ])
            ->orderBy('nombre')
            ->get();

        $totalPendiente = Mensualidad::where('estado', 'Pendiente')->sum('monto');
        $totalPagado    = Mensualidad::where('estado', 'Pagado')->sum('monto');
        $totalAlumnos   = Inscripcion::where('activa', 1)
                            ->where('estado', 'aprobada')
                            ->distinct('alumno_id')
                            ->count('alumno_id');

        return view('admin.mensualidades', compact(
            'cursos', 'totalPendiente', 'totalPagado', 'totalAlumnos'
        ) + ['meses' => $this->meses]);
    }

    public function generar(Request $request)
    {
        $request->validate([
            'mes'       => ['required', 'string', 'in:' . implode(',', $this->meses)],
            'tipo'      => ['required', 'in:todos,uno'],
            'alumno_id' => ['required_if:tipo,uno', 'exists:alumnos,id'],
        ]);

        $nombreMes = $request->mes;
        $numMes    = array_search($nombreMes, $this->meses, true);

        $query = Inscripcion::where('activa', 1)->where('estado', 'aprobada')->with('alumno');

        if ($request->tipo === 'uno') {
            $query->where('alumno_id', $request->alumno_id);
        }

        $inscripciones = $query->get()->unique('alumno_id');

        $generadas = 0;
        $omitidas  = 0;

        foreach($inscripciones as $ins) {
            $existe = Mensualidad::where('alumno_id', $ins->alumno_id)
                ->where('mes', $nombreMes)
                ->exists();

            if (!$existe) {
                try {
                    Mensualidad::create([
                        'alumno_id'         => $ins->alumno_id,
                        'curso_id'          => $ins->curso_id,
                        'mes'               => $nombreMes,
                        'monto'             => 25.00,
                        'estado'            => 'Pendiente',
                        'fecha_vencimiento' => now()
                            ->setMonth((int) $numMes)
                            ->endOfMonth()
                            ->toDateString(),
                    ]);
                    $generadas++;
                } catch (\Exception $e) {
                    $omitidas++;
                }
            } else {
                $omitidas++;
            }
        }

        $msg = "Se generaron {$generadas} mensualidades para {$nombreMes}.";
        if ($omitidas > 0) {
            $msg .= " {$omitidas} alumno(s) ya tenían mensualidad para este mes.";
        }

        return redirect()->route('admin.mensualidades')->with('success', $msg);
    }

    public function pagar(Request $request, $id)
    {
        $mensualidad = Mensualidad::findOrFail($id);

        if ($mensualidad->estado === 'Pagado') {
            return redirect()->back()->with('error', 'Esta mensualidad ya fue pagada.');
        }

        Pago::create([
            'mensualidad_id' => $mensualidad->id,
            'fecha_pago'     => now()->toDateString(),
            'monto_pagado'   => $mensualidad->monto,
            'observacion'    => $request->observacion,
        ]);

        $mensualidad->update(['estado' => 'Pagado']);

        return redirect()->back()->with('success', 'Pago de $' . number_format($mensualidad->monto, 2) . ' registrado correctamente.');
    }

    // ═══════════════════════════════════════════════════════════════
    // REVERTIR PAGO
    // ═══════════════════════════════════════════════════════════════
    public function revertir($id)
    {
        $mensualidad = Mensualidad::findOrFail($id);

        if ($mensualidad->estado !== 'Pagado') {
            return redirect()->back()->with('error', 'Esta mensualidad no está pagada.');
        }

        // Eliminar el pago asociado
        Pago::where('mensualidad_id', $mensualidad->id)->delete();

        // Revertir estado a Pendiente
        $mensualidad->update(['estado' => 'Pendiente']);

        return redirect()->back()->with('success', 'Pago revertido correctamente. La mensualidad volvió a estado Pendiente.');
    }
}
