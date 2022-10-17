<?php 
    include_once './dataBase/userClass.php';

    class signUpApi{
        function signUpUser(){
            $userClass = new userClass();

            $validations = '';
            $validUser = '';
            $validUser = $userClass->findRepeatUser($_POST['userName']);
        
            if(mysqli_num_rows($validUser) > 0){
                $validations = $validations."&repeatUsername=true";
            };

            $validEmail = '';
            $validEmail = $userClass->findRepeatEmail($_POST['email'], $_POST['userType']);

            if(mysqli_num_rows($validEmail) > 0){
                $validations = $validations."&repeatEmail=true";
            };

            if($validations == ''){
                $res = $userClass->insertUser($_POST['userName'], 
                                              $_POST['password'], 
                                              $_POST['email'], 
                                              $_POST['profilePhoto'], 
                                              $_POST['name'], 
                                              $_POST['lastName'], 
                                              $_POST['birthDay'], 
                                              $_POST['gender'], 
                                              $_POST['userType']
                                            );

                header("Location: main.php");
            }
            else{
            header("Location: signUp.php?invalidSignUp=true".
                    $validations.
                    "&p_userName=".$_POST['userName'].
                    "&p_password=".$_POST['password'].
                    "&p_passwordConfirmation=".$_POST['passwordConfirmation'].
                    "&p_email=".$_POST['email'].
                    //"&p_profilePhoto=".$_POST['profilePhoto'].
                    "&p_name=".$_POST['name'].
                    "&p_lastName=".$_POST['lastName'].
                    "&p_birthDay=".date('Y-m-d', strtotime($_POST['birthDay'])).
                    "&p_gender=".$_POST['gender'].
                    "&p_userType=".$_POST['userType']
                );
            }

            exit();
        }
    }

    if(isset($_POST['submitButton'])){
        $var = new signUpApi();

        $var->signUpUser();
    };

?>