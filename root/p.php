<?php include '../templates/encabezado.php' ?>
<link rel="stylesheet" href="../css/controlStyle.css" />
<?php include '../templates/header.php' ?>

<div class="container">
  <div class="logotipo-res">
    <img src="../imagenes/logotipo.png" class="logotipo" alt="" />
  </div>

  <h2>Lista de Platillos</h2>
  <div class="entradas-tabla">
    <input type="text" id="filtro" class="form-control filter" placeholder="Filtrar tabla..." />
    <button type="button" id="btnAgregar" class="btn btn-success">+ Agregar</button>
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
        include("../modules/Conexion.php");
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
                    <button class="btn editar" onclick="abrirModal(this)">
                      <i class="bi bi-pencil-square"></i>
                    </button>
                    <button class="btn borrar" onclick="abrirModalEliminar(this)">
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
  <div class="modal fade" id="editarProductoModal" tabindex="-1" role="dialog" aria-labelledby="editarProductoModalLabel" aria-hidden="true">
    <!-- Contenido del modal -->
  </div>

  <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="modalAgregarLabel" aria-hidden="true">
    <!-- Contenido del modal -->
  </div>

  <div class="modal fade" id="eliminarProductoModal" tabindex="-1" role="dialog" aria-labelledby="eliminarProductoModalLabel" aria-hidden="true">
    <!-- Contenido del modal -->
  </div>
</div>

<?php include '../templates/footer.php' ?>
<script src="../JS/productos.js"></script>
</body>

</html>
