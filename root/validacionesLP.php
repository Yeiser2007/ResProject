<?php
include("../modules/Conexion.php");

if (isset($_GET['editar'])) {
    // Obtener el id_pedido de la URL
    $id_pedido = $_GET['id_pedido'];

    $sql = "SELECT producto.id_evento
            FROM producto
            JOIN orden ON producto.id_producto = orden.id_producto
            WHERE orden.id_pedido = $id_pedido";

    // Ejecutar la consulta
    $result = $conn->query($sql);

    // Verificar si se obtuvieron resultados
    if ($result->num_rows > 0) {
        // Iterar sobre los resultados y mostrar el id_evento
        while ($row = $result->fetch_assoc()) {
            $id_evento = $row["id_evento"];
            header("location: agregar_pedido.php?id_cliente=$id_pedido&id_evento=$id_evento");
        }
    } else {
        echo "No se encontraron resultados para el id_pedido proporcionado.";
    }

    // Cerrar la conexión
    $conn->close();
}else if (isset($_GET['eliminar'])) {
    $id_pedido = $_GET['id_delete'];
    $sql_delete_orden = "DELETE FROM orden WHERE id_pedido = $id_pedido";
    if ($conn->query($sql_delete_orden) === TRUE) {
            $sql_delete_pedido = "DELETE FROM pedido WHERE id_pedido = $id_pedido";
    if ($conn->query($sql_delete_pedido) === TRUE) {
        header("location: listaPedidos.php");
    } else {
        echo "Error al eliminar la fila del pedido: " . $conn->error;
    }
} else {
    echo "Error al eliminar las filas de orden relacionadas: " . $conn->error;
}

// Cerrar conexión
$conn->close();
}
?>