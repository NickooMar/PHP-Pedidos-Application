<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos - Promoción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 32rem; border-radius: 30px;">
            <div class="card-body text-center">
                <h5 class="display-4" style="font-size: 48px;">REGISTER</h5>
                <h6 class="card-subtitle mb-2 display-5 text-muted" style="font-size: 24px;">Ingrese su usuario y contraseña</h6>

                <div class="d-flex align-items-center flex-column mt-4">

                    <div class="input-group mb-3 w-50 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #202020; color: white; width: 42px;" id="basic-addon1">👨‍💼</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Nombre Completo" name="nombreInput" id="nombreInput" aria-label="nombreInput" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3 w-50 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #202020; color: white; width: 42px;" id="basic-addon1">@</span>
                        </div>
                        <input type="email" class="form-control" placeholder="Email" name="emailInput" id="emailInput" aria-label="emailInput" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3 w-50 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #202020; color: white; width: 42px;" id="basic-addon1">📋</span>
                        </div>
                        <input type="text" class="form-control" placeholder="DNI" name="documentoInput" id="documentoInput" aria-label="documentoInput" aria-describedby="basic-addon1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>

                    <div class="input-group mb-3 w-50 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #202020; color: white; width: 42px;" id="basic-addon1">📋</span>
                        </div>
                        <input type="text" class="form-control" placeholder="CUIL" name="cuilInput" id="cuilInput" aria-label="cuilInput" aria-describedby="basic-addon1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>

                    <div class="input-group mb-3 w-50 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #202020; color: white; width: 42px;" id="basic-addon1">📍</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Localidad" name="localidadInput" id="localidadInput" aria-label="localidadInput" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3 w-50 ">
                        <select class="form-select" id="sexoSelect" name="sexoSelect" aria-label="Default select example">
                            <option selected disabled>Sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>

                    <div class="input-group mb-3 w-50 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #202020; color: white; width: 42px;" id="basic-addon1">📆</span>
                        </div>
                        <!-- Fecha de nacimiento -->
                        <input type="date" class="form-control" placeholder="Localidad" name="localidadInput" id="localidadInput" aria-label="localidadInput" aria-describedby="basic-addon1">

                    </div>

















                    <div class="input-group mb-3 w-50 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #202020; color: white; width: 42px;" id="basic-addon1">***</span>
                        </div>
                        <input type="password" class="form-control" placeholder="Contraseña" name="contaseñaInput" id="contaseñaInput" aria-label="Contraseña" aria-describedby="basic-addon1">
                    </div>



                </div>



                <a href="./index.php" class="card-link">
                    <button type="button" class="btn btn-dark mt-2">Registrarse</button>
                </a>

                <p class="card-text mt-4 text-muted">¿Ya tiene una cuenta?</p>
                <a href="./login.php" class="card-link">
                    <button type="button" class="btn btn-outline-dark mb-2">Ingresar</button>
                </a>
            </div>
        </div>
    </div>



</body>

</html>