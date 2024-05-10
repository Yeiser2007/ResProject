<?php 
    include("../modules/Conexion.php");
    if(isset($_POST['login'])){
     $user = $_POST['user'];
     $pass = $_POST['passw'];
     echo $user;
     echo $pass; 
     $consulta = "SELECT `id_usuario`, `user`, `password` FROM `root` WHERE `user`='$user'";
     $resultado = $conn->query($consulta);
     if ($resultado) {
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $id_usuario = $fila["id_usuario"];
                $user = $fila["user"];
                $password = $fila["password"];
                header("location: Index.php");
            }
        } else {
            header("location: login.php");
        }
    } else {
        echo "Error al ejecutar la consulta: " . $conn->error;
    }
    
    // Cerrar la conexión
    $con->close();
    }



