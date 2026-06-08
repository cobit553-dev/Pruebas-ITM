<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">

    @include('components.admin-sidebar', ['active' => 'materias'])

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#f8fafc;">

        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:40px; height:40px; border-radius:12px; overflow:hidden; border:1px solid #e5e7eb;">
                    <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">Gestión de Materias</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">{{ $materias->count() }} materias activas</p>
                </div>
            </div>
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="font-size:12px; color:#9ca3af; background:#f3f4f6; padding:6px 12px; border-radius:8px;">{{ now()->isoFormat('MMMM YYYY') }}</span>
                <button style="background:#111827; border:none; padding:8px 18px; border-radius:8px; color:#fff; font-size:12px; font-weight:600; cursor:pointer;"
                    onmouseover="this.style.background='#374151'" onmouseout="this.style.background='#111827'">
                    + Nueva Materia
                </button>
            </div>
        </header>

        {{-- Buscador --}}
        <div style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; gap:12px; flex-shrink:0;">
            <div style="position:relative; flex:1; max-width:360px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24" style="position:absolute; left:12px; top:50%; transform:translateY(-50%); pointer-events:none;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" id="buscadorMateria" placeholder="Buscar materia..."
                    style="width:100%; padding:9px 14px 9px 34px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none;"
                    oninput="filtrarMaterias()"
                    onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
            </div>
            <p id="contadorMaterias" style="font-size:12px; color:#9ca3af; margin:0;"></p>
            <button onclick="limpiarBusqueda()"
                style="background:none; border:1px solid #e5e7eb; color:#6b7280; font-size:12px; padding:8px 14px; border-radius:8px; cursor:pointer;"
                onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='none'">
                ✕ Limpiar
            </button>
        </div>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden; box-shadow:0 1px 4px rgba(0,0,0,0.04);">
                <div style="padding:16px 24px; border-bottom:1px solid #e5e7eb; display:flex; align-items:center; gap:8px;">
                    <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                    <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">Listado de Materias</p>
                </div>

                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background:#f9fafb; border-bottom:1px solid #e5e7eb;">
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Código</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Nombre</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Estado</th>
                            <th style="padding:11px 24px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaBody">
                        @forelse($materias as $materia)
                        <tr class="fila-materia"
                            data-nombre="{{ strtolower($materia->nombre) }}"
                            style="border-top:1px solid #f1f5f9; background:{{ $loop->even ? '#f8fafc' : '#ffffff' }};"
                            onmouseover="this.style.background='#f0f9ff'" onmouseout="this.style.background='{{ $loop->even ? '#f8fafc' : '#ffffff' }}'">
                            <td style="padding:13px 24px; color:#6b7280; font-size:13px; font-family:monospace; font-weight:600;">
                                {{ $materia->codigo ?? 'MAT-'.str_pad($materia->id, 3, '0', STR_PAD_LEFT) }}
                            </td>
                            <td style="padding:13px 24px; color:#111827; font-size:13px; font-weight:500;">
                                {{ $materia->nombre }}
                            </td>
                            <td style="padding:13px 24px;">
                                @if(isset($materia->activa) && $materia->activa)
                                    <span style="background:#f0fdf4; color:#16a34a; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600;">● Activa</span>
                                @else
                                    <span style="background:#fef2f2; color:#dc2626; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600;">● Inactiva</span>
                                @endif
                            </td>
                            <td style="padding:13px 24px; text-align:center;">
                                {{-- Botón Editar con datos de la materia --}}
                                <button
                                    onclick="abrirModal(
                                        {{ $materia->id }},
                                        '{{ $materia->codigo ?? 'MAT-'.str_pad($materia->id, 3, '0', STR_PAD_LEFT) }}',
                                        '{{ addslashes($materia->nombre) }}',
                                        '{{ isset($materia->activa) && $materia->activa ? 1 : 0 }}'
                                    )"
                                    style="background:#f3f4f6; border:none; color:#374151; cursor:pointer; font-size:12px; font-weight:600; padding:5px 14px; border-radius:6px;"
                                    onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                                    Editar
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="padding:40px; text-align:center; color:#9ca3af; font-size:13px;">
                                No hay materias registradas.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div id="sinResultados" style="display:none; padding:40px; text-align:center; color:#9ca3af; font-size:13px;">
                    No se encontraron materias para tu búsqueda.
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- MODAL: EDITAR MATERIA --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<div id="modalEditar" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.4); z-index:200; align-items:center; justify-content:center;">
    <div style="background:#ffffff; border-radius:16px; padding:28px; width:100%; max-width:440px; box-shadow:0 8px 32px rgba(0,0,0,0.12); margin:20px;">

        {{-- Header modal --}}
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:24px;">
            <div style="display:flex; align-items:center; gap:8px;">
                <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                <p style="font-size:15px; font-weight:700; color:#111827; margin:0;">Editar Materia</p>
            </div>
            <button onclick="cerrarModal()"
                style="background:#f3f4f6; border:none; width:30px; height:30px; border-radius:8px; cursor:pointer; font-size:14px; color:#6b7280; display:flex; align-items:center; justify-content:center;"
                onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">✕</button>
        </div>

        {{-- Campos --}}
        <div style="display:flex; flex-direction:column; gap:16px;">

            {{-- ID oculto --}}
            <input type="hidden" id="modalId">

            {{-- Código (solo lectura) --}}
            <div>
                <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Código</label>
                <input type="text" id="modalCodigo" readonly
                    style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f3f4f6; color:#9ca3af; outline:none; cursor:not-allowed; box-sizing:border-box;">
                <p style="font-size:11px; color:#9ca3af; margin:4px 0 0;">El código no se puede modificar.</p>
            </div>

            {{-- Nombre --}}
            <div>
                <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Nombre de la materia</label>
                <input type="text" id="modalNombre"
                    style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none; box-sizing:border-box;"
                    onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
            </div>

            {{-- Estado --}}
            <div>
                <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Estado</label>
                <select id="modalEstado"
                    style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none; cursor:pointer; box-sizing:border-box;"
                    onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
                    <option value="1">Activa</option>
                    <option value="0">Inactiva</option>
                </select>
            </div>

        </div>

        {{-- Botones --}}
        <div style="display:flex; gap:10px; margin-top:24px;">
            <button onclick="cerrarModal()"
                style="flex:1; padding:10px; background:#f3f4f6; border:none; border-radius:10px; font-size:13px; font-weight:600; color:#374151; cursor:pointer;"
                onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                Cancelar
            </button>
            <button onclick="guardarMateria()"
                style="flex:1; padding:10px; background:#111827; border:none; border-radius:10px; font-size:13px; font-weight:600; color:#ffffff; cursor:pointer;"
                onmouseover="this.style.background='#374151'" onmouseout="this.style.background='#111827'">
                Guardar cambios
            </button>
        </div>
    </div>
