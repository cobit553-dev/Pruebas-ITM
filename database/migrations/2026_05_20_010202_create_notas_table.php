<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumno_id')->constrained('alumnos')->onDelete('cascade');
            $table->foreignId('detalle_curso_id')->constrained('detalle_cursos')->onDelete('cascade');

            $table->decimal('laboratorio', 4, 2)->nullable();
            $table->decimal('examen_teorico', 4, 2)->nullable();
            $table->decimal('practica', 4, 2)->nullable();
            $table->decimal('sos', 4, 2)->nullable();

            $table->tinyInteger('promedio')->nullable();

            $table->foreignId('registrado_por')->constrained('maestros')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['alumno_id', 'detalle_curso_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
