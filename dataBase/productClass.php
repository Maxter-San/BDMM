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

        function insertViewedProduct(
            $p_productId,
            $clientId
        ){
            $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, null, null, null, null, null, null, null, null, null, '.$clientId.', null, null, null, null, null, null, null, null, null, null, "insertViewedProduct")');
            
            return $query;
        }

        function updateProduct(
            $p_productId,
            $name,
            $description,
            $quantity,
            $price
        ){
            $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, "'.$name.'", "'.$description.'", '.$quantity.', null, '.$price.', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "updateProduct")');
            
            return $query;
        }        

        function updateStatusProduct(
            $p_productId,
            $p_adminId,
            $p_status
        ){
            $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, null, null, null, null, null, "'.$p_status.'", null, null, null, null, null, '.$p_adminId.', null, null, null, null, null, null, null, null, "updateStatusProduct")');
            return $query;
        }

        function updateProductOutStock(
            $p_sellerId
        ){
            $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, '.$p_sellerId.', null, null, null, null, null, null, null, null, null, "updateProductOutStock")');
            return $query;
        }

        function deleteProduct(
            $p_productId
        ){
            $query = $this->connect()->query('CALL productProcedure('.$p_productId.', false, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "deleteProduct")');
            return $query;
        }

        function deleteProductCategories(
            $p_productId
        ){
            $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "deleteProductCategory")');
            
            return $query;
        }

        function deleteProductMedia(
            $productmediaId
        ){
            $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '.$productmediaId.', null, null, null, null, "deleteProductMedia")');
            
            return $query;
        }

        function selectProductsById(
            $p_productId
        ){
            $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "selectProductById")');
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

        function selectProductBySellerIdAndProductId(
            $p_productId,
            $p_sellerId
        ){
            $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, null, null, null, null, null, null, null, null, null, null, '.$p_sellerId.', null, null, null, null, null, null, null, null, null, "selectProductByProductIdAndSellerId")');
            return $query;
        }

        function selectPhotosByProductId(
            $p_productId
        ){
            $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "SelectPhotosByProductId")');
            return $query;
        }

        function selectVideosByProductId(
            $p_productId
        ){
            $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "SelectVideosByProductId")');
            return $query;
        }

        function selectCategoriesByProductId(
            $p_productId
        ){
            $query = $this->connect()->query('CALL productProcedure('.$p_productId.', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "SelectCategoriesByProductId")');
            return $query;
        }

        function selectProductsByCategory(
            $p_sellerId,
            $p_categoriesId
        ){
            if($p_categoriesId != null){
                $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, '.$p_sellerId.', null, null, "filter", null, null, null, null, null, null, "selectProductsByCategory")');
                return $query;
            }else{
                $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, '.$p_sellerId.', null, null, null, null, null, null, null, null, null, "selectProductsByCategory")');
                return $query;
            }
        }

        function searchProducts(
            $p_name,
            $p_categoriesId,
            $p_filter
        ){
            if($p_categoriesId != null){
                if($p_filter == 'BuyingAsc'){
                    $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '.$p_categoriesId.', null, null, null, null, "'.$p_name.'", null, "searchResultProductsByBuyingAsc")');
                    return $query;
                } else if($p_filter == 'BuyingDesc'){
                    $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '.$p_categoriesId.', null, null, null, null, "'.$p_name.'", null, "searchResultProductsByBuyingDesc")');
                    return $query;
                } else if($p_filter == 'PriceAsc'){
                    $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '.$p_categoriesId.', null, null, null, null, "'.$p_name.'", null, "searchResultProductsByPriceAsc")');
                    return $query;
                } else if($p_filter == 'PriceDesc'){
                    $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '.$p_categoriesId.', null, null, null, null, "'.$p_name.'", null, "searchResultProductsByPriceDesc")');
                    return $query;
                }else if($p_filter == 'ValorationAsc'){
                    $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '.$p_categoriesId.', null, null, null, null, "'.$p_name.'", null, "searchResultProductsByValorationAsc")');
                    return $query;
                } else if($p_filter == 'ValorationDesc'){
                    $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '.$p_categoriesId.', null, null, null, null, "'.$p_name.'", null, "searchResultProductsByValorationDesc")');
                    return $query;
                }
            }else{
                if($p_filter == 'BuyingAsc'){
                    $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "'.$p_name.'", null, "searchResultProductsByBuyingAsc")');
                    return $query;
                } else if($p_filter == 'BuyingDesc'){
                    $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "'.$p_name.'", null, "searchResultProductsByBuyingDesc")');
                    return $query;
                } else if($p_filter == 'PriceAsc'){
                    $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "'.$p_name.'", null, "searchResultProductsByPriceAsc")');
                    return $query;
                } else if($p_filter == 'PriceDesc'){
                    $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "'.$p_name.'", null, "searchResultProductsByPriceDesc")');
                    return $query;
                }else if($p_filter == 'ValorationAsc'){
                    $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "'.$p_name.'", null, "searchResultProductsByValorationAsc")');
                    return $query;
                } else if($p_filter == 'ValorationDesc'){
                    $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "'.$p_name.'", null, "searchResultProductsByValorationDesc")');
                    return $query;
                }
            }
        }

        function mainProducts(
            $p_filter,
            $p_clientId
        ){
            $param = 'null';
            if($p_clientId != null){
                $param = $p_clientId;
            }
            $query = $this->connect()->query('CALL productProcedure(null, null, null, null, null, null, null, null, null, null, null, '.$param.', null, null, null, null, null, null, null, null, null, null, "'.$p_filter.'")');
            return $query;
        }

    }
?>