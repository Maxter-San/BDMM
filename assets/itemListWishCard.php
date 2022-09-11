<div class="col-xl-3">
    <div class="card cardSectionListWishBar" id="list<?php echo $listWishId;?>">
        <img src=<?php echo $listWishImg; ?> class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $listWishName; ?></h5>
            <p class="card-text">Productos: <?php echo $listWishItems; ?></p>
            <a href="./wishList.php#list<?php echo $listWishId;?>" class="btn btn-warning">Ver lista de deseos</a>
            <!--<?php echo $listWishId; ?> -->
        </div>
    </div>
</div>