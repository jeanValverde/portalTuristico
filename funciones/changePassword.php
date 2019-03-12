<?php

include_once '../models/Connection.php';
include_once '../controllers/UsuarioService.php';
include_once '../models/Usuario.php';

$service = new UsuarioService();


if (!empty($_POST)) {

    $rut = $_POST['rut'];

    $passwordAnterior = $_POST['passwordAnterior'];

    $password = $_POST['password'];
    
    $resultado = $service->change_password_session($passwordAnterior , $password, $rut);
     
     
    if($resultado){
        header("Location: ../views/admin/perfil");
    }else{
        header("Location: ../views/admin/perfil");
    }
    
    
    
}