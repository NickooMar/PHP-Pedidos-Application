<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="paginaPrincipal.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title> Contacto </title>
</head>

<body class="contactBG">
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


    <div>
        <div class="text-center ">
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row d-flex  justify-content-center">
                        <div class="col-xl-6 col-md-12">
                            <div class="card user-card-full">
                                <div class="row m-l-0 m-r-0">
                                    <div class="col-sm-4 user-profile" style="background-color: #EDFBC1;">
                                        <div class="card-block text-center">
                                            <div class="m-b-25">
                                                <img src="https://images.unsplash.com/photo-1523966211575-eb4a01e7dd51?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=710&q=80" class="img-radius" alt="User-Profile-Image">
                                            </div>
                                            <h1 class="display-4" style="font-size: 36px;">Contacto</h1>

                                            <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="card-block">
                                            <h6 class="m-b-20 p-b-5 b-b-default display-4 " style="font-size: 24px; font-weight: 400;">Información de contacto</h6>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Teléfono</p>
                                                    <h6 class="f-w-400 text-warning">0000 0000 0000</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Email</p>
                                                    <h6 class="f-w-400 text-warning">EjemploEmpresa123@ejemplo.com</h6>
                                                </div>
                                            </div>
                                            <h6 class="m-b-20 p-b-5 mt-4 b-b-default display-4 " style="font-size: 24px; font-weight: 400;">Contactar por Mail</h6>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="mailto:EjemploEmpresa123@ejemplo.com?Subject=Consulta%20Cliente">
                                                        <input type="button" class="m-b-10 f-w-600 btn btn-warning text-white" value="Enviar mail">
                                                    </a>
                                                </div>
                                            </div>
                                            <h6 class="m-b-20 p-b-5 mt-4 b-b-default display-4 " style="font-size: 24px; font-weight: 400;">Contactar por Redes Sociales</h6>
                                            <div class="d-flex justify-content-center">
                                                <div class="mx-4">
                                                    <a href="#" style="text-decoration: none; color: black;">
                                                        <i class="bi bi-facebook" style="font-size: 25px;"></i>
                                                    </a>
                                                </div>
                                                <div class="mx-4">
                                                    <a href="#" style="text-decoration: none; color: black;">
                                                        <i class="bi bi-instagram" style="font-size: 25px;"></i>
                                                    </a>
                                                </div>
                                                <div class="mx-4">
                                                    <a href="#" style="text-decoration: none; color: black;">
                                                        <i class="bi bi-whatsapp" style="font-size: 25px;"></i>
                                                    </a>
                                                </div>
                                                <div class="mx-4">
                                                    <a href="#" style="text-decoration: none; color: black;">
                                                        <i class="bi bi-twitter" style="font-size: 25px;"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







</body>

</html>


<style>
    .contactBG {
        background-color: #D9D375;
    }
</style>