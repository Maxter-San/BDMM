<?php 
    include_once 'DB.php';

    class shoppingCartClass extends DB{
        /*
        p_cartId
        p_isActive
        p_clientId
        
        p_cartProductId
        p_quantity
        p_productId
        p_price

        p_payMethod
        p_recordId
        p_sellerId

        p_action
        */

        function insertCartProduct(
            $p_cartId,
            $p_productId,
            $p_quantity
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure('.$p_cartId.', null, null, null, '.$p_quantity.', '.$p_productId.', null, null, null, null, "insertCartProduct")');
            //$this->connect()->close();
            return $query;
        }

        function insertRecord(
            $p_clientId,
            $p_price,
            $p_payMethod
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, '.$p_clientId.', null, null, null, '.$p_price.', "'.$p_payMethod.'", null, null, "insertRecord")');
            //$this->connect()->close();
            return $query;
        }

        function insertRecordProduct(
            $p_quantity,
            $p_price,
            $p_productId,
            $p_recordId,
            $p_sellerId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, null, null, '.$p_quantity.', '.$p_productId.', '.$p_price.', null, '.$p_recordId.', '.$p_sellerId.', "insertRecordProduct")');
            //$this->connect()->close();
            return $query;
        }

        function updateCartProduct(
            $p_cartProductId,
            $p_quantity
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, null, '.$p_cartProductId.', '.$p_quantity.', null, null, null, null, null, "updateCartProduct")');
            //$this->connect()->close();
            return $query;
        }

        function deleteCartProduct(
            $p_cartProductId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, null, '.$p_cartProductId.', null, null, null, null, null, null, "deleteCartProduct")');
            //$this->connect()->close();
            return $query;
        }

        function searchProductInCart(
            $p_cartId,
            $p_productId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure('.$p_cartId.', null, null, null, null, '.$p_productId.', null, null, null, null, "searchProductInCart")');
            //$this->connect()->close();
            return $query;
        }

        function selectProductsByCartId(
            $p_cartId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure('.$p_cartId.', null, null, null, null, null, null, null, null, null, "selectProductsByCartId")');
            //$this->connect()->close();
            return $query;
        }

        function selectPayMethod(
            $p_clientId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, '.$p_clientId.', null, null, null, null, null, null, null, "selectPayMethodByClientId")');
            //$this->connect()->close();
            return $query;
        }

    }

?>