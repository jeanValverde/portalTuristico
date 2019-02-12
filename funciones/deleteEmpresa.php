<?php

include_once '../models/Connection.php';
include_once '../controllers/EmpresaService.php';
include_once '../models/Empresa.php';


$idEmpresa = $_GET["idEmpresa"];


$resul = new EmpresaService();


if ($resul->delete_empresa($idEmpresa)) {//metodo agregar 
    header("Location: ../views/admin/transporte?transporteAdd=1");
} else {
    header("Location: ../views/admin/transporte?transporteAdd=15");
}


