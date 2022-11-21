<?php 
    $shoppingCartApi = new shoppingCartApi();
    $rows = $shoppingCartApi->selectRecordsByClientId();

    for($i = 0;$i < count($rows);$i++){
        $recordId = $rows[$i]['recordId'];
        $recordDate = $rows[$i]['creationDate'];
        $recordAmount = $rows[$i]['amount'];
        include('assets/shoppingCardsClient.php');
    }
?>