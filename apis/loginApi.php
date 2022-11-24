<?php 
    include_once './dataBase/userClass.php';

    class loginApi{
        function loginUser(){
            $userClass = new userClass();

            $res = $userClass->getLogin($_POST['user'], $_POST['password'], $_POST['userType']);

            if(mysqli_num_rows($res) > 0){

                $rows = array();
                while($r = mysqli_fetch_assoc($res)) {
                    $rows[] = $r;
                }
                //echo json_encode($rows);

                
                //
                //$_SESSION["userId"] = $rows['userId'];
                //$_SESSION["userName"]=$rows['userName'];
                //$_SESSION["userType"]=$rows['userType'];

                if($rows[0]['isActive']){
                    $_SESSION["s_userId"]=$rows[0]['userId'];
                    $_SESSION["s_userName"]=$rows[0]['userName'];
                    $_SESSION["s_userType"]=$rows[0]['userType'];
                    $_SESSION["s_profilePhoto"]=$rows[0]['profilePhoto'];

                    if(isset($_POST['remember'])){
                        $_SESSION['time'] = '';
                    }else{
                        $_SESSION['time'] = time();
                    }

                    header("Location: main.php");
                }else{
                    header("Location: logIn.php?unsuscribed");
                }
                
            }
            else{
                header("Location: logIn.php?invalidLogin=true".
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