<?php

include_once '../models/Connection.php';
include_once '../controllers/UsuarioService.php';
include_once '../models/Usuario.php';



if (!empty($_POST)) {
    
    
        /*

      private $idUsuario;
      private $rut;
      private $nombre;
      private $apellido;
      private $contrasenia;
      private $tipo;
      private $area;
      private $estado;
      private $contraseniaRecuperar;
      private $correo;
      private $cargo;
*/
    
   
    $servicio = new UsuarioService();
    
    
    $nombre = $_POST["nombre"];
    $apellido=$_POST["apellido"];
    $tipo=$_POST["tipo"];
    $area = $_POST["area"];
    $correo = $_POST["correo"];
    $cargo=$_POST["cargo"];
    $idUsuario = $_POST['idUsuario'];
        
    
  
    //verificar si usuario existe 
    
    $exito = $servicio->update_usuario($idUsuario , $nombre, $apellido,  $tipo, $area, $correo, $cargo);

    
    if($exito == true){//metodo agregar 
        header("Location: ../views/admin/administracion?administracionAdd=1");
    }else{
        header("Location: ../views/admin/administracion?administracionAdd=2");
    }
    
    
    
}