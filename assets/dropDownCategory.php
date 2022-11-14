<div class="mb-3">
    <label for="formControlCategory" class="form-label">Selecciona la categoría</label>
    <div class="dropdown-center d-grid gap-2" id="CheckCategories">
        <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Elige una o más categorías
        </button>
        <ul class="dropdown-menu dropdown-menu-dark">                  
            
        <?php 
            for($i = 0;$i < count($rows);$i++){
                $name = $rows[$i]['name'];
                $categoryId = $rows[$i]['categoryId'];
                include('itemDrowDownCategory.php');
                
            }

        ?>

        </ul>

    </div>
</div>