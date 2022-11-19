<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='./style/sectionBarVariant.css'>
    <script src='./scripts/addWishList.js'></script>

    <link rel='stylesheet' type='text/css' media='screen' href='./style/toast.css'>
    <script src='./scripts/toast.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
</head>

<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;" onload="<?php if(isset($_GET['successful'])){echo 'myFunction();';}?>">
    <?php
        session_start();
        include_once('apis/wishListApi.php');
        $addWishListApi = new addWishListApi();

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
                        <button class="btn btn-outline-dark" onclick="formAddWishList();" id="buttonAddWishList">Dar de alta una lista de deseos</button>
                    </div>
                    <div class="col d-grid gap-2">
                        <button class="btn btn-outline-dark" onclick="formModifyWishList();" id="buttonModifyWishList">Modificar</button>
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
                    <h3 style="font-weight: lighter;">Lista de deseos</h3>

                    <div class="row">
                        <div class="col-6">
                            <div class="col-md form-group">
                                <label class="form-label">Nombre de la lista</label>
                                <input class="form-control" name="name" id="formWishListName" placeholder="Escribe un nombre para la lista..." required disabled>
                            </div>
                        </div>

                        <div class="col">
                            <div class="col-md form-group">
                                <label class="form-label">Foto de la lista</label>
                                <input class="form-control" type="file" name="wishListPhoto" id="formFilePhoto" disabled>
                            </div>
                        </div>

                        <div class="col-1">
                            <div class="col-md form-group">
                                <label class="form-label">ID</label>
                                <input class="form-control" id="formListWishId" placeholder="ID" name="listWishId" required readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group">
                            <label class="form-label">Descripción de la lista</label>
                            <textarea class="form-control" name="description" id="formWishListDescription" placeholder="Escribe la descripción del producto..." rows="1" maxlength="2000" required disabled></textarea>
                        </div>

                        <div class="col-md form-group">
                            <label class="form-label">Tipo de lista</label>
                            <select class="form-select" name="listType" id="formListType" required disabled>
                                <option selected value=""></option>
                                <option value="Privada">Privada</option>
                                <option value="Publica">Pública</option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-warning" id="buttonSubmit" name="submitButton" onclick="validateInfo();" disabled>Agregar</button>
                            </div>
                        </div>

                        <div class="col">
                            <div class="d-grid gap-2">
                            <button class="btn btn-outline-danger" id="buttonCancel" onclick="cancelForm();" id="buttonCancel" disabled>Cancelar</button>
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
                    <div id="snackbar">Lista agregada</div>
        <?php 
                }else if($_GET['successful'] == 'update'){
        ?>
                <div id="snackbar">Lista Modificada</div>
        <?php 
                }else if($_GET['successful'] == 'delete'){
        ?>
                <div id="snackbar">Lista borrada</div>
        <?php 
                }
            }
        ?>

        <br>

        <?php 
            $rows = $addWishListApi->selectCreatedWishList();
            include_once('assets/sectionBarAddWishList.php');
        ?>

    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>