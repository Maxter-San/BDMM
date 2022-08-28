<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    
    <script src='scripts/main.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500&display=swap" rel="stylesheet">
    
    <link rel='stylesheet' type='text/css' media='screen' href='./style/index.css'>
</head>
<body>                  <!-- LANDING PAGE -->
    <header class="hero">
        <div class="textos-hero">
            <h1>Bienvenidos a Maxter shop</h1>
            <p>Se parte de la comunidad</p>
            <a href="#contacto" class="btn btn-primary" role="button" data-bs-toggle="button">Registrarme</a>
        </div>

        <div class="svg-hero" style="height: 150px; overflow: hidden;" >
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg>
        </div>
    </header>
    
    <div class="container-fluid container">

        <div class="contenedor last-section">
            <div class="contenedor-textos-main">
                <h2 class="titulo left">Comunidad</h2>
                <p class="parrafo">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam sed rerum quam possimus odio quibusdam, repellendus mollitia error cupiditate ratione, maiores voluptatibus cum vitae adipisci. Aut aperiam odio porro sint?</p>
                <a href="#" class="btn btn-primary cta" role="button" data-bs-toggle="button">Registrarme</a>
            </div>
            <img src="./resourses/comunidad.jpg" alt="comunidad">
        </div>
    </div>

    <section class="info">
        <div class="contenedor container-fluid container">
            <h2 class="titulo left">Compra venta</h2>
            <p class="parrafo">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </section>

    <div class="container-fluid container">
        <section class="cards contenedor">
            <h2 class="titulo">Usuarios</h2>
            <div class="content-cards">
                <article class="card">
                    <i class="bi bi-person-badge"></i>
                    <h3>Comprador</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam provident doloribus ipsa vitae, tenetur esse? Quisquam nisi libero, repellendus atque hic dolorem quaerat sequi quo a modi aut aperiam veniam!</p>
                    <a href="#" class="btn btn-warning cta" role="button" data-bs-toggle="button">Registrarme</a>
                </article>

                <article class="card">
                    <i class="bi bi-shop"></i>
                    <h3>Vendedor</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam provident doloribus ipsa vitae, tenetur esse? Quisquam nisi libero, repellendus atque hic dolorem quaerat sequi quo a modi aut aperiam veniam!</p>
                    <a href="#" class="btn btn-warning cta" role="button" data-bs-toggle="button">Registrarme</a>
                </article>
                
                <article class="card">
                    <i class="bi bi-tools"></i>
                    <h3>Vendedor</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam provident doloribus ipsa vitae, tenetur esse? Quisquam nisi libero, repellendus atque hic dolorem quaerat sequi quo a modi aut aperiam veniam!</p>
                </article>
            </div>
        </section>

        <section id="contacto"></section>

        </div>

    <section class="info-last">
        <div class="contenedor last-section container-fluid container">
            <div class="contenedor-textos-main">
                <h2 class="titulo left">Información</h2>
                <p class="parrafo">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam sed rerum quam possimus odio quibusdam, repellendus mollitia error cupiditate ratione, maiores voluptatibus cum vitae adipisci. Aut aperiam odio porro sint?</p>
                <a href="#" class="btn btn-primary cta" role="button" data-bs-toggle="button">Registrarme</a>
            </div>
            <img src="./resourses/comunidad.jpg" alt="comunidad">
        </div>

        <div class="svg-wave" style="height: 150px; overflow: hidden;" >
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgb(33, 37, 41);"></path>
            </svg>
        </div>
    </section>
    

<?php
        include_once('assets/footer.php');
    ?>

</body>
</html>