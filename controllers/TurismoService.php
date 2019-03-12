<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TurismoService
 *
 * @author jean
 */
class TurismoService {

    //put your code here


    private $con;

    function __construct() {
        $this->con = new Connection();
    }

    /**


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
     * 
     * 
     * 
     *      /
     */
    public function create_turismo($turismo) {

        $tipo = $turismo->getTipo();
        $nombre = $turismo->getNombre();
        $descripcion = $turismo->getDescripcion();
        $latitud = $turismo->getLatitud();
        $longitud = $turismo->getLongitud();
        $mapa = $turismo->getMapa();
        $contacto = $turismo->getContacto();
        $fono = $turismo->getFono();
        $localidad = $turismo->getLocalidad();
        $facebook = $turismo->getFacebook();
        $instagram = $turismo->getInstagram();
        $twiter = $turismo->getTwiter();
        $pagina = $turismo->getPagina();
        $foto1 = $turismo->getFoto1();
        $foto2 = $turismo->getFoto2();
        $foto3 = $turismo->getFoto3();


        $sql = "  INSERT INTO `riohurta_turismo`.`turismo` (`tipo`, `nombre`, `descripcion`, `latitud`, `longitud`, `mapa`, `contacto`, `fono`, `localidad`, `facebook`, `instagram`, `twiter`, `pagina`, `foto_1`, `foto_2`, `foto_3`) "
                . " VALUES ('$tipo', '$nombre', '$descripcion', '$latitud', '$longitud', '$mapa', '$contacto', '$fono', '$localidad', '$facebook', '$instagram', '$twiter', '$pagina', '$foto1', '$foto2', '$foto3');  ";

        return $this->con->query($sql);
    }

    public function get_mapa_format($mapa) {

        $mapa_format = str_replace("'", "&#39;",  $mapa);
        
        return $mapa_format;
        
    }
    
    public function create_turismo_caja_vecina($turismo) {

        $tipo = $turismo->getTipo();
        $nombre = $turismo->getNombre();
        $latitud = $turismo->getLatitud();
        $longitud = $turismo->getLongitud();
        $mapa = $turismo->getMapa();
        $localidad = $turismo->getLocalidad();
        
        $sql = "  INSERT INTO `riohurta_turismo`.`turismo` (`tipo`, `nombre`, `latitud`, `longitud`, `mapa`, `localidad`) "
                . " VALUES ('$tipo', '$nombre', '$latitud', '$longitud', '$mapa', '$localidad');  ";

        return $this->con->query($sql);
    }
    
    public function read_turismos_by_tipo($tipo) {
        $turismos = array();
        $turismo = null;

        $sql = " SELECT id_turismo , tipo, nombre, descripcion, latitud, longitud, mapa, contacto, fono, localidad, facebook, instagram, twiter, pagina, foto_1, foto_2, foto_3 "
                . " FROM riohurta_turismo.turismo WHERE tipo = '$tipo'; ";

        $result = $this->con->query($sql);

        while ($fila = mysqli_fetch_array($result)) {

            $turismo = new Turismo();
            $turismo->setIdTurismo($fila['id_turismo']);
            $turismo->setNombre($fila['nombre']);
            $turismo->setDescripcion($fila['descripcion']);
            $turismo->setLatitud($fila['latitud']);
            $turismo->setLongitud($fila['longitud']);
            $turismo->setMapa($fila['mapa']);
            $turismo->setContacto($fila['contacto']);
            $turismo->setFono($fila['fono']);
            $turismo->setLocalidad($fila['localidad']);
            $turismo->setFacebook($fila['facebook']);
            $turismo->setInstagram($fila['instagram']);
            $turismo->setTwiter($fila['twiter']);
            $turismo->setPagina($fila['pagina']);
            $turismo->setFoto1($fila['foto_1']);
            $turismo->setFoto2($fila['foto_2']);
            $turismo->setFoto3($fila['foto_3']);

            array_push($turismos, $turismo);
        }
        return $turismos;
    }

