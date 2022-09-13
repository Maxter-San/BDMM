<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Maxter shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
     
    <link rel='stylesheet' type='text/css' media='screen' href='./style/market.css'>
    <script src='./scripts/jquery-3.6.1.min.js'></script>
    <script src='./scripts/market.js'></script>

    <link rel='stylesheet' type='text/css' media='screen' href='./style/toast.css'>
    <script src='./scripts/toast.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel='stylesheet' type='text/css' media='screen' href='./style/sectionBar.css'>
    
</head>
<body class="d-flex flex-column min-vh-100" style="margin-top: 3.5em;">
    <?php
        include_once('assets/header.php');
    ?>

    <div class="container mt-5 mb-5">
        <legend>Vender productos</legend>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="#" onsubmit="myFunction();" id="myForm">
                    <h3 style="font-weight: lighter;">Dar de alta un producto</h3>

                    <div class="row">
                        <div class="col">
                            <div class="col-md form-group">
                                <label class="form-label">Nombre del producto</label>
                                <input class="form-control" id="formProductName" placeholder="Escribe el nombre del producto..." required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-md form-group">
                                <label class="form-label">Descripción del producto</label>
                                <textarea class="form-control" id="formProductDescription" placeholder="Escribe la descripción del producto..." rows="1" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md form-group">
                            <div class="mb-3">
                                <label for="formControlCategory" class="form-label">Selecciona la categoría</label>
                                <div class="dropdown-center d-grid gap-2" id="formControlCategory">
                                    <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Elige una o más categorías
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark">                  
                                        <li><a class="dropdown-item" href="#" data-value="Hogar">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckHogar">
                                                <label class="form-check-label" for="flexCheckHogar">
                                                    Hogar
                                                </label>
                                            </div>
                                        </a></li>

                                        <li><a class="dropdown-item" href="#" data-value="Tecnologia">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckTecnologia">
                                                <label class="form-check-label" for="flexCheckTecnologia">
                                                    Tecnología
                                                </label>
                                            </div>
                                        </a></li>

                                        <li><a class="dropdown-item" href="#">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckOtros">
                                                <label class="form-check-label" for="flexCheckOtros">
                                                    Otros
                                                </label>
                                            </div>
                                        </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md form-group">
                            <label class="form-label">Cantidad en stock</label>
                            <input type="number" class="form-control" id="formProductStock" placeholder="Cantidad de producto disponible..." onkeypress="integerNum();" required>
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="col-md form-group">
                            <label class="form-label">Tipo de venta</label>
                            <select class="form-select" id="formSellType" required>
                                <option selected value=""></option>
                                <option value="1">Vender</option>
                                <option value="2">Cotizar</option>
                            </select>
                        </div> 

                        <div class="col-md form-group">
                            <label class="form-label">Precio del producto</label>
                            <input type="number" class="form-control" id="formProductPrice" placeholder="$ 0.00" onkeypress="floatingNum();" step="0.01" required>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md form-group">
                            <label class="form-label">Fotos del producto</label>
                            <input class="form-control" type="file" id="formFilePhoto" onchange="minFiles(this);" multiple>
                        </div>

                        <div class="col-md form-group">
                            <label class="form-label">Video del producto</label>
                            <input class="form-control" type="file" id="formFileClip" multiple>
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-warning" onclick="validateProduct();">Agregar</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div id="snackbar">Producto agregado</div>  

        <br>

        <legend>Productos por confirmar</legend>
        <?php 
            include_once('assets/sectionBarMarketOnHold.php');
        ?>
    </div>

    <?php
        include_once('assets/footer.php');
    ?>

</body>
</html>