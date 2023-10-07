<?php
// Incluye el archivo de configuración de la base de datos
require("../../../Config/Conexion.php");

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los valores del formulario
    $IDProveedor = $_POST['IDProveedor'];
    $Nombre = $_POST['Nombre'];
    $Direccion = $_POST['Direccion'];
    $IDLocalidad = $_POST['IDLocalidad'];
    $TipoIVA = $_POST['TipoIVA'];
    $DNI = $_POST['DNI'];
    $CUIT = $_POST['CUIT'];
    $Telefono = $_POST['Telefono'];
    $Email = $_POST['Email'];
    $Observaciones = $_POST['Observaciones'];

    // Query SQL para actualizar
    $sql = "UPDATE proveedor SET
            Nombre = '$Nombre',
            Direccion = '$Direccion',
            IDLocalidad = $IDLocalidad,
            TipoIVA = '$TipoIVA',
            DNI = '$DNI',
            CUIT = '$CUIT',
            Telefono = '$Telefono',
            Email = '$Email',
            Observaciones = '$Observaciones'
            WHERE IDProveedor = $IDProveedor";

    // Ejecuta la consulta y verifica si se actualizó correctamente
    if ($conexion->query($sql) === TRUE) {
        header("location:../Proveedor.php");
    } else {
        echo "Error al actualizar el proveedor: " . $conexion->error;
    }

    // Cierra la conexión a la base de datos
    $conexion->close();
} else {
    echo "No se envió el formulario.";
}
?>
