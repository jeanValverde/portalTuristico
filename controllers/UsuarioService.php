<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioService
 *
 * @author jean
 */
class UsuarioService {

    //put your code here


    private $con;

    function __construct() {
        $this->con = new Connection();
    }

    /*

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

     * 
     *      */

    public function create_usuario($rut, $nombre, $apellido, $tipo, $area, $estado, $contraseniaRecuperar, $correo, $cargo) {

        $sql = " INSERT INTO `riohurta_riohurtado`.`usuarios` (`rut`, `nombre`, `apellido`, `tipo`, `area`, `estado`, `contrasena_recuperar`, `correo`, `cargo`) "
                . "VALUES ('$rut', '$nombre', '$apellido', '$tipo', '$area', '$estado', '$contraseniaRecuperar', '$correo', '$cargo'); ";

        return $this->con->query($sql);
    }

    // SELECT * FROM portalturistico.empresa;

    public function read_usuario() {
        $usuarios = array();
        $usuario = null;

        $sql = "   ";

        $result = $this->con->query($sql);

        while ($fila = mysqli_fetch_array($result)) {
            $usuario = new Usuario();
            $usuario->setIdUsuario($fila['id_empresa']);
            $usuario->setRut($fila["nombre"]);
            $usuario->setNombre($fila["cantidad_buses"]);
            $usuario->setApellido($fila["Contacto"]);
            $usuario->setTipo($fila["ruta_inicio"]);
            $usuario->setArea($fila["ruta_fin"]);
            $usuario->setCorreo($fila["tipo"]);
            $usuario->setCargo($fila["tipo"]);
            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }

    public function read_usuario_by_id($idUsuario) {

        $sql = "   ";

        $result = $this->con->query($sql);

        $fila = mysqli_fetch_array($result);

        $usuario = new Usuario();
        $usuario->setIdUsuario($fila['id_empresa']);
        $usuario->setRut($fila["nombre"]);
        $usuario->setNombre($fila["cantidad_buses"]);
        $usuario->setApellido($fila["Contacto"]);
        $usuario->setTipo($fila["ruta_inicio"]);
        $usuario->setArea($fila["ruta_fin"]);
        $usuario->setCorreo($fila["tipo"]);
        $usuario->setCargo($fila["tipo"]);

        return $usuario;
    }

    public function start_session_usuario($rut, $contrasenia) {

        $sql = "   ";

        $result = $this->con->query($sql);

        $fila = mysqli_fetch_array($result);

        $usuario = new Usuario();
        $usuario->setIdUsuario($fila['id_empresa']);
        $usuario->setRut($fila["nombre"]);
        $usuario->setNombre($fila["cantidad_buses"]);
        $usuario->setApellido($fila["Contacto"]);
        $usuario->setTipo($fila["ruta_inicio"]);
        $usuario->setArea($fila["ruta_fin"]);
        $usuario->setCorreo($fila["tipo"]);
        $usuario->setCargo($fila["tipo"]);

        return $usuario;
    }

    public function change_password($password, $indexRecuperacion) {
        $sql = "  ";

        return $this->con->query($sql);
    }

    public function update_usuario($idEmpresa, $nombre, $cantidadBuses, $contacto, $direccion, $rutaInicio, $rutaFin, $tipo) {

        $sql = "  ";

        return $this->con->query($sql);
    }

    public function delete_usuario($idUsuario) {
        $sql = "   ";
        return $this->con->query($sql);
    }

}
