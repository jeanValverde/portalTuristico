<?php
include_once '../models/Connection.php';
include_once '../controllers/TurismoService.php';
include_once '../models/Turismo.php';

include_once '../controllers/EmergenciaService.php';
include_once '../models/Emergencia.php';

$servicio = new TurismoService();

$arrayCajasVecinas = $servicio->read_turismos_by_tipo('cajaVecina');

$arrayCajasVecinasMapa = $servicio->read_turismos_by_tipo('cajaVecina');

$servicioEmergecia = new EmergenciaService();

$arrayEmergenciaCarabinero = $servicioEmergecia->read_emergencias_by_tipo('Carabineros');

$arrayEmergenciaSalud = $servicioEmergecia->read_emergencias_by_tipo('Salud');

$arrayEmergenciaBombero = $servicioEmergecia->read_emergencias_by_tipo('Bomberos');


?>






<section class="section bg-secondary section-lg pt-0">
    <div class="container">
        <div class="card  bg-riohurtado shadow-lg border-0">
            <div class="p-5">
                <h2 class="text-white">Teléfonos de emergencias</h2>
                <div class="row align-items-center">
                    <div class="col-lg-4">


                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">Carabineros de chile</h5>
                                <?php
                                if (isset($arrayEmergenciaCarabinero)) {
                                    while ($emergencia = array_shift($arrayEmergenciaCarabinero)) {
                                        ?>
                                        <h6 class="card-subtitle mb-2 text-muted"><br/><?= $emergencia->getUbicacion(); ?></h6>
                                        <a href="tel:+34000000000" class="card-link" >+5698373837</a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">Salud</h5>
                                <?php
                                if (isset($arrayEmergenciaSalud)) {
                                    while ($emergencia = array_shift($arrayEmergenciaSalud)) {
                                        ?>
                                        <h6 class="card-subtitle mb-2 text-muted"><br/><?= $emergencia->getUbicacion(); ?></h6>
                                        <a href="tel:+34000000000" class="card-link" >+5698373837</a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-4">

                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">Bomberos</h5>
                                <?php
                                if (isset($arrayEmergenciaBombero)) {
                                    while ($emergencia = array_shift($arrayEmergenciaBombero)) {
                                        ?>
                                        <h6 class="card-subtitle mb-2 text-muted"><br/><?= $emergencia->getUbicacion(); ?></h6>
                                        <a href="tel:+34000000000" class="card-link" >+5698373837</a>
                                        <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="section pb-0 bg-secondary">
    <div class="container">




    </div>
    <!-- SVG separator -->
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</section>

<section class="section section-lg">
    <div class="container">
        <div class="row justify-content-center text-center mb-lg">
            <div class="col-lg-8">
                <h2 class="display-3">Caja Vecinas</h2>
                <p class="lead text-muted"> Realiza desde giros y depósitos en efectivo hasta pagos de contribuciones o pagos de bonos consulta médica Fonasa.</p>
            </div>
        </div>
        <div class="row">

            <?php
            if (isset($arrayCajasVecinas)) {
                while ($cajasVecina = array_shift($arrayCajasVecinas)) {
                    ?>
                    <?php
                    $id = $cajasVecina->getIdTurismo();
                    if ($id % 2 == 0) {
                        ?>

                        <div class="col-md-4 col-lg-4 mb-5 mb-lg-0">
                            <div class="px-4">
                                <div id="<?= $id ?>" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="height: 300px;" ></div>
                                <div class="pt-4 text-center">
                                    <h5 class="title">
                                        <span class="d-block mb-1"><?= $cajasVecina->getNombre(); ?></span>
                                        <small class="h6 text-muted"><?= $cajasVecina->getLocalidad(); ?></small>
                                    </h5>
                                    <div class="mt-3">
                                        <a title="Giros y Depositos" href="#" class="btn btn-success btn-icon-only rounded-circle">
                                            <i class="ni ni-credit-card"></i>
                                        </a>
                                        <a title="Transferencia entre Cuentas" href="#" class="btn btn-success btn-icon-only rounded-circle">
                                            <i class="ni ni-money-coins"></i>
                                        </a>
                                        <a title="Pago de Cuentas" href="#" class="btn btn-success btn-icon-only rounded-circle">
                                            <i class="ni ni-shop"></i>
                                        </a>
                                        <a href="#" title="Recarga de Celulares" class="btn btn-success btn-icon-only rounded-circle">
                                            <i class="ni ni-mobile-button"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-6 col-lg-6 mb-5 mb-lg-0">
                            <div class="px-6">
                                <div id="<?= $id ?>" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="height: 500px;" ></div>
                                <div class="pt-4 text-center">
                                    <h5 class="title">
                                        <span class="d-block mb-1"><?= $cajasVecina->getNombre(); ?></span>
                                        <small class="h6 text-muted"><?= $cajasVecina->getLocalidad(); ?></small>
                                    </h5>
                                    <div class="mt-3">
                                        <a title="Giros y Depositos" href="#" class="btn btn-success btn-icon-only rounded-circle">
                                            <i class="ni ni-credit-card"></i>
                                        </a>
                                        <a title="Transferencia entre Cuentas" href="#" class="btn btn-success btn-icon-only rounded-circle">
                                            <i class="ni ni-money-coins"></i>
                                        </a>
                                        <a title="Pago de Cuentas" href="#" class="btn btn-success btn-icon-only rounded-circle">
                                            <i class="ni ni-shop"></i>
                                        </a>
                                        <a href="#" title="Recarga de Celulares" class="btn btn-success btn-icon-only rounded-circle">
                                            <i class="ni ni-mobile-button"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>

