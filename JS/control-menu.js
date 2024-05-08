function habilitarEdicion(btn) {
    const fila = btn.closest('tr');
    const select = fila.querySelector('.select-led-status');
    const opcionSeleccionada = select.value;
    const filaId = fila.querySelector('.entrada').value;
    document.getElementById('nuevaOpcion').value = opcionSeleccionada;
    document.getElementById('filaId').innerText= filaId;
    $('#editarModal').modal('show');

    fila.querySelector('.borrar').disabled = true;
    fila.querySelector('.guardar').disabled = false;
}

function guardarCambios() {
    const select = document.querySelector('.select-led-status');
    const nuevaOpcion = document.getElementById('nuevaOpcion').value;
    const filaId = document.getElementById('filaId').value;
    select.value = nuevaOpcion;
    $('#editarModal').modal('hide');

    // Aquí puedes enviar el formulario o realizar cualquier acción que necesites con los datos
    alert("Elemento guardado Correctamente");
}

function confirmarBorrado(btn) {
    if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
        const fila = btn.closest('tr');
        fila.remove();
    }
}

function cancelarEdicion() {
    $('#editarModal').modal('hide');
}