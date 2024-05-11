// Script para abrir el modal de editar bebida
function abrirModalEditar(elemento) {
    var fila = elemento.closest("tr");
    var idBebida = fila.cells[0].querySelector("input").value;
    var nombreBebida = fila.cells[1].querySelector("input").value;
    var precioBebida = fila.cells[2].querySelector("input").value;
    var tipoBebida = fila.cells[3].querySelector("input").value;

    document.getElementById("idBebidaEdit").value = idBebida;
    document.getElementById("nombreBebidaEdit").value = nombreBebida;
    document.getElementById("precioBebidaEdit").value = precioBebida;
    document.getElementById("tipoBebidaEdit").value = tipoBebida;

    $("#editarBebidaModal").modal("show");
}

// Script para abrir el modal de agregar bebida
function abrirModalAgregar() {
    $("#modalAgregarBebida").modal("show");
}

function abrirModalEliminar(btnEliminar) {
    // Obtener la fila que contiene el botón "Eliminar"
    var fila = btnEliminar.closest('tr');
    // Obtener los valores de la fila
    var idBebida = fila.cells[0].querySelector("input").value;
    // ID de la bebida
    var nombre = fila.cells[1].querySelector("input").value;   // Nombre de la bebida
    // Actualizar el contenido del modal con los valores obtenidos
    document.getElementById('modalIdBebida').value = idBebida;
    document.getElementById('modalNombre').textContent = nombre;
    // Mostrar el modal
    $('#modalEliminar').modal('show');
}

function eliminarBebida(element) {
    // Aquí puedes agregar la lógica para eliminar la bebida con el ID correspondiente
    // Por ejemplo, puedes enviar una solicitud AJAX al servidor para procesar la eliminación
    // Una vez que se complete la eliminación, puedes cerrar el modal si es necesario
    $('#modalEliminar').modal('hide');
}


// Script para cerrar el modal
function cerrarModal() {
    $(".modal").modal("hide");
}
