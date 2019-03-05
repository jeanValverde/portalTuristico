<?php

if (!empty($_GET)) {

    $rut = $_GET['rut'];

    include_once '../models/Connection.php';
    include_once '../controllers/UsuarioService.php';
    include_once '../models/Usuario.php';

    $service = new UsuarioService();

    $usuario = $service->read_usuario_by_rut($rut);


    if ($usuario->getRut() != "") {

        //enviar correo 

        $encode = $usuario->getContraseniaRecuperar();

        $nombreCompleto = $usuario->getNombre() . " " . $usuario->getApellido();

        $correo = $usuario->getCorreo();

        $asunto = "Restablecer contraseña de tu cuenta WEB Portal Turístico de Río Hurtado $nombreCompleto";
        $mensaje = "
        <!DOCTYPE html>
        <html lang='en'>
        <head><meta http-equiv=´´Content-Type' content='text/html; charset=gb18030'>
            
            <title>WEB</title>
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
    ' href='https://transporte.riohurtado.cl/views/forgot?encode?=$encode'>
    
    <img src='http://transporte.riohurtado.cl/restablecer.jpg' style='width: 50%;' />
    
    
    </a>
            
        
         <div style='height: 50px;' ></div>
        
        </body>
        

    
        </html>";


        $cabeceras = "From: recorridosriohurtado@gmail.com" . "\r\n" .
                "Reply-To: $correo" . "\r\n" .
                "X-Mailer: PHP/" . phpversion() . "\r\n" .
                "Content-Type: text/html; charset=ISO-8859-1\r\n";

        mail($correo, $asunto, $mensaje, $cabeceras);
        
        header("Location: ../views/admin/administracion?mensaje=Hemos enviado un correo electrónico al dueño de la cuenta para restablecer la contraseña");
    }
}