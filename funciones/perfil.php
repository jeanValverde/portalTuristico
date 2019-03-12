
<div class="row">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">

        <div class="card card-profile shadow">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <a href="#">
                            <img src="../../assets-admin/img/theme/usuario.png" class="rounded-circle">
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                    <label class="custom-toggle">
                        <input checked disabled="" type="checkbox">
                        <span class="custom-toggle-slider rounded-circle"></span>
                    </label>
                </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h3>
                        <?= $usuario->getNombre() . " " . $usuario->getApellido(); ?> <span class="font-weight-light">, <?= $usuario->getRut(); ?></span>
                    </h3>
                    <span class="badge badge-pill badge-info"><?= $usuario->getArea(); ?></span>
                    <span class="badge badge-pill badge-primary"><?= $usuario->getCorreo(); ?></span>
                    <span class="badge badge-pill badge-danger"><?= $usuario->getTipo(); ?></span>
                    <span class="badge badge-pill badge-success"><?= $usuario->getCargo(); ?></span>
                </div>
            </div>
        </div>

        <div style="height: 40px;" ></div>

        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Cambiar Contraseña</h3>
                    </div>
                    <div class="col-4 text-right">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="../../funciones/changePassword.php"  >
                    <input type="hidden" value="<?= $usuario->getRut(); ?>" name="rut" />
                    <div class="pl-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Contraseña actual</label>
                                    <input type="password" name="passwordAnterior" id="input-username"  class="form-control form-control-alternative" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Nueva Contraseña</label>
                                    <input type="password" id="input-username" class="form-control form-control-alternative" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Repita la contraseña</label>
                                    <input type="password" name="password" id="input-username" class="form-control form-control-alternative" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" >Cambiar contraseña</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Mi cuenta</h3>
                    </div>
                    <div class="col-4 text-right">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <h6 class="heading-small text-muted mb-4">Información Personal</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">RUT</label>
                                    <input type="text" disabled="" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="<?= $usuario->getRut(); ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email</label>
                                    <input type="email" id="input-email" disabled="" class="form-control form-control-alternative" placeholder="<?= $usuario->getCorreo(); ?>" value="<?= $usuario->getCorreo(); ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Nombre</label>
                                    <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="<?= $usuario->getNombre(); ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Apellido</label>
                                    <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="<?= $usuario->getApellido(); ?>">
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
                                    <label class="form-control-label" for="input-city">Area</label>
                                    <input disabled="" type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="<?= $usuario->getArea(); ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">Cargo</label>
                                    <input disabled="" type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="<?= $usuario->getCargo(); ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">Tipo</label>
                                    <input disabled="" type="text" id="input-postal-code" class="form-control form-control-alternative" placeholder="" value="<?= $usuario->getTipo(); ?>" >
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


    