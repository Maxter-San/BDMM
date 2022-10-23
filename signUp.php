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

<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;">
    <?php
        session_start();

        include_once('apis/signUpApi.php');
        
        include_once('assets/header.php');
    ?>
   
    <div class="container mt-5 mb-5">
        <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <legend>Información personal</legend>
            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" id="formName" maxlength="50" placeholder="Escribe tu nombre(s)..." required name="name"
                        value="<?php if(isset($_GET['p_name'])){echo($_GET['p_name']);}?>"
                    >
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Apellido</label>
                    <input class="form-control" id="formLastName" maxlength="50" placeholder="Escribe tu apellido(s)..." required name="lastName"
                        value="<?php if(isset($_GET['p_lastName'])){echo($_GET['p_lastName']);}?>"
                    >
                </div>
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input class="form-control" type="date" id="formBirthDate" required name="birthDay"
                        value="<?php if(isset($_GET['p_birthDay'])){echo($_GET['p_birthDay']);}?>"
                    >
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Sexo</label>
                    <select class="form-select" id="formGender" required name="gender">
                        <option value="">Selecciona tu sexo</option>
                        <option value="Hombre"
                            <?php if(isset($_GET['p_gender'])){if($_GET['p_gender'] == "Hombre"){echo("selected");}}?>
                        >Hombre</option>
                        <option value="Mujer"
                            <?php if(isset($_GET['p_gender'])){if($_GET['p_gender'] == "Mujer"){echo("selected");}}?>
                        >Mujer</option>
                    </select>
                </div>
            </div>      

            <legend class="mt-5">Información de usuario</legend>
            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Nombre de usuario</label>
                    <input class="form-control" id="formUserName" maxlength="50" placeholder="Crea tu nombre de usuario..." required name="userName"
                        value="<?php if(isset($_GET['p_userName'])){echo($_GET['p_userName']);}?>"
                    >
                    <?php 
                    if (isset($_GET['repeatUsername'])){
                        echo '<label style="color : red;">Nombre de usuario no disponible</label>';
                    };
                    ?>
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="formEmail" maxlength="50" placeholder="nombre@ejemplo.com" required name="email"
                        value="<?php if(isset($_GET['p_email'])){echo($_GET['p_email']);}?>"
                    >
                    <?php 
                    if (isset($_GET['repeatEmail'])){
                        echo '<label style="color : red;">Correo electrónico en uso</label>';

                    };
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Imagen de perfil</label>
                    <input class="form-control" type="file" id="formFile" required name="profilePhoto"
                    >
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Tipo de usuario</label>
                    <select class="form-select" id="formRole" required name="userType">
                        <option value="">Selecciona tu rol de usuario</option>
                        <option value="Comprador"
                            <?php if(isset($_GET['p_userType'])){if($_GET['p_userType'] == "Comprador"){echo("selected");}}?>
                        >Comprador</option>
                        <option value="Vendedor"
                            <?php if(isset($_GET['p_userType'])){if($_GET['p_userType'] == "Vendedor"){echo("selected");}}?>
                        >Vendedor</option>
                    </select>
                </div>               
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label class="form-label">Contraseña</label>
                    <input class="form-control" type="password" id="formPassword" maxlength="50" placeholder="Crea una contraseña..." required name="password"
                        value="<?php if(isset($_GET['p_password'])){echo($_GET['p_password']);}?>"
                    >
                </div>

                <div class="col-md form-group">
                    <label class="form-label">Confirmar contraseña</label>
                    <input class="form-control" type="password" id="formPasswordConfirm" maxlength="50" placeholder="Confirma la contraseña..." required name="passwordConfirmation"
                        value="<?php if(isset($_GET['p_passwordConfirmation'])){echo($_GET['p_passwordConfirmation']);}?>"
                    >
                </div>
            </div>

            <div class="row mt-5">
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-warning" onclick="validateInfo()" type="submit" name="submitButton">Enviar</button>
                    <!--onclick="validateInfo()"-->
                </div>
            </div>
        </form>
    </div>
    
    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>