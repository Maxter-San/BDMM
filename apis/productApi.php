<?php 
    include_once './dataBase/productClass.php';
    include_once './dataBase/userClass.php';
    include_once './dataBase/categoryClass.php';

    class productApi{
        function addProduct(){
            $productClass = new productClass();
            $userClass = new userClass();
            $categoryClass = new categoryClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);
            $sellerRows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $sellerRows[] = $r;
            }
            $sellerInfo = $sellerRows[0]['sellerId'];

            $price = 0;

            if($_POST['method'] == 'Vender'){
                $price = $_POST['price'];
            }
            

            $product = $productClass->insertProduct($_POST['name'],
                                                $_POST['description'],
                                                $_POST['quantity'],
                                                $_POST['method'],
                                                $price,
                                                $sellerInfo
            );

            $productId = 0;
            while($r = mysqli_fetch_assoc($product)) {
                 $productId = $r['productId'];
            }
              
            $res = $categoryClass->getAllCategories();
            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }

            for($i = 0;$i < count($rows);$i++){
                if(isset($_POST[$rows[$i]['categoryId']])){
                    $productClass->insertProductCategories($productId, $rows[$i]['categoryId']);
                }
            }
           

            $countfiles = count($_FILES['productVideo']['name']);
            for($i=0;$i<$countfiles;$i++){
                $date = new DateTime("now", new DateTimeZone('America/Mexico_City') );    
                
                $archivo = $_FILES['productVideo']['name'][$i];
                $target_dir = "resourses/videos/";
                $target_file = $target_dir.$date->format('dmY-Gisu.').pathinfo($archivo, PATHINFO_EXTENSION);

                if(move_uploaded_file($_FILES['productVideo']['tmp_name'][$i], $target_file)){
                    //echo 'video '.$archivo.'cargado. ';
                    $res = $productClass->insertProductMedia($productId, $date->format('dmY-Gisu.').pathinfo($archivo, PATHINFO_EXTENSION), null);
                }
            }         

            $countfiles = count($_FILES['productPhoto']['name']);
            for($i=0;$i<$countfiles;$i++){
                $archivo = $_FILES['productPhoto']['tmp_name'][$i];
                $tamanio = $_FILES['productPhoto']['size'][$i];

                $fp = fopen($archivo, "rb");
                $profilePhotoBlob = fread($fp, $tamanio);
                $profilePhotoBlob = addslashes($profilePhotoBlob);
                fclose($fp);

                $res = $productClass->insertProductMedia($productId, null, $profilePhotoBlob);
            }
            
            header("Location: market.php?successful=add");
            

            exit();
        }

        function insertViewProduct($productId){
            $productClass = new productClass();
            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);
            $clientRows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $clientRows[] = $r;
            }
            $clientInfo = $clientRows[0]['clientId'];

            $productClass->insertViewedProduct($productId, $clientInfo);

        }

        function updateProduct(){
            if(isset($_POST['productId'])){
                $productClass = new productClass();
                $categoryClass = new categoryClass();

                $price = 0;

                if($_POST['type'] == 'Vender'){
                    $price = $_POST['price'];
                }

                $product = $productClass->updateProduct($_POST['productId'],
                                                        $_POST['name'],
                                                        $_POST['description'],
                                                        $_POST['quantity'],
                                                        $price
                );
    
                $productId = $_POST['productId'];

                $productClass->deleteProductCategories($_POST['productId']);
                  
                $res = $categoryClass->getAllCategories();
                $rows = array();
                while($r = mysqli_fetch_assoc($res)) {
                    $rows[] = $r;
                }
    
                for($i = 0;$i < count($rows);$i++){
                    if(isset($_POST[$rows[$i]['categoryId']])){
                        $productClass->insertProductCategories($productId, $rows[$i]['categoryId']);
                    }
                }
    
                
                if($_FILES['productVideo']['size'] > 0){
                    $countfiles = count($_FILES['productVideo']['name']);
                    for($i=0;$i<$countfiles;$i++){
                        $date = new DateTime("now", new DateTimeZone('America/Mexico_City') );    
                        
                        $archivo = $_FILES['productVideo']['name'][$i];
                        $target_dir = "resourses/videos/";
                        $target_file = $target_dir.$date->format('dmY-Gisu.').pathinfo($archivo, PATHINFO_EXTENSION);
                    
                        if(move_uploaded_file($_FILES['productVideo']['tmp_name'][$i], $target_file)){
                            //echo 'video '.$archivo.'cargado. ';
                            $res = $productClass->insertProductMedia($productId, $date->format('dmY-Gisu.').pathinfo($archivo, PATHINFO_EXTENSION), null);
                        }
                    }
                }
    
                if($_FILES['productPhoto']['size'][0] > 0){
                    $countfiles = count($_FILES['productPhoto']['name']);
                    for($i=0;$i<$countfiles;$i++){
                        $archivo = $_FILES['productPhoto']['tmp_name'][$i];
                        $tamanio = $_FILES['productPhoto']['size'][$i];
                    
                        $fp = fopen($archivo, "rb");
                        $profilePhotoBlob = fread($fp, $tamanio);
                        $profilePhotoBlob = addslashes($profilePhotoBlob);
                        fclose($fp);
                    
                        $res = $productClass->insertProductMedia($productId, null, $profilePhotoBlob);
                    }
                }

                header("Location: productSettings.php?productId=".$_POST['productId']."&successful=update");
            }else{
                header("Location: productSettings.php?error=update");
            }
            
            exit();
        }

        function deleteProductImages(){
            $productClass = new productClass();
            $res = $productClass->selectPhotosByProductId($_POST['productId']);

            $images = array();
            while($r = mysqli_fetch_assoc($res)) {
                $images[] = $r;
            }

            if(count($images) > 3){
                $res = $productClass->deleteProductMedia($_POST['productmediaId']);
                header("Location: productSettings.php?productId=".$_POST['productId']."&successful=deleteImage");
            }else{
                header("Location: productSettings.php?productId=".$_POST['productId']."&failed=deleteImage");
            }
            exit();
        }

        function deleteProductVideos(){
            $productClass = new productClass();
            $res = $productClass->selectVideosByProductId($_POST['productId']);

            $images = array();
            while($r = mysqli_fetch_assoc($res)) {
                $images[] = $r;
            }

            if(count($images) > 1){
                echo 'resourses/videos/'.$_POST['video'];
                unlink('resourses/videos/'.$_POST['video']);
                $res = $productClass->deleteProductMedia($_POST['productmediaId']);
                
                header("Location: productSettings.php?productId=".$_POST['productId']."&successful=deleteVideo");
            }else{
                header("Location: productSettings.php?productId=".$_POST['productId']."&failed=deleteVideo");
            }
            exit();
        }

        function selectProductsById(){
            $productClass = new productClass();

            if(isset($_GET['productId'])){
                if($_GET['productId'] != ''){
                    $res = $productClass->selectProductsById($_GET['productId']);

                    $rows = array();
                    while($r = mysqli_fetch_assoc($res)) {
                        $rows[] = $r;
                    }

                    return $rows;
                }
            }
        }

        function selectProductsByStatusBySellerId($status){
            $productClass = new productClass();
            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);
            $sellerRows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $sellerRows[] = $r;
            }
            $sellerInfo = $sellerRows[0]['sellerId'];

            $res = $productClass->selectProductsByStatusBySellerId($sellerInfo, 
                                                         $status);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            
            return $rows;   
        }

        function selectProductsBySellerId($sellerId){
            $productClass = new productClass();

            $res = $productClass->selectProductsByStatusBySellerId($sellerId, 
                                                                   'Aceptado');

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            
            return $rows;
        }

        function selectAprovedProductsByAdminId($adminId){
            $productClass = new productClass();

            $res = $productClass->selectAprovedProductsByAdminId($adminId);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            
            return $rows;   
        }

        function selectAllProductsByStatus($status){
            $productClass = new productClass();

            $res = $productClass->selectAllProductsByStatus($status);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            
            return $rows;
        }

        function selectProductImages($productId){
            $productClass = new productClass();

            $res = $productClass->selectPhotosByProductId($productId);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            
            return $rows;
        }

        function selectProductVideos($productId){
            $productClass = new productClass();

            $res = $productClass->selectVideosByProductId($productId);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            
            return $rows;
        }

        function selectCategoriesByProductId($productId){
            $productClass = new productClass();

            $res = $productClass->selectCategoriesByProductId($productId);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            
            return $rows;
        }

        function selectProductBySellerIdAndProductId(){
            $productClass = new productClass();
            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);
            $sellerRows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $sellerRows[] = $r;
            }
            $sellerInfo = $sellerRows[0]['sellerId'];

            $productId = -1;
            if(isset($_GET['productId'])){
                $productId = $_GET['productId'];
            }

            $res = $productClass->selectProductBySellerIdAndProductId($productId, 
                                                                      $sellerInfo);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            
            return $rows;   
        }

        function selectProductsByCategory(){
            $productClass = new productClass();
            $userClass = new userClass();
            $categoryClass = new categoryClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);
            $sellerRows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $sellerRows[] = $r;
            }
            $sellerInfo = $sellerRows[0]['sellerId'];

            $res = $categoryClass->getAllCategories();
            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }

            $categories = null;
            for($i = 0;$i < count($rows);$i++){
                if(isset($_GET[$rows[$i]['categoryId']])){
                    $categoryClass->insertFilterCategory($rows[$i]['categoryId']);
                    $categories = 1;
                }
            }


            $res = $productClass->selectProductsByCategory($sellerInfo, $categories);

            $categoryClass->deleteFilterCategory();

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
                echo json_encode($r);
            }

            
            //exit();
            return $rows;
        }

        function aproveProduct(){
            $productClass = new productClass();
            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);
            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }
            $adminInfo = $rows[0]['adminId'];

            $productClass->updateStatusProduct($_POST['productId'] ,$adminInfo, 'Aceptado');

            header("Location: approveProducts.php?successful=acept");
        }

        function rejectProduct(){
            $productClass = new productClass();
            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);
            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }
            $adminInfo = $rows[0]['adminId'];

            $productClass->updateStatusProduct($_POST['productId'] ,$adminInfo, 'Rechazado');

            header("Location: approveProducts.php?successful=reject");
        }

        function deleteRejectedProduct(){
            $productClass = new productClass();

            $productClass->deleteProduct($_POST['productId']);

            header("Location: market.php?successful=delete");
        }

        function deleteAceptedProduct(){
            $productClass = new productClass();

            $productClass->deleteProduct($_POST['productId']);

            header("Location: stock.php?successful=delete");
        }

        function sendCategoryId(){
            $categoryClass = new categoryClass();

            $res = $categoryClass->getAllCategories();
            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }

            $categories = null;
            for($i = 0;$i < count($rows);$i++){
                if(isset($_POST[$rows[$i]['categoryId']])){
                    if($categories != null){
                        $categories = $categories."&";
                    }
                    $categories = $categories.$rows[$i]['categoryId'];
                }
            }

            //if($categories != null){
                header("Location: stock.php?".$categories);
                exit();
            //}
        }

        function mainProducts($order){
            $productClass = new productClass();

            $clientInfo = null;
            if($order == 'filterProductsByLastViewed'){
                $userClass = new userClass();

                $search = $userClass->getProfileUserById($_SESSION['s_userId']);
                $clientRows = array();
                while($r = mysqli_fetch_assoc($search)) {
                    $clientRows[] = $r;
                }
                $clientInfo = $clientRows[0]['clientId'];
            }
            //
            $res = $productClass->mainProducts($order, $clientInfo);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
                echo json_encode($r);
            }

            return $rows;   
        }
    }

    if(isset($_POST['submitProduct'])){
        $var = new productApi();

        $var->addProduct();

    };

    if(isset($_POST['submitUpdateProduct'])){
        $var = new productApi();

        $var->updateProduct();

    };

    if(isset($_POST['submitAprove'])){
        $var = new productApi();

        $var->aproveProduct();
    }

    if(isset($_POST['submitReject'])){
        $var = new productApi();

        $var->rejectProduct();
    }

    if(isset($_POST['submitButtonProductRejectedDelete'])){
        $var = new productApi();

        $var->deleteRejectedProduct();
    }

    if(isset($_POST['submitButtonProductAceptedDelete'])){
        $var = new productApi();

        $var->deleteAceptedProduct();
    }

    if(isset($_POST['submitButtonProductPhotoDelete'])){
        $var = new productApi();

        $var->deleteProductImages();
    }

    if(isset($_POST['submitButtonProductVideoDelete'])){
        $var = new productApi();

        $var->deleteProductVideos();
    }

    if(isset($_POST['submitButtonFillProductsByCategory'])){
        $prod = new productApi();

        $prod->sendCategoryId();
    }