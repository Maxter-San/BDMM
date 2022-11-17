<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='./style/sectionBarVariant.css'>
    <script src='./scripts/main.js'></script>

    <link rel='stylesheet' type='text/css' media='screen' href='./style/toast.css'>
    <script src='./scripts/toast.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
</head>

<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;"  onload="<?php if(isset($_GET['successful'])){echo 'myFunction();';}?>">
    <?php
        session_start();
        include_once('apis/productApi.php');

        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
        <legend>Mis mercancía</legend>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="formControlCategory" class="form-label">Buscar por categoría</label>
                                    <div class="dropdown-center d-grid gap-2" id="formControlCategory">
                                        <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Elige una o más categorías
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-dark">                  
                                            <li><a class="dropdown-item" href="#">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Hogar
                                                    </label>
                                                </div>
                                            </a></li>

                                            <li><a class="dropdown-item" href="#">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Tecnología
                                                    </label>
                                                </div>
                                            </a></li>

                                            <li><a class="dropdown-item" href="#">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Otros
                                                    </label>
                                                </div>
                                            </a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            include_once('assets/sectionBarStock.php');
        ?>

        <?php 
            if(isset($_GET['successful'])){
                if($_GET['successful'] == 'delete'){
        ?>
                    <div id="snackbar">Producto eliminado</div>  
        <?php
                }
            }
        ?>
        
    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>