<?php 
    include_once './dataBase/userClass.php';

    class loginApi{
        function loginUser(){
            $userClass = new userClass();

            $res = $userClass->getLogin($_POST['user'], $_POST['password'], $_POST['userType']);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            //echo json_encode($rows);

            if(mysqli_num_rows($res) > 0){
                
                header("Location: main.php");

                //session_start();
                //
                //$_SESSION["userId"] = $rows['userId'];
                //$_SESSION["userName"]=$rows['userName'];
                //$_SESSION["userType"]=$rows['userType'];

                
            }
            else{
                header("Location: login.php?invalidLogin=true");
                exit();
            }
        }
    }

    if(isset($_POST['submitButton'])){
        $var = new loginApi();

        $var->loginUser();
    };

?>