</div>

<script>
function abrirModal(id, codigo, nombre, activa) {
    document.getElementById('modalId').value     = id;
    document.getElementById('modalCodigo').value = codigo;
    document.getElementById('modalNombre').value = nombre;
    document.getElementById('modalEstado').value = activa;
    document.getElementById('modalEditar').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function cerrarModal() {
    document.getElementById('modalEditar').style.display = 'none';
    document.body.style.overflow = '';
}

function guardarMateria() {
    // Por ahora solo cierra
    // Cuando quieras guardar de verdad dímelo
    cerrarModal();
}

function filtrarMaterias() {
    const texto  = document.getElementById('buscadorMateria').value.toLowerCase().trim();
    const filas  = document.querySelectorAll('.fila-materia');
    let visibles = 0;

    filas.forEach(fila => {
        const nombre = fila.dataset.nombre;
        if (!texto || nombre.includes(texto)) {
            fila.style.display = '';
            visibles++;
        } else {
            fila.style.display = 'none';
        }
    });

    document.getElementById('sinResultados').style.display = visibles === 0 && texto ? 'block' : 'none';
    document.getElementById('contadorMaterias').textContent = texto ? visibles + ' resultado(s)' : '';
}

function limpiarBusqueda() {
    document.getElementById('buscadorMateria').value = '';
    document.getElementById('contadorMaterias').textContent = '';
    filtrarMaterias();
}

// Cerrar al hacer clic fuera del modal
document.getElementById('modalEditar').addEventListener('click', function(e) {
    if (e.target === this) cerrarModal();
});
</script>
</x-app-layout>
