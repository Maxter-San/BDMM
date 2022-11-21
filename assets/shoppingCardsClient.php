<div class="card shoppingCard" id="list<?php echo $recordId;?>">
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
                    Valorar
                </div>

            </div>
        </h4>  
        <!--<?php echo $recordId; ?> -->
    </div>
    <ul class="list-group list-group-flush">
        <?php
            $products = $filterRecordsApi->searchRecordProducts($recordId);
            for($j = 0;$j < count($products);$j++){
                $recordProductId = $products[$j]['recordProductId'];
                $productId = $products[$j]['productId'];
                $recordProductName = $products[$j]['name'];
                $recordProductQuantity = $products[$j]['quantity'];
                $recordProductPrice = $products[$j]['price'];
                $recordProductAmount = $products[$j]['amount'];
                $isValued = $products[$j]['isValued'];
                include('assets/shoppingCardListItemClient.php');
            }
        ?>
        <li class="list-group-item">
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"><h5>Total de la compra</h5></div>
                <div class="col"><h5>$ <?php echo $recordAmount;?></h5></div>
                <div class="col"></div>
            </div>
        </li>
    </ul>  

</div>