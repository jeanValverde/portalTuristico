<?php

include_once '../../models/Connection.php';
include_once '../../controllers/EmpresaService.php';
include_once '../../models/Empresa.php';

include_once '../../controllers/RecorridoService.php';
include_once '../../models/Recorrido.php';

$empresaService = new EmpresaService();
$arrayResultadosEmpresa = $empresaService->read_empresa();
$listaEmpresas = $arrayResultadosEmpresa;

$recorridoService = new RecorridoService();
$arrayRecorridos = $recorridoService->read_recorridos();

$formTransito = "agregar";

$formRecorrido = "agregar";

$localidades = array(
    "Las Breas" => "Las Breas",
    "El Bosque" => "El Bosque",
    "Lavaderos" => "Lavaderos",
    "El Chañar" => "El Chañar",
    "Hurtado" => "Hurtado",
    "Morrillos" => "Morrillos",
    "Seron" => "Seron",
    "Fundina" => "Fundina",
    "Pichasca" => "Pichasca",
    "San Pedro" => "San Pedro",
    "Parral" => "Parral",
    "El Espinal" => "El Espinal",
    "Samo Alto" => "Samo Alto",
    "Huampulla" => "Huampulla",
    "Tabaqueros" => "Tabaqueros",
    "Tahuinco" => "Tahuinco",
    "Algarrobos" => "Algarrobos",
    "Ovalle" => "Ovalle",
    "Sin Ruta" => "Sin Ruta"
);

$dias = array(
    "Lunes" => "Lunes",
    "Martes" => "Martes",
    "Miércoles" => "Miércoles",
    "Jueves" => "Jueves",
    "Viernes" => "Viernes",
    "Sábado" => "Sábado",
    "Domingo" => "Domingo"
);


if (isset($_GET["transporteAdd"])) {
    //true o false 

    if ($_GET["transporteAdd"] == 1) {
        $color = "success";
        $mensaje = "Exito";
        $icon = "ni ni-like-2";
    } else if ($_GET["transporteAdd"] == 2) {
        $color = "danger";
        $mensaje = "Error";
        $icon = "fas fa-times";
    } else if ($_GET["transporteAdd"] == 15) {
        $color = "danger";
        $mensaje = "Error, Debe eliminar todos los recorridos asociadosa a la empresa";
        $icon = "fas fa-times";
    }
}

if (isset($_GET["recorridoAdd"])) {
    //true o false 

    if ($_GET["recorridoAdd"] == 1) {
        $color = "success";
        $mensaje = "Exito";
        $icon = "ni ni-like-2";
    } else if ($_GET["recorridoAdd"] == 2) {
        $color = "danger";
        $mensaje = "Error";
        $icon = "fas fa-times";
    }
}


if (isset($_GET["editViews"])) {

    
    $editViews = $_GET["editViews"];
    if ($editViews == "transporte") {
        $formTransito = "editar";
        $idEmpresa = $_GET["idEmpresa"];
        $empresaView = $empresaService->read_empresa_by_id($idEmpresa);
    } else if ($editViews == "recorrido") {
        $formRecorrido = "editar";
        $idRecorrido = $_GET["idRecorrido"];
        $recorridoView = $recorridoService->read_recorrido_by_id($idRecorrido);
    }
}

?>


