<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of recorrido
 *
 * @author jean
 */
class Recorrido {
    //put your code here
    private $idRecorrido;
    private $trayectoInicio;
    private $trayectoFinal;
    private $horaSalida;
    private $diaRecorrido;
    private $empresa;
    
    private $zona;  
    
    private $horaLlegada;
    
    
    function getZona() {
        return $this->zona;
    }

    function setZona($zona) {
        $this->zona = $zona;
    }

        
    function getHoraLlegada() {
        return $this->horaLlegada;
    }

    function setHoraLlegada($horaLlegada) {
        $this->horaLlegada = $horaLlegada;
    }

       
    
    
    function getIdRecorrido() {
        return $this->idRecorrido;
    }

    function getTrayectoInicio() {
        return $this->trayectoInicio;
    }

    function getTrayectoFinal() {
        return $this->trayectoFinal;
    }

    function getHoraSalida() {
        return $this->horaSalida;
    }

    function getDiaRecorrido() {
        return $this->diaRecorrido;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function setIdRecorrido($idRecorrido) {
        $this->idRecorrido = $idRecorrido;
    }

    function setTrayectoInicio($trayectoInicio) {
        $this->trayectoInicio = $trayectoInicio;
    }

    function setTrayectoFinal($trayectoFinal) {
        $this->trayectoFinal = $trayectoFinal;
    }

    function setHoraSalida($horaSalida) {
        $this->horaSalida = $horaSalida;
    }

    function setDiaRecorrido($diaRecorrido) {
        $this->diaRecorrido = $diaRecorrido;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

   
    
    
}
