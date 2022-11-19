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
            while($r = mysqli_fetch_assoc($res)) {
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
?>