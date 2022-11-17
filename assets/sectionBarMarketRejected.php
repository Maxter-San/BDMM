<div class="sectionBar">
    <?php
        $prod = new productApi();
        $enEspera = $prod->selectProductsByStatusBySellerId('Rechazado');
        
        if(count($enEspera) > 0){
            for($i = 0;$i < count($enEspera);$i++){
                $productName = $enEspera[$i]['name'];
                $productPrice = $enEspera[$i]['price'];
                $productStock = $enEspera[$i]['quantity'];
                $productImg = 'data:image;base64,'.base64_encode($enEspera[$i]['photo']);
                $productId = $enEspera[$i]['productId'];
                include('assets/itemCardMarketRejected.php');
            }
        }else{
            echo '<h4>No hay productos rechazados</h4>';
        }
    ?>

</div>