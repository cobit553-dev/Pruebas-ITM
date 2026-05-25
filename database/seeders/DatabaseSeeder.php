<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Maestro;
use App\Models\Alumno;
use App\Models\Materia;
use App\Models\Curso;
use App\Models\DetalleCurso;
use App\Models\Inscripcion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── 1. Usuarios ─────────────────────────────────────────────────────
        User::firstOrCreate(['email' => 'admin@itm.com'], [
            'name'     => 'Administrador ITM',
            'password' => Hash::make('password'),
        ]);

        $userDocente1 = User::firstOrCreate(['email' => 'docente@itm.com'], [
            'name'     => 'Carlos Mendoza',
            'password' => Hash::make('password'),
        ]);

        $userDocente2 = User::firstOrCreate(['email' => 'docente2@itm.com'], [
            'name'     => 'Ana López',
            'password' => Hash::make('password'),
        ]);
                $userAlumno = User::firstOrCreate(['email' => 'alumno@itm.com'], [
            'name'     => 'Juan Pérez',
            'password' => Hash::make('password'),
        ]);

        // ── 2. Maestros ─────────────────────────────────────────────────────
        $maestro1 = Maestro::firstOrCreate(['codigo' => 'M001'], [
            'user_id'  => $userDocente1->id,
            'nombre'   => 'Carlos',
            'apellido' => 'Mendoza',
            'activo'   => true,
        ]);

        $maestro2 = Maestro::firstOrCreate(['codigo' => 'M002'], [
            'user_id'  => $userDocente2->id,
            'nombre'   => 'Ana',
            'apellido' => 'López',
            'activo'   => true,
        ]);

        // ── 3. Materias ──────────────────────────────────────────────────────
        $materiasDefs = [
            ['nombre' => 'Microsoft Windows',      'codigo' => 'WIN'],
            ['nombre' => 'Microsoft Word',         'codigo' => 'WRD'],
            ['nombre' => 'Microsoft Excel',        'codigo' => 'EXC'],
            ['nombre' => 'Internet',               'codigo' => 'INT'],
            ['nombre' => 'Microsoft PowerPoint',   'codigo' => 'PPT'],
            ['nombre' => 'Microsoft Publisher',    'codigo' => 'PUB'],
            ['nombre' => 'Microsoft Access',       'codigo' => 'ACC'],
            ['nombre' => 'CorelDRAW',              'codigo' => 'CDR'],
            ['nombre' => 'Photoshop',              'codigo' => 'PSD'],
            ['nombre' => 'HTML',                   'codigo' => 'HTM'],
            ['nombre' => 'Macromedia Dreamweaver', 'codigo' => 'DRW'],
            ['nombre' => 'Mantenimiento de PC',    'codigo' => 'MPC'],
            ['nombre' => 'Redes',                  'codigo' => 'RED'],
        ];

        $materias = [];
        foreach ($materiasDefs as $m) {
            $materias[$m['codigo']] = Materia::firstOrCreate(
                ['codigo' => $m['codigo']],
                ['nombre' => $m['nombre'], 'activa' => true]
            );
        }

        // ── 4. Cursos ────────────────────────────────────────────────────────
        // Mañana: A, B, C | Tarde: D, F
        $secciones = [
            ['seccion' => 'A', 'turno' => 'Mañana'],
            ['seccion' => 'B', 'turno' => 'Mañana'],
            ['seccion' => 'C', 'turno' => 'Mañana'],
            ['seccion' => 'D', 'turno' => 'Tarde'],
            ['seccion' => 'F', 'turno' => 'Tarde'],
        ];

        $cursos = [];
        foreach ($secciones as $s) {
            $cursos[$s['seccion']] = Curso::firstOrCreate(
                ['nombre' => 'Sección ' . $s['seccion'], 'anio_lectivo' => 2026],
                ['nivel' => $s['turno'], 'seccion' => $s['seccion'], 'activo' => true]
            );
        }

        // ── 5. Asignación de materias a cursos y docentes ────────────────────
        $materiasCarlos = ['WIN','WRD','EXC','INT','PPT','PUB','ACC'];
        $materiasAna    = ['CDR','PSD','HTM','DRW','MPC','RED'];

        foreach ($cursos as $curso) {
            foreach ($materiasCarlos as $cod) {
                DetalleCurso::firstOrCreate(
                    ['curso_id' => $curso->id, 'materia_id' => $materias[$cod]->id],
                    ['maestro_id' => $maestro1->id]
                );
            }
            foreach ($materiasAna as $cod) {
                DetalleCurso::firstOrCreate(
                    ['curso_id' => $curso->id, 'materia_id' => $materias[$cod]->id],
                    ['maestro_id' => $maestro2->id]
                );
            }
        }

        // ── 6. Alumnos ───────────────────────────────────────────────────────
        $alumno1 = Alumno::firstOrCreate(
            ['codigo' => 'A001'],
            ['user_id' => $userAlumno->id, 'nombre' => 'Juan', 'apellido' => 'Pérez', 'activo' => true]
        );

        $alumnosDefs = [
            ['nombre' => 'José',    'apellido' => 'Alvarado',  'codigo' => 'A002'],
            ['nombre' => 'María',   'apellido' => 'Benítez',   'codigo' => 'A003'],
            ['nombre' => 'Pedro',   'apellido' => 'Castro',    'codigo' => 'A004'],
            ['nombre' => 'Lucía',   'apellido' => 'Díaz',      'codigo' => 'A005'],
            ['nombre' => 'Roberto', 'apellido' => 'Espinoza',  'codigo' => 'A006'],
            ['nombre' => 'Karla',   'apellido' => 'Flores',    'codigo' => 'A007'],
            ['nombre' => 'Miguel',  'apellido' => 'González',  'codigo' => 'A008'],
            ['nombre' => 'Sofía',   'apellido' => 'Hernández', 'codigo' => 'A009'],
            ['nombre' => 'Diego',   'apellido' => 'Jiménez',   'codigo' => 'A010'],
            ['nombre' => 'Valeria', 'apellido' => 'López',     'codigo' => 'A011'],
            ['nombre' => 'Andrés',  'apellido' => 'Martínez',  'codigo' => 'A012'],
        ];

        $alumnosCreados = [$alumno1];
        foreach ($alumnosDefs as $a) {
            $alumnosCreados[] = Alumno::firstOrCreate(
                ['codigo' => $a['codigo']],
                ['nombre' => $a['nombre'], 'apellido' => $a['apellido'], 'activo' => true]
            );
        }

        // ── 7. Inscripciones (repartir alumnos por sección) ──────────────────
        // Sección A y B → 4 alumnos c/u | C, D, F → resto
        $reparto = [
            'A' => array_slice($alumnosCreados, 0, 4),
            'B' => array_slice($alumnosCreados, 4, 4),
            'C' => array_slice($alumnosCreados, 8, 2),
            'D' => array_slice($alumnosCreados, 10, 1),
            'F' => array_slice($alumnosCreados, 11, 1),
        ];

        foreach ($reparto as $seccion => $grupo) {
            foreach ($grupo as $alumno) {
                Inscripcion::firstOrCreate(
                    ['alumno_id' => $alumno->id, 'curso_id' => $cursos[$seccion]->id],
                    ['fecha_inscripcion' => '2026-01-15', 'activa' => true]
                );
            }
        }
    }
}
