<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RecorridoService
 *
 * @author jean
 */
class RecorridoService {

    //put your code here

    private $con;

    function __construct() {
        $this->con = new Connection();
    }

    /*
      private $trayectoInicio;
      private $trayectoFinal;
      private $horaSalida;
      private $diaRecorrido;
      private $empresa;
     */

    public function create_recorrido($trayectoInicio, $trayectoFinal, $horaSalida, $diaRecorrido, $empresa) {

        $sql = " INSERT INTO `riohurta_riohurtado`.`recorrido` (`trayecto_inicio`, `trayeto_final`, `hora_salida`, `dia_recorrido`, `id_empresaBus`)"
                . " VALUES ('$trayectoInicio', '$trayectoFinal', '$horaSalida', '$diaRecorrido', $empresa ); ";

        return $this->con->query($sql);
    }

    
    
    public function read_recorridos() {
        $recorridos = array();
        $recorrido = null;
        $sql = " SELECT id_recorrido , trayecto_inicio ,  trayeto_final , hora_salida, dia_recorrido, nombre , id_empresa , cantidad_buses , contacto, direccion, ruta_inicio , ruta_fin , tipo
                 FROM riohurta_riohurtado.recorrido r
                 join riohurta_riohurtado.empresa e on e.id_empresa = r.id_empresaBus; ";
        $result = $this->con->query($sql);
        while ($fila = mysqli_fetch_array($result)) {
            $recorrido = new Recorrido();
            $recorrido->setIdRecorrido($fila['id_recorrido']);
            $recorrido->setTrayectoInicio($fila["trayecto_inicio"]);
            $recorrido->setTrayectoFinal($fila["trayeto_final"]);
            $recorrido->setHoraSalida($fila["hora_salida"]);
            $recorrido->setDiaRecorrido($fila["dia_recorrido"]);
            $empresa = new Empresa();
            $empresa->setId($fila['id_empresa']);
            $empresa->setNombre($fila["nombre"]);$empresa->setTipo($fila["tipo"]);
            $recorrido->setEmpresa($empresa);
            array_push($recorridos, $recorrido);
        }
        return $recorridos;
    }
    
