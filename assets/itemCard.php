<div class="col-xl-3">
    <div class="card cardSectionBar">
        <img src=<?php echo $productImg; ?> class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $productName; ?></h5>
            <?php 
            if($productMethod == 'Cotizar'){
            ?>
                    <p class="card-text">Cotizable</p>
            <?php 
                }else{
            ?>
                    <p class="card-text">$ <?php echo $productPrice; ?></p>
            <?php 
                }
            ?>
            <a href="./product.php?productId=<?php echo $productId; ?>" class="btn btn-warning">Ver más</a>
            <!--<?php echo $productId; ?> -->
        </div>
    </div>
</div>