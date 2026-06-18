<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">
    @include('components.admin-sidebar', ['active' => 'pagos'])

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#f8fafc;">
        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:40px; height:40px; border-radius:12px; overflow:hidden; border:1px solid #e5e7eb;">
                    <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">Historial de Pagos</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;" id="contadorHeader">{{ $pagos->count() }} pagos registrados</p>
                </div>
            </div>
            <span style="font-size:12px; color:#9ca3af; background:#f3f4f6; padding:6px 12px; border-radius:8px;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            @if(session('success'))
            <div style="background:#dcfce7; border:1px solid #86efac; border-radius:10px; padding:12px 16px; font-size:13px; color:#16a34a; margin-bottom:16px; display:flex; align-items:center; gap:8px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                {{ session('success') }}
            </div>
            @endif

            {{-- Stats --}}
            @php
                $totalRecaudado  = $pagos->sum('monto_pagado');
                $pagosMesActual  = $pagos->filter(fn($p) => \Carbon\Carbon::parse($p->fecha_pago)->month === now()->month)->count();
                $recaudadoMes    = $pagos->filter(fn($p) => \Carbon\Carbon::parse($p->fecha_pago)->month === now()->month)->sum('monto_pagado');
            @endphp
            <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:14px; margin-bottom:20px;">
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:16px 20px; display:flex; align-items:center; gap:14px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#f0fdf4; display:flex; align-items:center; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#16a34a" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    </div>
                    <div>
                        <p style="font-size:22px; font-weight:700; color:#111827; margin:0;">${{ number_format($totalRecaudado, 2) }}</p>
                        <p style="font-size:12px; color:#6b7280; margin:0;">Total recaudado</p>
                    </div>
                </div>
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:16px 20px; display:flex; align-items:center; gap:14px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#eff6ff; display:flex; align-items:center; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#3b82f6" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    </div>
                    <div>
                        <p style="font-size:22px; font-weight:700; color:#111827; margin:0;">${{ number_format($recaudadoMes, 2) }}</p>
                        <p style="font-size:12px; color:#6b7280; margin:0;">Recaudado este mes</p>
                    </div>
                </div>
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:16px 20px; display:flex; align-items:center; gap:14px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fef3c7; display:flex; align-items:center; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#d97706" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><polyline points="23 11 17 11"/></svg>
                    </div>
                    <div>
                        <p style="font-size:22px; font-weight:700; color:#111827; margin:0;">{{ $pagosMesActual }}</p>
                        <p style="font-size:12px; color:#6b7280; margin:0;">Pagos este mes</p>
                    </div>
                </div>
            </div>

            {{-- Buscador y filtros --}}
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:14px 20px; margin-bottom:16px; display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
                <div style="position:relative; flex:1; min-width:200px; max-width:320px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24" style="position:absolute; left:10px; top:50%; transform:translateY(-50%); pointer-events:none;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <input type="text" id="buscarAlumno" placeholder="Buscar alumno..."
                        style="width:100%; padding:8px 12px 8px 30px; font-size:13px; border:1px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#111827; outline:none; box-sizing:border-box;"
                        oninput="filtrarPagos()"
                        onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <select id="filtrarMes" onchange="filtrarPagos()"
                    style="padding:8px 12px; font-size:13px; border:1px solid #e5e7eb; border-radius:8px; background:#f9fafb; color:#111827; outline:none; cursor:pointer;">
                    <option value="">Todos los meses</option>
                    @foreach(['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'] as $mes)
                    <option value="{{ $mes }}">{{ $mes }}</option>
                    @endforeach
                </select>
                <button onclick="limpiarFiltros()"
                    style="padding:8px 14px; background:none; border:1px solid #e5e7eb; border-radius:8px; font-size:12px; color:#6b7280; cursor:pointer;"
                    onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='none'">
                    ✕ Limpiar
                </button>
                <p id="contadorResultados" style="font-size:12px; color:#9ca3af; margin:0; white-space:nowrap;"></p>
            </div>

            {{-- Tabla --}}
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden;">
                <div style="padding:16px 24px; border-bottom:1px solid #e5e7eb; display:flex; align-items:center; gap:8px;">
                    <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                    <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">Listado de Pagos</p>
                </div>
                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background:#f9fafb; border-bottom:1px solid #e5e7eb;">
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">#</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Alumno</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Curso</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Mes</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Fecha de pago</th>
                            <th style="padding:11px 24px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Monto</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Observación</th>
                        </tr>
                    </thead>
                    <tbody id="tablaPagos">
                        @forelse($pagos as $pago)
                        @php
                            $alumno = $pago->mensualidad?->alumno;
                            $curso  = $pago->mensualidad?->mensualidad?->curso
                                   ?? \App\Models\Inscripcion::where('alumno_id', $alumno?->id)
                                        ->where('activa', 1)
                                        ->with('curso')
                                        ->first()?->curso;
                        @endphp
                        <tr class="fila-pago"
                            data-nombre="{{ strtolower($alumno?->nombre_completo ?? '') }}"
                            data-mes="{{ $pago->mensualidad?->mes ?? '' }}"
                            style="border-top:1px solid #f1f5f9; background:{{ $loop->even ? '#f8fafc' : '#ffffff' }};"
                            onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='{{ $loop->even ? '#f8fafc' : '#ffffff' }}'">
                            <td style="padding:13px 24px; color:#6b7280; font-size:13px;">{{ $loop->iteration }}</td>
                            <td style="padding:13px 24px;">
                                <div style="display:flex; align-items:center; gap:10px;">
                                    <div style="width:32px; height:32px; border-radius:50%; background:#111827; display:flex; align-items:center; justify-content:center; color:#fff; font-size:11px; font-weight:700; flex-shrink:0;">
                                        {{ $alumno ? strtoupper(substr($alumno->nombre,0,1).substr($alumno->apellido,0,1)) : '??' }}
                                    </div>
                                    <div>
                                        <p style="font-size:13px; font-weight:500; color:#111827; margin:0;">
                                            {{ $alumno?->nombre_completo ?? 'N/A' }}
                                        </p>
                                        <p style="font-size:11px; color:#9ca3af; margin:0;">{{ $alumno?->codigo ?? '' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td style="padding:13px 24px;">
                                @if($curso)
                                <span style="background:#f3f4f6; color:#374151; padding:3px 10px; border-radius:5px; font-size:12px; font-weight:500;">
                                    {{ $curso->nombre }}
                                </span>
                                @else
                                <span style="font-size:12px; color:#9ca3af;">—</span>
                                @endif
                            </td>
                            <td style="padding:13px 24px; font-size:13px; font-weight:500; color:#111827;">
                                {{ $pago->mensualidad?->mes ?? '—' }}
                            </td>
                            <td style="padding:13px 24px; font-size:13px; color:#6b7280;">
                                {{ \Carbon\Carbon::parse($pago->fecha_pago)->isoFormat('D [de] MMMM YYYY') }}
                            </td>
                            <td style="padding:13px 24px; text-align:center;">
                                <span style="background:#f0fdf4; color:#16a34a; font-size:13px; font-weight:700; padding:4px 12px; border-radius:6px;">
                                    ${{ number_format($pago->monto_pagado, 2) }}
                                </span>
                            </td>
                            <td style="padding:13px 24px; font-size:13px; color:#6b7280;">
                                {{ $pago->observacion ?? '—' }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" style="padding:40px; text-align:center; color:#9ca3af; font-size:13px;">
                                No hay pagos registrados.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div id="sinResultados" style="display:none; padding:40px; text-align:center; color:#9ca3af; font-size:13px;">
                    No se encontraron pagos con los filtros seleccionados.
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function filtrarPagos() {
    const nombre  = document.getElementById('buscarAlumno').value.toLowerCase().trim();
    const mes     = document.getElementById('filtrarMes').value;
    const filas   = document.querySelectorAll('.fila-pago');
    let visibles  = 0;

    filas.forEach(fila => {
        const okNombre = !nombre || fila.dataset.nombre.includes(nombre);
        const okMes    = !mes    || fila.dataset.mes === mes;

        if (okNombre && okMes) {
            fila.style.display = '';
            visibles++;
        } else {
            fila.style.display = 'none';
        }
    });

    const hayFiltro = nombre || mes;
    document.getElementById('sinResultados').style.display  = visibles === 0 && hayFiltro ? 'block' : 'none';
    document.getElementById('contadorResultados').textContent = hayFiltro ? visibles + ' resultado(s)' : '';
    document.getElementById('contadorHeader').textContent    = visibles + ' pagos registrados';
}

function limpiarFiltros() {
    document.getElementById('buscarAlumno').value = '';
    document.getElementById('filtrarMes').value   = '';
    document.getElementById('contadorResultados').textContent = '';
    document.getElementById('sinResultados').style.display = 'none';
    document.querySelectorAll('.fila-pago').forEach(f => f.style.display = '');
    document.getElementById('contadorHeader').textContent = '{{ $pagos->count() }} pagos registrados';
}
</script>
</x-app-layout>
