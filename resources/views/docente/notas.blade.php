<x-app-layout>
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}
{{-- VISTA: DOCENTE - REGISTRO DE NOTAS --}}
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}

<div style="display:flex; height:100vh; overflow:hidden;">

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- DOCENTE: SIDEBAR --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <aside style="width:220px; flex-shrink:0; background:#ffffff; border-right:1px solid #e5e7eb; display:flex; flex-direction:column; padding:20px 12px; gap:2px;">

        <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px; padding-bottom:16px; border-bottom:1px solid #e5e7eb;">
            <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" style="width:38px; height:38px; border-radius:10px; flex-shrink:0; object-fit:cover;">
            <div>
                <p style="font-weight:700; font-size:14px; color:#1f2937;">ITM Aguilares</p>
                <p style="font-size:11px; color:#6b7280;">Sistema Académico</p>
            </div>
        </div>

        <p style="font-size:9px; color:#9ca3af; text-transform:uppercase; letter-spacing:.1em; font-weight:600; padding:10px 8px 3px;">Académico</p>
        <a href="{{ route('docente.notas') }}" style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; font-weight:600; background:rgba(59,130,246,.1); color:#1d4ed8; text-decoration:none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            Registro de notas
        </a>

        <div style="margin-top:auto; padding-top:14px; border-top:1px solid #e5e7eb; display:flex; align-items:center; gap:10px;">
            <div style="width:32px; height:32px; border-radius:50%; background:#3b82f6; display:flex; align-items:center; justify-content:center; color:#fff; font-size:12px; font-weight:700; flex-shrink:0;">
                {{ strtoupper(substr($maestro->nombre,0,1).substr($maestro->apellido,0,1)) }}
            </div>
            <div style="flex:1; overflow:hidden;">
                <p style="font-size:13px; font-weight:500; color:#1f2937; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $maestro->nombre_completo }}</p>
                <p style="font-size:11px; color:#6b7280;">Docente</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" title="Salir" style="background:none; border:none; cursor:pointer; color:#6b7280; padding:4px;"
                        onmouseover="this.style.color='#ef4444'" onmouseout="this.style.color='#6b7280'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                </button>
            </form>
        </div>
    </aside>

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- DOCENTE: CONTENIDO PRINCIPAL --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#ffffff;">

        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:36px; height:36px; background:#3b82f6; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#1f2937;">Panel del Docente</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">{{ $maestro->nombre_completo }}</p>
                </div>
            </div>
            <span style="font-size:12px; color:#6b7280;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            @if(session('success'))
            <div style="background:#dcfce7; border:1px solid #86efac; color:#16a34a; padding:12px 16px; border-radius:10px; font-size:13px; margin-bottom:16px;">
                ✓ {{ session('success') }}
            </div>
            @endif

            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            {{-- DOCENTE: FILTROS (Curso y Materia) --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:18px 20px; margin-bottom:20px;">
                <h3 style="font-size:14px; font-weight:600; margin:0 0 14px; color:#1f2937;">Seleccionar curso y materia</h3>

                <form method="GET" action="{{ route('docente.notas') }}" id="filtroForm">
                    <input type="hidden" name="detalle_curso_id" id="inputDetalleCursoId" value="{{ $detalleCursoId }}">
                </form>

                <div style="display:flex; align-items:flex-end; gap:14px; flex-wrap:wrap;">

                    {{-- Combobox 1: Curso --}}
                    <div style="display:flex; flex-direction:column; gap:5px; min-width:220px;">
                        <label style="font-size:11px; color:#6b7280; text-transform:uppercase; letter-spacing:.06em;">Curso</label>
                        <select id="selectCurso"
                                style="background:#ffffff; border:1px solid #d1d5db; border-radius:8px; padding:9px 12px; color:#1f2937; font-size:13px; outline:none; cursor:pointer;"
                                onfocus="this.style.borderColor='#3b82f6'" onblur="this.style.borderColor='#d1d5db'"
                                onchange="filtrarMaterias()">
                            <option value="">-- Seleccionar curso --</option>
                            @foreach($cursos as $grupo)
                            <option value="{{ $grupo['curso']->id }}"
                                {{ $cursoSeleccionado == $grupo['curso']->id ? 'selected' : '' }}>
                                Sección {{ $grupo['curso']->seccion }} — {{ $grupo['curso']->nivel }} ({{ $grupo['curso']->anio }})
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Combobox 2: Materia --}}
                    <div style="display:flex; flex-direction:column; gap:5px; min-width:220px;">
                        <label style="font-size:11px; color:#6b7280; text-transform:uppercase; letter-spacing:.06em;">Materia</label>
                        <select id="selectMateria"
                                style="background:#ffffff; border:1px solid #d1d5db; border-radius:8px; padding:9px 12px; color:#1f2937; font-size:13px; outline:none; cursor:pointer;"
                                onfocus="this.style.borderColor='#3b82f6'" onblur="this.style.borderColor='#d1d5db'">
                            <option value="">-- Primero selecciona un curso --</option>
                            @foreach($detalleCursos as $dc)
                            <option value="{{ $dc->id }}"
                                    data-curso="{{ $dc->curso_id }}"
                                    {{ $detalleCursoId == $dc->id ? 'selected' : '' }}
                                    style="display:none;">
                                {{ $dc->materia->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Botón buscar --}}
                    <div>
                        <button type="button" onclick="submitFiltro()"
                                style="padding:9px 18px; background:#3b82f6; border:none; border-radius:8px; color:#fff; font-size:13px; font-weight:600; cursor:pointer;"
                                onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
                            Buscar
                        </button>
                    </div>

                </div>
            </div>

            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            {{-- DOCENTE: TABLA DE NOTAS --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            @if($detalle && $alumnos->count() > 0)
            <form method="POST" action="{{ route('docente.notas.guardar') }}">
                @csrf
                <input type="hidden" name="detalle_curso_id" value="{{ $detalleCursoId }}">

                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden;">
                    <div style="padding:14px 20px; display:flex; align-items:center; justify-content:space-between; border-bottom:1px solid #e5e7eb;">
                        <div>
                            <p style="font-size:14px; font-weight:600; color:#1f2937; margin:0;">
                                Sección {{ $detalle->curso->seccion }}
                                <span style="color:#9ca3af; font-weight:400; margin:0 4px;">·</span>
                                <span style="color:#3b82f6;">{{ $detalle->materia->nombre }}</span>
                            </p>
                            <p style="font-size:12px; color:#6b7280; margin:4px 0 0;">{{ $alumnos->count() }} alumnos · Turno {{ $detalle->curso->nivel }}</p>
                        </div>
                        <button type="submit" style="display:flex; align-items:center; gap:6px; padding:9px 16px; background:#3b82f6; border:none; border-radius:8px; color:#fff; font-size:13px; font-weight:600; cursor:pointer;"
                                onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
                            Guardar notas
                        </button>
                    </div>

                    <div style="overflow-x:auto;">
                        <table style="width:100%; border-collapse:collapse; font-size:13px;">
                            <thead>
                                <tr style="background:#f3f4f6;">
                                    <th style="padding:10px 16px; text-align:left; color:#6b7280; font-weight:500; font-size:11px; text-transform:uppercase;">#</th>
                                    <th style="padding:10px 12px; text-align:left; color:#6b7280; font-weight:500; font-size:11px; text-transform:uppercase;">Alumno</th>
                                    <th style="padding:10px 8px; text-align:center; color:#8b5cf6; font-weight:600; font-size:11px; text-transform:uppercase; width:100px;">Laboratorio</th>
                                    <th style="padding:10px 8px; text-align:center; color:#f59e0b; font-weight:600; font-size:11px; text-transform:uppercase; width:100px;">Ex. Teórico</th>
                                    <th style="padding:10px 8px; text-align:center; color:#10b981; font-weight:600; font-size:11px; text-transform:uppercase; width:100px;">Práctica</th>
                                    <th style="padding:10px 8px; text-align:center; color:#ef4444; font-weight:600; font-size:11px; text-transform:uppercase; width:90px;">SOS</th>
                                    <th style="padding:10px 8px; text-align:center; color:#1f2937; font-weight:700; font-size:11px; text-transform:uppercase; width:70px;">Promedio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($alumnos as $i => $alumno)
                                @php $nota = $notas->get($alumno->id); @endphp
                                <tr style="border-top:1px solid #f3f4f6;" class="nota-row" data-alumno="{{ $alumno->id }}"
                                    onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='transparent'">
                                    <td style="padding:10px 16px; color:#9ca3af;">{{ $i+1 }}</td>
                                    <td style="padding:10px 12px;">
                                        <div style="display:flex; align-items:center; gap:10px;">
                                            <div style="width:30px; height:30px; border-radius:50%; background:#3b82f6; display:flex; align-items:center; justify-content:center; color:#fff; font-size:11px; font-weight:700; flex-shrink:0;">
                                                {{ strtoupper(substr($alumno->nombre,0,1)) }}
                                            </div>
                                            <div>
                                                <p style="font-size:13px; font-weight:500; color:#1f2937; margin:0;">{{ $alumno->nombre_completo }}</p>
                                                <p style="font-size:11px; color:#6b7280; margin:0;">{{ $alumno->codigo }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="padding:7px 8px; text-align:center;">
                                        <input type="number" name="notas[{{ $alumno->id }}][laboratorio]" value="{{ $nota?->laboratorio ?? '' }}"
                                               min="0" max="10" step="0.1" placeholder="—" class="nota-input"
                                               style="width:68px; text-align:center; background:#ffffff; border:1px solid #d1d5db; border-radius:7px; padding:6px; color:#8b5cf6; font-size:13px; outline:none;"
                                               onfocus="this.style.borderColor='#8b5cf6'" onblur="this.style.borderColor='#d1d5db'"
                                               oninput="calcProm(this.closest('tr'))">
                                    </td>
                                    <td style="padding:7px 8px; text-align:center;">
                                        <input type="number" name="notas[{{ $alumno->id }}][examen_teorico]" value="{{ $nota?->examen_teorico ?? '' }}"
                                               min="0" max="10" step="0.1" placeholder="—" class="nota-input"
                                               style="width:68px; text-align:center; background:#ffffff; border:1px solid #d1d5db; border-radius:7px; padding:6px; color:#f59e0b; font-size:13px; outline:none;"
                                               onfocus="this.style.borderColor='#f59e0b'" onblur="this.style.borderColor='#d1d5db'"
                                               oninput="calcProm(this.closest('tr'))">
                                    </td>
                                    <td style="padding:7px 8px; text-align:center;">
                                        <input type="number" name="notas[{{ $alumno->id }}][practica]" value="{{ $nota?->practica ?? '' }}"
                                               min="0" max="10" step="0.1" placeholder="—" class="nota-input"
                                               style="width:68px; text-align:center; background:#ffffff; border:1px solid #d1d5db; border-radius:7px; padding:6px; color:#10b981; font-size:13px; outline:none;"
                                               onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#d1d5db'"
                                               oninput="calcProm(this.closest('tr'))">
                                    </td>
                                    <td style="padding:7px 8px; text-align:center;">
                                        <input type="number" name="notas[{{ $alumno->id }}][sos]" value="{{ $nota?->sos ?? '' }}"
                                               min="0" max="10" step="0.1" placeholder="—" class="nota-input"
                                               style="width:68px; text-align:center; background:#ffffff; border:1px solid #d1d5db; border-radius:7px; padding:6px; color:#ef4444; font-size:13px; outline:none;"
                                               onfocus="this.style.borderColor='#ef4444'" onblur="this.style.borderColor='#d1d5db'"
                                               oninput="calcProm(this.closest('tr'))">
                                    </td>
                                    <td style="padding:7px 8px; text-align:center;">
                                        <span id="prom-{{ $alumno->id }}"
                                              style="display:inline-flex; width:34px; height:34px; border-radius:50%; align-items:center; justify-content:center; font-size:13px; font-weight:700;
                                              {{ $nota?->promedio !== null ? 'background:'.promColor($nota->promedio).'; color:#fff;' : 'background:#f3f4f6; color:#9ca3af;' }}">
                                            {{ $nota?->promedio ?? '—' }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div style="padding:12px 20px; display:flex; align-items:center; justify-content:space-between; border-top:1px solid #e5e7eb; background:#f9fafb;">
                        <p style="font-size:12px; color:#6b7280; margin:0;">Promedio = promedio de notas ingresadas · redondeado a entero</p>
                        <button type="submit" style="display:flex; align-items:center; gap:6px; padding:9px 16px; background:#3b82f6; border:none; border-radius:8px; color:#fff; font-size:13px; font-weight:600; cursor:pointer;"
                                onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
                            Guardar
                        </button>
                    </div>
                </div>
            </form>

            @elseif(!$detalleCursoId)
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:52px; text-align:center;">
                <div style="width:54px; height:54px; background:#f3f4f6; border-radius:14px; display:flex; align-items:center; justify-content:center; margin:0 auto 16px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <p style="font-size:15px; font-weight:600; color:#1f2937; margin:0 0 6px;">Selecciona un curso y materia para comenzar</p>
                <p style="font-size:13px; color:#6b7280; margin:0;">Elige primero el curso y luego la materia.</p>
            </div>
            @else
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:40px; text-align:center;">
                <p style="color:#6b7280; font-size:13px;">No hay alumnos inscritos en esta sección.</p>
            </div>
            @endif

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const cursoId = document.getElementById('selectCurso').value;
    if (cursoId) mostrarMaterias(cursoId);
});

function filtrarMaterias() {
    const cursoId = document.getElementById('selectCurso').value;
    const selectMateria = document.getElementById('selectMateria');

    selectMateria.value = '';

    if (!cursoId) {
        selectMateria.querySelectorAll('option[data-curso]').forEach(o => o.style.display = 'none');
        selectMateria.querySelector('option[value=""]').textContent = '-- Primero selecciona un curso --';
        return;
    }

    mostrarMaterias(cursoId);
}

function mostrarMaterias(cursoId) {
    const selectMateria = document.getElementById('selectMateria');
    const options = selectMateria.querySelectorAll('option[data-curso]');

    selectMateria.querySelector('option[value=""]').textContent = '-- Seleccionar materia --';

    options.forEach(opt => {
        opt.style.display = opt.dataset.curso === cursoId ? '' : 'none';
    });
}

function submitFiltro() {
    const detalleCursoId = document.getElementById('selectMateria').value;
    if (!detalleCursoId) return;
    document.getElementById('inputDetalleCursoId').value = detalleCursoId;
    document.getElementById('filtroForm').submit();
}

function promColor(p) {
    if (p >= 9) return '#10b981';
    if (p >= 7) return '#f59e0b';
    if (p >= 6) return '#f97316';
    return '#ef4444';
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
        badge.style.background = '#f3f4f6';
        badge.style.color = '#9ca3af';
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
    if ($p >= 9) return '#10b981';
    if ($p >= 7) return '#f59e0b';
    if ($p >= 6) return '#f97316';
    return '#ef4444';
}
@endphp
