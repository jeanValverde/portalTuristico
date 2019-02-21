<?php

include_once '../models/Connection.php';
include_once '../controllers/NoticiasService.php';
include_once '../models/Noticia.php';




if (!empty($_POST)) {
    
    /*Subir la imagen */
    $servicio = new NoticiasService();
    $uploadfile_temporal = $_FILES['archivo']['tmp_name'];
    $extencion = substr($_FILES['archivo']['type'], 6);
    $ruta = "./imgNoticias/"; //ruta carpeta donde queremos copiar las imágenes 
    $nombreNuevo = $servicio->gen_uuid();
    
    
    $foto = $servicio->upload_imagen($uploadfile_temporal , $extencion , $ruta, $nombreNuevo);
    
    if ($foto != null) {
        
        $encabezado =  $_POST['encabezado'];
        $descripcion = $_POST['descripcion'];
        $link = $_POST['link'];
        
        
        /* determinar si agregar a redes sociales  */
        
        
        
        /*agregar la noticia*/
        
        $limite = $servicio->count_noticias();
        
        if($limite < 3){
            $servicio->create_noticia($encabezado, $descripcion, $link, $foto);  
            
            header("Location: ../views/admin/noticias?noticiasAdd=1");
            
        }else{
            
            header("Location: ../views/admin/noticias?noticiasAdd=2");
            
        }
               
        
    } else {
        
        header("Location: ../views/admin/noticias?noticiasAdd=3");
        /*No agregar la noticia*/
    }
       
}