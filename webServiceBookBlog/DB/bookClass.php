<?php 
    include_once 'conection.php';

    class bookClass extends DB{

        function insertBook(
            $p_name,
            $p_author,
            $p_synopsis,
            $profilePhoto,
            $publicationDate,
            $p_userId
        ){
            $query = $this->connect()->query('
                                            INSERT INTO BOOK (name, author, synopsis, profilePhoto, valoration, publicationDate, userId)
                                            VALUES("'.$p_name.'", "'.$p_author.'", "'.$p_synopsis.'", "'.$profilePhoto.'", 0, '.$publicationDate.', '.$p_userId.');
                                            ');
            //$this->connect()->close();
            return $query;
        }

        function updateBook(
            $p_bookId,
            $p_name,
            $p_author,
            $p_synopsis,
            $p_profilePhoto,
            $publicationDate
        ){
            $query = $this->connect()->query('
                                            UPDATE book
                                            SET name = "'.$p_name.'",
                                            author = "'.$p_author.'",
                                            synopsis = "'.$p_synopsis.'",
                                            profilePhoto = "'.$p_profilePhoto.'",
                                            publicationDate = "'.$publicationDate.'"
                                            WHERE bookId = '.$p_bookId.';
                                            ');
            //$this->connect()->close();
            return $query;
        }

        function updateValoration(
            $p_bookId,
            $p_valoration
        ){
            $query = $this->connect()->query('
                                            UPDATE book
                                            SET valoration = '.$p_valoration.'
                                            WHERE bookId = '.$p_bookId.';
                                            ');
            return $query;
        }

        function getAllBooks()
        {
            $query = $this->connect()->query('SELECT * FROM book;');
            //$this->connect()->close();
            return $query;
        }

        function getBookById(
            $bookId
        ){
            $query = $this->connect()->query('SELECT * FROM book WHERE bookId = '.$bookId.';');
            //$this->connect()->close();
            return $query;
        }

    }

?>