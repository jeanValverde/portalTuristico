<?php

include_once '../models/Connection.php';
include_once '../controllers/EmergenciaService.php';
include_once '../models/Emergencia.php';


$idEmergencia = $_GET["idEmergencia"];


$resul = new EmergenciaService();

$resultado = $resul->delete_emergencia($idEmergencia);



if ($resultado) {//metodo agregar 
    header("Location: ../views/admin/emergencia?transporteAdd=1");
} else {
    header("Location: ../views/admin/emergencia?transporteAdd=15");
}
