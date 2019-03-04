<?php

include_once '../models/Connection.php';
include_once '../controllers/TurismoService.php';
include_once '../models/Turismo.php';




if (!empty($_POST)) {


    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $localidad = $_POST['localidad'];
    $mapa = $_POST['mapa'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];


    $service = new TurismoService();
    $resultado = false;

    if ($tipo == "cajaVecina") {

        $turismo = new Turismo();

        $turismo->setTipo($tipo);
        $turismo->setNombre($nombre);
        $turismo->setLocalidad($localidad);
        $turismo->setMapa($mapa);
        $turismo->setLatitud($latitud);
        $turismo->setLongitud($longitud);

        $resultado = $service->create_turismo($turismo);
    } else {

        /*
          private $idTurismo;
          private $tipo;
          private $nombre;
          private $descripcion;
          private $latitud;
          private $longitud;
          private $mapa;
          private $contacto;
          private $fono;
          private $localidad;
          private $facebook;
          private $instagram;
          private $twiter;
          private $pagina;
          private $foto1;
          private $foto2;
          private $foto3;

         * 
         *          */
        $descripcion = $_POST['descripcion'];
        $contacto = $_POST['contacto'];
        $fono = $_POST['fono'];
        $facebook = $_POST['facebook'];
        $instragram = $_POST['instagram'];
        $twiter = $_POST['twiter'];
        $pagina = $_POST['pagina'];
        $foto1 = $_POST['foto1'];
        $foto2 = $_POST['foto2'];
        $foto3 = $_POST['foto3'];
        
        
         
        $turismo = new Turismo();

        $turismo->setTipo($tipo);
        $turismo->setNombre($nombre);
        $turismo->setLocalidad($localidad);
        $turismo->setMapa($mapa);
        $turismo->setLatitud($latitud);
        $turismo->setLongitud($longitud);
        $turismo->setDescripcion($descripcion);
        $turismo->setContacto($contacto);
        $turismo->setFono($fono);
        $turismo->setFacebook($facebook);
        $turismo->setInstagram($instagram);
        $turismo->setTwiter($twiter);
        $turismo->setPagina($pagina);
        
        

        $ruta = "./imgTurismo/"; //ruta carpeta donde queremos copiar las imágenes 

        
        
        $uploadfile_temporal1 = $_FILES['foto1']['tmp_name'];
        $extencion1 = substr($_FILES['foto1']['type'], 6);
        $nombreFoto1 = $service->gen_uuid();
        
        if(!empty($uploadfile_temporal1)){
            $img1 = $service->upload_imagen($uploadfile_temporal1, $extencion1, $ruta, $nombreFoto1);
            $turismo->setFoto1($img1);
        }

        $uploadfile_temporal2 = $_FILES['foto2']['tmp_name'];
        $extencion2 = substr($_FILES['foto2']['type'], 6);
        $nombreFoto2 = $service->gen_uuid();
        
        if(!empty($uploadfile_temporal2)){
            $img2 = $service->upload_imagen($uploadfile_temporal2, $extencion2, $ruta, $nombreFoto2);
            $turismo->setFoto2($img2);
        }

        $uploadfile_temporal3 = $_FILES['foto3']['tmp_name'];
        $extencion3 = substr($_FILES['foto3']['type'], 6);
        $nombreFoto3 = $service->gen_uuid();

        if(!empty($uploadfile_temporal2)){
            $img3 = $service->upload_imagen($uploadfile_temporal3, $extencion3, $ruta, $nombreFoto3);
            $turismo->setFoto3($img3);
        }
        

        $resultado = $service->create_turismo($turismo);
    }

    if ($resultado) {
        header("Location: ../views/admin/" . strtolower($tipo));
    } else {
        header("Location: ../views/admin/" . strtolower($tipo));
    }
}