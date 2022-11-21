<?php 
    $filterRecordsApi = new filterRecordsApi();
    

    if(isset($_GET['group'])){
        $rows = $filterRecordsApi->searchGroup();
        for($i = 0;$i < count($rows);$i++){
            $month = $rows[$i]['month'];
            $year = $rows[$i]['year'];
            $category = $rows[$i]['categoryName'];
            $totalSales = $rows[$i]['totalSales'];
            $totalAmount = $rows[$i]['totalAmount'];
            $grouped = true;
            include('assets/shoppingCards.php');
        }
    }
    else{
        $rows = $filterRecordsApi->searchRecordProducts(null);

        for($i = 0;$i < count($rows);$i++){
            $recordProductId = $rows[$i]['recordProductId'];
            $recordDate = $rows[$i]['creationDate'];
            $productId = $rows[$i]['productId'];
            $recordProductName = $rows[$i]['name'];
            $recordProductQuantity = $rows[$i]['quantity'];
            $recordProductPrice = $rows[$i]['price'];
            $recordProductAmount = $rows[$i]['amount'];
            $isValued = $rows[$i]['isValued'];
            $grouped = false;

            include('assets/shoppingCards.php');
        }
    }

?>