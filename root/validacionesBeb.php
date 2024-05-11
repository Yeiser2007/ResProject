<?php
// Conexión a la base de datos
include("../modules/Conexion.php");
// Verificar si se proporcionaron los valores necesarios en la URL
if (isset($_GET['agregar'])) {
    // Obtener los valores de la URL
    $nombre = $_GET['nombre'];
    $precio = $_GET['precio'];
    $tipo = $_GET['tipo'];
    include("conexion.php");
    $sql = "INSERT INTO `bebida`(`nombre`, `precio`, `tipo`) VALUES (?, ?, ?)";
    // Preparar la sentencia
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }
    // Vincular los parámetros
    $stmt->bind_param("sds", $nombre, $precio, $tipo);
    // Ejecutar la consulta
    if ($stmt->execute() === true) {
        header("Location: bebidas.php");
    }else{
        die("Error al ejecutar la consulta: " . $stmt->error);
    }
    $stmt->close();
    $conn->close();
}?>
<?php
// Verificar si se proporcionó el ID de la bebida en la URL para la actualización
if (isset($_GET['update'])) {
    // Obtener los valores de la URL
    $id_bebida = $_GET['id_bebida'];
    $nombre = $_GET['nombre'];
    $precio = $_GET['precio'];
    $tipo = $_GET['tipo'];

    // Preparar la consulta SQL
    $sql = "UPDATE `bebida` SET `nombre`=?, `precio`=?, `tipo`=? WHERE `id_bebida`=?";

    // Preparar la sentencia
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    // Vincular los parámetros
    $stmt->bind_param("sdsi", $nombre, $precio, $tipo, $id_bebida);

    // Ejecutar la consulta
    if ($stmt->execute() === true) {
        header("Location: bebidas.php");
    }else{
        die("Error al ejecutar la consulta: " . $stmt->error);
    }
}

// Verificar si se proporcionó el ID de la bebida en la URL para la eliminación
if (isset($_GET['delete'])) {
    // Obtener el ID de la bebida de la URL
    $id_bebida = $_GET['id_bebida'];

    // Preparar la consulta SQL
    $sql = "DELETE FROM `bebida` WHERE `id_bebida`=?";

    // Preparar la sentencia
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    // Vincular el parámetro
    $stmt->bind_param("i", $id_bebida);

    // Ejecutar la consulta
    if ($stmt->execute() === true) {
        header("Location: bebidas.php");
    }else{
        die("Error al ejecutar la consulta: " . $stmt->error);
    }
}
?>
