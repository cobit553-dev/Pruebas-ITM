<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">
    @include('components.admin-sidebar', ['active' => 'mensualidades'])

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#f8fafc;">

        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:40px; height:40px; border-radius:12px; overflow:hidden; border:1px solid #e5e7eb;">
                    <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">Mensualidades</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">Control de pagos · $25.00 mensuales</p>
                </div>
            </div>
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="font-size:12px; color:#9ca3af; background:#f3f4f6; padding:6px 12px; border-radius:8px;">{{ now()->isoFormat('MMMM YYYY') }}</span>
                <button onclick="abrirModalGenerar()"
                    style="background:#111827; border:none; padding:8px 16px; border-radius:8px; color:#fff; font-size:12px; font-weight:600; cursor:pointer;"
                    onmouseover="this.style.background='#374151'" onmouseout="this.style.background='#111827'">
                    + Generar mensualidades
                </button>
            </div>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            @if(session('success'))
            <div style="background:#dcfce7; border:1px solid #86efac; border-radius:10px; padding:12px 16px; font-size:13px; color:#16a34a; margin-bottom:16px; display:flex; align-items:center; gap:8px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div style="background:#fef2f2; border:1px solid #fecaca; border-radius:10px; padding:12px 16px; font-size:13px; color:#dc2626; margin-bottom:16px;">
                {{ session('error') }}
            </div>
            @endif

            {{-- Stats --}}
            <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:14px; margin-bottom:20px;">
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:16px 20px; display:flex; align-items:center; gap:14px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#eff6ff; display:flex; align-items:center; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#3b82f6" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                    </div>
                    <div>
                        <p style="font-size:22px; font-weight:700; color:#111827; margin:0;">{{ $totalAlumnos }}</p>
                        <p style="font-size:12px; color:#6b7280; margin:0;">Alumnos inscritos</p>
                    </div>
                </div>
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:16px 20px; display:flex; align-items:center; gap:14px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#f0fdf4; display:flex; align-items:center; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#16a34a" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    </div>
                    <div>
                        <p style="font-size:22px; font-weight:700; color:#111827; margin:0;">${{ number_format($totalPagado, 2) }}</p>
                        <p style="font-size:12px; color:#6b7280; margin:0;">Total cobrado</p>
                    </div>
                </div>
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:16px 20px; display:flex; align-items:center; gap:14px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fef3c7; display:flex; align-items:center; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#d97706" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div>
                        <p style="font-size:22px; font-weight:700; color:#111827; margin:0;">${{ number_format($totalPendiente, 2) }}</p>
                        <p style="font-size:12px; color:#6b7280; margin:0;">Pendiente de cobro</p>
                    </div>
                </div>
            </div>

            {{-- Buscador y filtros --}}
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:14px 20px; margin-bottom:16px; display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
                <div style="position:relative; flex:1; min-width:200px; max-width:320px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24" style="position:absolute; left:10px; top:50%; transform:translateY(-50%); pointer-events:none;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <input type="text" id="buscarAlumno" placeholder="Buscar alumno..."
                        style="width:100%; padding:8px 12px 8px 30px; font-size:13px; border:1px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#111827; outline:none; box-sizing:border-box;"
                        oninput="filtrarMensualidades()"
                        onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <select id="filtrarCurso" onchange="filtrarMensualidades()"
                    style="padding:8px 12px; font-size:13px; border:1px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#111827; outline:none; cursor:pointer;">
                    <option value="">Todos los cursos</option>
                    @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nombre }} — {{ $curso->nivel }}</option>
                    @endforeach
                </select>
                <select id="filtrarMes" onchange="filtrarMensualidades()"
                    style="padding:8px 12px; font-size:13px; border:1px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#111827; outline:none; cursor:pointer;">
                    <option value="">Todos los meses</option>
                    @foreach($meses as $num => $nombre)
                    <option value="{{ $nombre }}">{{ $nombre }}</option>
                    @endforeach
                </select>
                <select id="filtrarEstado" onchange="filtrarMensualidades()"
                    style="padding:8px 12px; font-size:13px; border:1px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#111827; outline:none; cursor:pointer;">
                    <option value="">Todos los estados</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Pagado">Pagado</option>
                </select>
                <button onclick="limpiarFiltros()"
                    style="padding:8px 14px; background:none; border:1px solid #e5e7eb; border-radius:8px; font-size:12px; color:#6b7280; cursor:pointer;"
                    onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='none'">
                    ✕ Limpiar
                </button>
                <p id="contadorMensualidades" style="font-size:12px; color:#9ca3af; margin:0; white-space:nowrap;"></p>
            </div>

            {{-- Tabla agrupada por curso --}}
            @forelse($cursos as $curso)
            @php $inscripciones = $curso->inscripciones; @endphp
            @if($inscripciones->count() > 0)
            <div class="grupo-curso" data-curso="{{ $curso->id }}"
                style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden; margin-bottom:16px;">

                <div style="padding:14px 20px; background:#f9fafb; border-bottom:1px solid #e5e7eb; display:flex; align-items:center; gap:10px;">
                    <div style="width:32px; height:32px; border-radius:8px; background:#111827; display:flex; align-items:center; justify-content:center; color:#fff; font-size:12px; font-weight:700;">
                        {{ $curso->seccion }}
                    </div>
                    <div>
                        <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">{{ $curso->nombre }}</p>
                        <p style="font-size:11px; color:#6b7280; margin:0;">{{ $curso->nivel }} · {{ $inscripciones->count() }} alumnos</p>
                    </div>
                </div>

                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background:#fafafa; border-bottom:1px solid #e5e7eb;">
                            <th style="padding:10px 20px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Alumno</th>
                            <th style="padding:10px 20px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Mes</th>
                            <th style="padding:10px 20px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Monto</th>
                            <th style="padding:10px 20px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Estado</th>
                            <th style="padding:10px 20px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Vencimiento</th>
                            <th style="padding:10px 20px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inscripciones as $ins)
                        @php
                            $mensualidadesAlumno = \App\Models\Mensualidad::where('alumno_id', $ins->alumno_id)
                                ->orderByRaw("FIELD(mes, 'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre')")
                                ->get();
                        @endphp
                        @if($mensualidadesAlumno->count() > 0)
                            @foreach($mensualidadesAlumno as $m)
                            <tr class="fila-mensualidad"
                                data-nombre="{{ strtolower($ins->alumno->nombre_completo) }}"
                                data-curso="{{ $curso->id }}"
                                data-mes="{{ $m->mes }}"
                                data-estado="{{ $m->estado }}"
                                style="border-top:1px solid #f1f5f9; background:{{ $loop->even ? '#f8fafc' : '#ffffff' }};"
                                onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='{{ $loop->even ? '#f8fafc' : '#ffffff' }}'">
                                <td style="padding:11px 20px;">
                                    <div style="display:flex; align-items:center; gap:8px;">
                                        <div style="width:28px; height:28px; border-radius:50%; background:#111827; display:flex; align-items:center; justify-content:center; color:#fff; font-size:10px; font-weight:700; flex-shrink:0;">
                                            {{ strtoupper(substr($ins->alumno->nombre,0,1).substr($ins->alumno->apellido,0,1)) }}
                                        </div>
                                        <span style="font-size:13px; font-weight:500; color:#111827;">{{ $ins->alumno->nombre_completo }}</span>
                                    </div>
                                </td>
                                <td style="padding:11px 20px; font-size:13px; color:#374151; font-weight:500;">{{ $m->mes }}</td>
                                <td style="padding:11px 20px; text-align:center; font-size:13px; font-weight:600; color:#111827;">${{ number_format($m->monto, 2) }}</td>
                                <td style="padding:11px 20px; text-align:center;">
                                    @if($m->estado === 'Pagado')
                                        <span style="background:#f0fdf4; color:#16a34a; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600;">● Pagado</span>
                                    @else
                                        <span style="background:#fef3c7; color:#d97706; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600;">● Pendiente</span>
                                    @endif
                                </td>
                                <td style="padding:11px 20px; text-align:center; font-size:12px; color:#6b7280;">
                                    {{ \Carbon\Carbon::parse($m->fecha_vencimiento)->format('d/m/Y') }}
                                </td>
                                <td style="padding:11px 20px; text-align:center;">
                                    @if($m->estado === 'Pendiente')
                                    {{-- Cobrar --}}
                                    <form method="POST" action="{{ route('admin.mensualidades.pagar', $m->id) }}">
                                        @csrf
                                        <button type="submit"
                                            style="background:#f0fdf4; border:1px solid #86efac; color:#16a34a; font-size:12px; font-weight:600; padding:5px 14px; border-radius:6px; cursor:pointer;"
                                            onmouseover="this.style.background='#dcfce7'" onmouseout="this.style.background='#f0fdf4'"
                                            onclick="return confirm('¿Registrar pago de $25.00 para {{ addslashes($ins->alumno->nombre) }}?')">
                                            ✓ Cobrar
                                        </button>
                                    </form>
                                    @else
                                    {{-- Revertir --}}
                                    <form method="POST" action="{{ route('admin.mensualidades.revertir', $m->id) }}">
                                        @csrf
                                        <button type="submit"
                                            style="background:#fef2f2; border:1px solid #fecaca; color:#dc2626; font-size:12px; font-weight:600; padding:5px 14px; border-radius:6px; cursor:pointer;"
                                            onmouseover="this.style.background='#fee2e2'" onmouseout="this.style.background='#fef2f2'"
                                            onclick="return confirm('¿Revertir el pago de {{ addslashes($ins->alumno->nombre) }} ({{ $m->mes }})? Volverá a estado Pendiente.')">
                                            ↩ Revertir
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr class="fila-mensualidad"
                                data-nombre="{{ strtolower($ins->alumno->nombre_completo) }}"
                                data-curso="{{ $curso->id }}"
                                data-mes=""
                                data-estado=""
                                style="border-top:1px solid #f1f5f9; background:#ffffff;">
                                <td style="padding:11px 20px;">
                                    <div style="display:flex; align-items:center; gap:8px;">
                                        <div style="width:28px; height:28px; border-radius:50%; background:#d1d5db; display:flex; align-items:center; justify-content:center; color:#fff; font-size:10px; font-weight:700; flex-shrink:0;">
                                            {{ strtoupper(substr($ins->alumno->nombre,0,1).substr($ins->alumno->apellido,0,1)) }}
                                        </div>
                                        <span style="font-size:13px; color:#6b7280;">{{ $ins->alumno->nombre_completo }}</span>
                                    </div>
                                </td>
                                <td colspan="5" style="padding:11px 20px; font-size:12px; color:#9ca3af;">
                                    Sin mensualidades generadas — usa "+ Generar mensualidades" para crearlas
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            @empty
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:60px; text-align:center; color:#9ca3af; font-size:13px;">
                No hay cursos activos con alumnos inscritos.
            </div>
            @endforelse

        </div>
    </div>
