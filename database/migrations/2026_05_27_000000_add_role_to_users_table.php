<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'docente', 'alumno'])->default('alumno')->after('password');
        });

        Schema::table('alumnos', function (Blueprint $table) {
            $table->string('email')->unique()->nullable()->after('codigo');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });

        Schema::table('alumnos', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
};