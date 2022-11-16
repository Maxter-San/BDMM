<?php 
    include_once './dataBase/userClass.php';

    class profileApi{
        function getprofileUser(){
            $userClass = new userClass();

            $index = 0;
            
            if(isset($_SESSION["s_userId"])){
                $index = $_SESSION["s_userId"];
            }

            if(isset($_GET["p_userId"])){
                $index = $_GET["p_userId"];
            }

            $res = $userClass->getProfileUserById($index);

            if(mysqli_num_rows($res) > 0){
                $rows = array();
                while($r = mysqli_fetch_assoc($res)) {
                    $rows[] = $r;
                }
                //echo json_encode($rows);
                //echo $rows[0]['userId'];

                return $rows;
            }else {
                return null;
            }
        }
    }
?>