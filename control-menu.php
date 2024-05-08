<?php include 'templates/encabezado.php' ?>
<link rel="stylesheet" href="css/col-table.css"/>
<?php include 'templates/header.php' ?>

<!-- Agregar Modal -->
<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalAgregarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarLabel">Agregar Entrada</h5>
                <button type="button" onclick="cerrarModal2()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAgregar" action="validacionesMenu.php" method="post">
                    <div class="form-group">
                        <label for="tipoEntrada">Tipo de Entrada:</label>
                        <select class="form-control" id="tipoEntrada" name="tipoEntrada">
                            <option value="Primeras">Primeras</option>
                            <option value="Segundas">Segundas</option>
                            <option value="Fuertes">Fuertes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombreEntrada">Nombre de la Entrada:</label>
                        <input type="text" class="form-control" id="nombreEntrada" name="nombreEntrada">
                    </div>
                    <div class="modal-footer">
            <button type="button" onclick="cerrarModal2()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" name="insertar" form="formAgregar">Guardar</button>
            </div>
                </form>
            </div>
           
        </div>
    </div>
</div>
<!-- Modal Editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Editar Opción</h5>
                <button type="button" onclick="cerrarModal1()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editarForm" action="validacionesMenu.php" method="post">
                    <div class="form-group">
                        <label for="filaId">Id:</label>
                        <input type="text" class="form-control" id="filaId" name="filaId" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <input type="text" class="form-control" id="tipoEditar" name="tipoEditar" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nuevaOpcion">Nueva Opción:</label>
                        <input type="text" class="form-control" id="nuevaOpcion" name="nuevaOpcion">
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="cerrarModal1()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="update" form="editarForm">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminarLabel">Confirmar Eliminación</h5>
                <button type="button" class="close" onclick="cerrarModal3()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar la siguiente entrada?</p>
                <form id="eliminarForm" action="validacionesMenu.php" method="post">
                    <div class="form-group">
                        <label for="Idnombre">Id:</label>
                        <input type="text" class="form-control" id="Idnombre" name="filaId" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tipoEliminar">Tipo:</label>
                        <input type="text" class="form-control" id="tipoEliminar" name="tipoEliminar" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre platillo:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="cerrarModal3()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger" name="eliminar" id="eliminarEntrada">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="logotipo-res">
        <img src="imagenes/logotipo.png" class="logotipo" alt="">
    </div>

    <h2>Arma tu menú</h2>
    <div class="entradas-tabla">
        Selecciona las opciones para armar tu menu
        <button type="button" id="btnAgregar" onclick="abrirModalAgregar()" class="btn btn-success">+ Agregar</button>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Entrada</th>
                    <th class="end">Acción</th>
                </tr>
            </thead>
            <tbody>
                <!-- Primeras entradas -->
                <tr>

            
                    <td>Primeras</td>
                    <td id="id_select">
                        <?php
                        // Realizar la consulta
                        include("modules/Conexion.php");
                        $sql = "SELECT * FROM p_entradas";
                        $result = $conn->query($sql);
                        // Comprobar si hay resultados y mostrarlos en un elemento select
                        if ($result->num_rows > 0) {
                            echo '<select name="clasificacion" id="clasificacion" class="form-control">';
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["id_entrada"] . '">' . $row["nombre"] . '</option>';
                            }
                            echo '</select>';
                        } else {
                            echo "No hay clasificaciones disponibles";
                        }
                        // Cerrar la conexión
                        $conn->close();
                        ?>
                    </td>
                    <td class="icons">
                        <button class="btn editar" onclick="abrirModalEditar(this)"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn borrar" onclick="abrirModalEliminar(this)"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>

                    <td>Primeras</td>
                    <td id="id_select">
                        <?php
                        // Realizar la consulta
                        include("modules/Conexion.php");
                        $sql = "SELECT * FROM p_entradas";
                        $result = $conn->query($sql);
                        // Comprobar si hay resultados y mostrarlos en un elemento select
                        if ($result->num_rows > 0) {
                            echo '<select name="clasificacion" id="clasificacion" class="form-control">';
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["id_entrada"] . '">' . $row["nombre"] . '</option>';
                            }
                            echo '</select>';
                        } else {
                            echo "No hay clasificaciones disponibles";
                        }
                        // Cerrar la conexión
                        $conn->close();
                        ?>
                    </td>
                    <td class="icons">
                        <button class="btn editar" onclick="abrirModalEditar(this)"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn borrar" onclick="abrirModalEliminar(this)"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <!-- Segundas entradas -->
                <tr>
                
                    <td>Segundas</td>
                    <td id="id_select">
                    <?php
                        // Realizar la consulta
                        include("modules/Conexion.php");
                        $sql = "SELECT * FROM s_entradas";
                        $result = $conn->query($sql);
                        // Comprobar si hay resultados y mostrarlos en un elemento select
                        if ($result->num_rows > 0) {
                            echo '<select name="clasificacion" id="clasificacion" class="form-control">';
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["id_entrada"] . '">' . $row["nombre"] . '</option>';
                            }
                            echo '</select>';
                        } else {
                            echo "No hay clasificaciones disponibles";
                        }
                        // Cerrar la conexión
                        $conn->close();
                        ?>
                    </td>
                    <td class="icons">
                        <button class="btn editar" onclick="abrirModalEditar(this)"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn borrar" onclick="abrirModalEliminar(this)"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
        
                    <td>Segundas</td>
                    <td id="id_select">
                    <?php
                        // Realizar la consulta
                        include("modules/Conexion.php");
                        $sql = "SELECT * FROM s_entradas";
                        $result = $conn->query($sql);
                        // Comprobar si hay resultados y mostrarlos en un elemento select
                        if ($result->num_rows > 0) {
                            echo '<select name="clasificacion" id="clasificacion" class="form-control">';
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["id_entrada"] . '">' . $row["nombre"] . '</option>';
                            }
                            echo '</select>';
                        } else {
                            echo "No hay clasificaciones disponibles";
                        }
                        // Cerrar la conexión
                        $conn->close();
                        ?>
                    </td>
                    <td class="icons">
                        <button class="btn editar" onclick="abrirModalEditar(this)"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn borrar" onclick="abrirModalEliminar(this)"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <!-- Fuertes entradas -->
                <tr>
                   
                    <td>Fuertes</td>
                    <td id="id_select">
                    <?php
                        // Realizar la consulta
                        include("modules/Conexion.php");
                        $sql = "SELECT * FROM fuerte";
                        $result = $conn->query($sql);
                        // Comprobar si hay resultados y mostrarlos en un elemento select
                        if ($result->num_rows > 0) {
                            echo '<select name="clasificacion" id="clasificacion" class="form-control">';
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["id_fuerte"] . '">' . $row["nombre"] . '</option>';
                            }
                            echo '</select>';
                        } else {
                            echo "No hay clasificaciones disponibles";
                        }
                        // Cerrar la conexión
                        $conn->close();
                        ?>
                    </td>
                    <td class="icons">
                        <button class="btn editar" onclick="abrirModalEditar(this)"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn borrar" onclick="abrirModalEliminar(this)"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                 
                    <td>Fuertes</td>
                    <td id="id_select">
                    <?php
                        // Realizar la consulta
                        include("modules/Conexion.php");
                        $sql = "SELECT * FROM fuerte";
                        $result = $conn->query($sql);
                        // Comprobar si hay resultados y mostrarlos en un elemento select
                        if ($result->num_rows > 0) {
                            echo '<select name="clasificacion" id="clasificacion" class="form-control">';
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["id_fuerte"] . '">' . $row["nombre"] . '</option>';
                            }
                            echo '</select>';
                        } else {
                            echo "No hay clasificaciones disponibles";
                        }
                        // Cerrar la conexión
                        $conn->close();
                        ?>
                    </td>
                    <td class="icons">
                        <button class="btn editar" onclick="abrirModalEditar(this)"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn borrar" onclick="abrirModalEliminar(this)"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<div class="boton-end">
    <button type="button" class="btn btn-primary" onclick="modalMenu()">Armar menú</button>
