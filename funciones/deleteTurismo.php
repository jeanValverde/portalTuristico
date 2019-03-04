<?php


include_once '../models/Connection.php';
include_once '../controllers/TurismoService.php';
include_once '../models/Turismo.php';


 $idTurismo =  $_GET['idTurismo'];
 
 $tipo = $_GET['tipo'];
 
 $service = new TurismoService();
 
 $resultado = $service->deleteTurismo_by_id($idTurismo);
 
 
 if($resultado){
     header("Location: ../views/admin/" . $tipo );
 }else{
     header("Location: ../views/admin/" . $tipo);
 }
 
 