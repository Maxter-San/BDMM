<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    
    <script src='./scripts/main.js'></script>

    <script src='./scripts/toast.js'></script>
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel='stylesheet' type='text/css' media='screen' href='./style/wishList.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='./style/sectionBar.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='./style/toast.css'>

</head>
<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;" onload="<?php if(isset($_GET['successful'])){echo 'myFunction();';}?>">
    <header>
        
    </header>

    <?php
        session_start();
        include_once('apis/wishListApi.php');
        $wishListApi = new addWishListApi();

        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
        <div class="row">           
            <div class="col-md">
            <div class="row">
                <div class="col">
                    <legend>Listas de deseo:</legend>
                </div>

                <?php 
                    if($wishListApi->getClientId() != null && !isset($_GET['clientId'])){
                ?>
                    <div class="col-2 text-end">
                        <a type="button" class="btn btn-success" href="./addWishList.php">Nueva lista de deseos</a>
                    </div>
                <?php 
                    }
                ?>
            </div>    
           
            </div>
        </div>

        <div class="row">
            <?php 
                include_once("assets/sectionWishListHorizontal.php");
            ?>
        </div> 

    </div>

    <?php 
        if(isset($_GET['successful'])){
            if($_GET['successful'] == 'add'){
                echo '<div id="snackbar">Producto agregado al carrito</div>';
            }
            else if($_GET['successful'] == 'delete'){
                echo '<div id="snackbar">Producto borrado de la lista</div>';
            }
        }
    ?>
    

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>