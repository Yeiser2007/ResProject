<?php include 'templates/encabezado.php' ?>
<link rel="stylesheet" href="css/controlStyle.css" />
<?php include 'templates/header.php' ?>

<div class="container">
  <div class="logotipo-res">
    <img src="imagenes/logotipo.png" class="logotipo" alt="" />
  </div>

  <h2>Lista Platillos</h2>
  <div class="entradas-tabla">
    <input type="text" id="filtro" class="form-control filter" placeholder="Filtrar tabla..." />
    <a type="button" id="btnAgregar" href="nombreCliente.php" class="btn btn-success">+ Agregar</a>
  </div>
  
  <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th class="int" style="display: none;">ID</th>
                <th>Nombre</th>
                <th>Fecha de Entrega</th>
                <th>Teléfono</th>
                <th>Resta</th>
                <th>Hora de Entrega</th>
                <th class="end">Detalles</th>
                <th class="end">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta SQL
            include("modules/Conexion.php");
            $sql = "SELECT id_pedido, fecha_entrega, nombre_cliente, telefono, resta, hora_entrega FROM pedido";
            $result = $conn->query($sql);

            // Si hay resultados, mostrarlos en la tabla
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo '<td class="int" style="display: none;"><input type="text" value="' . $row["id_pedido"] . '" class="form-control entrada" disabled /></td>';
                    echo '<td><input type="text" value="' . $row["nombre_cliente"] . '" class="form-control entrada" disabled /></td>';
                    echo '<td><input type="text" value="' . $row["fecha_entrega"] . '" class="form-control entrada" disabled /></td>';
                    echo '<td><input type="text" value="' . $row["telefono"] . '" class="form-control entrada" disabled /></td>';
                    echo '<td><input type="text" value="' . $row["resta"] . '" class="form-control entrada" disabled /></td>';
                    echo '<td><input type="text" value="' . $row["hora_entrega"] . '" class="form-control entrada" disabled /></td>';
                    echo '<td><button class="btn detalles" onclick="mostrarDetalles(this)">Detalles</button></td>';
                    echo '<td class="icons">
                            <button class="btn editar" onclick="abrirModal(this)">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="btn borrar" onclick="confirmarBorrado(this)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>';
                     echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>0 resultados</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>


</div>
</div>

<!-- Modal -->
<div id="confirmarBorradoModal" class="modal fade" tabindex="-1" aria-labelledby="confirmarBorradoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmarBorradoModalLabel">Confirmar Borrado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="borrarForm" action="validaciones.php" method="post">
          <div class="mb-3">
            <label for="id_platillo" class="form-label">ID:</label>
            <input type="text" name="id_delete" class="form-control" id="id_platillo" readonly>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" readonly>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger" name="eliminar" id="eliminarBtn">Eliminar</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarModalLabel">Editar Platillo</h5>
        <button type="button" onclick="cerrarModal()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editarForm" action="validaciones.php" method="POST">
          <div class="form-group">
            <label for="idr">Id</label>
            <input type="text" class="form-control" name="id_platillo" id="idr" readonly>
          </div>
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
          </div>
          <div class="form-group">
            <label for="clasificacion">Clasificación</label>
            <input type="text" class="form-control" name="clasificacion" id="clasificacion">
          </div>
          <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" name="tipo" id="tipo">
          </div>
          <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" name="precio" id="precio">
          </div>
          <div class="modal-footer">
            <button type="button" onclick="cerrarModal()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="update" class="btn btn-primary">Guardar cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Agregar -->
<div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarModalLabel">Agregar Platillo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="agregarForm" action="validaciones.php" method="POST">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
          </div>
          <div class="form-group">
            <?php
            // Realizar la consulta
            include("modules/Conexion.php");
            $sql = "SELECT * FROM clasificacion";
            $result = $conn->query($sql);
            // Comprobar si hay resultados y mostrarlos en un elemento select
            if ($result->num_rows > 0) {
              echo '<label for="clasificacion">Clasificación</label>';
              echo '<select name="clasificacion" id="clasificacion" class="form-control">';
              while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["id_clasificacion"] . '">' . $row["nombre"] . '</option>';
              }
              echo '</select>';
            } else {
              echo "No hay clasificaciones disponibles";
            }
            // Cerrar la conexión
            $conn->close();
            ?>
          </div>
          <div class="form-group">
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="form-control">
              <option value="desayunos">Desayunos</option>
              <option value="comidas">Comidas</option>
              <option value="iconos">Iconos</option>
            </select>
          </div>
          <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" name="precio" id="precio" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="insertar_plat" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'templates/footer.php' ?>
<script src="JS/filtro.js"></script>
</body>

</html>