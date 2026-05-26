═══════════════════════════════════════════════════════════════════════════════════════════════════
ESTRUCTURA REORGANIZADA DEL PROYECTO - SEPARACIÓN POR ROLES
═══════════════════════════════════════════════════════════════════════════════════════════════════

ESTRUCTURA DE CARPETAS
─────────────────────────────────────────────────────────────────────────────────────────────────

📁 app/Http/Controllers/
    ├── 📁 Docente/                              ← CONTROLADORES DEL DOCENTE
    │   ├── DocenteDashboardController.php       (Ver cursos y materias asignadas)
    │   └── NotasController.php                  (Registrar notas de alumnos)
    │
    ├── 📁 Alumno/                               ← CONTROLADORES DEL ALUMNO
    │   └── AlumnoDashboardController.php        (Ver dashboard, notas, inscripción, pagos)
    │
    ├── 📁 Admin/                                ← CONTROLADORES DEL ADMINISTRADOR
    │   └── (Por crear cuando se implementen)
    │
    └── Otros archivos de soporte...

📁 routes/
    ├── web.php                                  (Rutas comunes e importación de rutas por rol)
    ├── docente.php                              (Rutas del docente)
    ├── alumno.php                               (Rutas del alumno)
    ├── admin.php                                (Por crear)
    └── auth.php                                 (Autenticación)

📁 resources/views/
    ├── 📁 docente/                              ← VISTAS DEL DOCENTE
    │   ├── dashboard.blade.php                  (Panel principal - ver cursos)
    │   └── notas.blade.php                      (Registro de notas con filtros)
    │
    ├── 📁 alumno/                               ← VISTAS DEL ALUMNO
    │   └── dashboard.blade.php                  (Portal estudiantil con secciones)
    │
    ├── 📁 admin/                                ← VISTAS DEL ADMINISTRADOR
    │   └── (Por crear cuando se implementen)
    │
    └── Otros...

═══════════════════════════════════════════════════════════════════════════════════════════════════

RUTAS IMPLEMENTADAS
─────────────────────────────────────────────────────────────────────────────────────────────────

DOCENTE (routes/docente.php)
────────────────────────────
✓ GET  /docente/dashboard          → Docente\DocenteDashboardController@index
                                      (Ver cursos y materias asignadas)

✓ GET  /docente/notas              → Docente\NotasController@index
                                      (Vista de registro de notas con filtros)

✓ POST /docente/notas/guardar      → Docente\NotasController@guardar
                                      (Guardar las notas ingresadas)


ALUMNO (routes/alumno.php)
──────────────────────────
✓ GET  /alumno/dashboard           → Alumno\AlumnoDashboardController@index
                                      (Portal estudiantil: inicio, notas, inscripción, pagos)

✓ POST /alumno/inscribirse         → Alumno\AlumnoDashboardController@inscribirse
                                      (Inscribirse a una sección)


═══════════════════════════════════════════════════════════════════════════════════════════════════

CONVENCIÓN DE COMENTARIOS EN CÓDIGO
─────────────────────────────────────────────────────────────────────────────────────────────────

Separadores principales (en archivos PHP y Blade):
═══════════════════════════════════════════════════════════════════════════════════════════════════
  // DOCENTE: NOMBRE DE SECCIÓN
  // ═══════════════════════════════════════════════════════════════════════════════════════════════

Separadores secundarios (dentro de métodos o secciones):
──────────────────────────────────────────────────────────────────────────────────────────────────
  // ──────────────────────────────────────────────────────────────────────────────────────
  // DOCENTE: Subsección específica
  // ──────────────────────────────────────────────────────────────────────────────────────

En vistas Blade:
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}
{{-- VISTA: DOCENTE - NOMBRE DE PÁGINA --}}
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}

{{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
{{-- DOCENTE: NOMBRE DE SECCIÓN --}}
{{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}

═══════════════════════════════════════════════════════════════════════════════════════════════════

CÓMO AGREGAR NUEVAS FUNCIONALIDADES
─────────────────────────────────────────────────────────────────────────────────────────────────

Para DOCENTE:
  1. Crear/editar controlador en: app/Http/Controllers/Docente/NombreController.php
  2. Agregar ruta en: routes/docente.php
  3. Crear/editar vista en: resources/views/docente/nombre.blade.php
  4. Usar separadores de comentarios consistentes

Para ALUMNO:
  1. Crear/editar controlador en: app/Http/Controllers/Alumno/NombreController.php
  2. Agregar ruta en: routes/alumno.php
  3. Crear/editar vista en: resources/views/alumno/nombre.blade.php
  4. Usar separadores de comentarios consistentes

Para ADMINISTRADOR:
  1. Crear/editar controlador en: app/Http/Controllers/Admin/NombreController.php
  2. Agregar ruta en: routes/admin.php (crear el archivo primero)
  3. Crear/editar vista en: resources/views/admin/nombre.blade.php
  4. Descomentar: require __DIR__.'/admin.php'; en routes/web.php

═══════════════════════════════════════════════════════════════════════════════════════════════════
