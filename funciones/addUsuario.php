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
    
    $rut = $_POST["rut"];
    $nombre = $_POST["nombre"];
    $apellido=$_POST["apellido"];
    $tipo=$_POST["tipo"];
    $area = $_POST["area"];
    $correo = $_POST["correo"];
    $cargo=$_POST["cargo"];
        
    
    
    $contrasena = $servicio->get_password();
     
    
    //1 activo - 0 inactivo
    $estado = 1;
    $contraseniaRecuperar=$servicio->gen_uuid();
    
    
    /*
session_start();
    $empleado = $_SESSION["usuario"];
    $idEmpleado = $empleado->getIdEmpleado();
     *  */
  
    //verificar si usuario existe 
    
    $exito = $servicio->create_usuario($rut, $nombre, $apellido, $contrasena , $tipo, $area, $estado, $contraseniaRecuperar, $correo, $cargo);

    if($exito == true){//metodo agregar 
        
        //enviar correo electronico 
        
    
    $asunto = "Configura tu cuenta de la WEB recorridos Río Hurtado $nombre $apellido";
    $mensaje = "
        <!DOCTYPE html>
        <html lang='en'>
        <head><meta http-equiv=´´Content-Type' content='text/html; charset=gb18030'>
            
            <title>WEB Recorridos</title>
        </head>
        <body>
        
     
      <div style='height: 20px;' ></div>
                	
        <a style='  text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
    ' href='https://transporte.riohurtado.cl/views/forgot?encode?=$contraseniaRecuperar'>
    
    <img src='https://transporte.riohurtado.cl/mail.jpg' style='width: 50%;' />
    
    
    </a>
            
        
         <div style='height: 50px;' ></div>
        
        </body>
        

    
        </html>" ;
        
        
    $cabeceras = "From: recorridosriohurtado@gmail.com" . "\r\n" .
        "Reply-To: $correo" . "\r\n" .
        "X-Mailer: PHP/" . phpversion() . "\r\n" .
        "Content-Type: text/html; charset=ISO-8859-1\r\n";

    mail($correo, $asunto, $mensaje, $cabeceras);
        
        
        header("Location: ../views/admin/administracion?administracionAdd=1");
    }else{
        header("Location: ../views/admin/administracion?administracionAdd=2");
    }
    
    
}