<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('images/logo_itm.jpg') }}">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: Arial, sans-serif; font-size:12px; color:#1f2937; padding:30px; }

        .header { text-align:center; margin-bottom:20px; }
        .inst-name { font-size:15px; font-weight:bold; color:#1f2937; }
        .inst-sub { font-size:11px; color:#6b7280; margin-top:2px; }

        .titulo { background:#d1fae5; color:#065f46; text-align:center; padding:10px; font-size:16px; font-weight:bold; border-radius:6px; margin-bottom:20px; letter-spacing:1px; }

        .seccion-titulo { background:#d1fae5; color:#065f46; padding:8px 14px; font-size:13px; font-weight:bold; border-radius:4px; margin-bottom:14px; margin-top:20px; }

        .campo { margin-bottom:10px; }
        .campo-label { font-size:10px; color:#6b7280; margin-bottom:3px; }
        .campo-valor { border-bottom:1px solid #9ca3af; padding-bottom:4px; font-size:13px; color:#111827; min-height:20px; }

        .grid-2 { display:table; width:100%; margin-bottom:10px; }
        .col { display:table-cell; width:50%; padding-right:16px; }
        .col:last-child { padding-right:0; }

        .firma-row { display:table; width:100%; margin-top:20px; }
        .firma-col { display:table-cell; width:50%; text-align:center; padding:0 10px; }
        .firma-img { max-width:180px; max-height:70px; }
        .firma-linea { border-top:1px solid #374151; padding-top:6px; font-size:11px; color:#6b7280; margin-top:4px; }

        .footer { text-align:center; margin-top:24px; border-top:1px solid #e5e7eb; padding-top:12px; font-size:10px; color:#9ca3af; }
    </style>
</head>
<body>

    <div class="header">
        <div class="inst-name">Instituto de Computación de Aguilares</div>
        <div class="inst-sub">I.T.M. Aguilares · Sistema de Gestión Académica</div>
    </div>

    <div class="titulo">SOLICITUD DE INSCRIPCIÓN</div>

    {{-- Datos Personales --}}
    <div class="seccion-titulo">Datos Personales</div>

    <div class="campo">
        <div class="campo-label">Nombre completo del alumno</div>
        <div class="campo-valor">{{ $alumno->nombre }} {{ $alumno->apellido }}</div>
    </div>

    <div class="grid-2">
        <div class="col">
            <div class="campo-label">Código / Matrícula</div>
            <div class="campo-valor">{{ $alumno->codigo }}</div>
        </div>
        <div class="col">
            <div class="campo-label">Fecha de nacimiento</div>
            <div class="campo-valor">
                {{ $alumno->fecha_nacimiento ? \Carbon\Carbon::parse($alumno->fecha_nacimiento)->isoFormat('D [de] MMMM [de] YYYY') : '—' }}
            </div>
        </div>
    </div>

    <div class="grid-2">
        <div class="col">
            <div class="campo-label">Teléfono</div>
            <div class="campo-valor">{{ $alumno->telefono ?? '—' }}</div>
        </div>
        <div class="col">
            <div class="campo-label">Sexo</div>
            <div class="campo-valor">{{ $alumno->genero === 'M' ? 'Masculino' : ($alumno->genero === 'F' ? 'Femenino' : '—') }}</div>
        </div>
    </div>

    <div class="campo">
        <div class="campo-label">Dirección</div>
        <div class="campo-valor">{{ $alumno->direccion ?? '—' }}</div>
    </div>

    {{-- Datos del Encargado --}}
    <div class="seccion-titulo">Datos del Encargado</div>

    <div class="grid-2">
        <div class="col">
            <div class="campo-label">Nombre del encargado</div>
            <div class="campo-valor">{{ $encargado_nombre }}</div>
        </div>
        <div class="col">
            <div class="campo-label">Parentesco</div>
            <div class="campo-valor">{{ $encargado_parentesco }}</div>
        </div>
    </div>

    <div class="grid-2">
        <div class="col">
            <div class="campo-label">Teléfono del encargado</div>
            <div class="campo-valor">{{ $encargado_telefono ?? '—' }}</div>
        </div>
        <div class="col">
            <div class="campo-label">DUI del encargado</div>
            <div class="campo-valor">{{ $encargado_dui ?? '—' }}</div>
        </div>
    </div>

    {{-- Sección seleccionada --}}
    <div class="seccion-titulo">Sección Seleccionada</div>

    <div class="grid-2">
        <div class="col">
            <div class="campo-label">Sección</div>
            <div class="campo-valor">{{ $curso->nombre }} — Sección {{ $curso->seccion }}</div>
        </div>
        <div class="col">
            <div class="campo-label">Turno</div>
            <div class="campo-valor">{{ $curso->nivel }}</div>
        </div>
    </div>

    {{-- Inicio de clases --}}
    <div class="seccion-titulo">Inicio de Clases</div>

    <div class="grid-2">
        <div class="col">
            <div class="campo-label">Fecha de solicitud</div>
            <div class="campo-valor">{{ $fecha->isoFormat('D [de] MMMM [de] YYYY') }}</div>
        </div>
        <div class="col">
            <div class="campo-label">Horario</div>
            <div class="campo-valor">
                @if($curso->nivel === 'Matutino') 7:30 a.m. — 11:30 a.m.
                @else 1:00 p.m. — 5:00 p.m.
                @endif
            </div>
        </div>
    </div>

    {{-- Firmas --}}
    <div class="firma-row">
        <div class="firma-col">
            @if(!empty($firma_alumno))
                <img src="{{ $firma_alumno }}" class="firma-img">
            @endif
            <div class="firma-linea">Firma del Alumno</div>
        </div>
        <div class="firma-col">
            @if(!empty($firma_encargado))
                <img src="{{ $firma_encargado }}" class="firma-img">
            @endif
            <div class="firma-linea">Firma del Encargado</div>
        </div>
    </div>

    <div class="footer">
        I.T.M. — Instituto de Computación de Aguilares · Ciclo {{ $fecha->year }}<br>
        Generado digitalmente el {{ $fecha->isoFormat('D [de] MMMM [de] YYYY [a las] HH:mm') }}
    </div>

</body>
</html>
