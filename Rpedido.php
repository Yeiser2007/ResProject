<?php
// Incluir el archivo de conexión a la base de datos
include "modules/Conexion.php";
// Verificar si se recibieron todos los valores en la URL GET
if(isset($_GET['id_pedido'], $_GET['fechaActual'], $_GET['fecha_entrega'], $_GET['nombre_cliente'], $_GET['telefono'], $_GET['resta'], $_GET['total'], $_GET['hora_entrega'], $_GET['acuenta'])) {
    // Obtener los valores de la URL GET
    $id_pedido = $_GET['id_pedido'];
    $fecha_pedido = $_GET['fechaActual'];
    $fecha_entrega = $_GET['fecha_entrega'];
    $nombre_cliente = $_GET['nombre_cliente'];
    $telefono = $_GET['telefono'];
    $resta = $_GET['resta'];
    $total = $_GET['total'];
    $hora_entrega = $_GET['hora_entrega'];
    $acuenta = $_GET['acuenta'];

    // Preparar la consulta SQL
    $sql = "UPDATE pedido SET 
            fecha_pedido = '$fecha_pedido',
            fecha_entrega = '$fecha_entrega',
            nombre_cliente = '$nombre_cliente',
            telefono = '$telefono',
            resta = '$resta',
            total = '$total',
            hora_entrega = '$hora_entrega',
            acuenta = '$acuenta'
            WHERE id_pedido = '$id_pedido'";

    // Ejecutar la consulta SQL
    if($conn->query($sql) === TRUE) {
    
        header("location: listaPedidos.php");    
    } else {
        echo "Error al actualizar el pedido: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "No se recibieron todos los valores necesarios.";
}
?>
