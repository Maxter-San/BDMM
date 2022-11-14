<li><a class="dropdown-item" data-value="item-<?php echo $name; ?>">
    <div class="form-check">
        <input class="checkCategories form-check-input" type="checkbox" value="<?php echo $name; ?>" id="flexCheckCategories" name="<?php echo $categoryId; ?>" onclick="countCheckCategories();">
        <label class="form-check-label" for="flexCheckCategories">
            <?php echo $name; ?>
        </label>
    </div>
</a></li>