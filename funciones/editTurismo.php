<?php

include_once '../models/Connection.php';
include_once '../controllers/TurismoService.php';
include_once '../models/Turismo.php';




if (!empty($_POST)) {


    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $localidad = $_POST['localidad'];
    $mapa = $_POST['mapa'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $idTurismo = $_POST['idTurismo'];

    $service = new TurismoService();

    $turismo = new Turismo();

    $turismo->setIdTurismo($idTurismo);

    if ($tipo == "cajaVecina") {


        $turismo->setTipo($tipo);
        $turismo->setNombre($nombre);
        $turismo->setLocalidad($localidad);
        $turismo->setMapa($mapa);
        $turismo->setLatitud($latitud);
        $turismo->setLongitud($longitud);
    } else {
        
        
        
    }

    $resultado = $service->update_turismo($turismo);



    if ($resultado) {
        header("Location: ../views/admin/cajaVecina");
    } else {
        header("Location: ../views/admin/cajaVecina");
    }
}


