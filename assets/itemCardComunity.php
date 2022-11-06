<div class="col-xl-3">
    <div class="card cardSectionBar">
        <img src=<?php echo $userImg; ?> class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $userName; ?></h5>
            <p class="card-text">Tipo: <?php echo $userType; ?></p>
            <a href="<?php echo "./profile.php?p_userId=".$userId; ?>" class="btn btn-warning">Ver perfil</a>
        </div>
    </div>
</div>