<?php
    if($_GET['userType'] == 'Comprador'){
        include_once('assets/profileClient.php');
    }
    else if($_GET['userType'] == 'Vendedor'){
        include_once('assets/profileSeller.php');
    }
    else if($_GET['userType'] == 'Admin'){
        $adminId = $rows[0]['adminId'];
        include_once('assets/profileAdmin.php');
    }
    else if($_GET['userType'] == 'SuperAdmin'){
        include_once('assets/profileSuperAdmin.php');
    }
?>