function abrirModalAgregar() {
    $('#modalAgregar').modal('show');
}

function abrirModalEditar(btn) {
    var row = $(btn).closest('tr');
    var opcionSeleccionada = row.find('select').val(); // Obtener el valor de la opción seleccionada
    var nombreOpcionSeleccionada = row.find('select option:selected').text(); // Obtener el nombre de la opción seleccionada
    var tipo = row.find('td:first').text(); // Obtener el valor de la primera columna

    // Llenar los campos del modal de edición con los datos de la fila seleccionada
    $('#filaId').val(opcionSeleccionada);
    $('#nuevaOpcion').val(nombreOpcionSeleccionada); // Mostrar el nombre de la opción seleccionada
    $('#tipoEditar').val(tipo); // Mostrar el tipo de la opción seleccionada
    $('#modalEditar').modal('show');
}

function abrirModalEliminar(btn) {
    var row = $(btn).closest('tr');
    var opcionSeleccionada = row.find('select').val(); // Obtener el valor de la opción seleccionada
    var nombreOpcionSeleccionada = row.find('select option:selected').text(); // Obtener el nombre de la opción seleccionada
    var tipo = row.find('td:first').text(); // Obtener el valor de la primera columna

    // Mostrar los datos de la fila seleccionada en el modal de eliminación
    $('#Idnombre').val(opcionSeleccionada);
    $('#nombre').val(nombreOpcionSeleccionada); // Mostrar el nombre de la opción seleccionada
    $('#tipoEliminar').val(tipo); // Mostrar el tipo de la opción seleccionada
    $('#modalEliminar').modal('show');
}



function cerrarModal1() {
    var modal = document.getElementById('modalEditar');
    $(modal).modal('hide');
}
function cerrarModal2() {
    var modal = document.getElementById('modalAgregar');
    $(modal).modal('hide');
}

function cerrarModal3() {
    var modal = document.getElementById('modalEliminar');
    $(modal).modal('hide');
}

function modalMenu() {
    // Obtener la fecha actual
    var fechaActual = new Date().toISOString().split('T')[0];

    // Establecer la fecha actual en el campo de entrada correspondiente
    $('#fecha').val(fechaActual);

    // Obtener los textos de las entradas seleccionadas en la tabla y establecerlos en los inputs correspondientes del modal
    var entrada1 = $('tr:nth-child(1) td:nth-child(2) select').find(":selected").text();
    var entrada2 = $('tr:nth-child(2) td:nth-child(2) select').find(":selected").text();
    var entrada3 = $('tr:nth-child(3) td:nth-child(2) select').find(":selected").text();
    var entrada4 = $('tr:nth-child(4) td:nth-child(2) select').find(":selected").text();
    var fuerte1 = $('tr:nth-child(5) td:nth-child(2) select').find(":selected").text();
    var fuerte2 = $('tr:nth-child(6) td:nth-child(2) select').find(":selected").text();
    
    $('#entrada11').val(entrada1);
    $('#entrada12').val(entrada2);
    $('#entrada21').val(entrada3);
    $('#entrada22').val(entrada4);
    $('#fuerte1').val(fuerte1);
    $('#fuerte2').val(fuerte2);

    // Abrir el modal
    $('#modalArmarMenu').modal('show');
}