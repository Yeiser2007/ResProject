<?php
    include("../modules/Conexion.php");
if (isset($_GET['agregar'])) {
    $nombreProducto = $_GET['nombreProducto'];
    $idEvento = $_GET['idEvento'];
    $precio = $_GET['precio'];

    $sql = "INSERT INTO `producto`(`producto`, `id_evento`, `precio`) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }
    $stmt->bind_param("sii", $nombreProducto, $idEvento, $precio);
    if ($stmt->execute() === true) {
        header("Location: producto.php");
        $stmt->close();
        $conn->close();
            }
} 

// Verificar si se recibieron los parámetros necesarios
if (isset($_GET['editar'])) {
    // Obtener los valores de los parámetros
    $idProducto = $_GET['id_producto'];
    $nombreProducto = $_GET['nombreProducto'];
    $idEvento = $_GET['idEvento'];
    $precio = $_GET['precio'];
    $sql = "UPDATE `producto` SET `producto`=?, `id_evento`=?, `precio`=? WHERE `id_producto`=?";
    // Preparar la sentencia
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }
    // Vincular los parámetros
    $stmt->bind_param("sidi", $nombreProducto, $idEvento, $precio, $idProducto);
    // Ejecutar la consulta
    if ($stmt->execute() === true) {
          // Redirigir a una página de éxito o hacer otra acción si es necesario
    header("Location: producto.php");  
 }
    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conn->close();

} 

// Verificar si se recibió el parámetro necesario (id_producto)
if (isset($_GET['eliminar'])) {
    $idProducto = $_GET['deleteProductId'];
    $sql = "DELETE FROM `producto` WHERE `id_producto`=?";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("i", $idProducto);

    if ($stmt->execute() === true) {
        header("Location: producto.php");    
    }
    $stmt->close();
    $conn->close();
}

?>