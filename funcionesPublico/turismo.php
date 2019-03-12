<?php
include_once '../models/Connection.php';
include_once '../controllers/TurismoService.php';
include_once '../models/Turismo.php';


$service = new TurismoService();


$arrayTurismo = $service->read_turismos_by_tipo($_GET['tipo']);

$arrayTurismoMapa = $service->read_turismos_by_tipo($_GET['tipo']);

switch ($_GET['tipo']) {
    case 'Restaurante' :
        $titulo = 'Restaurantes';
        $mensaje = "Comidas típicas, menú a la carta, atención a delegaciones, salón de eventos y más.";
        break;
    case 'Acampar':
        $titulo = "Sitios para Acampar";
        $mensaje = "Camping y agrocamping para acampar equipados de luz, agua potable, asaderas, baños, duchas, mesones, senderos y más.";
        break;
    case 'Alojamiento':
        $titulo = "Alojamientos";
        $mensaje = "Cabañas y habitaciones con estilo señorial equipados con quincho, piscina, servicios de alimentación y más.";
        break;
    case 'Festival':
        $titulo = "Festivales";
        $mensaje = "Diversas actividades que se llevan a cabo en diferentes localidades de la comuna. ";
        break;
    case 'Artesanal':
        $titulo = "Productos Artesanales";
        $mensaje = "Agrupaciones y Talleres dedicados en la elaboración de artesanías en arcilla, piedra y tejidos.";
        break;
    case 'Otro':
        $titulo = "Ferias, Rodeos y más";
        $mensaje = "Actividades culturales y fiestas religiosas, venta de productos típicos, gastronomía criolla, folclore y juegos populares.";
        break;
    case 'Monumento Natural':
        $titulo = "Monumentos Naturales";
        $mensaje = "Espacios protegidos por el Sistema de Protección Nacional de Áreas Silvestres del Estado en donde se conservan vestigios de vegetación y fauna.";
        break;
    case 'Ruta':
        $titulo = "Rutas";
        $mensaje = "";
        break;
    default :
        $titulo = "";
        $mensaje = "";
        break;
}
?>

<a name="turismo" id="lancha"></a> 



<section class="section">
    <div class="container">
        <div class="row row-grid align-items-center">
            <h1 class="text-center">
                <?= $titulo ?>
                <br/> <small class="text-muted"><?= $mensaje ?></small>
            </h1>
        </div>
    </div>
</section>


