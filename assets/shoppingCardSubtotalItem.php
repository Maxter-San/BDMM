<li class="list-group-item">
    <div class="row">
        <div class="col">
            <?php echo $shoppingCardItemName; ?>
        </div>
        <div class="col">
            <?php echo $shoppingCardItemQuantity; ?>
        </div>
        <div class="col">
            $ <?php echo $shoppingCardItemPrice; ?>
        </div>
        <div class="col">
            $ <?php echo $shoppingCardItemQuantity * $shoppingCardItemPrice; ?>
        </div>
    </div>
</li>