   
<?php
include_once '../models/Connection.php';
include_once '../controllers/EmpresaService.php';
include_once '../models/Empresa.php';
include_once '../controllers/RecorridoService.php';
include_once '../models/Recorrido.php';

$recorridos = null;




$recorridoService = new RecorridoService();


$localidades = array(
    "Las Breas" => "Las Breas",
    "El Bosque" => "El Bosque",
    "Lavaderos" => "Lavaderos",
    "El Chañar" => "El Chañar",
    "Hurtado" => "Hurtado",
    "Morrillos" => "Morrillos",
    "Seron" => "Seron",
    "Fundina" => "Fundina",
    "Pichasca" => "Pichasca",
    "San Pedro" => "San Pedro",
    "El Espinal" => "El Espinal",
    "Samo Alto" => "Samo Alto",
    "Huampulla" => "Huampulla",
    "Tabaqueros" => "Tabaqueros",
    "Algarrobos" => "Algarrobos",
);

$recorridosTodos = $recorridoService->read_recorridos_by_dia_actual();

$recorridosTarde = $recorridoService->read_recorridos_by_dia_actual();

$lunes = $recorridoService->read_recorridos_by_dia_trayecto("Lunes", "All");
$martes = $recorridoService->read_recorridos_by_dia_trayecto("Martes", "All");
$miercoles = $recorridoService->read_recorridos_by_dia_trayecto("Miércoles", "All");
$jueves = $recorridoService->read_recorridos_by_dia_trayecto("Jueves", "All");
$viernes = $recorridoService->read_recorridos_by_dia_trayecto("Viernes", "All");
$sabado = $recorridoService->read_recorridos_by_dia_trayecto("Sábado", "All");
$domigo = $recorridoService->read_recorridos_by_dia_trayecto("Domingo", "All");

$lunesOvalle = $recorridoService->read_recorridos_by_dia_trayecto("Lunes", "Ovalle");
$martesOvalle = $recorridoService->read_recorridos_by_dia_trayecto("Martes", "Ovalle");
$miercolesOvalle = $recorridoService->read_recorridos_by_dia_trayecto("Miércoles", "Ovalle");
$juevesOvalle = $recorridoService->read_recorridos_by_dia_trayecto("Jueves", "Ovalle");
$viernesOvalle = $recorridoService->read_recorridos_by_dia_trayecto("Viernes", "Ovalle");
$sabadoOvalle = $recorridoService->read_recorridos_by_dia_trayecto("Sábado", "Ovalle");
$domigoOvalle = $recorridoService->read_recorridos_by_dia_trayecto("Domingo", "Ovalle");

#aseo

$lunesAseo = $recorridoService->read_recorridos_by_dia_trayecto_aseo("Lunes", "All");
$martesAseo = $recorridoService->read_recorridos_by_dia_trayecto_aseo("Martes", "All");
$miercolesAseo = $recorridoService->read_recorridos_by_dia_trayecto_aseo("Miércoles", "All");
$juevesAseo = $recorridoService->read_recorridos_by_dia_trayecto_aseo("Jueves", "All");
$viernesAseo = $recorridoService->read_recorridos_by_dia_trayecto_aseo("Viernes", "All");
$sabadoAseo = $recorridoService->read_recorridos_by_dia_trayecto_aseo("Sábado", "All");
$domigoAseo = $recorridoService->read_recorridos_by_dia_trayecto_aseo("Domingo", "All");


$lunesOvalleAseo = $recorridoService->read_recorridos_by_dia_trayecto_aseo("Lunes", "Ovalle");
$martesOvalleAseo = $recorridoService->read_recorridos_by_dia_trayecto_aseo("Martes", "Ovalle");
$miercolesOvalleAseo = $recorridoService->read_recorridos_by_dia_trayecto_aseo("Miércoles", "Ovalle");
$juevesOvalleAseo = $recorridoService->read_recorridos_by_dia_trayecto_aseo("Jueves", "Ovalle");
$viernesOvalleAseo = $recorridoService->read_recorridos_by_dia_trayecto_aseo("Viernes", "Ovalle");
$sabadoOvalleAseo = $recorridoService->read_recorridos_by_dia_trayecto_aseo("Sábado", "Ovalle");
$domigoOvalleAseo = $recorridoService->read_recorridos_by_dia_trayecto_aseo("Domingo", "Ovalle");



