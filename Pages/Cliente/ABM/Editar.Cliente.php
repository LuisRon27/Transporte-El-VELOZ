<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-3">
        <h1 class="text-center">Editar Cliente</h1>
    </div>

    <div class="container mt-3">
        <form action="Actualizar.Cliente.php" method="post">
            <?php
            include_once('../../../Config/Conexion.php');

            if (isset($_REQUEST['IDCliente'])) {
                $clienteId = $_REQUEST['IDCliente'];

                $sql = "SELECT * FROM cliente WHERE IDCliente = $clienteId";
                $resultado = $conexion->query($sql);

                if ($resultado) {
                    $row = $resultado->fetch_assoc();
                } else {
                    echo "Error en la consulta SQL: " . $conexion->error;
                }
            } else {
                echo "No se proporcionó el ID del cliente.";
            }
            ?>

            <input type="hidden" class="form-control" id="IDCliente" name="IDCliente" required maxlength="255"
                value="<?php echo $row['IDCliente']; ?>">

            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="Nombre" name="Nombre" required maxlength="255"
                    value="<?php echo $row['Nombre']; ?>">
            </div>

            <div class="mb-3">
                <label for="Direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="Direccion" name="Direccion" required maxlength="255"
                    value="<?php echo $row['Direccion']; ?>">
            </div>

            <label for="Localidad" class="form-label">Localidad</label>
            <select class="form-select mb-3" name="IDLocalidad">
                <option selected disabled>--Seleccionar Localidad--</option>

                <?php
                include("../../../Config/Conexion.php");

                // Obtén todas las localidades
                $sql = "SELECT * FROM localidad";
                $resultado = $conexion->query($sql);

                if ($resultado) {
                    while ($fila = $resultado->fetch_assoc()) {
                        $selected = ($fila['IDLocalidad'] == $row['IDLocalidad']) ? "selected" : "";
                        echo "<option value='" . $fila['IDLocalidad'] . "' $selected>" . $fila['Nombre'] . "</option>";
                    }
                } else {
                    echo "Error en la consulta SQL: " . $conexion->error;
                }
                ?>

            </select>

            <div class="mb-3">
                <label for="TipoIVA" class="form-label">Tipo de IVA</label>
                <input type="text" class="form-control" id="TipoIVA" name="TipoIVA" required maxlength="50"
                    value="<?php echo $row['TipoIVA']; ?>">
            </div>

            <div class="mb-3">
                <label for="DNI" class="form-label">DNI</label>
                <input type="text" class="form-control" id="DNI" name="DNI" required maxlength="20"
                    value="<?php echo $row['DNI']; ?>">
            </div>

            <div class="mb-3">
                <label for="CUIT" class="form-label">CUIT</label>
                <input type="text" class="form-control" id="CUIT" name="CUIT" required maxlength="20"
                    value="<?php echo $row['CUIT']; ?>">
            </div>

            <div class="mb-3">
                <label for="Telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="Telefono" name="Telefono" required maxlength="20"
                    value="<?php echo $row['Telefono']; ?>">
            </div>

            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="Email" required maxlength="255"
                    value="<?php echo $row['Email']; ?>">
            </div>

            <div class="mb-3">
                <label for="Observaciones" class="form-label">Observaciones</label>
                <textarea class="form-control" id="Observaciones" name="Observaciones"
                    rows="3"><?php echo $row['Observaciones']; ?></textarea>
            </div>

            <div class="text-center mb-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="../Cliente.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>