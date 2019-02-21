<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NoticiasService
 *
 * @author jean
 */
class NoticiasService {

    //put your code here

    

    private $con;

    function __construct() {
        $this->con = new Connection();
    }

    /*
      private $idNoticia;
      private $encabezado;
      private $descripcion;
      private $link;
      private $foto;
     * 
     * 
     *      */

    public function create_noticia($encabezado, $descripcion, $link, $foto) {

        $sql = " INSERT INTO `riohurta_riohurtado`.`noticia` (`encabezado`, `descripcion`, `link`, `foto`) VALUES ('$encabezado', '$descripcion', '$link', '$foto'); ";

        return $this->con->query($sql);
    }

    public function update_noticia_with_foto($idNoticia, $encabezado, $descripcion, $link, $foto) {
        $sql = " UPDATE `riohurta_riohurtado`.`noticia` SET `encabezado`='$encabezado', `descripcion`='$descripcion', `link`='$link', `foto`='$foto' WHERE `id_noticia`=$idNoticia;  ";
        return $this->con->query($sql);
    }
    
    public function update_noticia($idNoticia, $encabezado, $descripcion, $link) {
        $sql = " UPDATE `riohurta_riohurtado`.`noticia` SET `encabezado`='$encabezado', `descripcion`='$descripcion', `link`='$link' WHERE `id_noticia`=$idNoticia;  ";
        return $this->con->query($sql);
    }

    public function delete_noticia($idNoticia) {
        $sql = " DELETE FROM `riohurta_riohurtado`.`noticia` WHERE id_noticia=$idNoticia;  ";
        return $this->con->query($sql);
    }

    public function read_noticias() {
        $noticias = array();
        $noticia = null;

        $sql = " SELECT id_noticia ,  encabezado, descripcion, link, foto FROM riohurta_riohurtado.noticia; ";

        $result = $this->con->query($sql);

        while ($fila = mysqli_fetch_array($result)) {
            $noticia = new Noticia();
            $noticia->setIdNoticia($fila['id_noticia']);
            $noticia->setEncabezado($fila['encabezado']);
            $noticia->setDescripcion($fila['descripcion']);
            $noticia->setLink($fila['link']);
            $noticia->setFoto($fila['foto']);
            array_push($noticias, $noticia);
        }
        return $noticias;
    }

    public function read_noticia_by_id($idNoticia) {


        $sql = " SELECT id_noticia ,  encabezado, descripcion, link, foto FROM riohurta_riohurtado.noticia where id_noticia = $idNoticia ; ";

        $result = $this->con->query($sql);

        $fila = mysqli_fetch_array($result);

        $noticia = new Noticia();
        $noticia->setIdNoticia($fila['id_noticia']);
        $noticia->setEncabezado($fila['encabezado']);
        $noticia->setDescripcion($fila['descripcion']);
        $noticia->setLink($fila['link']);
        $noticia->setFoto($fila['foto']);

        return $noticia;
    }
    
    
     public function read_noticia_max_id() {


        $sql = " SELECT id_noticia ,  encabezado, descripcion, link, foto FROM riohurta_riohurtado.noticia where id_noticia = "
                . " (select MAX(id_noticia) from riohurta_riohurtado.noticia); ";

        $result = $this->con->query($sql);

        $fila = mysqli_fetch_array($result);

        $noticia = new Noticia();
        $noticia->setIdNoticia($fila['id_noticia']);
        $noticia->setEncabezado($fila['encabezado']);
        $noticia->setDescripcion($fila['descripcion']);
        $noticia->setLink($fila['link']);
        $noticia->setFoto($fila['foto']);

        return $noticia;
    }

    public function count_noticias() {

        $numNoticias = null;

        $sql = " SELECT COUNT(*) num_noticias  FROM riohurta_riohurtado.noticia; ";

        $result = $this->con->query($sql);

        $fila = mysqli_fetch_array($result);
        
        $numNoticias = $fila['num_noticias'];
       

        return $numNoticias;
    }


    public function upload_imagen($uploadfile_temporal , $extencion , $ruta , $nombreNuevo) {
        $archivoFinal = null;
        
        $uploadfile_nombre = $ruta . $nombreNuevo . '.' . $extencion;

        if (is_uploaded_file($uploadfile_temporal)) {
            move_uploaded_file($uploadfile_temporal, $uploadfile_nombre);
            $archivoFinal = $nombreNuevo . '.' . $extencion;
        } 
        return $archivoFinal;
    }
    
    
    function gen_uuid() {
        $uuid = array(
            'time_low' => 0,
            'time_mid' => 0,
            'time_hi' => 0,
            'clock_seq_hi' => 0,
            'clock_seq_low' => 0,
            'node' => array()
        );

        $uuid['time_low'] = mt_rand(0, 0xffff) + (mt_rand(0, 0xffff) << 16);
        $uuid['time_mid'] = mt_rand(0, 0xffff);
        $uuid['time_hi'] = (4 << 12) | (mt_rand(0, 0x1000));
        $uuid['clock_seq_hi'] = (1 << 7) | (mt_rand(0, 128));
        $uuid['clock_seq_low'] = mt_rand(0, 255);

        for ($i = 0; $i < 6; $i++) {
            $uuid['node'][$i] = mt_rand(0, 255);
        }

        $uuid = sprintf('%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x', $uuid['time_low'], $uuid['time_mid'], $uuid['time_hi'], $uuid['clock_seq_hi'], $uuid['clock_seq_low'], $uuid['node'][0], $uuid['node'][1], $uuid['node'][2], $uuid['node'][3], $uuid['node'][4], $uuid['node'][5]
        );

        return $uuid;
    }
    
    
    public function delete_foto($direccion){
        unlink($direccion);
    }

}
