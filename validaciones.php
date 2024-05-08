<?php

include("modules/Conexion.php");
if (isset($_POST['insertar_plat'])) {
    $nombre = $_POST['nombre'];
    $clasificacion = $_POST['clasificacion'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];
    $sql = "INSERT INTO platillo (id_platillo, nombre, precio, tipo, clasificacion) VALUES (NULL, '$nombre', '$precio', '$tipo', '$clasificacion')";

    if ($conn->query($sql) === TRUE) {
        header("location: control-platillos.php");
    } else {
        echo "Error al insertar platillo: " . $conn->error;
    }
    $

    // Cerrar la conexión
    $conn->close();
}

if (isset($_POST['update'])) {
    // Datos a actualizar
    $id_platillo = $_POST['id_platillo'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo'];
    $clasificacion = $_POST['clasificacion'];

    // Sentencia SQL preparada
    $sql = "UPDATE platillo SET nombre=?, precio=?, tipo=?, clasificacion=? WHERE id_platillo=?";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    // Verificar si la preparación fue exitosa
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param("ssssi", $nombre, $precio, $tipo, $clasificacion, $id_platillo);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        header("location: control-platillos.php");
    } else {
        echo "Error al actualizar: " . $conn->error;
    }

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conn->close();
}


if (isset($_POST['eliminar'])) {
    // Obtener el ID del platillo a eliminar
    $id_platillo = $_POST['id_delete'];

    // Preparar la consulta SQL con un marcador de posición
    $sql = "DELETE FROM platillo WHERE id_platillo = ?";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    // Verificar si la preparación fue exitosa
    if ($stmt === false) {
        echo "Error al preparar la consulta: " . $conn->error;
    } else {
        // Vincular el parámetro ID del platillo
        $stmt->bind_param("i", $id_platillo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redireccionar después de eliminar el platillo
            header("location: control-platillos.php");
            exit(); // Terminar la ejecución del script después de redirigir
        } else {
            echo "Error al eliminar el platillo: " . $conn->error;
        }
        
        // Cerrar la consulta
        $stmt->close();
    }

    // Cerrar la conexión
    $conn->close();
}