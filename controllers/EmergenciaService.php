<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmergenciaController
 *
 * @author jean
 */
class EmergenciaService {

    //put your code here

    private $con;

    function __construct() {
        $this->con = new Connection();
    }

    /*
      private $idEmergencia;
      private $tipo;
      private $ubicacion;
      private $numero;
     *      */

    public function create_emergencia($tipo, $ubicacion, $numero) {
        $sql = "INSERT INTO `riohurta_turismo`.`emergencia` (`tipo`, `ubicacion`, `numero`) VALUES ('$tipo', '$ubicacion', '$numero');";
        return $this->con->query($sql);
    }

    public function update_emergencia($idEmergencia, $tipo, $ubicacion, $numero) {
        $sql = " UPDATE `riohurta_turismo`.`emergencia` SET `tipo`='$tipo', `ubicacion`='$ubicacion', `numero`='$numero' WHERE `id_emergencia`='$idEmergencia'; ";
        return $this->con->query($sql);
    }

    public function delete_emergencia($idEmergencia) {
        $sql = " DELETE FROM `riohurta_turismo`.`emergencia` WHERE `id_emergencia`='$idEmergencia';  ";
        return $this->con->query($sql);
    }

    public function read_emergencias() {
        $emergencias = array();
        $emergencia = null;

        $sql = " SELECT id_emergencia, tipo, ubicacion, numero FROM riohurta_turismo.emergencia; ";

        $result = $this->con->query($sql);

        while ($fila = mysqli_fetch_array($result)) {
            $emergencia = new Emergencia();
            $emergencia->setIdEmergencia($fila['id_emergencia']);
            $emergencia->setTipo($fila['tipo']);
            $emergencia->setUbicacion($fila['ubicacion']);
            $emergencia->setNumero($fila['numero']);
            array_push($emergencias, $emergencia);
        }
        return $emergencias;
    }
    
    
     public function read_emergencias_by_tipo($tipo) {
        $emergencias = array();
        $emergencia = null;

        $sql = " SELECT id_emergencia, tipo, ubicacion, numero FROM riohurta_turismo.emergencia WHERE tipo='$tipo'; ";

        $result = $this->con->query($sql);

        while ($fila = mysqli_fetch_array($result)) {
            $emergencia = new Emergencia();
            $emergencia->setIdEmergencia($fila['id_emergencia']);
            $emergencia->setTipo($fila['tipo']);
            $emergencia->setUbicacion($fila['ubicacion']);
            $emergencia->setNumero($fila['numero']);
            array_push($emergencias, $emergencia);
        }
        return $emergencias;
    }

    public function read_emergencias_by_id($idEmergencia) {

     
        $sql = " SELECT id_emergencia, tipo, ubicacion, numero FROM riohurta_turismo.emergencia WHERE id_emergencia=$idEmergencia; ";

        $result = $this->con->query($sql);

        $fila = mysqli_fetch_array($result);

        $emergencia = new Emergencia();
        $emergencia->setIdEmergencia($fila['id_emergencia']);
        $emergencia->setTipo($fila['tipo']);
        $emergencia->setUbicacion($fila['ubicacion']);
        $emergencia->setNumero($fila['numero']);

        return $emergencia;
    }

}
