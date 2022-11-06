<div class="sectionBar">
    <?php
        for($i = 0;$i < count($rows);$i++){
            $userName = $rows[$i]['userName'];
            $userType = $rows[$i]['userType'];
            $userImg = 'data:image;base64,'.base64_encode($rows[$i]['profilePhoto']);
            $userId = $rows[$i]['userId'];
            include('assets/itemCardComunity.php');
        }
    ?>
    
</div>