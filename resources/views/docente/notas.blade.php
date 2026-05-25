<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;" class="fade-in">

    {{-- ===== SIDEBAR ===== --}}
    <aside style="width:220px; flex-shrink:0; background:#1e293b; border-right:1px solid #334155; display:flex; flex-direction:column; padding:20px 12px; gap:2px;">

        <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px; padding-bottom:16px; border-bottom:1px solid #334155;">
            <img src="{{ asset("images/logo_itm.jpg") }}" alt="ITM Aguilares" style="width:38px; height:38px; border-radius:10px; flex-shrink:0; object-fit:cover;">
            <div>
                <p style="font-weight:700; font-size:14px; color:#fff;">ITM Aguilares</p>
                <p style="font-size:11px; color:#64748b;">Sistema Académico</p>
            </div>
        </div>



        <p style="font-size:9px; color:#475569; text-transform:uppercase; letter-spacing:.1em; font-weight:600; padding:10px 8px 3px;">Académico</p>
        <a href="{{ route('docente.notas') }}" style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; font-weight:600; background:rgba(59,130,246,.2); color:#60a5fa; text-decoration:none;">
            <svg xmlns="images/logo_itm.jpg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            Registro de notas
        </a>

        <div style="margin-top:auto; padding-top:14px; border-top:1px solid #334155; display:flex; align-items:center; gap:10px;">
            <div style="width:32px; height:32px; border-radius:50%; background:#3b82f6; display:flex; align-items:center; justify-content:center; color:#fff; font-size:12px; font-weight:700; flex-shrink:0;">
                {{ strtoupper(substr($maestro->nombre,0,1).substr($maestro->apellido,0,1)) }}
            </div>
            <div style="flex:1; overflow:hidden;">
                <p style="font-size:13px; font-weight:500; color:#e2e8f0; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $maestro->nombre_completo }}</p>
                <p style="font-size:11px; color:#475569;">Docente</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" title="Salir" style="background:none; border:none; cursor:pointer; color:#475569; padding:4px;"
                        onmouseover="this.style.color='#f87171'" onmouseout="this.style.color='#475569'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                </button>
            </form>
        </div>
    </aside>

    {{-- ===== MAIN ===== --}}
    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden;">

        <header style="background:#1e293b; border-bottom:1px solid #334155; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:36px; height:36px; background:#1d4ed8; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0;">Panel del Docente</h2>
                    <p style="font-size:12px; color:#64748b; margin:0;">{{ $maestro->nombre_completo }}</p>
                </div>
            </div>
            <span style="font-size:12px; color:#475569;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            @if(session('success'))
            <div style="background:rgba(16,185,129,.15); border:1px solid rgba(16,185,129,.3); color:#34d399; padding:12px 16px; border-radius:10px; font-size:13px; margin-bottom:16px;">
                ✓ {{ session('success') }}
            </div>
            @endif

            {{-- Filtro --}}
            <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; padding:18px 20px; margin-bottom:20px;">
                <h3 style="font-size:14px; font-weight:600; margin:0 0 14px; color:#e2e8f0;">Seleccionar sección y materia</h3>
                <form method="GET" action="{{ route('docente.notas') }}" id="filtroForm">
                    <div style="display:flex; align-items:flex-end; gap:14px; flex-wrap:wrap;">
                        <div style="display:flex; flex-direction:column; gap:5px; min-width:300px;">
                            <label style="font-size:11px; color:#64748b; text-transform:uppercase; letter-spacing:.06em;">Sección / Materia</label>
                            <select name="detalle_curso_id"
                                    style="background:#0f172a; border:1px solid #334155; border-radius:8px; padding:9px 12px; color:#fff; font-size:13px; outline:none;"
                                    onfocus="this.style.borderColor='#3b82f6'" onblur="this.style.borderColor='#334155'"
                                    onchange="document.getElementById('filtroForm').submit()">
                                <option value="">-- Seleccionar --</option>
                                @foreach($cursos as $grupo)
                                    @foreach($detalleCursos->where('curso_id', $grupo['curso']->id) as $dc)
                                    <option value="{{ $dc->id }}" {{ $detalleCursoId == $dc->id ? 'selected' : '' }}>
                                        Sección {{ $grupo['curso']->seccion }} ({{ $grupo['curso']->nivel }}) — {{ $dc->materia->nombre }}
                                    </option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Tabla --}}
            @if($detalle && $alumnos->count() > 0)
            <form method="POST" action="{{ route('docente.notas.guardar') }}">
                @csrf
                <input type="hidden" name="detalle_curso_id" value="{{ $detalleCursoId }}">

                <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; overflow:hidden;">

                    <div style="padding:14px 20px; display:flex; align-items:center; justify-content:space-between; border-bottom:1px solid #334155;">
                        <div>
                            <p style="font-size:14px; font-weight:600; color:#e2e8f0; margin:0;">
                                Sección {{ $detalle->curso->seccion }}
                                <span style="color:#475569; font-weight:400; margin:0 4px;">·</span>
                                <span style="color:#60a5fa;">{{ $detalle->materia->nombre }}</span>
                            </p>
                            <p style="font-size:12px; color:#475569; margin:4px 0 0;">{{ $alumnos->count() }} alumnos · Turno {{ $detalle->curso->nivel }}</p>
                        </div>
                        <button type="submit" style="display:flex; align-items:center; gap:6px; padding:9px 16px; background:#3b82f6; border:none; border-radius:8px; color:#fff; font-size:13px; font-weight:600; cursor:pointer;"
                                onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                            Guardar notas
                        </button>
                    </div>

                    <div style="overflow-x:auto;">
                        <table style="width:100%; border-collapse:collapse; font-size:13px;">
                            <thead>
                                <tr style="background:#0f172a;">
                                    <th style="padding:10px 16px; text-align:left; color:#475569; font-weight:500; font-size:11px; text-transform:uppercase; width:32px;">#</th>
                                    <th style="padding:10px 12px; text-align:left; color:#475569; font-weight:500; font-size:11px; text-transform:uppercase;">Alumno</th>
                                    <th style="padding:10px 8px; text-align:center; color:#a78bfa; font-weight:600; font-size:11px; text-transform:uppercase; width:100px;">Laboratorio</th>
                                    <th style="padding:10px 8px; text-align:center; color:#fbbf24; font-weight:600; font-size:11px; text-transform:uppercase; width:100px;">Ex. Teórico</th>
                                    <th style="padding:10px 8px; text-align:center; color:#34d399; font-weight:600; font-size:11px; text-transform:uppercase; width:100px;">Práctica</th>
                                    <th style="padding:10px 8px; text-align:center; color:#f87171; font-weight:600; font-size:11px; text-transform:uppercase; width:90px;">SOS</th>
                                    <th style="padding:10px 8px; text-align:center; color:#e2e8f0; font-weight:700; font-size:11px; text-transform:uppercase; width:70px;">Promedio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($alumnos as $i => $alumno)
                                @php $nota = $notas->get($alumno->id); @endphp
                                <tr style="border-top:1px solid #0f172a;" class="nota-row" data-alumno="{{ $alumno->id }}"
                                    onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                                    <td style="padding:10px 16px; color:#334155;">{{ $i+1 }}</td>
                                    <td style="padding:10px 12px;">
                                        <div style="display:flex; align-items:center; gap:10px;">
                                            <div style="width:30px; height:30px; border-radius:50%; background:#1d4ed8; display:flex; align-items:center; justify-content:center; color:#fff; font-size:11px; font-weight:700; flex-shrink:0;">
                                                {{ strtoupper(substr($alumno->nombre,0,1)) }}
                                            </div>
                                            <div>
                                                <p style="font-size:13px; font-weight:500; color:#e2e8f0; margin:0;">{{ $alumno->nombre_completo }}</p>
                                                <p style="font-size:11px; color:#475569; margin:0;">{{ $alumno->codigo }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="padding:7px 8px; text-align:center;">
                                        <input type="number" name="notas[{{ $alumno->id }}][laboratorio]"
                                               value="{{ $nota?->laboratorio ?? '' }}"
                                               min="0" max="10" step="0.1" placeholder="—" class="nota-input"
                                               style="width:68px; text-align:center; background:#0f172a; border:1px solid #334155; border-radius:7px; padding:6px; color:#c4b5fd; font-size:13px; outline:none;"
                                               onfocus="this.style.borderColor='#7c3aed'" onblur="this.style.borderColor='#334155'"
                                               oninput="calcProm(this.closest('tr'))">
                                    </td>
                                    <td style="padding:7px 8px; text-align:center;">
                                        <input type="number" name="notas[{{ $alumno->id }}][examen_teorico]"
                                               value="{{ $nota?->examen_teorico ?? '' }}"
                                               min="0" max="10" step="0.1" placeholder="—" class="nota-input"
                                               style="width:68px; text-align:center; background:#0f172a; border:1px solid #334155; border-radius:7px; padding:6px; color:#fcd34d; font-size:13px; outline:none;"
                                               onfocus="this.style.borderColor='#b45309'" onblur="this.style.borderColor='#334155'"
                                               oninput="calcProm(this.closest('tr'))">
                                    </td>
                                    <td style="padding:7px 8px; text-align:center;">
                                        <input type="number" name="notas[{{ $alumno->id }}][practica]"
                                               value="{{ $nota?->practica ?? '' }}"
                                               min="0" max="10" step="0.1" placeholder="—" class="nota-input"
                                               style="width:68px; text-align:center; background:#0f172a; border:1px solid #334155; border-radius:7px; padding:6px; color:#6ee7b7; font-size:13px; outline:none;"
                                               onfocus="this.style.borderColor='#059669'" onblur="this.style.borderColor='#334155'"
                                               oninput="calcProm(this.closest('tr'))">
                                    </td>
                                    <td style="padding:7px 8px; text-align:center;">
                                        <input type="number" name="notas[{{ $alumno->id }}][sos]"
                                               value="{{ $nota?->sos ?? '' }}"
                                               min="0" max="10" step="0.1" placeholder="—" class="nota-input"
                                               style="width:68px; text-align:center; background:#0f172a; border:1px solid #334155; border-radius:7px; padding:6px; color:#fca5a5; font-size:13px; outline:none;"
                                               onfocus="this.style.borderColor='#dc2626'" onblur="this.style.borderColor='#334155'"
                                               oninput="calcProm(this.closest('tr'))">
                                    </td>
                                    <td style="padding:7px 8px; text-align:center;">
                                        <span id="prom-{{ $alumno->id }}"
                                              style="display:inline-flex; width:34px; height:34px; border-radius:50%; align-items:center; justify-content:center; font-size:13px; font-weight:700;
                                              {{ $nota?->promedio !== null ? 'background:'.promColor($nota->promedio).'; color:#fff;' : 'background:#1e3a5f; color:#334155;' }}">
                                            {{ $nota?->promedio ?? '—' }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div style="padding:12px 20px; display:flex; align-items:center; justify-content:space-between; border-top:1px solid #334155; background:#0f172a;">
                        <p style="font-size:12px; color:#334155; margin:0;">Promedio = promedio de notas ingresadas · redondeado sin decimales (9.4→9, 9.5→10)</p>
                        <button type="submit" style="display:flex; align-items:center; gap:6px; padding:9px 16px; background:#3b82f6; border:none; border-radius:8px; color:#fff; font-size:13px; font-weight:600; cursor:pointer;"
                                onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/></svg>
                            Guardar
                        </button>
                    </div>
                </div>
            </form>

            @elseif(!$detalleCursoId)
            <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; padding:52px; text-align:center;">
                <div style="width:54px; height:54px; background:#0f172a; border-radius:14px; display:flex; align-items:center; justify-content:center; margin:0 auto 16px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <p style="font-size:15px; font-weight:600; color:#e2e8f0; margin:0 0 6px;">Selecciona un grupo para comenzar</p>
                <p style="font-size:13px; color:#475569; margin:0;">Elige la sección y materia en el selector de arriba.</p>
            </div>
            @else
            <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; padding:40px; text-align:center;">
                <p style="color:#475569; font-size:13px;">No hay alumnos inscritos en esta sección.</p>
            </div>
            @endif

        </div>
    </div>
</div>

<script>
function promColor(p) {
    if (p >= 9) return '#059669';
    if (p >= 7) return '#d97706';
    if (p >= 6) return '#ea580c';
    return '#dc2626';
}
function calcProm(row) {
    const inputs = row.querySelectorAll('.nota-input');
    const vals = [];
    inputs.forEach(i => {
        const v = parseFloat(i.value);
        if (!isNaN(v) && i.value.trim() !== '') vals.push(Math.min(10, Math.max(0, v)));
    });
    const badge = document.getElementById('prom-' + row.dataset.alumno);
    if (!vals.length) {
        badge.textContent = '—';
        badge.style.background = '#1e3a5f';
        badge.style.color = '#334155';
        return;
    }
    const p = Math.round(vals.reduce((a,b) => a+b, 0) / vals.length);
    badge.textContent = p;
    badge.style.background = promColor(p);
    badge.style.color = '#fff';
}
</script>
</x-app-layout>

@php
function promColor(int $p): string {
    if ($p >= 9) return '#059669';
    if ($p >= 7) return '#d97706';
    if ($p >= 6) return '#ea580c';
    return '#dc2626';
}
@endphp
