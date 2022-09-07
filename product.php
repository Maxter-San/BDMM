<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    
    <script src='./scripts/starSistem.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel='stylesheet' type='text/css' media='screen' href='./style/product.css'>
    
</head>
<body class="d-flex flex-column min-vh-100">
    <?php
        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5 compact">
        <div class="row">

            <div class="col-md">
                <?php
                    include_once('assets/tabGallery.php');
                ?>
            </div>

            <div class="col-md-5 menuContainer" id="menuContainer">
                <h2 class="name">Nombre</h2>

                <br>

                <script>setStars(100, 70, 'menuContainer');</script>

                <h2 class="price">$ 123</h2>

                <br>

                <h3 class="existence">Categoría: <span class="badge rounded-pill text-bg-warning">algo</span></h3>
    
                <br>

                <h3 class="existence">En existencia: 1</h3>

                <br>

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="1" readonly>
                    <button class="btn btn-outline-warning" type="button">-</button>
                    <button class="btn btn-outline-success" type="button">+</button>
                </div>

                <br>

                <div class="d-grid gap-2">
                    <button class="btn btn-success" type="button">Agregar al carrito</button>
                </div>

                <br>

                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Descripción
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem a facere, possimus blanditiis pariatur debitis quaerat sequi voluptatum exercitationem deserunt fuga ratione porro consectetur odio officiis praesentium commodi dolore labore.
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <br>

        <hr>

        <br>

        <div class="row">
                
            <div class="col-md">
                <h2>Comentarios</h2>

                <?php
                    $commentID = '1';
                    $commentUserName = 'usuario123';
                    $commentScore = '3.5';
                    $commentDescription = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis cum obcaecati in reiciendis ea alias fuga, officiis harum nobis illum voluptate aliquam repellendus nostrum a aperiam perspiciatis, distinctio quasi cupiditate.';
                    include('assets/comments.php');
                ?>

                <?php
                    $commentID = '2';
                    $commentUserName = 'Maxter';
                    $commentScore = '5';
                    $commentDescription = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis cum obcaecati in reiciendis ea alias fuga, officiis harum nobis illum voluptate aliquam repellendus nostrum a aperiam perspiciatis, distinctio quasi cupiditate.';
                    include('assets/comments.php');
                ?>

                <?php
                    $commentID = '3';
                    $commentUserName = 'ejemplo';
                    $commentScore = '0';
                    $commentDescription = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis cum obcaecati in reiciendis ea alias fuga, officiis harum nobis illum voluptate aliquam repellendus nostrum a aperiam perspiciatis, distinctio quasi cupiditate.';
                    include('assets/comments.php');
                ?>

            </div>

            <div class="col-md-5">
                
            </div>

        </div>

        <div class="row">
            <div class="col-md">
                
            </div>
        </div>
    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>