<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">

    @include('components.admin-sidebar', ['active' => 'encargados'])

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#fafafa;">

        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:40px; height:40px; border-radius:12px; overflow:hidden; border:1px solid #e5e7eb;">
                    <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">Gestión de Encargados</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;" id="contadorHeader">{{ $encargados->count() }} encargados registrados</p>
                </div>
            </div>
            <button onclick="abrirModalNuevoEncargado()"
                style="background:#111827; border:none; padding:8px 18px; border-radius:8px; color:#fff; font-size:12px; font-weight:600; cursor:pointer;"
                onmouseover="this.style.background='#374151'" onmouseout="this.style.background='#111827'">
                + Nuevo Encargado
            </button>
        </header>

        {{-- Buscador --}}
        <div style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; gap:12px; flex-shrink:0;">
            <div style="position:relative; flex:1; max-width:360px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24" style="position:absolute; left:12px; top:50%; transform:translateY(-50%); pointer-events:none;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" id="buscadorEncargado" placeholder="Buscar encargado..."
                    style="width:100%; padding:9px 14px 9px 34px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none;"
                    oninput="filtrarEncargados()"
                    onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
            </div>
            <p id="contadorResultados" style="font-size:12px; color:#9ca3af; margin:0;"></p>
            <button onclick="limpiarBusqueda()"
                style="background:none; border:1px solid #e5e7eb; color:#6b7280; font-size:12px; padding:8px 14px; border-radius:8px; cursor:pointer;"
                onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='none'">
                ✕ Limpiar
            </button>
        </div>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            @if(session('success'))
            <div style="background:#dcfce7; border:1px solid #86efac; border-radius:10px; padding:12px 16px; margin-bottom:16px; font-size:13px; color:#16a34a; display:flex; align-items:center; gap:8px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div style="background:#fef2f2; border:1px solid #fecaca; border-radius:10px; padding:12px 16px; margin-bottom:16px; font-size:13px; color:#dc2626;">
                {{ session('error') }}
            </div>
            @endif

            {{-- Grid de cards --}}
            <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:16px;" id="gridEncargados">

                @forelse($encargados as $encargado)
                <div class="card-encargado"
                    data-nombre="{{ strtolower($encargado->nombre_completo) }}"
                    style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:20px; box-shadow:0 1px 4px rgba(0,0,0,0.04); transition:all .15s;"
                    onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'; this.style.borderColor='#d1d5db'"
                    onmouseout="this.style.boxShadow='0 1px 4px rgba(0,0,0,0.04)'; this.style.borderColor='#e5e7eb'">

                    {{-- Header --}}
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:16px;">
                        <div style="display:flex; align-items:center; gap:12px;">
                            <div style="width:44px; height:44px; border-radius:50%; background:#111827; display:flex; align-items:center; justify-content:center; color:#fff; font-size:13px; font-weight:700; flex-shrink:0;">
                                {{ strtoupper(substr($encargado->nombre,0,1).substr($encargado->apellido,0,1)) }}
                            </div>
                            <div>
                                <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">{{ $encargado->nombre_completo }}</p>
                                <p style="font-size:11px; color:#9ca3af; margin:0;">{{ $encargado->parentesco ?? 'Encargado' }}</p>
                            </div>
                        </div>
                        @if($encargado->activo)
                            <span style="background:#f0fdf4; color:#16a34a; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:600;">Activo</span>
                        @else
                            <span style="background:#fef2f2; color:#dc2626; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:600;">Inactivo</span>
                        @endif
                    </div>

                    {{-- Datos --}}
                    <div style="display:flex; flex-direction:column; gap:7px; padding-bottom:14px; border-bottom:1px solid #f3f4f6; margin-bottom:14px;">
                        <div style="display:flex; align-items:center; gap:8px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <span style="font-size:12px; color:#6b7280;">{{ $encargado->telefono ?? '—' }}</span>
                        </div>
                        @if($encargado->email)
                        <div style="display:flex; align-items:center; gap:8px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            <span style="font-size:12px; color:#6b7280;">{{ $encargado->email }}</span>
                        </div>
                        @endif
                        @if($encargado->dui)
                        <div style="display:flex; align-items:center; gap:8px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                            <span style="font-size:12px; color:#6b7280;">DUI: {{ $encargado->dui }}</span>
                        </div>
                        @endif
                    </div>

                    {{-- Alumnos a cargo --}}
                    <div style="margin-bottom:14px;">
                        <p style="font-size:11px; font-weight:600; color:#9ca3af; text-transform:uppercase; letter-spacing:.05em; margin:0 0 8px;">Alumnos a cargo</p>
                        <div style="display:flex; flex-wrap:wrap; gap:6px;">
                            @forelse($encargado->alumnos as $alumno)
                                <span style="background:#f3f4f6; color:#374151; padding:4px 10px; border-radius:6px; font-size:11px; font-weight:500;">
                                    {{ $alumno->nombre }} {{ $alumno->apellido }}
                                </span>
                            @empty
                                <span style="font-size:12px; color:#9ca3af;">Sin alumnos asignados</span>
                            @endforelse
                        </div>
                    </div>

                    {{-- Acciones --}}
                    <div style="display:flex; gap:8px;">
                        <button
                            onclick="abrirModalEditarEncargado(
                                {{ $encargado->id }},
                                '{{ addslashes($encargado->nombre) }}',
                                '{{ addslashes($encargado->apellido) }}',
                                '{{ addslashes($encargado->telefono ?? '') }}',
                                '{{ addslashes($encargado->dui ?? '') }}',
                                '{{ addslashes($encargado->email ?? '') }}',
                                '{{ addslashes($encargado->parentesco ?? '') }}'
                            )"
                            style="flex:1; background:#f3f4f6; border:none; color:#374151; cursor:pointer; font-size:12px; font-weight:600; padding:8px; border-radius:8px;"
                            onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                            Editar
                        </button>
                        <form method="POST" action="{{ route('admin.encargados.destroy', $encargado->id) }}"
                            onsubmit="return confirm('¿Eliminar a {{ $encargado->nombre_completo }}?')" style="flex:1;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="width:100%; background:#fef2f2; border:none; color:#dc2626; cursor:pointer; font-size:12px; font-weight:600; padding:8px; border-radius:8px;"
                                onmouseover="this.style.background='#fee2e2'" onmouseout="this.style.background='#fef2f2'">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div id="sinEncargados" style="grid-column:1/-1; text-align:center; padding:60px 0; color:#9ca3af; font-size:13px;">
                    No hay encargados registrados aún.
                </div>
                @endforelse
            </div>

            <div id="sinResultados" style="display:none; text-align:center; padding:60px 0; color:#9ca3af; font-size:13px;">
                No se encontraron encargados para tu búsqueda.
            </div>
        </div>
    </div>
