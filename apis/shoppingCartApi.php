<?php 
    include_once './dataBase/shoppingCartClass.php';
    include_once './dataBase/userClass.php';

    class shoppingCartApi{
        function insertCuotation(){
            $shoppingCartClass = new shoppingCartClass();
            $userClass = new userClass();

            if($_POST['quantity'] > 0){
                $search = $userClass->getProfileUserById($_SESSION['s_userId']);

                $rows = array();
                while($r = mysqli_fetch_assoc($search)) {
                    $rows[] = $r;
                }
                $clientInfo = $rows[0]['clientId'];

                $res = $shoppingCartClass->searchRepeatCuotation($clientInfo, $_POST['productId']);
                $rows = array();
                while($r = mysqli_fetch_assoc($res)) {
                    $rows[] = $r;
                }

                if(count($rows) == 0){
                    $shoppingCartClass->insertCuotation($_POST['quantity'], $clientInfo, $_POST['sellerId'], $_POST['productId']);

                    header("Location: product.php?productId=".$_POST['productId']."&successful=AddCuotation");
                }else{
                    header("Location: product.php?productId=".$_POST['productId']."&failed=AddCuotation");
                }
            }else{
                header("Location: product.php?productId=".$_POST['productId']."&failed=quantity");
            }
            exit();
        }

        function insertCuotationToCart(){
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

                    header("Location: quotationClient.php?successful=AddCuotation");
                }else{
                    header("Location: quotationClient.php?failed=AddCuotation");
                }
            }else{
                header("Location: quotationClient.php?failed=quantity");
            }
            exit();
        }

        function selectWaitingCuotationsByCliendId(){
            $userClass = new userClass();
            $shoppingCartClass = new shoppingCartClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);

            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }
            $clientInfo = $rows[0]['clientId'];

            $res = $shoppingCartClass->selectWaitingCuotationsByCliendId($clientInfo);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)){
                $rows[] = $r;
            }

            return $rows;
        }

        function selectWaitingCuotationsBySellerId(){
            $userClass = new userClass();
            $shoppingCartClass = new shoppingCartClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);

            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }
            $sellerInfo = $rows[0]['sellerId'];

            $res = $shoppingCartClass->selectWaitingCuotationsBySellerId($sellerInfo);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)){
                $rows[] = $r;
            }

            return $rows;
        }

        function updateCuotationStatus($status){
            $shoppingCartClass = new shoppingCartClass();

            if($status == 'Aceptado'){
                $shoppingCartClass->updateCuotationStatus($_POST['cuotationId'], $status, $_POST['price']);

                header("Location: quotationSeller.php?successful=acept");
            }else{
                $shoppingCartClass->updateCuotationStatus($_POST['cuotationId'], $status, null);

                header("Location: quotationSeller.php?successful=reject");
            }
            
            exit();
        }

        function deleteCuotation(){
            $shoppingCartClass = new shoppingCartClass();

            $shoppingCartClass->deleteCuotation($_POST['cuotationId']);

            header("Location: quotationClient.php?successful=delete");
            
            exit();
        }

        function deleteCuotationFromCart(){
            $shoppingCartClass = new shoppingCartClass();

            $shoppingCartClass->deleteCuotation($_POST['cuotationId']);

            header("Location: shoppingCart.php?successful=delete");
            
            exit();
        }

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

            $subtotal = 0;

            $rowsProduct = $this->selectProductsByCartId();
            for($i = 0;$i < count($rowsProduct);$i++){
                $productStock = $rowsProduct[$i]['stock'];    
                $shoppingCartItemQuantity = $rowsProduct[$i]['quantity'];
                $shoppingCartItemPrice = $rowsProduct[$i]['price'];
                $subtotal += $shoppingCartItemQuantity * $shoppingCartItemPrice;
            }

            $rowsProduct = $this->selectCuotationsByCartId();
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


            $rowsProduct = $this->selectProductsByCartId();
            for($i = 0;$i < count($rowsProduct);$i++){  

                $shoppingCartClass->insertRecordProduct($rowsProduct[$i]['quantity'],
                                                        $rowsProduct[$i]['price'],
                                                        $rowsProduct[$i]['productId'],
                                                        $rowsRecord[0]['recordId'],
                                                        $rowsProduct[$i]['sellerId']);

                $shoppingCartClass->deleteCartProduct($rowsProduct[$i]['cartProductId']);
            }

            $rowsProduct = $this->selectCuotationsByCartId();
            for($i = 0;$i < count($rowsProduct);$i++){  

                $shoppingCartClass->insertRecordProduct($rowsProduct[$i]['quantity'],
                                                        $rowsProduct[$i]['price'],
                                                        $rowsProduct[$i]['productId'],
                                                        $rowsRecord[0]['recordId'],
                                                        $rowsProduct[$i]['sellerId']);

                $shoppingCartClass->deleteCartProduct($rowsProduct[$i]['cartProductId']);
                $shoppingCartClass->deleteCuotation($rowsProduct[$i]['cuotationId']);
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

        function selectCuotationsByCartId(){
            $shoppingCartClass = new shoppingCartClass();
            $userClass = new userClass();

            $search = $userClass->getProfileUserById($_SESSION['s_userId']);

            $rows = array();
            while($r = mysqli_fetch_assoc($search)) {
                $rows[] = $r;
            }

            $clientInfo = $rows[0]['clientId'];

            $res = $shoppingCartClass->selectCuotationsByCartId($clientInfo);
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

    if(isset($_POST['submitButtonCuotation'])){
        $var = new shoppingCartApi();

        $var->insertCuotation();
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

    if(isset($_POST['submitButtonDeleteCuotation'])){
        $var = new shoppingCartApi();

        $var->deleteCuotation();
    }

    if(isset($_POST['submitButtonAceptCuotation'])){
        $var = new shoppingCartApi();

        $var->updateCuotationStatus('Aceptado');
    }

    if(isset($_POST['submitButtonRejectCuotation'])){
        $var = new shoppingCartApi();

        $var->updateCuotationStatus('Rechazado');
    }

    if(isset($_POST['submitButtonAddCuotationToCart'])){
        $var = new shoppingCartApi();

        $var->insertCuotationToCart();
    }

    if(isset($_POST['submitButtonDeleteCuotationFromCart'])){
        $var = new shoppingCartApi();

        $var->deleteCuotationFromCart();
    }
?>