</div>

@include('admin.partials.modal-generar-mensualidades')

<script>
function abrirModalGenerar() {
    document.getElementById('modalGenerar').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function cerrarModalGenerar() {
    document.getElementById('modalGenerar').style.display = 'none';
    document.body.style.overflow = '';
    toggleAlumno('todos');
    document.getElementById('filtroCursoModal').value = '';
    filtrarAlumnosModal();
}

function toggleAlumno(tipo) {
    const esUno = tipo === 'uno';
    document.getElementById('radioTodos').checked = !esUno;
    document.getElementById('radioUno').checked   =  esUno;
    document.getElementById('selectAlumnoDiv').style.display = esUno ? 'block' : 'none';
    document.getElementById('selectAlumno').required         =  esUno;
    document.getElementById('btnTodos').style.borderColor = esUno ? '#e5e7eb' : '#111827';
    document.getElementById('btnTodos').style.background  = esUno ? '#ffffff'  : '#f3f4f6';
    document.getElementById('btnTodos').style.color       = esUno ? '#6b7280'  : '#111827';
    document.getElementById('btnUno').style.borderColor = esUno ? '#111827' : '#e5e7eb';
    document.getElementById('btnUno').style.background  = esUno ? '#f3f4f6'  : '#ffffff';
    document.getElementById('btnUno').style.color       = esUno ? '#111827'  : '#6b7280';
}

function filtrarAlumnosModal() {
    const cursoId = document.getElementById('filtroCursoModal').value;
    const select  = document.getElementById('selectAlumno');
    const options = select.querySelectorAll('option[data-curso]');
    const msg     = document.getElementById('sinAlumnosMsg');
    let visibles  = 0;

    select.value = '';

    options.forEach(opt => {
        if (!cursoId || opt.dataset.curso === cursoId) {
            opt.style.display = '';
            visibles++;
        } else {
            opt.style.display = 'none';
        }
    });

    const placeholder = select.querySelector('option[value=""]');
    if (!cursoId) {
        placeholder.textContent = '— Selecciona un curso primero —';
    } else if (visibles === 0) {
        placeholder.textContent = '— Sin alumnos en este curso —';
    } else {
        placeholder.textContent = '— Seleccionar alumno —';
    }

    msg.style.display = (cursoId && visibles === 0) ? 'block' : 'none';
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('modalGenerar').addEventListener('click', function(e) {
        if (e.target === this) cerrarModalGenerar();
    });
});

