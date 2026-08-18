<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mensualidades', function (Blueprint $table) {
            $table->unsignedInteger('anio')->nullable()->after('mes');
        });

        // Rellenar año existente deduciéndolo de fecha_vencimiento
        DB::table('mensualidades')->whereNull('anio')->orderBy('id')->chunk(200, function ($rows) {
            foreach ($rows as $m) {
                if ($m->fecha_vencimiento) {
                    try {
                        $anio = Carbon::parse($m->fecha_vencimiento)->year;
                        DB::table('mensualidades')->where('id', $m->id)->update(['anio' => $anio]);
                    } catch (\Exception $e) {
                        DB::table('mensualidades')->where('id', $m->id)->update(['anio' => date('Y')]);
                    }
                } else {
                    DB::table('mensualidades')->where('id', $m->id)->update(['anio' => date('Y')]);
                }
            }
        });

        Schema::table('mensualidades', function (Blueprint $table) {
            $table->unsignedInteger('anio')->nullable(false)->default(date('Y'))->change();
        });
    }

    public function down(): void
    {
        Schema::table('mensualidades', function (Blueprint $table) {
            $table->dropColumn('anio');
        });
    }
};
