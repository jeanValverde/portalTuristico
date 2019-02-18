
<?php
$tiposEmergencia = array(
    "Salud" => "Salud",
    "Carabineros" => "Carabineros",
    "Bomberos" => "Bomberos",
);
?>



<div class="row" >

    <div class="col-xl-6 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Emergencias</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <h6 class="heading-small text-muted mb-4">Agrega o edita</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Tipo de emergencia</label>
                                    <select name="rutafin" class="form-control" id="exampleFormControlSelect1">
                                        <option value="select" >Seleccione</option>
                                        <?php
                                        if (isset($tiposEmergencia)) {
                                            foreach ($tiposEmergencia as $tipo) {
                                                echo "<option value='$tipo'>$tipo</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Ubicacion</label>
                                    <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Numero telefonico</label>
                                    <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="Lucky">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" >Agregar</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0"   >

        <div class="card">
            <div class="card-body">
                <table class="table align-items-center table-dark" id="emergencia"  style="width:100%; ">
                    <thead class="thead-light" >
                        <tr><th>Tipo</th>
                            <th>Ubicación</th>
                            <th>Numero</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody   >
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>
                                <button class="btn btn-warning" >Editar</button>
                                <button class="btn btn-danger" >Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</div>



