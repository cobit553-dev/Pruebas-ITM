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

function limpiarFiltrosMensualidades() {
    document.getElementById('buscarAlumno').value  = '';
    document.getElementById('filtrarCurso').value  = '';
    document.getElementById('filtrarMes').value    = '';
    document.getElementById('filtrarEstado').value = '';
    document.getElementById('contadorMensualidades').textContent = '';
    document.querySelectorAll('.fila-mensualidad').forEach(f => f.style.display = '');
    document.querySelectorAll('.grupo-curso').forEach(g => g.style.display = '');
}

window.abrirModalGenerar = abrirModalGenerar;
window.cerrarModalGenerar = cerrarModalGenerar;
window.toggleAlumno = toggleAlumno;
window.filtrarAlumnosModal = filtrarAlumnosModal;
window.filtrarMensualidades = filtrarMensualidades;
window.limpiarFiltrosMensualidades = limpiarFiltrosMensualidades;

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('modalGenerar').addEventListener('click', function(e) {
        if (e.target === this) cerrarModalGenerar();
    });
});