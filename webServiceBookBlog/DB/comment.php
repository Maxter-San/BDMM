<?php 
    include_once 'conection.php';

    class commentClass extends DB{
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

        function insertComment(
            $comment,
            $reviewId
        ){
            $query = $this->connect()->query('
                                            INSERT INTO comment (comment, reviewId)
                                            VALUES("'.$comment.'", '.$reviewId.');
                                            ');
            //$this->connect()->close();
            return $query;
        }


        function getCommentByReview($reviewId)
        {
            $query = $this->connect()->query('SELECT * FROM comment WHERE reviewId = '.$reviewId.';');
            //$this->connect()->close();
            return $query;
        }

        function getAllComments()
        {
            $query = $this->connect()->query('SELECT * 
                                            FROM comment AS T1
                                            INNER JOIN user AS T2
                                            ON T1.userId = T2.userId;');
            //$this->connect()->close();
            return $query;
        }


    }

?>