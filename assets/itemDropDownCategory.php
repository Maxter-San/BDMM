<li><a class="dropdown-item" data-value="item-<?php echo $name; ?>">
    <div class="form-check">
        <input class="checkCategories form-check-input" type="checkbox" value="<?php echo $name; ?>" id="flexCheckCategories" name="<?php echo $categoryId; ?>" onclick="countCheckCategories();" <?php if(isset($categories)){ if(count($categories) > 0){ for ($j=0; $j < count($categories); $j++){ if($categories[$j]['categoryId'] == $categoryId){ echo 'checked'; } } { 
            # code...
        } } } ?>>
        <label class="form-check-label" for="flexCheckCategories">
            <?php echo $name; ?>
        </label>
    </div>
</a></li>