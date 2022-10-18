<?php 
    include_once './dataBase/userClass.php';

    class loginApi{
        function loginUser(){
            $userClass = new userClass();

            $res = $userClass->getLogin($_POST['user'], $_POST['password'], $_POST['userType']);

            if(mysqli_num_rows($res) > 0){

                session_start();

                //$rows = array();
                while($r = mysqli_fetch_assoc($res)) {
                    //$rows[] = $r;
                    $_SESSION["s_userId"]=$r['userId'];
                    $_SESSION["s_userName"]=$r['userName'];
                    $_SESSION["s_userType"]=$r['userType'];
                    $_SESSION["s_profilePhoto"]=$r['profilePhoto'];
                }
                //echo json_encode($rows);

                
                //
                //$_SESSION["userId"] = $rows['userId'];
                //$_SESSION["userName"]=$rows['userName'];
                //$_SESSION["userType"]=$rows['userType'];

                header("Location: main.php");
                
            }
            else{
                header("Location: login.php?invalidLogin=true".
                       "&p_user=".$_POST['user'].
                       "&p_password=".$_POST['password'].
                       "&p_userType=".$_POST['userType']
                    ); 
            }
            exit();
        }
    }

    if(isset($_POST['submitButton'])){
        $var = new loginApi();

        $var->loginUser();
    };

?>