<?php 
    include_once './dataBase/userClass.php';

    class comunityApi{
        function searchComunity(){
            $userClass = new userClass();

            $searchUserName = null;
            if(isset($_GET['p_userName'])){
                $searchUserName = $_GET['p_userName'];
            }

            $searchUserType = null;
            //if(isset($_POST['userType'])){
            //    if($_POST['userType'] == 'Todos'){
            //        $searchUserType = null;
            //    }else{
            //        $searchUserType = $_POST['userType'];
            //    }
            //}else{
                if(isset($_GET['p_userType'])){
                    if($_GET['p_userType'] == 'Todos'){
                        $searchUserType = null;
                    }else{
                        $searchUserType = $_GET['p_userType'];
                    }
                }
            //}

            $searchOrderBy = null;
            if(isset($_GET['p_orderBy'])){
                $searchOrderBy = $_GET['p_orderBy'];
            }

            $res = $userClass->getComunity($searchUserName, $searchUserType, $searchOrderBy);

            $rows = array();
            while($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            //echo json_encode($rows);
            //echo $rows[0]['userId'];
            
            return $rows;
        }
    }

    if(isset($_POST['submitButton'])){
        //$var = new comunityApi(); 
        //$rows = $var->searchComunity();
        header("Location: searchFilterComunity.php?".
                    "&p_userName=".$_POST['userName'].
                    "&p_userType=".$_POST['userType'].
                    "&p_orderBy=".$_POST['orderBy']
        );
    };

    $varSet = new comunityApi(); 
    $rows = $varSet->searchComunity();

?>