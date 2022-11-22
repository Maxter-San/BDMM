<?php 
    $shoppingCartApi = new shoppingCartApi();

    $rows = $shoppingCartApi->selectWaitingCuotationsByCliendId();

    for($i = 0;$i < count($rows);$i++){
        $cuotationId = $rows[$i]['cuotationId'];
        $sellerUserName = $rows[$i]['userName'];
        $productName = $rows[$i]['name'];
        $productId = $rows[$i]['productId'];
        $quantity = $rows[$i]['quantity'];
        $status = $rows[$i]['status'];
        $productPhoto = 'data:image;base64,'.base64_encode($rows[$i]['photo']);
        include('assets/itemBarQuotationClient.php');
    }

?>