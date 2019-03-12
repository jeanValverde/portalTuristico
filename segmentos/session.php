<?php

include_once '../../models/Usuario.php';

session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: ../login");
}else{
   // $usuario = new Usuario();
    $usuario = $_SESSION['usuario'];
}