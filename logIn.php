<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='./style/login.css'>
    <script src='./scripts/login.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
</head>
<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;">
    <?php
        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
        
        <div class="card cardLogin" style="width: 20em;">
            <div class="card-body">
                <legend>Inicia sesión</legend>

                <form method="POST" action="./main.php">
                    <div class="mb-3">
                        <label for="formControlUserName" class="form-label">Usuario</label>
                        <input class="form-control" id="formControlUserName" placeholder="Nombre de usuario...">
                    </div>

                    <div class="mb-3">
                        <label for="formControlPassword" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="formControlPassword" placeholder="Tu contraseña...">
                    </div>

                    <div class="mb-3">
                        <label for="formControlTypeUser" class="form-label">Tipo de usuario</label>
                        <select class="form-select" aria-label="Default select example" id="formControlTypeUser">
                            <option selected></option>
                            <option value="1">Comprador</option>
                            <option value="2">Vendedor</option>
                            <option value="3">Administrador</option>
                        </select>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckRememberUser">
                        <label class="form-check-label" for="flexCheckRememberUser">
                            Recordar usuario
                        </label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-outline-warning" onclick="validateInfo();">Iniciar sesión</button>
                    </div>

                </form>
                
                <br>
                <a href="./signUp.php" class="link-secondary">¿No tienes cuenta? Crea un usuario</a>
            </div>
        </div>

    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>