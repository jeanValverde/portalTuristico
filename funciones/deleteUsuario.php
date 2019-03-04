<?php

include_once '../models/Connection.php';
include_once '../controllers/UsuarioService.php';
include_once '../models/Usuario.php';


$service = new UsuarioService();

$idUsuario = $_GET['idUsuario'];

$exito = $service->delete_usuario($idUsuario);


if ($exito) {
    header("Location: ../views/admin/administracion");
} else {
    header("Location: ../views/admin/administracion");
}