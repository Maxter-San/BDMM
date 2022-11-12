<div class="card mb-3" id="list<?php echo $categoryId;?>" <?php echo 'onclick="sendCategoryId('.$categoryId.', '."'".$categoryName."'".', '."'".$categoryDescription."'".');"'; ?> style="cursor: pointer;">

    <div class="row g-0">
        <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $categoryId;?>"></button>
        </div>
        <div class="col-md-2">
            <img src="<?php echo $categoryPhoto ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-10">
            <div class="card-body">
                <h5 class="card-title"><?php echo $categoryName ?></h5>
                <p class="card-text">Categoría creada el <?php echo date('d-m-Y', strtotime($categoryCreationDate)); ?></p>
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
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                    <input class="form-control" id="formCategoryName" placeholder="ID" name="name" hidden value="<?php echo $categoryName;?>">
                    <input class="form-control" id="formCategoryId" placeholder="ID" name="categoryId" hidden value="<?php echo $categoryId;?>">
                    <button type="submit" name="submitButtonDelete" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>