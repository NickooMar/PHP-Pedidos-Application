<!DOCTYPE html>
<html lang="en">

<?php

//Obtención de la sesión y verificación de autenticación
session_start();

if (empty($_SESSION)) {
    header("Location: login.php");
}

//Conexión con la Base de datos
$database = new mysqli("localhost", "root", "", "tp_promocion_programacion");

if ($database === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

/* Tomo los datos que vienen por medio de un GET que corresponden a ese pedido*/
$IDClienteSesion = $_SESSION['cliente']['ID_cliente'];

$IDPedido = $_GET['IDPedido'];
$FechaPedido = $_GET['FechaPedido'];
$IDClientePedido = $_GET['IDCliente'];


$querySolicitarPedidoSeleccionado = "SELECT * FROM pedidos, productos, productos_pedidos WHERE (pedidos.ID_Pedido = ${IDPedido} AND pedidos.Fecha_Pedido = '${FechaPedido}' AND pedidos.ID_cliente = ${IDClientePedido} AND pedidos.ID_Pedido = productos_pedidos.ID_Pedido AND productos_pedidos.ID_Producto = productos.ID_Producto)";

$resultadoQuerySolicitarPedidoSeleccionado = $database->query($querySolicitarPedidoSeleccionado);


/* En caso que quiera modificar los datos obtenido por GET para acceder a otros campos entonces, cierro su sesión y lo mando al LOGIN */
if (!$resultadoQuerySolicitarPedidoSeleccionado) {
    session_destroy();
    header("Location: login.php");
    exit;
}

if (mysqli_num_rows($resultadoQuerySolicitarPedidoSeleccionado) == 0) {
    session_destroy();
    header("Location: login.php");
    exit;
}


$queryDatosClientePedido = "SELECT * FROM clientes, pedidos WHERE (clientes.ID_cliente = ${IDClientePedido} AND pedidos.ID_Pedido = ${IDPedido} AND pedidos.ID_cliente = clientes.ID_cliente)";
$resultadoQueryDatosCliente = $database->query($queryDatosClientePedido);

?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39' rel='stylesheet'>


    <title>Pedido - Seleccionado</title>
</head>

<?php

/* En caso que quiera modificar los datos obtenido por GET para acceder a otros campos entonces, cierro su sesión y lo mando al LOGIN */

if ($IDClientePedido != $IDClienteSesion) {
    session_destroy();
    header("Location: login.php");
}


?>

<body>
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





    <div class="d-flex justify-content-center m-4">
        <h1 class="display-4" style="font-size: 32px;">Datos del Pedido seleccionado</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h1 class="display-4 text-center m-4" style="font-size: 36px;">Datos Del Cliente:</h1>
                    <div class="d-inline-flex justify-content-between mx-4">
                        <?php
                        $datosCliente = mysqli_fetch_array($resultadoQueryDatosCliente);
                        ?>
                        <h1 class="display-4" style="font-size: 24px;"><span style="font-weight: 500;">Cliente: </span><?php echo $datosCliente['ID_cliente']; ?></h1>
                        <h1 class="display-4" style="font-size: 24px;"><span style="font-weight: 500;">Nombre Completo: </span><?php echo $datosCliente['Nombre_completo']; ?></h1>
                        <h1 class="display-4" style="font-size: 24px;"><span style="font-weight: 500;">DNI: </span><?php echo $datosCliente['DNI_cliente']; ?></h1>
                    </div>
                    <h1 class="display-4 text-center m-4" style="font-size: 36px;">Datos Del Pedido:</h1>
                    <div class="d-flex justify-content-around m-4">
                        <h1 class="display-4" style="font-size: 24px;"><span style="font-weight: 500;">ID Pedido: </span><?php echo $IDPedido; ?></h1>
                        <h1 class="display-4" style="font-size: 24px;"><span style="font-weight: 500;">Fecha de Entrega: </span><?php echo $FechaPedido; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="mt-4  justify-content-center">
        <div class="">

            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">ID Producto</th>
                        <th scope="col">Nombre Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Precio Total</th>
                    </tr>
                </thead>
                <tbody id="table-body" class="text-center">
                </tbody>
            </table>
        </div>
    </div>

    <?php
    $sumaTotalPrecioPedido = 0
    ?>

    <script>
        document.getElementById('table-body').innerHTML = "<?php while ($mostrarQueryPedido = mysqli_fetch_assoc($resultadoQuerySolicitarPedidoSeleccionado)) {
                                                                $sumaTotalPrecioPedido += ($mostrarQueryPedido['Precio_Producto'] * $mostrarQueryPedido['Cantidad']);
                                                                echo "<tr>";
                                                                echo "<td>" . $mostrarQueryPedido['ID_Producto'] . "</td>";
                                                                echo "<td>" . $mostrarQueryPedido['Nombre_Producto'] . "</td>";
                                                                echo "<td>" . $mostrarQueryPedido['Cantidad'] . "</td>";
                                                                echo "<td>" . $mostrarQueryPedido['Precio_Producto'] . "</td>";
                                                                echo "<td class='bg-primary text-white'>" . $mostrarQueryPedido['Precio_Producto'] * $mostrarQueryPedido['Cantidad'] . "</td>";
                                                                echo "</tr>";
                                                            }

                                                            echo "<br><br><tr class='bg-primary'><td colspan='5'>" . "<h1 class='display-4 text-white' style='font-size: 20px; font-weight: 600'> Importe a Pagar: $ " . $sumaTotalPrecioPedido . "</h1></td></tr>";

                                                            ?>"
    </script>



    <div class="text-center">
        <h1 class="barcode text-center mt-4"><?php echo $IDPedido . $IDClientePedido . $datosCliente['DNI_cliente'] ?></h1>
        <img src="https://chart.googleapis.com/chart?chs=152x152&cht=qr&chl=http%3A%2F%2Fwww.google.com%2F&choe=UTF-8" title="Link to Google.com" />
    </div>


    <div class="text-center">
        <a href="javascript:window.print()">
            <input name="btnImprimirFactura" id="btnImprimirFactura" class="btn btn-success" value="Imprimir Factura">
        </a>
    </div>
    <div class="text-center mt-4">
        <a href="consultarPedido.php">
            <input name="btnVueltaConsulta" id="btnVueltaConsulta" class="btn btn-dark " value="Volver a consultar">
        </a>
    </div>


</body>


</html>


<style>
    .barcode {
        font-family: 'Libre Barcode 39';
        font-size: 40px;
    }
</style>