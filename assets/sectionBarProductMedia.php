<div class="sectionBar">
    <?php
        $var = new productApi();
        $rows = $var->selectProductImages($_GET['productId']);
       
        for($i = 0;$i < count($rows);$i++){
            $productId = $rows[$i]['productId'];
            $productmediaId = $rows[$i]['productmediaId'];
            $productImg = 'data:image;base64,'.base64_encode($rows[$i]['photo']);
            include('assets/itemCardProductPhotos.php');
        }

        $rows = $var->selectProductVideos($_GET['productId']);
       
        for($i = 0;$i < count($rows);$i++){
            $productId = $rows[$i]['productId'];
            $productmediaId = $rows[$i]['productmediaId'];
            $productVideo = $rows[$i]['video'];
            include('assets/itemCardProductVideos.php');
        }
    ?>
</div>