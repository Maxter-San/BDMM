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
            for($i = 0;$i < count($rows);$i++){
                $shoppingCardItemName = $rows[$i]['name'];
                $shoppingCardItemQuantity = $rows[$i]['quantity'];
                $shoppingCardItemPrice = $rows[$i]['price'];
                $subtotal += $shoppingCardItemQuantity * $shoppingCardItemPrice;
                include('assets/shoppingCardSubtotalItem.php');
            }
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
                    <h5>$ <?php echo  number_format($subtotal, 2, '.', ' '); ?></h5>
                </div>
            </div>

            <div class="row">
                <div class="col"></div>
                <div class="col-md-3">
                    <form method="POST" action="confirmPayment.php" id="myForm">
                        <button class="btn btn-success" type="submit" <?php if($validateAvaibleStock != null){echo 'disabled';} ?>>Comprar</button>
                    </form>
                </div>
            </div>
        </li>
    </ul>  
</div>