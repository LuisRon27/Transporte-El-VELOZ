<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transporte El VELOZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item" style="margin: 0px 10px;">
                        <a class="nav-link" href="Pages/Cliente/Cliente.php">Clientes</a>
                    </li>
                    <li class="nav-item" style="margin: 0px 10px;">
                        <a class="nav-link" href="Pages/Proveedor/Proveedor.php">Proveedores</a>
                    </li>
                    <li class="nav-item" style="margin: 0px 10px;">
                        <a class="nav-link" href="Pages/Servicio/Servicio.php">Servicios</a>
                    </li>
                    <li class="nav-item" style="margin: 0px 10px;">
                        <a class="nav-link" href="Pages/Ventas/Venta.php">Ventas</a>
                    </li>
                    <li class="nav-item" style="margin: 0px 10px;">
                        <a class="nav-link">Compras</a>
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

    <div class="container px-4 py-5" id="icon-grid">
        <h2 class="pb-2 border-bottom">Resumen - <?php echo date('d/m/Y'); ?></h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
            <div class="col d-flex align-items-start">
                    <i class="bi bi-people-fill text-body-secondary flex-shrink-0 me-3" style="font-size: 2rem;" ></i>
                <div>
                    <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Clientes</h3>

                    <?php
                        require("Config/Conexion.php");

                        $sql = $conexion->query("SELECT COUNT(*) AS CantidadClientes FROM Cliente;");

                        while ($resultado = $sql->fetch_assoc()) {
                    ?>
                        <p>Total: <?php echo $resultado['CantidadClientes'] ?></p>
                    <?php
                        }
                    ?>

                </div>
            </div>

            <div class="col d-flex align-items-start">
                    <i class="bi bi-tags text-body-secondary flex-shrink-0 me-3" style="font-size: 2rem;" ></i>
                <div>
                    <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Proveedores</h3>

                    <?php
                        require("Config/Conexion.php");

                        $sql = $conexion->query("SELECT COUNT(*) AS CantidadProveedor FROM proveedor;");

                        while ($resultado = $sql->fetch_assoc()) {
                    ?>
                        <p>Total: <?php echo $resultado['CantidadProveedor'] ?></p>
                    <?php
                        }
                    ?>

                </div>
            </div>

            <div class="col d-flex align-items-start">
                    <i class="bi bi-truck text-body-secondary flex-shrink-0 me-3" style="font-size: 2rem;" ></i>
                <div>
                    <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Servicios</h3>

                    <?php
                        require("Config/Conexion.php");

                        $sql = $conexion->query("SELECT COUNT(*) AS CantidadServicio FROM servicio;");

                        while ($resultado = $sql->fetch_assoc()) {
                    ?>
                        <p>Total: <?php echo $resultado['CantidadServicio'] ?></p>
                    <?php
                        }
                    ?>

                </div>
            </div>

            <div class="col d-flex align-items-start">
                    <i class="bi bi-cart text-body-secondary flex-shrink-0 me-3" style="font-size: 2rem;" ></i>
                <div>
                    <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Ventas</h3>

                    <?php
                        require("Config/Conexion.php");

                        $sql = $conexion->query("SELECT COUNT(*) AS VentasUltimoMes
                        FROM Venta
                        WHERE Fecha >= DATE_SUB(NOW(), INTERVAL 1 MONTH)");

                        while ($resultado = $sql->fetch_assoc()) {
                    ?>
                        <p>Cantidad x Mes: <?php echo $resultado['VentasUltimoMes'] ?></p>
                    <?php
                        }
                    ?>

                </div>
            </div>

            <div class="col d-flex align-items-start">
                    <i class="bi bi-currency-dollar text-body-secondary flex-shrink-0 me-3" style="font-size: 2rem;" ></i>
                <div>
                    <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Ingresos</h3>

                    <?php
                        require("Config/Conexion.php");

                        $sql = $conexion->query("SELECT SUM(S.Costo) AS TotalVentasUltimoMes
                        FROM Venta V
                        INNER JOIN Servicio S ON V.IDServicio = S.IDServicio
                        WHERE V.Fecha >= DATE_SUB(NOW(), INTERVAL 1 MONTH);
                        ");

                        while ($resultado = $sql->fetch_assoc()) {
                    ?>
                        <p>Total x Mes: <?php echo $resultado['TotalVentasUltimoMes'] ?></p>
                    <?php
                        }
                    ?>

                </div>
            </div>

            <div class="col d-flex align-items-start">
                    <i class="bi bi-geo-alt text-body-secondary flex-shrink-0 me-3" style="font-size: 2rem;" ></i>
                <div>
                    <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Localidades</h3>

                    <?php
                        require("Config/Conexion.php");

                        $sql = $conexion->query("SELECT COUNT(*) AS Totallocalidades FROM localidad;");

                        while ($resultado = $sql->fetch_assoc()) {
                    ?>
                        <p>Total: <?php echo $resultado['Totallocalidades'] ?></p>
                    <?php
                        }
                    ?>

                </div>
            </div>

            <div class="col d-flex align-items-start">
                    <i class="bi bi-cart text-body-secondary flex-shrink-0 me-3" style="font-size: 2rem;" ></i>
                <div>
                    <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Localidades</h3>

                    <?php
                        require("Config/Conexion.php");

                        $sql = $conexion->query("SELECT COUNT(*) AS TotalCompra FROM compra;");

                        while ($resultado = $sql->fetch_assoc()) {
                    ?>
                        <p>Total: <?php echo $resultado['TotalCompra'] ?></p>
                    <?php
                        }
                    ?>

                </div>
            </div>

            <div class="col d-flex align-items-start">
                    <i class="bi bi-person text-body-secondary flex-shrink-0 me-3" style="font-size: 2rem;" ></i>
                <div>
                    <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">C/C Cliente</h3>

                    <?php
                        require("Config/Conexion.php");

                        $sql = $conexion->query("SELECT COUNT(*) AS CuentasActivas FROM cuentacorrientecliente;");

                        while ($resultado = $sql->fetch_assoc()) {
                    ?>
                        <p>Cuentas Activas: <?php echo $resultado['CuentasActivas'] ?></p>
                    <?php
                        }
                    ?>

                </div>
            </div>

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
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">HOME</a></li>
                <li class="nav-item"><a href="Pages/Cliente/Cliente.php"
                        class="nav-link px-2 text-body-secondary">CLIENTES</a></li>
                <li class="nav-item"><a href="Pages/Proveedor/Proveedor.php"
                        class="nav-link px-2 text-body-secondary">PROVEEDORES</a></li>
                <li class="nav-item"><a href="Pages/Servicio/Servicio.php"
                        class="nav-link px-2 text-body-secondary">SERVICIOS</a></li>
            </ul>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>