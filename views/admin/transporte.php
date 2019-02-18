
<?php
//session - config


$paginaActiva = "transporte";


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
        <link href="../../assets-admin/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="../../assets-admin/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        
        <link href="../../assets-admin/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="../../assets-admin/css/argon.css?v=1.0.0" rel="stylesheet">


        <link href="../../assets-admin/css/bootstrap-material-datetimepicker.css" rel="stylesheet" type="text/css"/>



        <link rel="stylesheet" href="../../css/bootstrap-material-datetimepicker.css" />
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    </head>

    <body>
        <!-- Sidenav -->

        <?php include_once '../../segmentos/sidenav.php'; ?>

        <!-- Main content -->
        <div class="main-content">
            <!-- Top navbar -->
            <?php include_once '../../segmentos/topVar.php'; ?>
            <!-- Header -->
            <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6" >
                <div class="container-fluid">
                    <div class="header-body">
                        <!-- Card stats -->

                    </div>
                </div>
            </div>
            <!-- Page content -->
            <div class="container-fluid mt--7">


                <?php include_once '../../funciones/transporte.php'; ?>

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


        <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
        <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
        <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>

        <script type="text/javascript" src="../../assets-admin/js/bootstrap-material-datetimepicker.js"></script>
        <script type="text/javascript">
            $(document).ready(function ()
            {


                $('#time').bootstrapMaterialDatePicker
                        ({
                            date: false,
                            shortTime: false,
                            format: 'HH:mm'
                        });


                $.material.init();
            });
        </script>



    </body>

</html>
