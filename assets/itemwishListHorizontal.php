<div class="card mb-3" id="list<?php echo $listWishId;?>">
    <div class="row g-0">
        <div class="col-md-2">
            <?php 
                if($listWishImg != null){
            ?>
                <img src="<?php echo $listWishImg;?>" class="img-fluid rounded-start" alt="...">
            <?php }?>
        </div>
        

        <div class="col-md-10">
            <div class="card-body">
                <h5 class="card-title"><?php echo $listWishName; ?></h5>
                <p class="card-text"><?php echo $wishListDescription; ?></p>
                <p class="card-text"><small class="text-muted">Fecha de creación: <?php echo date('d-m-Y', strtotime($wishListCreationDate)); ?></small></p>
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