<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmpresaService
 *
 * @author jean
 */
class EmpresaService {

    private $con;

    function __construct() {
        $this->con = new Connection();
    }

    //CRUD Empresa
    /*
      private $nombre;
      private $cantidadBuses;
      private $contacto;
      private $direccion;
      private $rutaInicio;
      private $rutaFin;
      private $tipo;

     *      */
    public function create_empresa($nombre, $cantidadBuses, $contacto, $direccion, $rutaInicio, $rutaFin, $tipo) {

        $sql = " INSERT INTO `riohurta_turismo`.`empresa` (`nombre`, `cantidad_buses`, `Contacto`, `direccion`, `ruta_inicio`, `ruta_fin`, `tipo`) 
                 VALUES ('$nombre', $cantidadBuses , '$contacto', '$direccion', '$rutaInicio', '$rutaFin', '$tipo'); ";

        return $this->con->query($sql);
    }

    // SELECT * FROM portalturistico.empresa;

    public function read_empresa() {
        $empresas = array();
        $empresa = null;

        $sql = " SELECT id_empresa  , nombre, cantidad_buses, Contacto, direccion, ruta_inicio, ruta_fin, tipo  FROM riohurta_turismo.empresa;";

        $result = $this->con->query($sql);

        while ($fila = mysqli_fetch_array($result)) {
            $empresa = new Empresa();
            $empresa->setId($fila['id_empresa']);
            $empresa->setNombre($fila["nombre"]);
            $empresa->setCantidadBuses($fila["cantidad_buses"]);
            $empresa->setContacto($fila["Contacto"]);
            $empresa->setDireccion($fila["direccion"]);
            $empresa->setRutaInicio($fila["ruta_inicio"]);
            $empresa->setRutaFin($fila["ruta_fin"]);
            $empresa->setTipo($fila["tipo"]);
            array_push($empresas, $empresa);
        }
        return $empresas;
    }

    public function read_empresa_by_id($idEmpresa) {

        $sql = " SELECT id_empresa  , nombre, cantidad_buses, Contacto, direccion, ruta_inicio, ruta_fin, tipo  "
                . " FROM riohurta_turismo.empresa where id_empresa = $idEmpresa   ";

        $result = $this->con->query($sql);

        $fila = mysqli_fetch_array($result);

        $empresa = new Empresa();
        $empresa->setId($fila['id_empresa']);
        $empresa->setNombre($fila["nombre"]);
        $empresa->setCantidadBuses($fila["cantidad_buses"]);
        $empresa->setContacto($fila["Contacto"]);
        $empresa->setDireccion($fila["direccion"]);
        $empresa->setRutaInicio($fila["ruta_inicio"]);
        $empresa->setRutaFin($fila["ruta_fin"]);
        $empresa->setTipo($fila["tipo"]);

        return $empresa;
    }
    
    
    
    
    
    public function update_empresa($idEmpresa , $nombre, $cantidadBuses, $contacto, $direccion, $rutaInicio, $rutaFin, $tipo) {

        $sql = " UPDATE riohurta_turismo.empresa  SET 
                 nombre='$nombre', 
                 cantidad_buses='$cantidadBuses', 
                 Contacto='$contacto', 
                 direccion='$direccion', 
                 ruta_inicio='$rutaInicio', 
                 ruta_fin='$rutaFin', 
                 tipo='$tipo'
                 WHERE `id_empresa`=$idEmpresa  ; ";

        return $this->con->query($sql);
    }
    
    

    public function delete_empresa($idEmpresa) {
        $sql = " DELETE FROM riohurta_turismo.empresa where id_empresa = $idEmpresa ; ";
        return $this->con->query($sql);
    }

}
