<div class="d-grid gap-2">
    <button class="btn btn-success" type="submit" name="submitButtonAddToCart" <?php if(isset($product)){ if($product[0]['quantity'] == 0){ echo 'disabled';}}?>>Agregar al carrito</button>

    <div class="dropdown-center d-grid gap-2">
        <button class="btn btn-outline-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Agregar a mi lista
        </button>
        <?php 
            $wishListApi = new addWishListApi();
            $rows = $wishListApi->selectCreatedWishList();
        ?>
        <ul class="dropdown-menu dropdown-menu-dark">
            <?php 
                for($i = 0;$i < count($rows);$i++){
            ?>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                        <input class="form-control" id="formWishListId" placeholder="ID" name="wishListId" hidden value="<?php echo $rows[$i]['listwishId'];?>">
                        <input class="form-control" id="formProductId" placeholder="ID" name="productId" hidden value="<?php echo $product[0]['productId'];?>">
                        <li><button type="submit" name="submitButtonProductToList" class="dropdown-item"><?php echo $rows[$i]['name'];?></button></li>
                    </form>
            <?php
                }
            ?>
            <li><a type="button" name="submitButtonProductToList" href="addWishList.php" class="dropdown-item">Crear lista de deseos</a></li>
        </ul>
    </div>
    
</div>