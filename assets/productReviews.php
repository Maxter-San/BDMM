<?php 
    for ($i=0; $i < $totalReviews; $i++){
        $commentID = $reviews[$i]['commentId'];
        $commentUserName = $reviews[$i]['userName'];
        $commentScore = $reviews[$i]['valoration'];
        $commentDescription = $reviews[$i]['comment'];
        $commentUserId = $reviews[$i]['userId'];
        include('assets/comments.php');
    }
?>