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

            $product = $productClass->insertProduct($_POST['name'],
                                                $_POST['description'],
                                                $_POST['quantity'],
                                                $_POST['method'],
                                                $_POST['price'],
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

        function selectCategoriesByProductId($productId){
            $productClass = new productClass();

            $res = $productClass->selectCategoriesByProductId($productId);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            
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
    }

    if(isset($_POST['submitProduct'])){
        $var = new productApi();

        $var->addProduct();

    };

    if(isset($_POST['submitAprove'])){
        $var = new productApi();

        $var->aproveProduct();
    }

    if(isset($_POST['submitReject'])){
        $var = new productApi();

        $var->rejectProduct();
    }