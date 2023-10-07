<?php
require("../../../Config/Conexion.php");

$TipoServicio = $_POST['TipoServicio'];
$Descripcion = $_POST['Descripcion'];
$Costo = $_POST['Costo'];

$sql = "INSERT INTO servicio (TipoServicio, Descripcion, Costo) 
        VALUES (?, ?, ?)";

$stmt = $conexion->prepare($sql);

if ($stmt) {
    
    $stmt->bind_param("ssd", $TipoServicio, $Descripcion, $Costo);

    if ($stmt->execute()) {
        header("Location: ../Servicio.php");
        exit;
    } else {
        echo "Error al guardar los datos en la base de datos.";
    }

    $stmt->close();
} else {
    echo "Error al preparar la consulta.";
}

$conexion->close();
?>
