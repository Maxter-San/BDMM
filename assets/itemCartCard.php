<div class="col-xl-3">
    <div class="card cardSectionBar">
        <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $productId;?>"></button>
        </div>

        <img src=<?php echo $productImg; ?> class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $productName; ?></h5>
            <p class="card-text">$ <?php echo $productPrice; ?></p>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="<?php echo $productQuantity; ?>" readonly>
                <button class="btn btn-outline-warning" type="button">-</button>
                <button class="btn btn-outline-success" type="button">+</button>
            </div>
            <br>
            <!--<?php echo $productId; ?> -->
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
              ¿Seguro qué quiéres borrar este producto del carrito?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $productId;?>">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal<?php echo $productId;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¡Producto borrado con exito!</h5>
            </div>
            <div class="modal-body">
                Has borrado el producto <?php echo $productName; ?> del carrito
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" type="button" data-bs-dismiss="modal">Aceptar</a>
            </div>
        </div>
    </div>
</div>