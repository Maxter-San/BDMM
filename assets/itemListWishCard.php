<div class="col-xl-3">
    <div class="card cardSectionListWishBar" id="list<?php echo $listWishId;?>">
        <?php 
            if($listWishImg != null){
        ?>
            <img src=<?php echo $listWishImg; ?> class="card-img-top" alt="...">
        <?php }?>
        <div class="card-body">
            <h5 class="card-title"><?php echo $listWishName; ?></h5>
            <p class="card-text">Productos: <?php echo $listWishItems; ?></p>
            <a href="./wishList.php?<?php if(isset($_GET['p_userId'])){ echo 'clientId='.$rows[0]['clientId'];} ?>#list<?php echo $listWishId;?>" class="btn btn-warning">Ver lista de deseos</a>
            <!--<?php echo $listWishId; ?> -->
        </div>
    </div>
</div>