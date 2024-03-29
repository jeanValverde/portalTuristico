<?php

include_once '../models/Connection.php';
include_once '../controllers/TurismoService.php';
include_once '../models/Turismo.php';

header("Content-Type: text/html;charset=utf-8");

if (!empty($_POST)) {


    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $localidad = $_POST['localidad'];
    $mapa = $_POST['mapa'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];


    $service = new TurismoService();

    $resultado = false;

    $turismo = new Turismo();



    $paginaActiva = $_POST['paginaActiva'];

    if ($tipo == "cajaVecina") {

        $turismo = new Turismo();
        $mapa_format = $service->get_mapa_format($mapa);
        $turismo->setTipo($tipo);
        $turismo->setNombre($nombre);
        $turismo->setLocalidad($localidad);
        $turismo->setMapa($mapa_format);
        $turismo->setLatitud($latitud);
        $turismo->setLongitud($longitud);
        

        $resultado = $service->create_turismo_caja_vecina($turismo);
        
        
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
        $instagram = $_POST['instagram'];
        $twiter = $_POST['twiter'];
        $pagina = $_POST['pagina'];


        $turismo->setTipo($tipo);
        $turismo->setNombre($nombre);
        $turismo->setLocalidad($localidad);
        $mapaFormat = $service->get_mapa_format($mapa);
        $turismo->setMapa($mapaFormat);
        $turismo->setLatitud($latitud);
        $turismo->setLongitud($longitud);
        $turismo->setDescripcion($descripcion);
        $turismo->setContacto($contacto);
        $turismo->setFono($fono);
        $turismo->setFacebook($facebook);
        $turismo->setInstagram($instagram);
        $turismo->setTwiter($twiter);
        $turismo->setPagina($pagina);

        $uploadfile_temporal1 = $_FILES['foto1']['tmp_name'];
        $uploadfile_temporal2 = $_FILES['foto2']['tmp_name'];
        $uploadfile_temporal3 = $_FILES['foto3']['tmp_name'];

        if (!empty($uploadfile_temporal1) || !empty($uploadfile_temporal2) || !empty($uploadfile_temporal3)) {

            $ruta = "./imgTurismo/"; //ruta carpeta donde queremos copiar las imágenes 

            if (!empty($uploadfile_temporal1)) {
                $extencion1 = substr($_FILES['foto1']['type'], 6);
                $nombreFoto1 = $service->gen_uuid();
                $img1 = $service->upload_imagen($uploadfile_temporal1, $extencion1, $ruta, $nombreFoto1);
                $turismo->setFoto1($img1);
            } else {
                $turismo->setFoto1('');
            }

            if (!empty($uploadfile_temporal2)) {
                $extencion2 = substr($_FILES['foto2']['type'], 6);
                $nombreFoto2 = $service->gen_uuid();
                $img2 = $service->upload_imagen($uploadfile_temporal2, $extencion2, $ruta, $nombreFoto2);
                $turismo->setFoto2($img2);
            } else {
                $turismo->setFoto2('');
            }

            if (!empty($uploadfile_temporal3)) {
                $extencion3 = substr($_FILES['foto3']['type'], 6);
                $nombreFoto3 = $service->gen_uuid();
                $img3 = $service->upload_imagen($uploadfile_temporal3, $extencion3, $ruta, $nombreFoto3);
                $turismo->setFoto3($img3);
            } else {
                $turismo->setFoto3('');
            }
        }

        $resultado = $service->create_turismo($turismo);
    }

    if ($resultado) {
        header("Location: ../views/admin/" . $paginaActiva);
    } else {

        header("Location: ../views/admin/" . $paginaActiva . "?error");
    }
}