<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
     
    <link rel='stylesheet' type='text/css' media='screen' href='./style/market.css'>
    <script src='./scripts/jquery-3.6.1.min.js'></script>
    <script src='./scripts/productSettings.js'></script>

    <link rel='stylesheet' type='text/css' media='screen' href='./style/toast.css'>
    <script src='./scripts/toast.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel='stylesheet' type='text/css' media='screen' href='./style/sectionBarVariant.css'>
    
</head>

<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;" onload="<?php if(isset($_GET['successful'])){echo 'myFunction();';}else if(isset($_GET['failed'])){echo 'myFunction();';}?>">
    <?php
        session_start();

        include_once('apis/categoryApi.php');
        $var = new categorypApi();
        $rows = $var->getAllCategories();

        include_once('apis/productApi.php');
        $productApi = new productApi();
        $product = $productApi->selectProductBySellerIdAndProductId();
        
        $categories = array();
        if(count($product) > 0){ 
            $categories = $productApi->selectCategoriesByProductId($product[0]['productId']); 
        }
        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
        <legend>Editar productos</legend>

        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                    <h3 style="font-weight: lighter;">Modificar un producto</h3>

                    <input class="form-control" id="formProductId" name="productId" value="<?php if(count($product) > 0){ echo $product[0]['productId']; } ?>" hidden>

                    <div class="row">
                        <div class="col">
                            <div class="col-md form-group">
                                <label class="form-label">Nombre del producto</label>
                                <input class="form-control" id="formProductName" placeholder="Escribe el nombre del producto..." maxlength="50" name="name" required value="<?php if(count($product) > 0){ echo $product[0]['name']; } ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-md form-group">
                                <label class="form-label">Descripción del producto</label>
                                <textarea class="form-control" id="formProductDescription" placeholder="Escribe la descripción del producto..." rows="1" maxlength="2000" name="description" required><?php if(count($product) > 0){ echo $product[0]['description']; } ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5 form-group">
                            <?php
                                include_once('assets/dropDownCategory.php');
                            ?>
                        </div>
                        
                        <div class="col-1">
                            <label class="form-label">#</label>
                            <input class="form-control" id="numCheckCategory" name="numCheckCategory" placeholder="0">
                        </div>

                        <div class="col-md form-group">
                            <label class="form-label">Cantidad en stock</label>
                            <input type="number" class="form-control" id="formProductStock" placeholder="Cantidad de producto disponible..." onkeypress="integerNum();" name="quantity" required value="<?php if(count($product) > 0){ echo $product[0]['quantity']; } ?>">
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="col-md form-group">
                            <label class="form-label">Tipo de venta</label>
                            <select class="form-select" id="formSellType" name="method" disabled>
                                <option selected value=""></option>
                                <option value="Vender" <?php if(count($product) > 0){ if($product[0]['method'] == 'Vender'){ echo 'selected';} } ?> >Vender</option>
                                <option value="Cotizar" <?php if(count($product) > 0){ if($product[0]['method'] == 'Cotizar'){ echo 'selected';} } ?> >Cotizar</option>
                            </select>
                        </div> 

                        <div class="col-md form-group">
                            <label class="form-label">Precio del producto</label>
                            <input type="number" class="form-control" id="formProductPrice" placeholder="$ 0.00" onkeypress="floatingNum();" step="0.01" name="price" required value="<?php if(count($product) > 0){ echo $product[0]['price'].'.00'; } ?>">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md form-group">
                            <label class="form-label">Agrega más fotos del producto</label>
                            <input class="form-control" type="file" id="formFilePhoto" onchange="minFiles(this);" name="productPhoto[]" multiple>
                        </div>

                        <div class="col-md form-group">
                            <label class="form-label">Agrega más videos del producto</label>
                            <input class="form-control" type="file" id="formFileClip" name="productVideo[]" multiple>
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-warning" onclick="validateProduct();" name="submitUpdateProduct">Editar</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <?php 
            include_once('assets/sectionBarProductMedia.php');

            if(isset($_GET['successful'])){
                if($_GET['successful'] == 'update'){
        ?>
                    <div id="snackbar">Producto modificado</div>  
        <?php          
                }else if($_GET['successful'] == 'deleteImage'){
        ?>
                    <div id="snackbar">Imagen eliminada</div>  
        <?php    
                }else if($_GET['successful'] == 'deleteVideo'){
        ?>
                    <div id="snackbar">Video eliminado</div>  
        <?php    
                }
            }else if(isset($_GET['failed'])){
                if($_GET['failed'] == 'deleteImage'){
        ?>
                    <div id="snackbar">No puedes eliminar más imagenes</div>  
        <?php      
                }else if($_GET['failed'] == 'deleteVideo'){
        ?>
                    <div id="snackbar">No puedes eliminar más videos</div>  
        <?php      
                }
            }
        ?>


    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>