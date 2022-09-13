<div class="card mb-3" id="list<?php echo $quotationSellerId;?>">

    <div class="row g-0">
        <div class="col-md-2">
            <img src="./resourses/comprador.jpg" class="img-fluid rounded-start" alt="...">
        </div>

        <div class="col-md-10">
            <div class="card-body">
                <h5 class="card-title"><?php echo $quotationSellerProduct ?></h5>
                <p class="card-text">El cliente <?php echo $quotationSellerClient ?> a solicitado una cotización de este producto</p>
                <p class="card-text"><small class="text-muted">Cantidad: <?php echo $quotationSellerQuantity; ?></small></p>
           
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $quotationSellerId; ?>">Rechazar</button>
                    </div>

                    <div class="col">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmationModal<?php echo $quotationSellerId; ?>">Aceptar</button>
                    </div>
                    <!-- <?php echo $quotationSellerId; ?> -->
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop<?php echo $quotationSellerId; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Confirmación de rechazo de solicitud</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Seguro que quieres rechazar la cotización <?php echo "producto"?>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $quotationSellerId; ?>">Aceptar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal<?php echo $quotationSellerId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¡Has rechazado una solicitud de cotización!...</h5>
            </div>
            <div class="modal-body">
                Se rechazó con exito la solicitud de cotización del cliente <?php echo $quotationSellerClient?>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" type="button" data-bs-dismiss="modal">Aceptar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmationModal<?php echo $quotationSellerId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¡Has aceptado una solicitud de cotización!<h5>
            </div>

            <form  method="POST" action="#" onsubmit="myFunction();" id="myForm<?php echo $quotationSellerId;?>">
                <div class="modal-body">
                    Ingresa el precio unitario del producto a cotizar 
                    <div class="row">
                        <div class="col">
                            <div class="col-md form-group">
                                <label class="form-label">Cotización:</label>
                                <input type="number" class="form-control" id="productPriceQuotation<?php echo $quotationSellerId;?>" placeholder="$ 0.00" onkeypress="floatingNum(<?php echo $quotationSellerId;?>);" onkeyup="multiplyQuantityProducts(<?php echo $quotationSellerId;?>);" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="col">
                                <div class="col-md form-group">
                                    <label class="form-label">Cantidad solicitada:</label>
                                    <input type="number" class="form-control" id="productCuantityQuotation<?php echo $quotationSellerId;?>" value="<?php echo $quotationSellerQuantity?>" placeholder="$ 0.00" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            
                        </div>

                        <div class="col">
                            <div class="col">
                                <div class="col-md form-group">
                                    <label class="form-label">Precio total:</label>
                                    <input class="form-control" id="totalPriceQuotation<?php echo $quotationSellerId;?>" placeholder="$ 0.00" readonly>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a class="btn btn-success" type="submit" data-bs-dismiss="modal">Cotizar</a>
                </div>
                
            </form>
        </div>
    </div>
</div>