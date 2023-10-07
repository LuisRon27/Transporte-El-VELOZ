<?php
require("../../../Config/Conexion.php");

if (isset($_GET['IDProveedor'])) {
    $proveedorId = $_GET['IDProveedor'];

    // Realiza la eliminación 
    $sql = "DELETE FROM proveedor WHERE IDProveedor = $proveedorId";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        header("Location: ../proveedor.php");
    } else {
        echo "Error al eliminar el proveedor: " . mysqli_error($conexion);
    }
} else {
    echo "IDProveedor no proporcionado.";
}
?>