<div class="card" style="margin-bottom: 1em;">
    <div class="card-header">
        <a href="profile.php?p_userId=<?php echo $commentUserId; ?>" target="_blank" class="link-dark"><?php echo $commentUserName; ?></a>
    </div>
    <div class="card-body">
        <h5 class="card-title" id="cardComment<?php echo $commentID; ?>">
            <script>
                setStars(5, <?php echo $commentScore; ?>, 'cardComment<?php echo $commentID; ?>');
            </script>
        </h5>
        <p class="card-text" style="text-align: justify;"><?php echo $commentDescription; ?></p>
    </div>
</div>