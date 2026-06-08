<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">
    @include('components.admin-sidebar', ['active' => 'boletas'])

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#f8fafc;">
        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; gap:12px; flex-shrink:0;">
            <a href="{{ route('admin.boletas') }}"
               style="width:32px; height:32px; border-radius:8px; background:#f3f4f6; display:flex; align-items:center; justify-content:center; text-decoration:none; color:#6b7280;"
               onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
            </a>
            <div>
                <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">Boleta — {{ $alumno->nombre }} {{ $alumno->apellido }}</h2>
                <p style="font-size:12px; color:#6b7280; margin:0;">{{ $alumno->codigo }} · Ciclo 2026</p>
            </div>
            <div style="margin-left:auto;">
                <button onclick="window.print()"
                    style="background:#111827; border:none; padding:8px 16px; border-radius:8px; color:#fff; font-size:12px; font-weight:600; cursor:pointer;"
                    onmouseover="this.style.background='#374151'" onmouseout="this.style.background='#111827'">
                    🖨 Imprimir
                </button>
            </div>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            {{-- Info del alumno --}}
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:20px; margin-bottom:20px; display:flex; align-items:center; justify-content:space-between;">
                <div style="display:flex; align-items:center; gap:14px;">
                    <div style="width:52px; height:52px; border-radius:50%; background:#111827; display:flex; align-items:center; justify-content:center; color:#fff; font-size:16px; font-weight:700;">
                        {{ strtoupper(substr($alumno->nombre,0,1).substr($alumno->apellido,0,1)) }}
                    </div>
                    <div>
                        <p style="font-size:16px; font-weight:700; color:#111827; margin:0;">{{ $alumno->nombre }} {{ $alumno->apellido }}</p>
                        <p style="font-size:12px; color:#6b7280; margin:0;">Código: {{ $alumno->codigo }} · {{ $alumno->inscripciones->first()?->curso?->nombre ?? '—' }} · {{ $alumno->inscripciones->first()?->curso?->nivel ?? '' }}</p>
                    </div>
                </div>
                <div style="text-align:center; padding:12px 24px; background:#f9fafb; border-radius:12px; border:1px solid #e5e7eb;">
                    <p style="font-size:11px; color:#6b7280; margin:0 0 4px; text-transform:uppercase; font-weight:600;">Promedio General</p>
                    <p style="font-size:28px; font-weight:700; margin:0; color:{{ $promedio_general >= 8 ? '#16a34a' : ($promedio_general >= 6 ? '#d97706' : '#dc2626') }};">
                        {{ $promedio_general ? round($promedio_general, 1) : '—' }}
                    </p>
                </div>
            </div>

            {{-- Tabla de notas --}}
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden;">
                <div style="padding:16px 24px; border-bottom:1px solid #e5e7eb; display:flex; align-items:center; gap:8px;">
                    <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                    <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">Detalle de Notas</p>
                </div>
                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background:#f9fafb; border-bottom:1px solid #e5e7eb;">
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Materia</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Maestro</th>
                            <th style="padding:11px 24px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Laboratorio</th>
                            <th style="padding:11px 24px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Teórico</th>
                            <th style="padding:11px 24px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Práctico</th>
                            <th style="padding:11px 24px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($alumno->notas as $nota)
                        <tr style="border-top:1px solid #f1f5f9; background:{{ $loop->even ? '#f8fafc' : '#ffffff' }};">
                            <td style="padding:13px 24px; font-size:13px; font-weight:500; color:#111827;">{{ $nota->detalleCurso->materia->nombre ?? '—' }}</td>
                            <td style="padding:13px 24px; font-size:13px; color:#6b7280;">{{ $nota->detalleCurso->maestro->nombre ?? '' }} {{ $nota->detalleCurso->maestro->apellido ?? '' }}</td>
                            <td style="padding:13px 24px; text-align:center; font-size:13px; color:#374151;">{{ $nota->laboratorio ?? '—' }}</td>
                            <td style="padding:13px 24px; text-align:center; font-size:13px; color:#374151;">{{ $nota->examen_teorico ?? '—' }}</td>
                            <td style="padding:13px 24px; text-align:center; font-size:13px; color:#374151;">{{ $nota->practica ?? '—' }}</td>
                            <td style="padding:13px 24px; text-align:center;">
                                @php $p = $nota->promedio; @endphp
                                <span style="width:34px; height:34px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-size:13px; font-weight:700; color:#fff;
                                    background:{{ $p >= 8 ? '#16a34a' : ($p >= 6 ? '#d97706' : '#dc2626') }};">
                                    {{ $p ?? '—' }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="padding:40px; text-align:center; color:#9ca3af; font-size:13px;">Sin notas registradas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