    public function read_turismos_by_tipos($tipos) {
        $turismos = array();
        $turismo = null;

        $where = "";


        //saco el numero de elementos
        $longitud = count($tipos);
        //Recorro todos los elementos
        $andTipos = "";
        
        for ($i = 0; $i < $longitud; $i++) {
            //saco el valor de cada elemento
            if($i  == 0){
                $where = " WHERE tipo='$tipos[$i]'";
            }else{
                $andTipos = $andTipos . " OR tipo='$tipos[$i]' ";
            }
        }
        
        $where = $where . " " . $andTipos;

        $sql = " SELECT id_turismo , tipo, nombre, descripcion, latitud, longitud, mapa, contacto, fono, localidad, facebook, instagram, twiter, pagina, foto_1, foto_2, foto_3 "
                . " FROM riohurta_turismo.turismo " . $where . " ;";

        $result = $this->con->query($sql);

        while ($fila = mysqli_fetch_array($result)) {

            $turismo = new Turismo();
            $turismo->setIdTurismo($fila['id_turismo']);
            $turismo->setNombre($fila['nombre']);
            $turismo->setDescripcion($fila['descripcion']);
            $turismo->setLatitud($fila['latitud']);
            $turismo->setLongitud($fila['longitud']);
            $turismo->setMapa($fila['mapa']);
            $turismo->setContacto($fila['contacto']);
            $turismo->setFono($fila['fono']);
            $turismo->setLocalidad($fila['localidad']);
            $turismo->setFacebook($fila['facebook']);
            $turismo->setInstagram($fila['instagram']);
            $turismo->setTwiter($fila['twiter']);
            $turismo->setPagina($fila['pagina']);
            $turismo->setFoto1($fila['foto_1']);
            $turismo->setFoto2($fila['foto_2']);
            $turismo->setFoto3($fila['foto_3']);

            array_push($turismos, $turismo);
        }
        return $turismos;
    }

    public function read_turismos_by_max_id($tipo) {
        $turismos = array();
        $turismo = null;

        $sql = " SELECT id_turismo , tipo, nombre, descripcion, latitud, longitud, mapa, contacto, fono, localidad, facebook, instagram, twiter, pagina, foto_1, foto_2, foto_3
                 FROM riohurta_turismo.turismo WHERE id_turismo = (SELECT MAX(id_turismo) FROM riohurta_turismo.turismo WHERE tipo = '$tipo'); ";

        $result = $this->con->query($sql);
        $fila = mysqli_fetch_array($result);
        $turismo = new Turismo();
        $turismo->setIdTurismo($fila['id_turismo']);
        $turismo->setTipo($fila['tipo']);
        $turismo->setNombre($fila['nombre']);
        $turismo->setDescripcion($fila['descripcion']);
        $turismo->setLatitud($fila['latitud']);
        $turismo->setLongitud($fila['longitud']);
        $turismo->setMapa($fila['mapa']);
        $turismo->setContacto($fila['contacto']);
        $turismo->setFono($fila['fono']);
        $turismo->setLocalidad($fila['localidad']);
        $turismo->setFacebook($fila['facebook']);
        $turismo->setInstagram($fila['instagram']);
        $turismo->setTwiter($fila['twiter']);
        $turismo->setPagina($fila['pagina']);
        $turismo->setFoto1($fila['foto_1']);
        $turismo->setFoto2($fila['foto_2']);
        $turismo->setFoto3($fila['foto_3']);


        return $turismo;
    }
    
     public function read_turismos_by_max_id_tipos($tipos) {
        $turismos = array();
        $turismo = null;
        
        $where =  "";
        
        $longitud = count($tipos);
         for ($i = 0; $i < $longitud; $i++) {
            //saco el valor de cada elemento
            if($i == 0){
                $where = " tipo='$tipos[$i] '"; 
            }else{
                $where = $where . " OR tipo='$tipos[$i]'";
            }
        }

        $sql = " SELECT id_turismo , tipo, nombre, descripcion, latitud, longitud, mapa, contacto, fono, localidad, facebook, instagram, twiter, pagina, foto_1, foto_2, foto_3 
FROM riohurta_turismo.turismo where id_turismo = (SELECT MAX(id_turismo)  FROM riohurta_turismo.turismo where $where); ";

        $result = $this->con->query($sql);
        $fila = mysqli_fetch_array($result);
        $turismo = new Turismo();
        $turismo->setIdTurismo($fila['id_turismo']);
        $turismo->setTipo($fila['tipo']);
        $turismo->setNombre($fila['nombre']);
        $turismo->setDescripcion($fila['descripcion']);
        $turismo->setLatitud($fila['latitud']);
        $turismo->setLongitud($fila['longitud']);
        $turismo->setMapa($fila['mapa']);
        $turismo->setContacto($fila['contacto']);
        $turismo->setFono($fila['fono']);
        $turismo->setLocalidad($fila['localidad']);
        $turismo->setFacebook($fila['facebook']);
        $turismo->setInstagram($fila['instagram']);
        $turismo->setTwiter($fila['twiter']);
        $turismo->setPagina($fila['pagina']);
        $turismo->setFoto1($fila['foto_1']);
        $turismo->setFoto2($fila['foto_2']);
        $turismo->setFoto3($fila['foto_3']);
        return $turismo;
    }

    public function deleteTurismo_by_id($idTurismo) {
        $sql = " DELETE FROM riohurta_turismo.turismo WHERE id_turismo='$idTurismo';  ";
        return $this->con->query($sql);
    }

