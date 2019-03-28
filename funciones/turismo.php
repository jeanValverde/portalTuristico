<?php
include_once '../../models/Connection.php';
include_once '../../controllers/TurismoService.php';
include_once '../../models/Turismo.php';

$servicio = new TurismoService();


if ($tipo == "actividad") {

    $tipos = array("Festival", "Artesanal", "Otro");

    $turismos = $servicio->read_turismos_by_tipos($tipos);

    $turismoMax = $servicio->read_turismos_by_max_id_tipos($tipos);
    
} else if ($tipo == "atractivo") {
    
    $tipos = array( "Ruta", "Monumento Natural");

    $turismos = $servicio->read_turismos_by_tipos($tipos);

    $turismoMax = $servicio->read_turismos_by_max_id_tipos($tipos);
    
    
} else {

    $turismoMax = $servicio->read_turismos_by_max_id($tipo);
    $turismos = $servicio->read_turismos_by_tipo($tipo);
    
}




$form = "agregar";

if (isset($_GET['views'])) {

    $turismoMax = $servicio->read_turismo_by_id($_GET['views']);
}


if (isset($_GET['idTurismo'])) {
    $form = "editar";
    $turismoEdit = $servicio->read_turismo_by_id($_GET['idTurismo']);
}
?>

<div class="row">
    <?php if (!empty($turismos)) { ?>
        <div class="col-xl-4" >
            <div class="alert alert-default" role="alert">
                <strong>Vista previa</strong>  
                <nav aria-label="...">
                    <br/>
                    <div class="row"  >
                        <?php
                        while ($turismo = array_shift($turismos)) {
                            ?>
                        <a  href="../admin/<?= $paginaActiva ?>?views=<?= $turismo->getIdTurismo(); ?>" class="badge badge-danger text-white mt-2" ><?= $turismo->getNombre() ?></a> &nbsp;&nbsp;
                            
                        <?php } ?>
                    </div>
                </nav>
            </div>
            <div style="height: 20px;" ></div>
            <div class="row" >
                <div class="col-lg-12">

                    <div class="card card-lift--hover shadow border-0 text-justify ">
                        <br/>
                        <div class="row" >
                            <div class="col-md-12 text-center" >
                                <?php
                                $img1 = $turismoMax->getFoto1();
                                if ($img1 != "") {
                                    ?>
                                    <img src="<?php echo '../../funciones/imgTurismo/' . $img1; ?>" alt="..." style="width: 30%;" >
                                <?php } ?>
                                <?php
                                $img2 = $turismoMax->getFoto2();
                                if ($img2 != "") {
                                    ?>
                                    <img src="<?php echo '../../funciones/imgTurismo/' . $img2; ?>" alt="..." style="width: 30%;" >
                                <?php } ?>
                                <?php
                                $img3 = $turismoMax->getFoto3();
                                if ($img3 != "") {
                                    ?>
                                    <img src="<?php echo '../../funciones/imgTurismo/' . $img3; ?>" alt="..." style="width: 30%;" >
                                <?php } ?>
                            </div>
                        </div>
                        <br/>
                        <div id="map-6" class="card-img-top" style="height: 200px;"></div>
                        <div class="card-body text-center">
                            
                            <h3 class="text-primary text-uppercase text-justify"><?= $turismoMax->getNombre() ?></h3>
                            <p class="description text-justify"><?= $turismoMax->getDescripcion() ?></p>

                            <span class="badge badge-success"><?= 'Contacto: ' . $turismoMax->getContacto(); ?></span>
                            
                            <span   class="badge badge-info"><?= 'Tipo: ' .  $turismoMax->getTipo() ?></span>
                            
                            <span class="badge badge-danger"><?= 'Fono: ' . $turismoMax->getFono(); ?></span>
                            <br/><br/>
                            <?php if ($turismoMax->getFacebook() != "") { ?>
                                <a href="#facebook" class="btn btn-icon btn-2 btn-primary" >
                                    <span class="btn-inner--icon"><i class="ni ni-facebook"></i>Facebook: <?= $turismoMax->getFacebook(); ?></span>
                                </a>
                            <?php } ?>
                            <?php if ($turismoMax->getTwiter() != "") { ?>
                                <a href="#twiter"  class="btn btn-icon btn-2 btn-info" >
                                    <span class="btn-inner--icon"><i class="ni ni-"></i>Twitter <?= $turismoMax->getTwiter(); ?></span>
                                </a>
                            <?php } ?>
                            <?php if ($turismoMax->getInstagram() != "") { ?>
                                <br><br>
                                <a href="#instagram"  class="btn btn-icon btn-2 btn-danger" >
                                    <span class="btn-inner--icon"><i class="ni ni-"></i>Instagram <?= $turismoMax->getInstagram(); ?></span>
                                </a>
                            <?php } ?>
                            <?php if ($turismoMax->getPagina() != "") { ?>
                                <a href="#pagina"  class="btn btn-icon btn-2 btn-warning" >
                                    <span class="btn-inner--icon">Web <?= $turismoMax->getPagina(); ?></span>
                                </a>
                            <?php } ?>
                            <br><br>
                            <hr class="my-4">
                            <a href="../admin/<?= $paginaActiva ?>?idTurismo=<?= $turismoMax->getIdTurismo(); ?>" class="btn btn-warning">Editar</a>
                            <a href="../../funciones/deleteTurismo.php?idTurismo=<?= $turismoMax->getIdTurismo(); ?>&paginaActiva=<?= $paginaActiva ?>" class="btn btn-danger">Elminar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="height: 50px;" ></div>
        </div>

    <?php } ?>

    <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Turismo</h3>
                    </div>
                    <div class="col-4 text-right">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="formNoticia"  enctype="multipart/form-data" method="POST" action="
                <?php
                if ($form == "agregar") {
                    echo "../../funciones/addTurismo.php";
                } else {
                    echo "../../funciones/editTurismo.php";
                }
                ?>"  >
                    <h6 class="heading-small text-muted mb-4"><?= $tipo ?></h6>
                    <input name="paginaActiva" value="<?= $paginaActiva ?>" type="hidden"  />
                    <div class="pl-lg-4">
                        <div class="row">
                            <?php if ($tipo == "actividad" || $tipo == "atractivo") { ?>
                                
                                <div class="col-md-3" >
                                    <div class="form-group">
                                        <label for="tipo">Tipos</label>
                                        <select <?php if(isset($turismoEdit)){ echo "disabled"; } ?> name="tipo" class="form-control" id="tipo">
                                            <option value="select" >Seleccione</option>
                                            <?php
                                            if (isset($turismoEdit)) {
                                                foreach ($tipos as $tipoOpt) {
                                                    if ($tipoOpt == $turismoEdit->getTipo()) {
                                                        echo "<option value='$tipoOpt' selected='true' >$tipoOpt</option>";
                                                    } else {
                                                        echo "<option value='$tipoOpt'>$tipoOpt</option>";
                                                    }
                                                }
                                            } else {
                                                if (isset($tipos)) {
                                                    foreach ($tipos as $tipoOpt) {
                                                        echo "<option value='$tipoOpt'>$tipoOpt</option>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            
                            <?php if(isset($turismoEdit)){ ?>
                            <input type="hidden" name="tipo" value="<?= $turismoEdit->getTipo() ?>" />
                            <?php } ?>
                            
                            


                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-username">Nombre</label>
                                        <input name="nombre" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Nombre" value="<?php
                                        if (isset($turismoEdit)) {
                                            echo $turismoEdit->getNombre();
                                        }
                                        ?>">
                                    </div>
                                </div>

                            <?php } else { ?>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-username">Nombre</label>
                                        <input name="nombre" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Noticia" value="<?php
                                        if (isset($turismoEdit)) {
                                            echo $turismoEdit->getNombre();
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <input name="tipo" value="<?= $tipo ?>" type="hidden"  />
                            <?php } ?>

                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Contacto</label>
                                    <input name="contacto" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Noticia" value="<?php
                                    if (isset($turismoEdit)) {
                                        echo $turismoEdit->getContacto();
                                    }
                                    ?>">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Fono</label>
                                    <input name="fono" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Noticia" value="<?php
                                    if (isset($turismoEdit)) {
                                        echo $turismoEdit->getFono();
                                    }
                                    ?>">
                                </div>
                            </div>

                        </div>
                    </div>

                    <hr class="my-4">
                    <!-- Description -->
                    <h6 class="heading-small text-muted mb-4">Descripción</h6>
                    <div class="pl-lg-4">
                        <div class="form-group focused">
                            <label>Descripción</label>
                            <textarea name="descripcion" rows="4" class="form-control form-control-alternative"  id="exampleFormControlTextarea1"  placeholder="A few words about you ..."><?php
                                if (isset($turismoEdit)) {
                                    echo $turismoEdit->getDescripcion();
                                }
                                ?></textarea>
                        </div>
                    </div>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Latitud</label>
                                    <input name="latitud" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Noticia" value="<?php
                                    if (isset($turismoEdit)) {
                                        echo $turismoEdit->getLatitud();
                                    }
                                    ?>">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Longitud</label>
                                    <input name="longitud" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Noticia" value="<?php
                                    if (isset($turismoEdit)) {
                                        echo $turismoEdit->getLongitud();
                                    }
                                    ?>">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Mapa</label>
                                    <input name="mapa" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Noticia" value="<?php
                                    if (isset($turismoEdit)) {
                                        echo $turismoEdit->getMapa();
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Localidad</label>
                                    <input name="localidad" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Noticia" value="<?php
                                    if (isset($turismoEdit)) {
                                        echo $turismoEdit->getLocalidad();
                                    }
                                    ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <!-- Redes Sociales -->
                    <h6 class="heading-small text-muted mb-4">Redes Sociales</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Facebook</label>
                                    <input name="facebook" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Noticia" value="<?php
                                    if (isset($turismoEdit)) {
                                        echo $turismoEdit->getFacebook();
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Instragram</label>
                                    <input name="instagram" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Noticia" value="<?php
                                    if (isset($turismoEdit)) {
                                        echo $turismoEdit->getInstagram();
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Twiter</label>
                                    <input name="twiter" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Noticia" value="<?php
                                    if (isset($turismoEdit)) {
                                        echo $turismoEdit->getTwiter();
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Link Página Personal</label>
                                    <input name="pagina" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Noticia" value="<?php
                                    if (isset($turismoEdit)) {
                                        echo $turismoEdit->getPagina();
                                    }
                                    ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Imagenes <small id="fileHelp" class="form-text text-muted">Suba el archivo que tenga las extensiones .jpeg / .jpg / .png / .gif solamente.</small></h6>
                    <div class="pl-lg-4">
                        <div class="row" >
                            <div class="col-md-4" >
                                <div class="custom-file">
                                    <input name="foto1"  type="file" class="custom-file-input" id="foto1" lang="es" >
                                    <label class="custom-file-label" for="validatedCustomFile">Subir</label>

                                    <?php if (!isset($turismoEdit)) { ?>
                                        <div class="valid-feedback">
                                            Se ve bien!
                                        </div>
                                        <div class="invalid-feedback">
                                            Debes ingresar una imagen.
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="custom-file">
                                    <input name="foto2"  type="file" class="custom-file-input" id="foto2" lang="es" >
                                    <label class="custom-file-label" for="validatedCustomFile">Subir</label>

                                    <?php if (!isset($turismoEdit)) { ?>
                                        <div class="valid-feedback">
                                            Se ve bien!
                                        </div>
                                        <div class="invalid-feedback">
                                            Debes ingresar una imagen.
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="custom-file">
                                    <input name="foto3"  type="file" class="custom-file-input" id="foto3" lang="es" >
                                    <label class="custom-file-label" for="validatedCustomFile">Subir</label>

                                    <?php if (!isset($turismoEdit)) { ?>
                                        <div class="valid-feedback">
                                            Se ve bien!
                                        </div>
                                        <div class="invalid-feedback">
                                            Debes ingresar una imagen.
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>

                        <br/>
                        <div class="row" >

                            <div class="col-md-4 text-center" >
                                <img id="imagePreview1" src="<?php
                                if (isset($turismoEdit)) {
                                    echo '../../funciones/imgTurismo/' . $turismoEdit->getFoto1();
                                } else {
                                    echo "../assets/img/theme/isologotipo_full_color.png";
                                }
                                ?>" alt="" class="" style="height: 150px;" >
                            </div>


                            <div class="col-md-4 text-center" >
                                <img id="imagePreview2" src="<?php
                                if (isset($turismoEdit)) {
                                    echo '../../funciones/imgTurismo/' . $turismoEdit->getFoto2();
                                } else {
                                    echo "../assets/img/theme/isologotipo_full_color.png";
                                }
                                ?>" alt="" class="" style="height: 150px;" >
                            </div>

                            <div class="col-md-4 text-center" >
                                <img id="imagePreview3" src="<?php
                                if (isset($turismoEdit)) {
                                    echo '../../funciones/imgTurismo/' . $turismoEdit->getFoto3();
                                } else {
                                    echo "../assets/img/theme/isologotipo_full_color.png";
                                }
                                ?>" alt="" class="" style="height: 150px;" >
                            </div>

                        </div>
                        <?php if (isset($turismoEdit)) { ?>
                            <input name="idTurismo" value="<?= $turismoEdit->getIdTurismo() ?>" type="hidden"  />
                        <?php } ?>
                        <br/>
                        <br/>
                        <button type="submit" class="btn btn-primary" ><?= $form ?></button>
                    </div>


                </form>
            </div>
        </div>
    </div>



</div>




<script>



    (function () {
        //Obtener el primer formulario cuyo name es form 
        var formulario = document.getElementById("formNoticia");
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
        function validarInputFile(elemento, imagePreview) {
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
                        imagePreview.src = e.target.result;
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



            }



            var fotoUno = document.getElementById('foto1');
            var imagePreviewUno = document.getElementById('imagePreview1');
            var r1 = validarInputFile(fotoUno, imagePreviewUno);

            var fotoUno = document.getElementById('foto2');
            var imagePreviewUno = document.getElementById('imagePreview2');
            var r2 = validarInputFile(fotoUno, imagePreviewUno);

            var fotoUno = document.getElementById('foto3');
            var imagePreviewUno = document.getElementById('imagePreview3');
            var r3 = validarInputFile(fotoUno, imagePreviewUno);




        };



        //cada vez que cambia algún input
        formulario.addEventListener("change", validar);
        //Evento de envio de formulario
        formulario.addEventListener("submit", validar);





    }());




</script>