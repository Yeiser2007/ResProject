<?php
    include("modules/Conexion.php");
    $nombre_cliente = $_GET['nombre_cliente'];
    $id_evento = $_GET['id_evento'];
    if (isset($_GET['nombre_cliente'])) {
        // Recoger el nombre del cliente del formulario
        
        // Preparar la consulta SQL
        $sql = "INSERT INTO `pedido`(`nombre_cliente`) VALUES ('$nombre_cliente')";
        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            // Obtener el ID del pedido insertado
            $id_pedido = $conn->insert_id;
            // Redireccionar a agregar_pedido.php con el ID del pedido
            header("location: agregar_pedido.php?id_cliente=$id_pedido&id_evento=$id_evento");
        } else {
            echo "Error al insertar el pedido: " . $conn->error;
        }
        $conn->close();
    }

    if (isset($_GET['productos'], $_GET['cantidad'],$_GET['id_cliente'],$_GET['id_evento'])) {
        $id_producto = $_GET['productos'];
        $cantidad = $_GET['cantidad'];
        $id_cliente = $_GET['id_cliente'];
        $id_evento = $_GET ['id_evento'];

        $sql = "INSERT INTO orden (id_pedido, id_producto,cantidad) VALUES ('$id_cliente', '$id_producto', '$cantidad')";
            // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            header("location: agregar_pedido.php?id_cliente=$id_cliente&id_evento=$id_evento");
        } else {
            echo "Error al insertar la orden: " . $conn->error;
        }
// Cerrar la conexión
$conn->close();
}
?>
<?php
// Verificar si se proporcionó el ID de la orden en la URL
if(isset($_GET['delete'])) {
    // Obtener el ID de la orden de la URL
    $id_orden = $_GET['id_orden'];
    $id_evento = $_GET['id_evento'];
    $id_cliente = $_GET['id_cliente'];
    // Consulta SQL para eliminar la orden con el ID proporcionado
    include("modules/Conexion.php");
    $sql = "DELETE FROM `orden` WHERE `id_orden` = ?";
    
    // Preparar la sentencia
    $stmt = $conn->prepare($sql);
    
    // Verificar si la preparación de la sentencia fue exitosa
    if($stmt) {
        // Vincular el parámetro
        $stmt->bind_param("i", $id_orden);
        
        // Ejecutar la consulta
        if($stmt->execute()) {
        header("location: agregar_pedido.php?id_cliente=$id_cliente&id_evento=$id_evento");
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }
        
        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
    
    // Cerrar la conexión
    $conn->close();
} else {
    echo "No se proporcionó el ID de la orden.";
}
?>

<?php
// Verificar si se proporcionaron los datos en la URL
if (isset($_GET['id_pedido'], $_GET['fecha_pedido'], $_GET['fecha_entrega'], $_GET['nombre_cliente'], $_GET['telefono'], $_GET['estatus'], $_GET['total'], $_GET['hora_entrega'])) {
    // Recoger los datos de la URL
    $id_pedido = $_GET['id_pedido'];
    $fecha_pedido = $_GET['fecha_pedido'];
    $fecha_entrega = $_GET['fecha_entrega'];
    $nombre_cliente = $_GET['nombre_cliente'];
    $telefono = $_GET['telefono'];
    $total = $_GET['total'];
    $hora_entrega = $_GET['hora_entrega'];

    // Preparar la consulta SQL de actualización
    $sql = "UPDATE `pedido` SET 
            `fecha_pedido`='$fecha_pedido',
            `fecha_entrega`='$fecha_entrega',
            `nombre_cliente`='$nombre_cliente',
            `telefono`='$telefono',
            `estatus`='$estatus',
            `total`='$total',
            `hora_entrega`='$hora_entrega'
            WHERE `id_pedido`='$id_pedido'";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
} else {
    echo "No se proporcionaron todos los datos necesarios en la URL.";
}
?>

