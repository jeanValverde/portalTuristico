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
    $idTurismo = $_POST['idTurismo'];
    
    $paginaActiva = $_POST['paginaActiva'];

    $service = new TurismoService();

    $turismo = new Turismo();

    $turismo->setIdTurismo($idTurismo);

    if ($tipo == "cajaVecina") {

        $turismo->setTipo($tipo);
        $turismo->setNombre($nombre);
        $turismo->setLocalidad($localidad);
        $mapaFormat = $service->get_mapa_format($mapa);
        $turismo->setMapa($mapaFormat);
        $turismo->setLatitud($latitud);
        $turismo->setLongitud($longitud);
        
        $resultado = $service->update_turismo($turismo);
        
    } else {
        
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
        
        $resultado = $service->update_turismo_without_foto($turismo);
        
        $ruta = "./imgTurismo/"; //ruta carpeta donde queremos copiar las imágenes 

        $turismoEditar = $service->read_turismo_by_id($idTurismo);
        
        $uploadfile_temporal1 = $_FILES['foto1']['tmp_name'];
        $extencion1 = substr($_FILES['foto1']['type'], 6);
        $nombreFoto1 = $service->gen_uuid();
        
        if(!empty($uploadfile_temporal1)){
            $img1 = $service->upload_imagen($uploadfile_temporal1, $extencion1, $ruta, $nombreFoto1);
            
            $rutaFoto = './imgTurismo/' . $turismoEditar->getFoto1();
            
            $service->delete_foto($rutaFoto);
            
            $service->update_turismo_foto($idTurismo, 'foto_1', $img1);
        }

        $uploadfile_temporal2 = $_FILES['foto2']['tmp_name'];
        $extencion2 = substr($_FILES['foto2']['type'], 6);
        $nombreFoto2 = $service->gen_uuid();
        
        if(!empty($uploadfile_temporal2)){
            
            $img2 = $service->upload_imagen($uploadfile_temporal2, $extencion2, $ruta, $nombreFoto2);
            
            $resul1 = $service->update_turismo_foto($idTurismo, 'foto_2', $img2); 
            
            if($resul1){
                
                 $rutaFoto = './imgTurismo/' . $turismoEditar->getFoto2();
            
                 $service->delete_foto($rutaFoto);     
            }
        }

        $uploadfile_temporal3 = $_FILES['foto3']['tmp_name'];
        $extencion3 = substr($_FILES['foto3']['type'], 6);
        $nombreFoto3 = $service->gen_uuid();

        if(!empty($uploadfile_temporal3)){
            $img3 = $service->upload_imagen($uploadfile_temporal3, $extencion3, $ruta, $nombreFoto3);
            
            $rutaFoto = './imgTurismo/' . $turismoEditar->getFoto3();
            
            $service->delete_foto($rutaFoto);
            
            $service->update_turismo_foto($idTurismo, 'foto_3', $img3);
        }
        
    }


    if ($resultado) {
        header("Location: ../views/admin/" . $paginaActiva);
    } else {
        header("Location: ../views/admin/" . $paginaActiva);
    }
}


