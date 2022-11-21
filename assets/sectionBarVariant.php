<div class="sectionBar">
    <?php
        $shoppingCartApi = new shoppingCartApi();
        $rows = $shoppingCartApi->selectAllRecordsByClientId();
        for($i = 0;$i < count($rows);$i++){
            $recordProductId = $rows[$i]['recordProductId'];
            $productName = $rows[$i]['name'];
            $productImg = 'data:image;base64,'.base64_encode($rows[$i]['photo']);
            $productId = $rows[$i]['productId'];
            $productIsValued = $rows[$i]['isValued'];
            $productDateValoration = $rows[$i]['creationDate'];
            include('assets/itemCardVariant.php');
        }
    ?>
</div>