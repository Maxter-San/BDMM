<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="myForm">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="formControlSearch" class="form-label">Busqueda</label>
                        <input class="form-control" id="formControlSearch" name="userName" placeholder="Usuario..." value="<?php if(isset($_GET['p_userName'])){echo $_GET['p_userName'];} ?>">
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <div class="col-md form-group">
                            <label class="form-label">Selecciona el tipo de usuario</label>
                            <select class="form-select" id="formUserType" name="userType">
                                <option value="Todos"
                                    <?php if(isset($_GET['p_userType'])){if($_GET['p_userType'] == "Todos"){echo("selected");}}?>
                                >Mostrar todos</option>

                                <option value="Admin"
                                    <?php if(isset($_GET['p_userType'])){if($_GET['p_userType'] == "Admin"){echo("selected");}}?>
                                >Administrador</option>

                                <option value="Vendedor"
                                    <?php if(isset($_GET['p_userType'])){if($_GET['p_userType'] == "Vendedor"){echo("selected");}}?>
                                >Vendedor</option>

                                <option value="Comprador"
                                    <?php if(isset($_GET['p_userType'])){if($_GET['p_userType'] == "Comprador"){echo("selected");}}?>
                                >Comprador</option>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <div class="col-md form-group">
                            <label class="form-label">Ordenar por</label>
                            <select class="form-select" id="formOrderBy" name="orderBy">
                                <option value="newer"
                                    <?php if(isset($_GET['p_orderBy'])){if($_GET['p_orderBy'] == "newer"){echo("selected");}}?>
                                >Más reciente</option>

                                <option value="older"
                                    <?php if(isset($_GET['p_orderBy'])){if($_GET['p_orderBy'] == "older"){echo("selected");}}?>
                                >Más antiguo</option>

                                <option value="asc"
                                    <?php if(isset($_GET['p_orderBy'])){if($_GET['p_orderBy'] == "asc"){echo("selected");}}?>
                                >A-Z</option>

                                <option value="desc"
                                    <?php if(isset($_GET['p_orderBy'])){if($_GET['p_orderBy'] == "desc"){echo("selected");}}?>
                                >Z-A</option> 

                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-outline-dark" name="submitButton">Filtrar</button>
            </div>
        </form>
                    
    </div>
</div>