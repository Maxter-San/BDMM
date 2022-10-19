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

<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;">
    <?php
        include_once('assets/header.php');

        include_once('apis/settingsApi.php');

        $varSet = new settingsApi(); 
        $rows = $varSet->getUserData();
        
    ?>

    <div class="container mt-5 mb-5">
    <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="myFunction();" id="myForm">
            <legend>Información personal</legend>
            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" id="formName" placeholder="Escribe tu nombre(s)..." required value="<?php if(isset($rows[0]['name'])){echo $rows[0]['name'];} ?>" name="name">
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Apellido</label>
                    <input class="form-control" id="formLastName" placeholder="Escribe tu apellido(s)..." required value="<?php if(isset($rows[0]['lastName'])){echo $rows[0]['lastName'];} ?>" name="lastName">
                </div>
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input class="form-control" type="date" id="formBirthDate" required value="<?php if($rows[0]['birthDay']){echo($rows[0]['birthDay']);}?>"  name="birthDay">
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Sexo</label>
                    <select class="form-select" id="formGender" required name="gender">
                        <option value="">Selecciona tu sexo</option>
                        <option value="Hombre" <?php if(isset($rows[0]['gender'])){if($rows[0]['gender'] == "Hombre"){echo("selected");}}?>>Hombre</option>
                        <option value="Mujer" <?php if(isset($rows[0]['gender'])){if($rows[0]['gender'] == "Mujer"){echo("selected");}}?>>Mujer</option>
                    </select>
                </div>
            </div>

            <legend class="mt-5">Domicilio</legend>
            <?php 
                if(isset($rows[0]['userType'])){
                    if($rows[0]['userType'] == 'Comprador'){
            ?>
            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Calle y número</label>
                    <input class="form-control" id="formStreetNum" placeholder="Escribe la calle..." required value="<?php if(isset($rows[0]['address'])){echo $rows[0]['address'];} ?>" name="address">
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Código postal</label>
                    <input class="form-control" id="formPostalCode" placeholder="Escribe el código postal..." required value="<?php if(isset($rows[0]['postalCode'])){echo $rows[0]['postalCode'];} ?>" name="postalCode">
                </div>
            </div>

            <?php 
                    }
                }
            ?>

            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Ciudad</label>
                    <input class="form-control" id="formCity" placeholder="Escribe la ciudad..." required value="<?php if(isset($rows[0]['city'])){echo $rows[0]['city'];} ?>" name="city">
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Estado</label>
                    <input class="form-control" id="formState" placeholder="Escribe el estado..." required value="<?php if(isset($rows[0]['state'])){echo $rows[0]['state'];} ?>" name="state">
                </div>
            </div>

            <legend class="mt-5">Métodos de pago</legend>
            <div class="row">
                <div class="col-md form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="isDebitCard" id="flexCheckDebitCard" onclick="formCardDisable();" <?php if(isset($rows[0]['isDebitCard'])){if($rows[0]['isDebitCard'] == true){echo("checked");}}?> name="isDebitCard">
                        <label class="form-check-label" for="flexCheckDebitCard">
                            Tarjeta de débito
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="isPaypal" id="flexCheckPaypal" <?php if(isset($rows[0]['isPaypal'])){if($rows[0]['isPaypal'] == true){echo("checked");}}?> name="isPaypal">
                        <label class="form-check-label" for="flexCheckPaypal">
                            Paypal
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="isOxxo" id="flexCheckOxxo" <?php if(isset($rows[0]['isOxxo'])){if($rows[0]['isOxxo'] == true){echo("checked");}}?> name="isOxxo">
                        <label class="form-check-label" for="flexCheckOxxo">
                            Oxxo
                        </label>
                    </div>

                </div>
                
                <div class="col-md form-group">
                    <label class="form-label">Número de tarjeta</label>
                    <input class="form-control" id="formDebitCard" placeholder="Escribe los 16 dígitos de tu tarjeta..." <?php if(isset($rows[0]['isDebitCard'])){if($rows[0]['isDebitCard'] == false){echo("disabled");}}?> value="<?php if(isset($rows[0]['debitCard'])){echo $rows[0]['debitCard'];} ?>" name="debitCard">
                </div>
            </div>

            <legend class="mt-5">Información de usuario</legend>
            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Nombre de usuario</label>
                    <input class="form-control" id="formUserName" placeholder="Escribe tu nombre de usuario..." required value="<?php if(isset($rows[0]['userName'])){echo $rows[0]['userName'];} ?>" name="userName">
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="formEmail" placeholder="nombre@ejemplo.com" disabled value="<?php if(isset($rows[0]['email'])){echo $rows[0]['email'];} ?>" name="email">
                </div>                
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Imagen de perfil</label>
                    <input class="form-control" type="file" id="formFile" name="profilePhoto" required>
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Tipo de usuario</label>
                    <select class="form-select" id="formRole" disabled name="userType">
                        <option value="">Selecciona tu rol de usuario</option>
                        <option value="Comprador" <?php if(isset($rows[0]['userType'])){if($rows[0]['userType'] == "Comprador"){echo("selected");}}?>>Comprador</option>
                        <option value="Vendedor" <?php if(isset($rows[0]['userType'])){if($rows[0]['userType'] == "Vendedor"){echo("selected");}}?>>Vendedor</option>
                        <option value="Admin" <?php if(isset($rows[0]['userType'])){if($rows[0]['userType'] == "Admin"){echo("selected");}}?>>Admin</option>
                        <option value="SuperAdmin" <?php if(isset($rows[0]['userType'])){if($rows[0]['userType'] == "SuperAdmin"){echo("selected");}}?>>SuperAdmin</option>
                    </select>
                </div>               
            </div>
            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Imagen de portada</label>
                    <input class="form-control" type="file" id="formFrontPage" name="coverPhoto" required>
                </div>

                <div class="col-md form-group">
                    <div class="col-md form-group">
                        <label class="form-label">Descripción</label>
                        <input class="form-control" id="formDescription" placeholder="Tu descripción de usuario (opcional)" value="<?php if(isset($rows[0]['description'])){echo $rows[0]['description'];} ?>" name="description">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <br>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckPassword" onclick="formPasswordDisable();" name="oldPassword">
                    <label class="form-check-label" for="flexSwitchCheckPassword">Cambiar contraseña</label>
                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Nueva contraseña</label>
                    <input class="form-control" type="password" id="formPassword" placeholder="Crea una contraseña..." disabled name="newPassword">
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
                        <input class="form-control" type="password" id="formActualPassword" placeholder="Confirma con tu contraseña..." required name="password">
                    </div>
                    <button type="submit" class="btn btn-outline-warning" onclick="validateInfo();" name="submitButton">Guardar</button>
                    
                    <label style="color : red;" id="content"></label>

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