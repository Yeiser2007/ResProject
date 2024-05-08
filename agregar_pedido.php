<?php include 'templates/encabezado.php' ?>
<link rel="stylesheet" href="css/controlStyle.css" />
<link rel="stylesheet" href="css/pedidosStyle.css" />
<?php include 'templates/header.php' ?>

<div class="container">
  <h1>Lista de Compras</h1>
  <div class="seccion">
  <div class="tabla">
<div class='table-responsive'>
                    <table class='table'>
                   <thead class='thead-dark'><tr><th>ID Orden</th><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Eliminar</th></tr></thead>
                    <tbody>
    <?php
    // Verificar si se proporcionó el ID del cliente en la URL
    include("modules/Conexion.php");
    if (isset($_GET['id_cliente'])) {
        $id_cliente = $_GET['id_cliente'];
        $sql_ordenes = "SELECT o.id_orden, p.producto, p.precio, o.cantidad, (p.precio * o.cantidad) AS total
                    FROM orden o
                    INNER JOIN producto p ON o.id_producto = p.id_producto
                    WHERE o.id_pedido = ?";
        // Preparar la sentencia
        $stmt = $conn->prepare($sql_ordenes);
        if ($stmt) {
            // Vincular el parámetro
            $stmt->bind_param("i", $id_cliente);
            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Obtener el resultado de la consulta
                $resultado = $stmt->get_result();
                // Verificar si se encontraron resultados
                if ($resultado->num_rows > 0) {
                    // Mostrar la tabla con los estilos de Bootstrap
                  
                    // Iterar sobre los resultados para mostrarlos en la tabla
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila['id_orden'] . "</td>";
                        echo "<td>" . $fila['producto'] . "</td>";
                        echo "<td>" . $fila['precio'] . "</td>";
                        echo "<td>" . $fila['cantidad'] . "</td>";
                        echo "<td>" . $fila['total'] . "</td>";
                        echo "<td><button class='btn btn-danger' data-toggle='modal' data-target='#eliminarModal' onclick='mostrarDatos(" . $fila['id_orden'] . ", \"" . $fila['producto'] . "\")'>Eliminar</button></td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "No se encontraron registros.";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error al ejecutar la consulta: " . $conn->error . "</div>";
            }
            // Cerrar la sentencia
            $stmt->close();
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al preparar la consulta.</div>";
        }
    }

    // Cerrar la conexión
    $conn->close();
    ?>

  <!-- Botón para mostrar el modal -->
  <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#datosClienteModal">
    Datos cliente
  </button>
  </div>
  <div class="select">
        <?php
        // Suponiendo que ya tienes una conexión a tu base de datos
        include("modules/Conexion.php");
        $id_cliente = $_GET['id_cliente'];
        $id_evento = $_GET['id_evento'];
        $sql_productos = "SELECT * FROM `producto` WHERE `id_evento` = $id_evento";
        $resultado_productos = $conn->query($sql_productos);
        // Verificar si la consulta de productos fue exitosa
        if ($resultado_productos) {
            echo "<form action='validacionesPed.php' method='GET'>";
            echo "<input type='hidden' name='id_cliente' value='$id_cliente'>";
            echo "<input type='hidden' name='id_evento' value='$id_evento'>";
            echo "<label for='productos'>Selecciona un producto:</label>";
            echo "<select name='productos' id='productos' class='form-control'>";
            echo "<option value=''>Selecciona un producto</option>";
            // Iterar sobre los resultados para generar las opciones del select
            while ($row = $resultado_productos->fetch_assoc()) {
                echo "<option value='" . $row['id_producto'] . "'>" . $row['producto'] . "</option>";
            }

            echo "</select>";

            // Agregar los campos de cantidad y precio
            echo "<label for='cantidad'>Cantidad:</label>";
            echo "<input type='number' id='cantidad' name='cantidad' required min='1' value='1' class='form-control'>";

            // Agregar el botón "Agregar" que enviará el formulario
            ?>
            <div class="btn-addsec">
            <button type='submit' name='agregar' class='btn btn-primary btn-add'>Agregar</button>
            </div>
            <?php
            echo "</form>";

        } else {
            // Mostrar un mensaje de error si la consulta de productos falla
            echo "<div class='alert alert-danger' role='alert'>Error al ejecutar la consulta de productos: " . $conn->error . "</div>";
        }
        ?>
  </div>

  </div>
</div>


<div class="modal fade" id="eliminarOrdenModal" tabindex="-1" role="dialog" aria-labelledby="eliminarOrdenModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarOrdenModalLabel">Eliminar Orden</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="validacionesPed.php" method="GET">
          <?php
          $id_cliente = $_GET['id_cliente'];
          $id_evento = $_GET['id_evento'];
          echo "<input type='hidden' name='id_cliente' value='$id_cliente'>";
          echo "<input type='hidden' name='id_evento' value='$id_evento'>";
          ?>
          <input type="hidden" name="id_orden" id="id_orden">
          <p>¿Estás seguro de que quieres eliminar la orden de <span id="producto"></span>?</p>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="delete" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal para datos del cliente -->
