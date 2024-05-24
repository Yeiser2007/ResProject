<?php
include("../modules/Conexion.php");

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['passw'];

    // Usar una sentencia preparada para prevenir inyecciones SQL
    $consulta = $conn->prepare("SELECT `id_usuario`, `user`, `password` FROM `root` WHERE `user`=?");
    $consulta->bind_param("s", $user);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado) {
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $id_usuario = $fila["id_usuario"];
            $hashed_password = $fila["password"];
            
            // Verificar la contraseña
            if ($pass === $hashed_password) {
                // Redirigir si la contraseña es correcta
                header("Location: Index.php");
            } else {
                // Redirigir si la contraseña es incorrecta
                header("Location: ../login.php");
            }
        } else {
            // Redirigir si el usuario no existe
            header("Location: ../login.php");
        }
    } else {
        echo "Error al ejecutar la consulta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