function filtrarMensualidades() {
    const nombre  = document.getElementById('buscarAlumno').value.toLowerCase().trim();
    const curso   = document.getElementById('filtrarCurso').value;
    const mes     = document.getElementById('filtrarMes').value;
    const estado  = document.getElementById('filtrarEstado').value;
    const filas   = document.querySelectorAll('.fila-mensualidad');
    const grupos  = document.querySelectorAll('.grupo-curso');
    let visibles  = 0;

    filas.forEach(fila => {
        const okNombre = !nombre || fila.dataset.nombre.includes(nombre);
        const okCurso  = !curso  || fila.dataset.curso === curso;
        const okMes    = !mes    || fila.dataset.mes === mes;
        const okEstado = !estado || fila.dataset.estado === estado;
        if (okNombre && okCurso && okMes && okEstado) {
            fila.style.display = '';
            visibles++;
        } else {
            fila.style.display = 'none';
        }
    });

    grupos.forEach(grupo => {
        const filasVisibles = grupo.querySelectorAll('.fila-mensualidad:not([style*="display: none"])');
        grupo.style.display = filasVisibles.length === 0 ? 'none' : '';
    });

    const hayFiltro = nombre || curso || mes || estado;
    document.getElementById('contadorMensualidades').textContent = hayFiltro ? visibles + ' resultado(s)' : '';
}

function limpiarFiltros() {
    document.getElementById('buscarAlumno').value  = '';
    document.getElementById('filtrarCurso').value  = '';
    document.getElementById('filtrarMes').value    = '';
    document.getElementById('filtrarEstado').value = '';
    document.getElementById('contadorMensualidades').textContent = '';
    document.querySelectorAll('.fila-mensualidad').forEach(f => f.style.display = '');
    document.querySelectorAll('.grupo-curso').forEach(g => g.style.display = '');
}
</script>
</x-app-layout>
