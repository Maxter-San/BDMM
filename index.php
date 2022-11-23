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

<body class="d-flex flex-column min-vh-100">                  <!-- LANDING PAGE -->
    <header class="hero">
        <div class="textos-hero">
            <h1>Bienvenidos a Maxter shop</h1>
            <p>Se parte de la comunidad</p>
            <a href="#hrefComunidad" class="btn btn-warning" role="button">Conoce más</a>
            <a href="#hrefCompras" class="link-dark">Saltar introducción</a>
        </div>

        <div class="svg-hero" style="height: 150px; overflow: hidden;" >
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg>
        </div>
    </header>
    
    <div class="container-fluid container">
        <div class="contenedor last-section" id="hrefComunidad">
            <div class="contenedor-textos-main">
                <h2 class="titulo left">Comunidad</h2>
                <p class="parrafo">Entra a la comunidad menos peor entre las comunidades toxicas de tiendas. Inscribirse es gratis. Damos clases los jueves, no cobramos mucho.</p>
                <a href="#hrefInfo" class="btn btn-warning cta" role="button">Siguiente</a>
            </div>
            <img src="./resourses/comunidad.jpg" alt="comunidad">
        </div>
    </div>

    <section class="info" id="hrefInfo">
        <div class="contenedor container-fluid container">
            <h2 class="titulo left">Información</h2>
            <p class="parrafo">Encuentra los mejores productos para gastar tu dinero con los mejores descuentos que puedas imaginar, no solo puedes ser cliente, para los que buscan otras opciones también puedes ser el mejor vendedor de la comunidad o contactarte con el administrador para tener una cuenta exclusiva de administrador.</p>
            <a href="#hrefUsuarios" class="btn btn-outline-light cta" role="button">Aceptar</a>
        </div>
    </section>

    <div class="container-fluid container">
        <section class="cards contenedor" id="hrefUsuarios">
            <h2 class="titulo">Usuarios</h2>
            <div class="content-cards">
                <article class="card">
                    <i class="bi bi-person-badge"></i>
                    <h3>Comprador</h3>
                    <p>Selecciona los mejores artículos entre la gran variedad de productos que manejamos y compra los que más te gusten, puedes tener diferentes métodos de pago para hacer más accesible tus pagos.</p>
                    <a href="#hrefComprador" class="btn btn-warning cta" role="button">Me interesa</a>
                </article>

                <article class="card">
                    <i class="bi bi-shop"></i>
                    <h3>Vendedor</h3>
                    <p>Vende tus artículos ya sea en precio fijo o cotízalos dependiendo de la cantidad que te soliciten, los productos previamente subidos tendrán que ser aprobados por un administrador para tener un control de calidad.</p>
                    <a href="#hrefvendedor" class="btn btn-warning cta" role="button">Me interesa</a>
                </article>
                
                <article class="card">
                    <i class="bi bi-tools"></i>
                    <h3>Administrador</h3>
                    <p>Contacta al super administrador por correo para solicitar una cuenta verificada como administrador para ayudar a gestionar los productos y crear nuevas categorías.</p>
                </article>
            </div>
        </section>

        <div class="contenedor last-section" id="hrefComprador">
            <div class="contenedor-textos-main">
                <h2 class="titulo left">Compradores</h2>
                <p class="parrafo">Los compradores pueden calificar los productos que han comprado y dar un comentario al respecto del producto.</p>
                <a href="#hrefCompras" class="btn btn-warning cta" role="button">Registrarme</a>
            </div>
            <img src="./resourses/comprador.jpg" alt="comunidad">
        </div>

        <div class="contenedor last-section" id="hrefvendedor">
            <div class="contenedor-textos-main">
                <h2 class="titulo left">Vendedores</h2>
                <p class="parrafo">Los vendedores no están autorizados para comprar pero siempre pueden crear una nueva cuenta con el mismo correo para ser compradores.</p>
                <a href="#hrefCompras" class="btn btn-warning cta" role="button">Registrarme</a>
            </div>
            <img src="./resourses/ventas.jpg" alt="comunidad">
        </div>

        <div class="contenedor last-section" id="hrefCompras">
            <div class="contenedor-textos-main">
                <h2 class="titulo left">Comienza a comprar en linea</h2>
                <p class="parrafo">Crea una cuenta y comienza a ser parte de esta comunidad o inicia sesión en caso de ya ser parte de esta familia.</p>
                
                <a href="./signUp.php" class="btn btn-warning cta me-5" role="button">Registrarme</a>
                <a href="./logIn.php" class="btn btn-outline-warning cta me-5" role="button">Iniciar sesión</a>
                <a href="./main.php" class="btn btn-outline-warning cta" role="button">Omitir</a>
            </div>
            <img src="./resourses/compras.jpg" alt="compras">
        </div>
    </div>

    <div class="svg-wave" style="height: 150px; overflow: hidden;" >
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgb(33, 37, 41);"></path>
        </svg>
    </div> 

<?php
        include_once('assets/footer.php');
    ?>

</body>
</html>