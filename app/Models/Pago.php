<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';

    protected $fillable = [
        'mensualidad_id',
        'fecha_pago',
        'monto_pagado',
        'observacion',
    ];

    public function mensualidad()
    {
        return $this->belongsTo(Mensualidad::class);
    }
}
