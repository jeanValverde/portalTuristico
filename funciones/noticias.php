<?php
include_once '../../models/Connection.php';
include_once '../../controllers/NoticiasService.php';
include_once '../../models/Noticia.php';

$servicio = new NoticiasService();

$noticiaCargar = $servicio->read_noticia_max_id();

$noticas = $servicio->read_noticias();

$form = "agregar";

if (isset($_GET['views'])) {

    $noticiaCargar = $servicio->read_noticia_by_id($_GET['views']);
}

if (isset($_GET['idNoticia'])) {
    $form = "editar";
    $noticiaEdit = $servicio->read_noticia_by_id($_GET['idNoticia']);
}

if (isset($_GET['viewsEdit'])) {

    $noticiaCargar = $servicio->read_noticia_by_id($_GET['viewsEdit']);
}


?>

<div class="row">
    <?php if (!empty($noticas)) { ?>
        <div class="col-xl-4" >
            <div class="alert alert-default" role="alert">
                <strong>Vista previa</strong> Seleccione la noticia
                <nav aria-label="...">
                    <br/>
                    <ul class="pagination">
                        <?php
                        while ($noticia = array_shift($noticas)) {
                            ?>
                            <li class="page-item <?= ($noticiaCargar->getIdNoticia() == $noticia->getIdNoticia() ) ? 'active' : '' ?>" title="<?= $noticia->getEncabezado() ?>" >
                                <a class="page-link" href="../admin/noticias?views=<?= $noticia->getIdNoticia(); ?>"><?= $noticia->getIdNoticia() ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <div style="height: 20px;" ></div>
            <div class="row" >
                <div class="col-lg-12">
                    <div class="card card-lift--hover shadow border-0 text-justify ">
                        <img src="<?php echo '../../funciones/imgNoticias/' . $noticiaCargar->getFoto(); ?>" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h3 class="text-primary text-uppercase text-justify"><?= $noticiaCargar->getEncabezado() ?></h3>
                            <p class="description text-justify"><?= $noticiaCargar->getDescripcion() ?></p>
                            <a href="<?= $noticiaCargar->getLink() ?>" class="btn btn-primary" target="_black" >Más información</a>
                            <a href="../admin/noticias?idNoticia=<?= $noticiaCargar->getIdNoticia(); ?>" class="btn btn-warning">Editar</a>
                            <a href="../../funciones/deleteNoticia.php?idNoticia=<?= $noticiaCargar->getIdNoticia(); ?>" class="btn btn-danger">Elminar</a>
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
                        <h3 class="mb-0">Noticia</h3>
                    </div>
                    <div class="col-4 text-right">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="formNoticia"  enctype="multipart/form-data" method="POST" action="
                <?php
                if ($form == "agregar") {
                    echo "../../funciones/addNoticia.php";
                } else {
                    echo "../../funciones/editNoticia.php";
                }
                ?>"  >
                    <h6 class="heading-small text-muted mb-4">Encabezado de la noticia</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Encabezado</label>
                                    <input name="encabezado" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Noticia" value="<?php
                                    if (isset($noticiaEdit)) {
                                        echo $noticiaEdit->getEncabezado();
                                    }
                                    ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <!-- Description -->
                    <h6 class="heading-small text-muted mb-4">Pequeña descripción de la noticia</h6>
                    <div class="pl-lg-4">
                        <div class="form-group focused">
                            <label>Descripción</label>
                            <textarea name="descripcion" rows="4" class="form-control form-control-alternative"  id="exampleFormControlTextarea1"  placeholder="A few words about you ..."><?php
                                if (isset($noticiaEdit)) {
                                    echo $noticiaEdit->getDescripcion();
                                }
                                ?></textarea>
                        </div>
                    </div>
                    <hr class="my-4">
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">sd</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-address">Link de la noticia completa</label>
                                    <input  name="link" id="input-address" class="form-control form-control-alternative" placeholder="www.riohurtado.cl/la-noticia-a-publicar" value="<?php
                                    if (isset($noticiaEdit)) {
                                        echo $noticiaEdit->getLink();
                                    }
                                    ?>" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-6" >
                                <div class="custom-file">
                                    <input name="archivo"  type="file" class="custom-file-input" id="validatedCustomFile" lang="es" <?php
                                if (isset($noticiaEdit)) {
                                    echo 'required' . $noticiaEdit->getFoto();
                                }
                                ?> >
                                    <label class="custom-file-label" for="validatedCustomFile">Sube una imagen para la noticia</label>
                                    <small id="fileHelp" class="form-text text-muted">Suba el archivo que tenga las extensiones .jpeg / .jpg / .png / .gif solamente.</small>
                                    <?php if (!isset($noticiaEdit)) {?>
                                    <div class="valid-feedback">
                                        Se ve bien!
                                    </div>
                                    <div class="invalid-feedback">
                                        Debes ingresar una imagen.
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6 text-center" >
                                <img id="imagePreview" src="<?php
                                if (isset($noticiaEdit)) {
                                    echo '../../funciones/imgNoticias/' . $noticiaEdit->getFoto();
                                } else {
                                    echo "../assets/img/theme/isologotipo_full_color.png";
                                }
                                ?>" alt="" class="" style="height: 250px;" >
                            </div>
                        </div>
                        <?php if(isset($noticiaEdit)) {?>
                        <input name="idNoticia" value="<?= $noticiaEdit->getIdNoticia() ?>" type="hidden"  />
                        <?php }?>
                        <button type="submit" class="btn btn-primary" >Registrar noticia</button>
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