<?php

namespace App\Listeners;

use App\Models\Alumno;
use Illuminate\Auth\Events\Registered;

class CreateAlumnoProfile
{
    public function handle(Registered $event): void
    {
        Alumno::firstOrCreate(
            ['user_id' => $event->user->id],
            [
                'nombre' => $event->user->name,
                'apellido' => '',
                'codigo' => 'A' . str_pad($event->user->id, 4, '0', STR_PAD_LEFT),
                'activo' => true,
            ]
        );
    }
}
