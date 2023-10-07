<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Servicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center">Agregar Servicio</h1>
    </div>

    <div class="container mt-3">
        <form action="Insertar.Servicio.php" method="post">
            <div class="mb-3">
                <label for="TipoServicio" class="form-label">Tipo Servicio</label>
                <input type="text" class="form-control" id="TipoServicio" name="TipoServicio" required maxlength="255">
            </div>

            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="Descripcion" name="Descripcion" required maxlength="255">
            </div>

            <div class="mb-3">
                <label for="Costo" class="form-label">Costo</label>
                <input type="number" class="form-control" id="Costo" name="Costo" required maxlength="20">
            </div>

            <div class="text-center mb-3">
                <button type="submit" class="btn btn-primary">Agregar</button>
                <a href="../Servicio.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>