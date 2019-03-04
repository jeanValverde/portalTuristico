<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Turisno
 *
 * @author jean
 */
class Turismo {
    //put your code here
    
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
    
    
    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

        
    
    function getIdTurismo() {
        return $this->idTurismo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getLatitud() {
        return $this->latitud;
    }

    function getLongitud() {
        return $this->longitud;
    }

    function getMapa() {
        return $this->mapa;
    }

    function getContacto() {
        return $this->contacto;
    }

    function getFono() {
        return $this->fono;
    }

    function getLocalidad() {
        return $this->localidad;
    }

    function getFacebook() {
        return $this->facebook;
    }

    function getInstagram() {
        return $this->instagram;
    }

    function getTwiter() {
        return $this->twiter;
    }

    function getPagina() {
        return $this->pagina;
    }

    function getFoto1() {
        return $this->foto1;
    }

    function getFoto2() {
        return $this->foto2;
    }

    function getFoto3() {
        return $this->foto3;
    }

    function setIdTurismo($idTurismo) {
        $this->idTurismo = $idTurismo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setLatitud($latitud) {
        $this->latitud = $latitud;
    }

    function setLongitud($longitud) {
        $this->longitud = $longitud;
    }

    function setMapa($mapa) {
        $this->mapa = $mapa;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    function setFono($fono) {
        $this->fono = $fono;
    }

    function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    function setInstagram($instagram) {
        $this->instagram = $instagram;
    }

    function setTwiter($twiter) {
        $this->twiter = $twiter;
    }

    function setPagina($pagina) {
        $this->pagina = $pagina;
    }

    function setFoto1($foto1) {
        $this->foto1 = $foto1;
    }

    function setFoto2($foto2) {
        $this->foto2 = $foto2;
    }

    function setFoto3($foto3) {
        $this->foto3 = $foto3;
    }


    
}
