<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='./style/myShopping.css'>
    <script src='./scripts/main.js'></script>
    <script src='./scripts/myShopping.js'></script>

    <link rel='stylesheet' type='text/css' media='screen' href='./style/toast.css'>
    <script src='./scripts/toast.js'></script>

    <script src='./scripts/starSistem.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
</head>

<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;" onload="<?php if(isset($_GET['successful'])){echo 'myFunction();';}?>">
    <?php
        session_start();
        include_once('apis/shoppingCartApi.php');
        include_once('apis/productApi.php');

        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
        <div class="row">           
            <div class="col-md">
                <legend>Mis compras</legend>
            </div>
        </div>

        <div class="row">
            <?php 
                include_once('assets/filterRecords.php');
            ?>
        </div>

        <br>

        <div class="row">
            <?php 
                include_once('assets/sectionRecordClient.php');
            ?>
        </div> 

    </div>
    
    <?php 
            if(isset($_GET['successful'])){
                if($_GET['successful'] == 'comment'){
        ?>
                    <div id="snackbar">Reseña enviada</div>
    <?php 
                }
            }
    ?>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>