<div class="card shoppingCard" id="list<?php echo $shoppingCardId;?>">
    <div class="card-body">
        <h4 class="card-title"><?php echo $shoppingCardDate; ?></h4>
        
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
                    Precio total
                </div>
                <div class="col">
                    Valorar
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
            include('assets/shoppingCardListItemClient.php');
        ?>

        <?php
            $shoppingCardItemName = 'Ejemplo';
            $shoppingCardItemQuantity = '5';
            $shoppingCardItemPrice = '20';
            include('assets/shoppingCardListItemClient.php');
        ?>
    </ul>  
</div>