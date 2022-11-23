<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='./scripts/main.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel='stylesheet' type='text/css' media='screen' href='./style/main.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='./style/sectionBar.css'>

</head>
<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;">
    <?php
        session_start();
        include_once('apis/productApi.php');
        $var = new productApi();
        include_once('assets/header.php');
    ?>

    <div id="carouselExampleDark" class="carousel slide carousel-dark slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./resourses/carousel01.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./resourses/carousel02.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./resourses/carousel03.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-5 mb-5">
    
    <?php
        if($_SESSION["s_userType"] == 'Comprador'){
            echo '<h2>Tus últimos productos vistos</h2>';
            $method = 'filterProductsByLastViewed';
            include('assets/sectionBar.php');
        }
    ?>

    <h2>Productos populares</h2>
    <?php
        $method = 'filterProductsByViews';
        include('assets/sectionBar.php');
    ?>

    <h2>Más comprados</h2>
    <?php
        $method = 'filterProductsByBuying';
        include('assets/sectionBar.php');
    ?>

    <h2>Más recomendados</h2>
    <?php
        $method = 'searchResultProductsByValorationDesc';
        include('assets/sectionBar.php');
    ?>

    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>