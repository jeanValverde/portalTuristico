
<div class="row">
    <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0">

        
    <div class="card">
            <div class="card-body">
                <table class="table align-items-center table-dark" id="emergencia"  style="width:100%; ">
                    <thead class="thead-light" >
                        <tr><th>Tipo</th>
                            <th>Ubicación</th>
                            <th>Numero</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  ?>
                            <tr>
                                <td><?= "sasdasda" ?></td>
                                <td><?= "sdfsad" ?></td>
                                <td><?= "sdsdasd" ?></td>
                                <td>
                                    <a href="../admin/emergencia.php?idEmergencia=<?= "asdasd" ?>" class="btn btn-warning" >Editar</a>
                                    <a href="../../funciones/deleteEmergencia.php?idEmergencia=<?= "asdasda" ?>"   class="btn btn-danger" >Eliminar</a>
                                </td>
                            </tr>
                        <?php  ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="col-xl-6 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">My account</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">RUT</label>
                                    <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email</label>
                                    <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Nombre</label>
                                    <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Apellido</label>
                                    <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Empresa</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-city">Cargo</label>
                                    <input  type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">Area</label>
                                    <input  type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">Tipo</label>
                                    <input  type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" >Editar mi perfil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    