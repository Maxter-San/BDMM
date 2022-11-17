<h4>Mis Productos:</h4>
<?php
    include_once('apis/productApi.php');
    $var = new productApi();
    
    $method = 'profileSeller';
    include('assets/sectionBar.php');
?>