    public function read_turismo_by_id($idTurismo) {

        $sql = " SELECT id_turismo , tipo, nombre, descripcion, latitud, longitud, mapa, contacto, fono, localidad, facebook, instagram, twiter, pagina, foto_1, foto_2, foto_3
                 FROM riohurta_turismo.turismo WHERE id_turismo = $idTurismo; ";

        $result = $this->con->query($sql);
        $fila = mysqli_fetch_array($result);
        $turismo = new Turismo();
        $turismo->setIdTurismo($fila['id_turismo']);
        $turismo->setTipo($fila['tipo']);
        $turismo->setNombre($fila['nombre']);
        $turismo->setDescripcion($fila['descripcion']);
        $turismo->setLatitud($fila['latitud']);
        $turismo->setLongitud($fila['longitud']);
        $turismo->setMapa($fila['mapa']);
        $turismo->setContacto($fila['contacto']);
        $turismo->setFono($fila['fono']);
        $turismo->setLocalidad($fila['localidad']);
        $turismo->setFacebook($fila['facebook']);
        $turismo->setInstagram($fila['instagram']);
        $turismo->setTwiter($fila['twiter']);
        $turismo->setPagina($fila['pagina']);
        $turismo->setFoto1($fila['foto_1']);
        $turismo->setFoto2($fila['foto_2']);
        $turismo->setFoto3($fila['foto_3']);


        return $turismo;
    }

    public function update_turismo($turismo) {

        $idTurismo = $turismo->getIdTurismo();
        $tipo = $turismo->getTipo();
        $nombre = $turismo->getNombre();
        $descripcion = $turismo->getDescripcion();
        $latitud = $turismo->getLatitud();
        $longitud = $turismo->getLongitud();
        $mapa = $turismo->getMapa();
        $contacto = $turismo->getContacto();
        $fono = $turismo->getFono();
        $localidad = $turismo->getLocalidad();
        $facebook = $turismo->getFacebook();
        $instagram = $turismo->getInstagram();
        $twiter = $turismo->getTwiter();
        $pagina = $turismo->getPagina();
        $foto1 = $turismo->getFoto1();
        $foto2 = $turismo->getFoto2();
        $foto3 = $turismo->getFoto3();


        $sql = " UPDATE `riohurta_turismo`.`turismo` "
                . " SET "
                . " `tipo`='$tipo', "
                . " `nombre`='$nombre', "
                . " `descripcion`='$descripcion', "
                . " `latitud`='$latitud', "
                . " `longitud`='$longitud', "
                . " `mapa`='$mapa', "
                . " `contacto`='$contacto', "
                . " `fono`='$fono', "
                . " `localidad`='$localidad', "
                . " `facebook`='$facebook', "
                . " `instagram`='$instagram', "
                . " `twiter`='$twiter', "
                . " `pagina`='$pagina', "
                . " `foto_1`='$foto1', "
                . " `foto_2`='$foto2', "
                . " `foto_3`='$foto3' "
                . " WHERE `id_turismo`='$idTurismo'; ";

        return $this->con->query($sql);
    }

    public function update_turismo_without_foto($turismo) {

        $idTurismo = $turismo->getIdTurismo();
        $tipo = $turismo->getTipo();
        $nombre = $turismo->getNombre();
        $descripcion = $turismo->getDescripcion();
        $latitud = $turismo->getLatitud();
        $longitud = $turismo->getLongitud();
        $mapa = $turismo->getMapa();
        $contacto = $turismo->getContacto();
        $fono = $turismo->getFono();
        $localidad = $turismo->getLocalidad();
        $facebook = $turismo->getFacebook();
        $instagram = $turismo->getInstagram();
        $twiter = $turismo->getTwiter();
        $pagina = $turismo->getPagina();


        $sql = " UPDATE `riohurta_turismo`.`turismo` "
                . " SET "
                . " `tipo`='$tipo', "
                . " `nombre`='$nombre', "
                . " `descripcion`='$descripcion', "
                . " `latitud`='$latitud', "
                . " `longitud`='$longitud', "
                . " `mapa`='$mapa', "
                . " `contacto`='$contacto', "
                . " `fono`='$fono', "
                . " `localidad`='$localidad', "
                . " `facebook`='$facebook', "
                . " `instagram`='$instagram', "
                . " `twiter`='$twiter', "
                . " `pagina`='$pagina' "
                . " WHERE `id_turismo`='$idTurismo'; ";

        return $this->con->query($sql);
    }

    public function update_turismo_foto($id, $parametro, $foto) {

        $sql = " UPDATE `riohurta_turismo`.`turismo` "
                . " SET "
                . " `$parametro`='$foto' "
                . " WHERE `id_turismo`='$id'; ";

        return $this->con->query($sql);
    }

    public function upload_imagen($uploadfile_temporal, $extencion, $ruta, $nombreNuevo) {
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

    public function delete_foto($direccion) {
        unlink($direccion);
    }

}
