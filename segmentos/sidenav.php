
<?php $nombreSofware = "" ?>

<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main"   >
    <div class="container-fluid"  >
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand" href="index" title="Sistema CYANOLISEUS (Transporte)" >
            <img src="../../assets-admin/img/theme/logo-riohurtado-mobil.png" height="400" class="navbar-brand-img" alt="...">
            <?= $nombreSofware ?>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none" >
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="../../assets-admin/img/theme/usuario.png">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Bienvenido!</h6>
                    </div>
                    <a href="perfil" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>Support</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="index">
                            <!--<img src="./assets/img/brand/blue.png">-->
                            <?= $nombreSofware ?>
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <h4 class="ml-4">Análisis de datos</h4>
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($paginaActiva == "index") {
                        echo "active";
                    }
                    ?>" href="index">
                        <i class="ni ni-tv-2 fas fa-tachometer-alt text-primary"></i> Dashboard
                    </a>
                </li>
                <h4 class="ml-4">Noticias turísticas</h4>
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($paginaActiva == "noticias") {
                        echo "active";
                    }
                    ?> " href="noticias">
                        <i class="ni ni-tv-2 fas fa-newspaper text-success"></i> Noticias
                    </a>
                </li>
                <h4 class="ml-4">Servicios</h4>
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($paginaActiva == "transporte") {
                        echo "active";
                    }
                    ?> " href="transporte">
                        <i class="ni ni-planet fa fa-bus text-blue"></i> Transporte 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($paginaActiva == "CajaVecina") {
                        echo "active";
                    }
                    ?> " href="CajaVecina">
                        <i class="ni ni-credit-card text-warning"></i> Caja Vecina
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($paginaActiva == "emergencia") {
                        echo "active";
                    }
                    ?>" href="emergencia">
                        <i class="ni ni-ambulance fas fa-ambulance text-danger"></i> Servicios de emergengia
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($paginaActiva == "restaurante") {
                        echo "active";
                    }
                    ?>" href="restaurante">
                        <i class="ni ni-planet fa fa-utensils text-success"></i> Restaurantes
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($paginaActiva == "acampar") {
                        echo "active";
                    }
                    ?>" href="acampar">
                        <i class="ni ni-planet fa fa-tree text-warning"></i> Sitios para Acampar
                    </a>
                </li>
                
                
                
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($paginaActiva == "alojamiento") {
                        echo "active";
                    }
                    ?>" href="alojamiento">
                        <i class="ni ni-planet fa fa-bed text-info"></i> Alojamientos
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($paginaActiva == "actividad") {
                        echo "active";
                    }
                    ?>" href="actividad">
                        <i class="ni ni-user-run text-danger"></i> Actividades
                    </a>
                </li>
               
                
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($paginaActiva == "atractivo") {
                        echo "active";
                    }
                    ?>" href="atractivo">
                        <i class="ni ni-image text-success"></i>  Atractivos Turísticos
                    </a>
                </li>
                
                <h4 class="ml-4">Redes Sociales</h4>
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($paginaActiva == "facebook") {
                        echo "active";
                    }
                    ?>" href="facebook">
                        <i class="ni ni-key-25 fab fa-facebook text-info"></i> Facebook
                    </a>
                </li>
                <h4 class="ml-4">Usuarios</h4>
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($paginaActiva == "perfil") {
                        echo "active";
                    }
                    ?>" href="perfil">
                        <i class="ni fas fa-user text-success"></i> Mi perfil
                    </a>
                </li>
                <?php if($usuario->getTipo() == "Admin"){ ?>
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($paginaActiva == "administracion") {
                        echo "active";
                    }
                    ?>" href="administracion">
                        <i class="ni ni-key-25 fas fa-users text-warning"></i> Administrar usuarios
                    </a>
                </li>
                <?php } ?>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted text-center">Documentación</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="#" target="_black"  > 
                        <i class="ni ni-spaceship fas fa-question"></i> Instrucciones
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"  target="_black"  >
                        <i class="ni ni-palette fas fa-cart-arrow-down"></i> Licencia
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" target="_black"  >
                        <i class="ni ni-ui-04 fab fa-creative-commons-remix"></i> Components
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>