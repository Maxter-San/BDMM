<?php 
    include_once './dataBase/categoryClass.php';
    include_once './dataBase/userClass.php';

    class categorypApi{
        function addCategory(){
            $categoryClass = new categoryClass();
            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);

            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }
            $adminInfo = $rows[0]['adminId'];

            $archivo = $_FILES["categoryPhoto"]["tmp_name"]; 
            $tamanio = $_FILES["categoryPhoto"]["size"];

            $fp = fopen($archivo, "rb");
            $profilePhotoBlob = fread($fp, $tamanio);
            $profilePhotoBlob = addslashes($profilePhotoBlob);
            fclose($fp);

            $res = $categoryClass->insertCategory($_POST['name'],
                                                  $_POST['description'],
                                                  $profilePhotoBlob,
                                                  $adminInfo
            );
            
            header("Location: addCategory.php?successful=add");
            

            exit();
        }

        function updateCategory(){
            $categoryClass = new categoryClass();

            $archivo = $_FILES["categoryPhoto"]["tmp_name"]; 
            $tamanio = $_FILES["categoryPhoto"]["size"];

            $fp = fopen($archivo, "rb");
            $profilePhotoBlob = fread($fp, $tamanio);
            $profilePhotoBlob = addslashes($profilePhotoBlob);
            fclose($fp);

            $res = $categoryClass->updateCategory($_POST['categoryId'],
                                                  $_POST['name'],
                                                  $_POST['description'],
                                                  $profilePhotoBlob
            );
            
            header("Location: addCategory.php?successful=update");
            

            exit();
        }

        function deleteCategory(){
            $categoryClass = new categoryClass();

            $res = $categoryClass->getCategoryWithProduct($_POST['categoryId']);

            if(mysqli_num_rows($res) > 0){
                header("Location: addCategory.php?failed=delete");

            }else{
                $res = $categoryClass->deleteCategory($_POST['categoryId']);
            
                header("Location: addCategory.php?successful=delete");
            }

            exit();
        }

        function getCreatedCategories(){
            $categoryClass = new categoryClass();
            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);

            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }
            $adminInfo = $rows[0]['adminId'];

            $res = $categoryClass->getCreatedCategories($adminInfo);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            //echo json_encode($rows);
            //echo $rows[0]['userId'];
            
            return $rows;
        }

        function getCreatedCategoriesProfile(){
            $categoryClass = new categoryClass();
            $userClass = new userClass();

            $search = -1;
            if(isset($_GET['p_userId'])){
                $search = $userClass->getProfileUserById($_GET['p_userId']);
            }else if(isset($_SESSION['s_userId'])){
                $search = $userClass->getProfileUserById($_SESSION['s_userId']);
            }

            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }
            $adminInfo = $rows[0]['adminId'];

            $res = $categoryClass->getCreatedCategories($adminInfo);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            //echo json_encode($rows);
            //echo $rows[0]['userId'];
            
            return $rows;
        }

        function getAllCategories(){
            $categoryClass = new categoryClass();
            $res = $categoryClass->getAllCategories();

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            //echo json_encode($rows);
            //echo $rows[0]['userId'];
            
            return $rows;   
        }

        function getCategoryWithProducts($categoryId){
            $categoryClass = new categoryClass();
            $res = $categoryClass->getCategoryWithProduct($categoryId);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            //echo json_encode($rows);
            //echo $rows[0]['userId'];
            
            return $rows;   
        }

        function getNumCategoryWithProducts($categoryId){
            $categoryClass = new categoryClass();
            $res = $categoryClass->getAceptedProductsInCategory($categoryId);

            $num = mysqli_num_rows($res);
            
            return $num;
        }
    }

    if(isset($_POST['submitButton'])){
        $var = new categorypApi();

        if($_POST['categoryId'] == ""){
            $var->addCategory();
        }else{
            $var->updateCategory();
        }
    };

    if(isset($_POST['submitButtonDelete'])){
        $var = new categorypApi();

        $var->deleteCategory();

    };

    //$var = new categorypApi();
//
    //$rows = $var->getCreatedCategories();
?>