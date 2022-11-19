<?php 
    include_once 'DB.php';

    class shoppingCartClass extends DB{
        /*
        
        */

        function insertCartProduct(
            $p_cartId,
            $p_productId,
            $p_quantity
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure('.$p_cartId.', null, null, null, '.$p_quantity.', '.$p_productId.', "insertCartProduct")');
            //$this->connect()->close();
            return $query;
        }

        function searchProductInCart(
            $p_cartId,
            $p_productId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure('.$p_cartId.', null, null, null, null, '.$p_productId.', "searchProductInCart")');
            //$this->connect()->close();
            return $query;
        }

    }

?>