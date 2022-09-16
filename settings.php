<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='./style/main.css'>
    <script src='./scripts/settings.js'></script>

    <link rel='stylesheet' type='text/css' media='screen' href='./style/toast.css'>
    <script src='./scripts/toast.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;" onload="setDummyInfo();">
    <?php
        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
    <form method="POST" action="#" onsubmit="myFunction();" id="myForm">
            <legend>Información personal</legend>
            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" id="formName" placeholder="Escribe tu nombre(s)..." required>
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Apellido</label>
                    <input class="form-control" id="formLastName" placeholder="Escribe tu apellido(s)..." required>
                </div>
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input class="form-control" type="date" id="formBirthDate" name="trip-start" required>
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Sexo</label>
                    <select class="form-select" id="formGender" required>
                        <option selected value="">Selecciona tu sexo</option>
                        <option value="1">Hombre</option>
                        <option value="2">Mujer</option>                     
                        <option value="3">Si</option>
                    </select>
                </div>
            </div>

            <legend class="mt-5">Domicilio</legend>
            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Calle y número</label>
                    <input class="form-control" id="formStreetNum" placeholder="Escribe la calle..." required>
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Código postal</label>
                    <input class="form-control" id="formPostalCode" placeholder="Escribe el código postal..." required>
                </div>
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Ciudad</label>
                    <input class="form-control" id="formCity" placeholder="Escribe la ciudad..." required>
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Estado</label>
                    <input class="form-control" id="formState" placeholder="Escribe el estado..." required>
                </div>
            </div>

            <legend class="mt-5">Métodos de pago</legend>
            <div class="row">
                <div class="col-md form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDebitCard" onclick="formCardDisable();">
                        <label class="form-check-label" for="flexCheckDebitCard">
                            Tarjeta de débito
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckPaypal">
                        <label class="form-check-label" for="flexCheckPaypal">
                            Paypal
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckOxxo">
                        <label class="form-check-label" for="flexCheckOxxo">
                            Oxxo
                        </label>
                    </div>

                </div>
                
                <div class="col-md form-group">
                    <label class="form-label">Número de tarjeta</label>
                    <input class="form-control" id="formDebitCard" placeholder="Escribe los 16 dígitos de tu tarjeta..." disabled>
                </div>
            </div>

            <legend class="mt-5">Información de usuario</legend>
            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Nombre de usuario</label>
                    <input class="form-control" id="formUserName" placeholder="Crea tu nombre de usuario..." required>
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="formEmail" placeholder="nombre@ejemplo.com" disabled>
                </div>                
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Imagen de perfil</label>
                    <input class="form-control" type="file" id="formFile">
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Tipo de usuario</label>
                    <select class="form-select" id="formRole" disabled>
                        <option selected value="">Selecciona tu rol de usuario</option>
                        <option value="1">Comprador</option>
                        <option value="2">Vendedor</option>
                    </select>
                </div>               
            </div>
            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Imagen de portada</label>
                    <input class="form-control" type="file" id="formFrontPage">
                </div>

                <div class="col-md form-group">
                    <div class="col-md form-group">
                        <label class="form-label">Descripción</label>
                        <input class="form-control" id="formDescription" placeholder="Tu descripción de usuario (opcional)">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <br>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckPassword" onclick="formPasswordDisable();">
                    <label class="form-check-label" for="flexSwitchCheckPassword">Cambiar contraseña</label>
                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Nueva contraseña</label>
                    <input class="form-control" type="password" id="formPassword" placeholder="Crea una contraseña..." disabled>
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Confirmar contraseña</label>
                    <input class="form-control" type="password" id="formPasswordConfirm" placeholder="Confirma la contraseña..." disabled>
                </div>
            </div>

            <div class="row mt-5">
                <div class="d-grid gap-2">
                    <div class="col-md form-group">
                        <label class="form-label">Confirmanos tu información con tu contraseña actual</label>
                        <input class="form-control" type="password" id="formActualPassword" placeholder="Confirma con tu contraseña..." required>
                    </div>
                    <button onclick="validateInfo();" class="btn btn-outline-warning" type="submit">Guardar</button>
                    <!--onclick="validateInfo()"-->
                </div>
            </div>
        </form>
    </div>

    <div id="snackbar">Información actualizada</div>  

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>