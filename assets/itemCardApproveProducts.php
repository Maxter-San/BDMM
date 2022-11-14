<div class="card mb-3" id="list<?php echo $productId;?>">
    <div class="row g-0">
        <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $productId;?>"></button>
        </div>

        <div class="col-md-2">
            <div id="carouselExampleDark<?php echo $productId?>" class="carousel slide carousel-dark" data-bs-ride="true">

                <div class="carousel-indicators">
                    <?php 
                         $api = new productApi();
                         $images = $api->selectProductImages($productId);

                         for($j = 0;$j < count($images);$j++){
                            if($j == 0){
                                echo '<button type="button" data-bs-target="#carouselExampleDark'.$productId.'" data-bs-slide-to="'.$j.'" class="active" aria-current="true" aria-label="Slide '.($j + 1).'"></button>';
                            }
                            else{
                                echo '<button type="button" data-bs-target="#carouselExampleDark'.$productId.'" data-bs-slide-to="'.$j.'" aria-label="Slide '.($j + 1).'"></button>';
                            }
                         }
                    ?>
                </div>
                
                <div class="carousel-inner">
                    <?php 
                         $api = new productApi();
                         $images = $api->selectProductImages($productId);

                         for($j = 0;$j < count($images);$j++){
                            if($j == 0){
                                echo '<div class="carousel-item active">
                                      <img src="data:image;base64,'.base64_encode($images[$j]['photo']).'" class="d-block w-100" alt="...">
                                      </div>';
                            }
                            else{
                                echo '<div class="carousel-item">
                                      <img src="data:image;base64,'.base64_encode($images[$j]['photo']).'" class="d-block w-100" alt="...">
                                      </div>';
                            }
                         }

                    ?>
                </div>


                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark<?php echo $productId?>" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark<?php echo $productId?>" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>

        <div class="col-md-10">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                    <h5 class="card-title">Producto</h5>
                    <p class="card-text"><?php echo $productName; ?></p>
                    </div>

                    <div class="col">
                    <h5 class="card-title">Vendedor</h5>
                    <p class="card-text"><?php echo $productSeller; ?></p>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                    <h5 class="card-title">Precio</h5>
                    <p class="card-text">$ <?php echo $productPrice; ?></p>
                    </div>

                    <div class="col">
                        <h5 class="card-title">Categorías</h5>
                        <p class="card-text">
                            <ul>
                            <?php 
                                $api = new productApi();
                                $categories = $api->selectCategoriesByProductId($productId);

                                for($j = 0;$j < count($categories);$j++){
                                            echo '<li>'.$categories[$j]['name'].'</li>';
                                }
                            ?>
                            </ul>
                        </p>
                    </div>
                </div>

                <br>
                <h5 class="card-title">Descripción</h5>
                <p class="card-text"><?php echo $productDescription; ?></p>
                <p class="card-text" style="text-align: justify;"><small class="text-muted">Productos: <?php echo $productStock; ?></small></p>
                
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                    <input value="<?php echo $productId?>" name="productId" hidden>
                    <button type="submit" class="btn btn-success" name="submitAprove">Aprobar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop<?php echo $productId;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Confirmación</h5>
            </div>
            <div class="modal-body">
              ¿Seguro qué quiéres borrar esta solicitud de producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                    <input class="form-control" id="formProductId" placeholder="ID" name="productId" hidden value="<?php echo $productId;?>">

                    <button type="submit" name="submitReject" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>