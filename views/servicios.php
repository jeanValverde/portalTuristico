<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
        <meta name="author" content="Jean González">
        <title>Municipalidad de Rio Hurtado | Región de Coquimbo - Chile</title>
        <meta name="description" content="El valle de Río Hurtado es uno de los lugares por descubrir en el corazón de la Región de Coquimbo. Infórmate del transporte público Rio Hurtado y más."/>
        <link rel="canonical" href="http://riohurtado.cl/" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Municipalidad de Rio Hurtado | Región de Coquimbo - Chile" />
        <meta property="og:description" content="El valle de Río Hurtado es uno de los lugares por descubrir en el corazón de la Región de Coquimbo. Infórmate del transporte público de Rio Hurtado y más." />


        <?php include_once '../segmentos/headPublico.php'; ?>


    </head>

    <body>


        <?php include_once '../segmentos/headerPublico.php'; ?>

        <main>
            <div class="position-relative ">
                <!-- shape Hero -->
                <section class="section section-lg section-shaped pb-250"  >
                    <div class="shape shape-style-1 shape-default" style="background-image: url('assets/img/theme/riohurtado.jpg');"  >
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="container py-lg-md d-flex">
                        <div class="col px-0">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card text-justify " >
                                        <div class="card-body text-justify">
                                            <h5 class="card-title text-justify">Transporte público</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">Recorrido de buses Iterurbano Rio Hurtado</h6>
                                            <p class="card-text">Salida desde Terminal Buses Rurales Feria Modelo.</p>
                                            <div class="btn-wrapper">
                                                <a href="#transporte" class="btn bg-riohurtado mb-3 mb-sm-0">
                                                    <span class="text-white">Ver más</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 mb-lg-auto">
                                    <div class="rounded shadow-lg overflow-hidden transform-perspective-right">
                                        <div id="carousel_example" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carousel_example" data-slide-to="0" class="active"></li>
                                                <li data-target="#carousel_example" data-slide-to="1"></li>
                                                <li data-target="#carousel_example" data-slide-to="1"></li>
                                                <li data-target="#carousel_example" data-slide-to="1"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img class="img-fluid" src="./assets/img/theme/carrusel1.jpg" alt="First slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="img-fluid" src="./assets/img/theme/carrusel2.jpg" alt="Second slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="img-fluid" src="./assets/img/theme/carrusel3.jpg" alt="Second slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="img-fluid" src="./assets/img/theme/carrusel4.jpg" alt="Second slide">
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carousel_example" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carousel_example" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SVG separator -->
                    <div class="separator separator-bottom separator-skew">
                        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <polygon class="fill-white"  points="2560 0 2560 100 0 100"></polygon>
                        </svg>
                    </div>
                </section>
                <!-- 1st Hero Variation -->
            </div>


            <!--contenido-->

            <?php include_once '../funcionesPublico/servicios.php'; ?>





            <?php include_once '../segmentos/footerPublico.php'; ?>


        </main>

        <!--footer-->

        <?php include_once '../segmentos/footerPublico.php'; ?>


        <!--core js-->


        <?php include_once '../segmentos/footerJs.php'; ?>


        <style>
            #map {
                widh: 50px;
                height: 600px; }
        </style>


       
        <?php
        if (isset($arrayCajasVecinasMapa)) {
            while ($cajaVecinaMapa = array_shift($arrayCajasVecinasMapa)) {
                ?>

                <script>

                    var map = L.map('<?= $cajaVecinaMapa->getIdTurismo(); ?>').setView([<?= $cajaVecinaMapa->getLatitud(); ?>, <?= $cajaVecinaMapa->getLongitud(); ?>], 13);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright"></a> '
                    }).addTo(map);

                    map.scrollWheelZoom.disable();

                    L.marker([<?= $cajaVecinaMapa->getLatitud(); ?> , <?= $cajaVecinaMapa->getLongitud(); ?>]).addTo(map)
                            .bindPopup('<?= $cajaVecinaMapa->getNombre(); ?> <br/> <a target="_black" href="<?php $mapa = $cajaVecinaMapa->getMapa(); $mapaFormat = str_replace("\'", "&#39;", $mapa ); echo $mapaFormat ?>">Ampiar mapa</a>.')
                            .openPopup();

                </script>

            <?php }
        }
        ?>

               

           


    </body>

</html>
