<?php

include_once '../models/Connection.php';
include_once '../controllers/EmpresaService.php';
include_once '../models/Empresa.php';

 /*
    private $nombre;
    private $cantidadBuses;
    private $contacto;
    private $direccion;
    private $rutaInicio;
    private $rutaFin;
    private $tipo;

     *      */

if(isset($_POST["nombre"])){
    
    $resul = new EmpresaService();
    
    $nombre = $_POST["nombre"];
    $cantidadBuses = $_POST["vehiculos"];
    $contacto=$_POST["contacto"];
    $direccion = $_POST["direccion"];
    $rutaInicio=$_POST["rutainicio"];
    $rutaFin = $_POST["rutafin"];
    $tipo = $_POST["tipo"];
    $idEmpresa = $_POST["idEmpresa"];
    
    
    /*
session_start();
    $empleado = $_SESSION["usuario"];
    $idEmpleado = $empleado->getIdEmpleado();
     *      */
    
    $exito = $resul->update_empresa($idEmpresa , $nombre, $cantidadBuses, $contacto, $direccion, $rutaInicio, $rutaFin, $tipo);

    if($exito == true){//metodo
        header("Location: ../views/admin/transporte?transporteAdd=1");
    }else{
        header("Location: ../views/admin/transporte?transporteAdd=2");
    }
    
    
}