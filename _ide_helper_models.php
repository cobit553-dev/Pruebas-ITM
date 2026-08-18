<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int|null $user_id
 * @property string $nombre
 * @property string $apellido
 * @property string $codigo
 * @property string|null $email
 * @property string|null $fecha_nacimiento
 * @property string|null $dui
 * @property string|null $genero
 * @property string|null $telefono
 * @property string|null $direccion
 * @property int $activo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Curso> $cursos
 * @property-read int|null $cursos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Encargado> $encargados
 * @property-read int|null $encargados_count
 * @property-read bool $es_mayor_de_edad
 * @property-read string $nombre_completo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inscripcion> $inscripciones
 * @property-read int|null $inscripciones_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Nota> $notas
 * @property-read int|null $notas_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereDui($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereFechaNacimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereGenero($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alumno whereUserId($value)
 */
	class Alumno extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $curso_id
 * @property int $alumno_id
 * @property \Illuminate\Support\Carbon $fecha
 * @property string $estado
 * @property string|null $observacion
 * @property int $registrado_por
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Alumno|null $alumno
 * @property-read \App\Models\Curso|null $curso
 * @property-read \App\Models\Maestro|null $maestro
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asistencia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asistencia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asistencia query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asistencia whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asistencia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asistencia whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asistencia whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asistencia whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asistencia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asistencia whereObservacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asistencia whereRegistradoPor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asistencia whereUpdatedAt($value)
 */
	class Asistencia extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nombre
 * @property string $nivel
 * @property string|null $seccion
 * @property string $anio_lectivo
 * @property int $activo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Alumno> $alumnos
 * @property-read int|null $alumnos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DetalleCurso> $detalleCursos
 * @property-read int|null $detalle_cursos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inscripcion> $inscripciones
 * @property-read int|null $inscripciones_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Curso newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Curso newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Curso query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Curso whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Curso whereAnioLectivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Curso whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Curso whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Curso whereNivel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Curso whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Curso whereSeccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Curso whereUpdatedAt($value)
 */
	class Curso extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $curso_id
 * @property int $materia_id
 * @property int $maestro_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Curso|null $curso
 * @property-read \App\Models\Maestro|null $maestro
 * @property-read \App\Models\Materia|null $materia
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Nota> $notas
 * @property-read int|null $notas_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleCurso newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleCurso newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleCurso query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleCurso whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleCurso whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleCurso whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleCurso whereMaestroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleCurso whereMateriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetalleCurso whereUpdatedAt($value)
 */
	class DetalleCurso extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string|null $telefono
 * @property string|null $dui
 * @property string|null $email
 * @property string|null $parentesco
 * @property int|null $activo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Alumno> $alumnos
 * @property-read int|null $alumnos_count
 * @property-read mixed $nombre_completo
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Encargado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Encargado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Encargado query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Encargado whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Encargado whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Encargado whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Encargado whereDui($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Encargado whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Encargado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Encargado whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Encargado whereParentesco($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Encargado whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Encargado whereUpdatedAt($value)
 */
	class Encargado extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $alumno_id
 * @property int $curso_id
 * @property string $fecha_inscripcion
 * @property int $activa
 * @property string|null $estado
 * @property string|null $documento_path
 * @property string|null $observacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Alumno|null $alumno
 * @property-read \App\Models\Curso|null $curso
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inscripcion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inscripcion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inscripcion query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inscripcion whereActiva($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inscripcion whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inscripcion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inscripcion whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inscripcion whereDocumentoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inscripcion whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inscripcion whereFechaInscripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inscripcion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inscripcion whereObservacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inscripcion whereUpdatedAt($value)
 */
	class Inscripcion extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $nombre
 * @property string $apellido
 * @property string $codigo
 * @property int $activo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DetalleCurso> $detalleCursos
 * @property-read int|null $detalle_cursos_count
 * @property-read string $nombre_completo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Nota> $notasRegistradas
 * @property-read int|null $notas_registradas_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maestro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maestro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maestro query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maestro whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maestro whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maestro whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maestro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maestro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maestro whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maestro whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Maestro whereUserId($value)
 */
	class Maestro extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nombre
 * @property string $codigo
 * @property string|null $descripcion
 * @property int $activa
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DetalleCurso> $detalleCursos
 * @property-read int|null $detalle_cursos_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materia query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materia whereActiva($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materia whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materia whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materia whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materia whereUpdatedAt($value)
 */
	class Materia extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $alumno_id
 * @property int|null $curso_id
 * @property int $mes
 * @property numeric $monto
 * @property string $estado
 * @property string $fecha_vencimiento
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Alumno|null $alumno
 * @property-read string $nombre_mes
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pago> $pagos
 * @property-read int|null $pagos_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensualidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensualidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensualidad query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensualidad whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensualidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensualidad whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensualidad whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensualidad whereFechaVencimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensualidad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensualidad whereMes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensualidad whereMonto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mensualidad whereUpdatedAt($value)
 */
	class Mensualidad extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $alumno_id
 * @property int $detalle_curso_id
 * @property float|null $laboratorio
 * @property float|null $examen_teorico
 * @property float|null $practica
 * @property float|null $sos
 * @property int|null $promedio
 * @property int $registrado_por
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Alumno|null $alumno
 * @property-read \App\Models\DetalleCurso|null $detalleCurso
 * @property-read \App\Models\Maestro|null $maestro
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nota newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nota newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nota query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nota whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nota whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nota whereDetalleCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nota whereExamenTeorico($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nota whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nota whereLaboratorio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nota wherePractica($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nota wherePromedio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nota whereRegistradoPor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nota whereSos($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nota whereUpdatedAt($value)
 */
	class Nota extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $mensualidad_id
 * @property string $fecha_pago
 * @property numeric $monto_pagado
 * @property string|null $observacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Mensualidad|null $mensualidad
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pago newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pago newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pago query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pago whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pago whereFechaPago($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pago whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pago whereMensualidadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pago whereMontoPagado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pago whereObservacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pago whereUpdatedAt($value)
 */
	class Pago extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

