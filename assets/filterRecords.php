<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="col">
                <div class="mb-3">
                    <label for="formControlSortBy" class="form-label">Buscar por</label>
                    <div class="dropdown-center d-grid gap-2" id="formControlSortBy">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Rango de fecha
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#">Esta semana</a></li>
                            <li><a class="dropdown-item" href="#">Este mes</a></li>
                            <li><a class="dropdown-item" href="#">Este año</a></li>
                            <li><a class="dropdown-item" href="#">Hace mucho tiempo</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="formControlCategory" class="form-label">Selecciona la categoría</label>
                    <div class="dropdown-center d-grid gap-2" id="formControlCategory">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Elige una o más categorías
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">                  
                            <li><a class="dropdown-item" href="#">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Hogar
                                    </label>
                                </div>
                            </a></li>

                            <li><a class="dropdown-item" href="#">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Tecnología
                                    </label>
                                </div>
                            </a></li>

                            <li><a class="dropdown-item" href="#">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Otros
                                    </label>
                                </div>
                            </a></li>

                        </ul>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>