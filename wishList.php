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
<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;">
    <header>
        
    </header>

    <?php
        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
        <div class="row">           
            <div class="col-md">
                <h3>Listas de deseo:</h3>
            </div>
        </div>

        <div class="row">
            <?php
                $wishListName = 'Lista 01';
                $wishListDescription = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi voluptatum soluta voluptatibus molestias illum ea eaque quidem, quis at quisquam dolor nobis, rem facere illo ullam ab, nemo pariatur sint.';
                $wishListNumProducts = '5';
                include('assets/itemwishListHorizontal.php');
            ?>

            <?php
                $wishListName = 'Lista 02';
                $wishListDescription = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi voluptatum soluta voluptatibus molestias illum ea eaque quidem, quis at quisquam dolor nobis, rem facere illo ullam ab, nemo pariatur sint.';
                $wishListNumProducts = '10';
                include('assets/itemwishListHorizontal.php');
            ?>
        </div> 

    </div>

    <div id="snackbar">Producto agregado al carrito</div>  

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>