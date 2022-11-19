<div class="col-xl-3">
    <div class="card cardSectionBar">
        <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $cartproductId;?>"></button>
        </div>

        <img src=<?php echo $productImg; ?> class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $productName; ?></h5>
            <div class="row">
                <div class="col">
                    <p class="card-text">$ <?php echo number_format($productPrice, 2, '.', ' '); ?></p>
                </div>
            </div>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                <div class="input-group">
                    <input name="cartProductId" value="<?php echo $cartproductId; ?>" hidden>
                    <input type="number" name="quantity" id="formQuantity<?php echo $cartproductId; ?>" class="form-control" value="<?php echo $productQuantity; ?>" readonly>
                    <button class="btn btn-outline-warning" name="buttonSubmitQuantity" onclick="quantityMin('formQuantity<?php echo $cartproductId; ?>');" type="input">-</button>
                    <button class="btn btn-outline-success" name="buttonSubmitQuantity" onclick="quantityPlus('formQuantity<?php echo $cartproductId; ?>', <?php echo $productStock; ?>);" type="input">+</button>
                </div>
            </form>
            <input name="cartProductId" value="<?php echo $cartproductId; ?>" hidden>
            <?php 
                if($productStock < $productQuantity){
            ?>
                <p class="card-text">Existencia disponible <span class="badge rounded-pill text-bg-danger"><?php echo $productStock; ?></span></p>
            <?php }?>
            <!--<?php echo $cartproductId; ?> -->
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop<?php echo $cartproductId;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Confirmación</h5>
            </div>
            <div class="modal-body">
              ¿Seguro qué quiéres borrar este producto del carrito?
            </div>
            <div class="modal-footer">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                    <input name="cartProductId" value="<?php echo $cartproductId; ?>" hidden>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="submitButtonDeleteProduct" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>