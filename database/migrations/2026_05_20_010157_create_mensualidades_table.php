<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mensualidades', function (Blueprint $table) {
            $table->foreignId('alumno_id')->constrained('alumnos')->onDelete('cascade');
            $table->integer('mes');
            $table->decimal('monto', 10, 2);
            $table->enum('estado', ['Pendiente', 'Pagado'])->default('Pendiente');
            $table->date('fecha_vencimiento');
        });
    }

    public function down(): void
    {
        Schema::table('mensualidades', function (Blueprint $table) {
            $table->dropForeign(['alumno_id']);
            $table->dropColumn(['alumno_id', 'mes', 'monto', 'estado', 'fecha_vencimiento']);
        });
    }
};
