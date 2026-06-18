<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('images/logo_itm.jpg') }}">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: Arial, sans-serif; font-size: 11px; color: #1a1a2e; padding: 20px 30px; }

        /* ── Header ── */
        .header { display:table; width:100%; margin-bottom:16px; }
        .header-left  { display:table-cell; width:15%; text-align:center; vertical-align:middle; }
        .header-center { display:table-cell; width:70%; text-align:center; vertical-align:middle; }
        .header-right { display:table-cell; width:15%; text-align:center; vertical-align:middle; }

        .inst-title { font-size:13px; font-weight:bold; color:#1a3a6b; letter-spacing:1px; }
        .inst-sub   { font-size:11px; font-weight:bold; color:#1a3a6b; }
        .logo-circle { width:60px; height:60px; border-radius:50%; background:#e8f0fe; display:inline-block; line-height:60px; font-size:10px; color:#1a3a6b; font-weight:bold; text-align:center; }

        /* ── Título boleta ── */
        .titulo-boleta {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            color: #1a3a6b;
            letter-spacing: 3px;
            border: 2px solid #1a3a6b;
            padding: 8px 0;
            margin-bottom: 16px;
        }

        /* ── Intro texto ── */
        .intro { font-size: 11px; margin-bottom: 16px; line-height: 1.6; }
        .intro strong { font-size: 12px; text-transform: uppercase; }

        /* ── Tabla notas ── */
        table { width: 100%; border-collapse: collapse; margin-bottom: 16px; }
        th {
            background: #1a3a6b;
            color: #ffffff;
            font-size: 10px;
            font-weight: bold;
            padding: 7px 8px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: .5px;
        }
        th.th-left { text-align: left; }
        td {
            padding: 6px 8px;
            font-size: 11px;
            border: 1px solid #c0c0c0;
            text-align: center;
        }
        td.td-left { text-align: left; font-weight: bold; }
        tr:nth-child(even) td { background: #f0f4ff; }

        .td-promedio-final {
            background: #1a3a6b !important;
            color: #ffffff;
            font-weight: bold;
            font-size: 12px;
        }
        .td-aprobado {
            background: #1a3a6b !important;
            color: #ffffff;
            font-weight: bold;
            font-size: 11px;
        }

        /* ── Conducta ── */
        .conducta-table { width: 100%; border-collapse: collapse; margin-bottom: 16px; }
        .conducta-table td { border: 1px solid #c0c0c0; padding: 6px 8px; font-size: 11px; }
        .conducta-table .conducta-label { font-weight: bold; }
        .conducta-table .conducta-val { text-align: center; color: #1a3a6b; font-weight: bold; }

        /* ── Texto legal ── */
        .texto-legal { font-size: 11px; line-height: 1.7; margin-bottom: 24px; text-align: justify; }
        .texto-legal strong { font-weight: bold; }

        /* ── Firmas ── */
        .firmas { display: table; width: 100%; margin-top: 20px; }
        .firma-col { display: table-cell; width: 33%; text-align: center; vertical-align: bottom; padding: 0 10px; }
        .firma-linea { border-top: 1px solid #1a1a2e; padding-top: 6px; font-size: 11px; }
        .firma-nombre { font-weight: bold; font-size: 11px; }
        .firma-cargo  { font-size: 10px; color: #6b7280; }

        .sello { width: 70px; height: 70px; border-radius: 50%; border: 2px solid #1a3a6b; display: inline-block; line-height: 70px; font-size: 9px; color: #1a3a6b; font-weight: bold; text-align: center; margin-bottom: 6px; }

        .divider { border-top: 2px solid #1a3a6b; margin: 12px 0; }
    </style>
</head>
<body>

    {{-- ══ ENCABEZADO ══ --}}
    <div class="header">
        <div class="header-left">
            <div class="logo-circle">ITM</div>
        </div>
        <div class="header-center">
            <div class="inst-title">ITM</div>
            <div class="inst-sub">INSTITUTO DE COMPUTACIÓN DE AGUILARES</div>
        </div>
        <div class="header-right">
            {{-- Escudo El Salvador placeholder --}}
            <div class="logo-circle" style="font-size:8px;">ESCUDO<br>E.S.</div>
        </div>
    </div>

    <div class="divider"></div>

    {{-- ══ TÍTULO ══ --}}
    <div class="titulo-boleta">BOLETA DE NOTAS</div>

    {{-- ══ INTRO ══ --}}
    <p class="intro">
        El <strong>Instituto de Computación I. T. M</strong> hace constar que el/a alumno/a:<br>
        <strong>{{ strtoupper($alumno->nombre . ' ' . $alumno->apellido) }}</strong>
        ha cursado una carrera técnica en informática obteniendo las siguientes calificaciones:
    </p>

    {{-- ══ TABLA NOTAS + CONDUCTA ══ --}}
    @php
        $conductas = [
            'Responsabilidad',
            'Relaciones Personales',
            'Iniciativa y Confianza en sí mismo',
            'Hábitos de estudio y trabajo',
        ];
        $notas = $alumno->notas;
        $totalFilas = max($notas->count(), count($conductas));
    @endphp

    <table>
        <thead>
            <tr>
                <th class="th-left" style="width:24%;">Programa</th>
                <th style="width:14%;">Promedio de<br>Calificación</th>
                <th style="width:10%;">Conceptos</th>
                <th style="width:28%;">Aspectos de Conducta</th>
                <th style="width:12%;">Conceptos</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 0; $i < $totalFilas; $i++)
            @php
                $nota      = $notas->get($i);
                $conducta  = $conductas[$i] ?? null;
                $prom      = $nota?->promedio;
                $concepto  = $prom ? $concepto($prom) : '';

                // Conducta: cada aspecto ocupa 3 filas
                $mostrarConducta = ($i % 3 === 0) && $conducta;
                $rowspanConducta = min(3, $totalFilas - $i);
            @endphp
            <tr>
                {{-- Materia --}}
                <td class="td-left">{{ $nota?->detalleCurso?->materia?->nombre ?? '' }}</td>

                {{-- Promedio --}}
                <td>{{ $prom ?? '' }}</td>

                {{-- Concepto nota --}}
                <td style="font-weight:bold; color:#1a3a6b;">{{ $concepto }}</td>

                {{-- Conducta (rowspan cada 3) --}}
                @if($i % 3 === 0 && $conducta)
                <td rowspan="{{ min(3, count($conductas) * 1) }}" class="conducta-label" style="text-align:center; vertical-align:middle;">
                    {{ $conducta }}
                </td>
                <td rowspan="{{ min(3, count($conductas) * 1) }}" class="conducta-val" style="vertical-align:middle;">
                    Excelente
                </td>
                @elseif($i % 3 === 0 && !$conducta)
                <td></td>
                <td></td>
                @endif
            </tr>
            @endfor

            {{-- Fila promedio final --}}
            <tr>
                <td class="td-left td-promedio-final">PROMEDIO FINAL</td>
                <td class="td-promedio-final">{{ $promedio_general ? round($promedio_general) : '—' }}</td>
                <td class="td-promedio-final"></td>
                <td colspan="2" class="td-aprobado" style="text-align:center;">
                    {{ $promedio_general >= 6 ? 'Aprobado' : 'Reprobado' }}
                </td>
            </tr>
        </tbody>
    </table>

    {{-- ══ TEXTO LEGAL ══ --}}
    @php
        $curso        = $alumno->inscripciones->first()?->curso;
        $fechaTexto   = now()->isoFormat('D [de] MMMM [de] YYYY');
        $diaTexto     = now()->isoFormat('D');
        $mesTexto     = now()->isoFormat('MMMM');
        $anioTexto    = now()->year;
    @endphp

    <p class="texto-legal">
        Por lo tanto, queda facultado/a para trabajar en los programas recibidos en el periodo de
        <strong>dos años</strong>, el cual se extiende la boleta de calificación en la ciudad de
        Aguilares, Departamento de San Salvador, a los <strong>{{ $diaTexto }} días del mes de {{ $mesTexto }} {{ $anioTexto }}</strong>.
    </p>

    {{-- ══ FIRMAS ══ --}}
    <div class="firmas">
        <div class="firma-col">
            <div style="height:50px;"></div>
            <div class="firma-linea">
                <div class="firma-nombre">Santos David Rodas</div>
                <div class="firma-cargo">Director</div>
            </div>
        </div>
        <div class="firma-col" style="text-align:center;">
            <div class="sello">INSTITUTE<br>TECHNOLOGY<br>IN MASTER<br>ITM</div>
            <div style="font-size:9px; color:#1a3a6b;">2321 5439</div>
        </div>
        <div class="firma-col">
            <div style="height:50px;"></div>
            <div class="firma-linea">
                <div class="firma-nombre">Santos David Rodas</div>
                <div class="firma-cargo">Instructor</div>
            </div>
        </div>
    </div>

</body>
</html>
