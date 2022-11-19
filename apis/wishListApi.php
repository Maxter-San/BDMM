<?php 
    include_once './dataBase/wishListClass.php';
    include_once './dataBase/userClass.php';

    class addWishListApi{
        function addWishList(){
            $wishListClass = new wishListClass();

            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);

            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }
            $clientInfo = $rows[0]['clientId'];

            $photoBlob = null;
            if($_FILES['wishListPhoto']['size'] > 0){
                $archivo = $_FILES["wishListPhoto"]["tmp_name"]; 
                $tamanio = $_FILES["wishListPhoto"]["size"];

                $fp = fopen($archivo, "rb");
                $photoBlob = fread($fp, $tamanio);
                $photoBlob = addslashes($photoBlob);
                fclose($fp);
            }

            $res = $wishListClass->insertWishList($_POST['name'],
                                                  $_POST['description'],
                                                  $photoBlob,
                                                  $_POST['listType'],
                                                  $clientInfo
            );
            
            header("Location: addWishList.php?successful=add");
            
            exit();
        }

        function insertProducrWishList(){
            $wishListClass = new wishListClass();

            $res = $wishListClass->searchProductInWishList($_POST['wishListId'], $_POST['productId']);

            $findProduct = null;
            if(mysqli_num_rows($res) > 0){
                $findProduct = 1;
            };

            if($findProduct == null){
                $wishListClass->insertProducrWishList($_POST['wishListId'], $_POST['productId']);
                header("Location: product.php?productId=".$_POST['productId']."&successful=AddList");
            }else{
                header("Location: product.php?productId=".$_POST['productId']."&failed=AddList");
            }
            

            exit();
        }

        function updateWishList(){
            $wishListClass = new wishListClass();

            $photoBlob = null;
            if($_FILES['wishListPhoto']['size'] > 0){
                $archivo = $_FILES["wishListPhoto"]["tmp_name"]; 
                $tamanio = $_FILES["wishListPhoto"]["size"];

                $fp = fopen($archivo, "rb");
                $photoBlob = fread($fp, $tamanio);
                $photoBlob = addslashes($photoBlob);
                fclose($fp);
            }

            $res = $wishListClass->updateWishList($_POST['listWishId'],
                                                  $_POST['name'],
                                                  $_POST['description'],
                                                  $photoBlob,
                                                  $_POST['listType']
            );
            
            header("Location: addWishList.php?successful=update");
            

            exit();
        }

        function deleteWishList(){
            $wishListClass = new wishListClass();

            $res = $wishListClass->deleteWishList($_POST['wishListId']);
            
            header("Location: addWishList.php?successful=delete");
            

            exit();
        }

        function selectCreatedWishList(){
            $wishListClass = new wishListClass();
            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);

            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }
            $clientInfo = $rows[0]['clientId'];

            $res = $wishListClass->selectCreatedWishList($clientInfo);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            //echo json_encode($rows);
            //echo $rows[0]['userId'];
            
            return $rows;
        }

        function selectWishLists(){
            $wishListClass = new wishListClass();
            $userClass = new userClass();

            $res = null;
            
            if(isset($_GET['clientId'])){
                $clientInfo = $_GET['clientId'];

                $res = $wishListClass->selectWishListByClientId($clientInfo);
                
            }
            else if(isset($_SESSION['s_userId'])){
                if($_SESSION['s_userId'] != null){
                    $search = $userClass->getProfileUserById($_SESSION['s_userId']);

                    $rows = array();
                    while($r = mysqli_fetch_assoc($search)) {
                        $rows[] = $r;
                    }
                    $clientInfo = $rows[0]['clientId'];

                    $res = $wishListClass->selectCreatedWishList($clientInfo);
                }
            }

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            
            return $rows;
        }  
        
        function selectProductsWishListById($wishListId){
            $wishListClass = new wishListClass();

            $res = $wishListClass->selectProductsWishListById($wishListId);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            
            return $rows;
        }  

        function getClientId(){
            $userClass = new userClass();
            $clientId = null;

            if(isset($_SESSION['s_userId'])){
                if($_SESSION['s_userId'] != null){
                    $search = $userClass->getProfileUserById($_SESSION['s_userId']);

                    $rows = array();
                    while($r = mysqli_fetch_assoc($search)) {
                        $rows[] = $r;
                    }

                    if(isset($rows[0]['clientId'])){
                        $clientId = $rows[0]['clientId'];
                    }
                }
            }

            return $clientId;
            
        }
    }

    if(isset($_POST['submitButton'])){
        $var = new addWishListApi();

        if($_POST['listWishId'] == ""){
            $var->addWishList();
        }else{
            $var->updateWishList();
        }
    };

    if(isset($_POST['submitButtonDelete'])){
        $var = new addWishListApi();

        $var->deleteWishList();
    }

    if(isset($_POST['submitButtonProductToList'])){
        echo $_POST['wishListId'];
        $var = new addWishListApi();

        $var->insertProducrWishList();
    }
?>