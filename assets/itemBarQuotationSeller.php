<div class="card mb-3" id="list<?php echo $cuotationId;?>">

    <div class="row g-0">
        <div class="col-md-2">
            <img src="<?php echo $productPhoto; ?>" class="img-fluid rounded-start" alt="...">
        </div>
        
        <div class="col-md-10">
            <div class="card-body">
                <h5 class="card-title"><?php echo $productName ?></h5>
                <p class="card-text">El cliente <?php echo $clientUserName ?> a solicitado una cotización de este producto</p>
                <p class="card-text"><small class="text-muted">Cantidad: <?php echo $quantity; ?></small></p>
           
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $cuotationId; ?>">Rechazar</button>
                    </div>

                    <div class="col">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmationModal<?php echo $cuotationId; ?>">Aceptar</button>
                    </div>
                    <!-- <?php echo $cuotationId; ?> -->
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop<?php echo $cuotationId; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Confirmación de rechazo de solicitud</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                <input class="form-control" id="formCuotationId" placeholder="ID" name="cuotationId" hidden value="<?php echo $cuotationId;?>">
                <div class="modal-body">
                    ¿Seguro que quieres rechazar la cotización de <?php echo $productName;?>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-success" type="submit" name="submitButtonRejectCuotation">Aceptar</button>
                </div>

        </div>
    </div>
</div>

<div class="modal fade" id="confirmationModal<?php echo $cuotationId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¡Has aceptado una solicitud de cotización!<h5>
            </div>

            <form  method="POST" action="#" onsubmit="myFunction();" id="myForm<?php echo $cuotationId;?>">
                <input class="form-control" id="formCuotationId" placeholder="ID" name="cuotationId" hidden value="<?php echo $cuotationId;?>">
                <div class="modal-body">
                    Ingresa el precio unitario del producto a cotizar 
                    <div class="row">
                        <div class="col">
                            <div class="col-md form-group">
                                <label class="form-label">Cotización:</label>
                                <input type="number" class="form-control" name="price" id="productPriceQuotation<?php echo $cuotationId;?>" placeholder="$ 0.00" onkeypress="floatingNum(<?php echo $cuotationId;?>);" onkeyup="multiplyQuantityProducts(<?php echo $cuotationId;?>);" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="col">
                                <div class="col-md form-group">
                                    <label class="form-label">Cantidad solicitada:</label>
                                    <input type="number" class="form-control" id="productCuantityQuotation<?php echo $cuotationId;?>" value="<?php echo $quantity?>" placeholder="$ 0.00" readonly>
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
                                    <input class="form-control" id="totalPriceQuotation<?php echo $cuotationId;?>" placeholder="$ 0.00" readonly>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-success" type="submit" name="submitButtonAceptCuotation" onclick="validateCuotation(<?php echo $cuotationId;?>);">Cotizar</button>
                </div>
                
            </form>
        </div>
    </div>
</div>