<div class="card mb-3" id="list<?php echo $productId;?>">
    <div class="row g-0">
        <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $productId;?>"></button>
        </div>

        <div class="col-md-2">
            <img src="<?php echo $productImg; ?>" class="img-fluid rounded-start" alt="...">
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
                        <h5 class="card-title">Categoría</h5>
                        <p class="card-text"><?php echo $productCategory; ?></p>
                    </div>
                </div>

                <br>
                <h5 class="card-title">Descripción</h5>
                <p class="card-text"><?php echo $productDescription; ?></p>
                <p class="card-text" style="text-align: justify;"><small class="text-muted">Productos: <?php echo $productStock; ?></small></p>

                <a class="btn btn-success" onclick="myFunction();">Aprobar</a>
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
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $productId;?>">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal<?php echo $productId;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¡Solicitud de producto borrada con exito!</h5>
            </div>
            <div class="modal-body">
                Has borrado la solicitud del producto <?php echo $productName; ?> del vendedor <?php echo $productSeller ?>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" type="button" data-bs-dismiss="modal">Aceptar</a>
            </div>
        </div>
    </div>
</div>