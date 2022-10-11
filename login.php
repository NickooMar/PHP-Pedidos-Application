<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos - Promoción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body class="gradient-body">


    <!--Header - Navbar -->
    <nav class="navbar navbar-dark bg-light justify-content-center">
        <img src="./Assets/LogoEmpresa.png" alt="Logo empresa" style="border-radius: 30px; width: 60px; height: 60px">
        <a class="navbar-brand" href="login.php">
            <h1 class="display-4" style="font-size: 40px; color: #202020;">EMPRESA</h1>
        </a>
    </nav>

    <div class="d-flex justify-content-center" style="margin-top: 7%;">
        <div class="card" style="width: 32rem; border-radius: 30px;">
            <div class="card-body text-center">
                <h5 class="display-4" style="font-size: 42px;">INGRESO</h5>
                <h6 class="card-subtitle mb-2 display-5 text-muted" style="font-size: 24px;">Ingrese su DNI y contraseña</h6>

                <form action="./autenticarLogin.php" method="POST">
                    <div class="d-flex align-items-center flex-column mt-4">
                        <div class="input-group mb-3 w-50 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background-color: #202020; color: white; " id="basic-addon1">👨‍💼</span>
                            </div>
                            <input type="text" class="form-control" placeholder="DNI" name="documentoInput" id="documentoInput" aria-label="Username" aria-describedby="basic-addon1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>

                        <div class="input-group mb-3 w-50 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background-color: #202020; color: white; width: 42px;" id="basic-addon1">***</span>
                            </div>
                            <input type="password" class="form-control" placeholder="Contraseña" name="contraseñaInput" id="contraseñaInput" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-dark">Ingresar</button>
                </form>




                <p class="card-text mt-3 text-muted">Ante cualquier inconveniente contáctese con un administrador de la empresa</p>
            </div>
        </div>
    </div>



    <!-- Footer - Contact -->
    <footer class="bg-light text-center text-white text-lg-start" style="position: fixed; bottom: 0; width: 100%; height: 65px;">
        <div class="text-center p-3" style="color:#202020;">
            © 2020 Copyright:
            <a class="" href="./login.php" style="text-decoration: underline; color: #202020;">Empresa/contacto.com</a>
            <p class="display-4" style="font-size: 16px; color: #202020;">Tel: 341 - 000 0000</p>
        </div>
    </footer>







</body>

</html>

<style>
    .gradient-body {
        /* background: #7b4397;
        background: -webkit-linear-gradient(to right, #dc2430, #7b4397);
        background: linear-gradient(to right, #dc2430, #7b4397); */
        background-color: #D9D375;

    }
</style>