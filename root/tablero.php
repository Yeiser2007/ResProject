<?php include '../templates/encabezado.php' ?>
<link rel="stylesheet" href="../css/controlStyle.css" />
<link rel="stylesheet" href="../css/TablasControl.css">
<?php include '../templates/header.php' ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container">
    <?php
    // Realizar la conexión a la base de datos
    include ("../modules/Conexion.php");
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
        }
    }
    ?>

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
        include ("../modules/Conexion.php");

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
    <?php
    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>


<?php
include ("../modules/Conexion.php");

$sql = "SELECT 
            p.producto, 
            COUNT(o.id_producto) AS cantidad_registros, 
            SUM(o.cantidad) AS suma_cantidad
        FROM 
            orden o
        JOIN 
            producto p ON o.id_producto = p.id_producto
        GROUP BY 
            o.id_producto, p.producto
        ORDER BY 
            p.producto";

$resultado = $conn->query($sql);

$productos = [];
$cantidadesRegistros = [];
$sumaCantidades = [];

if ($resultado->num_rows > 0) {
    echo "<table style='display:none;' border='1'>
            <tr>
                <th>Producto</th>
                <th>Cantidad de Registros</th>
                <th>Suma de Cantidad</th>
            </tr>";
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>{$fila['producto']}</td>
                <td>{$fila['cantidad_registros']}</td>
                <td>{$fila['suma_cantidad']}</td>
              </tr>";
        $productos[] = $fila['producto'];
        $cantidadesRegistros[] = $fila['cantidad_registros'];
        $sumaCantidades[] = $fila['suma_cantidad'];
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

$conn->close();
?>

<div class="col-md-6 mx-auto mb-4">
    <div class="card">
        <div class="card-body">
            <canvas id="chart" width="300" height="300"></canvas>
        </div>
    </div>
</div>

<?php
include ("../modules/Conexion.php");

$sql = "SELECT 
            p.id_evento, 
            e.nombre, 
            p.producto, 
            COUNT(o.id_producto) AS cantidad_registros, 
            SUM(o.cantidad) AS suma_cantidad
        FROM 
            orden o
        JOIN 
            producto p ON o.id_producto = p.id_producto
        JOIN 
            evento e ON p.id_evento = e.id_evento
        GROUP BY 
            p.id_evento, e.nombre, o.id_producto, p.producto
        ORDER BY 
            e.nombre, p.producto";

$resultado = $conn->query($sql);

$eventos = [];
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $eventos[$fila['id_evento']]['nombre_evento'] = $fila['nombre'];
        $eventos[$fila['id_evento']]['productos'][] = [
            'producto' => $fila['producto'],
            'cantidad_registros' => $fila['cantidad_registros'],
            'suma_cantidad' => $fila['suma_cantidad']
        ];
    }
} else {
    echo "No se encontraron resultados.";
}

$conn->close();
?>

<?php foreach ($eventos as $evento): ?>
    <h2 class="mt-5"><?= htmlspecialchars($evento['nombre_evento']) ?></h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad de Registros</th>
                <th>Suma de Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evento['productos'] as $producto): ?>
                <tr>
                    <td><?= htmlspecialchars($producto['cantidad_registros']) ?></td>
                    <td><?= htmlspecialchars($producto['producto']) ?></td>
                    <td><?= htmlspecialchars($producto['suma_cantidad']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endforeach; ?>

</div>
<?php include '../templates/footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Datos para el gráfico
    const labels = <?php echo json_encode($productos); ?>;
    const dataCantidades = <?php echo json_encode($cantidadesRegistros); ?>;
    const dataSumas = <?php echo json_encode($sumaCantidades); ?>;

    const ctx = document.getElementById('chart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfico
        data: {
            labels: labels,
            datasets: [{
                label: 'Suma de Cantidad',
                data: dataSumas,
                backgroundColor: 'rgba(255, 99, 132, 1)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
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