<div class="modal fade" id="datosClienteModal" tabindex="-1" role="dialog" aria-labelledby="datosClienteModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="datosClienteModalLabel">Datos del Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="Rpedido.php" method="get">
        <div class="modal-body">

          <div class="form-group">
            <label for="fechaActual">Fecha Actual:</label>
            <input type="text" class="form-control" id="fechaActual" required name="fechaActual" readonly>
          </div>
          <?php
          include ('modules/Conexion.php');
          $id_evento = $_GET['id_evento'];

          // Consulta SQL para obtener la fecha_fin del evento con el ID proporcionado
          $sql = "SELECT fecha_fin FROM evento WHERE id_evento = $id_evento";

          // Ejecutar la consulta
          $resultado = $conn->query($sql);

          // Verificar si se encontraron resultados y obtener la fecha_fin
          if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $fecha_fin = $fila["fecha_fin"];

            // Insertar la fecha_fin en el input HTML
            echo '<div class="form-group">';
            echo '<label for="fechaUnMesDespues">Fecha Entrega:</label>';
            echo '<input type="text" class="form-control" id="fecha_entrega" required name="fecha_entrega" value="' . $fecha_fin . '">';
            echo '</div>';
          } else {
            echo "No se encontró la fecha de entrega para el evento con ID $id_evento.";
          }

          // Cerrar la conexión
          $conn->close();
          ?>
          <?php
          // Suponiendo que ya tienes una conexión a tu base de datos
          
          // Consulta SQL para obtener los valores del pedido
          include ("modules/Conexion.php");
          $id_cliente = $_GET['id_cliente'];
          $sql = "SELECT `id_pedido`, `nombre_cliente`, `telefono`, `hora_entrega` FROM `pedido` WHERE $id_cliente";

          // Ejecutar la consulta
          $resultado = $conn->query($sql);

          // Verificar si se encontraron resultados
          if ($resultado->num_rows > 0) {
            // Obtener la primera fila de resultados (asumiendo que solo hay un pedido)
            $pedido = $resultado->fetch_assoc();
            echo '<div class="form-group">';
            echo '<label for="idPedido" style="display:none;">ID Pedido:</label>'; // Campo oculto para el ID del pedido
            echo '<input type="hidden" class="form-control" id="idPedido" required name="id_pedido" value="' . $id_cliente . '">';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="nombreCliente">Nombre:</label>';
            echo '<input type="text" class="form-control" id="nombreCliente" required name="nombre_cliente" value="' . $pedido['nombre_cliente'] . '" readonly>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="hora">Hora de Entrega:</label>';
            echo '<input type="time" class="form-control" id="hora" name="hora_entrega" required value="' . $pedido['hora_entrega'] . '">';
            echo '</div>';
          } else {
            echo "No se encontraron pedidos.";
          }
          ?>
          <div class="form-group">
            <label for="telefonoCliente">Teléfono:</label>
            <input type="text" class="form-control" id="telefonoCliente" name="telefono" required>
          </div>
          <div class="form-group">
            <label for="cuenta">A cuenta:</label>
            <input type="text" class="form-control" id="acuenta" name="acuenta" required>
          </div>
          <div class="form-group">
            <label for="precioTotal">Precio Total:</label>
            <input type="text" class="form-control" id="precioTotal" name="total" readonly required>
          </div>
          <div class="form-group">
            <label for="resta">Restaria:</label>
            <input type="text" class="form-control" id="resta" name="resta" required>
          </div>
          <div class="modal-footer">
            <button type="submit" name="detallesPed" class="btn btn-primary">Guardar Pedido</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
      </form>
    </div>
  </div>
</div>
<?php include('templates/footer.php')?>
<script>
  function mostrarModal(id_orden, producto, precio, cantidad, total) {
    document.getElementById('id_orden').value = id_orden;
    document.getElementById('producto').innerText = producto;
    $('#eliminarOrdenModal').modal('show');
  }
</script>
<script>
  // Obtener la fecha actual
  var fechaActual = new Date();

  // Obtener los componentes de la fecha (año, mes, día)
  var año = fechaActual.getFullYear();
  var mes = ('0' + (fechaActual.getMonth() + 1)).slice(-2); // Agregar 1 ya que los meses se indexan desde 0
  var día = ('0' + fechaActual.getDate()).slice(-2);

  // Formatear la fecha en el formato "año-mes-día"
  var fechaFormateada = año + '-' + mes + '-' + día;

  // Mostrar la fecha formateada en el input correspondiente
  var fechaActualInput = document.getElementById('fechaActual');
  fechaActualInput.value = fechaFormateada;

  // Calcular el precio total sumando los valores de la columna Total
  var precioTotalInput = document.getElementById('precioTotal');
  var totalCells = document.querySelectorAll('tbody tr td:last-child');
  var precioTotal = 0;
  totalCells.forEach(function (cell) {
    precioTotal += parseFloat(cell.textContent);
  });
  precioTotalInput.value = precioTotal.toFixed(2); // Formatear el precio total a dos decimales
</script>
<script>
  function calcularResta() {
    var acuenta = parseFloat(document.getElementById('acuenta').value);
    var precioTotal = parseFloat(document.getElementById('precioTotal').value);

    // Verificar si el valor de "A cuenta" es mayor que el "Precio Total"
    if (acuenta > precioTotal) {
      alert("El valor de A cuenta no puede ser mayor que el Precio Total.");
      document.getElementById('acuenta').value = precioTotal;
      acuenta = precioTotal;
    }

    // Calcular la resta
    var resta = precioTotal - acuenta;

    // Mostrar el resultado en el input "Restaría"
    var restaInput = document.getElementById('resta');
    restaInput.value = resta.toFixed(2);

    // Cambiar el color del texto según el valor de "Restaría"
    if (resta === 0) {
      restaInput.style.color = 'green';
    } else {
      restaInput.style.color = 'red';
    }
  }

  document.getElementById('acuenta').addEventListener('input', calcularResta);
  document.getElementById('precioTotal').addEventListener('input', calcularResta);

  // Llamar a la función inicialmente para que el color se ajuste en caso de valores predeterminados
  calcularResta();
</script>

</body>