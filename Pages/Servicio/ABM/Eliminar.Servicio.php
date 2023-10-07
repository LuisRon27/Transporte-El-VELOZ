<?php
require("../../../Config/Conexion.php");

if (isset($_GET['IDServicio'])) {
    $servicioId = $_GET['IDServicio'];

    // Realiza la eliminación 
    $sql = "DELETE FROM servicio WHERE IDServicio = $servicioId";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        header("Location: ../Servicio.php");
    } else {
        echo "Error al eliminar el servicio: " . mysqli_error($conexion);
    }
} else {
    echo "IDServicio no proporcionado.";
}
?>