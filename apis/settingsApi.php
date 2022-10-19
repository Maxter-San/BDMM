<?php 
    include_once './dataBase/userClass.php';

    class settingsApi{
        function getUserData(){
            $userClass = new userClass();

            $index = 0;
            
            if(isset($_SESSION["s_userId"])){
                $index = $_SESSION["s_userId"];
            }

            $res = $userClass->getProfileUserById($index);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
            //echo $rows[0]['userId'];
            
            return $rows;
        }
    }
?>