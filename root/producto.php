<?php include '../templates/encabezado.php' ?>
<link rel="stylesheet" href="../css/controlStyle.css" />
<?php include '../templates/header.php' ?>

<div class="container">
  <div class="logotipo-res">
    <img src="../imagenes/logotipo.png" class="logotipo" alt="" />
  </div>

  <h2>Lista de Productos</h2>
  <div class="entradas-tabla">
    <input type="text" id="filtro" class="form-control filter" placeholder="Filtrar tabla..." />
    <button type="button" id="btnAgregar" class="btn btn-success" data-toggle="modal"
      data-target="#modalAgregarProducto">+ Agregar</button>
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th style="display: none;">ID</th> <!-- Oculta la columna ID -->
          <th>Nombre</th>
          <th>ID Evento</th>
          <th>Precio</th>
          <th class="end">Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Consulta SQL
        include ("../modules/Conexion.php");
        $sql = "SELECT `id_producto`, `producto`, `id_evento`, `precio` FROM `producto`";
        $result = $conn->query($sql);

        // Si hay resultados, mostrarlos en la tabla
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo '<td style="display: none;"><input type="text" value="' . $row["id_producto"] . '" class="form-control entrada" disabled /></td>'; // Oculta el ID
            echo '<td><input type="text" value="' . $row["producto"] . '" class="form-control entrada" disabled /></td>';
            echo '<td><input type="text" value="' . $row["id_evento"] . '" class="form-control entrada" disabled /></td>';
            echo '<td><input type="text" value="' . $row["precio"] . '" class="form-control entrada" disabled /></td>';
            echo '<td class="icons">
            <button class="btn editar" data-toggle="modal" data-target="#editarProductoModal" data-id="<?php echo $row["id_producto"];?><i class="bi bi-pencil-square"></i>
        </button>
        <button class="btn borrar" data-toggle="modal" data-target="#eliminarProductoModal">
        <i class="bi bi-trash"></i>
    </button>
                  </td>';
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='5'>0 resultados</td></tr>";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

  <!-- Modal para editar producto -->
  <div class="modal fade" id="editarProductoModal" tabindex="-1" role="dialog"
    aria-labelledby="editarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarProductoModalLabel">Editar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="editarProductoForm" action="validacionesProducto.php" method="get">
          <div class="modal-body">
            <div class="form-group">
              <label for="deleteProductId">ID:</label>
              <input type="text" class="form-control" id="editProductId" name="id_producto" readonly>
            </div>
            <div class="form-group">
              <label for="editProductName">Nombre:</label>
              <input type="text" class="form-control" id="editProductName" name="nombreProducto">
            </div>
            <?php
            // Incluir el archivo de conexión a la base de datos
            include ("../modules/Conexion.php");
            // Consulta SQL para obtener la información de los eventos
            $sql = "SELECT `id_evento`, `nombre` FROM `evento`";
            // Ejecutar la consulta
            $result = $conn->query($sql);
            // Verificar si se encontraron resultados
            if ($result->num_rows > 0) {
              // Iniciar el select
              echo '<select name="idEvento" id="idEvento" class="form-control">';
              echo '<option value="">Selecciona un evento</option>'; // Opción por defecto
            
              // Iterar sobre los resultados y generar las opciones del select
              while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["id_evento"] . '">' . $row["nombre"] . '</option>';
              }

              // Cerrar el select
              echo '</select>';
            } else {
              // Si no se encontraron resultados
              echo "No hay eventos disponibles";
            }

            // Cerrar la conexión a la base de datos
            $conn->close();
            ?>
            <div class="form-group">
              <label for="editProductPrice">Precio:</label>
              <input type="text" class="form-control" id="editProductPrice" name="precio">
            </div>
            <!-- Otros campos de edición aquí -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" name="editar" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Modal para agregar producto -->
  <div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog"
    aria-labelledby="modalAgregarProductoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAgregarProductoLabel">Agregar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="agregarProductoForm" action="validacionesProducto.php" method="get">
          <div class="modal-body">
            <div class="form-group">
              <label for="nombreProducto">Nombre:</label>
              <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" required>
            </div>
            <?php
            // Incluir el archivo de conexión a la base de datos
            include ("../modules/Conexion.php");

            // Consulta SQL para obtener la información de los eventos
            $sql = "SELECT `id_evento`, `nombre` FROM `evento`";

            // Ejecutar la consulta
            $result = $conn->query($sql);

            // Verificar si se encontraron resultados
            if ($result->num_rows > 0) {
              // Iniciar el select
              echo '<select name="idEvento" id="idEvento" class="form-control">';
              echo '<option value="">Selecciona un evento</option>'; // Opción por defecto
            
              // Iterar sobre los resultados y generar las opciones del select
              while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["id_evento"] . '">' . $row["nombre"] . '</option>';
              }

              // Cerrar el select
              echo '</select>';
            } else {
              // Si no se encontraron resultados
              echo "No hay eventos disponibles";
            }

            // Cerrar la conexión a la base de datos
            $conn->close();
            ?>

            <div class="form-group">
              <label for="precio">Precio:</label>
              <input type="text" class="form-control" id="precio" name="precio" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" name="agregar" class="btn btn-primary">Agregar</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="eliminarProductoModal" tabindex="-1" role="dialog"
    aria-labelledby="eliminarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eliminarProductoModalLabel">Eliminar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="eliminarProductoForm" action="validacionesProducto.php" method="get">
          <div class="modal-body">
            <div class="form-group">
              <label for="deleteProductId">ID:</label>
              <input type="text" class="form-control" id="deleteProductId" name="deleteProductId" readonly>
            </div>
            <div class="form-group">
              <label for="deleteProductName">Nombre:</label>
              <input type="text" class="form-control" id="deleteProductName" name="deleteProductName" readonly>
            </div>
            <p>¿Estás seguro de que quieres eliminar el producto <span id="productNameToDelete"></span>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

<?php include '../templates/footer.php' ?>
<script>
  $('#eliminarProductoModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var productId = button.closest('tr').find('td:eq(0) input').val();
    var productName = button.closest('tr').find('td:eq(1) input').val(); // Obtener el nombre del producto

    var modal = $(this);
    modal.find('#deleteProductId').val(productId);
    modal.find('#deleteProductName').val(productName);
    modal.find('#productNameToDelete').text(productName); // Mostrar el nombre en el mensaje de confirmación
  });

  $('#editarProductoModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var productId = button.closest('tr').find('td:eq(0) input').val();
    var productName = button.closest('tr').find('td:eq(1) input').val();
    var productIdEvento = button.closest('tr').find('td:eq(2) input').val();
    var productPrice = button.closest('tr').find('td:eq(3) input').val();

    // Llenar el formulario en el modal con los valores obtenidos
    var modal = $(this);
    modal.find('#editProductId').val(productId);
    modal.find('#editProductName').val(productName);
    modal.find('#editProductIdEvento').val(productIdEvento);
    modal.find('#editProductPrice').val(productPrice);
  });

</script>
</body>

</html>