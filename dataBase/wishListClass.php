<?php 
    include_once 'DB.php';

    class wishListClass extends DB{

        /*
        p_listwishId

        p_name
        p_description
        p_photo
        p_listType
        p_clientId
        p_productId

        p_action
        */

        function insertWishList(
            $p_name,
            $p_description,
            $p_photo,
            $p_listType,
            $p_clientId
        ){
            $query = $this->connect()->query('CALL wishListProcedure(null, "'.$p_name.'", "'.$p_description.'", "'.$p_photo.'", "'.$p_listType.'", '.$p_clientId.', null, "insertWishList")');
            //$this->connect()->close();
            return $query;

        }

        function updateWishList(
            $p_listwishId,
            $p_name,
            $p_description,
            $p_photo,
            $p_listType
        ){
            if($p_photo == null){
                $query = $this->connect()->query('CALL wishListProcedure('.$p_listwishId.', "'.$p_name.'", "'.$p_description.'", null, "'.$p_listType.'", null, null, "updateWishList")');
                //$this->connect()->close();
                return $query;
            }else{
                $query = $this->connect()->query('CALL wishListProcedure('.$p_listwishId.', "'.$p_name.'", "'.$p_description.'", "'.$p_photo.'", "'.$p_listType.'", null, null, "updateWishList")');
                //$this->connect()->close();
                return $query;
            }
        }

        function deleteWishList(
            $p_listwishId
        ){
            $query = $this->connect()->query('CALL wishListProcedure('.$p_listwishId.', null, null, null, null, null, null, "deleteWishList")');
            //$this->connect()->close();
            return $query;
        }

        function selectCreatedWishList(
            $p_clientId
        ){
            $query = $this->connect()->query('CALL wishListProcedure(null, null, null, null, null, '.$p_clientId.', null, "selectCreatedWishList")');
            //$this->connect()->close();
            return $query;
        }

        function selectWishListByClientId(
            $p_clientId
        ){
            $query = $this->connect()->query('CALL wishListProcedure(null, null, null, null, null, '.$p_clientId.', null, "selectWishListByClientId")');
            //$this->connect()->close();
            return $query;
        }

        function selectProductsWishListById(
            $p_listwishId
        ){
            $query = $this->connect()->query('CALL wishListProcedure('.$p_listwishId.', null, null, null, null, null, null, "selectProductsWishListById")');
            //$this->connect()->close();
            return $query;
        }
    }

?>