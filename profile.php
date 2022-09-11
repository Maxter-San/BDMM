<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <script src='./scripts/main.js'></script>
    <script src='./scripts/starSistem.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel='stylesheet' type='text/css' media='screen' href='./style/profile.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./style/sectionBarVariant.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./style/sectionListWishCard.css'>
    
</head>
<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;">
    <?php
        include_once('assets/header.php');
    ?>

    <header class="hero">
        <img src="./resourses/carousel01.jpg" alt="profile image" class="card_header-profile" />
    </header>


    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-body">
              <h3 class="card-title">Nombre de usuario</h3>
              <p class="card-text">Descripción</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="row">
                    <div class="col">
                        <h4 class="userData">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                            Ubicación
                        </h4>
                    </div>
                    
                    <div class="col">
                        <h4 class="userData">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                        Comprador
                        </h4>
                    </div>

                    <div class="col">
                        <h4 class="userData">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            Se unió el: <?php echo date("d"), "/", date("m"), "/", date("Y");?>
                            </h4>
                    </div>
                </div>
              </li>
            </ul>
            <div class="card-body">
                <h4>Mis listas:</h4>
                <?php
                    include('assets/sectionListWishBar.php');
                ?>

                <hr>
                <h4>Mis compras:</h4>
                <?php
                    include('assets/sectionBarVariant.php');
                ?>
            </div>
        </div>

    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>