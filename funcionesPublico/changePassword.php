<?php

include_once '../models/Connection.php';
include_once '../controllers/UsuarioService.php';
include_once '../models/Usuario.php';

$service = new UsuarioService();

if (!empty($_POST)) {
    
    $password = $_POST['password'];
    $rut = $_POST['rut'];
    
    $cambio = $service->change_password($password, $rut);
    
    if($cambio){
        header("Location: ../views/login");
    }else{
        header("Location: ../views/forgot?mensaje=error");
    }
    
    
    
}
