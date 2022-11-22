<?php 
    include_once('apis/searchApi.php');
    if(session_status() != 2)
    session_start();

    if(isset($_SESSION['time']) && $_SESSION['time'] != ''){
        if((time() - $_SESSION['time']) > 3600){
            
            $_SESSION['time'] = '';
            $_SESSION['s_userId']='';
            $_SESSION['s_userName']='';
            $_SESSION['s_userType']='';

            header('location: main.php');
        }
    }
    
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid container">
        <a class="navbar-brand" href="./main.php">
            <img src="https://s3.amazonaws.com/colorslive/png/519184-69YeM8_DOT6DaDOz.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
              Maxter shop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./categories.php"><i class="bi bi-list-ul"></i> Categorías</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-people-fill"></i> Comunidad
                    </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="./searchFilterComunity.php?p_userType=Admin">Administradores</a></li>    
                    <li><a class="dropdown-item" href="./searchFilterComunity.php?p_userType=Comprador">Compradores</a></li>
                    <li><a class="dropdown-item" href="./searchFilterComunity.php?p_userType=Vendedor">Vendedores</a></li>              
                </ul>
            </li>
            </ul>

            <form class="d-flex ms-5 col-md-6" role="search" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                <input class="form-control me-2" type="search" placeholder="Buscar producto..." name="search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit" name="submitButtonSearchProduct"><i class="bi bi-search"></i></button>
            </form> 
        </div>

        <?php
            if(isset($_SESSION["s_userType"])){
                if($_SESSION["s_userType"] != ''){
                    $_GET['logged'] = $_SESSION["s_userType"];
                }else{
                    $_GET['logged'] = 'notLogged';
                }
            }else{
                $_GET['logged'] = 'notLogged';
            }
            include_once('assets/headerSettings.php');
        ?> 

    </div>
</nav>