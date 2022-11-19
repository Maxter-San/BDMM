<?php 
    for($i = 0;$i < count($rows);$i++){
        $listwishId = $rows[$i]['listwishId'];
        $wishListCreationDate = $rows[$i]['creationDate'];
        $wishListName = $rows[$i]['name'];
        $wishListDescription = $rows[$i]['description'];
        $wishListType = $rows[$i]['listType'];
        $wishListPhoto = 'data:image;base64,'.base64_encode($rows[$i]['photo']);
        include('assets/itemBarAddWishList.php');
    }
?>