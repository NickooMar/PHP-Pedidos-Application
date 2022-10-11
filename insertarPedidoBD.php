
    <?php

    $database = new mysqli("localhost", "root", "", "tp_promocion_programacion");

    if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
    }

    session_start();

    if (empty($_SESSION)) {
        header("Location: login.php");
    }



    //Formato Pedido: {datosCliente: "43717722", fechaEntrega: "2022-09-21", productos: [0: {nombreProducto: 'Mother ASUS ', cantidadProducto: '1'}, 1: {nombreProducto: 'Mother ASUS ', cantidadProducto: '2'}]}

    //Ingreso el objeto del pedido en un array
    $arrayPedido = json_decode($_POST['arrayPedido'], true);

    //Inicializo variables en 0 para luego ser llenadas.
    $datosCliente = '';
    $fechaEntregaPedido = '';
    $productos = [];


    //Recorro el array que contiene el pedido y relleno los valores vacios.
    foreach ($arrayPedido as $pedido) {
        $datosCliente = $pedido['datosCliente'];
        $fechaEntregaPedido = $pedido['fechaEntregaPedido'];
        array_push($productos, $pedido['productos']);
    }


    //Inserto los datos estaticos en Tabla Pedidos
    $insertarDatosQuery = "INSERT INTO pedidos (ID_cliente, Fecha_Pedido) VALUES ($datosCliente, '$fechaEntregaPedido')";

    //Logica para comprobar que los datos se hayan ingresado satisfactoriamente
    if ($database->query($insertarDatosQuery) === TRUE) {
    } else {
        echo "Error: " . $insertarDatosQuery . "<br>" . $database->error;
    }


    //Tomo el ultimo pedido (el que se inserto en las lineas anteriores) ingresado por ese cliente
    $queryIDPedido = $database->query("SELECT * FROM pedidos ORDER BY ID_Pedido DESC LIMIT 1");

    while ($resultadoIDPedido = mysqli_fetch_assoc($queryIDPedido)) {

        // Recorro el array de productos y vuelvo a recorrer cada producto para tomar su ID gracias al Nombre
        foreach ($productos as $producto) {

            $productosLength = count($producto);

            for ($i = 0; $i < $productosLength; $i++) {

                // Tomar ID_Producto gracias al nombre para ingresarlo en la tabla Producto-Pedido
                $productoNombrePorArray = $producto[$i]['nombreProducto'];
                $queryIDProductos = $database->query("SELECT * FROM productos WHERE Nombre_Producto = '$productoNombrePorArray'"); //Tomo todos los datos de ese producto


                while ($resultadoIDProductos = mysqli_fetch_assoc($queryIDProductos)) {

                    //Por cada iteración a los productos dentro del array de productos, solicito su ID_Pedido correspondiente, el ID_Producto y la cantidad que corresponde a ese pedido
                    $insertIDPedido = $resultadoIDPedido["ID_Pedido"];
                    $insertIDProducto = $resultadoIDProductos["ID_Producto"];
                    $insertCantidad = $producto[$i]["cantidadProducto"];

                    //Por cada iteración de los productos que se encuentran en el array productos INSERTO EL ID_PEDIDO, ID_PRODUCTO Y SU CANTIDAD
                    $queryInsertarProducto_Pedido = "INSERT INTO productos_pedidos (ID_Pedido, ID_Producto, Cantidad) VALUES ($insertIDPedido, $insertIDProducto, $insertCantidad)";

                    //Logica para comprobar que los datos se han ingresado satisfactoriamente.
                    if (mysqli_query($database, $queryInsertarProducto_Pedido)) {
                    } else {
                        echo "Error: " . $queryInsertarProducto_Pedido . "<br>" . mysqli_error($database);
                    }
                }
            }
        }
    }
    echo true;




    $database->close();



    //IMPORTANTE A LA HORA DE INSERTAR PEDIDOS-PRODUCTOS:
    /*
        Para insertar en pedidos-productos (ID_Pedido, ID_Producto, Cantidad) debemos tomar el respectivo pedido ingresado por tal cliente 
        para que se pueda relacionar ese pedido con los productos y las cantidades ingresadas.

        POR ENDE:
        $respectivoPedidoCliente = SELECT * FROM pedidos ORDER BY ID_Pedido DESC LIMIT 1 -- TOMA EL ULTIMO PEDIDO INGRESADO POR ESE CLIENTE 
        (Es decir, El Pedido que se ingreso recien)

        Una vez que tenemos el ID del pedido que se hizo ultimo por ese cliente, es decir, el que se insertó recien, con los datos del pedido,
        entonces solo falta agregar los productos y sus cantidades correspondientes a ese pedido

        Insertar en Productos-Pedidos:
        Se debera hacer un insert en donde se recorrera el array de productos (ubicado en arrayPedido), entonces, por cada producto se insertará
        el ID_Pedido, o sea, el que le corresponde a ese producto, el ID del producto en cuestion y las cantidades.

        Productos:  [0] => [nombreProducto : "Mother ASUS", cantidad: 2]
                    [1] => [nombreProducto : "Notebook RPG", cantidad : 1]

        
        EJEMPLO:
        INSERT INTO productos-pedidos (ID_Pedido, ID_Producto, Cantidad) VALUES $ultimoPedidoPorCliente, $resultadoIDProductos['ID_Producto'], $iteraciónProductos[0, 1, ... $i]['cantidadProducto']
        --ESTO SE EJECUTARA POR CADA PRODUCTO QUE HAYA EN EL EL ARRAY PRODUCTOS (que se encuentra dentro de arrayPedido)--


        
        RESETEAR EL AUTO_INCREMENT AL BORRAR UN CAMPO: 
        ALTER TABLE pedidos AUTO_INCREMENT = 1



    */
    ?>
