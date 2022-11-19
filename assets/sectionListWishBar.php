<div class="sectionListWishBar">
        <?php
            $lists = null;

            if($wishListApi->getClientId() != null && !isset($_GET['p_userId'])){
                $_GET['clientId'] = $wishListApi->getClientId();
                $lists = $wishListApi->selectCreatedWishList();
            }else{
                $_GET['clientId'] = $rows[0]["clientId"];
                $lists = $wishListApi->selectWishLists();
            }
            
            for($i = 0;$i < count($lists);$i++){
                $listWishName = $lists[$i]['name'];
                $listWishItems = count($wishListApi->selectProductsWishListById($lists[$i]['listwishId']));
                $listWishImg = null;
                if($lists[$i]['photo'] != null){
                    $listWishImg = 'data:image;base64,'.base64_encode($lists[$i]['photo']);
                }
                $listWishId = $lists[$i]['listwishId'];
                include('assets/itemListWishCard.php');
            }
        ?>
</div>