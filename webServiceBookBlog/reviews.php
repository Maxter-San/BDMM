<?php 
    include_once('DB/reviewClass.php');
    $reviewClass = new reviewClass();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        header("HTTP/1.1 200 ok");

        if(isset($_GET['reviewId'])){
            $res = $reviewClass->getReviewById($_GET['reviewId']);
            $rows= [];
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }else{
            $res = $reviewClass->getAllReviewsDetail();
            $rows= [];
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }

        exit;
    }

    else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['image']) && isset($_POST['book']) && isset($_POST['userId'])){
            header("HTTP/1.1 200 ok");

            $archivo = $_FILES["image"]["tmp_name"]; 
            $tamanio = $_FILES["image"]["size"];
            $tipo    = $_FILES["image"]["type"];
            $nombre  = $_FILES["image"]["name"];

            $fp = fopen($archivo, "rb");
            $contenido = fread($fp, $tamanio);
            $contenido = addslashes($contenido);
            fclose($fp); 

            $res = $reviewClass->insertReview($_POST['title'],
                                              $_POST['description'],
                                              $_POST['book'],
                                              $contenido,
                                              $_POST['userId']
            );
        }else{
            header("HTTP/1.1 400 faltan datos");
        }

        exit;
    }

    else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        if(isset($_POST['reviewId']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['image']) && isset($_POST['book'])){
            header("HTTP/1.1 200 ok");
            $res = $reviewClass->updateReview($_GET['reviewId'],
                                              $_GET['title'],
                                              $_GET['description'],
                                              $_GET['image'],
                                              $_GET['book']
            );

            //if(isset($_GET['bookId']) && $_GET['valoration']){
            //    $res = $bookClass->updateValoration($_GET['bookId'],
            //                                        $_GET['valoration']
            //    );
            //}
        }else if(isset($_GET['reviewId'])){
            $res = $reviewClass->updateReviewStatus($_GET['reviewId']);

        }
        else{
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