<div class="col-xl-3">
    <div class="card cardSectionBar">
        <img src=<?php echo $productImg; ?> class="card-img-top" alt="...">

        <div class="card-body">
            <h5 class="card-title"><?php echo $productName; ?></h5>

            <h5 class="card-title" id="productItem<?php echo $recordProductId; ?>">
                <?php 
                    if($productIsValued){
                        $starValue = $shoppingCartApi->selectCommentByRecordProductId($recordProductId);
                ?>
                        <script>
                            setStars(5, <?php echo $starValue[0]['valoration']; ?>, 'productItem<?php echo $recordProductId; ?>');
                        </script>
                <?php 
                    }else{
                ?>
                        <label style="color : red;">Sin calificar</label>
                <?php 
                    }
                ?>
            </h5>

            <h6>Comprado en <?php echo date('d-m-Y', strtotime($productDateValoration));?></h6>

            <a href="./product.php?productId=<?php echo $productId; ?>" class="btn btn-outline-warning">Ver producto</a>

            <!--<?php echo $productId; ?> -->
        </div>
    </div>
</div>