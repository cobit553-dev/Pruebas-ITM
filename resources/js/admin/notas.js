let cursoSeleccionado = '';

function mostrarDropdown() {
    const input    = document.getElementById('buscadorCurso');
    const dropdown = document.getElementById('dropdownCursos');
    const texto    = input.value.toLowerCase();
    const opciones = dropdown.querySelectorAll('.opcion-curso');

    opciones.forEach(op => {
        const valor = op.dataset.valor;
        if (texto === '' || valor.includes(texto) || op.textContent.toLowerCase().includes(texto)) {
            op.style.display = '';
        } else {
            op.style.display = 'none';
        }
    });

    dropdown.style.display = 'block';
}

function seleccionarCurso(valor, nombre) {
    cursoSeleccionado = valor;
    document.getElementById('buscadorCurso').value = nombre === 'Todos los cursos' ? '' : nombre;
    document.getElementById('dropdownCursos').style.display = 'none';
    filtrarTablas();
}

function filtrarTablas() {
    const filtroCurso  = cursoSeleccionado || document.getElementById('buscadorCurso').value.toLowerCase().trim();
    const filtroAlumno = document.getElementById('buscadorAlumno').value.toLowerCase().trim();
    const bloques      = document.querySelectorAll('.bloque-curso');
    let totalVisibles  = 0;
    let totalFilas     = 0;

    bloques.forEach(bloque => {
        const nombreCurso = bloque.dataset.curso;

        if (filtroCurso && !nombreCurso.includes(filtroCurso)) {
            bloque.style.display = 'none';
            return;
        }

        const filas = bloque.querySelectorAll('.fila-nota');
        let filasVisibles = 0;

        filas.forEach(fila => {
            const nombreAlumno = fila.dataset.alumno;
            if (filtroAlumno && !nombreAlumno.includes(filtroAlumno)) {
                fila.style.display = 'none';
            } else {
                fila.style.display = '';
                filasVisibles++;
                totalFilas++;
            }
        });

        const filaVacia = bloque.querySelector('.fila-vacia');
        if (filaVacia) filaVacia.style.display = filasVisibles === 0 ? '' : 'none';

        if (filtroAlumno && filasVisibles === 0 && filas.length > 0) {
            bloque.style.display = 'none';
        } else {
            bloque.style.display = '';
            totalVisibles++;
        }

        const contador = bloque.querySelector('.contador-alumnos');
        if (contador) contador.textContent = filasVisibles > 0 ? filasVisibles + ' resultado(s)' : '';
    });

    document.getElementById('sinResultados').style.display = totalVisibles === 0 ? 'block' : 'none';

    const texto = document.getElementById('textoResultados');
    if (filtroCurso || filtroAlumno) {
        texto.textContent = totalFilas + ' resultado(s) encontrado(s)';
    } else {
        texto.textContent = '';
    }
}

function limpiarFiltros() {
    cursoSeleccionado = '';
    document.getElementById('buscadorCurso').value  = '';
    document.getElementById('buscadorAlumno').value = '';
    document.getElementById('dropdownCursos').style.display = 'none';
    document.getElementById('textoResultados').textContent = '';
    filtrarTablas();
}

window.mostrarDropdown = mostrarDropdown;
window.seleccionarCurso = seleccionarCurso;
window.filtrarTablas = filtrarTablas;
window.limpiarFiltros = limpiarFiltros;

document.addEventListener('click', function(e) {
    const wrapper = document.getElementById('buscadorCurso').closest('div').parentElement;
    if (!wrapper.contains(e.target)) {
        document.getElementById('dropdownCursos').style.display = 'none';
    }
});