    public function read_recorridos_by_dia_actual() {
        
         date_default_timezone_set('America/Santiago');
        setlocale(LC_ALL, "es_ES");


        $day = jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m"), date("d"), date("Y")), 1);
        $dia = "Lunes";
        switch ($day) {
            case "Monday": $dia = "Lunes";
                break;
            case "Tuesday": $dia = "Martes";
                break;
            case "Wednesday": $dia = "Miercoles";
                break;
            case "Thursday": $dia = "Jueves";
                break;
            case "Friday": $dia = "Viernes";
                break;
            case "Saturday": $dia = "Saturday";
                break;
            case "Sunday": $dia = "Domingo";
        }
        
        $recorridos = array();
        $recorrido = null;
        $sql = " SELECT id_recorrido , trayecto_inicio ,  trayeto_final , hora_salida, dia_recorrido, nombre , id_empresa , cantidad_buses , contacto, direccion, ruta_inicio , ruta_fin , tipo
                 FROM riohurta_riohurtado.recorrido r
                 join riohurta_riohurtado.empresa e on e.id_empresa = r.id_empresaBus where dia_recorrido='$dia'  ; ";
        $result = $this->con->query($sql);
        while ($fila = mysqli_fetch_array($result)) {
            $recorrido = new Recorrido();
            $recorrido->setIdRecorrido($fila['id_recorrido']);
            $recorrido->setTrayectoInicio($fila["trayecto_inicio"]);
            $recorrido->setTrayectoFinal($fila["trayeto_final"]);
            $recorrido->setHoraSalida($fila["hora_salida"]);
            $recorrido->setDiaRecorrido($fila["dia_recorrido"]);
            $empresa = new Empresa();
            $empresa->setId($fila['id_empresa']);
            $empresa->setNombre($fila["nombre"]);$empresa->setTipo($fila["tipo"]);
            $recorrido->setEmpresa($empresa);
            array_push($recorridos, $recorrido);
        }
        return $recorridos;
    }
    
    
     public function read_recorridos_by_dia_trayecto($dia, $trayecto) {
        $recorridos = array();
        $recorrido = null;
        $sql = "";
        if($trayecto == "All"){
             $sql = " SELECT id_recorrido , trayecto_inicio ,  trayeto_final , hora_salida, dia_recorrido, nombre , id_empresa , cantidad_buses , contacto, direccion, ruta_inicio , ruta_fin , tipo
                 FROM riohurta_riohurtado.recorrido r
                 join riohurta_riohurtado.empresa e on e.id_empresa = r.id_empresaBus  where dia_recorrido='$dia'  and trayecto_inicio NOT LIKE 'Ovalle' ";
        }else{
             $sql = " SELECT id_recorrido , trayecto_inicio ,  trayeto_final , hora_salida, dia_recorrido, nombre , id_empresa , cantidad_buses , contacto, direccion, ruta_inicio , ruta_fin , tipo
                 FROM riohurta_riohurtado.recorrido r
                 join riohurta_riohurtado.empresa e on e.id_empresa = r.id_empresaBus  where dia_recorrido='$dia' and trayecto_inicio='Ovalle' ";
        }
       
        $result = $this->con->query($sql);
        while ($fila = mysqli_fetch_array($result)) {
            $recorrido = new Recorrido();
            $recorrido->setIdRecorrido($fila['id_recorrido']);
            $recorrido->setTrayectoInicio($fila["trayecto_inicio"]);
            $recorrido->setTrayectoFinal($fila["trayeto_final"]);
            $recorrido->setHoraSalida($fila["hora_salida"]);
            $recorrido->setDiaRecorrido($fila["dia_recorrido"]);
            $empresa = new Empresa();
            $empresa->setId($fila['id_empresa']);
            $empresa->setNombre($fila["nombre"]);$empresa->setTipo($fila["tipo"]);
            $recorrido->setEmpresa($empresa);
            array_push($recorridos, $recorrido);
        }
        return $recorridos;
    }

    public function read_recorrido_by_id($idRecorrido) {

        $sql = " SELECT id_recorrido , trayecto_inicio, trayeto_final, hora_salida, dia_recorrido, id_empresaBus "
                . "FROM riohurta_riohurtado.recorrido WHERE id_recorrido = $idRecorrido;  ";
        $result = $this->con->query($sql);
        $fila = mysqli_fetch_array($result);
        $recorrido = new Recorrido();
        $recorrido->setIdRecorrido($fila['id_recorrido']);
        $recorrido->setTrayectoInicio($fila["trayecto_inicio"]);
        $recorrido->setTrayectoFinal($fila["trayeto_final"]);
        $recorrido->setHoraSalida($fila["hora_salida"]);
        $recorrido->setDiaRecorrido($fila["dia_recorrido"]);
        $empresa = new Empresa();
        $empresa->setId($fila['id_empresaBus']);
        $recorrido->setEmpresa($empresa);
        return $recorrido;
    }

    public function update_recorrido($idRecorrido, $trayectoInicio, $trayectoFinal, $horaSalida, $diaRecorrido, $empresa) {

        $sql = " UPDATE riohurta_riohurtado.recorrido 
                SET trayecto_inicio='$trayectoInicio',
                trayeto_final='$trayectoFinal', 
                hora_salida='$horaSalida', 
                dia_recorrido='$diaRecorrido', 
                id_empresaBus='$empresa'
                WHERE id_recorrido=$idRecorrido; ";

        return $this->con->query($sql);
    }

    public function delete_recorrido($idRecorrido) {
        $sql = " DELETE FROM riohurta_riohurtado.recorrido WHERE id_recorrido = $idRecorrido; ";
        return $this->con->query($sql);
    }

