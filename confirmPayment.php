<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='./style/main.css'>
    <script src="./scripts/jquery-3.6.1.min.js"></script>
    <script src='./scripts/confirmPayment.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
</head>
<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;">
    <?php
        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
        <legend>Confirmar compra</legend>

        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-body">
                    <h3>Selecciona tu método de pago</h3>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDebitCard" checked>
                        <label class="form-check-label" for="flexRadioDebitCard">
                            <h4 style="font-weight: lighter;">Tarjeta de débito</h4>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioPaypal">
                        <label class="form-check-label" for="flexRadioPaypal">
                            <h4 style="font-weight: lighter;">Paypal</h4>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioOxxo">
                        <label class="form-check-label" for="flexRadioOxxo">
                            <h4 style="font-weight: lighter;">Oxxo</h4>
                        </label>
                    </div>

                  </div>
                </div>              
            </div>

            <div class="col">
                <div class="card">
                  <div class="card-body">
                    <h3>Confirmar compra</h3>

                    <div class="row">
                        <div class="col">
                            <h4 style="font-weight: lighter;">Subtotal</h4>    
                        </div>
                        <div class="col">
                            <h4 style="font-weight: lighter;">$ 123.00</h4>    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h3 style="font-weight: lighter;">Total</h3>    
                        </div>
                        <div class="col">
                            <h3 style="font-weight: lighter;">$ 123.00</h3>    
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <a class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Aceptar</a>
                    </div>
                    
                  </div>
                </div>
            </div>
            
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Confirmación de compra</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Aceptas hacer la compra?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModal">Aceptar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¡Has realizado una compra!</h5>
                </div>
                <div class="modal-body">
                    Gracias por comprar
                </div>
                <div class="modal-footer">
                    <a class="btn btn-success" type="button" data-bs-dismiss="modal">Aceptar</a>
                </div>
            </div>
        </div>
    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>