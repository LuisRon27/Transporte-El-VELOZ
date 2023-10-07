<?php
require("../../../Config/Conexion.php");

$Nombre = $_POST['Nombre'];
$Direccion = $_POST['Direccion'];
$IDLocalidad = $_POST['IDLocalidad']; // Cambiado el nombre del campo
$TipoIVA = $_POST['TipoIVA'];
$DNI = $_POST['DNI'];
$CUIT = $_POST['CUIT'];
$Telefono = $_POST['Telefono'];
$Email = $_POST['Email'];
$Observaciones = $_POST['Observaciones'];

$sql = "INSERT INTO cliente (Nombre, Direccion, IDLocalidad, TipoIVA, DNI, CUIT, Telefono, Email, Observaciones) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssissssss", $Nombre, $Direccion, $IDLocalidad, $TipoIVA, $DNI, $CUIT, $Telefono, $Email, $Observaciones);

    if ($stmt->execute()) {
        header("Location: ../Cliente.php");
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
