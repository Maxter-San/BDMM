<?php 
    if($grouped){
?>
        <li class="list-group-item">
            <div class="row">
                <div class="col">
                    <?php echo $month; ?>
                </div>
                <div class="col">
                    <?php echo $year; ?>
                </div>
                <div class="col">
                    <?php echo $category; ?>
                </div>
                <div class="col">
                    <?php echo $totalSales; ?>
                </div>
                <div class="col">
                    <?php echo "$ ".$totalAmount; ?>
                </div>
            </div>
        </li>

<?php 
    }
    else{
?>
        <li class="list-group-item">
            <div class="row">
                <div class="col">
                    <?php echo $recordProductName; ?>
                </div>
                <div class="col">
                    <?php
                        $productApi = new productApi();
                        $categories = $productApi->selectCategoriesByProductId($productId);
                        echo '<ul>';
                        for($k = 0;$k < count($categories);$k++){
                                echo '<li>'.$categories[$k]['categoryName'].'</li>';
                        }
                        echo '</ul>';
                    ?>
                </div>
                <div class="col">
                    <?php echo $recordProductQuantity; ?>
                </div>
                <div class="col">
                    <?php echo $recordProductPrice; ?>
                </div>
                <div class="col">
                    <?php echo $recordProductAmount; ?>
                </div>
                <div class="col">
                    <?php 
                        $shoppingCartApi = new shoppingCartApi();
                        $starValue = $shoppingCartApi->selectCommentByRecordProductId($recordProductId);
                        if(!$isValued){
                    ?>
                            <label style="color : red;">Sin calificar</label>
                    <?php 
                        }
                        else{
                    ?>
                            <div id="menuContainer<?php echo $recordProductId; ?>">
                                <script>setStars(5, <?php echo $starValue[0]['valoration']; ?>, 'menuContainer<?php echo $recordProductId; ?>');</script>
                            </div>
                    <?php
                        }
                    ?>

                </div>
            </div>
        </li>

<?php 
    }
?>