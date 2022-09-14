<div class="card mb-3" id="list<?php echo $categoryId;?>">

    <div class="row g-0">
        <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $categoryId;?>"></button>
        </div>
        <div class="col-md-2">
            <img src="./resourses/comprador.jpg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-10">
            <div class="card-body">
                <h5 class="card-title"><?php echo $categoryName ?></h5>
                <p class="card-text">Categoría creada el <?php echo date("d") . "/" . date("m") . "/" . date("Y"); ?></p>
                <p class="card-text"><small class="text-muted">Descripción: <?php echo $categoryDescription; ?></small></p>
                    <!-- <?php echo $categoryId; ?> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop<?php echo $categoryId;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Confirmación</h5>
            </div>
            <div class="modal-body">
              ¿Seguro qué quiéres borrar esta categoría?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $categoryId;?>">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal<?php echo $categoryId;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¡Categoría borrada con exito!</h5>
            </div>
            <div class="modal-body">
                Has borrado la categoría de <?php echo $categoryName; ?>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" type="button" data-bs-dismiss="modal">Aceptar</a>
            </div>
        </div>
    </div>
</div>