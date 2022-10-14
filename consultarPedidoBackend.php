<?php

$database = new mysqli("localhost", "root", "", "tp_promocion_programacion");

if ($database->connect_error) {
    die("Connection failed: " . $database->connect_error);
}

session_start();

if (empty($_SESSION)) {
    header("Location: login.php");
}



/* Recibo desde consultarPedidos los datos que voy a consultar en la base de datos */
$fechaConsultaPedido = json_decode($_POST['consultaFechaPedido'], true);
$ID_Cliente = json_decode($_POST['IDCliente'], true);

/* Realizo la consulta que hizo dicho cliente y en la fecha seleccionada */
$queryConsultaPedido = $database->query("SELECT * FROM pedidos WHERE Fecha_Pedido = '${fechaConsultaPedido}' AND ID_cliente = '${ID_Cliente}'");

$arrayDePedidoConsultado = array();

while ($resultadoQueryConsultaPedido = mysqli_fetch_assoc($queryConsultaPedido)) {

    /* Recorro todos los pedidos que me trajo desde la BD y los guardo cada uno en un array para cada uno que luego sera pasado al front-end */
    $arrayDatosPedidoConsultado = [
        $resultadoQueryConsultaPedido['ID_Pedido'],
        $resultadoQueryConsultaPedido['Fecha_Pedido'],
        $resultadoQueryConsultaPedido['ID_cliente']
    ];


    array_push($arrayDePedidoConsultado, $arrayDatosPedidoConsultado);
}


echo json_encode($arrayDePedidoConsultado);
