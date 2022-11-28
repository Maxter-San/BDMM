<?php 
    include_once 'conection.php';

    class userClass extends DB{
        /*
        userId
        creationDate
        
        name
        mail
        password
        cellphone
        address
        profilePhoto
        
        userType
        */

        function insertUser(
            $name,
            $mail,
            $password,
            $cellphone,
            $profilePhoto
        ){
            $query = $this->connect()->query('
                                            INSERT INTO user (name, mail, password, cellphone, profilePhoto)
                                            VALUES("'.$name.'", "'.$mail.'", "'.$password.'", "'.$cellphone.'", "'.$profilePhoto.'");
                                            ');
            //$this->connect()->close();
            return $query;
        }

        function updateUser(
            $userId,
            $name,
            $mail,
            $password,
            $cellphone,
            $address,
            $profilePhoto
        ){
            $query = $this->connect()->query('
                                            UPDATE user
                                            SET name = "'.$name.'",
                                                mail = "'.$mail.'",
                                                password = "'.$password.'",
                                                cellphone = "'.$cellphone.'",
                                                address = "'.$address.'",
                                                profilePhoto = "'.$profilePhoto.'"
                                            WHERE userId = '.$userId.';
                                            ');
            //$this->connect()->close();
            return $query;
        }

        function updateUserType(
            $userId,
            $userType
        ){
            $query = $this->connect()->query('
                                            UPDATE user
                                            SET userType = "'.$userType.'"
                                            WHERE userId = '.$userId.';
                                            ');
            return $query;
        }

        function getAllUsers()
        {
            $query = $this->connect()->query('SELECT * FROM user;');
            //$this->connect()->close();
            return $query;
        }

        function getUserById(
            $userId
        ){
            $query = $this->connect()->query('SELECT * FROM user WHERE userId = '.$userId.';');
            //$this->connect()->close();
            return $query;
        }

    }

?>