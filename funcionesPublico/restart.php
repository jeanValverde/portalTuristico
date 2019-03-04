
<?php
if(isset($_GET['send'])){
    
    $mensaje = '<div class="alert alert-info" role="alert">
    <span class="alert-inner--icon"><i class="ni ni-circle-08"></i></span>
    <span class="alert-inner--text"><strong>Hemos enviado un correo electrónico a tu cuenta para restablecer tu contraseña!</strong> (Si no lo recibiste contáctate con el administrador de la página )</span>
</div>';
    
}
?>

<section class="section section-shaped section-lg" style="background-image: url('assets/img/theme/riohurtado.jpg');height: 1000px;" >
    <div class="shape shape-style-1 bg-gradient-default">
        <span class="span-150"></span>
        <span class="span-50"></span>
        <span class="span-50"></span>
        <span class="span-75"></span>
        <span class="span-100"></span>
        <span class="span-75"></span>
        <span class="span-50"></span>
        <span class="span-100"></span>
        <span class="span-50"></span>
        <span class="span-100"></span>
    </div>
    <div class="container pt-lg-md">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card bg-secondary shadow border-0 text-center">
                    <div class="card-header bg-white pb-5">
                        <div class="text-muted text-center mb-3">
                            <small>Restablecer</small>
                        </div>
                        <img src="assets/img/theme/isologotipo_full_color.png"  alt="" class="card-img-top" style="width: 50%;" />
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="alert alert-warning" role="alert">
                            <span class="alert-inner--text"><strong>Escribe tu Rut para restablecer tu contraseña</strong></span>
                        </div>
                        <?php
                        if (isset($mensaje)) {
                            echo $mensaje;
                        }
                        ?>
                        <form id="form"  method="POST"  action="../funcionesPublico/sendRestar.php" >
                            <div class="form-group mb-3">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                    </div>
                                    <input id="rut" name="rut" class="form-control" placeholder="19.552.208-1" type="text">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <a href="login" class="text-light">
                                        <small>Iniciar Sesión</small>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Ingresar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



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
         * @param {Elemento} e
         * @returns {Boolean} TRUE (Si la contraseña es valida) / FALSE (Sino es validas)
         * La contraseña debe tener mínimo 6 caracteres, al menos una mayúscula, al menos una minúscula, al menos un número.  
         */
        function validarPassword(elemento) {
            var password = document.getElementById(elemento.id).value;
            if (password.length == 0 || password == "" || password == null) {
                return true;
            } else {
                return false;
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
                    if (validarVacio((formulario.elements[i]))) {
                        formulario.elements[i].setAttribute("class", "form-control is-valid");
                    } else {
                        formulario.elements[i].setAttribute("class", "form-control is-invalid");
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
