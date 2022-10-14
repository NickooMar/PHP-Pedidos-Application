<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    //Obtención de la sesión y verificación de autenticación
    session_start();

    if (empty($_SESSION)) {
        header("Location: login.php");
    }
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <title>Pedidos - Promoción</title>
</head>


<?php
//Conexión con la Base de datos
$database = new mysqli("localhost", "root", "", "tp_promocion_programacion");


if ($database === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

<body class="bg-light">


    <!-- Navbar - Header -->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid ">
            <img src="./Assets/LogoEmpresa.png" alt="Logo empresa" class="mx-2" style="width: 50px; height: 50px ;border-radius: 30px;">
            <a class="navbar-brand text-white" href="paginaPrincipal.php">
                <h1 class="display-4" style="font-size: 32px;">Empresa</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end mx-5" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pedidos
                        </a>
                        <ul class="dropdown-menu" style="margin-top: 14px;">
                            <li><a class="dropdown-item" href="realizarPedido.php">Realizar Pedido</a></li>
                            <li><a class="dropdown-item" href="consultarPedido.php">Consultar Pedidos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu" style="margin-top: 14px;">
                            <li><a class="dropdown-item" href="listadoProductos.php">Listado de Productos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="contacto.php">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light " href="cerrarSesion.php" style="color: #202020;">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Contenido -->
    <div class="d-flex justify-content-center p-4 bg-light">
        <h1 class="display-4" style="font-size: 32px;">Listado de Productos</h1>
    </div>
    <h1 class="display-4 text-center " style="font-size: 18px;">(Orden Alfabético)</h1>



    <div class="bg-light">
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">
                        <h1 class="display-4" style="font-size: 24px;">Código </h1>
                    </th>
                    <th scope="col">
                        <h1 class="display-4" style="font-size: 24px;">Nombre </h1>
                    </th>
                    <th scope="col">
                        <h1 class="display-4" style="font-size: 24px;">Precio (AR$) </h1>
                    </th>
                    <th scope="col">
                        <h1 class="display-4" style="font-size: 24px;">Stock</h1>
                    </th>
                </tr>
            </thead>

            <tbody class="text-center">

                <?php
                $consultaProductos = $database->query("SELECT * FROM productos ORDER BY Nombre_Producto ASC");

                while ($resultado = mysqli_fetch_assoc($consultaProductos)) {
                    if ($resultado['stock'] == 0) {
                        echo '<tr class="table-danger">';
                        echo "<th scope='row'>" . $resultado['ID_Producto'] . "</th>";
                        echo "<td scope='row'>" . $resultado['Nombre_Producto'] . "</td>";
                        echo "<td scope='row'>" . "$" . $resultado['Precio_Producto'] . "</td>";
                        echo "<td scope='row'>" . $resultado['stock'] . "</td>";
                        echo "</tr>";
                    } else {
                        echo "<tr>";
                        echo "<th scope='row'>" . $resultado['ID_Producto'] . "</th>";
                        echo "<td scope='row'>" . $resultado['Nombre_Producto'] . "</td>";
                        echo "<td scope='row'>" . "$" . $resultado['Precio_Producto'] . "</td>";
                        echo "<td scope='row' >" . $resultado['stock'] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>








</body>

</html>