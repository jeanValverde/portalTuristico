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

        <style type="text/css">
            @import url(http://fonts.googleapis.com/css?family=Open+Sans:300,400);


            .countdown {
                list-style: none;
                margin: 75px 0;
                padding: 0;
                display: block;
                text-align: center;
            }
            .countdown li {
                display: inline-block;
            }
            .countdown li span {
                font-size: 80px;
                font-weight: 300;
                line-height: 80px;
            }
            .countdown li.seperator {
                font-size: 80px;
                line-height: 70px;
                vertical-align: top;
            }


            .countdown li p {
                color: #a7abb1;
                font-size: 14px;
            }

        </style>

        <main>
            <div class="position-relative ">
                <!-- shape Hero -->
                <section class="section section-lg section-shaped pb-250"  >
                    <div class="shape shape-style-1 shape-default" style="background-image: url('assets/img/theme/eclipse.jpg');"  >
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
                            <div style="height: 150px;" ></div>
                            <div class="row">
                                <div class="col-md-5" >
                                    <h1 class="text-center text-white text-uppercase">
                                        Eclipse solar 100%
                                        <br/> <small class="text-white">Día 2 Julio 2019</small>
                                    </h1>
                                </div>
                                <div class="col-lg-7">
                                    <ul class="countdown text-white">
                                        <li> <span class="days">00</span>
                                            <p class="days_ref">Días</p>
                                        </li>
                                        <li class="seperator">.</li>
                                        <li> <span class="hours">00</span>
                                            <p class="hours_ref">Horas</p>
                                        </li>
                                        <li class="seperator">:</li>
                                        <li> <span class="minutes">00</span>
                                            <p class="minutes_ref">Minutos</p>
                                        </li>
                                        <li class="seperator">:</li>
                                        <li> <span class="seconds">00</span>
                                            <p class="seconds_ref">Segundos</p>
                                        </li>
                                    </ul>
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

            <?php include_once '../funcionesPublico/eclipse.php'; ?>





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

                    L.marker([<?= $cajaVecinaMapa->getLatitud(); ?>, <?= $cajaVecinaMapa->getLongitud(); ?>]).addTo(map)
                            .bindPopup('<?= $cajaVecinaMapa->getNombre(); ?> <br/> <a target="_black" href="<?php
        $mapa = $cajaVecinaMapa->getMapa();
        $mapaFormat = str_replace("\'", "&#39;", $mapa);
        echo $mapaFormat
        ?>">Ampiar mapa</a>.')
                            .openPopup();

                </script>

                <?php
            }
        }
        ?>




        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
        <script type="text/javascript" src="assets/CountDownTimer/jquery.downCount.js"></script> 
        <script  type="text/javascript">
                    $('.countdown').downCount({
                        date: '07/02/2019 16:39:00',
                        offset: +10
                    }, function () {
                    });
        </script>


        <script>

            var map = L.map('mapa-1').setView([-30.2894354,-70.7180153,15], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright"></a> '
            }).addTo(map);

            map.scrollWheelZoom.disable();

            L.marker([-30.2894354,-70.7180153,15]).addTo(map)
                    .bindPopup(' <br/> Localidad de Morrillos <br/> <a target="_black" href="https://www.google.cl/maps/place/Morrillos,+R%C3%ADo+Hurtado,+Regi%C3%B3n+de+Coquimbo/@-30.2894354,-70.7180153,15z/data=!3m1!4b1!4m5!3m4!1s0x968fe425b65ba859:0x177270475b29202e!8m2!3d-30.2894539!4d-70.7092604">Ampiar mapa</a>.')
                    .openPopup();


        </script>


    </body>

</html>
