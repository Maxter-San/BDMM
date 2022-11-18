<?php
    if($_GET['userType'] == '0'){
        include_once('assets/productDefault.php');
    }
    else if($_GET['userType'] == 'Comprador'){
        if($_GET['buyQuotation'] == 'Vender'){
          include_once('assets/productBuy.php');
        }
        else if($_GET['buyQuotation'] == 'Cotizar'){
            include_once('assets/productToQuotation.php');
        }
    }else{
        include_once('assets/productRestricted.php');
    }
?>