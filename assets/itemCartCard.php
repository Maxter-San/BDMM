<div class="col-xl-3">
    <div class="card cardSectionBar">
        <img src=<?php echo $productImg; ?> class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $productName; ?></h5>
            <p class="card-text">$ <?php echo $productPrice; ?></p>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="<?php echo $productQuantity; ?>" readonly>
                <button class="btn btn-outline-warning" type="button">-</button>
                <button class="btn btn-outline-success" type="button">+</button>
            </div>
            <br>
            <a class="btn btn-outline-danger">Eliminar</a>
            <!--<?php echo $productId; ?> -->
        </div>
    </div>
</div>