<?php
include_once '../../models/Connection.php';
include_once '../../controllers/UsuarioService.php';
include_once '../../models/Usuario.php';


$form = "agregar";

$service = new UsuarioService();

$usuarios = $service->read_usuarios();


if (isset($_GET['idUsuario'])) {

    $form = "editar";

    $idUsuario = $_GET['idUsuario'];

    $usuarioViews = $service->read_usuario_by_id($idUsuario);
}
?>
<?php if (isset($_GET["mensaje"])) { ?>
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
        <span class="alert-inner--text"><strong><?= $_GET["mensaje"] ?>!</strong></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>


<div class="row">



    <div class="col-xl-8 order-xl-2 mb-5 mb-xl-0">
        <div class="card">
            <div class="card-body">
                <table class="table align-items-center table-white table-responsive" id="emergencia"  style="width:100%; ">
                    <thead class="thead-light" >
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Area</th>
                            <th>Cargo</th>
                            <th>Recuperar contraseña</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($usuarios != null) {
                            while ($usuario = array_shift($usuarios)) {
                                ?>
                                <tr>
                                    <td>
                                        <a href="../admin/administracion?idUsuario=<?= $usuario->getIdUsuario(); ?>" class="btn btn-warning" >Editar</a>
                                        <a href="../../funciones/deleteUsuario.php?idUsuario=<?= $usuario->getIdUsuario(); ?>"   class="btn btn-danger" >Eliminar</a>
                                        <a href="../../funciones/desactivarUsuario.php?idUsuario=<?= $usuario->getIdUsuario() . "&estado=" . $usuario->getEstado() ?>"   class="btn  <?= ($usuario->getEstado() == 1) ? 'btn-info' : 'btn-danger' ?> " ><?= ($usuario->getEstado() == 1) ? 'Activo' : 'Inactivo' ?></a>
                                        <a href="../../funciones/sendRestar.php?rut=<?= $usuario->getRut(); ?>"   class="btn btn-success" >Restablecer Contraseña</a>
                                    </td>
                                    <td><?= $usuario->getIdUsuario(); ?></td>
                                    <td><?= $usuario->getRut(); ?></td>
                                    <td><?= $usuario->getNombre(); ?></td>
                                    <td><?= $usuario->getApellido(); ?></td>
                                    <td><?= $usuario->getCorreo(); ?></td>
                                    <td><?= $usuario->getTipo(); ?></td>
                                    <td><?= $usuario->getArea(); ?></td>
                                    <td><?= $usuario->getCargo(); ?></td>
                                    <td><?= $usuario->getContraseniaRecuperar(); ?></td>

                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="col-xl-4 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Usuarios</h3>
                    </div>
                    <div class="col-4 text-right">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="form" action="<?php
                if ($form == "agregar") {
                    echo "../../funciones/addUsuario.php";
                } else {
                    echo "../../funciones/editUsuario.php";
                }
                ?>" method="POST" >
                    <h6 class="heading-small text-muted mb-4">Información del Usuario</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">RUT</label>
                                    <input name="rut" type="text" id="rut" class="form-control form-control-alternative" placeholder="19.552.208-1" value="<?php
                                    if (isset($usuarioViews)) {
                                        echo $usuarioViews->getRut();
                                    }
                                    ?>"
                                           <?php
                                           if (isset($usuarioViews)) {
                                               echo 'disabled';
                                           }
                                           ?>
                                           >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email</label>
                                    <input name="correo" type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com" value="<?php
                                    if (isset($usuarioViews)) {
                                        echo $usuarioViews->getCorreo();
                                    }
                                    ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Nombre</label>
                                    <input name="nombre" type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="Nombre" value="<?php
                                    if (isset($usuarioViews)) {
                                        echo $usuarioViews->getNombre();
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Apellido</label>
                                    <input name="apellido" type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Apellido" value="<?php
                                    if (isset($usuarioViews)) {
                                        echo $usuarioViews->getApellido();
                                    }
                                    ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Más datos</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-city">Cargo</label>
                                    <input  name="cargo" type="text" id="input-city" class="form-control form-control-alternative" placeholder="Administración" value="<?php
                                    if (isset($usuarioViews)) {
                                        echo $usuarioViews->getCargo();
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">Area</label>
                                    <input name="area" type="text" id="input-country" class="form-control form-control-alternative" placeholder="Turismo" value="<?php
                                    if (isset($usuarioViews)) {
                                        echo $usuarioViews->getArea();
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">Tipo</label>
                                    <select name="tipo" class="form-control form-control-alternative" id="exampleFormControlSelect2">
                                        <option value="select" >Seleccione</option>
                                        <option value="Admin" <?php
                                        if (isset($usuarioViews)) {
                                            if ($usuarioViews->getTipo() == "Admin") {
                                                echo 'selected';
                                            }
                                        }
                                        ?> >Administración</option>
                                        <option value="Usuario" <?php
                                        if (isset($usuarioViews)) {
                                            if ($usuarioViews->getTipo() == "Usuario") {
                                                echo 'selected';
                                            }
                                        }
                                        ?> >Sin privilegios administrativos</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="idUsuario" value="<?php
                            if (isset($usuarioViews)) {
                                echo $usuarioViews->getIdUsuario();
                            }
                            ?>" />
                        </div>

                        <button type="submit" class="btn btn-primary" >
                            <?php
                            if ($form == "agregar") {
                                echo "Agregar usuario";
                            } else {
                                echo "Editar usuario";
                            }
                            ?></button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<script>



    (function () {
        //Obtener el primer formulario cuyo name es form 
        var formulario = document.getElementById("form");
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
