<div class="sectionBar">
    <?php
        for($i = 0;$i < count($rows);$i++){
            $numProd = $var->getNumCategoryWithProducts($rows[$i]['categoryId']);

            $categoryName = $rows[$i]['name'];
            $categoryImg = 'data:image;base64,'.base64_encode($rows[$i]['photo']);
            $categoryId = $rows[$i]['categoryId'];
            $categoryDescription = $rows[$i]['description'];
            $categoryQuantity = $numProd;
            include('assets/itemCardCategory.php');
        }
    ?>
</div>