<?php
if (isset($arrayTurismo)) {
    while ($turismo = array_shift($arrayTurismo)) {
        $id = $turismo->getIdTurismo();
        if ($id % 2 == 0) {
            ?>

            <section class="section bg-secondary">
                <div class="container">
                    <div class="row row-grid align-items-center">
                        <div class="col-md-6">
                            <div class="card bg-riohurtado-2 shadow border-0">
                                <div id='<?= $id ?>' style="height: 300px;" class="card-img-top"></div>
                                <blockquote class="card-blockquote">
                                    <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="svg-bg">
                                        <polygon points="0,52 583,95 0,95" class="fill-default" />
                                        <polygon points="0,42 583,95 683,0 0,95" opacity=".2" class="fill-default" />
                                    </svg>
                                    <h4 class="display-3 font-weight-bold text-white"><?= $turismo->getNombre(); ?></h4>
                                    <p class="lead text-italic text-white"><?= $turismo->getDescripcion() ?></p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pl-md-5">
                                <div class="rounded shadow-lg overflow-hidden transform-perspective-left">
                                    <div id="carousel_<?= $id ?>" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <?php if ($turismo->getFoto1() != "") { ?>
                                                <li data-target="#carousel_<?= $id ?>" data-slide-to="0" class="<?php
                                                if ($turismo->getFoto1() != "") {
                                                    echo 'active';
                                                }
                                                ?>" ></li>
                                                <?php } ?>
                                                <?php if ($turismo->getFoto2() != "") { ?>
                                                <li data-target="#carousel_<?= $id ?>" data-slide-to="1" class="<?php
                                                if ($turismo->getFoto1() == "") {
                                                    echo 'active';
                                                }
                                                ?>" ></li>
                                                <?php } ?>
                                                <?php if ($turismo->getFoto3() != "") { ?>
                                                <li data-target="#carousel_<?= $id ?>" data-slide-to="2" class="<?php
                                                if ($turismo->getFoto2() == "") {
                                                    echo 'active';
                                                }
                                                ?>" ></li>
                                                <?php } ?>

                                        </ol>
                                        <div class="carousel-inner">
                                            <?php if ($turismo->getFoto1() != "") { ?>
                                                <div class="carousel-item <?php
                                                if ($turismo->getFoto1() != "") {
                                                    echo 'active';
                                                }
                                                ?>">
                                                    <img class="img-fluid" src="../funciones/imgTurismo/<?= $turismo->getFoto1(); ?>" alt="First slide">
                                                </div>
                                            <?php } else  ?>
                                            <?php if ($turismo->getFoto2() != "") { ?>
                                                <div class="carousel-item <?php
                                                if ($turismo->getFoto1() == "") {
                                                    echo 'active';
                                                }
                                                ?>">
                                                    <img class="img-fluid" src="../funciones/imgTurismo/<?= $turismo->getFoto2(); ?>" alt="Second slide">
                                                </div>
                                            <?php } else  ?>
                                            <?php if ($turismo->getFoto3() != "") { ?>
                                                <div class="carousel-item <?php
                                                if ($turismo->getFoto2() == "") {
                                                    echo 'active';
                                                }
                                                ?> ">
                                                    <img class="img-fluid" src="../funciones/imgTurismo/<?= $turismo->getFoto3(); ?>" alt="Second slide">
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel_<?= $id ?>" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel_<?= $id ?>" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div style="height: 50px;" ></div>

                                <?php if ($turismo->getContacto() != "") { ?>
                                    <a  class="btn btn-sm btn-info mr-4 text-white">Contacto <?= $turismo->getContacto() ?></a>
                                    <br/><br/>
                                <?php } ?>
                                <?php if ($turismo->getFono() != "") { ?>
                                    <a  class="btn btn-sm btn-danger mr-4 text-white">Fono <?= $turismo->getFono() ?></a>
                                    <br/><br/>
                                <?php } ?>
                                <?php if ($turismo->getLocalidad() != "") { ?>
                                    <a  class="btn btn-sm btn-success mr-4 text-white">Localidad <?= $turismo->getLocalidad(); ?></a>
                                <?php } ?>
                                <br/><br/>

                                <div style="height: 30px;" ></div>

                                <?php if ($turismo->getFacebook() != "") { ?>
                                    <a   class="btn btn-icon btn-2 btn-primary text-white" >
                                        <span class="btn-inner--icon"><i class="ni ni-atom fa fa-facebook"></i></span> <?= $turismo->getFacebook(); ?>
                                    </a>
                                <?php } ?>
                                <?php if ($turismo->getTwiter() != "") { ?>
                                    <a  class="btn btn-icon btn-2 btn-info text-white" >
                                        <span class="btn-inner--icon"><i class="ni ni-atom fa fa-twitter"></i></span> @<?= $turismo->getTwiter(); ?>
                                    </a>
                                <?php } ?>
                                <?php if ($turismo->getInstagram() != "") { ?>
                                    <a   class="btn btn-icon btn-2 btn-danger text-white" >
                                        <span class="btn-inner--icon"><i class="ni ni-atom fa fa-instagram"></i> <?= $turismo->getInstagram(); ?></span>
                                    </a>
                                <?php } ?>

                                <?php if ($turismo->getPagina() != "") { ?>
                                    <br/><br/>
                                    <a  class="btn btn-icon btn-2 btn-primary text-white" >
                                        <span class="btn-inner--icon"></span><?= $turismo->getPagina() ?>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php } else { ?>
            <section class="section bg-secondary">
                <div class="container">
                    <div class="row row-grid align-items-center">
                        <div class="col-md-6">
                            <div class="pl-md-5">
                                <div class="rounded shadow-lg overflow-hidden transform-perspective-right">
                                    <div id="carousel_<?= $id ?>" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <?php if ($turismo->getFoto1() != "") { ?>
                                                <li data-target="#carousel_<?= $id ?>" data-slide-to="0" class="<?php
                                                if ($turismo->getFoto1() != "") {
                                                    echo 'active';
                                                }
                                                ?>" ></li>
                                                <?php } ?>
                                                <?php if ($turismo->getFoto2() != "") { ?>
                                                <li data-target="#carousel_<?= $id ?>" data-slide-to="1" class="<?php
                                                if ($turismo->getFoto1() == "") {
                                                    echo 'active';
                                                }
                                                ?>" ></li>
                                                <?php } ?>
                                                <?php if ($turismo->getFoto3() != "") { ?>
                                                <li data-target="#carousel_<?= $id ?>" data-slide-to="2" class="<?php
                                                if ($turismo->getFoto2() == "") {
                                                    echo 'active';
                                                }
                                                ?>" ></li>
                                                <?php } ?>

                                        </ol>
                                        <div class="carousel-inner">
                                            <?php if ($turismo->getFoto1() != "") { ?>
                                                <div class="carousel-item <?php
                                                if ($turismo->getFoto1() != "") {
                                                    echo 'active';
                                                }
                                                ?>">
                                                    <img class="img-fluid" src="../funciones/imgTurismo/<?= $turismo->getFoto1(); ?>" alt="First slide">
                                                </div>
                                            <?php } else  ?>
                                            <?php if ($turismo->getFoto2() != "") { ?>
                                                <div class="carousel-item <?php
                                                if ($turismo->getFoto1() == "") {
                                                    echo 'active';
                                                }
                                                ?>">
                                                    <img class="img-fluid" src="../funciones/imgTurismo/<?= $turismo->getFoto2(); ?>" alt="Second slide">
                                                </div>
                                            <?php } else  ?>
                                            <?php if ($turismo->getFoto3() != "") { ?>
                                                <div class="carousel-item <?php
                                                if ($turismo->getFoto2() == "") {
                                                    echo 'active';
                                                }
                                                ?> ">
                                                    <img class="img-fluid" src="../funciones/imgTurismo/<?= $turismo->getFoto3(); ?>" alt="Second slide">
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel_<?= $id ?>" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel_<?= $id ?>" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div style="height: 50px;" ></div>

                                <?php if ($turismo->getContacto() != "") { ?>
                                    <a  class="btn btn-sm btn-info mr-4 text-white">Contacto <?= $turismo->getContacto() ?></a>
                                    <br/><br/>
                                <?php } ?>
                                <?php if ($turismo->getFono() != "") { ?>
                                    <a  class="btn btn-sm btn-danger mr-4 text-white">Fono <?= $turismo->getFono() ?></a>
                                    <br/><br/>
                                <?php } ?>
                                <?php if ($turismo->getLocalidad() != "") { ?>
                                    <a  class="btn btn-sm btn-success mr-4 text-white">Localidad <?= $turismo->getLocalidad(); ?></a>
                                <?php } ?>
                                <br/><br/>

                                <div style="height: 30px;" ></div>

                                <?php if ($turismo->getFacebook() != "") { ?>
                                    <a   class="btn btn-icon btn-2 btn-primary text-white" >
                                        <span class="btn-inner--icon"><i class="ni ni-atom fa fa-facebook"></i></span> <?= $turismo->getFacebook(); ?>
                                    </a>
                                <?php } ?>
                                <?php if ($turismo->getTwiter() != "") { ?>
                                    <a  class="btn btn-icon btn-2 btn-info text-white" >
                                        <span class="btn-inner--icon"><i class="ni ni-atom fa fa-twitter"></i></span> @<?= $turismo->getTwiter(); ?>
                                    </a>
                                <?php } ?>
                                <?php if ($turismo->getInstagram() != "") { ?>
                                    <a   class="btn btn-icon btn-2 btn-danger text-white" >
                                        <span class="btn-inner--icon"><i class="ni ni-atom fa fa-instagram"></i> <?= $turismo->getInstagram(); ?></span>
                                    </a>
                                <?php } ?>

                                <?php if ($turismo->getPagina() != "") { ?>
                                    <br/><br/>
                                    <a  class="btn btn-icon btn-2 btn-primary text-white" >
                                        <span class="btn-inner--icon"></span><?= $turismo->getPagina() ?>
                                    </a>
                                <?php } ?>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-riohurtado shadow border-0">
                                <div id='<?= $id ?>' style="height: 300px;" class="card-img-top"></div>
                                <blockquote class="card-blockquote">
                                    <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="svg-bg">
                                        <polygon points="0,52 583,95 0,95" class="fill-default" />
                                        <polygon points="0,42 583,95 683,0 0,95" opacity=".2" class="fill-default" />
                                    </svg>
                                    <h4 class="display-3 font-weight-bold text-white"><?= $turismo->getNombre(); ?></h4>
                                    <p class="lead text-italic text-white"><?= $turismo->getDescripcion() ?></p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php
        }
    }
}
?>