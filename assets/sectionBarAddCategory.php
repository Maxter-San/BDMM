<?php 
    for($i = 0;$i < count($rows);$i++){
        $categoryId = $rows[$i]['categoryId'];
        $categoryCreationDate = $rows[$i]['creationDate'];
        $categoryName = $rows[$i]['name'];
        $categoryDescription = $rows[$i]['description'];
        $categoryPhoto = 'data:image;base64,'.base64_encode($rows[$i]['photo']);
        include('assets/itemBarAddCategory.php');
    }
?>