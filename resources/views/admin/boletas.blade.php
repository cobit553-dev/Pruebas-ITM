<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">
    @include('components.admin-sidebar', ['active' => 'boletas'])

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#f8fafc;">

        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:40px; height:40px; border-radius:12px; overflow:hidden; border:1px solid #e5e7eb;">
                    <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">Boletas de Notas</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;" id="contadorTotal">{{ $alumnos->count() }} alumnos</p>
                </div>
            </div>
            <span style="font-size:12px; color:#9ca3af; background:#f3f4f6; padding:6px 12px; border-radius:8px;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        {{-- Buscadores --}}
        <div style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; gap:12px; flex-shrink:0;">

            {{-- Buscador curso con dropdown --}}
            <div style="position:relative; min-width:280px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24" style="position:absolute; left:12px; top:50%; transform:translateY(-50%); pointer-events:none; z-index:1;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" id="buscadorCurso" placeholder="Buscar o seleccionar curso..."
                    autocomplete="off"
                    style="width:100%; padding:9px 14px 9px 34px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none;"
                    oninput="mostrarDropdown()" onfocus="mostrarDropdown()"
                    onfocusout="" >
                {{-- Dropdown --}}
                <div id="dropdownCursos" style="display:none; position:absolute; top:calc(100% + 4px); left:0; right:0; background:#ffffff; border:1px solid #e5e7eb; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.08); z-index:100; max-height:220px; overflow-y:auto;">
                    <div class="opcion-curso" data-valor=""
                        style="padding:10px 14px; font-size:13px; color:#6b7280; cursor:pointer; border-bottom:1px solid #f3f4f6;"
                        onmousedown="seleccionarCurso('', 'Todos los cursos')">
                        Todos los cursos
                    </div>
                    @foreach($alumnos->groupBy(fn($a) => $a->inscripciones->first()?->curso?->nombre ?? 'Sin curso') as $nombreCurso => $grupo)
                    <div class="opcion-curso" data-valor="{{ strtolower($nombreCurso) }}"
                        style="padding:10px 14px; font-size:13px; color:#111827; cursor:pointer; display:flex; align-items:center; justify-content:space-between;"
                        onmousedown="seleccionarCurso('{{ strtolower($nombreCurso) }}', '{{ $nombreCurso }}')">
                        <span>{{ $nombreCurso }}</span>
                        <span style="font-size:11px; color:#9ca3af; background:#f3f4f6; padding:2px 8px; border-radius:4px;">{{ $grupo->count() }} alumnos</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Buscador alumno --}}
            <div style="position:relative; flex:1; max-width:300px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24" style="position:absolute; left:12px; top:50%; transform:translateY(-50%); pointer-events:none;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" id="buscadorAlumno" placeholder="Buscar alumno..."
                    style="width:100%; padding:9px 14px 9px 34px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none;"
                    oninput="filtrarCards()"
                    onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <p id="contadorFiltro" style="font-size:12px; color:#9ca3af; margin:0; white-space:nowrap;"></p>

            <button onclick="limpiarFiltros()"
                style="background:none; border:1px solid #e5e7eb; color:#6b7280; font-size:12px; padding:8px 14px; border-radius:8px; cursor:pointer; white-space:nowrap;"
                onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='none'">
                ✕ Limpiar
            </button>
        </div>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            {{-- Grid de cards --}}
            <div id="gridAlumnos" style="display:grid; grid-template-columns:repeat(auto-fill, minmax(260px,1fr)); gap:16px;">
                @forelse($alumnos as $alumno)
                @php
                    $promedio = $alumno->notas->avg('promedio');
                    $curso    = $alumno->inscripciones->first()?->curso;
                @endphp
                <div class="card-alumno"
                    data-nombre="{{ strtolower($alumno->nombre.' '.$alumno->apellido) }}"
                    data-curso="{{ strtolower($curso?->nombre ?? 'sin curso') }}"
                    style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:20px; box-shadow:0 1px 3px rgba(0,0,0,0.04); transition:box-shadow .15s;"
                    onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'; this.style.borderColor='#d1d5db'"
                    onmouseout="this.style.boxShadow='0 1px 3px rgba(0,0,0,0.04)'; this.style.borderColor='#e5e7eb'">

                    {{-- Info alumno --}}
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                        <div style="width:44px; height:44px; border-radius:50%; background:#111827; display:flex; align-items:center; justify-content:center; color:#fff; font-size:13px; font-weight:700; flex-shrink:0;">
                            {{ strtoupper(substr($alumno->nombre,0,1).substr($alumno->apellido,0,1)) }}
                        </div>
                        <div>
                            <p style="font-size:13px; font-weight:600; color:#111827; margin:0;">{{ $alumno->nombre }} {{ $alumno->apellido }}</p>
                            <p style="font-size:11px; color:#9ca3af; margin:0;">{{ $alumno->codigo }}</p>
                        </div>
                        @if($curso)
                        <span style="margin-left:auto; background:#f3f4f6; color:#6b7280; padding:2px 8px; border-radius:5px; font-size:10px; font-weight:600; white-space:nowrap;">
                            {{ $curso->nombre }}
                        </span>
                        @endif
                    </div>

                    {{-- Stats --}}
                    <div style="display:flex; justify-content:space-between; align-items:center; padding:10px 0; border-top:1px solid #f3f4f6; border-bottom:1px solid #f3f4f6; margin-bottom:14px;">
                        <div style="text-align:center;">
                            <p style="font-size:11px; color:#6b7280; margin:0 0 2px;">Curso</p>
                            <p style="font-size:12px; font-weight:600; color:#111827; margin:0;">{{ $curso?->nombre ?? '—' }}</p>
                        </div>
                        <div style="text-align:center;">
                            <p style="font-size:11px; color:#6b7280; margin:0 0 2px;">Materias</p>
                            <p style="font-size:13px; font-weight:700; color:#111827; margin:0;">{{ $alumno->notas->count() }}</p>
                        </div>
                        <div style="text-align:center;">
                            <p style="font-size:11px; color:#6b7280; margin:0 0 2px;">Promedio</p>
                            <p style="font-size:18px; font-weight:700; margin:0;
                                color:{{ $promedio >= 8 ? '#16a34a' : ($promedio >= 6 ? '#d97706' : ($promedio > 0 ? '#dc2626' : '#9ca3af')) }};">
                                {{ $promedio ? round($promedio, 1) : '—' }}
                            </p>
                        </div>
                    </div>

                    <a href="{{ route('admin.boletas.show', $alumno->id) }}"
                       style="display:block; width:100%; padding:9px; background:#111827; color:#fff; border-radius:8px; text-align:center; font-size:12px; font-weight:600; text-decoration:none; box-sizing:border-box;"
                       onmouseover="this.style.background='#374151'" onmouseout="this.style.background='#111827'">
                        Ver boleta completa
                    </a>
                </div>
                @empty
                <div style="grid-column:1/-1; text-align:center; padding:60px; color:#9ca3af; font-size:13px;">
                    No hay alumnos registrados.
                </div>
                @endforelse
            </div>

            {{-- Sin resultados --}}
            <div id="sinResultados" style="display:none; background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:40px; text-align:center; color:#9ca3af; font-size:13px; margin-top:4px;">
                No se encontraron alumnos para tu búsqueda.
            </div>

        </div>
    </div>
