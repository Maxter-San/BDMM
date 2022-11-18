<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
            <div class="row">    
                <div class="col">
                    <div class="mb-3">
                        <label for="formControlSearch" class="form-label">Busqueda</label>
                        <input class="form-control" id="formControlSearch" placeholder="Producto..." name="name" value="<?php if(isset($_GET['name'])){echo $_GET['name'];}?>">
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <?php
                            $rows = $var->getAllCategories();
                            include_once('assets/dropDownCategory.php');
                        ?>
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <div class="mb-3">
                            <div class="col-md form-group">
                                <label class="form-label">Ordenar por</label>
                                <select class="form-select" id="formOrderBy" name="orderBy">
                                    <option value="BuyingDesc"
                                        <?php if(isset($_GET['orderBy'])){if($_GET['orderBy'] == "BuyingDesc"){echo("selected");}}?>
                                    >Más vendidos</option> 

                                    <option value="BuyingAsc"
                                        <?php if(isset($_GET['orderBy'])){if($_GET['orderBy'] == "BuyingAsc"){echo("selected");}}?>
                                    >Menos vendidos</option> 

                                    <option value="PriceAsc"
                                        <?php if(isset($_GET['orderBy'])){if($_GET['orderBy'] == "PriceAsc"){echo("selected");}}?>
                                    >Menor precio</option>

                                    <option value="PriceDesc"
                                        <?php if(isset($_GET['orderBy'])){if($_GET['orderBy'] == "PriceDesc"){echo("selected");}}?>
                                    >Mayor precio</option>

                                    <option value="ValorationDesc"
                                        <?php if(isset($_GET['orderBy'])){if($_GET['orderBy'] == "ValorationDesc"){echo("selected");}}?>
                                    >Mejor calificados</option>
                                    
                                    <option value="ValorationAsc"
                                        <?php if(isset($_GET['orderBy'])){if($_GET['orderBy'] == "ValorationAsc"){echo("selected");}}?>
                                    >Peor calificados</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-outline-warning" name="submitButtonSearchProductAdvanced">Buscar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>