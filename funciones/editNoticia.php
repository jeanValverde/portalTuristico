<?php

include_once '../models/Connection.php';
include_once '../controllers/NoticiasService.php';
include_once '../models/Noticia.php';




if (!empty($_POST)) {


    /* Subir la imagen */
    $servicio = new NoticiasService();
    $uploadfile_temporal = $_FILES['archivo']['tmp_name'];
    $extencion = substr($_FILES['archivo']['type'], 6);
    $ruta = "./imgNoticias/"; //ruta carpeta donde queremos copiar las imágenes 
    $nombreNuevo = $servicio->gen_uuid();

    //actualizar foto 
    $idNoticia = $_POST['idNoticia'];
    $encabezado = $_POST['encabezado'];
    $descripcion = $_POST['descripcion'];
    $link = $_POST['link'];

    $noticia = $servicio->read_noticia_by_id($idNoticia);

    $resultado = false;

    if (!empty($uploadfile_temporal)) {

        //agregrar foto

        $foto = $servicio->upload_imagen($uploadfile_temporal, $extencion, $ruta, $nombreNuevo);

        $resultado = $servicio->update_noticia_with_foto($idNoticia, $encabezado, $descripcion, $link, $foto);
        
        $rutaFoto = './imgNoticias/' . $noticia->getFoto();
        $servicio->delete_foto($rutaFoto);
        
    } else {
        $resultado = $servicio->update_noticia($idNoticia, $encabezado, $descripcion, $link);
    }



    if ($resultado) {
          
        header("Location: ../views/admin/noticias?viewsEdit=" . $noticia->getIdNoticia());
    } else {
        header("Location: ../views/admin/noticias?viewsEdit=" . $noticia->getIdNoticia());
    }
}