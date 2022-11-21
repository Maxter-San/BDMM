<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <div class="col-md form-group">
                            <label class="form-label">Ordenar por</label>
                            <select class="form-select" id="formOrderBy" name="orderBy">
                                <option value="All"
                                    <?php if(isset($_GET['orderBy'])){if($_GET['orderBy'] == "All"){echo("selected");}}?>
                                >Todos</option>

                                <option value="Week"
                                    <?php if(isset($_GET['orderBy'])){if($_GET['orderBy'] == "Week"){echo("selected");}}?>
                                >Esta semana</option>

                                <option value="Month"
                                    <?php if(isset($_GET['orderBy'])){if($_GET['orderBy'] == "Month"){echo("selected");}}?>
                                >Este mes</option>

                                <option value="Year"
                                    <?php if(isset($_GET['orderBy'])){if($_GET['orderBy'] == "Year"){echo("selected");}}?>
                                >Este año</option>

                                <option value="LongAgo"
                                    <?php if(isset($_GET['orderBy'])){if($_GET['orderBy'] == "LongAgo"){echo("selected");}}?>
                                >Hace mucho tiempo</option> 

                                <option value="Group"
                                    <?php if(isset($_GET['group'])){ echo("selected");}?>
                                >Consulta agrupada Mes-Año</option> 

                            </select>
                        </div>
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
            
            </div>

            <div class="row">
                <div class="col">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-outline-warning" name="submitButtonSearchSellerRecords">Buscar</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>