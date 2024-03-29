<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='./style/main.css'>
    <script src='./scripts/main.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    
</head>
<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;">
    
    <?php
        session_start();
        include_once('apis/shoppingCartApi.php');
        $var = new shoppingCartApi();
        if(isset($_GET['paypal'])){
            $_POST['payMethod'] = "Paypal";
            $var->insertRecord();
        }

        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
        <div class="card text-center">
            <div class="card-header">
                Maxter Shop
            </div>
            <div class="card-body">
                <h5 class="card-title">Compra realizada con exito</h5>
                <p class="card-text">Gracias por comprar en Maxter Shop. Por favor sigue viendo mas artículos.</p>
                <a href="main.php" class="btn btn-warning">Ir al inicio</a>
            </div>

            <div>
                <input type="button" class="btn btn-primary" onclick="enviarCompra()" value="Compartir en Facebook">
            </div>
        </div>
    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>

    <script>

        function enviarCompra(){	
            shareScore($().val());		
        }
        
        window.fbAsyncInit = function() {
        FB.init({
            appId      : '693788108832171',
            xfbml      : true,
            version    : 'v2.9'
        });
        FB.AppEvents.logPageView();
    }   ;

    (   function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function shareScore(){
            FB.ui({
                method: 'share',
                href: 'https://test.maxter-san.com/',
                hashtag: "#BDMM",
                quote: 'Mi compra'
            }, function(response){});
        }


    </script>
</html>