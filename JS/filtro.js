const filtroInput = document.getElementById('filtro');
const filas = document.querySelectorAll('tbody tr');

filtroInput.addEventListener('keyup', function () {
    const filtro = filtroInput.value.toUpperCase();

    filas.forEach(function (fila) {
        let mostrarFila = false;
        const celdas = fila.querySelectorAll('td:not(.end)'); // Ignorar las celdas de la clase 'end'

        celdas.forEach(function (celda) {
            const input = celda.querySelector('input');
            if (input) {
                const textoCelda = input.value.toUpperCase();
                if (textoCelda.indexOf(filtro) > -1) {
                    mostrarFila = true;
                }
            }
        });

        if (mostrarFila) {
            fila.style.display = '';
        } else {
            fila.style.display = 'none';
        }
    });
});

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

function editarModal(element) {
    var row = element.closest('tr'); // Obtener la fila más cercana al botón clicado
    var id = row.querySelector('input[type="text"]').value; // Obtener el ID del platillo
    var nombre = row.querySelector('td:nth-child(2) input').value; // Obtener el nombre del platillo

    // Llenar el formulario del modal con los datos obtenidos
    document.getElementById('id_cliente').value = id;
    document.getElementById('nombreclt').value = nombre;

    // Mostrar el modal
    var modal = new bootstrap.Modal(document.getElementById('editarModal'));
    modal.show();
}

function mostrarDetalles(element){
    var row = element.closest('tr'); // Obtener la fila más cercana al botón clicado
    var detalles = row.querySelector('td:nth-child(7) input').value; // Obtener el nombre del platillo

    // Llenar el formulario del modal con los datos obtenidos
    document.getElementById('detalleTextArea').value = detalles;

    // Mostrar el modal
    var modal = new bootstrap.Modal(document.getElementById('detalles'));
    modal.show();
}
