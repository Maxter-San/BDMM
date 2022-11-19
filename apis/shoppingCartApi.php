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
    }

    if(isset($_POST['submitButtonAddToCart'])){
        $var = new shoppingCartApi();

        $var->insertProductToCart();
    };
?>