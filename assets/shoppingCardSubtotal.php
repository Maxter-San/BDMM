<?php 
    $subtotal = '0';
?>

<div class="card shoppingCard" id="list<?php echo $shoppingCardId;?>">
    <div class="card-body">
        <h4 class="card-text">
            <div class="row">
                <div class="col">
                    Producto
                </div>
                <div class="col">
                    Cantidad
                </div>
                <div class="col">
                    Precio
                </div>
                <div class="col">
                    Sub total
                </div>
            </div>
        </h4>  
        <!--<?php echo $shoppingCardId; ?> -->
    </div>
    <ul class="list-group list-group-flush">
        <?php
            $shoppingCardItemName = 'Maruchan';
            $shoppingCardItemQuantity = '10';
            $shoppingCardItemPrice = '10';
            $subtotal += $shoppingCardItemQuantity * $shoppingCardItemPrice;
            include('assets/shoppingCardSubtotalItem.php');
        ?>

        <?php
            $shoppingCardItemName = 'Ejemplo';
            $shoppingCardItemQuantity = '5';
            $shoppingCardItemPrice = '20';
            $subtotal += $shoppingCardItemQuantity * $shoppingCardItemPrice;
            include('assets/shoppingCardSubtotalItem.php');
        ?>

        <li class="list-group-item">
            <div class="row">
                <div class="col">
                    <h5>Subtotal</h5>
                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    <h5>$ <?php echo $subtotal; ?></h5>
                </div>
            </div>

            <div class="row">
                <div class="col"></div>
                <div class="col-md-3">
                    <a class="btn btn-success" href="./confirmPayment.php" type="button">Comprar</a>
                </div>
            </div>
        </li>
    </ul>  
</div>