

<?php 
    include_once 'conection.php';

    class reviewClass extends DB{
        /*
        reviewId
        creationDate
        status

        title
        description
        image
        valoration
        book

        userId
        */

        function insertReview(
            $title,
            $description,
            $book,
            $image,
            $userId
        ){
            $query = $this->connect()->query('
                                            INSERT INTO review (title, description, book, image, userId)
                                            VALUES("'.$title.'", "'.$description.'", "'.$book.'", "'.$image.'", '.$userId.');
                                            ');
            //$this->connect()->close();
            return $query;
        }

        function updateReview(
            $reviewId,
            $title,
            $description,
            $image,
            $book
        ){
            $query = $this->connect()->query('
                                            UPDATE review
                                            SET title = "'.$title.'",
                                                description = "'.$description.'",
                                                image = "'.$image.'",
                                                book = "'.$book.'"
                                            WHERE reviewId = '.$reviewId.';
                                            ');
            //$this->connect()->close();
            return $query;
        }

        function updateReviewStatus(
            $reviewId
        ){
            $query = $this->connect()->query('
                                            UPDATE review
                                            SET status = 1
                                            WHERE reviewId = '.$reviewId.';
                                            ');
            return $query;
        }

        function getAllReviews()
        {
            $query = $this->connect()->query('SELECT * FROM review;');
            //$this->connect()->close();
            return $query;
        }

        function getReviewById(
            $reviewId
        ){
            $query = $this->connect()->query('SELECT * FROM review WHERE reviewId = '.$reviewId.';');
            //$this->connect()->close();
            return $query;
        }

        function getAllReviewsDetail(){
            $query = $this->connect()->query('SELECT reviewId, T1.creationDate, status, title, description, image, feedback, book, T1.userId, name, profilePhoto
                                              FROM review AS T1
                                              INNER JOIN user AS T2
                                              ON T1.userId = T2.userId
                                              ORDER BY T1.creationDate desc;');
            //$this->connect()->close();
            return $query;
        }

    }

?>