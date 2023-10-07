<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center">Agregar Cliente</h1>
    </div>

    <div class="container mt-3">
        <form action="Insertar.Cliente.php" method="post">
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="Nombre" name="Nombre" required maxlength="255">
            </div>

            <div class="mb-3">
                <label for="Direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="Direccion" name="Direccion" required maxlength="255">
            </div>

            <label for="Localidad" class="form-label">Localidad</label>
            <label for="Localidad" class="form-label">Localidad</label>
            <select class="form-select mb-3" name="IDLocalidad"> <!-- Cambiado a IDLocalidad -->
                <option selected disabled>--Seleccionar Localidad--</option>

                <?php
                include("../../../Config/Conexion.php");

                $sql = $conexion->query("SELECT * FROM localidad");

                while ($resultado = $sql->fetch_assoc()) {
                    echo "<option value='" . $resultado['IDLocalidad'] . "'>" . $resultado['Nombre'] . "</option>";
                }
                ?>
            </select>

            <div class="mb-3">
                <label for="TipoIVA" class="form-label">Tipo de IVA</label>
                <input type="text" class="form-control" id="TipoIVA" name="TipoIVA" required maxlength="50">
            </div>

            <div class="mb-3">
                <label for="DNI" class="form-label">DNI</label>
                <input type="text" class="form-control" id="DNI" name="DNI" required maxlength="20">
            </div>

            <div class="mb-3">
                <label for="CUIT" class="form-label">CUIT</label>
                <input type="text" class="form-control" id="CUIT" name="CUIT" required maxlength="20">
            </div>

            <div class="mb-3">
                <label for="Telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="Telefono" name="Telefono" required maxlength="20">
            </div>

            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="Email" required maxlength="255">
            </div>

            <div class="mb-3">
                <label for="Observaciones" class="form-label">Observaciones</label>
                <textarea class="form-control" id="Observaciones" name="Observaciones" rows="3"></textarea>
            </div>

            <div class="text-center mb-3">
                <button type="submit" class="btn btn-primary">Agregar</button>
                <a href="../Cliente.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>