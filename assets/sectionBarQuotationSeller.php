<?php 
    $shoppingCartApi = new shoppingCartApi();

    $rows = $shoppingCartApi->selectWaitingCuotationsBySellerId();

    for($i = 0;$i < count($rows);$i++){
        $cuotationId = $rows[$i]['cuotationId'];
        $clientUserName = $rows[$i]['userName'];
        $productName = $rows[$i]['name'];
        $quantity = $rows[$i]['quantity'];
        $productPhoto = 'data:image;base64,'.base64_encode($rows[$i]['photo']);
        include('assets/itemBarQuotationSeller.php');
    }
?>