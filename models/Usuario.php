<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author jean
 */
class Usuario {
    //put your code here
    
    private $idUsuario;
    private $rut;
    private $nombre;
    private $apellido;
    private $contrasenia;
    private $tipo;
    private $area;
    private $estado;
    private $contraseniaRecuperar;
    private $correo;
    private $cargo;
    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getRut() {
        return $this->rut;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getContrasenia() {
        return $this->contrasenia;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getArea() {
        return $this->area;
    }

    function getEstado() {
        return $this->estado;
    }

    function getContraseniaRecuperar() {
        return $this->contraseniaRecuperar;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getCargo() {
        return $this->cargo;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setContraseniaRecuperar($contraseniaRecuperar) {
        $this->contraseniaRecuperar = $contraseniaRecuperar;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }   
    
}
