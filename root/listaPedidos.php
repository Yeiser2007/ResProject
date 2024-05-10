<?php include '../templates/encabezado.php' ?>
<link rel="stylesheet" href="../css/controlStyle.css" />
<?php include '../templates/header.php' ?>

<div class="container">
  <div class="logotipo-res">
    <img src="../imagenes/logotipo.png" class="logotipo" alt="" />
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
                <th style="display: none;">detalles</th>
                <th class="end">Detalles</th>
                <th class="end">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta SQL
            include("../modules/Conexion.php");
            $sql = "SELECT id_pedido, fecha_entrega, nombre_cliente, telefono, resta, hora_entrega, detalles FROM pedido";
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
                    echo '<td style="display: none;" ><input type="text"  value="' . $row["detalles"] . '" class="form-control entrada detalle" disabled /></td>';
                    echo '<td><button class="btn detalles" onclick="mostrarDetalles(this)">Detalles</button></td>';
                    echo '<td class="icons">
                            <button class="btn editar" onclick="editarModal(this)">
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
<div id="editarModal" class="modal fade" tabindex="-1" aria-labelledby="editarM" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarM">Pedido a editar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="borrarForm" action="validacionesLP.php" method="get">
          <div class="mb-3">
            <label for="id_platillo" class="form-label">ID:</label>
            <input type="text" name="id_pedido" class="form-control" id="id_cliente" readonly>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombreclt" readonly>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" name="editar" id="eliminarBtn">editar</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<!-- Modal Detalles -->
<div id="detalles" class="modal fade" tabindex="-1" aria-labelledby="editarM" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarM">detalles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <label for="nombre" class="form-label">Productos y cantidad</label>
            <textarea id="detalleTextArea" name="detalles" class="form-control" rows="5" readonly></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>

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
        <form id="borrarForm" action="validacionesLP.php" method="get">
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

<?php include '../templates/footer.php' ?>
<script src="../JS/filtro.js"></script>
</body>

</html>