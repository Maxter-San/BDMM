<li class="list-group-item">
    <div class="row">
        <div class="col">
            <?php echo $shoppingCardItemName; ?>
        </div>
        <div class="col">
            <?php echo $shoppingCardItemQuantity; ?>
        </div>
        <div class="col">
            <?php echo $shoppingCardItemPrice; ?>
        </div>
        <div class="col">
            <?php echo $shoppingCardItemQuantity * $shoppingCardItemPrice; ?>
        </div>

        <div class="col">
            <div class="d-grid gap-2 d-md-block">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Valorar compra
                </button>
            </div>
        </div>
    </div>
</li>