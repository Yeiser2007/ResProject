
function abrirModalEliminar(btn) {
    const fila = btn.closest('tr'); // Obtener la fila más cercana al botón
    const nombreEvento = fila.querySelector('td:nth-child(2) input').value; // Obtener el valor del input en la segunda celda
    document.getElementById('nombreEventoEliminar').value = nombreEvento; // Asignar el nombre del evento al campo de entrada
    $('#eliminarEventoModal').modal('show'); // Mostrar el modal de eliminar evento
}

    function abrirModal(boton) {
        // Obtener la fila correspondiente al botón presionado
        var fila = boton.closest('tr');

        // Obtener los valores de la fila
        var idEvento = fila.cells[0].querySelector('input').value;
        var nombreEvento = fila.cells[1].querySelector('input').value;
        var fechaFinEvento = fila.cells[2].querySelector('input').value;

        // Llenar los inputs del modal con los valores obtenidos
        document.getElementById('idEventoEdit').value = idEvento;
        document.getElementById('nombreEventoEdit').value = nombreEvento;
        document.getElementById('fechaFinEventoEdit').value = fechaFinEvento;

        // Mostrar el modal
        $('#editarEventoModal').modal('show');
    }

    function guardarCambios() {
        // Aquí puedes escribir el código para guardar los cambios
        // Por ejemplo, puedes enviar los datos al servidor mediante AJAX
        // Cuando la operación se haya completado, puedes cerrar el modal
        $('#editarEventoModal').modal('hide');
    }

    // Evento para limpiar los campos del formulario cuando se oculta el modal
    $('#editarEventoModal').on('hidden.bs.modal', function (e) {
        document.getElementById('idEventoEdit').value = '';
        document.getElementById('nombreEventoEdit').value = '';
        document.getElementById('fechaFinEventoEdit').value = '';
    });
    function cerrarModal() {
        // Ocultar el modal
        $('#editarEventoModal').modal('hide');
    }
    
    document.getElementById('btnAgregar').addEventListener('click', function() {
        $('#modalAgregar').modal('show');
    });

    document.addEventListener('DOMContentLoaded', function() {
        const filtroInput = document.getElementById('filtro');
    const filasTabla = document.querySelectorAll('tbody tr');

    filtroInput.addEventListener('input', function() {
        const filtroTexto = filtroInput.value.toLowerCase();

        filasTabla.forEach(function(fila) {
            // Obtener todas las celdas de la fila excepto la última
            const celdas = Array.from(fila.querySelectorAll('td')).slice(0, -1);

            // Verificar si alguna de las celdas contiene el texto del filtro
            let filaVisible = false;
            celdas.forEach(function(celda) {
                if (celda.textContent.toLowerCase().includes(filtroTexto)) {
                    filaVisible = true;
                }
            });

            // Mostrar u ocultar la fila según corresponda
            fila.style.display = filaVisible ? '' : 'none';
        });
    });
    });