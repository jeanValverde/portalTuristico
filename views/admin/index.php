
<?php

//session - config
include_once '../../segmentos/session.php';


$paginaActiva = "index";


?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
        <meta name="author" content="Creative Tim">
        <title><?= $paginaActiva ?></title>
        <!-- Favicon -->
        <link href="../../assets-admin/img/theme/logo-riohurtado-mobil.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="../../assets-admin/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="../../assets-admin/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="../../assets-admin/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>

    <body>
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <!-- Sidenav -->
        
            <?php include_once '../../segmentos/sidenav.php'; ?>
        
        <!-- Main content -->
        <div class="main-content">
            <!-- Top navbar -->

            <!-- Top navbar -->
            <?php include_once '../../segmentos/topVar.php'; ?>


            <!-- widget -->
            <?php include_once '../../funciones/widget-admin.php'; ?>
            
            
            <!-- Page content -->
            <div class="container-fluid mt--7">
              
                
                <!-- graficos -->
                <?php //include_once '../../funciones/graficos-admin.php'; ?>


                <div class="row mt-5" >
                    <div class="col-md-12 col-xl-12">
                        <div class="card shadow">
                            <div class="card-header bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="text-uppercase text-muted ls-1 mb-1">Comentarios Facebook</h6>
                                        <h2 class="mb-0">Responde los comentarios en Facebook</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Chart -->
                                <div class="chartj">
                                    <!--facebook -->
                                    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#recorrido" data-width="100%" data-numposts="10"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                 <!-- Footer -->
                <?php include_once '../../segmentos/footer.php'; ?>
            </div>
        </div>
        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="../../assets-admin/vendor/jquery/dist/jquery.min.js"></script>
        <script src="../../assets-admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Optional JS -->
        <script src="../../assets-admin/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="../../assets-admin/vendor/chart.js/dist/Chart.extension.js"></script>
        <!-- Argon JS -->
        <script src="../../assets-admin/js/argon.js?v=1.0.0"></script>
    </body>

</html>
