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
        session_start();
        include_once('apis/shoppingCartApi.php');
        $shoppingCartApi = new shoppingCartApi();

        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
        <legend>Confirmar compra</legend>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="row">
                <div class="col">
                    <div class="card">
                    <div class="card-body">
                        <h3>Selecciona tu método de pago</h3>

                        <?php
                            $payMethod = $shoppingCartApi->selectPayMethod();
                            $validations = 0;

                            $checkControl = 0;

                            if($payMethod[0]['isDebitCard'] || $payMethod[0]['isPaypal'] || $payMethod[0]['isOxxo']){
                                $countMethdos = 0;
                                if($payMethod[0]['isDebitCard']){
                                    $countMethdos++;
                        ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payMethod" value="DebitCard" id="flexRadioDebitCard" <?php if($checkControl == 0){ echo 'checked'; $checkControl = 1; } ?>>
                                        <label class="form-check-label" for="flexRadioDebitCard">
                                            <h4 style="font-weight: lighter;">Tarjeta de débito <?php echo $shoppingCartApi->getDebitCard(); ?></h4>
                                        </label>
                                    </div>
                        <?php
                                }
                                if($payMethod[0]['isPaypal']){
                                    $countMethdos++;
                                    include_once('apis/paypal.php');
                        ?>
                                    <div id="paypal-button-container"></div>
                                    <div id="paypal-button"></div>
                                    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
                                    <script>
                                        paypal.Button.render({
                                        env: '<?php echo PayPalENV; ?>',
                                        client: {
                                        
                                        sandbox: '<?php echo PayPalClientId; ?>'
                                        
                                        },
                                        payment: function (data, actions) {
                                        return actions.payment.create({
                                        transactions: [{
                                        amount: {
                                        total: '<?php echo $subtotal; ?>',
                                        currency: '<?php echo "EUR"; ?>'
                                        }
                                        }]
                                        });
                                        },
                                        onAuthorize: function (data, actions) {
                                        return actions.payment.execute()
                                        .then(function () {
                                        window.location = "<?php echo PayPalBaseUrl ?>record.php?paypal=true&paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=<?php echo $productId; ?>";
                                        });
                                        }
                                        }, '#paypal-button');
                                    </script>
                        <?php 
                                }
                                if($payMethod[0]['isOxxo']){
                                    $countMethdos++;
                        ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payMethod" value="Oxxo" id="flexRadioOxxo" <?php if($checkControl == 0){ echo 'checked'; $checkControl = 1; } ?>>
                                        <label class="form-check-label" for="flexRadioOxxo">
                                            <h4 style="font-weight: lighter;">Oxxo</h4>
                                        </label>
                                    </div>
                        <?php
                                }
                                if($countMethdos == 0){
                                    $validations = 1;
                                }
                            }else{
                                $validations = 1;
                                echo '<label style="color : red;">Aún no completas tu información de pago</label> <a href="/PIA/settings.php">Click aquí</a>';
                            }
                        ?>

                    </div>
                    </div>              
                </div>

                <div class="col">
                    <div class="card">
                    <div class="card-body">
                        <h3>Confirmar compra</h3>

                        <?php 
                            $validateAvaibleStock = null;

                            $subtotal = 0;
                    
                            $rows = $shoppingCartApi->selectProductsByCartId();
                            for($i = 0;$i < count($rows);$i++){
                                $productStock = $rows[$i]['stock'];    
                                $shoppingCartItemQuantity = $rows[$i]['quantity'];
                                $shoppingCartItemPrice = $rows[$i]['price'];
                                $subtotal += $shoppingCartItemQuantity * $shoppingCartItemPrice;
                    
                                if($productStock < $shoppingCartItemQuantity){
                                    $validateAvaibleStock = 1;
                                }
                            }

                            $rows = $shoppingCartApi->selectCuotationsByCartId();
                            for($i = 0;$i < count($rows);$i++){
                                $productStock = $rows[$i]['stock'];    
                                $shoppingCartItemQuantity = $rows[$i]['quantity'];
                                $shoppingCartItemPrice = $rows[$i]['price'];
                                $subtotal += $shoppingCartItemQuantity * $shoppingCartItemPrice;
                    
                                if($productStock < $shoppingCartItemQuantity){
                                    $validateAvaibleStock = 1;
                                }
                            }

                            if($validateAvaibleStock == 1 || $subtotal == 0){
                                $validations = 1;
                            }
                        ?>

                        <div class="row">
                            <div class="col">
                                <h4 style="font-weight: lighter;">Subtotal</h4>    
                            </div>
                            <div class="col">
                                <h4 style="font-weight: lighter;">$ <?php echo  number_format($subtotal, 2, '.', ' '); ?></h4>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h3 style="font-weight: lighter;">Total</h3>    
                            </div>
                            <div class="col">
                                <h3 style="font-weight: lighter;">$ <?php echo  number_format($subtotal, 2, '.', ' '); ?></h3>    
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" <?php if($validations != 0){echo 'disabled';} ?>>Aceptar</button>
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
                            <button type="submit" name="submitButtonPay" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>