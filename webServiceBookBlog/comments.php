<?php 
    include_once('DB/comment.php');
    $commentClass = new commentClass();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        header("HTTP/1.1 200 ok");

        if(isset($_GET['reviewId'])){
            $res = $commentClass->getCommentByReview($_GET['reviewId']);
            $rows= [];
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }else{
            $res = $commentClass->getAllComments();
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
        
        if(isset($data['comment']) && isset($data['reviewId']) && isset($data['userId'])){
            header("HTTP/1.1 200 ok");


            $res = $commentClass->insertComment($data['comment'],
                                              $data['reviewId'],
                                              $data['userId']
            );
            echo $json;
            exit;

        }else{
            header("HTTP/1.1 400 faltan datos");
        }

        exit;
    }

    

?>