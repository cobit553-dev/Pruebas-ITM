<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nota extends Model
{
    protected $fillable = [
        'alumno_id', 'detalle_curso_id',
        'laboratorio', 'examen_teorico', 'practica', 'sos',
        'promedio', 'registrado_por'
    ];

    protected $casts = [
        'laboratorio'    => 'float',
        'examen_teorico' => 'float',
        'practica'       => 'float',
        'sos'            => 'float',
    ];

    public function calcularPromedio(): ?int
    {
        $notas = array_filter([
            $this->laboratorio,
            $this->examen_teorico,
            $this->practica,
            $this->sos,
        ], fn($n) => !is_null($n));

        if (empty($notas)) return null;

        return (int) round(array_sum($notas) / count($notas));
    }

    protected static function booted(): void
    {
        static::saving(function (Nota $nota) {
            $nota->promedio = $nota->calcularPromedio();
        });
    }

    public function alumno(): BelongsTo
    {
        return $this->belongsTo(Alumno::class);
    }

    public function detalleCurso(): BelongsTo
    {
        return $this->belongsTo(DetalleCurso::class);
    }

    public function maestro(): BelongsTo
    {
        return $this->belongsTo(Maestro::class, 'registrado_por');
    }
}
