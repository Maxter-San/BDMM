<?php 
    include_once 'DB.php';

    class userClass extends DB{
        /*productId
        creationDate
        isActive
        name
        description
        quantity
        method
        price
        status
        views
        buying
        valoration
        sellerId
        adminId*/

        function insertProduct(
            $name,
            $description,
            $quantity,
            $method,
            $price,
            $sellerId
        ){
            $query = $this->connect()->query('CALL productProcedure(null, null, "'.$name.'", "'.$description.'", '.$quantity.', "'.$method.'", '.$price.', null, null, null, null, '.$sellerId.', null, null, null null, null, null, null, null, "insertProduct")');
        }
    }
?>