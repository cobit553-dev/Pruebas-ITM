<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_cursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
            $table->foreignId('maestro_id')->constrained('maestros')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['curso_id', 'materia_id']); // una materia solo 1 vez por curso
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_cursos');
    }
};
