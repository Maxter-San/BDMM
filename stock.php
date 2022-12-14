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
        $var = new productApi();
        $products = $var->selectProductsByCategory();

        include_once('apis/categoryApi.php');
        $var = new categorypApi();
        $rows = $var->getAllCategories();

        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
        <legend>Mis mercancía</legend>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <?php 
                                            include_once('assets/dropDownCategory.php');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-outline-warning" name="submitButtonFillProductsByCategory">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </form>

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