<div class="sectionBar">
    <?php
        for($i = 0;$i < count($products);$i++){
            $productName = $products[$i]['name'];
            $productImg = 'data:image;base64,'.base64_encode($products[$i]['photo']);
            $productId = $products[$i]['productId'];
            $productStock = $products[$i]['quantity'];
            $productBuying = $products[$i]['buying'];
            $status = $products[$i]['status'];
            include('assets/itemCardStock.php');
        }
    ?>
</div>