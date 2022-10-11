<!DOCTYPE html>
<html lang="en">

<head>

    <?php

    //Lógica de sesión
    session_start();

    if (empty($_SESSION)) {
        header("Location: login.php");
    }

    $ID_Cliente = $_SESSION['cliente']['ID_cliente'];
    //----------------------------------------


    //Lógica Base de datos
    $database = new mysqli("localhost", "root", "", "tp_promocion_programacion");

    if ($database === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $consultaClientes = $database->query("SELECT * FROM clientes WHERE ID_cliente = $ID_Cliente");
    $consultaProductos = $database->query("SELECT * FROM productos");


    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Pagina - Pedido</title>
</head>

<body class="bg-light">

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



    <div class="d-flex justify-content-center pt-4">
        <div>
            <h1 class="display-4" style="font-size: 32px;">Bienvenido a la pestaña de realización de pedidos</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-4">
                    <h1 class="display-4 mt-4 text-center" style="font-size: 42px;">PEDIDO</h1>
                    <div>
                        <form action="" method="POST">
                            <div class="d-flex justify-content-center mt-4">
                                <div class="input-group mb-3 w-25">
                                    <div class="input-group-append">
                                        <span class="input-group-text">DNI Cliente</span>
                                    </div>
                                    <select name="selectCliente" id="selectCliente" class="form-control text-center">
                                        <?php
                                        while ($clienteDNI = mysqli_fetch_assoc($consultaClientes)) {
                                            echo "<option value='{$clienteDNI['ID_cliente']}' name='{$clienteDNI['DNI_cliente']}' >{$clienteDNI['DNI_cliente']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mt-4">
                                <div class="input-group mb-3 w-25">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Entrega</span>
                                    </div>
                                    <input type="date" class="form-control text-center" name="fechaEntregaPedido" id="fechaEntregaPedido">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mt-4">
                                <div class="input-group mb-3 w-25">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Producto</span>
                                    </div>
                                    <select name="selectProducto" id="selectProducto" class="form-control text-center">
                                        <option value="null" disabled selected>Seleccionar</option>
                                        <?php
                                        while ($productoNombreCodigo = mysqli_fetch_assoc($consultaProductos)) {
                                            if ($productoNombreCodigo['stock'] > 0) {
                                                echo "<option value='{$productoNombreCodigo['Nombre_Producto']}' name='{$productoNombreCodigo['Nombre_Producto']}' >{$productoNombreCodigo['Nombre_Producto']}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-4 mb-4">
                                <div class="input-group mb-3 w-25">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Cantidad</span>
                                    </div>
                                    <input type="text" class="form-control text-center" name="cantidadPorProducto" id="cantidadPorProducto" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="mb-4 mt-2 mx-4">
                            <input name="ingresarPedidoBtn" id="ingresarPedidoBtn" class="btn btn-dark " onclick="ingresarPedido()" value="Ingresar Producto">
                        </div>
                        <div class="mb-4 mt-2 mx-4">
                            <input name="submitForm" id="verListadoPedidoBtn" class="btn btn-primary " onclick="listadoFinal()" value="Ver Listado Final">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h1 class="display-4 text-center" style="font-size: 24px;">Ultimo Producto Ingresado:</h1>
    </div>

    <div class="mt-4  justify-content-center">
        <div class="">

            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Nombre Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Precio Total - Producto</th>
                    </tr>
                </thead>
                <tbody id="table-body" class="text-center">
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center" id="resultadoBotones">

    </div>




</body>

</html>


<script>
    var objetoPedido = {
        datosCliente: '',
        fechaEntregaPedido: '',
        productos: []

    }

    //Formato Pedido: {datosCliente: "43717722", fechaEntrega: "2022-09-21", productos: [0: {nombreProducto: 'Mother ASUS ', cantidadProducto: '1'}, 1: {nombreProducto: 'Mother ASUS ', cantidadProducto: '2'}]}



    //Cambio el minimo del input date para que no pueda ingresar valores anteriores al día actual.
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("fechaEntregaPedido")[0].setAttribute('min', today);


    if (objetoPedido.productos.length === 0) {
        document.getElementById('verListadoPedidoBtn').disabled = true;
    }


    function ingresarPedido() {

        //Tomar los valores del form
        var ID_Cliente = document.getElementById('selectCliente').value;
        var fechaPedido = document.getElementById('fechaEntregaPedido').value;
        var nombreProducto = document.getElementById('selectProducto').value;
        var cantidadProducto = document.getElementById('cantidadPorProducto').value;



        const producto = {
            nombreProducto: nombreProducto,
            cantidadProducto: cantidadProducto,
        };


        objetoPedido.datosCliente = ID_Cliente;



        if ((nombreProducto === 'null' || cantidadProducto == 0 || fechaPedido === '')) {
            alert('Error: ingrese datos validos');
            console.log(objetoPedido);
        } else {
            if (fechaPedido != '') {
                objetoPedido.fechaEntregaPedido = fechaPedido;

                objetoPedido.productos.push(producto);

                tomarNombreProductoDevolverPrecio();
                document.getElementById('fechaEntregaPedido').disabled = true;
            } else {
                objetoPedido.productos.push(producto);
                tomarNombreProductoDevolverPrecio();
            }

            document.getElementById('selectProducto').value = 'null';
            document.getElementById('cantidadPorProducto').value = 0;

            // console.log(objetoPedido);


        }


        if (objetoPedido.productos.length != 0) {
            document.getElementById('verListadoPedidoBtn').disabled = false;
        }


        function tomarNombreProductoDevolverPrecio() {
            $.ajax({
                url: 'devolverPrecio.php',
                method: 'post',
                data: {
                    arrayProductos: JSON.stringify([objetoPedido.productos[objetoPedido.productos.length - 1]])
                },
                success: function(res) {
                    var listadoProductoFinal = JSON.parse(res);
                    objetoPedido.productos.pop();
                    objetoPedido.productos.push(listadoProductoFinal);
                    objetoPedido.productos.map((productoIndividual) => {
                        document.getElementById('table-body').innerHTML = "<tr><td>" + productoIndividual.nombreProducto + "</td> <td class='text-center'>" + productoIndividual.cantidadProducto + "</td> <td class='text-center'>" + productoIndividual.precioProducto + "</td> <td class='text-center'>" + productoIndividual.precioTotalProducto + "</td></tr>";
                    })
                }
            })
        }

    }


    function listadoFinal() {

        var sumaTotalPedido = 0;

        // console.log(objetoPedido);

        document.getElementById('ingresarPedidoBtn').disabled = true;
        document.getElementById('verListadoPedidoBtn').disabled = true;
        document.getElementById('selectProducto').disabled = true;
        document.getElementById('cantidadPorProducto').disabled = true;
        document.getElementById('table-body').innerHTML = ''

        objetoPedido.productos.map((productoIndividual) => {
            sumaTotalPedido += productoIndividual.precioTotalProducto;
            document.getElementById('table-body').innerHTML += "<tr><td>" + productoIndividual.nombreProducto + "</td> <td class='text-center'>" + productoIndividual.cantidadProducto + "</td> <td class='text-center'>" + productoIndividual.precioProducto + "</td> <td class='text-center'>" + productoIndividual.precioTotalProducto + "</td></tr>";
        })
        document.getElementById('table-body').innerHTML += "<br><br><tr class='bg-primary'><td colspan='4'>" + "<h1 class='display-4 text-white' style='font-size: 20px; font-weight: 600'> Importe a Pagar: $ " + sumaTotalPedido + "</h1></td></tr>";


        document.getElementById('resultadoBotones').innerHTML = '<div class="d-flex justify-content-center"><div><input name="submitForm" id="ingresarPedidoBtn" class="btn btn-danger mb-4 mt-2 mx-4" onclick="cancelarPedido()" value="Cancelar Pedido"></div></div>';
        document.getElementById('resultadoBotones').innerHTML += '<div class="d-flex justify-content-center"><div><input name="submitForm" id="ingresarPedidoBtn" class="btn btn-primary mb-4 mt-2 mx-4 text-white" onclick="confirmarPedido()" value="Confirmar Pedido"></div></div>';

    }
</script>

<div>
    <form id="formularioEnvioPedido" action="test.php" method="POST">
        <input type="hidden" name="envioPedido" id="envioPedido" value="">
        <input type="submit" id="botonEnvioPedido" name="submit" value="Submit" style="display: none;" />
    </form>
</div>

<script type="text/javascript">
    function confirmarPedido() {

        var arrayPedido = [];

        arrayPedido.push(objetoPedido);

        if (confirm("Una vez confirmado el pedido deberá retirarlo. ¿Esta seguro de confirmar?")) {
            $.ajax({
                url: 'insertarPedidoBD.php',
                method: 'post',
                data: {
                    arrayPedido: JSON.stringify(arrayPedido)
                },
                success: function(res) {
                    console.log(res);

                    if (JSON.parse(res) === 1) {
                        alert('Pedido Ingresados satisfactoriamente');
                        redireccionar();
                    }

                }
            })
        }
        /*
            ALTER TABLE pedidos AUTO_INCREMENT = 1;
            ALTER TABLE productos_pedidos AUTO_INCREMENT = 1;
        */



    }

    function cancelarPedido() {
        if (confirm("¿Esta seguro que quiere cancelar su pedido?")) {
            alert("Pedido Cancelado")
            redireccionar();
        }
    }


    function redireccionar() {
        setTimeout("location.href='paginaPrincipal.php'", 1500);
    }
</script>