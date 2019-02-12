<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of empresa
 *
 * @author jean
 */
class Empresa {
    //put your code here
    
    private $id;
    private $nombre;
    private $cantidadBuses;
    private $contacto;
    private $direccion;
    private $rutaInicio;
    private $rutaFin;
    private $tipo;
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCantidadBuses() {
        return $this->cantidadBuses;
    }

    function getContacto() {
        return $this->contacto;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getRutaInicio() {
        return $this->rutaInicio;
    }

    function getRutaFin() {
        return $this->rutaFin;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCantidadBuses($cantidadBuses) {
        $this->cantidadBuses = $cantidadBuses;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setRutaInicio($rutaInicio) {
        $this->rutaInicio = $rutaInicio;
    }

    function setRutaFin($rutaFin) {
        $this->rutaFin = $rutaFin;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }


    
}
