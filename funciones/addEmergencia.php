<?php

include_once '../models/Connection.php';
include_once '../controllers/EmergenciaService.php';
include_once '../models/Emergencia.php';



if(isset($_POST["tipo"])){
    
    $resul = new EmergenciaService();
    
    $tipo = $_POST["tipo"];
    $ubicacion = $_POST["ubicacion"];
    $numero=$_POST["numero"];
    
    
    /*
session_start();
    $empleado = $_SESSION["usuario"];
    $idEmpleado = $empleado->getIdEmpleado();
     *      */
    
    $exito = $resul->create_emergencia($tipo, $ubicacion, $numero );

    if($exito == true){//metodo agregar 
        header("Location: ../views/admin/emergencia?transporteAdd=1");
    }else{
        header("Location: ../views/admin/emergencia?transporteAdd=2");
    }
    
    
}