if (isset($_POST["localidad"])) {


    $recorridoService = new RecorridoService();

    $localidad = $_POST["localidad"];

    $recorridos = $recorridoService->obtener_recorrido_proximo($localidad);
}
?>





<!--aca-->
<section class="section section-components pb-0" id="section-components">
    <div class="container">
        <div class="row justify-content-center">
            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-bus-front-12 mr-2"></i>Rio Hurtado - Ovalle </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Ovalle - Rio Hurtado</a>
                    </li>
                </ul>
            </div>
            <a name="transporte" id="lancha"></a> 
            <div class="card shadow">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">

                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="h4 text-center font-weight-bold mb-4">¿Dónde te encuentras?</h3>
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <span class="alert-inner--icon"><i class="ni ni-square-pin"></i></span>
                                        <span class="alert-inner--text"><strong>Horarios </strong> pueden variar segun la localidad</span>
                                    </div>
                                    <form action="transporte#transporte" method="POST">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Localidad</label>
                                            <select name="localidad" class="form-control" id="exampleFormControlSelect1">
                                                <?php foreach ($localidades as $localidad) { ?>
                                                    <option value="<?= $localidad ?>" ><?= $localidad ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <button  class="btn btn-icon btn-3 btn-primary" type="submit" title="Buscar un recorrido a partir de hoy y de la localidad más próxima que te encuentras" >
                                                    <span class="btn-inner--icon"><i class="ni ni-bag-17 fa fa-bus"></i></span>
                                                    <span class="btn-inner--text">Buscar transporte</span>
                                                </button>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="#recorridos" title="Ver todos los recorridos de la semana." class="btn btn-icon btn-3 btn-primary" >
                                                    <span class="btn-inner--icon"><i class="ni ni-bag-17 fa fa-heart"></i></span>
                                                    <span class="btn-inner--text">Ver todo</span>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <div style="height: 20px;" ></div>
                                    <div class="mb-3 text-center">
                                        <small class="text-uppercase font-weight-bold">Horarios estimados disponibles</small>
                                    </div>
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <span class="alert-inner--icon"><i class="ni ni-watch-time"></i></span>
                                        <span class="alert-inner--text"><strong>Horarios </strong> informados a la municipalidad</span>
                                    </div>
                                    <!--resultados inicio-->

                                    <?php
                                    if ($recorridos != null) {

                                        while ($recorrido = array_shift($recorridos)) {
                                            ?>
                                            <button type="button" class="btn btn-block btn-warning mb-3" data-toggle="modal" data-target="#modal-notification-<?= $recorrido->getIdRecorrido(); ?>">Salida a las <?= $recorrido->getHoraSalida(); ?></button>
                                            <div class="modal fade" id="modal-notification-<?= $recorrido->getIdRecorrido(); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                    <div class="modal-content bg-gradient-danger">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="modal-title-notification">Tranporte con destino a Ovalle</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="py-3 text-center">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div style="height: 5px;" ></div>
                                                                        <img src="./assets/img/theme/bus.png" style="width: 30%;" alt=""><br>
                                                                        Origen <?= $recorrido->getTrayectoInicio(); ?> a las <?= $recorrido->getHoraSalida(); ?>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <img src="./assets/img/theme/destino.png" style="width: 30%;" >
                                                                        <br>
                                                                        Llegada a las <?php echo $recorrido->getHoraLlegada(); ?> Aprox.

                                                                    </div>
                                                                </div>

                                                                <h4 class="heading mt-4">Buses <?= $recorrido->getEmpresa()->getNombre(); ?></h4>
                                                                <p> Contacto: <?= $recorrido->getEmpresa()->getContacto(); ?> <br/>  Horarios estimados pueden variar</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--resultados fin-->
                                            <?php
                                        }
                                    } else if (empty($recorrido)) {
                                        ?>
                                        <div class="alert alert-primary bg-riohurtado" role="alert">
                                            <strong>1</strong> Selecciona en qué localidad te encuentras 
                                        </div>
                                        <div class="alert alert-primary bg-riohurtado" role="alert">
                                            <strong>2</strong> Visualiza los resultados haciendo click
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            Transporte en la mañana
                                        </div>
                                        <div class="card-body">
                                            <div class="alert alert-warning bg-riohurtado" role="alert">
                                                <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidad</span>
                                            </div>
                                            <?php
                                            while ($recorrido = array_shift($recorridosTodos)) {
                                                $hora = $recorrido->getHoraSalida()[0] . $recorrido->getHoraSalida()[1] . $recorrido->getHoraSalida()[3] . $recorrido->getHoraSalida()[4];
                                                ?>
                                                <?php if ($hora < 1200 & $recorrido->getTrayectoInicio() == "Ovalle") { ?>
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                                        <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino <?= $recorrido->getTrayectoFinal(); ?></span>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            Transporte en la tarde
                                        </div>
                                        <div class="card-body">
                                            <div class="alert alert-warning bg-riohurtado" role="alert">
                                                <span class="alert-inner--text"><strong>Salida</strong> Terminal Buses Rurales Feria Modelo</span>
                                            </div>
                                            <?php
                                            while ($recorrido = array_shift($recorridosTarde)) {
                                                $hora = $recorrido->getHoraSalida()[0] . $recorrido->getHoraSalida()[1] . $recorrido->getHoraSalida()[3] . $recorrido->getHoraSalida()[4];
                                                ?>
                                                <?php if ($hora > 1200 & $recorrido->getTrayectoInicio() == "Ovalle") { ?>
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                                        <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino <?= $recorrido->getTrayectoFinal(); ?></span>
                                                    </div>
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
            </div>
        </div>
</section>
<section class="section pb-0 section-components">
    <div class="py-5 bg-secondary">
        <div class="container">
            <!-- Inputs (alternative) -->
            <div class="mb-3">
                <small class="text-uppercase font-weight-bold">Mapa del recorrido</small>
            </div>
            <div id='map' style="color:#000;"></div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <!-- Custom controls -->
        <div class="row justify-content-center mt-md">
            <div class="col-lg-12">
                <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#recorrido" data-width="100%" data-numposts="10"></div>
            </div>
        </div>
    </div>
</section>
<section class="section section-components">
    <a name="recorridos" id="lancha"></a> 
    <div class="container">
        <div class="mb-3 text-center">
            <small class="text-uppercase font-weight-bold">Recorrido de buses interurbano en la semana</small>
        </div>
        <div class="row justify-content-center">
            <div class="row">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">Lunes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2" aria-selected="false">Martes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab" data-toggle="tab" href="#tabs-text-3" role="tab" aria-controls="tabs-text-3" aria-selected="false">Miércoles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-4-tab" data-toggle="tab" href="#tabs-text-4" role="tab" aria-controls="tabs-text-3" aria-selected="false">Jueves</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-5-tab" data-toggle="tab" href="#tabs-text-5" role="tab" aria-controls="tabs-text-3" aria-selected="false">Viernes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-6-tab" data-toggle="tab" href="#tabs-text-6" role="tab" aria-controls="tabs-text-3" aria-selected="false">Sábado</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-7-tab" data-toggle="tab" href="#tabs-text-7" role="tab" aria-controls="tabs-text-3" aria-selected="false">Domingo</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    Rio Hurtado - Ovalle
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-info bg-riohurtado" role="alert">
                                                        <span class="alert-inner--text"><strong>Horarios</strong> Pueden variar según la localidad</span>
                                                    </div>
                                                    <!--while-->
                                                    <?php
                                                    if ($lunes != null) {
                                                        while ($recorrido = array_shift($lunes)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Origen en <?= $recorrido->getTrayectoInicio(); ?></span>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    Ovalle - Rio Hurtado
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-warning bg-riohurtado" role="alert">
                                                        <span class="alert-inner--text"><strong>Salida</strong> Terminal Buses Rurales Feria Modelo</span>
                                                    </div>
                                                    <!--while-->
                                                    <?php
                                                    if ($lunesOvalle != null) {
                                                        while ($recorrido = array_shift($lunesOvalle)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino a <?= $recorrido->getTrayectoFinal(); ?></span>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    Rio Hurtado - Ovalle
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-info bg-riohurtado" role="alert">
                                                        <span class="alert-inner--text"><strong>Horarios</strong> Pueden variar según la localidad</span>
                                                    </div>
                                                    <!--while-->
                                                    <?php
                                                    if ($martes != null) {
                                                        while ($recorrido = array_shift($martes)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Origen en <?= $recorrido->getTrayectoInicio(); ?></span>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    Ovalle - Rio Hurtado
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-warning bg-riohurtado" role="alert">
                                                        <span class="alert-inner--text"><strong>Salida</strong> Terminal Buses Rurales Feria Modelo</span>
                                                    </div>
                                                    <!--while-->
                                                    <?php
                                                    if ($martesOvalle != null) {
                                                        while ($recorrido = array_shift($martesOvalle)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino a <?= $recorrido->getTrayectoFinal(); ?></span>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-text-3" role="tabpanel" aria-labelledby="tabs-text-3-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    Rio Hurtado - Ovalle
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-info bg-riohurtado" role="alert">
                                                        <span class="alert-inner--text"><strong>Horarios</strong>  Pueden variar según la localidad</span>
                                                    </div>
                                                    <!--while-->
                                                    <?php
                                                    if ($miercoles != null) {
                                                        while ($recorrido = array_shift($miercoles)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Origen en <?= $recorrido->getTrayectoInicio(); ?></span>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    Ovalle - Rio Hurtado
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-warning bg-riohurtado" role="alert">
                                                        <span class="alert-inner--text"><strong>Salida</strong> Terminal Buses Rurales Feria Modelo</span>
                                                    </div>
                                                    <!--while-->
                                                    <?php
                                                    if ($miercolesOvalle != null) {
                                                        while ($recorrido = array_shift($miercolesOvalle)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino a <?= $recorrido->getTrayectoFinal(); ?></span>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-text-4" role="tabpanel" aria-labelledby="tabs-text-4-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    Rio Hurtado - Ovalle
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-info bg-riohurtado" role="alert">
                                                        <span class="alert-inner--text"><strong>Horarios</strong>  Pueden variar según la localidad</span>
                                                    </div>
                                                    <!--while-->
                                                    <?php
                                                    if ($jueves != null) {
                                                        while ($recorrido = array_shift($jueves)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Origen en <?= $recorrido->getTrayectoInicio(); ?></span>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    Ovalle - Rio Hurtado
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-warning bg-riohurtado" role="alert">
                                                        <span class="alert-inner--text"><strong>Salida</strong> Terminal Buses Rurales Feria Modelo</span>
                                                    </div>
                                                    <!--while-->
                                                    <?php
                                                    if ($juevesOvalle != null) {
                                                        while ($recorrido = array_shift($juevesOvalle)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino a <?= $recorrido->getTrayectoFinal(); ?></span>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-text-5" role="tabpanel" aria-labelledby="tabs-text-5-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    Rio Hurtado - Ovalle
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-info bg-riohurtado" role="alert">
                                                        <span class="alert-inner--text"><strong>Horarios</strong>  Pueden variar según la localidad</span>
                                                    </div>
                                                    <!--while-->
                                                    <?php
                                                    if ($viernes != null) {
                                                        while ($recorrido = array_shift($viernes)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Origen en <?= $recorrido->getTrayectoInicio(); ?></span>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    Ovalle - Rio Hurtado
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-warning bg-riohurtado" role="alert">
                                                        <span class="alert-inner--text"><strong>Salida</strong> Terminal Buses Rurales Feria Modelo</span>
                                                    </div>
                                                    <!--while-->
                                                    <?php
                                                    if ($viernesOvalle != null) {
                                                        while ($recorrido = array_shift($viernesOvalle)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino a <?= $recorrido->getTrayectoFinal(); ?></span>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-text-6" role="tabpanel" aria-labelledby="tabs-text-6-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    Rio Hurtado - Ovalle
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-info bg-riohurtado" role="alert">
                                                        <span class="alert-inner--text"><strong>Horarios</strong>  Pueden variar según la localidad</span>
                                                    </div>
                                                    <!--while-->
                                                    <?php
                                                    if ($sabado != null) {
                                                        while ($recorrido = array_shift($sabado)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Origen en <?= $recorrido->getTrayectoInicio(); ?></span>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    Ovalle - Rio Hurtado
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-warning bg-riohurtado" role="alert">
                                                        <span class="alert-inner--text"><strong>Salida</strong> Terminal Buses Rurales Feria Modelo</span>
                                                    </div>
                                                    <!--while-->
                                                    <?php
                                                    if ($sabadoOvalle != null) {
                                                        while ($recorrido = array_shift($sabadoOvalle)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino a <?= $recorrido->getTrayectoFinal(); ?></span>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-text-7" role="tabpanel" aria-labelledby="tabs-text-7-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    Rio Hurtado - Ovalle
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-info bg-riohurtado" role="alert">
                                                        <span class="alert-inner--text"><strong>Horarios</strong>  Pueden variar según la localidad</span>
                                                    </div>
                                                    <!--while-->
                                                    <?php
                                                    if ($domigo != null) {
                                                        while ($recorrido = array_shift($domigo)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Origen en <?= $recorrido->getTrayectoInicio(); ?></span>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    Ovalle - Rio Hurtado
                                                </div>
                                                <div class="card-body">
                                                    <div class="alert alert-warning bg-riohurtado" role="alert">
                                                        <span class="alert-inner--text"><strong>Salida</strong> Terminal Buses Rurales Feria Modelo</span>
                                                    </div>
                                                    <!--while-->
                                                    <?php
                                                    if ($domigoOvalle != null) {
                                                        while ($recorrido = array_shift($domigoOvalle)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino a <?= $recorrido->getTrayectoFinal(); ?></span>
                                                            </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<a name="aseo" id="lancha"></a> 

<section class="section pb-0 section-components">
    <div class="py-5 bg-secondary">
        <div class="container">
            <!-- Inputs (alternative) -->
            <div class="mb-3 text-center">
                <small class="text-uppercase font-weight-bold">Recorrido de Aseo comunal en la semana</small>
            </div>
            <div class="row justify-content-center">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-11-tab" data-toggle="tab" href="#tabs-text-11" role="tab" aria-controls="tabs-text-11" aria-selected="true">Lunes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-22-tab" data-toggle="tab" href="#tabs-text-22" role="tab" aria-controls="tabs-text-22" aria-selected="false">Martes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-33-tab" data-toggle="tab" href="#tabs-text-33" role="tab" aria-controls="tabs-text-33" aria-selected="false">Miércoles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-44-tab" data-toggle="tab" href="#tabs-text-44" role="tab" aria-controls="tabs-text-44" aria-selected="false">Jueves</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-55-tab" data-toggle="tab" href="#tabs-text-55" role="tab" aria-controls="tabs-text-55" aria-selected="false">Viernes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-66-tab" data-toggle="tab" href="#tabs-text-66" role="tab" aria-controls="tabs-text-66" aria-selected="false">Sábado</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-77-tab" data-toggle="tab" href="#tabs-text-77" role="tab" aria-controls="tabs-text-77" aria-selected="false">Domingo</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tabs-text-11" role="tabpanel" aria-labelledby="tabs-text-11-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        Rio Hurtado - Ovalle
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-warning bg-riohurtado" role="alert">
                                                            <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidad </span>
                                                        </div>
                                                        <!--while-->
                                                        <?php
                                                        if ($lunesAseo != null) {
                                                            while ($recorrido = array_shift($lunesAseo)) {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Origen en <?= $recorrido->getTrayectoInicio(); ?></span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        Ovalle - Rio Hurtado
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-warning bg-riohurtado" role="alert">
                                                            <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidad</span>
                                                        </div>
                                                        <!--while-->
                                                        <?php
                                                        if ($lunesOvalleAseo != null) {
                                                            while ($recorrido = array_shift($lunesOvalleAseo)) {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino a <?= $recorrido->getTrayectoFinal(); ?></span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-text-22" role="tabpanel" aria-labelledby="tabs-text-22-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        Rio Hurtado - Ovalle
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-warning bg-riohurtado" role="alert">
                                                            <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidad</span>
                                                        </div>
                                                        <!--while-->
                                                        <?php
                                                        if ($martesAseo != null) {
                                                            while ($recorrido = array_shift($martesAseo)) {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Origen en <?= $recorrido->getTrayectoInicio(); ?></span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        Ovalle - Rio Hurtado
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-warning bg-riohurtado" role="alert">
                                                            <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidad</span>
                                                        </div>
                                                        <!--while-->
                                                        <?php
                                                        if ($martesOvalleAseo != null) {
                                                            while ($recorrido = array_shift($martesOvalleAseo)) {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino a <?= $recorrido->getTrayectoFinal(); ?></span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-text-33" role="tabpanel" aria-labelledby="tabs-text-33-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        Rio Hurtado - Ovalle
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-warning bg-riohurtado" role="alert">
                                                            <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidad</span>
                                                        </div>
                                                        <!--while-->
                                                        <?php
                                                        if ($miercolesAseo != null) {
                                                            while ($recorrido = array_shift($miercolesAseo)) {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Origen en <?= $recorrido->getTrayectoInicio(); ?></span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        Ovalle - Rio Hurtado
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-warning bg-riohurtado" role="alert">
                                                            <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidad</span>
                                                        </div>
                                                        <!--while-->
                                                        <?php
                                                        if ($miercolesOvalleAseo != null) {
                                                            while ($recorrido = array_shift($miercolesOvalleAseo)) {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino a <?= $recorrido->getTrayectoFinal(); ?></span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-text-44" role="tabpanel" aria-labelledby="tabs-text-44-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        Rio Hurtado - Ovalle
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-warning bg-riohurtado" role="alert">
                                                            <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidad</span>
                                                        </div>
                                                        <!--while-->
                                                        <?php
                                                        if ($juevesAseo != null) {
                                                            while ($recorrido = array_shift($juevesAseo)) {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Origen en <?= $recorrido->getTrayectoInicio(); ?></span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        Ovalle - Rio Hurtado
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-warning bg-riohurtado" role="alert">
                                                            <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidad</span>
                                                        </div>
                                                        <!--while-->
                                                        <?php
                                                        if ($juevesOvalleAseo != null) {
                                                            while ($recorrido = array_shift($juevesOvalleAseo)) {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino a <?= $recorrido->getTrayectoFinal(); ?></span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-text-55" role="tabpanel" aria-labelledby="tabs-text-55-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        Rio Hurtado - Ovalle
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-warning bg-riohurtado" role="alert">
                                                            <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidado</span>
                                                        </div>
                                                        <!--while-->
                                                        <?php
                                                        if ($viernesAseo != null) {
                                                            while ($recorrido = array_shift($viernesAseo)) {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Origen en <?= $recorrido->getTrayectoInicio(); ?></span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        Ovalle - Rio Hurtado
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-warning bg-riohurtado" role="alert">
                                                            <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidad</span>
                                                        </div>
                                                        <!--while-->
                                                        <?php
                                                        if ($viernesOvalleAseo != null) {
                                                            while ($recorrido = array_shift($viernesOvalleAseo)) {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino a <?= $recorrido->getTrayectoFinal(); ?></span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-text-66" role="tabpanel" aria-labelledby="tabs-text-66-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        Rio Hurtado - Ovalle
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-warning bg-riohurtado" role="alert">
                                                            <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidad</span>
                                                        </div>
                                                        <!--while-->
                                                        <?php
                                                        if ($sabadoAseo != null) {
                                                            while ($recorrido = array_shift($sabadoAseo)) {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Origen en <?= $recorrido->getTrayectoInicio(); ?></span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        Ovalle - Rio Hurtado
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-warning bg-riohurtado" role="alert">
                                                            <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidad</span>
                                                        </div>
                                                        <!--while-->
                                                        <?php
                                                        if ($sabadoOvalleAseo != null) {
                                                            while ($recorrido = array_shift($sabadoOvalleAseo)) {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino a <?= $recorrido->getTrayectoFinal(); ?></span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-text-77" role="tabpanel" aria-labelledby="tabs-text-77-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        Rio Hurtado - Ovalle
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-warning bg-riohurtado" role="alert">
                                                            <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidad</span>
                                                        </div>
                                                        <!--while-->
                                                        <?php
                                                        if ($domigoAseo != null) {
                                                            while ($recorrido = array_shift($domigoAseo)) {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Origen en <?= $recorrido->getTrayectoInicio(); ?></span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        Ovalle - Rio Hurtado
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-warning bg-riohurtado" role="alert">
                                                            <span class="alert-inner--text"><strong>Salida</strong> Puede variar según la localidad</span>
                                                        </div>
                                                        <!--while-->
                                                        <?php
                                                        if ($domigoOvalleAseo != null) {
                                                            while ($recorrido = array_shift($domigoOvalleAseo)) {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--text"><strong><?= $recorrido->getHoraSalida(); ?></strong> Destino a <?= $recorrido->getTrayectoFinal(); ?></span>
                                                                </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>