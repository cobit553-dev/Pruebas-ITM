<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">
    @include('components.admin-sidebar', ['active' => 'notas'])

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#f8fafc;">
        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:40px; height:40px; border-radius:12px; overflow:hidden; border:1px solid #e5e7eb;">
                    <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">Registro de Notas</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">{{ $notas->count() }} notas registradas</p>
                </div>
            </div>
            <span style="font-size:12px; color:#9ca3af; background:#f3f4f6; padding:6px 12px; border-radius:8px;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px; display:flex; flex-direction:column; gap:20px;">

            @if(session('success'))
            <div style="background:#dcfce7; border:1px solid #86efac; border-radius:10px; padding:12px 16px; font-size:13px; color:#16a34a;">
                ✓ {{ session('success') }}
            </div>
            @endif

            {{-- Buscadores --}}
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:20px;">
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">

                    {{-- Buscador de curso con dropdown --}}
                    <div style="position:relative;">
                        <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Filtrar por curso</label>
                        <div style="position:relative;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24" style="position:absolute; left:12px; top:50%; transform:translateY(-50%); pointer-events:none; z-index:1;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            <input type="text" id="buscadorCurso" placeholder="Buscar o seleccionar curso..."
                                autocomplete="off"
                                style="width:100%; padding:10px 14px 10px 34px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none;"
                                oninput="mostrarDropdown()" onfocus="mostrarDropdown()"
                                onkeyup="filtrarTablas()">
                        </div>
                        {{-- Dropdown de cursos --}}
                        <div id="dropdownCursos" style="display:none; position:absolute; top:100%; left:0; right:0; background:#ffffff; border:1px solid #e5e7eb; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.08); z-index:100; max-height:200px; overflow-y:auto; margin-top:4px;">
                            <div class="opcion-curso" data-valor=""
                                style="padding:10px 14px; font-size:13px; color:#6b7280; cursor:pointer; border-bottom:1px solid #f3f4f6;"
                                onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background=''"
                                onclick="seleccionarCurso('', 'Todos los cursos')">
                                Todos los cursos
                            </div>
                            @foreach($cursos as $curso)
                            <div class="opcion-curso" data-valor="{{ strtolower($curso->nombre) }}"
                                style="padding:10px 14px; font-size:13px; color:#111827; cursor:pointer; display:flex; align-items:center; justify-content:space-between;"
                                onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background=''"
                                onclick="seleccionarCurso('{{ strtolower($curso->nombre) }}', '{{ $curso->nombre }}')">
                                <span>{{ $curso->nombre }}</span>
                                <span style="font-size:11px; color:#9ca3af; background:#f3f4f6; padding:2px 8px; border-radius:4px;">{{ $curso->nivel }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Buscador de alumno --}}
                    <div>
                        <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Filtrar por alumno</label>
                        <div style="position:relative;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24" style="position:absolute; left:12px; top:50%; transform:translateY(-50%); pointer-events:none;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            <input type="text" id="buscadorAlumno" placeholder="Buscar alumno..."
                                style="width:100%; padding:10px 14px 10px 34px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none;"
                                oninput="filtrarTablas()"
                                onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
                        </div>
                    </div>

                </div>

                <div style="margin-top:12px; display:flex; flex-wrap:wrap; align-items:center; gap:10px; justify-content:space-between;">
                    <p id="textoResultados" style="font-size:12px; color:#9ca3af; margin:0;"></p>
                    <button onclick="limpiarFiltros()"
                        style="background:none; border:1px solid #e5e7eb; color:#6b7280; font-size:12px; padding:6px 14px; border-radius:8px; cursor:pointer;"
                        onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='none'">
                        ✕ Limpiar filtros
                    </button>
                </div>
            </div>

            {{-- Tablas por curso --}}
            <div id="contenedorCursos">
                @foreach($cursos as $curso)
                @if($curso->detalleCursos->count() > 0)
                <div class="bloque-curso" data-curso="{{ strtolower($curso->nombre) }}"
                    style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden; margin-bottom:16px;">

                    <div style="padding:16px 24px; border-bottom:1px solid #e5e7eb; display:flex; align-items:center; justify-content:space-between;">
                        <div style="display:flex; align-items:center; gap:8px;">
                            <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                            <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">{{ $curso->nombre }}</p>
                            <span style="background:#f3f4f6; color:#6b7280; padding:2px 8px; border-radius:5px; font-size:11px;">{{ $curso->nivel }}</span>
                        </div>
                        <span class="contador-alumnos" style="font-size:12px; color:#9ca3af;"></span>
                    </div>

                    <table style="width:100%; border-collapse:collapse;">
                        <thead>
                            <tr style="background:#f9fafb; border-bottom:1px solid #e5e7eb;">
                                <th style="padding:11px 20px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Alumno</th>
                                <th style="padding:11px 20px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Materia</th>
                                <th style="padding:11px 20px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Lab.</th>
                                <th style="padding:11px 20px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Teórico</th>
                                <th style="padding:11px 20px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Práctico</th>
                                <th style="padding:11px 20px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Promedio</th>
                                <th style="padding:11px 20px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase;">Conducta</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-notas">
                            @forelse($notas->filter(fn($n) => $n->detalleCurso?->curso_id === $curso->id) as $nota)
                            <tr class="fila-nota"
                                data-alumno="{{ strtolower($nota->alumno->nombre.' '.$nota->alumno->apellido) }}"
                                style="border-top:1px solid #f1f5f9;"
                                onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='transparent'">
                                <td style="padding:12px 20px;">
                                    <div style="display:flex; align-items:center; gap:10px;">
                                        <div style="width:30px; height:30px; border-radius:50%; background:#111827; display:flex; align-items:center; justify-content:center; color:#fff; font-size:10px; font-weight:700; flex-shrink:0;">
                                            {{ strtoupper(substr($nota->alumno->nombre,0,1).substr($nota->alumno->apellido,0,1)) }}
                                        </div>
                                        <span style="font-size:13px; font-weight:500; color:#111827;">{{ $nota->alumno->nombre }} {{ $nota->alumno->apellido }}</span>
                                    </div>
                                </td>
                                <td style="padding:12px 20px; font-size:13px; color:#6b7280;">{{ $nota->detalleCurso->materia->nombre ?? '—' }}</td>
                                <td style="padding:12px 20px; text-align:center; font-size:13px; color:#374151;">{{ $nota->laboratorio ?? '—' }}</td>
                                <td style="padding:12px 20px; text-align:center; font-size:13px; color:#374151;">{{ $nota->examen_teorico ?? '—' }}</td>
                                <td style="padding:12px 20px; text-align:center; font-size:13px; color:#374151;">{{ $nota->practica ?? '—' }}</td>
                                <td style="padding:12px 20px; text-align:center;">
                                    @php $p = $nota->promedio; @endphp
                                    <span style="width:32px; height:32px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-size:12px; font-weight:700; color:#fff;
                                        background:{{ $p >= 8 ? '#16a34a' : ($p >= 6 ? '#d97706' : '#dc2626') }};">
                                        {{ $p ?? '—' }}
                                    </span>
                                </td>
                                <td style="padding:12px 20px; text-align:center; font-size:13px; color:#374151;">{{ $nota->conducta ?? '—' }}</td>
                            </tr>
                            @empty
                            <tr class="fila-vacia">
                                <td colspan="7" style="padding:20px; text-align:center; color:#9ca3af; font-size:13px;">Sin notas registradas en este curso.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @endif
                @endforeach
            </div>

            <div id="sinResultados" style="display:none; background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:40px; text-align:center; color:#9ca3af; font-size:13px;">
                No se encontraron resultados para tu búsqueda.
            </div>

        </div>
    </div>
</div>

@push('scripts')
@vite('resources/js/admin/notas.js')
@endpush
<x-logout-modal />
</x-app-layout>
