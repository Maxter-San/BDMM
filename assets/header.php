<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid container">
        <a class="navbar-brand" href="#">
            <img src="https://s3.amazonaws.com/colorslive/png/519184-69YeM8_DOT6DaDOz.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
              Tiendita
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php"><i class="bi bi-list-ul"></i> Categorías</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-people-fill"></i> Comunidad
                    </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Administradores</a></li>    
                    <li><a class="dropdown-item" href="#">Compradores</a></li>
                    <li><a class="dropdown-item" href="#">Vendedores</a></li>              
                </ul>
            </li>
            </ul>

            <form class="d-flex ms-5 col-md-6" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
            </form> 
        </div>

        <?php
            $_GET['logged'] = '0';
            include_once('assets/headerSettings.php');
        ?> 

    </div>
</nav>