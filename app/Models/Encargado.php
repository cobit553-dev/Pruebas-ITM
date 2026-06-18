<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'dui',
        'email',
        'parentesco',
        'activo',
    ];

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_encargado', 'encargado_id', 'alumno_id')
                    ->withPivot('parentesco')
                    ->withTimestamps();
    }

    public function getNombreCompletoAttribute()
    {
        return $this->nombre . ' ' . $this->apellido;
    }
}
