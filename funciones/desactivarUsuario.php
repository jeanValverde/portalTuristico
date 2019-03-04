<?php

include_once '../models/Connection.php';
include_once '../controllers/UsuarioService.php';
include_once '../models/Usuario.php';


$estadoActual = $_GET['estado'];

$idUsuario = $_GET['idUsuario'];

$service = new UsuarioService();

$exito = false;

if($estadoActual == 1){
    $exito =  $service->disabled_usuario(0, $idUsuario);
}else{
    $exito =  $service->disabled_usuario(1, $idUsuario);
}

if ($exito) {
    header("Location: ../views/admin/administracion");
} else {
    header("Location: ../views/admin/administracion");
}



