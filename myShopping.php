<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='./style/myShopping.css'>
    <script src='./scripts/main.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
</head>

<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;">
    <?php
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
                $shoppingCardId = "1";
                $shoppingCardDate = date("d") . "/" . date("m") . "/" . date("Y");

                include('assets/shoppingCardsClient.php');
            ?>

            <?php 
                $shoppingCardId = "2";
                $shoppingCardDate = date("d") . "/" . date("m") . "/" . date("Y");

                include('assets/shoppingCardsClient.php');
            ?>
            
        </div> 

    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Valorar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Valora el producto
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-secondary" type="button"><i class="bi bi-star" id="btn1" onmouseover="handleHover(this);"></i></button>
                        <button class="btn btn-outline-secondary" type="button"><i class="bi bi-star" id="btn2" onmouseover="handleHover(this);"></i></button>
                        <button class="btn btn-outline-secondary" type="button"><i class="bi bi-star" id="btn3" onmouseover="handleHover(this);"></i></button>
                        <button class="btn btn-outline-secondary" type="button"><i class="bi bi-star" id="btn4" onmouseover="handleHover(this);"></i></button>
                        <button class="btn btn-outline-secondary" type="button"><i class="bi bi-star" id="btn5" onmouseover="handleHover(this);"></i></button>
                    </div>
                    <div class="col-md form-group">
                    <div class="col-md form-group">
                        <label class="form-label">Reseña</label>
                        <input class="form-control" id="formDescription" placeholder="Tu reseña respecto al producto.">
                    </div>
                </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        function handleHover(btn) {
            let hBtn1 = document.getElementById('btn1');
            let hBtn2 = document.getElementById('btn2');
            let hBtn3 = document.getElementById('btn3');
            let hBtn4 = document.getElementById('btn4');
            let hBtn5 = document.getElementById('btn5');

            if(btn == hBtn1){
                hBtn1.className = "bi bi-star-fill";
            }
            if(btn == hBtn2){
                hBtn1.className = "bi bi-star-fill";
                hBtn2.className = "bi bi-star-fill";
            }
            if(btn == hBtn3){
                hBtn1.className = "bi bi-star-fill";
                hBtn2.className = "bi bi-star-fill";
                hBtn3.className = "bi bi-star-fill";
            }
            if(btn == hBtn4){
                hBtn1.className = "bi bi-star-fill";
                hBtn2.className = "bi bi-star-fill";
                hBtn3.className = "bi bi-star-fill";
                hBtn4.className = "bi bi-star-fill";
            }
            if(btn == hBtn5){
                hBtn1.className = "bi bi-star-fill";
                hBtn2.className = "bi bi-star-fill";
                hBtn3.className = "bi bi-star-fill";
                hBtn4.className = "bi bi-star-fill";
                hBtn5.className = "bi bi-star-fill";
            }

        }

    </script>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>