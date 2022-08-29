<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    
    <script src='scripts/signUp.js'></script>
    
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel='stylesheet' type='text/css' media='screen' href='./style/signUp.css'>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php
        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
        <legend>Información personal</legend>
        <div class="row">
            <div class="col-md">
                <label class="form-label">Nombre</label>
                <input class="form-control" id="formName" placeholder="Escribe tu nombre(s)...">
            </div>

            <div class="col-md">
                <label class="form-label">Apellido</label>
                <input class="form-control" id="formLastName" placeholder="Escribe tu apellido(s)...">
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <label class="form-label">Fecha de nacimiento</label>
                <input class="form-control" type="date" id="formBirthDate" name="trip-start" max="2018-12-31">
            </div>
                
            <div class="col-md">
                <label class="form-label">Sexo</label>
                <select class="form-select" id="formGender">
                    <option selected>Selecciona tu sexo</option>
                    <option value="1">Mujer</option>
                    <option value="2">Hombre</option>
                    <option value="3">Si</option>
                </select>
            </div>
        </div>      

        <legend class="mt-5">Información de usuario</legend>
        <div class="row">
            <div class="col-md">
                <label class="form-label">Nombre de usuario</label>
                <input class="form-control" id="formUserName" placeholder="Crea tu nombre de usuario...">
            </div>
            
            <div class="col-md">
                <label class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="formEmail" placeholder="nombre@ejemplo.com">
            </div>                
        </div>

        <div class="row">
            <div class="col-md">
                <label class="form-label">Imagen de perfil</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            
            <div class="col-md">
                <label class="form-label">Tipo de usuario</label>
                <select class="form-select" id="formRole">
                    <option selected>Selecciona tu rol de usuario</option>
                    <option value="1">Comprador</option>
                    <option value="2">Vendedor</option>
                </select>
            </div>               
        </div>

        <div class="row">
            <div class="col-md">
                <label class="form-label">Contraseña</label>
                <input class="form-control" type="password" id="formPassword" placeholder="Crea una contraseña...">
            </div>
            
            <div class="col-md">
                <label class="form-label">Confirmar contraseña</label>
                <input class="form-control" type="password" id="formPasswordConfirm" placeholder="Confirma la contraseña...">
            </div>
        </div>

        <div class="row mt-5">
            <div class="d-grid gap-2">
                <a onclick="validateUser()" role="button" class="btn btn-outline-warning">Enviar</a>
            </div>
        </div>
    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>