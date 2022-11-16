<h4>Categorías agregadas:</h4>
<?php
    include_once('apis/categoryApi.php');
    $var = new categorypApi();

    $rows = $var->getCreatedCategoriesProfile();

    include('assets/sectionBarCategories.php');
?>

<hr>

<h4>Productos aprobados:</h4>
<?php
    include_once('apis/productApi.php');
    $var = new productApi();
    
    $method = 'profileAdmin';
    include('assets/sectionBar.php');
?>