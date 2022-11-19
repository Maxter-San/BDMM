<?php
    $rows = $wishListApi->selectWishLists();
    for($i = 0;$i < count($rows);$i++){
        $listWishId = $rows[$i]['listwishId'];
        $listWishName = $rows[$i]['name'];
        $listWishImg = null;
        if($rows[$i]['photo'] != null){
            $listWishImg = 'data:image;base64,'.base64_encode($rows[$i]['photo']);
        }
        $wishListDescription = $rows[$i]['description'];
        $wishListCreationDate = $rows[$i]['creationDate'];
        include('assets/itemwishListHorizontal.php');
    }
?>