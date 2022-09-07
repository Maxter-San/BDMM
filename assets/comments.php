<div class="card" style="margin-bottom: 1em;">
    <div class="card-header">
        <?php echo $commentUserName; ?>
    </div>
    <div class="card-body">
        <h5 class="card-title" id="cardComment<?php echo $commentID; ?>">
            <script>
                setStars(5, <?php echo $commentScore; ?>, 'cardComment<?php echo $commentID; ?>');
            </script>
        </h5>
        <p class="card-text"><?php echo $commentDescription; ?></p>
    </div>
</div>