</div>

<footer>
    <div class="line-green"></div>
    <div class="line-brown">
        @by El sabor de las Americas
    </div>
</footer>

<!-- Modal para armar menú -->
<div class="modal fade" id="modalArmarMenu" tabindex="-1" aria-labelledby="modalArmarMenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalArmarMenuLabel">Armar Menú</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formArmarMenu" action="validacionesMenu.php" method="post">
                <div class="modal-body">
                    <!-- Inputs para las opciones de menú -->
                    <div class="form-group">
                        <label for="entrada1">1°tiempo: Entrada 1:</label>
                        <input type="text" class="form-control" id="entrada11" name="entrada11">
                    </div>
                    <div class="form-group">
                        <label for="entrada2">1°tiempo: Entrada 2:</label>
                        <input type="text" class="form-control" id="entrada12" name="entrada12">
                    </div>
                    <div class="form-group">
                        <label for="entrada1">2°tiempo:Entrada 1:</label>
                        <input type="text" class="form-control" id="entrada21" name="entrada21">
                    </div>
                    <div class="form-group">
                        <label for="entrada2">2°tiempo: Entrada 2:</label>
                        <input type="text" class="form-control" id="entrada22" name="entrada22">
                    </div>
                    <div class="form-group">
                        <label for="fuerte1">Plato Fuerte 1:</label>
                        <input type="text" class="form-control" id="fuerte1" name="fuerte1">
                    </div>
                    <div class="form-group">
                        <label for="fuerte2">Plato Fuerte 2:</label>
                        <input type="text" class="form-control" id="fuerte2" name="fuerte2">
                    </div>
                    <!-- Input para la fecha actual -->
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="text" class="form-control" id="fecha" name="fecha" readonly>
                    </div>

                    <!-- Input con valor predeterminado -->
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" class="form-control" id="precio" name="precio" value="85" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="guardarMenu" class="btn btn-primary">Guardar Menú</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php include 'templates/footer.php' ?>
<script src="JS/control-menu.js"></script>
<script src="JS/menu.js"></script>


</body>

</html>