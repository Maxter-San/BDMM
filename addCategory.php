<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='./style/sectionBarVariant.css'>
    <script src='./scripts/addCategory.js'></script>

    <link rel='stylesheet' type='text/css' media='screen' href='./style/toast.css'>
    <script src='./scripts/toast.js'></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
</head>

<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;" onload="<?php if(isset($_GET['successful']) || isset($_GET['failed'])){echo 'myFunction();';}?>">
    <?php
        session_start();
        include_once('apis/categoryApi.php');
        $var = new categorypApi();

        $rows = $var->getCreatedCategories();

        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h3 style="font-weight: lighter;">Elige una acción</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-grid gap-2">
                        <button class="btn btn-outline-dark" onclick="formAddCategory();" id="buttonAddCategory">Dar de alta una categoría</button>
                    </div>
                    <div class="col d-grid gap-2">
                        <button class="btn btn-outline-dark" onclick="formModifyCategory();" id="buttonModifyCategory">Modificar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <label style="color : red;" id="validationText"></label>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
                    <div class="row">
                        <div class="col-6">
                            <div class="col-md form-group">
                                <label class="form-label">Nombre de la categoría</label>
                                <input class="form-control" id="formCategoryName" placeholder="Escribe el nombre del producto..." name="name" required disabled>
                            </div>
                        </div>

                        <div class="col">
                            <div class="col-md form-group">
                                <label class="form-label">Foto de la categoría</label>
                                <input class="form-control" type="file" id="formFilePhoto" name="categoryPhoto" disabled>
                            </div>
                        </div>

                        <div class="col-1">
                            <div class="col-md form-group">
                                <label class="form-label">ID</label>
                                <input class="form-control" id="formCategoryId" placeholder="ID" name="categoryId" required readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md form-group">
                        <label class="form-label">Descripción de la categoría</label>
                        <textarea class="form-control" id="formCategoryDescription" placeholder="Escribe la descripción del producto..." rows="1" name="description" required disabled></textarea>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-warning" onclick="validateInfo();" id="buttonSubmit" name="submitButton" disabled>Aceptar</button>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-grid gap-2">
                            <button class="btn btn-outline-danger" onclick="cancelForm();" id="buttonCancel" disabled>Cancelar</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <?php 
            if(isset($_GET['successful'])){
                if($_GET['successful'] == 'add'){
        ?>
                    <div id="snackbar">Categoría agregada</div>
        <?php 
                }else if($_GET['successful'] == 'update'){
        ?>
                    <div id="snackbar">Categoría modificada</div>
        <?php
                }else if($_GET['successful'] == 'delete'){
        ?>
                    <div id="snackbar">Categoría borrada</div>
        <?php
                }
            }else if(isset($_GET['failed'])){
                if($_GET['failed'] == 'delete'){
        ?>
                    <div id="snackbar">No se puede borrar una categoría que esta ligada a un producto</div>
        <?php
                }
            }
        ?>

        <br>

        <?php 
            include_once('assets/sectionBarAddCategory.php');
        ?>

    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>