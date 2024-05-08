
function abrirModal(btn) {
    var row = btn.closest('tr');
    var inputs = row.querySelectorAll('input');
    var modal = document.getElementById('editarModal');
    var form = document.getElementById('editarForm');

    form.idr.value= inputs[0].value
    form.nombre.value = inputs[1].value;
    form.clasificacion.value = inputs[2].value;

    $(modal).modal('show');
  }

  function confirmarBorrado(btn) {
    // Aquí puedes implementar la lógica para confirmar el borrado
    console.log('Borrar elemento');
  }

const filtroInput = document.getElementById('filtro');
const filas = document.querySelectorAll('tbody tr');

filtroInput.addEventListener('keyup', function() {
    const filtro = filtroInput.value.toUpperCase();

    filas.forEach(function(fila) {
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

function abrirModal2(button) {
    var fila = $(button).closest("tr");
    var cliente = fila.find(".entrada:eq(1)").val();
    var descripcion = fila.find(".entrada:eq(2)").val();
  
    $("#cliente").val(cliente);
    $("#descripcion").val(descripcion);
    $("#detallesModal").modal("show");
  }
  
  fun

function cerrarModal() {
    var modal = document.getElementById('editarModal');
    $(modal).modal('hide');
  }
  function cerrarModal2() {
    var modal = document.getElementById('detallesModal');
    $(modal).modal('hide');
  }
 
function confirmarBorrado(btn) {
    if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
        const fila = btn.closest('tr');
        fila.remove();
    }
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

 