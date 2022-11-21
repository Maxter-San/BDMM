<?php 
    if($grouped){
?>
        <div class="card shoppingCard" id="list<?php echo $recordProductId;?>">
            <div class="card-body">            
                <h4 class="card-text">
                    <div class="row">
                        <div class="col">
                            Mes
                        </div>
                        <div class="col">
                            Año
                        </div>
                        <div class="col">
                            Categoría
                        </div>
                        <div class="col">
                            Ventas totales
                        </div>
                        <div class="col">
                            Ganancia
                        </div>
                    </div>
                </h4>  
                <!--<?php echo $recordProductId; ?> -->
            </div>
            <ul class="list-group list-group-flush">
                <?php
                    include('assets/shoppingCardListItem.php');
                ?>
            </ul>  
        </div>
<?php 
    }
    else{
?>
        <div class="card shoppingCard" id="list<?php echo $recordProductId;?>">
            <div class="card-body">
                <h4 class="card-title"><?php echo date('d-m-Y g:iA', strtotime($recordDate)); ?></h4>
                
                <h4 class="card-text">
                    <div class="row">
                        <div class="col">
                            Producto
                        </div>
                        <div class="col">
                            Categoría
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
                            Valoración
                        </div>
                    </div>
                </h4>  
                <!--<?php echo $recordProductId; ?> -->
            </div>
            <ul class="list-group list-group-flush">
                <?php
                    //$shoppingCardItemName = 'Maruchan';
                    //$shoppingCardItemQuantity = '10';
                    //$shoppingCardItemPrice = '10';
                    include('assets/shoppingCardListItem.php');
                ?>
            </ul>  
        </div>
<?php 
    }
?>