</div>

<script>
let cursoActivo = '';

function mostrarDropdown() {
    const input    = document.getElementById('buscadorCurso');
    const dropdown = document.getElementById('dropdownCursos');
    const texto    = input.value.toLowerCase();
    const opciones = dropdown.querySelectorAll('.opcion-curso');

    opciones.forEach(op => {
        const valor = op.dataset.valor || '';
        op.style.display = (!texto || valor.includes(texto) || op.textContent.toLowerCase().includes(texto)) ? '' : 'none';
    });

    dropdown.style.display = 'block';
}

function seleccionarCurso(valor, nombre) {
    cursoActivo = valor;
    document.getElementById('buscadorCurso').value = nombre === 'Todos los cursos' ? '' : nombre;
    document.getElementById('dropdownCursos').style.display = 'none';
    filtrarCards();
}

function filtrarCards() {
    const filtroCurso  = cursoActivo || document.getElementById('buscadorCurso').value.toLowerCase().trim();
    const filtroAlumno = document.getElementById('buscadorAlumno').value.toLowerCase().trim();
    const cards        = document.querySelectorAll('.card-alumno');
    let visibles       = 0;

    cards.forEach(card => {
        const curso  = card.dataset.curso;
        const nombre = card.dataset.nombre;
        const okCurso  = !filtroCurso  || curso.includes(filtroCurso);
        const okAlumno = !filtroAlumno || nombre.includes(filtroAlumno);

        if (okCurso && okAlumno) {
            card.style.display = '';
            visibles++;
        } else {
            card.style.display = 'none';
        }
    });

    document.getElementById('sinResultados').style.display = visibles === 0 ? 'block' : 'none';

    const contador = document.getElementById('contadorFiltro');
    contador.textContent = (filtroCurso || filtroAlumno) ? visibles + ' alumno(s) encontrado(s)' : '';

    document.getElementById('contadorTotal').textContent = visibles + ' alumno(s)';
}

function limpiarFiltros() {
    cursoActivo = '';
    document.getElementById('buscadorCurso').value  = '';
    document.getElementById('buscadorAlumno').value = '';
    document.getElementById('contadorFiltro').textContent = '';
    document.getElementById('dropdownCursos').style.display = 'none';
    filtrarCards();
    document.getElementById('contadorTotal').textContent = '{{ $alumnos->count() }} alumnos';
}

// Cerrar dropdown al hacer clic fuera
document.addEventListener('click', function(e) {
    const wrapper = document.getElementById('buscadorCurso').parentElement;
    if (!wrapper.contains(e.target)) {
        document.getElementById('dropdownCursos').style.display = 'none';
    }
});
</script>
</x-app-layout>