</div>
@include('admin.partials.modal-nuevo-encargado')
@include('admin.partials.modal-editar-encargado')

<script>
// ── Buscador ─────────────────────────────────────
function filtrarEncargados() {
    const texto  = document.getElementById('buscadorEncargado').value.toLowerCase().trim();
    const cards  = document.querySelectorAll('.card-encargado');
    let visibles = 0;

    cards.forEach(card => {
        if (!texto || card.dataset.nombre.includes(texto)) {
            card.style.display = '';
            visibles++;
        } else {
            card.style.display = 'none';
        }
    });

    document.getElementById('sinResultados').style.display = visibles === 0 && texto ? 'block' : 'none';
    document.getElementById('contadorResultados').textContent = texto ? visibles + ' resultado(s)' : '';
}

function limpiarBusqueda() {
    document.getElementById('buscadorEncargado').value = '';
    document.getElementById('contadorResultados').textContent = '';
    document.getElementById('sinResultados').style.display = 'none';
    document.querySelectorAll('.card-encargado').forEach(c => c.style.display = '');
}

// ── Modal Nuevo ───────────────────────────────────
function abrirModalNuevoEncargado() {
    document.getElementById('modalNuevoEncargado').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function cerrarModalNuevoEncargado() {
    document.getElementById('modalNuevoEncargado').style.display = 'none';
    document.body.style.overflow = '';
}

// ── Modal Editar ──────────────────────────────────
function abrirModalEditarEncargado(id, nombre, apellido, telefono, dui, email, parentesco) {
    document.getElementById('editEncNombre').value    = nombre;
    document.getElementById('editEncApellido').value  = apellido;
    document.getElementById('editEncTelefono').value  = telefono;
    document.getElementById('editEncDui').value       = dui;
    document.getElementById('editEncEmail').value     = email;
    document.getElementById('editEncParentesco').value = parentesco;
    document.getElementById('formEditarEncargado').action = '/admin/encargados/' + id;
    document.getElementById('modalEditarEncargado').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function cerrarModalEditarEncargado() {
    document.getElementById('modalEditarEncargado').style.display = 'none';
    document.body.style.overflow = '';
}

// ── Cerrar al click fuera ─────────────────────────
document.addEventListener('DOMContentLoaded', function() {
    ['modalNuevoEncargado', 'modalEditarEncargado'].forEach(id => {
        document.getElementById(id).addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
                document.body.style.overflow = '';
            }
        });
    });
});
</script>
</x-app-layout>
