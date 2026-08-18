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

function limpiarFiltrosPagos() {
    document.getElementById('buscarAlumno').value = '';
    document.getElementById('filtrarMes').value   = '';
    document.getElementById('contadorResultados').textContent = '';
    document.getElementById('sinResultados').style.display = 'none';
    document.querySelectorAll('.fila-pago').forEach(f => f.style.display = '');
    document.getElementById('contadorHeader').textContent = document.getElementById('contadorHeader').dataset.total;
}

window.filtrarPagos = filtrarPagos;
window.limpiarFiltrosPagos = limpiarFiltrosPagos;