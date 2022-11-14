<div class="sectionBar">
    <?php
        for($i = 0;$i < count($enEspera);$i++){
            $productName = $enEspera[$i]['name'];
            $productPrice = $enEspera[$i]['price'];
            $productStock = $enEspera[$i]['quantity'];
            $productImg = 'data:image;base64,'.base64_encode($enEspera[$i]['photo']);
            $productId = $enEspera[$i]['productId'];
            include('assets/itemCardMarketOnHold.php');
        }
    ?>

</div>