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

    public function create_usuario($rut, $nombre, $apellido, $contrasena, $tipo, $area, $estado, $contraseniaRecuperar, $correo, $cargo) {

        $sql = " INSERT INTO `riohurta_riohurtado`.`usuarios` (`rut`, `nombre`, `apellido`, `contrasena`, `tipo`, `area`, `estado`, `contrasena_recuperar`, `correo`, `cargo`) "
                . "VALUES ('$rut', '$nombre', '$apellido', '$contrasena', '$tipo', '$area', '$estado', '$contraseniaRecuperar', '$correo', '$cargo'); ";

        return $this->con->query($sql);
    }

    // SELECT * FROM portalturistico.empresa;

    public function read_usuarios() {
        $usuarios = array();
        $usuario = null;

        $sql = " SELECT id_usuarios ,  rut , nombre, apellido, tipo, area, estado, correo, cargo , contrasena_recuperar FROM riohurta_riohurtado.usuarios;  ";

        $result = $this->con->query($sql);

        while ($fila = mysqli_fetch_array($result)) {
            $usuario = new Usuario();
            $usuario->setIdUsuario($fila['id_usuarios']);
            $usuario->setRut($fila["rut"]);
            $usuario->setNombre($fila["nombre"]);
            $usuario->setApellido($fila["apellido"]);
            $usuario->setTipo($fila["tipo"]);
            $usuario->setArea($fila["area"]);
            $usuario->setEstado($fila['estado']);
            $usuario->setCorreo($fila["correo"]);
            $usuario->setCargo($fila["cargo"]);
            $usuario->setContraseniaRecuperar($fila['contrasena_recuperar']);
            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }

    public function read_usuario_by_id($idUsuario) {

        $sql = " SELECT id_usuarios ,  rut , nombre, apellido, tipo, area, estado, correo, cargo , contrasena_recuperar FROM riohurta_riohurtado.usuarios WHERE id_usuarios='$idUsuario'; ";

        $result = $this->con->query($sql);
        $fila = mysqli_fetch_array($result);
        $usuario = new Usuario();
        $usuario->setIdUsuario($fila['id_usuarios']);
        $usuario->setRut($fila["rut"]);
        $usuario->setNombre($fila["nombre"]);
        $usuario->setApellido($fila["apellido"]);
        $usuario->setTipo($fila["tipo"]);
        $usuario->setArea($fila["area"]);
        $usuario->setEstado($fila['estado']);
        $usuario->setCorreo($fila["correo"]);
        $usuario->setCargo($fila["cargo"]);
        $usuario->setContraseniaRecuperar($fila['contrasena_recuperar']);
        return $usuario;
    }
    
    
    
    
    public function read_usuario_by_rut($rut) {

        $sql = " SELECT id_usuarios ,  rut , nombre, apellido, tipo, area, estado, correo, cargo , contrasena_recuperar FROM riohurta_riohurtado.usuarios WHERE rut='$rut'; ";

        $result = $this->con->query($sql);
        $fila = mysqli_fetch_array($result);
        $usuario = new Usuario();
        $usuario->setIdUsuario($fila['id_usuarios']);
        $usuario->setRut($fila["rut"]);
        $usuario->setNombre($fila["nombre"]);
        $usuario->setApellido($fila["apellido"]);
        $usuario->setTipo($fila["tipo"]);
        $usuario->setArea($fila["area"]);
        $usuario->setEstado($fila['estado']);
        $usuario->setCorreo($fila["correo"]);
        $usuario->setCargo($fila["cargo"]);
        $usuario->setContraseniaRecuperar($fila['contrasena_recuperar']);
        return $usuario;
    }
    
    

    public function update_usuario($isUsuario, $nombre, $apellido, $tipo, $area, $correo, $cargo) {

        $sql = " UPDATE `riohurta_riohurtado`.`usuarios` SET `nombre`='$nombre', `apellido`='$apellido', `tipo`='$tipo', `area`='$area', `correo`='$correo', `cargo`='$cargo' WHERE `id_usuarios`='$isUsuario'; ";

        return $this->con->query($sql);
    }

    public function delete_usuario($idUsuario) {
        $sql = " DELETE FROM riohurta_riohurtado.usuarios WHERE id_usuarios='$idUsuario';  ";
        return $this->con->query($sql);
    }

    public function disabled_usuario($estado, $idUsuario) {

        $sql = " UPDATE riohurta_riohurtado.usuarios SET estado='$estado' WHERE id_usuarios='$idUsuario'; ";
        return $this->con->query($sql);
    }

    public function start_session_usuario($rut, $password) {

        $sql = "  SELECT id_usuarios , rut , nombre , apellido , tipo , area, estado  , correo , cargo FROM riohurta_riohurtado.usuarios "
                . " WHERE rut = '$rut' and contrasena = '$password';  ";

        $result = $this->con->query($sql);

        $fila = mysqli_fetch_array($result);
        $usuario = new Usuario();
        $usuario->setIdUsuario($fila['id_usuarios']);
        $usuario->setRut($fila["rut"]);
        $usuario->setNombre($fila["nombre"]);
        $usuario->setApellido($fila["apellido"]);
        $usuario->setTipo($fila["tipo"]);
        $usuario->setArea($fila["area"]);
        $usuario->setEstado($fila['estado']);
        $usuario->setCorreo($fila["correo"]);
        $usuario->setCargo($fila["cargo"]);
        return $usuario;
    }
    
    public function read_usuario_by_id_contrasena_recuperar($encode) {

        $sql = "  SELECT id_usuarios , rut , nombre , apellido , tipo , area, estado  , correo , cargo FROM riohurta_riohurtado.usuarios "
                . " WHERE contrasena_recuperar = '$encode';  ";

        $result = $this->con->query($sql);

        $fila = mysqli_fetch_array($result);
        $usuario = new Usuario();
        $usuario->setIdUsuario($fila['id_usuarios']);
        $usuario->setRut($fila["rut"]);
        $usuario->setNombre($fila["nombre"]);
        $usuario->setApellido($fila["apellido"]);
        $usuario->setTipo($fila["tipo"]);
        $usuario->setArea($fila["area"]);
        $usuario->setEstado($fila['estado']);
        $usuario->setCorreo($fila["correo"]);
        $usuario->setCargo($fila["cargo"]);
        return $usuario;
    }
    
    
    
    public function start_session($rut, $password) {

        $sql = "  SELECT COUNT(*) usuario FROM riohurta_riohurtado.usuarios WHERE rut = '$rut' and contrasena = '$password';  ";

        $result = $this->con->query($sql);

        $fila = mysqli_fetch_array($result);
        $usuario =  $fila["usuario"];
        return $usuario;
    }
    
    
    
    public function read_usuario_encode_contrasena($encode) {

        $sql = "  SELECT COUNT(*) usuario FROM riohurta_riohurtado.usuarios WHERE contrasena_recuperar = '$encode'   ";

        $result = $this->con->query($sql);

        $fila = mysqli_fetch_array($result);
        $usuario =  $fila["usuario"];
        return $usuario;
    }
    
    

    /*




      public function change_password($password, $indexRecuperacion) {
      $sql = "  ";

      return $this->con->query($sql);
      }




     * 
     * 
     * 
     *      */

    function get_password($longitud = 8, $opcLetra = TRUE, $opcNumero = TRUE, $opcMayus = TRUE, $opcEspecial = TRUE) {
        $letras = "abcdefghijklmnopqrstuvwxyz";
        $numeros = "1234567890";
        $letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $especiales = "@#$%*_@#$%*_";
        $listado = "";
        $password = "";
        if ($opcLetra == TRUE)
            $listado .= $letras;
        if ($opcNumero == TRUE)
            $listado .= $numeros;
        if ($opcMayus == TRUE)
            $listado .= $letrasMayus;
        if ($opcEspecial == TRUE)
            $listado .= $especiales;

        for ($i = 1; $i <= $longitud; $i++) {
            $caracter = $listado[rand(0, strlen($listado) - 1)];
            $password .= $caracter;
            $listado = str_shuffle($listado);
        }
        return $password;
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

}
