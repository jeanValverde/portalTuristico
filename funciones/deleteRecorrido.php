<?php


include_once '../models/Connection.php';
include_once '../controllers/RecorridoService.php';
include_once '../models/Recorrido.php';


$idRecorrido = $_GET["idRecorrido"];


$resul = new RecorridoService();


if ($resul->delete_recorrido($idRecorrido)) {//
    header("Location: ../views/admin/transporte?recorridoAdd=1");
} else {
    header("Location: ../views/admin/transporte?recorridoAdd=2");
}



