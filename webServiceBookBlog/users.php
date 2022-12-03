<?php 
    include_once('DB/userClass.php');
    $userClass = new userClass();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        header("HTTP/1.1 200 ok");

        if(isset($_GET['mail']) && isset($_GET['password'])){
            $res = $userClass->getLogin($_GET['mail'], $_GET['password']);
            $rows= [];
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }
        else if(isset($_GET['userId'])){
            $res = $userClass->getUserById($_GET['userId']);
            $rows= [];
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
        }else{
            $res = $userClass->getAllUsers();
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
        
        
        if(isset($data['name']) && isset($data['lastName']) && isset($data['mail']) && isset($data['password']) && isset($data['cellphone']) && isset($data['profilePhoto'])){
            header("HTTP/1.1 200 ok");
            $res = $userClass->insertUser($data['name'],
                                          $data['lastName'],
                                          $data['mail'],
                                          $data['password'],
                                          $data['cellphone'],
                                          null
            );
        }else{
            header("HTTP/1.1 400 faltan datos");
        }

        exit;
    }

    else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        if(isset($_GET['userId']) && isset($_GET['name']) && isset($_GET['lastName']) && isset($_GET['mail']) && isset($_GET['password']) && isset($_GET['cellphone']) && isset($_GET['address']) && isset($_GET['profilePhoto'])){
            header("HTTP/1.1 200 ok");
            $res = $userClass->updateUser($_GET['userId'],
                                          $_GET['name'],
                                          $_GET['lastName'],
                                          $_GET['mail'],
                                          $_GET['password'],
                                          $_GET['cellphone'],
                                          $_GET['address'],
                                          null
            );

            //if(isset($_GET['bookId']) && $_GET['valoration']){
            //    $res = $bookClass->updateValoration($_GET['bookId'],
            //                                        $_GET['valoration']
            //    );
            //}
        }
        else{
            header("HTTP/1.1 400 faltan datos");
        }

        exit;
    }

    else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        if(isset($_GET['userId'])){
            header("HTTP/1.1 200 ok");
            $res = $userClass->deleteUser($_GET['userId']);
        }else{
            header("HTTP/1.1 400 faltan datos");   
        }
    }

?>