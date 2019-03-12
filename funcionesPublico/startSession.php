<?php

include_once '../models/Connection.php';
include_once '../controllers/UsuarioService.php';
include_once '../models/Usuario.php';

$service = new UsuarioService();



if (!empty($_POST)) {

    $rut = $_POST['rut'];
    $password = $_POST['password'];

    $user = $service->start_session($rut, $password);

    if ($user == 1) {

        //iniciar sesion 
        $usuario = $service->start_session_usuario($rut, $password);

        //estado 1 activo 0 inactivo 
        if ($usuario->getEstado() == 1) {

            session_start();
            $_SESSION["usuario"] = $usuario;
            
            header("Location: ../views/admin/index");

        } else {
            header("Location: ../views/login?errorV=2");
        }
    } else {
        header("Location: ../views/login?error=2");
    }
}