<?php include '../templates/encabezado.php' ?>
<link rel="stylesheet" href="../css/controlStyle.css" />
<?php include '../templates/header.php' ?>

<div class="container">
    <?php
    // Realizar la conexión a la base de datos
    include("../modules/Conexion.php");

    // Consulta SQL para obtener los datos de la base de datos
    $sql_pedidos = "SELECT `fecha_entrega`, COUNT(*) AS cantidad_pedidos FROM `pedido` GROUP BY `fecha_entrega`";
    $resultado_pedidos = $conn->query($sql_pedidos);

    // Verificar si se encontraron resultados
    if ($resultado_pedidos->num_rows > 0) {
        // Inicializar un array para almacenar los datos de la gráfica de pastel
        $datos_grafica_pastel = array();

        // Recorrer los resultados y almacenar los datos en el array
        while ($row = $resultado_pedidos->fetch_assoc()) {
            $fecha_entrega = $row['fecha_entrega'];
            $cantidad_pedidos = $row['cantidad_pedidos'];
            $datos_grafica_pastel[$fecha_entrega] = $cantidad_pedidos;
        }}
    ?>

    <div class="row">
        <div class="col-md-6 mx-auto mb-4">
            <div class="card">
                <div class="card-body">
                    <canvas id="graficoPastel" width="300" height="300"></canvas>
                </div>
            </div>
        </div>

        <?php
        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>

        <?php
        // Realizar la conexión a la base de datos nuevamente
        include("../modules/Conexion.php");

        // Consulta SQL para obtener los datos de la base de datos
        $sql_productos = "SELECT p.producto AS nombre_producto, SUM(o.cantidad) AS cantidad_vendida
                          FROM orden o
                          INNER JOIN producto p ON o.id_producto = p.id_producto
                          GROUP BY p.producto";
        $resultado_productos = $conn->query($sql_productos);

        // Verificar si se encontraron resultados
        if ($resultado_productos->num_rows > 0) {
            // Inicializar arrays para almacenar los datos de la gráfica de barras
            $nombres_productos = array();
            $cantidades_vendidas = array();

            // Recorrer los resultados y almacenar los datos en los arrays
            while ($row = $resultado_productos->fetch_assoc()) {
                $nombre_producto = $row['nombre_producto'];
                $cantidad_vendida = $row['cantidad_vendida'];
                $nombres_productos[] = $nombre_producto;
                $cantidades_vendidas[] = $cantidad_vendida;
            }
        }
        ?>

        <div class="col-md-6 mx-auto mb-4">
            <div class="card">
                <div class="card-body">
                    <canvas id="graficoBarras" width="300" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</div>

<?php include '../templates/footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctxPastel = document.getElementById('graficoPastel').getContext('2d');
    var graficoPastel = new Chart(ctxPastel, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(array_keys($datos_grafica_pastel)); ?>,
            datasets: [{
                label: 'Cantidad de Pedidos',
                data: <?php echo json_encode(array_values($datos_grafica_pastel)); ?>,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 206, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)'
                ],
                borderColor: 'rgb(255, 255, 255)',
                borderWidth: 0
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Pedidos por Fecha de Entrega'
                }
            }
        }
    });

    var ctxBarras = document.getElementById('graficoBarras').getContext('2d');
    var graficoBarras = new Chart(ctxBarras, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($nombres_productos); ?>,
            datasets: [{
                label: 'Cantidad Vendida',
                data: <?php echo json_encode($cantidades_vendidas); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Productos Vendidos'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html> 