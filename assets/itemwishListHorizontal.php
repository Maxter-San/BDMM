<div class="card mb-3" id="list<?php echo $listWishId;?>">

    <div class="row g-0">
        <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></button>
        </div>

        <div class="col-md-2">
            <img src="<?php echo $listWishImg;?>" class="img-fluid rounded-start" alt="...">
        </div>

        <div class="col-md-10">
            <div class="card-body">
                <h5 class="card-title"><?php echo $listWishName; ?></h5>
                <p class="card-text"><?php echo $wishListDescription; ?></p>
                <p class="card-text"><small class="text-muted">Productos: <?php echo $wishListNumProducts; ?></small></p>
            </div>
        </div>
    </div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <?php
                include('assets/sectionWishListProductBar.php');
            ?>
        </li>
    </ul>
</div>