<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materia extends Model
{
    protected $fillable = ['nombre', 'codigo', 'descripcion', 'activa'];

    public function detalleCursos(): HasMany
    {
        return $this->hasMany(DetalleCurso::class);
    }
}
