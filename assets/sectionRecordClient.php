<?php 
    $filterRecordsApi = new filterRecordsApi();
    $shoppingCartApi = new shoppingCartApi();
    $rows = $filterRecordsApi->searchRecords();

    for($i = 0;$i < count($rows);$i++){
        $recordId = $rows[$i]['recordId'];
        $recordDate = $rows[$i]['creationDate'];
        $recordAmount = $rows[$i]['total'];
        include('assets/shoppingCardsClient.php');
    }
?>