<div class="sectionBar" style="margin-bottom: 1em;">
    <?php
        $prod = $wishListApi->selectProductsWishListById($listWishId);
        for($j = 0;$j < count($prod);$j++){
            $productName = $prod[$j]['productName'];
            $productPrice = number_format($prod[$j]['price'], 2, '.', ' ');
            $productImg = 'data:image;base64,'.base64_encode($prod[$j]['productPhoto']);
            $productId = $prod[$j]['productId'];
            include('assets/itemWishListProduct.php');
        }
    ?>
</div>