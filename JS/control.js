function abrirModalAgregar() {
    var modal = document.getElementById('agregarModal');
    $(modal).modal('show'); // Abre el modal con ID "agregarModal"
}


function abrirModal(btn) {
    var row = btn.closest('tr');
    var inputs = row.querySelectorAll('input');
    var modal = document.getElementById('editarModal');
    var form = document.getElementById('editarForm');

    form.idr.value = inputs[0].value
    form.nombre.value = inputs[1].value;
    form.clasificacion.value = inputs[2].value;
    form.tipo.value = inputs[3].value;
    form.precio.value = inputs[4].value;

    $(modal).modal('show');
}


function confirmarBorrado(element) {
    var row = element.closest('tr'); // Obtener la fila más cercana al botón clicado
    var id = row.querySelector('input[type="text"]').value; // Obtener el ID del platillo
    var nombre = row.querySelector('td:nth-child(2) input').value; // Obtener el nombre del platillo

    // Llenar el formulario del modal con los datos obtenidos
    document.getElementById('id_platillo').value = id;
    document.getElementById('nombre').value = nombre;

    // Mostrar el modal
    var modal = new bootstrap.Modal(document.getElementById('confirmarBorradoModal'));
    modal.show();
}

// Event listener para el botón de eliminar
document.getElementById('eliminarBtn').addEventListener('click', function () {
    // Aquí puedes agregar la lógica para enviar el formulario de borrado, por ejemplo, mediante AJAX
    var id = document.getElementById('id_platillo').value;
    // Aquí puedes enviar el ID a tu script PHP para realizar el borrado
    // Por ejemplo, usando fetch o XMLHttpRequest
    console.log('Borrando el platillo con ID ' + id);

    // Cerrar el modal después de realizar el borrado
    var modal = bootstrap.Modal.getInstance(document.getElementById('confirmarBorradoModal'));
    modal.hide();
});

const filtroInput = document.getElementById('filtro');
const filas = document.querySelectorAll('tbody tr');

filtroInput.addEventListener('keyup', function () {
    const filtro = filtroInput.value.toUpperCase();

    filas.forEach(function (fila) {
        let mostrarFila = false;
        const celdas = fila.querySelectorAll('td');

        for (let i = 0; i < celdas.length - 1; i++) {
            const textoCelda = celdas[i].querySelector('input').value.toUpperCase();
            if (textoCelda.indexOf(filtro) > -1) {
                mostrarFila = true;
                break; // No es necesario continuar revisando las celdas si ya encontramos una coincidencia
            }
        }

        if (mostrarFila) {
            fila.style.display = '';
        } else {
            fila.style.display = 'none';
        }
    });
});



function cerrarModal() {
    var modal = document.getElementById('editarModal');
    $(modal).modal('hide');
}


function guardarCambios(btn) {
    const fila = btn.closest('tr');
    fila.querySelectorAll('.entrada').forEach(input => {
        input.disabled = true;
    });
    fila.querySelector('.borrar').disabled = false;
    fila.querySelector('.guardar').disabled = true;
    alert("Elemento guardado Correctamente")
}

