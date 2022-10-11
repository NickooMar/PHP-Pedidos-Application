<?php

session_start();

if (empty($_SESSION)) {
    header("Location: login.php");
}



$database = new mysqli("localhost", "root", "", "tp_promocion_programacion");

if ($database->connect_error) {
    die("Connection failed: " . $database->connect_error);
}


$arrayProductos = json_decode($_POST['arrayProductos'], true);


foreach ($arrayProductos as $producto) {

    $nombreProducto = $producto['nombreProducto'];

    $tomarPrecioPorNombreProducto = $database->query("SELECT * FROM productos WHERE Nombre_Producto = '${nombreProducto}'");

    while ($resultadoQueryProducto = mysqli_fetch_assoc($tomarPrecioPorNombreProducto)) {
        $producto['precioProducto'] = $resultadoQueryProducto['Precio_Producto'];
        $producto['precioTotalProducto'] = $resultadoQueryProducto['Precio_Producto'] * $producto['cantidadProducto'];


        $codificacionArrayJS = json_encode($producto);

        echo $codificacionArrayJS;
    }

}
