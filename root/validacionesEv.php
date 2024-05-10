<?php

include("../modules/Conexion.php");

if (isset($_GET['update'])) {
    $idEvento = $_GET['idEvento'];
    $nombreEvento = $_GET['nombreEvento'];
    $fechaFinEvento = $_GET['fechaFin'];

    // Preparar la consulta SQL
    $sql = "UPDATE `evento` SET `nombre`='$nombreEvento',`fecha_fin`='$fechaFinEvento' WHERE `id_evento`='$idEvento'";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        header("location: eventos.php");
  
    } else {
        // Si hay un error en la consulta, mostrar el mensaje de error
        echo "Error al actualizar el evento: " . $conn->error;
    }
}
?>

<?php
// Incluir el archivo de conexión a la base de datos
include("../modules/Conexion.php");

// Verificar si se enviaron los datos del formulario
if (isset($_GET['agregar'])) {
    // Obtener los valores del formulario
    $nombreEvento = $_GET['nombreEvento'];
    $fechaEvento = $_GET['fechaEvento'];

    // Validar los valores recibidos (puedes agregar más validaciones según tus necesidades)
    if (!empty($nombreEvento) && !empty($fechaEvento)) {
        // Preparar la consulta SQL
        $sql = "INSERT INTO evento (nombre, fecha_fin) VALUES (?, ?)";
        
        // Preparar la sentencia SQL
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros
        $stmt->bind_param("ss", $nombreEvento, $fechaEvento);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            header("location: eventos.php");
        } else {
            echo "Error al insertar el evento: " . $conn->error;
        }

        // Cerrar la conexión y la sentencia
        $stmt->close();
        $conn->close();
    } else {
        echo "Los campos no pueden estar vacíos.";
    }
}
?>
<?php
include("../modules/Conexion.php");
// Verificar si se proporcionó el ID del evento en la URL
if (isset($_GET['delete'])) {
    $id_evento = $_GET['nombreEvento'];
    echo "$id_evento";
    include("modules/Conexion.php");
    $sql = "DELETE FROM evento WHERE nombre = ?";
    
    // Preparar la sentencia
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_evento);
    if ($stmt->execute()) {
        // Redireccionar a la página principal u otra página después de eliminar el evento
        header("Location: eventos.php");
        exit(); // Finalizar el script después de redireccionar
    } else {
        // Manejar el error si la consulta no se ejecuta correctamente
        echo "Error al eliminar el evento: " . $conn->error;
    }
    
    // Cerrar la conexión y la sentencia preparada
    $stmt->close();
    $conn->close();
} else {
    // Manejar el caso cuando no se proporciona un ID de evento válido en la URL
    echo "ID de evento no proporcionado en la URL.";
}
?>
