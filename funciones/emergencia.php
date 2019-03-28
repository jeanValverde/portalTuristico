
<?php
include_once '../../models/Connection.php';
include_once '../../controllers/EmergenciaService.php';
include_once '../../models/Emergencia.php';

$servicio = new EmergenciaService();

$arrayEmergencia = $servicio->read_emergencias();

$form = "agregar";

$tiposEmergencia = array(
    "Salud" => "Salud",
    "Carabineros" => "Carabineros",
    "Bomberos" => "Bomberos",
);


if (isset($_GET["idEmergencia"])) {


    $form = "editar";
    $idEmergencia = $_GET["idEmergencia"];
    $emergencia = $servicio->read_emergencias_by_id($idEmergencia);
}
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
                <form action="<?php
                if ($form == "agregar") {
                    echo "../../funciones/addEmergencia.php";
                } else {
                    echo "../../funciones/editEmergencia.php";
                }
                ?>"  method="POST" id="formEmergencia" >
                    <h6 class="heading-small text-muted mb-4">Agrega o edita</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Tipo de emergencia</label>
                                    <select name="tipo" class="form-control" id="exampleForamControlSelect1">
                                        <option value="select" >Seleccione</option>
                                        <?php
                                        if (isset($emergencia)) {
                                             foreach ($tiposEmergencia as $tipo) {
                                                 if($tipo == $emergencia->getTipo()){
                                                      echo "<option value='$tipo' selected='true' >$tipo</option>";
                                                 }else{
                                                 echo "<option value='$tipo'>$tipo</option>";
                                                 
                                                 }
                                              }
                                        } else {
                                            if (isset($tiposEmergencia)) {
                                                foreach ($tiposEmergencia as $tipo) {
                                                    echo "<option value='$tipo'>$tipo</option>";
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Ubicacion</label>
                                    <input name="ubicacion" value="<?php
                                           if(isset($emergencia)){
                                               echo $emergencia->getUbicacion();
                                           }
                                           ?>" type="text" id="input-email" class="form-control form-control-alternative" placeholder="Samo Alto">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Numero telefonico</label>
                                    <input name="numero" value="<?php
                                    
                                    if(isset($emergencia)){
                                        echo $emergencia->getNumero();
                                    }
                                    
                                    ?>" type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="133">
                                </div>
                            </div>
                        </div>
                        <?php if (isset($emergencia)){?>
                        <input type="hidden" value="<?php if (isset($emergencia)){echo $emergencia->getIdEmergencia();} ?>" name="idEmergencia" />
                        <?php } ?>
                        
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
                    <tbody>
                        <?php while ($emergencia = array_shift($arrayEmergencia)) { ?>
                            <tr>
                                <td><?= $emergencia->getTipo(); ?></td>
                                <td><?= $emergencia->getUbicacion(); ?></td>
                                <td><?= $emergencia->getNumero(); ?></td>
                                <td>
                                    <a href="../admin/emergencia?idEmergencia=<?= $emergencia->getIdEmergencia(); ?>" class="btn btn-warning" >Editar</a>
                                    <a href="../../funciones/deleteEmergencia?idEmergencia=<?= $emergencia->getIdEmergencia(); ?>"   class="btn btn-danger" >Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</div>




<script>



    (function () {
        //Obtener el primer formulario cuyo name es form 
        var formulario = document.getElementById("formEmergencia");
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



        //cada vez que cambia algún input
        formulario.addEventListener("change", validar);
        //Evento de envio de formulario
        formulario.addEventListener("submit", validar);





    }());




</script>


