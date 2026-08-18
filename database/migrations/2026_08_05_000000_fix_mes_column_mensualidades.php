<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mensualidades', function (Blueprint $table) {
            $table->string('mes', 20)->change();

            if (!Schema::hasColumn('mensualidades', 'curso_id')) {
                $table->foreignId('curso_id')->nullable()->after('alumno_id');
            }
        });

        DB::statement("UPDATE mensualidades SET mes = CASE mes
            WHEN 1 THEN 'Enero'
            WHEN 2 THEN 'Febrero'
            WHEN 3 THEN 'Marzo'
            WHEN 4 THEN 'Abril'
            WHEN 5 THEN 'Mayo'
            WHEN 6 THEN 'Junio'
            WHEN 7 THEN 'Julio'
            WHEN 8 THEN 'Agosto'
            WHEN 9 THEN 'Septiembre'
            WHEN 10 THEN 'Octubre'
            WHEN 11 THEN 'Noviembre'
            WHEN 12 THEN 'Diciembre'
            ELSE mes
        END");

        Schema::table('mensualidades', function (Blueprint $table) {
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('mensualidades', function (Blueprint $table) {
            $table->dropForeign(['curso_id']);
            $table->dropColumn('curso_id');
        });

        Schema::table('mensualidades', function (Blueprint $table) {
            $table->integer('mes')->change();
        });
    }
};