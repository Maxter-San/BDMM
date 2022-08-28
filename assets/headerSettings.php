<?php
  if($_GET['logged'] == '1'){
    include_once('assets/headerLogged.php');
  }
  else{
    include_once('assets/headerDefault.php');
  }
?>