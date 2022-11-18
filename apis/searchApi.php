<?php 
    include_once './dataBase/productClass.php';
    include_once './dataBase/userClass.php';
    include_once './dataBase/categoryClass.php';

    class searchApi{

        function searchLink(){
            header("Location: searchFilterProducts.php?name=".$_POST['search']);
            exit();

        }

        function searchLinkAdvanced(){
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
            if(isset($_POST['name'])){
                $searchFilter = $searchFilter.$_POST['name'].'&';
            }
       
            if($categories != null){
                $searchFilter = $searchFilter.$categories.'&';
            }

            if(isset($_POST['orderBy'])){
                $searchFilter = $searchFilter.'orderBy='.$_POST['orderBy'];
            }

            header("Location: searchFilterProducts.php?name=".$searchFilter);
            exit();
        }

        function searchProducts(){
            $productClass = new productClass();
            $categoryClass = new categoryClass();

            $productName = null;
            if($_GET['name'] != ''){
                $productName = $_GET['name'];
            }


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

            $res = $productClass->searchProducts($productName, $categories, $_GET['orderBy']);

            $categoryClass->deleteFilterCategory();

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
                echo json_encode($r);
            }

            return $rows;   
        }

    }


    if(isset($_POST['submitButtonSearchProduct'])){
        $prod = new searchApi();
        $prod->searchLink();
    }

    if(isset($_POST['submitButtonSearchProductAdvanced'])){
        $prod = new searchApi();
        $prod->searchLinkAdvanced();
    }

?>