<?php
  if($_GET['logged'] == '0'){
    include_once('assets/headerDefault.php');
  }
  else if($_GET['logged'] == '1'){
    include_once('assets/headerClient.php');
  }
  else if($_GET['logged'] == '2'){
    include_once('assets/headerSeller.php');
  }
?>