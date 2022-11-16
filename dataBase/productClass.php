<?php 
    include_once 'DB.php';

    class productClass extends DB{
        /*
        p_productId
        p_isActive

        p_name
        p_description
        p_quantity		
        p_method
        p_price
        p_status

	    p_views 		
        p_buying 		
        p_valoration 	
        
        p_clientId		
        p_sellerId 		
	    p_adminId		
        
        p_categoryId	
        p_categoriesIds
        
        productCategoryId 
        
        productmediaId	
        p_photo			
        p_video
        
        p_nameSearch
        p_limitSearch	

	    p_action*/

        function insertProduct(
            $name,
            $description,
            $quantity,
            $method,
            $price,
            $sellerId
        ){
            $query = $this->connect()->query('CALL productProcedure(null, null, "'.$name.'", "'.$description.'", '.$quantity.', "'.$method.'", '.$price.', null, null, null, null, null, '.$sellerId.', null, null, null, null, null, null, null, null, null, "insertProduct")');
            
            $productId = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, '.$sellerId.', null, null, null, null, null, null, null, null, null, "selectLastProductBySellerId")');
            return $productId;
        }

        function insertProductCategories(
            $p_productId,
            $p_categoryId
        ){
            $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, null, null, null, null, null, null, null, null, null, null, null, null, '.$p_categoryId.', null, null, null, null, null, null, null, "insertProductCategory")');
        
        }

        function insertProductMedia(
            $p_productId,
            $p_video,
            $p_photo
        ){
            if($p_video == null){
                $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "'.$p_photo.'", null, null, null, "insertProductmedia")');
            }else{
                $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "'.$p_video.'", null, null, "insertProductmedia")');
            }
            
        }

        function updateStatusProduct(
            $p_productId,
            $p_adminId,
            $p_status
        ){
            $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, null, null, null, null, null, "'.$p_status.'", null, null, null, null, null, '.$p_adminId.', null, null, null, null, null, null, null, null, "updateStatusProduct")');
            return $query;
        }

        function selectProductsByStatusBySellerId(
            $p_sellerId,
            $p_status
        ){
            $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, "'.$p_status.'", null, null, null, null, '.$p_sellerId.', null, null, null, null, null, null, null, null, null, "selectProductWithStatusBySellerId")');
            return $query;
        }

        function selectAprovedProductsByAdminId(
            $p_adminId
        ){
            $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, '.$p_adminId.', null, null, null, null, null, null, null, null, "selectAceptedProductsByAdminId")');
            return $query;
        }

        function selectAllProductsByStatus(
            $p_status
        ){
            $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, "'.$p_status.'", null, null, null, null, null, null, null, null, null, null, null, null, null, null, "selectAllProductsWithStatus")');
            return $query;
        }

        function selectPhotosByProductId(
            $p_productId
        ){
            $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "SelectPhotosByProductId")');
            return $query;
        }

        function selectCategoriesByProductId(
            $p_productId
        ){
            $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "SelectCategoriesByProductId")');
            return $query;
        }

    }
?>