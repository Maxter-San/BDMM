<?php 
    include_once 'DB.php';

    class categoryClass extends DB{
        /*
        p_categoryId
        p_isActive

        p_name
        p_description
        p_photo
        p_adminId
        
        p_action
        */

        function insertCategory(
            $p_name,
            $p_description,
            $p_photo,
            $p_adminId
        ){
            $query = $this->connect()->query('CALL categoryProcedure(null, null, "'.$p_name.'", "'.$p_description.'", "'.$p_photo.'", '.$p_adminId.', "insertCategory")');
            //$this->connect()->close();
            return $query;

        }

        function insertFilterCategory(
            $p_categoryId
        ){
            $query = $this->connect()->query('CALL categoryProcedure('.$p_categoryId.', null, null, null, null, null, "fillFilterCategoryTable")');
            //$this->connect()->close();
            return $query;

        }

        function updateCategory(
            $p_categoryId,
            $p_name,
            $p_description,
            $p_photo
        ){
            $query = $this->connect()->query('CALL categoryProcedure('.$p_categoryId.', null, "'.$p_name.'", "'.$p_description.'", "'.$p_photo.'", null, "updateCategory")');
            //$this->connect()->close();
            return $query;
        }

        function deleteCategory(
        ){
            $query = $this->connect()->query('CALL categoryProcedure(null, null, null, null, null, null, "deleteFilterTable")');
            //$this->connect()->close();
            return $query;
        }

        function deleteFilterCategory(
            $p_categoryId
        ){
            $query = $this->connect()->query('CALL categoryProcedure('.$p_categoryId.', null, null, null, null, null, "fillFilterCategoryTable")');
            //$this->connect()->close();
            return $query;

        }

        function getCreatedCategories(
            $p_adminId
        ){
            $query = $this->connect()->query('CALL categoryProcedure(null, null, null, null, null, '.$p_adminId.', "selectCreatedCategories")');
            //$this->connect()->close();
            return $query;
        }

        function getAllCategories()
        {
            $query = $this->connect()->query('CALL categoryProcedure(null, null, null, null, null, null, "selectAllCategories")');
            //$this->connect()->close();
            return $query;
        }

        function getCategoryWithProduct(
            $p_categoryId
        )
        {
            $query = $this->connect()->query('CALL categoryProcedure('.$p_categoryId.', null, null, null, null, null, "selectCategoryWithProduct")');
            //$this->connect()->close();
            return $query;
        }

        function getAceptedProductsInCategory(
            $p_categoryId
        )
        {
            $query = $this->connect()->query('CALL categoryProcedure('.$p_categoryId.', null, null, null, null, null, "selectAceptedProductsInCategory")');
            //$this->connect()->close();
            return $query;
        }

    }

?>