<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Alumno extends Model
{
    protected $fillable = ['user_id', 'nombre', 'apellido', 'codigo', 'fecha_nacimiento', 'dui', 'genero', 'telefono', 'direccion', 'activo'];

    public function getNombreCompletoAttribute(): string
    {
        return "{$this->nombre} {$this->apellido}";
    }

    // ¿El alumno es mayor de edad? (basado en fecha de nacimiento)
    public function getEsMayorDeEdadAttribute(): bool
    {
        if (! $this->fecha_nacimiento) {
            return false;
        }

        return \Carbon\Carbon::parse($this->fecha_nacimiento)->age >= 18;
    }

    public function inscripciones(): HasMany
    {
        return $this->hasMany(Inscripcion::class);
    }

    public function notas(): HasMany
    {
        return $this->hasMany(Nota::class);
    }

    public function cursos(): BelongsToMany
    {
        return $this->belongsToMany(Curso::class, 'inscripciones');
    }

    public function encargados(): BelongsToMany
    {
        return $this->belongsToMany(Encargado::class, 'alumno_encargado', 'alumno_id', 'encargado_id')
                    ->withPivot('parentesco')
                    ->withTimestamps();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
