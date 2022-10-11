<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    //Obtención de la sesión y verificación de autenticación
    session_start();

    if (empty($_SESSION)) {
        header("Location: login.php");
    }

    $ID_Cliente = $_SESSION['cliente']['ID_cliente'];

    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos - Promoción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>

<?php
//Conexión con la Base de datos
$database = new mysqli("localhost", "root", "", "tp_promocion_programacion");

if ($database === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
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



    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-4">
                    <h1 class="display-4 mt-4 text-center" style="font-size: 42px;">Consultar Pedido realizado</h1>

                    <form action="" method="POST">
                        <div class="d-flex justify-content-center">
                            <div class="input-group mb-3 mt-4 w-25">
                                <span class="input-group-text">Fecha Entrega</span>
                                <input type="date" class="form-control text-center" name="consultarFechaPedido" id="consultarFechaPedido">
                                <input type="text" name="inputIDCliente" id="inputIDCliente" hidden value=<?php echo $ID_Cliente ?>>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <div class="mb-4 mt-2 mx-4">
                                <input name="btnConsulta" id="btnConsulta" class="btn btn-primary" onclick="consultarFecha()" value="Consultar Fecha">

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="mt-4  justify-content-center" id="tablaMostrarResultados">
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">ID Pedido</th>
                    <th scope="col">Fecha Entrega Pedido</th>
                    <th scope="col">ID Cliente</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="table-body" class="text-center">
            </tbody>
        </table>
    </div>


</body>

</html>


<script>
    function consultarFecha() {

        var consultaFechaPedido = document.getElementById('consultarFechaPedido').value;
        var IDCliente = document.getElementById('inputIDCliente').value;


        if (consultaFechaPedido != '') {
            document.getElementById('btnConsulta').disabled = true;
            console.log(consultaFechaPedido);

            $.ajax({
                url: 'consultarPedidoBackend.php',
                method: 'post',
                data: {
                    consultaFechaPedido: JSON.stringify(consultaFechaPedido),
                    IDCliente: JSON.stringify(IDCliente)
                },
                success: function(res) {
                    var arrayRespuestaPedido = JSON.parse(res);
                    mostrarResultadoConsulta(arrayRespuestaPedido);

                }
            })
        } else {
            alert('Ingresar una fecha valida');
        }
    }





    function mostrarResultadoConsulta(arrayResultadoBackend) {
        console.log(arrayResultadoBackend);

        if (arrayResultadoBackend.length === 0) {
            document.getElementById('tablaMostrarResultados').innerHTML = ('<h1 class="display-4 mt-4 text-center" style="font-size: 24px;">No se encontraron datos relacionados, intente nuevamente con otra fecha</h1>' +
                "<br>" + "<div class='text-center'>" + '<a href="consultarPedido.php"> <input name="btnVueltaConsulta" id="btnVueltaConsulta" class="btn btn-outline-dark" value="Volver a consultar"></a>' + "</div>")
        } else {
            arrayResultadoBackend.map((resultadoArray) => {

                var IDPedido = resultadoArray[0];
                var fechaPedidoFormateada = resultadoArray[1].substring(0, 10);
                var IDCliente = resultadoArray[2]


                document.getElementById('table-body').innerHTML += (`<tr><td> ${IDPedido} </td> <td class='text-center'>
                            ${fechaPedidoFormateada} </td> <td class='text-center'>  ${IDCliente} 
                            </td> <td> 
                            <a href='pedidoSeleccionado.php?IDPedido=${IDPedido}&FechaPedido=${fechaPedidoFormateada}&IDCliente=${IDCliente}' id='PedidoRedireccionamiento' 
                            style="color: black;">
                            <i class='fas fa-glasses' style='font-size:24px'></i></a></td></tr>`);
            })
        }

    }
</script>