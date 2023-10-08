<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transporte El VELOZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <!--navbar-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
        <div class="container-fluid">
            <!--Logo-->
            <a class="navbar-brand mb-2 mt-2" href="#">"EL VELOZ"</a>
            <!-- Botón de hamburguesa -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Barra de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto text-center w-100 justify-content-center">
                    <li class="nav-item" style="margin: 0px 10px;">
                        <a class="nav-link active" aria-current="page" href="../../Index.php">Home</a>
                    </li>
                    <li class="nav-item" style="margin: 0px 10px;">
                        <a class="nav-link" href="../Cliente/Cliente.php">Clientes</a>
                    </li>
                    <li class="nav-item" style="margin: 0px 10px;">
                        <a class="nav-link" href="../Proveedor/Proveedor.php">Proveedores</a>
                    </li>
                    <li class="nav-item" style="margin: 0px 10px;">
                        <a class="nav-link" href="Servicio.php">Servicios</a>
                    </li>
                    <li class="nav-item" style="margin: 0px 10px;">
                        <a class="nav-link" href="../Ventas/Venta.php">Ventas</a>
                    </li>
                </ul>

                <!-- Dropdown (esquina superior derecha) -->
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://openclipart.org/image/800px/250353" alt="mdo" width="32" height="32"
                            class="rounded-circle">
                    </a>

                </div>
            </div>
        </div>
    </nav>

    <!--Title-->
    <div class="container mt-3">
        <h1 class="text-center">Lista de Servicios</h1>
    </div>

    <!--Table-->
    <div class="container mb-2">
        <div class="container mb-3">
            <a href="ABM/Agregar.Servicio.php" class="btn btn-primary">Agregar</a>
            <a href="../../Index.php" class="btn btn-secondary">Volver</a>
        </div>
        <!-- Campo de búsqueda -->
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Buscar Servicio">
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark text-center table-header">
                    <tr>
                        <th scope="col">IDServicio</th>
                        <th scope="col">TipoServicio</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("../../Config/Conexion.php");

                    $sql = $conexion->query("SELECT IDServicio, TipoServicio, Descripcion, Costo
                    FROM servicio");

                    while ($resultado = $sql->fetch_assoc()) {
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $resultado['IDServicio'] ?>
                            </th>
                            <td scope="row">
                                <?php echo $resultado['TipoServicio'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['Descripcion'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $resultado['Costo'] ?>
                            </td>
                            <td scope="row" class="d-flex justify-content-center"
                                style="gap: 1rem; padding: 1.5rem 0.5rem;">
                                <a href="ABM/Editar.Servicio.php?IDServicio=<?php echo $resultado['IDServicio']; ?>"
                                    class="btn btn-warning me-2">Editar</a>
                                <a href="ABM/Eliminar.Servicio.php?IDServicio=<?php echo $resultado['IDServicio']; ?>"
                                onclick="return confirm('¿Seguro que desea eliminar este Servicio?');" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <div id="noRecordsMessage" class="alert alert-warning text-center" style="display: none;">No hay registros</div>
        </div>
    </div>

    <!-- footer -->
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-body-secondary">© 2023 Luis Ron</p>

            <a href="/"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                "El VELOZ"
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="../../Index.php" class="nav-link px-2 text-body-secondary">HOME</a></li>
                <li class="nav-item"><a href="../Cliente/Cliente.php"
                        class="nav-link px-2 text-body-secondary">CLIENTES</a></li>
                <li class="nav-item"><a href="../Proveedor/Proveedor.php"
                        class="nav-link px-2 text-body-secondary">PROVEEDORES</a></li>
                <li class="nav-item"><a href="Servicio.php" class="nav-link px-2 text-body-secondary">SERVICIOS</a></li>
            </ul>
        </footer>
    </div>

    <script src="../../Script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>