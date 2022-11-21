<?php 
    include_once './dataBase/categoryClass.php';
    include_once './dataBase/shoppingCartClass.php';

    class filterRecordsApi{
        function searchLink(){
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

            $searchFilter = '';
            if(isset($_POST['orderBy'])){
                $searchFilter = $searchFilter.$_POST['orderBy'].'&';
            }
       
            if($categories != null){
                $searchFilter = $searchFilter.$categories;
            }

            header("Location: myShopping.php?orderBy=".$searchFilter);
            exit();
        }

        function searchSellerLink(){
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

            $searchFilter = '';
            if(isset($_POST['orderBy'])){
                if($_POST['orderBy'] == 'Group'){
                    $searchFilter = 'group='.$searchFilter.$_POST['orderBy'].'&';
                }else{
                    $searchFilter = 'orderBy='.$searchFilter.$_POST['orderBy'].'&';
                }
            }
       
            if($categories != null){
                $searchFilter = $searchFilter.$categories;
            }

            header("Location: mySales.php?".$searchFilter);
            exit();
        }

        function searchRecords(){
            $categoryClass = new categoryClass();
            $shoppingCartClass = new shoppingCartClass();
            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);
            $sellerRows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $sellerRows[] = $r;
            }
            $clientInfo = $sellerRows[0]['clientId'];

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

            $order = 'All';
            if(isset($_GET['orderBy'])){
                $order = $_GET['orderBy'];
            }

            $res = $shoppingCartClass->searchRecords($clientInfo, $order, $categories);

            $categoryClass->deleteFilterCategory();

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
                //echo json_encode($r);
            }

            return $rows;   
        }


        function searchRecordProducts($p_recordId){
            $categoryClass = new categoryClass();
            $shoppingCartClass = new shoppingCartClass();
            $userClass = new userClass();

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

            $order = 'All';

            if(isset($_GET['orderBy'])){
                $order = $_GET['orderBy'];
            }
    
            $search = $userClass->getProfileUserById($_SESSION['s_userId']);
            $userRows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $userRows[] = $r;
            }
    
            $res = null;
            if(isset($userRows[0]['clientId'])){
                $clientInfo = $userRows[0]['clientId'];
    
                $res = $shoppingCartClass->searchRecordProducts($clientInfo, null, $order, $categories, $p_recordId);
            }
            else if(isset($userRows[0]['sellerId'])){
                $sellerInfo = $userRows[0]['sellerId'];
    
                $res = $shoppingCartClass->searchRecordProducts(null, $sellerInfo, $order, $categories, null);
            }
    
            $categoryClass->deleteFilterCategory();
    
            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
                //echo json_encode($r);
            }

            return $rows;
            

        }

        function searchGroup(){
            $categoryClass = new categoryClass();
            $shoppingCartClass = new shoppingCartClass();
            $userClass = new userClass();

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
    
            $search = $userClass->getProfileUserById($_SESSION['s_userId']);
            $userRows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $userRows[] = $r;
            }
    

            $sellerInfo = $userRows[0]['sellerId'];
    
            $res = $shoppingCartClass->searchGroup($sellerInfo, $categories);

            $categoryClass->deleteFilterCategory();
                
            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
                //echo json_encode($r);
            }

            return $rows;
            

        }
    }


    if(isset($_POST['submitButtonSearchclientRecords'])){
        $prod = new filterRecordsApi();
        $prod->searchLink();
    }

    if(isset($_POST['submitButtonSearchSellerRecords'])){
        $prod = new filterRecordsApi();
        $prod->searchSellerLink();
    }