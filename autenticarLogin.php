<?php

//Recordatorio (TABLA ES "Clientes")

session_start();


if (empty($_SESSION)) {
    header("Location: login.php");
}

//Conexión Base de Datos
$database = new mysqli("localhost", "root", "", "tp_promocion_programacion");


if($database === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
echo "Connect Successfully. Host info: " . mysqli_get_host_info($database) . "<br/>";
//---------------------------

//Toma de datos
$documentoUsuario = $_POST["documentoInput"];
$contraseñaUsuario = $_POST["contraseñaInput"];
//---------------------------

//Consulta de Ingreso
$resultado = $database ->query("SELECT * FROM clientes WHERE DNI_cliente = '$documentoUsuario' AND Contraseña = '$contraseñaUsuario'");

if(!$resultado) {
    echo mysqli_error($mysqli);
    exit;
} 

if($cliente = mysqli_fetch_assoc($resultado)) {

    $_SESSION['cliente'] = $cliente;

    header("Location: paginaPrincipal.php"); 
} else {
    header("Location: paginaError.html"); 
    
}
?>