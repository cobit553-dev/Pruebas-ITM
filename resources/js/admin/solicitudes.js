function abrirRechazo(id, nombre) {
    document.getElementById('textoRechazo').textContent = 'Estás rechazando la solicitud de ' + nombre + '. Esta acción notificará al alumno.';
    document.getElementById('formRechazo').action = '/admin/solicitudes/' + id + '/rechazar';
    document.getElementById('modalRechazo').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function cerrarRechazo() {
    document.getElementById('modalRechazo').style.display = 'none';
    document.body.style.overflow = '';
}

window.abrirRechazo = abrirRechazo;
window.cerrarRechazo = cerrarRechazo;

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('modalRechazo').addEventListener('click', function(e) {
        if (e.target === this) cerrarRechazo();
    });
});