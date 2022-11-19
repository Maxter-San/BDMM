<div class="sectionBar" style="margin-bottom: 1en;">
    <?php
        $shoppingCartApi = new shoppingCartApi();
        $rows = $shoppingCartApi->selectProductsByCartId();

        $validateAvaibleStock = null;

        for($i = 0;$i < count($rows);$i++){
            $productName = $rows[$i]['name'];
            $productPrice = $rows[$i]['price'];
            $productImg = 'data:image;base64,'.base64_encode($rows[$i]['photo']);
            $productQuantity = $rows[$i]['quantity'];
            $productStock = $rows[$i]['stock'];
            $cartproductId = $rows[$i]['cartproductId'];
            include('assets/itemCartCard.php');

            if($productStock < $productQuantity){
                $validateAvaibleStock = 1;
            }
        }
    ?>
</div>