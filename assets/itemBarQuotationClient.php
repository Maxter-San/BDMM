<div class="card mb-3" id="list<?php echo $quotationClientId;?>">

    <div class="row g-0">
        <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $quotationClientId;?>"></button>
        </div>
        <div class="col-md-2">
            <img src="./resourses/comprador.jpg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-10">
            <div class="card-body">
                <h5 class="card-title"><?php echo $quotationClientProduct ?></h5>
                <p class="card-text">Enviaste una solicitud de cotización al vendedor <?php echo $quotationClientSeller ?></p>
                <p class="card-text"><small class="text-muted">Cantidad: <?php echo $quotationClientQuantity; ?></small></p>
                    <!-- <?php echo $quotationClientId; ?> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop<?php echo $quotationClientId;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $quotationClientId;?>">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal<?php echo $quotationClientId;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¡Solicitud de cotización borrada con exita!</h5>
            </div>
            <div class="modal-body">
                Has borrado la solicitud de cotización para <?php echo $quotationClientQuantity; ?> <?php echo $quotationClientProduct ?>(s)
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" type="button" data-bs-dismiss="modal">Aceptar</a>
            </div>
        </div>
    </div>
</div>