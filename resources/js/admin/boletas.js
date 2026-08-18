window.cursoSeleccionado = '';

window.mostrarDropdown = function() {
    const input    = document.getElementById('buscadorCurso');
    const dropdown = document.getElementById('dropdownCursos');
    const texto    = input.value.toLowerCase();
    const opciones = dropdown.querySelectorAll('.opcion-curso');

    opciones.forEach(op => {
        const valor = op.dataset.valor || '';
        op.style.display = (!texto || valor.includes(texto) || op.textContent.toLowerCase().includes(texto)) ? '' : 'none';
    });

    dropdown.style.display = 'block';
};

window.seleccionarCurso = function(valor, nombre) {
    cursoSeleccionado = valor;
    document.getElementById('buscadorCurso').value = nombre === 'Todos los cursos' ? '' : nombre;
    document.getElementById('dropdownCursos').style.display = 'none';
    filtrarCards();
};

window.filtrarCards = function() {
    const filtroCurso  = cursoSeleccionado || document.getElementById('buscadorCurso').value.toLowerCase().trim();
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
};

window.limpiarFiltrosBoletas = function() {
    cursoSeleccionado = '';
    document.getElementById('buscadorCurso').value  = '';
    document.getElementById('buscadorAlumno').value = '';
    document.getElementById('contadorFiltro').textContent = '';
    document.getElementById('dropdownCursos').style.display = 'none';
    filtrarCards();
    document.getElementById('contadorTotal').textContent = document.querySelectorAll('.card-alumno').length + ' alumnos';
};

document.addEventListener('click', function(e) {
    const buscador = document.getElementById('buscadorCurso');
    if (!buscador) return;
    const wrapper = buscador.parentElement;
    if (!wrapper.contains(e.target)) {
        document.getElementById('dropdownCursos').style.display = 'none';
    }
});