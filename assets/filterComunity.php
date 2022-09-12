<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="col">
                <div class="mb-3">
                    <label for="formControlSearch" class="form-label">Busqueda</label>
                    <input type="email" class="form-control" id="formControlSearch" placeholder="Usuario...">
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="formControlCategory" class="form-label">Selecciona el tipo de usuario</label>
                    <div class="dropdown-center d-grid gap-2" id="formControlCategory">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Elige el tipo
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">                  
                            <li><a class="dropdown-item" href="#">
                                Administrador
                            </a></li>

                            <li><a class="dropdown-item" href="#">
                                Comprador
                            </a></li>

                            <li><a class="dropdown-item" href="#">
                                Vendedor
                            </a></li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="formControlSortBy" class="form-label">Ordenar por</label>
                    <div class="dropdown-center d-grid gap-2" id="formControlSortBy">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ordenar
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#">A-Z</a></li>
                            <li><a class="dropdown-item" href="#">Más antiguo</a></li>
                            <li><a class="dropdown-item" href="#">Más reciente</a></li>
                        </ul>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>