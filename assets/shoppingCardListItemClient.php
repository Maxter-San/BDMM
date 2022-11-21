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

        <!--<?php echo $recordProductId; ?> -->
        <!--<?php echo $productId; ?> -->

        <div class="col">
            <?php 
                $starValue = $shoppingCartApi->selectCommentByRecordProductId($recordProductId);
                if(!$isValued){
            ?>
                    <div class="d-grid gap-2 d-md-block">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $recordProductId; ?>">
                            Valorar compra
                        </button>
                    </div>
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
<?php if(!$isValued){?>
    <div class="modal fade" id="staticBackdrop<?php echo $recordProductId; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Valorar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                    <div class="modal-body">
                        Valora el producto
                        <input id="formProductId<?php echo $recordProductId; ?>" name="productId" value="<?php echo $productId; ?>" hidden>
                        <input id="formRecordProductId<?php echo $recordProductId; ?>" name="recordProductId" value="<?php echo $recordProductId; ?>" hidden>
                        <input id="formValoration-<?php echo $recordProductId; ?>" name="valoration" value="1" hidden>
                        <input type="checkbox" id="formCheck-<?php echo $recordProductId; ?>" hidden>

                        <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="button" id="btn1-<?php echo $recordProductId; ?>" onclick="clickStar(this, <?php echo $recordProductId; ?>);" onmouseover="handleHover(this, <?php echo $recordProductId; ?>);"><i class="bi bi-star-fill" id="star1-<?php echo $recordProductId; ?>"></i></button>
                            <button class="btn btn-outline-secondary" type="button" id="btn2-<?php echo $recordProductId; ?>" onclick="clickStar(this, <?php echo $recordProductId; ?>);" onmouseover="handleHover(this, <?php echo $recordProductId; ?>);"><i class="bi bi-star" id="star2-<?php echo $recordProductId; ?>"></i></button>
                            <button class="btn btn-outline-secondary" type="button" id="btn3-<?php echo $recordProductId; ?>" onclick="clickStar(this, <?php echo $recordProductId; ?>);" onmouseover="handleHover(this, <?php echo $recordProductId; ?>);"><i class="bi bi-star" id="star3-<?php echo $recordProductId; ?>"></i></button>
                            <button class="btn btn-outline-secondary" type="button" id="btn4-<?php echo $recordProductId; ?>" onclick="clickStar(this, <?php echo $recordProductId; ?>);" onmouseover="handleHover(this, <?php echo $recordProductId; ?>);"><i class="bi bi-star" id="star4-<?php echo $recordProductId; ?>"></i></button>
                            <button class="btn btn-outline-secondary" type="button" id="btn5-<?php echo $recordProductId; ?>" onclick="clickStar(this, <?php echo $recordProductId; ?>);" onmouseover="handleHover(this, <?php echo $recordProductId; ?>);"><i class="bi bi-star" id="star5-<?php echo $recordProductId; ?>"></i></button>
                        </div>
                            
                        <div class="col-md form-group">
                            <div class="col-md form-group">
                                <label class="form-label">Reseña</label>
                                <input class="form-control" id="formDescription" maxlength="200" name="comment" placeholder="Tu reseña respecto al producto." required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="buttonSubmitComment" class="btn btn-warning">Aceptar</submit>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php }?>