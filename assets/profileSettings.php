<?php
    if($_GET['userType'] == '1'){
        include_once('assets/profileClient.php');
    }
    else if($_GET['userType'] == '2'){
        include_once('assets/profileSeller.php');
    }
    else if($_GET['userType'] == '3'){
        include_once('assets/profileAdmin.php');
    }
    else if($_GET['userType'] == '4'){
        include_once('assets/profileSuperAdmin.php');
    }
?>