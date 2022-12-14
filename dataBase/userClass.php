<?php 
    include_once 'DB.php';

    class userClass extends DB{
        /*
        userId
        isActive
        userName
        password
        email
        profilePhoto
        description
        userType
        name
        lastName
        birthDay
        gender
        address
        postalCode
        city
        state
        debitCard
        isDebitCard
        isPaypal
        isOxxo 
        superAdminId
        nameSearch
        action
        */

        function insertUser(
            $userName,
            $password,
            $email,
            $profilePhoto,
            $name,
            $lastName,
            $birthDay,
            $gender,
            $userType
        ){
            if($userType == 'Comprador'){
                $query = $this->connect()->query('CALL userProcedure(null, null, "'.$userName.'", "'.$password.'", "'.$email.'", "'.$profilePhoto.'", null, null, null, "'.$name.'", "'.$lastName.'", "'.$birthDay.'", "'.$gender.'", null, null, null, null, null, null, null, null, null, null, "insertClient")');

                return $query;
            }else if($userType == 'Vendedor'){
                $query = $this->connect()->query('CALL userProcedure(null, null, "'.$userName.'", "'.$password.'", "'.$email.'", "'.$profilePhoto.'", null, null, null, "'.$name.'", "'.$lastName.'", "'.$birthDay.'", "'.$gender.'", null, null, null, null, null, null, null, null, null, null, "insertSeller")');

                return $query;            
            }else if($userType == 'Admin'){
            $query = $this->connect()->query('CALL userProcedure(null, null, "'.$userName.'", "'.$password.'", "'.$email.'", "'.$profilePhoto.'", null, null, null, "'.$name.'", "'.$lastName.'", "'.$birthDay.'", "'.$gender.'", null, null, null, null, null, null, null, null, null, null, "insertAdmin")');

            return $query;            
            }
        }

        function findRepeatUser(
            $userName
        ){
            $query = $this->connect()->query('CALL userProcedure(null, null, "'.$userName.'", null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "selectRepeatUser")');
            
            return $query;
        }

        function findAnotherRepeatUser(
            $userId,
            $userName
        ){
            $query = $this->connect()->query('CALL userProcedure("'.$userId.'", null, "'.$userName.'", null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "selectAnotherRepeatUserByID")');
            
            return $query;
        }

        function findRepeatEmail(
            $email,
            $userType
        ){
            $query = $this->connect()->query('CALL userProcedure(null, null, null, null, "'.$email.'", null, null, null, "'.$userType.'", null, null, null, null, null, null, null, null, null, null, null, null, null, null, "selectRepeatEmail")');
            
            return $query;
        }

        function getLogin(
            $userName,
            $password,
            $userType
        ){
            $query = $this->connect()->query('CALL userProcedure(null, null, "'.$userName.'", "'.$password.'", null, null, null, null, "'.$userType.'", null, null, null, null, null, null, null, null, null, null, null, null, null, null, "'."getUserLogin".'")');

            return $query;

        }

        function getProfileUserById(
            $userId
        ){
            $query = $this->connect()->query('CALL userProcedure("'.$userId.'", null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "'."selectUserProfileById".'")');

            return $query;

        }

        function updateUser(
            $userId,
            $userName,
            $password,
            $profilePhoto,
            $coverPhoto,
            $description,
            $name,
            $lastName,
            $birthDay,
            $gender,
            $address,
            $postalCode,
            $city,
            $state,
            $debitCard,
            $isDebitCard,
            $isPaypal,
            $isOxxo,
            $isVisible
        ){
            $paramProfilePhoto = 'null';
            if($profilePhoto != null){
                $paramProfilePhoto = '"'.$profilePhoto.'"';
            }

            $paramCoverPhoto = 'null';
            if($coverPhoto != null){
                $paramCoverPhoto = '"'.$coverPhoto.'"';
            }

            $paramIsVisible = 'false';
            if($isVisible){
                $paramIsVisible = 'true';
            }

            $query = $this->connect()->query('CALL userProcedure("'.$userId.'", '.$paramIsVisible.', "'.$userName.'", "'.$password.'", null, '.$paramProfilePhoto.', '.$paramCoverPhoto.', "'.$description.'", null, "'.$name.'", "'.$lastName.'", "'.$birthDay.'", "'.$gender.'", "'.$address.'", "'.$postalCode.'", "'.$city.'", "'.$state.'", "'.$debitCard.'", "'.$isDebitCard.'", "'.$isPaypal.'", "'.$isOxxo.'", null, null, "updatUserData")');

                return $query;
        }

        function deleteUser(
            $userId,
            $isActive
        ){
            $value = '';
            if($isActive){
                $value = 'true';
            }else{
                $value = 'false';
            }
            $query = $this->connect()->query('CALL userProcedure("'.$userId.'", '.$value.', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "deleteUser")');

                return $query;
        }

        function getComunity(
            $userName,
            $userType,
            $orderBy
        ){
            $order = 'searchResultUserByCreationDateDesc';
            if($orderBy == 'newer'){
                $order = 'searchResultUserByCreationDateDesc';
            }else if($orderBy == 'older'){
                $order = 'searchResultUserByCreationDateAsc';
            }else if($orderBy == 'asc'){
                $order = 'searchResultUserByAZ';
            }else if($orderBy == 'desc'){
                $order = 'searchResultUserByZA';
            }

            if($userType != null){
                $query = $this->connect()->query('CALL userProcedure(null, null, null, null, null, null, null, null, "'.$userType.'", null, null, null, null, null, null, null, null, null, null, null, null, null, "'.$userName.'", "'.$order.'")');
            }
            else{
                $query = $this->connect()->query('CALL userProcedure(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, "'.$userName.'", "'.$order.'")');
            }

            return $query;

        }
    }

?>