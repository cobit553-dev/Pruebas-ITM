<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Asistencia</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        h1 { font-size: 20px; margin: 0 0 10px; color: #1f2937; }
        h2 { font-size: 16px; margin: 5px 0; color: #374151; }
        .header { margin-bottom: 20px; }
        .info { font-size: 12px; color: #6b7280; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; font-size: 11px; }
        th { background: #f3f4f6; color: #374151; padding: 8px; text-align: left; font-weight: bold; }
        td { padding: 8px; border-bottom: 1px solid #e5e7eb; }
        .presente { color: #16a34a; }
        .ausente { color: #dc2626; }
        .permiso { color: #d97706; }
        .footer { margin-top: 30px; font-size: 10px; color: #9ca3af; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Reporte de Asistencia</h1>
        <h2>Curso {{ $curso->seccion }} — {{ $curso->nombre }} ({{ $curso->nivel }})</h2>
    </div>

    <div class="info">
        <p><strong>Docente:</strong> {{ $maestro->nombre_completo }}</p>
        <p><strong>Fecha:</strong> {{ $fechaFormateada }}</p>
        <p><strong>Total alumnos:</strong> {{ $alumnos->count() }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Alumno</th>
                <th>Código</th>
                <th>Estado</th>
                <th>Observación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $i => $alumno)
            @php $estado = $asistencias->get($alumno->id)?->estado ?? 'presente'; @endphp
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $alumno->nombre_completo }}</td>
                <td>{{ $alumno->codigo }}</td>
                <td class="{{ $estado }}">
                    @if($estado === 'ausente')
                        Ausente
                    @elseif($estado === 'permiso')
                        Ausente con permiso
                    @else
                        Presente
                    @endif
                </td>
                <td>{{ $asistencias->get($alumno->id)?->observacion ?? '—' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        ITM Aguilares - Sistema Académico - {{ now()->year }}
    </div>
</body>
</html>