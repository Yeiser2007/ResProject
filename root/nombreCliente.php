<?php include '../templates/encabezado.php' ?>
<link rel="stylesheet" href="../css/controlStyle.css" />
<link rel="stylesheet" href="../css/nombre.css">
<?php include '../templates/header.php' ?>

<div class="container">
    <div class="card-nombre">
        <div class="container-fluid">
            <h1 class="text-center">Pedido</h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="validacionesPed.php" method="GET">
                        <div class="form-group">
                            <label for="nombre">Nombre del Cliente:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre_cliente" placeholder="Ingresa el nombre del cliente" required>
                        </div>
                        <?php 
                            include("../modules/Conexion.php");
                            $sql_eventos = "SELECT * FROM `evento`";
                            $resultado_eventos = $conn->query($sql_eventos);
                            // Verificar si la consulta de eventos fue exitosa
                            if ($resultado_eventos) {
                                // Mostrar el select para los eventos
                                echo "<div class='form-group'>";
                                echo "<label for='eventos'>Selecciona un evento:</label>";
                                echo "<select name='id_evento' id='eventos' class='form-control'>";
                                // Iterar sobre los resultados para generar las opciones del select
                                while ($row = $resultado_eventos->fetch_assoc()) {
                                    echo "<option value='" . $row['id_evento'] . "'>" . $row['nombre'] . "</option>";
                                }
                                echo "</select>";
                                echo "</div>";
                            } else {
                                // Mostrar un mensaje de error si la consulta de eventos falla
                                echo "<div class='alert alert-danger' role='alert'>Error al ejecutar la consulta de eventos: " . $conn->error . "</div>";
                            }
                        ?>
                        <button type="submit" class="btn btn-primary btn-block">Siguiente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../templates/footer.php'?><!-- <script src="/JS/pedido.js"></script> -->
</body>
</html>