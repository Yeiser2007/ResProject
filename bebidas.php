<?php include 'templates/encabezado.php' ?>
<link rel="stylesheet" href="css/controlStyle.css" />
<?php include 'templates/header.php' ?>

<div class="container">
    <div class="logotipo-res">
        <img src="imagenes/logotipo.png" class="logotipo" alt="" />
    </div>

    <h2>Lista de Bebidas</h2>
    <div class="entradas-tabla">
        <input type="text" id="filtro" class="form-control filter" placeholder="Filtrar tabla..." />
        <button type="button" id="btnAgregar" onclick="abrirModalAgregar()" class="btn btn-success">+ Agregar</button>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="display: none;">ID</th> <!-- Oculta la columna ID -->
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Tipo</th>
                    <th class="end">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta SQL
                include("modules/Conexion.php");
                $sql = "SELECT `id_bebida`, `nombre`, `precio`, `tipo` FROM `bebida`";
                $result = $conn->query($sql);

                // Si hay resultados, mostrarlos en la tabla
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo '<td style="display: none;"><input type="text" value="' . $row["id_bebida"] . '" class="form-control entrada" disabled /></td>'; // Oculta el ID
                        echo '<td><input type="text" value="' . $row["nombre"] . '" class="form-control entrada" disabled /></td>';
                        echo '<td><input type="text" value="' . $row["precio"] . '" class="form-control entrada" disabled /></td>';
                        echo '<td><input type="text" value="' . $row["tipo"] . '" class="form-control entrada" disabled /></td>';
                        echo '<td class="icons">
                            <button class="btn editar" onclick="abrirModalEditar(this)">
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

    <!-- Modal para editar bebida -->
    <div class="modal fade" id="editarBebidaModal" tabindex="-1" role="dialog" aria-labelledby="editarBebidaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarBebidaModalLabel">Editar Bebida</h5>
                    <button type="button" class="close" onclick="cerrarModal()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editarBebidaForm" action="validacionesBeb.php" method="GET">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="idBebidaEdit">ID Bebida:</label>
                            <input type="text" class="form-control" id="idBebidaEdit" name="idBebida" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nombreBebidaEdit">Nombre:</label>
                            <input type="text" class="form-control" id="nombreBebidaEdit" name="nombreBebida">
                        </div>
                        <div class="form-group">
                            <label for="precioBebidaEdit">Precio:</label>
                            <input type="text" class="form-control" id="precioBebidaEdit" name="precioBebida">
                        </div>
                        <div class="form-group">
                            <label for="tipoBebidaEdit">Tipo:</label>
                            <input type="text" class="form-control" id="tipoBebidaEdit" name="tipoBebida">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal()" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="update" class="btn btn-primary" onclick="guardarCambios()">Guardar
                            Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para agregar bebida -->
    <div class="modal fade" id="modalAgregarBebida" tabindex="-1" role="dialog" aria-labelledby="modalAgregarBebidaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarBebidaLabel">Agregar Bebida</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="agregarBebidaForm" action="validacionesBeb.php" method="get">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombreBebida">Nombre:</label>
                            <input type="text" class="form-control" id="nombreBebida" name="nombreBebida">
                        </div>
                        <div class="form-group">
                            <label for="precioBebida">Precio:</label>
                            <input type="text" class="form-control" id="precioBebida" name="precioBebida">
                        </div>
                        <div class="form-group">
                            <label for="tipoBebida">Tipo:</label>
                            <input type="text" class="form-control" id="tipoBebida" name="tipoBebida">
                        </div>
                        <div class="form-group">
                            <label for="tipo">Seleccionar tipo:</label>
                            <select class="form-select" id="tipo" name="tipo" aria-label="Seleccionar tipo">
                                <option value="desayunos">Desayunos</option>
                                <option value="comidas">Comidas</option>
                                <option value="ambos">Ambos</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" name="agregar" class="btn btn-primary">Guardar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminarLabel">Eliminar Bebida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar la bebida con ID <span id="modalIdBebida"></span> y nombre
                    <span id="modalNombre"></span>?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="eliminarBebida()">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<?php include 'templates/footer.php' ?>
<script src="JS/bebidas.js"></script>
</body>

</html>