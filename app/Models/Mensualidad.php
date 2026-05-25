<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensualidad extends Model
{
    protected $table = 'mensualidades'; // ← esto le dice el nombre real

    protected $fillable = [
        'alumno_id',
        'mes',
        'monto',
        'estado',
        'fecha_vencimiento',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
