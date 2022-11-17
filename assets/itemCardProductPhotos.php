<div class="col-xl-3">
    <div class="card cardSectionBar">
        <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $productmediaId;?>"></button>
        </div>

        <img src=<?php echo $productImg; ?> class="card-img-top" alt="...">

        <!--<?php echo $productmediaId; ?> -->
    </div>
</div>

<div class="modal fade" id="staticBackdrop<?php echo $productmediaId;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Confirmación</h5>
            </div>
            <div class="modal-body">
              ¿Seguro qué quiéres borrar esta foto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                    <input class="form-control" id="formPproductId" placeholder="ID" name="productId" hidden value="<?php echo $productId;?>">
                    <input class="form-control" id="formPproductmediaId" placeholder="ID" name="productmediaId" hidden value="<?php echo $productmediaId;?>">
                    <button type="submit" name="submitButtonProductPhotoDelete" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>