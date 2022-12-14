<?php 
    include_once './dataBase/userClass.php';

    class settingsApi{
        function getUserData(){
            $userClass = new userClass();

            $indexId = 0;
            
            if(isset($_SESSION["s_userId"])){
                $indexId = $_SESSION["s_userId"];
            }

            $res = $userClass->getProfileUserById($indexId);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            //echo json_encode($rows);
            //echo $rows[0]['userId'];
            
            return $rows;
        }

        function setUserData(){
            $userClass = new userClass();
            $validations = '';
            $validUser = '';

            $validPassword = $userClass->getLogin($_SESSION["s_userName"], $_POST['password'], $_SESSION["s_userType"]);

            if(mysqli_num_rows($validPassword) == 0){
                $validations = $validations."&invalidPassword=true";
            }
            
            $validUser = $userClass->findAnotherRepeatUser($_SESSION["s_userId"], $_POST['userName']);
        
            if(mysqli_num_rows($validUser) > 0){
                $validations = $validations."&repeatUsername=true";
            };


            if($validations == ''){
                //$profilePhotoBlob = $rows[0]['profilePhoto'];
                //if($_FILES["profilePhoto"]["size"] > 0){
                    $profilePhotoBlob = null;
                    if($_FILES["profilePhoto"]["size"] > 0){
                        $archivo = $_FILES["profilePhoto"]["tmp_name"]; 
                        $tamanio = $_FILES["profilePhoto"]["size"];
                        $tipo    = $_FILES["profilePhoto"]["type"];
                        $nombre  = $_FILES["profilePhoto"]["name"];

                        $fp = fopen($archivo, "rb");
                        $profilePhotoBlob = fread($fp, $tamanio);
                        $profilePhotoBlob = addslashes($profilePhotoBlob);
                        fclose($fp);
                    }
                //}

                //$coverPhotoBlob = $rows[0]['coverPhoto'];
                //if($_FILES["coverPhoto"]["size"] > 0){
                    $coverPhotoBlob = null;
                    if($_FILES["coverPhoto"]["size"] > 0){
                        $archivo = $_FILES["coverPhoto"]["tmp_name"]; 
                        $tamanio = $_FILES["coverPhoto"]["size"];
                        $tipo    = $_FILES["coverPhoto"]["type"];
                        $nombre  = $_FILES["coverPhoto"]["name"];
                        
                        $fp = fopen($archivo, "rb");
                        $coverPhotoBlob = fread($fp, $tamanio);
                        $coverPhotoBlob = addslashes($coverPhotoBlob);
                        fclose($fp);
                    }
                //}

                $isDebitCardCheck = 0;
                if(isset($_POST['debitCard'])){
                    $isDebitCardCheck = 1;
                }

                $isPaypalCheck = 0;
                if(isset($_POST['isPaypal'])){
                    $isPaypalCheck = 1;
                }

                $isOxxoCheck = 0;
                if(isset($_POST['isOxxo'])){
                    $isOxxoCheck = 1;
                }

                $numCard = '';
                if(isset($_POST['debitCard'])){
                    $numCard = $_POST['debitCard'];
                }

                $addressClient = '';
                if($_SESSION["s_userType"] == 'Comprador'){
                    $addressClient = $_POST['address'];
                }

                $postalCodeClient = 0;
                if($_SESSION["s_userType"] == 'Comprador'){
                    $postalCodeClient = $_POST['postalCode'];
                }

                $password = $_POST['password'];
                if(isset($_POST['ifNewPassword'])){
                    $password = $_POST['newPassword'];
                }

                $isVisible = false;
                if(isset($_POST['isVisible']) && $_POST['isVisible']){
                    $isVisible = true;
                }

                $res = $userClass->updateUser(
                    $_SESSION["s_userId"],
                    $_POST['userName'],
                    $password,
                    $profilePhotoBlob,
                    $coverPhotoBlob,
                    $_POST['description'],
                    $_POST['name'],
                    $_POST['lastName'],
                    $_POST['birthDay'],
                    $_POST['gender'],
                    $addressClient,
                    $postalCodeClient,
                    $_POST['city'],
                    $_POST['state'],
                    $numCard,
                    $isDebitCardCheck,
                    $isPaypalCheck,
                    $isOxxoCheck,
                    $isVisible
                );

                $res = $userClass->getProfileUserById($_SESSION["s_userId"]);

                //$rows = array();
                while($r = mysqli_fetch_assoc($res)) {
                    //$rows[] = $r;
                    $_SESSION["s_userName"]=$r['userName'];
                    $_SESSION["s_profilePhoto"]=$r['profilePhoto'];
                }

                header("Location: settings.php?successful=true");
            }
            else{
                header("Location: settings.php?".
                        $validations.
                       "&p_name=".$_POST['name']
                    ); 
            }
            
        }

        function unsubscribe(){
            $userClass = new userClass();

            $indexId = 0;
            
            if(isset($_SESSION["s_userId"])){
                $indexId = $_SESSION["s_userId"];
            }

            $res = $userClass->getProfileUserById($indexId);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }

            if(isset($rows[0]['sellerId'])){
                include_once './dataBase/productClass.php';
                $productClass = new productClass();

                $productClass->updateProductOutStock($rows[0]['sellerId']);
            }

            $userClass->deleteUser($_SESSION["s_userId"], false);

            $_SESSION['s_userId']='';
            $_SESSION['s_userName']='';
            $_SESSION['s_userType']='';
            header("Location: main.php");
            
        }
    }

    if(isset($_POST['submitButton'])){
        $var = new settingsApi(); 
        $var->setUserData();
    };

    if(isset($_POST['submitUnsubscribe'])){
        $var = new settingsApi(); 
        $var->unsubscribe();
    }

    $varSet = new settingsApi(); 
        $rows = $varSet->getUserData();
?>