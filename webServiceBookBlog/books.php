<?php 
    include_once('DB/bookClass.php');
    $bookClass = new bookClass();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        header("HTTP/1.1 200 ok");

        if(isset($_GET['bookId'])){
            $res = $bookClass->getBookById($_GET['bookId']);
            $rows= [];
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }else{
            $res = $bookClass->getAllBooks();
            $rows= [];
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }

        exit;
    }

    else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if(isset($_POST['name']) && isset($_POST['author']) && isset($_POST['synopsis']) && isset($_POST['profilePhoto']) && isset($_POST['userId']) && isset($_POST['publicationDate'])){
            header("HTTP/1.1 200 ok");
            $res = $bookClass->insertBook($_POST['name'],
                                          $_POST['author'],
                                          $_POST['synopsis'],
                                          $_POST['profilePhoto'],
                                          $_POST['publicationDate'],
                                          $_POST['userId']
            );
        }else{
            header("HTTP/1.1 400 faltan datos");
        }

        exit;
    }

    else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        if(isset($_GET['bookId']) && isset($_GET['name']) && isset($_GET['author']) && isset($_GET['synopsis']) && isset($_GET['profilePhoto']) && isset($_GET['publicationDate'])){
            header("HTTP/1.1 200 ok");
            $res = $bookClass->updateBook($_GET['bookId'],
                                          $_GET['name'],
                                          $_GET['author'],
                                          $_GET['synopsis'],
                                          $_GET['profilePhoto'],
                                          $_GET['publicationDate']
            );

            //if(isset($_GET['bookId']) && $_GET['valoration']){
            //    $res = $bookClass->updateValoration($_GET['bookId'],
            //                                        $_GET['valoration']
            //    );
            //}
        }else{
            header("HTTP/1.1 400 faltan datos");
        }

        exit;
    }

    else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        if(isset($_GET['bookId'])){
            header("HTTP/1.1 200 ok");
            
        }else{
            header("HTTP/1.1 400 faltan datos");   
        }
    }

?>