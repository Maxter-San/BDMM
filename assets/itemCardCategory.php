<div class="col-xl-3">
    <div class="card cardSectionBar">
        <img src=<?php echo $categoryImg; ?> class="card-img-top" alt="...">

        <div class="card-body">
        <a tabindex="0" class="btn btn-light" role="button" data-bs-toggle="popover<?php echo $categoryId; ?>" data-bs-trigger="focus" data-bs-placement="right" data-bs-title="Descripción" data-bs-content="<?php echo $categoryDescription; ?>"><h5 class="card-title"><?php echo $categoryName; ?></h5></a>
            
            <p class="card-text">Productos en la categoría: <?php echo $categoryQuantity; ?></p>
            <a href="./searchFilterProducts.php?categoryId=<?php echo $categoryId; ?>" class="btn btn-outline-warning">Ver categoría</a>
            
            <!--<?php echo $categoryId; ?> -->
        </div>
    </div>
</div>

<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover<?php echo $categoryId; ?>"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
</script>