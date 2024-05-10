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
    <button type="button" id="btnAgregar" class="btn btn-success">+ Agregar</button>
  </div>
  <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th style="display: none;">ID</th> <!-- Oculta la columna ID -->
                <th>Nombre</th>
                <th>Fecha Fin</th>
                <th class="end">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta SQL
            include("../modules/Conexion.php");
            $sql = "SELECT `id_evento`, `nombre`, `fecha_fin` FROM `evento`";
            $result = $conn->query($sql);

            // Si hay resultados, mostrarlos en la tabla
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo '<td style="display: none;"><input type="text" value="' . $row["id_evento"] . '" class="form-control entrada" disabled /></td>'; // Oculta el ID
                    echo '<td><input type="text" value="' . $row["nombre"] . '" class="form-control entrada" disabled /></td>';
                    echo '<td><input type="text" value="' . $row["fecha_fin"] . '" class="form-control entrada" disabled /></td>';
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
                echo "<tr><td colspan='4'>0 resultados</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<!-- Modal para editar evento -->
<div class="modal fade" id="editarEventoModal" tabindex="-1" role="dialog" aria-labelledby="editarEventoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarEventoModalLabel">Editar Evento</h5>
                <button type="button" class="close" onclick="cerrarModal()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editarEventoForm" action="validacionesEv.php" method="GET">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="idEventoEdit">ID Evento:</label>
                        <input type="text" class="form-control" id="idEventoEdit" name="idEvento" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nombreEventoEdit">Nombre:</label>
                        <input type="text" class="form-control" id="nombreEventoEdit" name="nombreEvento">
                    </div>
                    <div class="form-group">
                        <label for="fechaFinEventoEdit">Fecha Fin:</label>
                        <input type="date" class="form-control" id="fechaFinEventoEdit" name="fechaFin">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="cerrarModal()" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="update" class="btn btn-primary" onclick="guardarCambios()">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="modalAgregarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAgregarLabel">Agregar Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="agregarEventoForm" action="validacionesEv.php" method="get">
        <div class="modal-body">
          <div class="form-group">
            <label for="nombreEvento">Nombre:</label>
            <input type="text" class="form-control" id="nombreEvento" name="nombreEvento">
          </div>
          <div class="form-group">
            <label for="fechaEvento">Fecha:</label>
            <input type="date" class="form-control" id="fechaEvento" name="fechaEvento">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="agregar" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="eliminarEventoModal" tabindex="-1" role="dialog" aria-labelledby="eliminarEventoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarEventoModalLabel">Eliminar Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="eliminarEventoForm" action="validacionesEv.php" method="GET">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombreEventoEliminar">Nombre del Evento:</label>
                        <input type="text" class="form-control" id="nombreEventoEliminar" name="nombreEvento" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="delete" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<?php include '../templates/footer.php' ?>
<script src="../JS/eventos.js"></script>
</body>

</html>