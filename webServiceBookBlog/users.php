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
        
        if(isset($_POST['name']) && isset($_POST['lastName']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['cellphone']) && isset($_POST['profilePhoto'])){
            header("HTTP/1.1 200 ok");
            $res = $userClass->insertUser($_POST['name'],
                                          $_POST['lastName'],
                                          $_POST['mail'],
                                          $_POST['password'],
                                          $_POST['cellphone'],
                                          $_POST['profilePhoto']
            );
        }else{
            header("HTTP/1.1 400 faltan datos");
        }

        exit;
    }

    else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        if(isset($_GET['userId']) && isset($_GET['name']) && isset($_POST['lastName']) && isset($_GET['mail']) && isset($_GET['password']) && isset($_GET['cellphone']) && isset($_GET['address']) && isset($_GET['profilePhoto'])){
            header("HTTP/1.1 200 ok");
            $res = $userClass->updateUser($_GET['userId'],
                                          $_GET['name'],
                                          $_POST['lastName'],
                                          $_GET['mail'],
                                          $_GET['password'],
                                          $_GET['cellphone'],
                                          $_GET['address'],
                                          $_GET['profilePhoto']
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
        if(isset($_GET['bookId'])){
            header("HTTP/1.1 200 ok");
            
        }else{
            header("HTTP/1.1 400 faltan datos");   
        }
    }

?>