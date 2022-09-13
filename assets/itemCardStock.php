<div class="col-xl-3">
    <div class="card cardSectionBar">
        <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></button>
        </div>

        <img src=<?php echo $productImg; ?> class="card-img-top" alt="...">

        <div class="card-body">
            <h5 class="card-title"><?php echo $productName; ?></h5>

            <div class="mb-3">
            <label for="formProductStock" class="form-label">Stock</label>
                <div class="input-group">
                    <input id="formProductStock" type="text" class="form-control" placeholder="<?php echo $productStock; ?>" readonly>
                    <button class="btn btn-outline-warning" type="button">-</button>
                    <button class="btn btn-outline-success" type="button">+</button>
                </div>
            </div>

            <a href="./product.php" class="btn btn-outline-warning">Ver producto</a>

            <!--<?php echo $productId; ?> -->
        </div>
    </div>
</div>