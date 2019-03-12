
<?php 

$form = "agregar";

include_once '../../models/Connection.php';
include_once '../../controllers/TurismoService.php';
include_once '../../models/Turismo.php';

$service = new TurismoService();

$turismos = $service->read_turismos_by_tipo("cajaVecina"); 



if (isset($_GET['idTurismo'])) {

    $form = "editar";
    $cajaVecina = $service->read_turismo_by_id($_GET['idTurismo']);
    
}


?>

<div class="row" >

    <div class="col-xl-5 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Caja Vecina</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php
                if ($form == "agregar") {
                    echo "../../funciones/addTurismo.php";
                } else {
                    echo "../../funciones/editTurismo.php";
                }
                ?>"  method="POST" id="formEmergencia" >
                    <h6 class="heading-small text-muted mb-4">Agrega o edita</h6>
                    <div class="pl-lg-4">
                        <input type="hidden" name="tipo" value="cajaVecina" />
                        <input  type="hidden" name="paginaActiva" value="<?= $paginaActiva ?>" />
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Nombre</label>
                                    <input name="nombre" value="<?php
                                    
                                    if(isset($cajaVecina)){
                                        echo $cajaVecina->getNombre();
                                    }
                                    
                                    ?>" type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="Minimarket">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Localidad</label>
                                    <input name="localidad" value="<?php
                                           if(isset($cajaVecina)){
                                               echo $cajaVecina->getLocalidad();
                                           }
                                           ?>" type="text" id="input-email" class="form-control form-control-alternative" placeholder="Samo Alto">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Link Mapa</label>
                                    <textarea name="mapa" value="" rows="6"  id="input-first-name" class="form-control form-control-alternative" placeholder="https://www.google.com/maps/place/Minimarket+EL+AGRADO/@-30.4080404,-70.9468803,989m/data=!3m1!1e3!4m13!1m7!3m6!1s0x968fc4bd40e951c3:0x66c88b5a849d6c45!2sSamo+Alto,+R%C3%ADo+Hurtado,+Regi%C3%B3n+de+Coquimbo!3b1!8m2!3d-30.408194!4d-70.9367848!3m4!1s0x968fc59c627be4d5:0xaa774e3bb7255fcb!8m2!3d-30.4089017!4d-70.9460237"><?php
                                    if(isset($cajaVecina)){
                                        echo $cajaVecina->getMapa();
                                    }?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Latitud</label>
                                    <input name="latitud" value="<?php
                                    
                                    if(isset($cajaVecina)){
                                        echo $cajaVecina->getLatitud();
                                    }
                                    
                                    ?>" type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="-2266235452">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Longitud</label>
                                    <input name="longitud" value="<?php
                                           if(isset($cajaVecina)){
                                               echo $cajaVecina->getLongitud();
                                           }
                                           ?>" type="text" id="input-email" class="form-control form-control-alternative" placeholder="-73351235112">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="<?php if (isset($cajaVecina)){echo $cajaVecina->getIdTurismo();} ?>" name="idTurismo" />
                        <button type="submit" class="btn btn-primary" ><?= $form  ?></button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="col-xl-7 order-xl-2 mb-5 mb-xl-0"   >

        <div class="card">
            <div class="card-body">
                <table class="table table-responsive align-items-center table-dark" id="emergencia"  style="width:100%; ">
                    <thead class="thead-light" >
                        <tr><th>Nombre</th>
                            <th>Localidad</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($turismos)){ while ($turismo = array_shift($turismos)) { ?>
                            <tr>
                                <td><?= $turismo->getNombre(); ?></td>
                                <td><?= $turismo->getLocalidad(); ?></td>
                                <td><?= $turismo->getLatitud(); ?></td>
                                <td><?= $turismo->getLongitud(); ?></td>
                                <td>
                                    <a href="../admin/cajaVecina?idTurismo=<?= $turismo->getIdTurismo(); ?>" class="btn btn-warning" >Editar</a>
                                    <a href="../../funciones/deleteTurismo.php?idTurismo=<?= $turismo->getIdTurismo(); ?>&paginaActiva=<?= $paginaActiva ?>"   class="btn btn-danger" >Eliminar</a>
                                    <a href="<?= $turismo->getMapa(); ?>" target="_black"   class="btn btn-success" >Mapa</a>
                                </td>
                            </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</div>