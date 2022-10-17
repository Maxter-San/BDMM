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
                $sql = "CALL userProcedure(null, null, $userName, $password, $email, $profilePhoto, null, null, $name, $lastName, $birthDay, $gender, null, null, null, null, null, null, null, null, null, null, 'insertClient')";

                if ($this->conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $this->conn->error;
                }

                $this->conn->close();
            }
        }

        function getLogin(
            $userName,
            $password,
            $userType
        ){
            $query = $this->connect()->query('CALL userProcedure(null, null, "'.$userName.'", "'.$password.'", null, null, null, "'.$userType.'", null, null, null, null, null, null, null, null, null, null, null, null, null, null, "'."getUserLogin".'")');

            return $query;

        }
    }

?>