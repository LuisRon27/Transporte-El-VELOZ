<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "transporte";

// Crear una conexión
$conexion = new mysqli($host, $user, $password, $dbName);

// Verificar la conexión
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

?>
