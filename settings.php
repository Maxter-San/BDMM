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

<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;" onload="<?php if(isset($_GET['successful'])){echo 'myFunction();';}?>">
    <?php
        session_start();

        include_once('apis/settingsApi.php');

        include_once('assets/header.php');     
    ?>

    <div class="container mt-5 mb-5">
    <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
            <legend>Información personal</legend>
            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" id="formName" maxlength="50" placeholder="Escribe tu nombre(s)..." required value="<?php if(isset($_GET['p_name'])){echo $_GET['p_name'];}else if(isset($rows[0]['name'])){echo $rows[0]['name'];}?>" name="name">
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Apellido</label>
                    <input class="form-control" id="formLastName" maxlength="50" placeholder="Escribe tu apellido(s)..." required value="<?php if(isset($_GET['p_lastName'])){echo $_GET['p_lastName'];}else if(isset($rows[0]['lastName'])){echo $rows[0]['lastName'];} ?>" name="lastName">
                </div>
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input class="form-control" type="date" id="formBirthDate" required value="<?php if(isset($_GET['p_birthDay'])){echo $_GET['p_birthDay'];}else if($rows[0]['birthDay']){echo($rows[0]['birthDay']);}?>"  name="birthDay">
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Sexo</label>
                    <select class="form-select" id="formGender" required name="gender">
                        <option value="">Selecciona tu sexo</option>
                        <option value="Hombre" <?php if(isset($_GET['p_gender'])){if($_GET['p_gender'] == "Hombre"){echo "selected";}}else if(isset($rows[0]['gender'])){if($rows[0]['gender'] == "Hombre"){echo("selected");}}?>>Hombre</option>
                        <option value="Mujer" <?php if(isset($_GET['p_gender'])){if($_GET['p_gender'] == "Mujer"){echo "selected";}}else if(isset($rows[0]['gender'])){if($rows[0]['gender'] == "Mujer"){echo("selected");}}?>>Mujer</option>
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
                    <input class="form-control" id="formStreetNum" maxlength="50" placeholder="Escribe la calle..." required value="<?php if(isset($_GET['p_address'])){echo $_GET['p_address'];}else if(isset($rows[0]['address'])){echo $rows[0]['address'];} ?>" name="address">
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Código postal</label>
                    <input class="form-control" id="formPostalCode" maxlength="50" placeholder="Escribe el código postal..." required value="<?php if(isset($_GET['p_postalCode'])){echo $_GET['p_postalCode'];}else if(isset($rows[0]['postalCode'])){echo $rows[0]['postalCode'];} ?>" name="postalCode">
                </div>
            </div>

            <?php 
                    }
                }
            ?>

            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Ciudad</label>
                    <input class="form-control" id="formCity" maxlength="50" placeholder="Escribe la ciudad..." required value="<?php if(isset($_GET['p_city'])){echo $_GET['p_city'];}else if(isset($rows[0]['city'])){echo $rows[0]['city'];} ?>" name="city">
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Estado</label>
                    <input class="form-control" id="formState" maxlength="50" placeholder="Escribe el estado..." required value="<?php if(isset($_GET['p_state'])){echo $_GET['p_state'];}else if(isset($rows[0]['state'])){echo $rows[0]['state'];} ?>" name="state">
                </div>
            </div>

            <?php 
                if(isset($rows[0]['userType'])){
                    if($rows[0]['userType'] == 'Comprador' || $rows[0]['userType'] == 'Vendedor'){
            ?>
            <legend class="mt-5">Métodos de pago</legend>
            
            <div class="row">
                <?php 
                    if(isset($rows[0]['userType'])){
                        if($rows[0]['userType'] == 'Comprador'){
                ?>

                <div class="col-md form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="isDebitCard" id="flexCheckDebitCard" onclick="formCardDisable();" <?php if(isset($_GET['p_isDebitCard'])){if($_GET['p_isDebitCard'] == true){echo("checked");}}else if(isset($rows[0]['isDebitCard'])){if($rows[0]['isDebitCard'] == true){echo("checked");}}?> name="isDebitCard">
                        <label class="form-check-label" for="flexCheckDebitCard">
                            Tarjeta de débito
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="isPaypal" id="flexCheckPaypal" <?php if(isset($_GET['p_isPaypal'])){if($_GET['p_isPaypal'] == true){echo("checked");}}else if(isset($rows[0]['isPaypal'])){if($rows[0]['isPaypal'] == true){echo("checked");}}?> name="isPaypal">
                        <label class="form-check-label" for="flexCheckPaypal">
                            Paypal
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="isOxxo" id="flexCheckOxxo" <?php if(isset($_GET['p_isOxxo'])){if($_GET['p_isOxxo'] == true){echo("checked");}}else if(isset($rows[0]['isOxxo'])){if($rows[0]['isOxxo'] == true){echo("checked");}}?> name="isOxxo">
                        <label class="form-check-label" for="flexCheckOxxo">
                            Oxxo
                        </label>
                    </div>

                </div>
                
                <?php 
                        }
                    }
                ?>
                
                <div class="col-md form-group">
                    <label class="form-label">Número de tarjeta</label>
                    <input class="form-control" id="formDebitCard" placeholder="Escribe los 16 dígitos de tu tarjeta..." <?php if(isset($_GET['p_isDebitCard'])){if($rows[0]['p_isDebitCard'] == false){echo "disabled";}}else if(isset($rows[0]['isDebitCard'])){if($rows[0]['isDebitCard'] == false){echo("disabled");}}?> value="<?php if(isset($_GET['p_debitCard'])){echo $_GET['p_debitCard'];}else if(isset($rows[0]['debitCard'])){echo $rows[0]['debitCard'];} ?>" name="debitCard">
                </div>
            </div>

            <?php 
                    }
                }
            ?>

            <legend class="mt-5">Información de usuario</legend>
            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Nombre de usuario</label>
                    <input class="form-control" id="formUserName" maxlength="50" placeholder="Escribe tu nombre de usuario..." required value="<?php if(isset($_GET['p_userName'])){echo $_GET['p_userName'];}else if(isset($rows[0]['userName'])){echo $rows[0]['userName'];} ?>" name="userName">
                    <?php 
                        if (isset($_GET['repeatUsername'])){
                            echo '<label style="color : red;" id="content">Nombre de usuario ya existente</label>';
                        }
                    ?>
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" maxlength="50" id="formEmail" placeholder="nombre@ejemplo.com" disabled value="<?php if(isset($rows[0]['email'])){echo $rows[0]['email'];} ?>" name="email">
                </div>                
            </div>

            <div class="row">
                <div class="col-6 form-group">
                    <label class="form-label">Imagen de perfil</label>
                    <input class="form-control" type="file" id="formFile" name="profilePhoto">
                </div>

                <div class="col">
                    <br>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckVisible" onclick="formPasswordDisable();" name="isVisible" <?php if(isset($rows[0]['isVisible']) && $rows[0]['isVisible']){echo 'checked';} ?>>
                        <label class="form-check-label" for="flexSwitchCheckPassword">Perfil público</label>
                    </div>
                </div>  

                <div class="col-4 form-group">
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
                    <input class="form-control" type="file" id="formFrontPage" name="coverPhoto">
                </div>

                <div class="col-md form-group">
                    <div class="col-md form-group">
                        <label class="form-label">Descripción</label>
                        <input class="form-control" id="formDescription" maxlength="200" placeholder="Tu descripción de usuario (opcional)" value="<?php if(isset($_GET['p_description'])){echo $_GET['p_description'];}else if(isset($rows[0]['description'])){echo $rows[0]['description'];} ?>" name="description">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <br>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckPassword" onclick="formPasswordDisable();" name="ifNewPassword" value="<?php if(isset($_GET['p_newPassword'])){echo $_GET['p_newPassword'];} ?>">
                        <label class="form-check-label" for="flexSwitchCheckPassword">Cambiar contraseña</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Nueva contraseña</label>
                    <input class="form-control" type="password" id="formPassword" maxlength="50" placeholder="Crea una contraseña..." disabled name="newPassword">
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Confirmar contraseña</label>
                    <input class="form-control" type="password" id="formPasswordConfirm" maxlength="50" placeholder="Confirma la contraseña..." disabled>
                </div>
            </div>

            <div class="row mt-5">
                <div class="d-grid gap-2">
                    <div class="col-md form-group">
                        <label class="form-label">Confirmanos tu información con tu contraseña actual</label>
                        <input class="form-control" type="password" id="formActualPassword" maxlength="50" placeholder="Confirma con tu contraseña..." required name="password">
                    </div>
                    <button type="submit" class="btn btn-outline-warning" onclick="validateInfo('<?php echo $_SESSION['s_userType']; ?>');" name="submitButton">Guardar</button>
                    
                    <?php 
                        if (isset($_GET['invalidPassword'])){
                            echo '<label style="color : red;" id="content">Contraseña incorrecta</label>';
                        }
                    ?>
                    <!--onclick="validateInfo()"-->
                </div>
            </div>
        </form>

        <br><br><br><hr>

        <div class="row">
            <div class="col text-center">
                <a href="#" class="link-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Dar de baja la cuenta</a>
            </div>
        </div>
    </div>

    <div id="snackbar">Información actualizada</div>  

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirmación</h5>
                </div>
                <div class="modal-body">
                ¿Seguro qué quiéres dar de baja tu cuenta?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                        <input class="form-control" id="formProductId" placeholder="ID" name="productId" hidden value="<?php echo $productId;?>">

                        <button type="submit" name="submitUnsubscribe" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>