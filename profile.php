<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <script src='./scripts/main.js'></script>
    <script src='./scripts/starSistem.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel='stylesheet' type='text/css' media='screen' href='./style/profile.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./style/sectionBarVariant.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./style/sectionListWishCard.css'>
    
</head>

<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;">
    <?php
        session_start();

        include_once('apis/profileApi.php');
        include_once('apis/wishListApi.php');
        include_once('apis/shoppingCartApi.php');

        include_once('assets/header.php');

        $var = new profileApi();

        $rows = $var->getprofileUser();
    ?>

    <header class="hero" 
        style='background-image: url("<?php if(isset($rows[0]['coverPhoto'])){echo 'data:image;base64,'.base64_encode($rows[0]["coverPhoto"]);}else{echo './resourses/coverPhoto.jpg';} ?>");'
    >
        <img src="
            <?php 
                if(isset($rows[0]['profilePhoto'])){
                    echo 'data:image;base64,'.base64_encode($rows[0]["profilePhoto"]);
                }
            ?>" 

        alt="profile image" class="card_header-profile" />

    </header>


    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col text-center">
                        <h3 class="card-title"><?php if(isset($rows[0]['userName'])){echo $rows[0]['userName'];} ?></h3>
                    </div>
                </div>

                <?php 
                    if((isset($rows[0]['isVisible']) && $rows[0]['isVisible']) || !isset($_GET['p_userId'])){
                ?>
                        <div class="row">
                            <div class="col">
                                <h4 class="userData"><?php if(isset($rows[0]['name']) && isset($rows[0]['lastName'])){echo $rows[0]['name'].' '.$rows[0]['lastName'];} ?></h4>
                            </div>

                            <div class="col">
                                <h4 class="userData">
                                    <?php if(isset($rows[0]['gender'])){ if($rows[0]['gender'] == 'Mujer'){ ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z"/>
                                    </svg> Mujer

                                    <?php } else{ ?>

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/>
                                    </svg> Hombre
                                    <?php } } ?>
                                </h4>
                            </div>

                            <div class="col">
                                <h4 class="userData">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-heart" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5ZM1 14V4h14v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1Zm7-6.507c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                    </svg> Cumpleaños: <?php if(isset($rows[0]['birthDay'])){echo date('d-m-Y', strtotime($rows[0]['birthDay']));} ?>
                                </h4>
                            </div>

                        </div>
                        
                        <p class="card-text">Descripción <br> <?php if(isset($rows[0]['description'])){echo $rows[0]['description'];} ?></p>
                <?php 
                    }
                ?>

            </div>

            
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col">
                        <?php if((isset($rows[0]['isVisible']) && $rows[0]['isVisible']) || !isset($_GET['p_userId'])){ ?>
                            <h4 class="userData">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                                <?php if(isset($rows[0]['city']) && isset($rows[0]['state'])){echo $rows[0]['city'].", ".$rows[0]['state'];} ?>
                            </h4>
                        <?php } ?>
                        </div>
                        
                        <div class="col">
                            <h4 class="userData">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>
                                <?php if(isset($rows[0]['userType'])){echo $rows[0]['userType'];} ?>
                            </h4>
                        </div>
                            
                        <div class="col">
                        <?php if((isset($rows[0]['isVisible']) && $rows[0]['isVisible']) || !isset($_GET['p_userId'])){ ?>
                            <h4 class="userData">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg>
                                Se unió el: <?php if(isset($rows[0]['creationDate'])){echo date('d-m-Y', strtotime($rows[0]['creationDate']));} ?>
                            </h4>
                        <?php } ?>
                        </div>
                    </div>
                </li>
            </ul>
            

            <div class="card-body">

                <?php
                    if(isset($rows[0]['isActive'])){
                        if(!$rows[0]['isActive']){
                ?>
                            <div class="row">
                                <div class="col text-center"><legend style="color : red;">Usuario dado de baja</legend></div>
                            </div>
                <?php
                        }
                    }

                    
                    if((isset($rows[0]['isVisible']) && $rows[0]['isVisible']) || !isset($_GET['p_userId'])){
                        if(isset($rows[0]['userType'])){
                            $_GET['userType'] =  $rows[0]['userType'];
                        } else{
                            $_GET['userType'] =  'notFound';
                        };
                        include_once('assets/profileSettings.php');
                    }else{
                        echo '<legend class="text-center">Esta cuenta es privada</legend>';
                    }
                ?> 
            </div>
        </div>

    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>