
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Emergencia
 *
 * @author jean
 */
class Emergencia {
    //put your code here
    private $idEmergencia;
    private $tipo;
    private $ubicacion;
    private $numero;
    
    
    function getIdEmergencia() {
        return $this->idEmergencia;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getUbicacion() {
        return $this->ubicacion;
    }

    function getNumero() {
        return $this->numero;
    }

    function setIdEmergencia($idEmergencia) {
        $this->idEmergencia = $idEmergencia;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }
    
}
