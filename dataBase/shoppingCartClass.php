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

        p_comment
        p_valoration
        p_recordProductId

        p_orderBy
        p_categories

        p_action
        */

        function insertCartProduct(
            $p_cartId,
            $p_productId,
            $p_quantity
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure('.$p_cartId.', null, null, null, '.$p_quantity.', '.$p_productId.', null, null, null, null, null, null, null, null, null, "insertCartProduct")');
            //$this->connect()->close();
            return $query;
        }

        function insertRecord(
            $p_clientId,
            $p_price,
            $p_payMethod
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, '.$p_clientId.', null, null, null, '.$p_price.', "'.$p_payMethod.'", null, null, null, null, null, null, null, "insertRecord")');
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
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, null, null, '.$p_quantity.', '.$p_productId.', '.$p_price.', null, '.$p_recordId.', '.$p_sellerId.', null, null, null, null, null, "insertRecordProduct")');
            //$this->connect()->close();
            return $query;
        }

        function insertComment(
            $p_comment,
            $p_valoration,
            $p_clientId,
            $p_productId,
            $p_recordProductId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, '.$p_clientId.', null, null, '.$p_productId.', null, null, null, null, "'.$p_comment.'", '.$p_valoration.', '.$p_recordProductId.', null, null, "insertComment")');
            //$this->connect()->close();
            return $query;
        }

        function updateCartProduct(
            $p_cartProductId,
            $p_quantity
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, null, '.$p_cartProductId.', '.$p_quantity.', null, null, null, null, null, null, null, null, null, null, "updateCartProduct")');
            //$this->connect()->close();
            return $query;
        }

        function deleteCartProduct(
            $p_cartProductId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, null, '.$p_cartProductId.', null, null, null, null, null, null, null, null, null, null, null, "deleteCartProduct")');
            //$this->connect()->close();
            return $query;
        }

        function searchProductInCart(
            $p_cartId,
            $p_productId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure('.$p_cartId.', null, null, null, null, '.$p_productId.', null, null, null, null, null, null, null, null, null, "searchProductInCart")');
            //$this->connect()->close();
            return $query;
        }

        function selectProductsByCartId(
            $p_cartId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure('.$p_cartId.', null, null, null, null, null, null, null, null, null, null, null, null, null, null, "selectProductsByCartId")');
            //$this->connect()->close();
            return $query;
        }

        function selectPayMethod(
            $p_clientId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, '.$p_clientId.', null, null, null, null, null, null, null, null, null, null, null, null, "selectPayMethodByClientId")');
            //$this->connect()->close();
            return $query;
        }

        function selectAllRecordsByClientId(
            $p_clientId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, '.$p_clientId.', null, null, null, null, null, null, null, null, null, null, null, null, "selectAllRecordsByClientId")');
            //$this->connect()->close();
            return $query;
        }

        function selectRecordsByClientId(
            $p_clientId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, '.$p_clientId.', null, null, null, null, null, null, null, null, null, null, null, null, "selectRecordsByClientId")');
            //$this->connect()->close();
            return $query;
        }

        function selectRecordProductsByRecordId(
            $p_recordId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, null, null, null, null, null, null, '.$p_recordId.', null, null, null, null, null, null, "selectRecordProductsByRecordId")');
            //$this->connect()->close();
            return $query;
        }

        function selectCommentByRecordProductId(
            $p_recordProductId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, null, null, null, null, null, null, null, null, null, null, '.$p_recordProductId.', null, null, "selectCommentByRecordProductId")');
            //$this->connect()->close();
            return $query;
        }

        function selectCommentsByProductId(
            $p_productId
        ){
            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, null, null, null, '.$p_productId.', null, null, null, null, null, null, null, null, null, "selectCommentsByProductId")');
            //$this->connect()->close();
            return $query;
        }

        function searchRecords(
            $p_clientId,
            $p_orderBy,
            $p_categories

        ){
            if($p_categories == null){
                $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, '.$p_clientId.', null, null, null, null, null, null, null, null, null, null, "'.$p_orderBy.'", null, "searchRecords")');
                //$this->connect()->close();
                return $query;
            }else{
                $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, '.$p_clientId.', null, null, null, null, null, null, null, null, null, null, "'.$p_orderBy.'", "'.$p_categories.'", "searchRecords")');
                //$this->connect()->close();
                return $query;
            }
        }

        function searchRecordProducts(
            $p_clientId,
            $p_sellerId,
            $p_orderBy,
            $p_categories,
            $p_recordId

        ){
            $paramcliendId = 'null';
            if($p_clientId != null){
                $paramcliendId = $p_clientId;
            }

            $paramSellerId = 'null';
            if($p_sellerId != null){
                $paramSellerId = $p_sellerId;
            }

            $paramCategories = 'null';
            if($p_categories != null){
                $paramCategories = '"'.$p_categories.'"';
            }

            $paramRecordId = 'null';
            if($p_recordId != null){
                $paramRecordId = $p_recordId;
            }

            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, '.$paramcliendId.', null, null, null, null, null, '.$paramRecordId.', '.$paramSellerId.', null, null, null, "'.$p_orderBy.'", '.$paramCategories.', "searchRecordProducts")');
            //$this->connect()->close();
            return $query;
            
        }

        function searchGroup(
            $p_sellerId,
            $p_categories
        ){
            $paramCategories = 'null';
            if($p_categories != null){
                $paramCategories = '"'.$p_categories.'"';
            }

            $query = $this->connect()->query('CALL shoppingCartProcedure(null, null, null, null, null, null, null, null, null, '.$p_sellerId.', null, null, null, null, '.$paramCategories.', "searchGroup")');
            //$this->connect()->close();
            return $query;
            
        }

    }

?>