<div class="row">
    <div class="col-md-6">
        <div class="col-xl-12 order-xl-1">
            <?php if (isset($_GET["transporteAdd"])) { ?>
                <div class="alert <?= 'alert-' . $color . ' alert-dismissible fade show'?> " role="alert">
                    <span class="alert-inner--icon"><i class="<?= $icon ?>"></i></span>
                    <span class="alert-inner--text"><strong><?= $mensaje ?>!</strong></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Transportes</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="formTransisto"  method="POST" action="<?php
                    if ($formTransito == "agregar") {
                        echo "../../funciones/addEmpresa.php";
                    } else {
                        echo "../../funciones/editEmpresa.php";
                    }
                    ?>" >
                        <h6 class="heading-small text-muted mb-4">Agregar Empresa de Transpote</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Nombre</label>
                                        <input value="<?php
                                        if (isset($empresaView)) {
                                            echo $empresaView->getNombre();
                                        }
                                        ?>" name="nombre" type="text" id="input-emailsd" class="form-control form-control-alternative" placeholder="JyD">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Contacto</label>
                                        <input value="<?php
                                        if (isset($empresaView)) {
                                            echo $empresaView->getContacto();
                                        }
                                        ?>" name="contacto" type="number" id="input-email" class="form-control form-control-alternative" placeholder="945250210">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Direción</label>
                                        <input value="<?php
                                        if (isset($empresaView)) {
                                            echo $empresaView->getDireccion();
                                        }
                                        ?>" name="direccion" type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="Fundina" >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Cantidad vehículos</label>
                                        <input value="<?php
                                        if (isset($empresaView)) {
                                            echo $empresaView->getCantidadBuses();
                                        }
                                        ?>" name="vehiculos" type="number" id="input-last-name" class="form-control form-control-alternative" placeholder="2" >
                                    </div>
                                </div>
                            </div>
                            <div class="row"  >
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Ruta Inicio</label>
                                        <select name="rutainicio" class="form-control" id="exampleFormsControlSelect1">
                                            <option value="select" >Seleccione</option>
                                            <?php
                                            if (isset($empresaView)) {
                                                foreach ($localidades as $localidad) {
                                                    if ($localidad == $empresaView->getRutaInicio()) {
                                                        $ruta = $empresaView->getRutaInicio();
                                                        echo "<option value='$ruta' selected='true' >$ruta</option>";
                                                    } else {
                                                        echo "<option value='$localidad' >$localidad</option>";
                                                    }
                                                }
                                            } else {
                                                foreach ($localidades as $localidad) {
                                                    echo "<option value='$localidad' >$localidad</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Ruta Fin</label>
                                        <select name="rutafin" class="form-control" id="exampleFordfmControlSelect1">
                                            <option value="select" >Seleccione</option>
                                            <?php
                                            if (isset($empresaView)) {
                                                foreach ($localidades as $localidad) {
                                                    if ($localidad == $empresaView->getRutaFin()) {
                                                        $ruta = $empresaView->getRutaInicio();
                                                        echo "<option value='$ruta' selected='true' >$ruta</option>";
                                                    } else {
                                                        echo "<option value='$localidad' >$localidad</option>";
                                                    }
                                                }
                                            } else {
                                                foreach ($localidades as $localidad) {
                                                    echo "<option value='$localidad' >$localidad</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Tipo de transporte</label>
                                        <select name="tipo" class="form-control" id="exampleFormConsdsdtrolSelect1">
                                            <option value="select" >Seleccione</option>
                                            <option value="bus" <?php
                                            if (isset($empresaView)) {

                                                if ($empresaView->getTipo() == "bus") {
                                                    echo "selected='true'";
                                                }
                                            }
                                            ?> >Bus</option>
                                            <option value="colectivo" <?php
                                            if (isset($empresaView)) {

                                                if ($empresaView->getTipo() == "colectivo") {
                                                    echo "selected='true'";
                                                }
                                            }
                                            ?> >Colectivo</option>
                                            <option value="aseo" <?php
                                            if (isset($empresaView)) {

                                                if ($empresaView->getTipo() == "aseo") {
                                                    echo "selected='true'";
                                                }
                                            }
                                            ?> >Aseo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <?php
                                if ($formTransito == "agregar") {
                                    echo "Agregar empresa";
                                } else {
                                    echo "Editar empresa";
                                }
                                ?>
                            </button>
                            <input name="idEmpresa" type="hidden" value="<?php
                            if (isset($empresaView)) {
                                echo $empresaView->getId();
                            }
                            ?>" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- recorridos  --->
    <div class="col-md-6">
        <?php if (isset($_GET["recorridoAdd"])) { ?>
            <div class="alert <?= 'alert-' . $color . ' alert-dismissible fade show' ?> " role="alert">
                <span class="alert-inner--icon"><i class="<?= $icon ?>"></i></span>
                <span class="alert-inner--text"><strong><?= $mensaje ?>!</strong></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Recorridos</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="formRecorrido" method="POST" action="
                    <?php
                    if ($formRecorrido == "agregar") {
                        echo "../../funciones/addRecorrido.php";
                    } else {
                        echo "../../funciones/editRecorrido.php";
                    }
                    ?>" >
                        <h6 class="heading-small text-muted mb-4">
                             <?php
                                if ($formRecorrido == "agregar") {
                                    echo "Agregar recorrido";
                                } else {
                                    echo "Editar recorrido";
                                }
                                ?>
                        </h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Empresa</label>
                                        <select name="empresa" class="form-control" id="exampleFormControlSelec34t76">
                                            <option value="select" >Seleccione</option>
                                            <?php
                                            if (isset($recorridoView)) {
                                                while ($empresa = array_shift($listaEmpresas)) {
                                                    ?>
                                                    <?php if ($empresa->getTipo() != "colectivo") { ?>
                                                        <?php if ($recorridoView->getEmpresa()->getId() == $empresa->getId()) { ?>
                                                            <option value="<?= $empresa->getId(); ?>" selected="true" ><?= $empresa->getNombre(); ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?= $empresa->getId(); ?>" ><?= $empresa->getNombre(); ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php
                                                }
                                            } else {
                                                while ($empresa = array_shift($listaEmpresas)) {
                                                    ?>
                                                    <?php if ($empresa->getTipo() != "colectivo") { ?>
                                                        <option value="<?= $empresa->getId(); ?>" ><?= $empresa->getNombre(); ?></option>
                                                    <?php } ?>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Trayecto inicio</label>
                                        <select name="trayectoinicio" class="form-control" id="k2323j">
                                            <option value="select" >Seleccione</option>
                                            <?php
                                            if (isset($recorridoView)) {
                                                foreach ($localidades as $localidad) {
                                                    if ($recorridoView->getTrayectoInicio() == $localidad) {
                                                        $ruta = $recorridoView->getTrayectoInicio();
                                                        echo "<option value='$ruta' selected='true' >$ruta</option>";
                                                    } else {
                                                        echo "<option value='$localidad' >$localidad</option>";
                                                    }
                                                }
                                            } else {
                                                foreach ($localidades as $localidad) {
                                                    echo "<option value='$localidad' >$localidad</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Trayecto final</label>
                                        <select name="trayectofinal" class="form-control" id="exampleFormControlSelesdsdct091">
                                            <option value="select" >Seleccione</option>
                                            <?php
                                            if (isset($recorridoView)) {
                                                foreach ($localidades as $localidad) {
                                                    if ($recorridoView->getTrayectoFinal() == $localidad) {
                                                        $ruta = $recorridoView->getTrayectoFinal();
                                                        echo "<option value='$ruta' selected='true' >$ruta</option>";
                                                    } else {
                                                        echo "<option value='$localidad' >$localidad</option>";
                                                    }
                                                }
                                            } else {
                                                foreach ($localidades as $localidad) {
                                                    echo "<option value='$localidad' >$localidad</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Hora Salida</label>
                                        <input id="time" value="<?php if(isset($recorridoView)) { echo $recorridoView->getHoraSalida(); } ?>"   name="horasalida" type="text"  class="form-control floating-labe" placeholder="Hora salida" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="diarecorrido">Dia</label>
                                        <select name="dia" class="form-control" id="exampleFormsdsdControlSelect1">
                                            <option value="select" >Seleccione</option>
                                            <?php
                                            if (isset($recorridoView)) {
                                                foreach ($dias as $dia) {
                                                    if ($recorridoView->getDiaRecorrido() == $dia) {
                                                        echo "<option value='$dia' selected='true' >$dia</option>";
                                                    } else {
                                                        echo "<option value='$dia' >$dia</option>";
                                                    }
                                                }
                                            } else {
                                                foreach ($dias as $dia) {
                                                    echo "<option value='$dia' >$dia</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <?php
                                if ($formRecorrido == "agregar") {
                                    echo "Agregar recorrido";
                                } else {
                                    echo "Editar recorrido";
                                }
                                ?>
                            </button>
                            <input name="idRecorrido" type="hidden" value="<?php
                            if (isset($recorridoView)) {
                                echo $recorridoView->getIdRecorrido();
                            }
                            ?>" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 40px;" ></div>
<div class="row">
    <div class="card col-md-12">
        <div class="card-body table-responsive">
            <table id="emergencia" class="table align-items-center table-dark text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Transporte</th>
                        <th scope="col">Dia recorrido</th>
                        <th scope="col">Hora salida</th>
                        <th scope="col">Trayecto</th>
                        <th scope="col">Tipo transporte</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody  >
                    <?php while ($recorrido = array_shift($arrayRecorridos)) { ?>
                        <tr>
                            <th scope="row"class="text-center">
                                <div class="media align-items-center">
                                    <a href="#" class="avatar rounded-circle mr-3">
                                        <?php if ($recorrido->getEmpresa()->getTipo() == "bus") { ?>
                                            <img  alt="Image placeholder" src="../../assets-admin/img/theme/buses.png" >
                                        <?php } else if ($recorrido->getEmpresa()->getTipo() == "aseo") { ?>
                                            <img  alt="Image placeholder" src="../../assets-admin/img/theme/aseo.png" >
                                        <?php } else { ?>
                                            <img  alt="Image placeholder" src="../../assets-admin/img/theme/colectivos.png" >
                                        <?php } ?>
                                    </a>
                                    <div class="media-body">
                                        <span class="mb-0 text-sm"><?= $recorrido->getEmpresa()->getNombre(); ?></span>
                                    </div>
                                </div>
                            </th>
                            <td class="text-center" >
                                <?= $recorrido->getDiaRecorrido(); ?>
                            </td>
                            <td>
                                <span class="badge badge-dot mr-4">
                                    <i class="bg-warning"></i> <?= $recorrido->getHoraSalida(); ?>
                                </span>
                            </td>
                            <td>
                                <div class="avatar-group">
                                    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="<?= "Inicio en " . $recorrido->getTrayectoInicio(); ?>">

                                        <?php if ($recorrido->getEmpresa()->getTipo() == "bus") { ?>
                                            <img  alt="Image placeholder" src="../../assets-admin/img/theme/buses.png" class="rounded-circle">
                                        <?php } else if ($recorrido->getEmpresa()->getTipo() == "aseo") { ?>
                                            <img  alt="Image placeholder" src="../../assets-admin/img/theme/aseo.png" class="rounded-circle">
                                        <?php } else { ?>
                                            <img  alt="Image placeholder" src="../../assets-admin/img/theme/colectivos.png" class="rounded-circle">
                                        <?php } ?>
                                    </a>
                                    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="<?= "Destino " . $recorrido->getTrayectoFinal(); ?>">
                                        <img alt="Image placeholder" src="../../assets-admin/img/theme/destino.png" class="rounded-circle">
                                    </a>
                                </div>
                            </td>
                            <td class="text-center"  >
                                <?= $recorrido->getEmpresa()->getTipo(); ?>
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="../admin/transporte.php?editViews=recorrido&idRecorrido=<?= $recorrido->getIdRecorrido(); ?>">Editar</a>
                                        <a class="dropdown-item" href="../../funciones/deleteRecorrido.php?idRecorrido=<?= $recorrido->getIdRecorrido(); ?>">Eliminar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="row">
    <?php while ($empresa = array_shift($arrayResultadosEmpresa)) { ?>
        <!--Para cada fila-->
        <div class="col-md-4">
            <div style="height: 100px;;"></div>
            <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <?php if ($empresa->getTipo() == "bus") { ?>
                                        <img src="../../assets-admin/img/theme/buses.png" class="rounded-circle">
                                    <?php } else if ($empresa->getTipo() == "aseo") { ?>
                                        <img src="../../assets-admin/img/theme/aseo.png" class="rounded-circle">
                                    <?php } else { ?>
                                        <img src="../../assets-admin/img/theme/colectivos.png" class="rounded-circle">
                                    <?php } ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="../admin/transporte.php?editViews=transporte&idEmpresa=<?= $empresa->getId(); ?>" class="btn btn-sm btn-info mr-4">Editar</a>
                            <a href="../../funciones/deleteEmpresa.php?idEmpresa=<?= $empresa->getId(); ?>" class="btn btn-sm btn-default float-right">Eliminar</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">Recorridos</span>
                                    </div>
                                    <div>
                                        <span class="heading"><?= $empresa->getCantidadBuses(); ?></span>
                                        <span class="description">Buses</span>
                                    </div>
                                    <div>
                                        <span class="heading"><?= $empresa->getId(); ?></span>
                                        <span class="description">ID empresa</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                <?= $empresa->getNombre(); ?>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i><?= $empresa->getDireccion(); ?>
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i><?= $empresa->getRutaInicio(); ?> - <?= $empresa->getRutaFin(); ?>
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i><?= $empresa->getTipo(); ?>
                            </div>
                            <hr class="my-4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!--fin para cada fila-->
</div>


<script>



(function () {
    //Obtener el primer formulario cuyo name es form 
    var formulario = document.getElementById("formTransisto");
    var formularioRecorrido = document.getElementById("formRecorrido");
    /**
     * 
     * @param {Elements} rut
     * @returns Void - Cambia el valor del input del RUT por formato xx.xxx.xxx-x 
     */
    function formato_rut(rut)
    {
        rut.value = rut.value.replace(/[.-]/g, '')
                .replace(/^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4')
    }
    /*
     * 
     * @param {Elemnts} RUT
     * @returns TRUE (El rut ingresado es valido) / FALSE (El  rut es invalido)
     */
    function valida_Rut(Objeto) {
        var tmpstr = "";
        var intlargo = Objeto.value;
        if (intlargo.length > 0) {
            crut = Objeto.value;
            largo = crut.length;
            if (largo < 2) {
                Objeto.setCustomValidity('Rut inválido corto');
                //Objeto.focus();
                return false;
            }
            for (i = 0; i < crut.length; i++) {
                if (crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-')
                {
                    tmpstr = tmpstr + crut.charAt(i);
                }
            }
            rut = tmpstr;
            crut = tmpstr;
            largo = crut.length;
            if (largo > 2) {
                rut = crut.substring(0, largo - 1);
            } else {
                rut = crut.charAt(0);
            }
            dv = crut.charAt(largo - 1);
            if (rut == null || dv == null) {
                return 0;
            }
            ;
            var dvr = '0';
            suma = 0;
            mul = 2;
            for (i = rut.length - 1; i >= 0; i--)
            {
                suma = suma + rut.charAt(i) * mul;
                if (mul == 7) {
                    mul = 2;
                } else {
                    mul++;
                }
            }
            res = suma % 11;
            if (res == 1) {
                dvr = 'k';
            } else if (res == 0) {
                dvr = '0';
            } else {
                dvi = 11 - res;
                dvr = dvi + "";
            }
            if (dvr != dv.toLowerCase()) {
                Objeto.setCustomValidity("El Rut Ingreso es Invalido");
                Objeto.focus();
                return false;
            } else {
                Objeto.setCustomValidity('');
                return true;
            }
        }
    }
    /*
     * 
     * @param Elements elemento
     * @returns TRUE (correo valido) / FALSE (Correo invalido)
     */
    function validarEmail(elemento) {
        var texto = document.getElementById(elemento.id).value;
        var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if (!regex.test(texto)) {
            //correo invalido 
            return false;
        } else {
            //correo valido 
            return true;
        }
    }
    /*
     * 
     * @param Elements elemento
     * @returns TRUE (Campo VALIDO) / FALSE (campo vacio INVALIDO)
     */
    function validarVacio(elemento) {
        var texto = document.getElementById(elemento.id).value;
        texto = texto.trim();
        if (texto.length == 0 || texto == "") {
            //campo invalido 
            return false;
        } else {
            //campo valido 
            return true;
        }
    }
    /*
     * 
     * @param {Elements} elemento
     * @returns TRUE (Esta selecconado) / FALSE (Es invalido, no seleccionado)
     */
    function validadCheckbox(elemento) {
        var isChecked = elemento.checked;
        if (isChecked) {
            return true;
        } else {
            return false;
        }
    }
    /*
     * 
     * @param {String} e
     * @returns {Boolean} TRUE (Si es numero) / FALSE (Si no es numero)
     */
    function validarSiNumero(elemento) {
        var g = parseInt(elemento.value);
        if (Number.isInteger(g)) {
            return true;
        } else {
            return false;
        }
    }
    /*
     * 
     * @param {type} 
     * @returns {Valida todos los radio de un grupo}
     */
    function validarRadio() {
        var radios = new Array();
        for (var i = 0, max = formulario.elements.length; i < max; i++) {
            if (formulario.elements[i].type == "radio") {
                radios.push(formulario.elements[i].checked);
            }
        }
        var contador = 0;
        for (var i = 0, max = radios.length; i < max; i++) {
            if (radios[i] == true) {
                contador++;
            }
        }
        if (contador == 1) {
            return true;
        } else {
            return false;
        }
    }
    /* 
     * @param {Elemento} e
     * @returns {Boolean} TRUE (Si la contraseña es valida) / FALSE (Sino es validas)
     * La contraseña debe tener mínimo 6 caracteres, al menos una mayúscula, al menos una minúscula, al menos un número.  
     */
    function validarPassword(elemento) {
        var password = document.getElementById(elemento.id).value;
        if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}$/.test(password)) {
            return true;
        } else {
            return false;
        }
    }
    /*
     * 
     * @param {elementos} e , e2
     * @returns {Boolean} TRUE (iguales) / FALSE (Diferentes invalido)
     */
    function validar_igual_password(e) {
        var elemento = formulario.elements[objeterIndexPasswordValidar()];
        var elementoPass = formulario.elements[objeterIndexPasswordValidar() - 1];
        if (elemento.value == elementoPass.value) {
            formulario.elements[objeterIndexPasswordValidar()].setAttribute("class", "form-control is-valid");
        } else {
            formulario.elements[objeterIndexPasswordValidar()].setAttribute("class", "form-control is-invalid");
            e.preventDefault(e);
        }
    }
    /*
     * 
     * @param  
     * @returns {El index del segundo input password}
     */
    function objeterIndexPasswordValidar() {
        var indexs = new Array();
        for (var i = 0, max = formulario.elements.length; i < max; i++) {
            if (formulario.elements[i].type == "password") {
                //el siguiente es el que necesitamos 
                indexs.push(i);
            }
        }
        var numMax = 0;
        for (var i = 0, max = indexs.length; i < max; i++) {
            if (numMax < indexs[i])
            {
                numMax = indexs[i];
            }
        }
        return numMax;
    }
    /*
     * 
     * @param {type} 
     * @returns {Void} cambia la clase de los input tipo radio 
     */
    function quitarFormatoInvalid() {
        for (var i = 0, max = formulario.elements.length; i < max; i++) {
            if (formulario.elements[i].type == "radio") {
                //el siguiente es el que necesitamos 
                formulario.elements[i].setAttribute("class", "custom-control-input");
            }
        }
    }
    /*
     * 
     * @param {Elemento} e
     * @returns {Boolean} 
     * TRUE (Si el selecciono una opción / FALSE (No se selecciono ninguna opción valida)
     */
    function validarSelectOne(e, formulario) {
        var elemento = formulario.elements[e];
        if (elemento.value == "select") {
            return false;
        } else {
            return true;
        }
    }
    /*
     * 
     * @param {elemento} e
     * @returns {Boolean}
     * Archivo valido que tenga las extensiones .jpeg / .jpg / .png / .gif solamente.
     */
    function validarInputFile(elemento) {
        var filePath = elemento.value;
        var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
        if (!allowedExtensions.exec(filePath)) {
            elemento.value = '';
            return false;
        } else {
            //Image preview
            if (elemento.files && elemento.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('imagePreview').src = e.target.result;
                };
                reader.readAsDataURL(elemento.files[0]);
            }
            return true;
        }
    }

    /*
     * 
     * @param {type} e
     * @returns  void / Validar y recorrer input pot input y validarlos 
     */
    var validar = function (e) {
        for (var i = 0, max = formulario.elements.length; i < max; i++) {
            //tipo email validador 
            if (formulario.elements[i].type == "email") {
                //validar 
                if (validarEmail(formulario.elements[i])) {
                    formulario.elements[i].setAttribute("class", "form-control is-valid");
                } else {
                    formulario.elements[i].setAttribute("class", "form-control is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar Rut 
            if (formulario.elements[i].type == "text") {
                //validar vacios 
                if (validarVacio(formulario.elements[i])) {
                    formulario.elements[i].setAttribute("class", "form-control is-valid");
                    //validar rut 
                    //Solo cambiar el id por el id del rut de tu formulario
                    if (formulario.elements[i].id == "rut") {
                        if (valida_Rut(formulario.elements[i])) {
                            formulario.elements[i].setAttribute("class", "form-control is-valid");
                            formato_rut(formulario.elements[i]);
                        } else {
                            formulario.elements[i].setAttribute("class", "form-control is-invalid");
                            e.preventDefault(e);
                        }
                    }
                } else {
                    formulario.elements[i].setAttribute("class", "form-control is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar password
            if (formulario.elements[i].type == "password") {
                //validar si cumple con una contraseña segura 
                if (validarPassword(formulario.elements[i])) {
                    formulario.elements[i].setAttribute("class", "form-control is-valid");
                    validar_igual_password(e);
                } else {
                    formulario.elements[i].setAttribute("class", "form-control is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar radios
            if (formulario.elements[i].type == "radio") {
                //validar los radio button 
                if (validarRadio()) {
                    formulario.elements[i].setAttribute("class", "custom-control-input is-valid");
                } else {
                    formulario.elements[i].setAttribute("class", "custom-control-input is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar Checkbox
            if (formulario.elements[i].type == "checkbox") {
                if (validadCheckbox(formulario.elements[i])) {
                    formulario.elements[i].setAttribute("class", "custom-control-input is-valid");
                } else {
                    formulario.elements[i].setAttribute("class", "custom-control-input is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar select-one
            if (formulario.elements[i].type == "select-one") {
                if (validarSelectOne(i, formulario)) {
                    formulario.elements[i].setAttribute("class", "custom-select is-valid");
                } else {
                    formulario.elements[i].setAttribute("class", "custom-select is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar textarea
            if (formulario.elements[i].type == "textarea") {
                //validar vacios 
                if (validarVacio(formulario.elements[i])) {
                    formulario.elements[i].setAttribute("class", "form-control is-valid");
                } else {
                    formulario.elements[i].setAttribute("class", "form-control is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar number
            if (formulario.elements[i].type == "number") {
                //validar datos numeros 
                if (validarSiNumero(formulario.elements[i])) {
                    formulario.elements[i].setAttribute("class", "form-control is-valid");
                } else {
                    formulario.elements[i].setAttribute("class", "form-control is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar file
            if (formulario.elements[i].type == "file") {
                //validar ruta absoluta 
                if (validarInputFile(formulario.elements[i])) {
                    formulario.elements[i].setAttribute("class", "custom-file-input is-valid");
                } else {
                    formulario.elements[i].setAttribute("class", "custom-file-input is-invalid");
                    e.preventDefault(e);
                }
            }
        }
    };
    
    var validarR = function (e) {
        for (var i = 0, max = formularioRecorrido.elements.length; i < max; i++) {
            //tipo email validador 
            if (formularioRecorrido.elements[i].type == "email") {
                //validar 
                if (validarEmail(formularioRecorrido.elements[i])) {
                    formularioRecorrido.elements[i].setAttribute("class", "form-control is-valid");
                } else {
                    formularioRecorrido.elements[i].setAttribute("class", "form-control is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar Rut 
            if (formularioRecorrido.elements[i].type == "text") {
                //validar vacios 
                if (validarVacio(formularioRecorrido.elements[i])) {
                    formularioRecorrido.elements[i].setAttribute("class", "form-control is-valid");
                    //validar rut 
                    //Solo cambiar el id por el id del rut de tu formulario
                    if (formularioRecorrido.elements[i].id == "rut") {
                        if (valida_Rut(formularioRecorrido.elements[i])) {
                            formularioRecorrido.elements[i].setAttribute("class", "form-control is-valid");
                            formato_rut(formularioRecorrido.elements[i]);
                        } else {
                            formularioRecorrido.elements[i].setAttribute("class", "form-control is-invalid");
                            e.preventDefault(e);
                        }
                    }
                } else {
                    formularioRecorrido.elements[i].setAttribute("class", "form-control is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar password
            if (formularioRecorrido.elements[i].type == "password") {
                //validar si cumple con una contraseña segura 
                if (validarPassword(formularioRecorrido.elements[i])) {
                    formularioRecorrido.elements[i].setAttribute("class", "form-control is-valid");
                    validar_igual_password(e);
                } else {
                    formularioRecorrido.elements[i].setAttribute("class", "form-control is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar radios
            if (formularioRecorrido.elements[i].type == "radio") {
                //validar los radio button 
                if (validarRadio()) {
                    formularioRecorrido.elements[i].setAttribute("class", "custom-control-input is-valid");
                } else {
                    formularioRecorrido.elements[i].setAttribute("class", "custom-control-input is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar Checkbox
            if (formularioRecorrido.elements[i].type == "checkbox") {
                if (validadCheckbox(formularioRecorrido.elements[i])) {
                    formularioRecorrido.elements[i].setAttribute("class", "custom-control-input is-valid");
                } else {
                    formularioRecorrido.elements[i].setAttribute("class", "custom-control-input is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar select-one
            if (formularioRecorrido.elements[i].type == "select-one") {
                if (validarSelectOne(i, formularioRecorrido)) {
                    formularioRecorrido.elements[i].setAttribute("class", "custom-select is-valid");
                } else {
                    formularioRecorrido.elements[i].setAttribute("class", "custom-select is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar textarea
            if (formularioRecorrido.elements[i].type == "textarea") {
                //validar vacios 
                if (validarVacio(formularioRecorrido.elements[i])) {
                    formularioRecorrido.elements[i].setAttribute("class", "form-control is-valid");
                } else {
                    formulario.elements[i].setAttribute("class", "form-control is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar number
            if (formularioRecorrido.elements[i].type == "number") {
                //validar datos numeros 
                if (validarSiNumero(formularioRecorrido.elements[i])) {
                    formularioRecorrido.elements[i].setAttribute("class", "form-control is-valid");
                } else {
                    formularioRecorrido.elements[i].setAttribute("class", "form-control is-invalid");
                    e.preventDefault(e);
                }
            }
            //validar file
            if (formularioRecorrido.elements[i].type == "file") {
                //validar ruta absoluta 
                if (validarInputFile(formularioRecorrido.elements[i])) {
                    formularioRecorrido.elements[i].setAttribute("class", "custom-file-input is-valid");
                } else {
                    formularioRecorrido.elements[i].setAttribute("class", "custom-file-input is-invalid");
                    e.preventDefault(e);
                }
            }
        }
    };
    
    //cada vez que cambia algún input
    formulario.addEventListener("change", validar);
    //Evento de envio de formulario
    formulario.addEventListener("submit", validar);
    
    
    
    formularioRecorrido.addEventListener("change", validarR);
    formularioRecorrido.addEventListener("submit", validarR);
    
    
    
}());




</script>