<?php

include_once '../models/Connection.php';
include_once '../controllers/RecorridoService.php';
include_once '../models/Recorrido.php';


  /* 
    private $trayectoInicio;
    private $trayectoFinal;
    private $horaSalida;
    private $diaRecorrido;
    private $empresa; 
    */

if(isset($_POST["empresa"])){
    
    $resul = new RecorridoService();
    
    $empresa = $_POST["empresa"];
    $trayectoInicio = $_POST["trayectoinicio"];
    $trayectoFinal=$_POST["trayectofinal"];
    $horaSalida = $_POST["horasalida"];
    $diaRecorrido=$_POST["dia"];
    $idRecorrido = $_POST["idRecorrido"];
        
    /*
session_start();
    $empleado = $_SESSION["usuario"];
    $idEmpleado = $empleado->getIdEmpleado();
     *  */
  
    
    $exito = $resul->update_recorrido($idRecorrido , $trayectoInicio, $trayectoFinal, $horaSalida, $diaRecorrido, $empresa);

    if($exito == true){//metodo agregar 
        header("Location: ../views/admin/transporte?recorridoAdd=1");
    }else{
        header("Location: ../views/admin/transporte?recorridoAdd=2");
    }
    
}