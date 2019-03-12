<?php

include_once '../models/Connection.php';
include_once '../controllers/TurismoService.php';
include_once '../models/Turismo.php';


$idTurismo = $_GET['idTurismo'];

$paginaActiva = $_GET['paginaActiva'];

$service = new TurismoService();

$turismo = $service->read_turismo_by_id($idTurismo);

$direccion1 = './imgTurismo/' . $turismo->getFoto1();
$direccion2 = './imgTurismo/' . $turismo->getFoto2();
$direccion3 = './imgTurismo/' . $turismo->getFoto3();

$service->delete_foto($direccion1);
$service->delete_foto($direccion2);
$service->delete_foto($direccion3);



$resultado = $service->deleteTurismo_by_id($idTurismo);


if ($resultado) {
    header("Location: ../views/admin/" . $paginaActiva);
} else {
    header("Location: ../views/admin/" . $paginaActiva);
}
 
 /**

  * 
  * 
if ($turismo->getFoto1() != "") {
    $direccion1 = './imgTurismo/' . $turismo->getFoto1();
    $service->delete_foto($direccion1);
} else if ($turismo->getFoto2() != "") {
    $direccion2 = './imgTurismo/' . $turismo->getFoto2();
    $service->delete_foto($turismo->getFoto2());
} else if ($turismo->getFoto3() != "") {
    $direccion3 = './imgTurismo/' . $turismo->getFoto3();
    $service->delete_foto($direccion3);
}

  * 
  *   /
  */