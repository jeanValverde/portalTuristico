<?php


include_once '../models/Connection.php';
include_once '../controllers/NoticiasService.php';
include_once '../models/Noticia.php';

$servicio = new NoticiasService();

$idNoticia = $_GET['idNoticia'];

$noticia = $servicio->read_noticia_by_id($idNoticia);

$resultado = $servicio->delete_noticia($idNoticia);

if($resultado){
    $direccion = './imgNoticias/' . $noticia->getFoto();
    $servicio->delete_foto($direccion);
     header("Location: ../views/admin/noticias?delete=2");
}else{
     header("Location: ../views/admin/noticias?delete=2");
}




