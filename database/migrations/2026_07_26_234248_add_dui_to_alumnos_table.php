<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // DUI del alumno (solo se llena cuando es mayor de edad)
        if (! Schema::hasColumn('alumnos', 'dui')) {
            Schema::table('alumnos', function (Blueprint $table) {
                $table->string('dui', 10)->nullable()->unique()->after('fecha_nacimiento');
            });
        }

        // Seguridad: si en otro entorno la tabla encargados aún no tiene dui
        // (en tu BD ya existe porque lo agregaste por SQL directo, aquí no hará nada)
        if (! Schema::hasColumn('encargados', 'dui')) {
            Schema::table('encargados', function (Blueprint $table) {
                $table->string('dui', 10)->nullable()->after('telefono');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('alumnos', 'dui')) {
            Schema::table('alumnos', function (Blueprint $table) {
                $table->dropColumn('dui');
            });
        }
    }
};
