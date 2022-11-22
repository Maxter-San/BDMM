<div class="card mb-3" id="list<?php echo $cuotationId;?>">

    <div class="row g-0">
        <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $cuotationId;?>" <?php if($status == 'Aceptado'){ echo 'disabled';}?>></button>
        </div>
        <div class="col-md-2">
            <img src="<?php echo $productPhoto; ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-10">
            <div class="card-body">
                <h5 class="card-title"><?php echo $productName ?></h5>
                <p class="card-text">Enviaste una solicitud de cotización al vendedor <?php echo $sellerUserName ?></p>
                <p class="card-text"><small class="text-muted">Cantidad: <?php echo $quantity; ?></small></p>
                <?php 
                    if($status == 'En espera'){
                        echo '<h5><span class="badge rounded-pill text-bg-warning">En espera</span></h5>';
                    }else if($status == 'Aceptado'){
                ?>
                        <h5><span class="badge rounded-pill text-bg-success">Aceptado</span></h5>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                            <input class="form-control" id="formquantity" placeholder="ID" name="quantity" hidden value="<?php echo $quantity;?>">
                            <input class="form-control" id="formproductId" placeholder="ID" name="productId" hidden value="<?php echo $productId;?>">
                            <input class="form-control" id="formCuotationId" placeholder="ID" name="cuotationId" hidden value="<?php echo $cuotationId;?>">
                            <button type="submit" name="submitButtonAddCuotationToCart" class="btn btn-success" data-bs-dismiss="modal" data-bs-toggle="modal">Agregar al carrito</button>
                        </form>
                <?php
                    }else if($status == 'Rechazado'){
                        echo '<h5><span class="badge rounded-pill text-bg-danger">Rechazado</span></h5>';
                    }
                ?>
                
                    <!-- <?php echo $cuotationId; ?> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop<?php echo $cuotationId;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Confirmación</h5>
            </div>
            <div class="modal-body">
              ¿Seguro qué quiéres borrar esta solicitud de cotización?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                    <input class="form-control" id="formCuotationId" placeholder="ID" name="cuotationId" hidden value="<?php echo $cuotationId;?>">
                    <button type="submit" name="submitButtonDeleteCuotation" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>