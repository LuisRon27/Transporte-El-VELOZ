<?php
// Incluye el archivo de configuración de la base de datos
require("../../../Config/Conexion.php");

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los valores del formulario
    $IDServicio = $_POST['IDServicio'];
    $TipoServicio = $_POST['TipoServicio'];
    $Descripcion = $_POST['Descripcion'];
    $Costo = $_POST['Costo'];

    // Query SQL para actualizar
    $sql = "UPDATE servicio SET
            TipoServicio = '$TipoServicio',
            Descripcion = '$Descripcion',
            Costo = $Costo
            WHERE IDServicio = $IDServicio";

    // Ejecuta la consulta y verifica si se actualizó correctamente
    if ($conexion->query($sql) === TRUE) {
        header("location:../Servicio.php");
    } else {
        echo "Error al actualizar el Servicio: " . $conexion->error;
    }

    // Cierra la conexión a la base de datos
    $conexion->close();
} else {
    echo "No se envió el formulario.";
}
?>
