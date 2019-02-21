<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Noticia
 *
 * @author jean
 */
class Noticia {
    //put your code here
    private $idNoticia;
    private $encabezado;
    private $descripcion;
    private $link;
    private $foto;
    
    
    function getIdNoticia() {
        return $this->idNoticia;
    }

    function getEncabezado() {
        return $this->encabezado;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getLink() {
        return $this->link;
    }

    function getFoto() {
        return $this->foto;
    }

    function setIdNoticia($idNoticia) {
        $this->idNoticia = $idNoticia;
    }

    function setEncabezado($encabezado) {
        $this->encabezado = $encabezado;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

   
    
}
