<?php
  if(isset($_POST['logOutButton'])){
    $_SESSION['s_userId']=''; $_SESSION['s_userName']=''; $_SESSION['s_userType']='';
    header("Location: main.php");
  }

  if($_GET['logged'] == 'notLogged'){
    include_once('assets/headerDefault.php');
  }
  else if($_GET['logged'] == 'Comprador'){
    include_once('assets/headerClient.php');
  }
  else if($_GET['logged'] == 'Vendedor'){
    include_once('assets/headerSeller.php');
  }
  else if($_GET['logged'] == 'Admin'){
    include_once('assets/headerAdmin.php');
  }
  else if($_GET['logged'] == 'SuperAdmin'){
    include_once('assets/headerSuperAdmin.php');
  }
?>