    public function obtener_recorrido_proximo($localidadPunto) {
        date_default_timezone_set('America/Santiago');
        setlocale(LC_ALL, "es_ES");


        $day = jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m"), date("d"), date("Y")), 1);
        $dia = "Lunes";
        switch ($day) {
            case "Monday": $dia = "Lunes";
                break;
            case "Tuesday": $dia = "Martes";
                break;
            case "Wednesday": $dia = "Miercoles";
                break;
            case "Thursday": $dia = "Jueves";
                break;
            case "Friday": $dia = "Viernes";
                break;
            case "Saturday": $dia = "Saturday";
                break;
            case "Sunday": $dia = "Domingo";
        }

        $recorridos = array();
        $recorrido = null;
        $sql = " SELECT id_recorrido , trayecto_inicio ,  trayeto_final , hora_salida, dia_recorrido, nombre , id_empresa , cantidad_buses , contacto, direccion, ruta_inicio , ruta_fin , tipo
                 FROM riohurta_riohurtado.recorrido r
                 join riohurta_riohurtado.empresa e on e.id_empresa = r.id_empresaBus where dia_recorrido = '$dia' and tipo = 'bus';  ";
        $result = $this->con->query($sql);


        while ($fila = mysqli_fetch_array($result)) {
            $recorrido = new Recorrido();
            $recorrido->setIdRecorrido($fila['id_recorrido']);
            $recorrido->setTrayectoInicio($fila["trayecto_inicio"]);
            $recorrido->setTrayectoFinal($fila["trayeto_final"]);
            $recorrido->setHoraSalida($fila["hora_salida"]);
            $recorrido->setDiaRecorrido($fila["dia_recorrido"]);
            if ($fila['trayecto_inicio'] == "Fundina" ||
                    $fila['trayecto_inicio'] == "Pichasca" ||
                    $fila['trayecto_inicio'] == "San Pedro" ||
                    $fila['trayecto_inicio'] == "El Espinal" ||
                    $fila['trayecto_inicio'] == "Samo Alto" ||
                    $fila['trayecto_inicio'] == "Huampulla" ||
                    $fila['trayecto_inicio'] == "Tabaqueros" ||
                    $fila['trayecto_inicio'] == "Algarrobos"
            ) {
                $recorrido->setZona("baja");
            } else {
                $recorrido->setZona("alta");
            }
            $empresa = new Empresa();
            $empresa->setId($fila['id_empresa']);
            $empresa->setRutaInicio($fila['ruta_inicio']);
            $empresa->setNombre($fila["nombre"]);
            $empresa->setContacto($fila['contacto']);
            $recorrido->setEmpresa($empresa);
            array_push($recorridos, $recorrido);
        }



        foreach ($recorridos as $recorrido) {
            $hora = $recorrido->getHoraSalida()[0] . $recorrido->getHoraSalida()[1] . $recorrido->getHoraSalida()[3] . $recorrido->getHoraSalida()[4];
            $recorrido->setHoraSalida($hora);
        }

        $fecha = getdate();

        $hora = $fecha["hours"] . $fecha["minutes"];

        $recorridosHoras = array();
        foreach ($recorridos as $recorrido) {
            $datoH = $hora - 100;
            if ($datoH < $recorrido->getHoraSalida()) {
                array_push($recorridosHoras, $recorrido);
            }
        }


        //calcular distacia entre pueblos en minutos 

        $recorridosLocalidaddes = array();
        foreach ($recorridosHoras as $recorrido) {
            if ($recorrido->getTrayectoInicio() != "Ovalle") {
                //separar por zona baja o alta 
                array_push($recorridosLocalidaddes, $recorrido);
            }
        }


        $zonaBusqueda = "baja";

        if ($localidadPunto == "Las Breas" ||
                $localidadPunto == "El Bosque" ||
                $localidadPunto == "Lavaderos" ||
                $localidadPunto == "El Chañar" ||
                $localidadPunto == "Hurtado" ||
                $localidadPunto == "Morrillos" ||
                $localidadPunto == "Seron" ) {
            $zonaBusqueda = "alta";
        }

        $recorridosLocales = array();
        
        if ($zonaBusqueda == "alta") {
            foreach ($recorridosLocalidaddes as $recorrido) {
                if ($recorrido->getZona() == "alta" & $recorrido->getZona() == $zonaBusqueda) {
                    array_push($recorridosLocales, $recorrido);
                }
            }
        } else {
            foreach ($recorridosLocalidaddes as $recorrido) {
                     array_push($recorridosLocales, $recorrido);
            }
        }

        $recorridosHoraLlegada = array();
        foreach ($recorridosLocales as $recorrido) {

            if ($recorrido->getZona() == "baja") {
                $suma = $recorrido->getHoraSalida();
                //arreglar
                if ($localidadPunto == "Fundina") {
                    $suma = $suma + 0;
                } else if ($localidadPunto == "Pichasca") {
                    $suma = $suma + 10;
                } else if ($localidadPunto == "Espinal") {
                    $suma = $suma + 13;
                } else if ($localidadPunto == "Samo Alto") {
                    $suma = $suma + 30;
                } else if ($localidadPunto == "Huampulla") {
                    $suma = $suma + 40;
                } else if ($localidadPunto == "Tabaqueros") {
                    $suma = $suma + 50;
                } else if ($localidadPunto == "Algarrobos") {
                    $suma = $suma + 60;
                }

                //descomponer 
                $finalN = strlen($suma) - 1;

                $menosFin = $finalN - 1;

                $suma = $suma . "";

                $numeroMin = $suma[$menosFin] . $suma[$finalN];


                if ($numeroMin > 60) {
                    $suma = $suma + 40;
                }
                
                if($suma > 2400){
                    $suma = $suma - 2400;
                }

                $recorrido->setHoraLlegada($suma);

                $hora = $recorrido->getHoraSalida()[0] . $recorrido->getHoraSalida()[1] . ":" . $recorrido->getHoraSalida()[2] . $recorrido->getHoraSalida()[3];

                $recorrido->setHoraSalida($hora);

                array_push($recorridosHoraLlegada, $recorrido);
            } else {
                $suma = $recorrido->getHoraSalida();
                //arreglar
                if ($localidadPunto == "Las Breas") {
                    $suma = $suma + 0;
                } else if ($localidadPunto == "El Bosque") {
                    $suma = $suma + 10;
                } else if ($localidadPunto == "Lavaderos") {
                    $suma = $suma + 20;
                } else if ($localidadPunto == "El Chañar") {
                    $suma = $suma + 40;
                } else if ($localidadPunto == "Hurtado") {
                    $suma = $suma + 50;
                } else if ($localidadPunto == "Morrillos") {
                    $suma = $suma + 60;
                } else if ($localidadPunto == "Seron") {
                    $suma = $suma + 70;
                }if ($localidadPunto == "Fundina") {
                    $suma = $suma + 80;
                } else if ($localidadPunto == "Pichasca") {
                    $suma = $suma + 90;
                } else if ($localidadPunto == "Espinal") {
                    $suma = $suma + 93;
                } else if ($localidadPunto == "Samo Alto") {
                    $suma = $suma + 100;
                } else if ($localidadPunto == "Huampulla") {
                    $suma = $suma + 110;
                } else if ($localidadPunto == "Tabaqueros") {
                    $suma = $suma + 120;
                } else if ($localidadPunto == "Algarrobos") {
                    $suma = $suma + 130;
                }

                //descomponer 
                $finalN = strlen($suma) - 1;

                $menosFin = $finalN - 1;

                $suma = $suma . "";

                $numeroMin = $suma[$menosFin] . $suma[$finalN];


                if ($numeroMin > 60) {
                    $suma = $suma + 40;
                }

                $recorrido->setHoraLlegada($suma);

                $hora = $recorrido->getHoraSalida()[0] . $recorrido->getHoraSalida()[1] . ":" . $recorrido->getHoraSalida()[2] . $recorrido->getHoraSalida()[3];

                $recorrido->setHoraSalida($hora);

                array_push($recorridosHoraLlegada, $recorrido);
            }
        }
        
        
     

        return $recorridosHoraLlegada;
    }

}
