<?php
// session_start(); 
// Parámetros de conexión a la base de datos
$host = "localhost";
$usuario = "root";
$contraseña = "";
$base_datos = "Restaurante";

// Establecer la conexión a la base de datos
$conn = new mysqli($host, $usuario, $contraseña, $base_datos);

// Verificar si la conexión fue exitosa
if ($conn->connect_errno) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
} else {
}

//  
?>
