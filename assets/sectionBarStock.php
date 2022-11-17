<div class="sectionBar">
    <?php
        $var = new productApi();
        $rows = $var->selectProductsByStatusBySellerId('Aceptado');

        for($i = 0;$i < count($rows);$i++){
            $productName = $rows[$i]['name'];
            $productImg = 'data:image;base64,'.base64_encode($rows[$i]['photo']);
            $productId = $rows[$i]['productId'];
            $productStock = $rows[$i]['quantity'];
            include('assets/itemCardStock.php');
        }
    ?>
</div>