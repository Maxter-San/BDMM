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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
</head>

<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;">
    <?php
        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="#" onsubmit="clearForm();" id="myForm">
                    <h3 style="font-weight: lighter;">Dar de alta una lista de deseos</h3>

                    <div class="row">
                        <div class="col">
                            <div class="col-md form-group">
                                <label class="form-label">Nombre de la lista</label>
                                <input class="form-control" id="formCategoryName" placeholder="Escribe el nombre del producto..." required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="col-md form-group">
                                <label class="form-label">Foto de la lista</label>
                                <input class="form-control" type="file" id="formFilePhoto">
                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group">
                            <label class="form-label">Descripción de la lista</label>
                            <textarea class="form-control" id="formCategoryDescription" placeholder="Escribe la descripción del producto..." rows="1" required></textarea>
                        </div>

                        <div class="col-md form-group">
                            <label class="form-label">Tipo de lista</label>
                            <select class="form-select" id="formGender" required>
                                <option selected value=""></option>
                                <option value="1">Privada</option>
                                <option value="2">Pública</option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-warning" onclick="validateInfo();">Agregar</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div id="snackbar">Lista agregada</div>

    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>