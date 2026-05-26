<x-app-layout>
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}
{{-- VISTA: ALUMNO - MIS NOTAS --}}
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}

<div style="display:flex; height:100vh; overflow:hidden;" class="fade-in">

    @include('components.alumno-sidebar', ['active' => 'notas'])

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- ALUMNO: CONTENIDO PRINCIPAL --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden;">

        <header style="background:#1e293b; border-bottom:1px solid #334155; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM Aguilares" style="width:36px; height:36px; border-radius:10px; object-fit:cover;">
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0;">Portal Estudiantil</h2>
                    <p style="font-size:12px; color:#64748b; margin:0;">{{ $alumno->nombre_completo }}</p>
                </div>
            </div>
            <span style="font-size:12px; color:#475569;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;" class="fade-in">

            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            {{-- ALUMNO: TABLA DE NOTAS --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; overflow:hidden;">
                <div style="padding:14px 18px; border-bottom:1px solid #334155;">
                    <p style="font-size:14px; font-weight:600; color:#e2e8f0; margin:0;">Mis notas</p>
                    @if($inscripcion)
                    <p style="font-size:12px; color:#475569; margin:3px 0 0;">Sección {{ $inscripcion->curso->seccion }} · Turno {{ $inscripcion->curso->nivel }}</p>
                    @endif
                </div>

                @if($notas->count() > 0)
                <div style="overflow-x:auto;">
                    <table style="width:100%; border-collapse:collapse; font-size:13px;">
                        <thead>
                            <tr style="background:#0f172a;">
                                <th style="padding:10px 16px; text-align:left; color:#475569; font-weight:500; font-size:11px; text-transform:uppercase;">Materia</th>
                                <th style="padding:10px 12px; text-align:left; color:#475569; font-weight:500; font-size:11px; text-transform:uppercase;">Docente</th>
                                <th style="padding:10px 8px; text-align:center; color:#a78bfa; font-weight:600; font-size:11px; text-transform:uppercase; width:90px;">Laboratorio</th>
                                <th style="padding:10px 8px; text-align:center; color:#fbbf24; font-weight:600; font-size:11px; text-transform:uppercase; width:90px;">Ex. Teórico</th>
                                <th style="padding:10px 8px; text-align:center; color:#34d399; font-weight:600; font-size:11px; text-transform:uppercase; width:90px;">Práctica</th>
                                <th style="padding:10px 8px; text-align:center; color:#f87171; font-weight:600; font-size:11px; text-transform:uppercase; width:80px;">SOS</th>
                                <th style="padding:10px 8px; text-align:center; color:#e2e8f0; font-weight:700; font-size:11px; text-transform:uppercase; width:80px;">Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notas as $nota)
                            @php $p = $nota->promedio; @endphp
                            <tr style="border-top:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                                <td style="padding:12px 16px; color:#e2e8f0; font-weight:500;">{{ $nota->detalleCurso->materia->nombre }}</td>
                                <td style="padding:12px 12px; color:#64748b; font-size:12px;">{{ $nota->detalleCurso->maestro->nombre_completo }}</td>
                                <td style="padding:12px 8px; text-align:center; color:#c4b5fd;">{{ $nota->laboratorio ?? '—' }}</td>
                                <td style="padding:12px 8px; text-align:center; color:#fcd34d;">{{ $nota->examen_teorico ?? '—' }}</td>
                                <td style="padding:12px 8px; text-align:center; color:#6ee7b7;">{{ $nota->practica ?? '—' }}</td>
                                <td style="padding:12px 8px; text-align:center; color:#fca5a5;">{{ $nota->sos ?? '—' }}</td>
                                <td style="padding:12px 8px; text-align:center;">
                                    @if($p !== null)
                                    <span style="width:32px; height:32px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-size:13px; font-weight:700; color:#fff;
                                        background:{{ $p >= 9 ? '#059669' : ($p >= 7 ? '#d97706' : ($p >= 6 ? '#ea580c' : '#dc2626')) }};">
                                        {{ $p }}
                                    </span>
                                    @else
                                    <span style="color:#334155;">—</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @elseif($inscripcion)
                <div style="padding:40px; text-align:center;">
                    <p style="color:#475569; font-size:13px;">Aún no tienes notas registradas.</p>
                </div>
                @else
                <div style="padding:40px; text-align:center;">
                    <p style="color:#475569; font-size:13px;">Debes inscribirte a una sección primero.</p>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>
</x-app-layout>
