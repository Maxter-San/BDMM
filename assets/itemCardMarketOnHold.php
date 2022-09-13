<div class="col-xl-3">
    <div class="card cardSectionBar">
        <img src=<?php echo $productImg; ?> class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $productName; ?></h5>
            <div class="row">
                <div class="col">
                    <p class="card-text">$ <?php echo $productPrice; ?></p>
                </div>

                <div class="col">
                    <p class="card-text">Stock: <?php echo $productStock; ?></p>
                </div>
            </div>
            <span class="badge rounded-pill text-bg-warning">Revisión pendiente</span>
            <!--<?php echo $productId; ?> -->
        </div>
    </div>
</div>