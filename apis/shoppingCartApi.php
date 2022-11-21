<?php 
    include_once './dataBase/shoppingCartClass.php';
    include_once './dataBase/userClass.php';

    class shoppingCartApi{
        function insertProductToCart(){
            $shoppingCartClass = new shoppingCartClass();
            $userClass = new userClass();

            if($_POST['quantity'] > 0){
                $search = $userClass->getProfileUserById($_SESSION['s_userId']);

                $rows = array();
                while($r = mysqli_fetch_assoc($search)) {
                    $rows[] = $r;
                }
                $clientInfo = $rows[0]['clientId'];

                $res = $shoppingCartClass->searchProductInCart($clientInfo, $_POST['productId']);
                $rows = array();
                while($r = mysqli_fetch_assoc($res)) {
                    $rows[] = $r;
                }

                if(count($rows) == 0){
                    $shoppingCartClass->insertCartProduct($clientInfo, $_POST['productId'], $_POST['quantity']);
                    header("Location: product.php?productId=".$_POST['productId']."&successful=AddCart");
                }else{
                    header("Location: product.php?productId=".$_POST['productId']."&failed=AddCart");
                }
            }else{
                header("Location: product.php?productId=".$_POST['productId']."&failed=quantity");
            }
            exit();
        }

        function insertRecord(){
            $shoppingCartClass = new shoppingCartClass();
            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);
            $rowsUser = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rowsUser[] = $r;
            } 
            $clientInfo = $rowsUser[0]['clientId'];

            $rowsProduct = $this->selectProductsByCartId();
            $subtotal = 0;     
            for($i = 0;$i < count($rowsProduct);$i++){
                $productStock = $rowsProduct[$i]['stock'];    
                $shoppingCartItemQuantity = $rowsProduct[$i]['quantity'];
                $shoppingCartItemPrice = $rowsProduct[$i]['price'];
                $subtotal += $shoppingCartItemQuantity * $shoppingCartItemPrice;
            }

            $record = $shoppingCartClass->insertRecord($clientInfo, number_format($subtotal, 2, '.', ''), $_POST['payMethod']);

            $rowsRecord = array();
            while($r = mysqli_fetch_assoc($record)) {
                $rowsRecord[] = $r;
            }

            for($i = 0;$i < count($rowsProduct);$i++){  

                $shoppingCartClass->insertRecordProduct($rowsProduct[$i]['quantity'],
                                                        $rowsProduct[$i]['price'],
                                                        $rowsProduct[$i]['productId'],
                                                        $rowsRecord[0]['recordId'],
                                                        $rowsProduct[$i]['sellerId']);

                $shoppingCartClass->deleteCartProduct($rowsProduct[$i]['cartproductId']);
            }
            

            header("Location: record.php");
            exit();
        }

        function insertComment(){
            $shoppingCartClass = new shoppingCartClass();
            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);
            $rowsUser = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rowsUser[] = $r;
            } 
            $clientInfo = $rowsUser[0]['clientId'];

            $shoppingCartClass->insertComment($_POST['comment'],
                                              $_POST['valoration'],
                                              $clientInfo,
                                              $_POST['productId'],
                                              $_POST['recordProductId']);

            header("Location: myShopping.php?successful=comment");
            exit();
        }

        function selectProductsByCartId(){
            $shoppingCartClass = new shoppingCartClass();
            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);

            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }

            $clientInfo = $rows[0]['clientId'];

            $res = $shoppingCartClass->selectProductsByCartId($clientInfo);
            $rows = array();
            while($r = mysqli_fetch_assoc($res)){
                $rows[] = $r;
            }

            return $rows;
        }

        function updateCartProduct(){
            $shoppingCartClass = new shoppingCartClass();

            $shoppingCartClass->updateCartProduct($_POST['cartProductId'], $_POST['quantity']);
            
            header("Location: shoppingCart.php");
            
            exit();
        }

        function deleteCartProduct(){
            $shoppingCartClass = new shoppingCartClass();

            $shoppingCartClass->deleteCartProduct($_POST['cartProductId']);
            
            header("Location: shoppingCart.php?successful=delete");
            
            exit();
        }

        function selectPayMethod(){
            $shoppingCartClass = new shoppingCartClass();
            $userClass = new userClass();
            $search = $userClass->getProfileUserById($_SESSION['s_userId']);

            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }
            $clientInfo = $rows[0]['clientId'];

            $payMethod = $shoppingCartClass->selectPayMethod($clientInfo);
            $rows = array();
            while($r = mysqli_fetch_assoc($payMethod)) {
                $rows[] = $r;
            }
            
            return $rows;
        }

        function selectAllRecordsByClientId(){
            $shoppingCartClass = new shoppingCartClass();
            $userClass = new userClass();

            $index = 0;
            
            if(isset($_SESSION["s_userId"])){
                $index = $_SESSION["s_userId"];
            }

            if(isset($_GET["p_userId"])){
                $index = $_GET["p_userId"];
            }

            $search = $userClass->getProfileUserById($index);

            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }
            
            if(isset($rows[0]['clientId'])){
                $clientInfo = $rows[0]['clientId'];

                $res = $shoppingCartClass->selectAllRecordsByClientId($clientInfo);

                $rows = array();
                while($r = mysqli_fetch_assoc($res)) {
                    $rows[] = $r;
                }

                return $rows;
            }
        }

        function selectRecordsByClientId(){
            $shoppingCartClass = new shoppingCartClass();
            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);

            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }
            
            $clientInfo = $rows[0]['clientId'];

            $res = $shoppingCartClass->selectRecordsByClientId($clientInfo);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }

            return $rows;
        }

        function selectRecordProductsByRecordId($p_recordId){
            $shoppingCartClass = new shoppingCartClass();

            $res = $shoppingCartClass->selectRecordProductsByRecordId($p_recordId);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }

            return $rows;
        }

        function selectCommentByRecordProductId($p_recordProductId){
            $shoppingCartClass = new shoppingCartClass();

            $res = $shoppingCartClass->selectCommentByRecordProductId($p_recordProductId);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }

            return $rows;
        }

        function selectCommentsByProductId($p_productId){
            $shoppingCartClass = new shoppingCartClass();

            $res = $shoppingCartClass->selectCommentsByProductId($p_productId);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }

            return $rows;
        }

        function getDebitCard(){
            $shoppingCartClass = new shoppingCartClass();
            $userClass = new userClass();
            $search = $userClass->getProfileUserById($_SESSION['s_userId']);

            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }
            $clientInfo = $rows[0]['debitCard'];

            return '**** **** **** '.substr($clientInfo, 12, 4);
        }
    }

    if(isset($_POST['submitButtonAddToCart'])){
        $var = new shoppingCartApi();

        $var->insertProductToCart();
    };

    if(isset($_POST['buttonSubmitQuantity'])){
        $var = new shoppingCartApi();

        $var->updateCartProduct();
    };

    if(isset($_POST['submitButtonDeleteProduct'])){
        $var = new shoppingCartApi();

        $var->deleteCartProduct();
    };

    if(isset($_POST['submitButtonPay'])){
        $var = new shoppingCartApi();

        $var->insertRecord();
    }

    if(isset($_POST['buttonSubmitComment'])){
        $var = new shoppingCartApi();

        $var->insertComment();
    }
?>