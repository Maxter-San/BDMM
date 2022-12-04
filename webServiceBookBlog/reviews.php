<?php 
    include_once('DB/reviewClass.php');
    $reviewClass = new reviewClass();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        header("HTTP/1.1 200 ok");

        if(isset($_GET['userId'])){
            $res = $reviewClass->getAllReviewsDetailByUserId($_GET['userId']);
            $rows= [];
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }
        else if(isset($_GET['reviewId'])){
            $res = $reviewClass->getAllReviewsDetailById($_GET['reviewId']);
            $rows= [];
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }
        else{
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
        
        
            header("HTTP/1.1 200 okee");

            //$HTTP_RAW_POST_DATA
            $json = file_get_contents('php://input');

            // Converts it into a PHP object
            $data = json_decode($json, true);

            //echo $data['userId'];
            //exit;
        
        if(isset($data['title']) && isset($data['description']) && isset($data['image']) && isset($data['book']) && isset($data['userId'])){
            header("HTTP/1.1 200 ok");

            $contenido = null;
            if($data['image'] != null){
                $archivo = $_FILES["image"]["tmp_name"]; 
                $tamanio = $_FILES["image"]["size"];
                $tipo    = $_FILES["image"]["type"];
                $nombre  = $_FILES["image"]["name"];

            
                $fp = fopen($archivo, "rb");
                $contenido = fread($fp, $tamanio);
                $contenido = addslashes($contenido);
                fclose($fp); 
            }

            $res = $reviewClass->insertReview($data['title'],
                                              $data['description'],
                                              $data['book'],
                                              $contenido,
                                              $data['userId']
            );
            echo $json;
            exit;

        }else{
            header("HTTP/1.1 400 faltan datos");
        }
        
        $res = $reviewClass->getReviewById(1);
        $rows= [];

        while($r = mysqli_fetch_assoc($res)) {
            $rows[] = $r;
        }

        echo json_encode($rows);

        exit;
    }

    else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        if(isset($_GET['reviewId']) && isset($_GET['title']) && isset($_GET['description']) && isset($_GET['image']) && isset($_GET['book'])){
            header("HTTP/1.1 200 ok");
            $res = $reviewClass->updateReview($_GET['reviewId'],
                                              $_GET['title'],
                                              $_GET['description'],
                                              null,
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
        if(isset($_GET['reviewId'])){
            header("HTTP/1.1 200 ok");
            $res = $userClass->deleteReview($_GET['reviewId']);
        }else{
            header("HTTP/1.1 400 faltan datos");   
        }
    }

?>