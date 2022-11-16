<div class="sectionBar">
    <?php
        if(count($prods) == 0){
            echo '<h2>No hay productos pendientes</h2>';
        }else{
            for($i = 0;$i < count($prods);$i++){
                $productName = $prods[$i]['name'];
                $productSeller = $prods[$i]['sellerName'];
                $productPrice = $prods[$i]['price'];
                $productStock = $prods[$i]['quantity'];
                $productId = $prods[$i]['productId'];
                $productDescription = $prods[$i]['description'];
                include('assets/itemCardApproveProducts.php');
            }
        }
    ?>
</div>