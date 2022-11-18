<div class="sectionBar">
    <?php
        if(isset($method)){
            if($method == 'profileAdmin'){
                $rows = $var->selectAprovedProductsByAdminId($adminId);

                for($i = 0;$i < count($rows);$i++){
                    $productName = $rows[$i]['name'];
                    $productPrice = $rows[$i]['price'];
                    $productImg = 'data:image;base64,'.base64_encode($rows[$i]['photo']);
                    $productId = $rows[$i]['productId'];
                    include('assets/itemCard.php');
                }
            }
            else if($method == 'profileSeller'){
                $rows = $var->selectProductsBySellerId($sellerId);

                for($i = 0;$i < count($rows);$i++){
                    $productName = $rows[$i]['name'];
                    $productPrice = $rows[$i]['price'];
                    $productImg = 'data:image;base64,'.base64_encode($rows[$i]['photo']);
                    $productId = $rows[$i]['productId'];
                    include('assets/itemCard.php');
                }
            }
            else if($method == 'searchProducts'){
                $rows = $var->searchProducts();

                for($i = 0;$i < count($rows);$i++){
                    $productName = $rows[$i]['name'];
                    $productPrice = $rows[$i]['price'];
                    $productImg = 'data:image;base64,'.base64_encode($rows[$i]['photo']);
                    $productId = $rows[$i]['productId'];
                    include('assets/itemCard.php');
                }
            }
            else if($method == 'custom'){
                for($i = 0;$i < count($rows);$i++){
                    $productName = $rows[$i]['name'];
                    $productPrice = $rows[$i]['price'];
                    $productImg = 'data:image;base64,'.base64_encode($rows[$i]['photo']);
                    $productId = $rows[$i]['productId'];
                    include('assets/itemCard.php');
                }
            }
            
        }else{
            $productName = 'Libreta';
            $productPrice = '50';
            $productImg = './resourses/dummy/libreta.jpg';
            $productId = '1';
            include('assets/itemCard.php');
        }
    ?>
</div>