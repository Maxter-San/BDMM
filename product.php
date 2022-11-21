<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    
    <script src='./scripts/starSistem.js'></script>

    <link rel='stylesheet' type='text/css' media='screen' href='./style/toast.css'>
    <script src='./scripts/toast.js'></script>
    <script src='./scripts/product.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel='stylesheet' type='text/css' media='screen' href='./style/product.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='./style/sectionBarImage.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./style/sectionBar.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='./style/tabGallery.css'>
    
</head>
<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;" onload="<?php if(isset($_GET['successful'])  || isset($_GET['failed'])){echo 'myFunction();';}?>">
    <?php
        include_once('apis/searchApi.php');
        include_once('apis/productApi.php');
        include_once('apis/wishListApi.php');
        session_start();
        include_once('apis/shoppingCartApi.php');
        $productApi = new productApi();
        $product = $productApi->selectProductsById();

        $shoppingCartApi = new shoppingCartApi();
        $reviews = null;
        $totalStars = 0;
        $totalReviews = 0;
        if(isset($product)){
            if($product != null){
                $reviews = $shoppingCartApi->selectCommentsByProductId($product[0]['productId']);

                $totalReviews = count($reviews);
                
                for ($i=0; $i < $totalReviews; $i++){
                    $totalStars += $reviews[$i]['valoration'];
                }
            }
        }

        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5 compact">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col">
                        <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <?php
                                        include_once('assets/tabGallery.php');
                                    ?>
                                </div>
                                <?php
                                    if(isset($product)){
                                        if($product != null){
                                            $productVideos = $productApi->selectProductVideos($product[0]['productId']);
                                            for($i = 0;$i < count($productVideos);$i++){
                                                echo '<div class="carousel-item text-center">
                                                        <video class="col-xl-11" controls>
                                                            <source src="resourses/videos/'.$productVideos[$i]['video'].'" type="video/mp4">
                                                        </video>
                                                      </div>';
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr>
                    <div class="col">
                        <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="false">
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="col-1"></div>

            <div class="col menuContainer" id="menuContainer">
                <h3 class="name"><?php if(isset($product)){ if($product != null){ echo $product[0]['name'];}}?></h3>

                <script>setStars(<?php echo $totalReviews * 5; ?>, <?php echo $totalStars; ?>, 'menuContainer');</script>

                <br><br>

                <h3 class="price">$ <?php if(isset($product)){ if($product != null){echo number_format($product[0]['price'], 2, '.', ' ');}}?></h3>

                <br>

                <div class="row">
                    <div class="col-3">
                        <h4 class="existence">Categoría:</h4>
                    </div>
                    <div class="col">
                        <h4 class="existence">
                            <?php
                                if(isset($product)){
                                    if($product != null){
                                        $categories = $productApi->selectCategoriesByProductId($product[0]['productId']);
                                        $arrayCategories = array();
                                        for($j = 0;$j < count($categories);$j++){
                                                echo '<span class="badge rounded-pill text-bg-warning">'.$categories[$j]['categoryName'].'</span>';
                                                $arrayCategories[] = $categories[$j]['categoryId'];
                                        }
                                    }
                                }
                            ?>
                        </h4>
                    </div>
                </div>

                <br>

                <h4 class="existence">En existencia: <?php if(isset($product)){ if($product != null){ echo $product[0]['quantity'];}}?></h4>

                <br>

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                <input type="number" name="productId" id="formProductId" value="<?php if(isset($product)){ if($product != null){ echo $product[0]['productId'];}}?>" hidden>
                    <div class="input-group">
                        <input type="number" class="form-control" name="quantity" placeholder="0" value="0" id="formQuantity" min="0" max="<?php if(isset($product)){ if($product != null){ echo $product[0]['quantity'];}}else{echo '0';}?>" readonly>
                        <button class="btn btn-outline-warning" onclick="quantityMin();" id="btnMin" type="button">-</button>
                        <button class="btn btn-outline-success" onclick="quantityPlus(<?php if(isset($product)){ if($product != null){ echo $product[0]['quantity'];}}else{echo '0';}?>);" id="btnPlus" type="button">+</button>
                    </div>

                    <br>

                    <?php
                        if(isset($product)){
                            if($product != null){

                                $_GET['userType'] = '0';
                                if(isset($_SESSION["s_userType"])){
                                    if($_SESSION["s_userType"] != null){
                                        $_GET['userType'] = $_SESSION["s_userType"];

                                        if($_SESSION["s_userType"] == 'Comprador'){
                                            $productApi->insertViewProduct($product[0]['productId']);
                                        }
                                    }
                                }

                                $_GET['buyQuotation'] = 'Vender';
                                $_GET['buyQuotation'] = $product[0]['method'];
                                    
                                include_once('assets/productSettings.php');
                            }
                        }
                    ?>
                </form>

                <br>
            </div>

        </div>

        <br>

        <hr>

        <br>

        <div class="row">

            <div class="col-md">
                <h3 class="existence">Descripción</h3>
                <h3 class="price"><?php if(isset($product)){ if($product != null){ echo $product[0]['description'];}}?></h3>
            </div>

            <div class="col-md-5">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h4 class="existence">Comentarios</h4>
                            </button>
                        </h4>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <?php
                                include_once('assets/productReviews.php');
                            ?>
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
                <h2>Más productos del vendedor</h2>
                <?php
                    $var = new productApi();
                    $method = 'profileSeller';
                    $sellerId = 0;
                    if(isset($product)){ 
                        if($product != null){
                            $sellerId = $product[0]['sellerId'];
                        }
                    }
                    
                    include('assets/sectionBar.php');
                ?>

                <h2>Productos similares</h2>
                <?php
                    if(isset($product)){ 
                        if($product != null){
                            $method = 'custom';
                            $var = new searchApi();
                            $rows = $var->selectProductsInArrayByCategory($arrayCategories);
                            include('assets/sectionBar.php');
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <?php 
        if(isset($_GET['successful'])){
            if($_GET['successful'] == 'AddList'){
                echo '<div id="snackbar">Producto agregado a la lista</div>';
            }else if($_GET['successful'] == 'AddCart'){
                echo '<div id="snackbar">Producto agregado al carrito</div>';
            }else if($_GET['successful'] == 'AddCuotation'){
                echo '<div id="snackbar">Solicitud de cotización enviada</div>';
            }
        }else if(isset($_GET['failed'])){
            if($_GET['failed'] == 'AddList'){
                echo '<div id="snackbar">Este producto ya está en esta lista</div>';
            }
            else if($_GET['failed'] == 'AddCart'){
                echo '<div id="snackbar">Este producto ya está en el carrito</div>';
            }
            else if($_GET['failed'] == 'quantity'){
                echo '<div id="snackbar">Tienes que agregar al menos un producto</div>';
            }
        }
    ?>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>