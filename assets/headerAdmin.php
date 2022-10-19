<a type="button" class="btn btn-outline-light me-3" href="./approveProducts.php"><i class="bi bi-bag-check"></i> Aprobar producto</a>

<a type="button" class="btn btn-outline-light me-3" href="./addCategory.php"><i class="bi bi-journal-plus"></i> Agregar Categoría</a>

<div class="dropdown text-end">
    <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    
    <img src="<?php if(isset($_SESSION["s_profilePhoto"])){echo 'data:image;base64,'.base64_encode($_SESSION["s_profilePhoto"]);}else{echo 'https://s3.amazonaws.com/colorslive/png/519184-69YeM8_DOT6DaDOz.png';} ?>" alt="mdo" width="32" height="32" class="rounded-circle">
    
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small">
        <li><h5 class="dropdown-header"><?php echo $_SESSION["s_userName"]; ?></h5></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="./profile.php">Ver perfil</a></li>
        <li><a class="dropdown-item" href="./settings.php">Configuración</a></li>
        <li><hr class="dropdown-divider"></li>
        
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <li><input class="dropdown-item" type="submit" name="logOutButton" value="Cerrar sesión"></input></li>
        </form>
    </ul>
</div>