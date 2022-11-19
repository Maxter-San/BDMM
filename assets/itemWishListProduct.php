<div class="col-xl-3">
    <div class="card cardSectionBar">
        <?php 
            if(!isset($_GET['clientId'])){
        ?>
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $productId;?>"></button>
                </div>
        <?php 
            }
        ?>

        <img src=<?php echo $productImg; ?> class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $productName; ?></h5>
            <p class="card-text">$ <?php echo $productPrice; ?></p>
            
            <a class="btn btn-warning" onclick="myFunction()">Agregar al carrito</a>
            <!--<?php echo $productId; ?> -->     
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop<?php echo $listWishId;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Confirmación</h5>
            </div>
            <div class="modal-body">
              ¿Seguro qué quiéres borrar este producto de tu lista?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                    <input class="form-control" id="formCategoryName" placeholder="ID" name="name" hidden value="<?php echo $categoryName;?>">
                    <input class="form-control" id="formListWishId" placeholder="ID" name="listWishId" hidden value="<?php echo $listWishId;?>">
                    <button type="submit" name="submitButtonDeleteProductWishList" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>