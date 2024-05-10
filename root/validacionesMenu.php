<?php

include("../modules/Conexion.php");

if (isset($_POST['insertar'])) {
    $tipo = $_POST['tipoEntrada'];
    $nombre = $_POST['nombreEntrada'];

    if ($tipo == 'Primeras') {
        $sql = "INSERT INTO `p_entradas`(`id_entrada`, `nombre`) VALUES (NULL,'$nombre')";

        if ($conn->query($sql) === TRUE) {
            header("location: control-menu.php");
        } else {
            echo "Error al insertar platillo: " . $conn->error;
        }
    }

    if ($tipo == 'Segundas') {

        $sql = "INSERT INTO `s_entradas`(`id_entrada`, `nombre`) VALUES (NULL,'$nombre')";

        if ($conn->query($sql) === TRUE) {
            header("location: control-menu.php");
        } else {
            echo "Error al insertar platillo: " . $conn->error;
        }
    }

    if ($tipo == 'Fuertes') {
        $sql = "INSERT INTO `fuerte`(`id_entrada`, `nombre`) VALUES (NULL,'$nombre')";

        if ($conn->query($sql) === TRUE) {
            header("location: control-menu.php");
        } else {
            echo "Error al insertar platillo: " . $conn->error;
        }
    }


    // Cerrar la conexión
    $conn->close();
}

if (isset($_POST['update'])) {
    $id_platillo = $_POST['filaId'];
    $tipo = $_POST['tipoEditar'];
    $nombre = $_POST['nuevaOpcion'];

    if ($tipo == 'Primeras') {

        // Sentencia SQL preparada
        $sql = "UPDATE p_entradas SET nombre=? WHERE id_entrada=?";

        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        // Verificar si la preparación fue exitosa
        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param("si", $nombre, $id_platillo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            header("location: control-menu.php");
        } else {
            echo "Error al actualizar: " . $conn->error;
        }
    }

    if ($tipo == 'Segundas') {


        // Sentencia SQL preparada
        $sql = "UPDATE s_entradas SET nombre=? WHERE id_entrada=?";

        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        // Verificar si la preparación fue exitosa
        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param("si", $nombre, $id_platillo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            header("location: control-menu.php");
        } else {
            echo "Error al actualizar: " . $conn->error;
        }
    }

    if ($tipo == 'Fuertes') {

        // Sentencia SQL preparada
        $sql = "UPDATE fuerte SET nombre=? WHERE id_fuerte=?";

        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        // Verificar si la preparación fue exitosa
        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param("si", $nombre, $id_platillo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            header("location: control-menu.php");
        } else {
            echo "Error al actualizar: " . $conn->error;
        }
    }

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conn->close();
}


if (isset($_POST['eliminar'])) {
    $id_platillo = $_POST['filaId'];
    $tipo = $_POST['tipoEliminar'];

    if ($tipo == 'Primeras') {
        // Sentencia SQL preparada
        $sql = "DELETE FROM p_entradas WHERE id_entrada= ?";
        // Preparar la consulta
        $stmt = $conn->prepare($sql);
        // Verificar si la preparación fue exitosa
        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conn->error);
        }
        // Vincular parámetros
        $stmt->bind_param("i", $id_platillo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            header("location: control-menu.php");
        } else {
            echo "Error al actualizar: " . $conn->error;
        }
    }

    if ($tipo == 'Segundas') {


        // Sentencia SQL preparada
        $sql = "DELETE FROM s_entradas WHERE id_entrada = ?";

        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        // Verificar si la preparación fue exitosa
        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param("i", $id_platillo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            header("location: control-menu.php");
        } else {
            echo "Error al actualizar: " . $conn->error;
        }
    }

    if ($tipo == 'Fuertes') {

        // Sentencia SQL preparada
        $sql = "DELETE FROM fuerte WHERE id_fuerte = ?";

        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        // Verificar si la preparación fue exitosa
        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param("i", $id_platillo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            header("location: control-menu.php");
        } else {
            echo "Error al actualizar: " . $conn->error;
        }
    }

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conn->close();
}

if (isset($_GET['guardarMenu'])) {
    $entrada1 = $_GET['entrada11'];
    $entrada2 = $_GET['entrada12'];
    $entrada3 = $_GET['entrada21'];
    $entrada4 = $_GET['entrada22'];
    $fuerte1 = $_GET['fuerte1'];
    $fuerte2 = $_GET['fuerte2'];
    $date = $_GET['fecha'];
    $precio = $_GET['precio'];
    // Preparar la consulta SQL
    $sql = "INSERT INTO `menu` (`fecha`, `precio`, `entrada1`, `entrada12`, `entrada21`, `entrada22`, `fuerte1`, `fuerte2`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    // Vincular los parámetros
    $stmt->bind_param("ssssssss", $date, $precio, $entrada1, $entrada2, $entrada3, $entrada4, $fuerte1, $fuerte2);

    // Ejecutar la consulta
    if ($stmt->execute() === false) {
        die("Error al ejecutar la consulta: " . $stmt->error);
    }

    // Cerrar la sentencia
    $stmt->close();

    // Mensaje de éxito
    header("location: control-menu.php");
}