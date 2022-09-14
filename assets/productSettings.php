<?php
    if($_GET['userType'] == '1'){
        include_once('assets/productDefault.php');
    }
    else if($_GET['userType'] == '1'){
        if($_GET['buyQuotation'] == '1'){
          include_once('assets/productBuy.php');
        }
        else if($_GET['buyQuotation'] == '2'){
            include_once('assets/productToQuotation.php');
        }
    }else{
        include_once('assets/productRestricted.php');
    }
?>