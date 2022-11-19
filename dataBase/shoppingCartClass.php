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

        function updateCartProduct(
            $p_cartProductId,
            $p_quantity
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, null, '.$p_cartProductId.', '.$p_quantity.', null, "updateCartProduct")');
            //$this->connect()->close();
            return $query;
        }

        function deleteCartProduct(
            $p_cartProductId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, null, '.$p_cartProductId.', null, null, "deleteCartProduct")');
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

        function selectProductsByCartId(
            $p_cartId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure('.$p_cartId.', null, null, null, null, null, "selectProductsByCartId")');
            //$this->connect()->close();
            return $query;
        }

    }

?>