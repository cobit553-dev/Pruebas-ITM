<x-app-layout>
<div class="page-layout admin-sidebar">

    @include('components.admin-sidebar', ['active' => 'secciones'])

    <div class="main-content main-content-alt">

        <header class="page-header">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:40px; height:40px; border-radius:12px; overflow:hidden; border:1px solid #e5e7eb;">
                    <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">Gestión de Secciones</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">{{ $cursos->count() }} secciones activas</p>
                </div>
            </div>
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="font-size:12px; color:#9ca3af; background:#f3f4f6; padding:6px 12px; border-radius:8px;">{{ now()->isoFormat('MMMM YYYY') }}</span>
                {{-- Botón conectado al modal --}}
                <button onclick="abrirModalCurso()"
                    style="background:#111827; border:none; padding:8px 18px; border-radius:8px; color:#fff; font-size:12px; font-weight:600; cursor:pointer;"
                    onmouseover="this.style.background='#374151'" onmouseout="this.style.background='#111827'">
                    + Nueva Sección
                </button>
            </div>
        </header>

        {{-- Buscador --}}
        <div style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; gap:12px; flex-shrink:0;">
            <div style="position:relative; flex:1; max-width:360px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24" style="position:absolute; left:12px; top:50%; transform:translateY(-50%); pointer-events:none;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" id="buscadorCurso" placeholder="Buscar curso..."
                    autocomplete="off"
                    style="width:100%; padding:9px 14px 9px 34px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none;"
                    oninput="filtrarCursos()"
                    onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <select id="filtroTurno" onchange="filtrarCursos()"
                style="padding:9px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none; cursor:pointer;">
                <option value="">Todos los turnos</option>
                <option value="matutino">Matutino</option>
                <option value="vespertino">Vespertino</option>
            </select>

            <p id="contadorCursos" style="font-size:12px; color:#9ca3af; margin:0; white-space:nowrap;"></p>

            <button onclick="limpiarFiltrosCursos()"
                style="background:none; border:1px solid #e5e7eb; color:#6b7280; font-size:12px; padding:8px 14px; border-radius:8px; cursor:pointer; white-space:nowrap;"
                onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='none'">
                ✕ Limpiar
            </button>
        </div>

        <div class="content-body">

            <div class="card-grid" id="gridCursos">
                @foreach($cursos as $curso)
                @php $porcentaje = $curso->inscripciones_count > 0 ? min(round(($curso->inscripciones_count / 40) * 100), 100) : 0; @endphp
                <div class="card card-hover card-curso"
                    data-nombre="{{ strtolower($curso->nombre) }}"
                    data-turno="{{ strtolower($curso->nivel) }}"
                    onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'; this.style.borderColor='#d1d5db'"
                    onmouseout="this.style.boxShadow='0 1px 3px rgba(0,0,0,0.04)'; this.style.borderColor='#e5e7eb'">

                    <div style="display:flex; align-items:flex-start; justify-content:space-between; margin-bottom:16px;">
                        <div>
                            <span class="badge-gray">{{ $curso->seccion }}</span>
                            <p style="font-size:15px; font-weight:700; color:#111827; margin:6px 0 2px;">{{ $curso->nombre }}</p>
                            <p style="font-size:12px; color:#6b7280; margin:0;">{{ $curso->nivel }} · {{ $curso->anio_lectivo }}</p>
                        </div>
                        @if($curso->activo)
                            <span class="badge-green">Activo</span>
                        @else
                            <span style="background:#fef2f2; color:#dc2626; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:600;">Inactivo</span>
                        @endif
                    </div>

                    <div style="margin-bottom:16px;">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
                            <span style="font-size:12px; color:#6b7280; font-weight:500;">Alumnos inscritos</span>
                            <span style="font-size:12px; font-weight:700; color:#111827;">{{ $curso->inscripciones_count }}</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width:{{ $porcentaje }}%;"></div>
                        </div>
                        <p style="font-size:11px; color:#9ca3af; margin:4px 0 0; text-align:right;">{{ $porcentaje }}% ocupado</p>
                    </div>

                    <div style="display:flex; gap:8px;">
                        <a href="{{ route('admin.secciones.edit', $curso->id) }}" class="btn-sm">Editar</a>
                        <a href="{{ route('admin.secciones.show', $curso->id) }}" class="btn-black">Ver detalle</a>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Sin resultados --}}
            <div id="sinResultados" style="display:none; background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:40px; text-align:center; color:#9ca3af; font-size:13px; margin-top:4px;">
                No se encontraron cursos para tu búsqueda.
            </div>

        </div>
    </div>
</div>

{{-- Modal nuevo curso desde archivo separado --}}
@include('admin.partials.modal-nuevo-curso')

@push('scripts')
@vite('resources/js/admin/secciones.js')
@endpush
<x-logout-modal />
</x-app-layout>
