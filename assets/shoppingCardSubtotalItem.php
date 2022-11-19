<li class="list-group-item">
    <div class="row">
        <div class="col">
            <?php echo $shoppingCardItemName; ?>
        </div>
        <div class="col">
            <?php echo $shoppingCardItemQuantity; ?>
        </div>
        <div class="col">
            $ <?php echo number_format($shoppingCardItemPrice, 2, '.', ' '); ?>
        </div>
        <div class="col">
            $ <?php echo number_format($shoppingCardItemQuantity * $shoppingCardItemPrice, 2, '.', ' '); ?>
        </div>
    </div>
</li>