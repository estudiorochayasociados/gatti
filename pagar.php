<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$template->set("title", TITULO . " | Dejanos tus datos");
$template->set("description", "Dejanos tus datos");
$template->set("keywords", "Dejanos tus datos");
$template->set("favicon", FAVICON);
$template->themeInit();
$carrito = new Clases\Carrito();
$usuarios = new Clases\Usuarios();
$usuarioSesion = $usuarios->view_sesion();

$cod_pedido = $_SESSION["cod_pedido"];
$tipo_pedido = $funciones->antihack_mysqli(isset($_GET["metodos-pago"]) ? $_GET["metodos-pago"] : '');
if ($tipo_pedido == '') {
    $funciones->headerMove(URL . "/carrito");
}

$error = '';
$error2 = '';
?>
<div class="headerTitular">
    <div class="container">
        <h1>Compra N°: <?= $cod_pedido ?></h1>
        <h6>Llená el siguiente formulario para poder finalizar tu compra</h6>
    </div>
</div>

<?php
if (empty($usuarioSesion)) {
    ?>
    <div class="container mt-30">
        <?php
        if (isset($_POST["registrarmeBtn"])) {
            $error = 0;
            $cod = substr(md5(uniqid(rand())), 0, 10);
            $nombre = $funciones->antihack_mysqli(isset($_POST["nombre"]) ? $_POST["nombre"] : '');
            $apellido = $funciones->antihack_mysqli(isset($_POST["apellido"]) ? $_POST["apellido"] : '');
            $doc = $funciones->antihack_mysqli(isset($_POST["doc"]) ? $_POST["doc"] : '');
            $email = $funciones->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
            $password1 = $funciones->antihack_mysqli(isset($_POST["password1"]) ? $_POST["password1"] : '');
            $password2 = $funciones->antihack_mysqli(isset($_POST["password2"]) ? $_POST["password2"] : '');
            $postal = $funciones->antihack_mysqli(isset($_POST["postal"]) ? $_POST["postal"] : '');
            $direccion = $funciones->antihack_mysqli(isset($_POST["direccion"]) ? $_POST["direccion"] : '');
            $localidad = $funciones->antihack_mysqli(isset($_POST["localidad"]) ? $_POST["localidad"] : '');
            $provincia = $funciones->antihack_mysqli(isset($_POST["provincia"]) ? $_POST["provincia"] : '');
            $pais = $funciones->antihack_mysqli(isset($_POST["pais"]) ? $_POST["pais"] : '');
            $telefono = $funciones->antihack_mysqli(isset($_POST["telefono"]) ? $_POST["telefono"] : '');
            $celular = $funciones->antihack_mysqli(isset($_POST["celular"]) ? $_POST["celular"] : '');
            $invitado = $funciones->antihack_mysqli(isset($_POST["invitado"]) ? $_POST["invitado"] : '');
            $fecha = $funciones->antihack_mysqli(isset($_POST["fecha"]) ? $_POST["fecha"] : date("Y-m-d"));

            $factura = $funciones->antihack_mysqli(isset($_POST["factura"]) ? $_POST["factura"] : '');

            $usuarios->set("nombre", $nombre);
            $usuarios->set("apellido", $apellido);
            $usuarios->set("doc", $doc);
            $usuarios->set("email", $email);
            $usuarios->set("password", $password1);
            $usuarios->set("postal", $postal);
            $usuarios->set("direccion", $direccion);
            $usuarios->set("localidad", $localidad);
            $usuarios->set("provincia", $provincia);
            $usuarios->set("pais", $pais);
            $usuarios->set("telefono", $telefono);
            $usuarios->set("celular", $celular);
            !empty($invitado) ? $usuarios->set("invitado", "") : $usuarios->set("invitado", "1");
            $usuarios->set("fecha", $fecha);

            $email_data = $usuarios->validatev2();
            if ($email_data['status']) {
                $cod = $email_data['data']['cod'];
            } else {
                $cod = substr(md5(uniqid(rand())), 0, 10);
            }
            $usuarios->set("cod", $cod);
            if (!empty($factura)) {
                $fact = '&fact=1';
            } else {
                $fact = '';
            }
            switch ($invitado) {
                //checkbox marcado
                case 1:
                    //si existe el email, edita
                    if ($email_data['status']) {
                        //pregunta si esta registrado
                        if ($email_data['data']['invitado'] == 0) {
                            $error = "Ya existe un usuario registrado con este email.";
                            $error2 = "<a href='" . URL . "/usuarios?link=pagar/" . $tipo_pedido . "'>Ingresar</a>";
                        } else {
                            //si invitado es 1
                            if ($password1 != $password2) {
                                $error = "Error las contraseñas no coinciden.";
                            } else {
                                $usuarios->edit();
                                $usuarios->set("password", $password1);
                                $usuarios->login();
                                $funciones->headerMove(URL . "/checkout/" . $cod_pedido . "/" . $tipo_pedido . $fact);
                            }
                        }
                    } else {
                        //si no existe, agrega el usuario
                        if ($password1 != $password2) {
                            $error = "Error las contraseñas no coinciden.";
                        } else {
                            $usuarios->add();
                            $usuarios->set("password", $password1);
                            $usuarios->login();
                            $funciones->headerMove(URL . "/checkout/" . $cod_pedido . "/" . $tipo_pedido . $fact);
                        }
                    }
                    break;
                //checkbox desmarcado
                default:
                    //si el email exite
                    if ($email_data['status']) {
                        //si el email tiene invitado 1
                        if ($email_data['data']['invitado'] == 1) {
                            $usuarios->guestSession();
                            $funciones->headerMove(URL . "/checkout/" . $cod_pedido . "/" . $tipo_pedido . $fact);
                        } else {
                            $error = "Ya existe un usuario registrado con este email.";
                            $error2 = "<a href='" . URL . "/usuarios?link=pagar/" . $tipo_pedido . "'>Ingresar</a>";
                        }
                    } else {
                        //el email no existe
                        $usuarios->firstGuestSession();
                        $funciones->headerMove(URL . "/checkout/" . $cod_pedido . "/" . $tipo_pedido . $fact);
                    }
                    break;
            }
        }
        ?>
        <div class="col-md-12">
            <div class="<?php if (empty($error)) {
                echo 'oculto';
            } ?>alert alert-warning" role="alert"><?= $error; ?><?php if (!empty($error2)) {
                    echo $error2;
                } ?></div>
            <form method="post" class="row">
                <div class="row">
                    <input type="hidden" value="<?= $tipo_pedido ?>" name="metodos-pago"/>
                    <div class="col-md-6">Nombre:<br/>
                        <input class="form-control  mb-10" type="text"
                               value="<?php echo isset($_POST["nombre"]) ? $_POST["nombre"] : '' ?>"
                               placeholder="Escribir nombre" name="nombre" required/>
                    </div>
                    <div class="col-md-6">Apellido:<br/>
                        <input class="form-control  mb-10" type="text"
                               value="<?php echo isset($_POST["apellido"]) ? $_POST["apellido"] : '' ?>"
                               placeholder="Escribir apellido" name="apellido" required/>
                    </div>
                    <div class="col-md-12">Email:<br/>
                        <input class="form-control  mb-10" type="email"
                               value="<?php echo isset($_POST["email"]) ? $_POST["email"] : '' ?>"
                               placeholder="Escribir email" name="email" required/>
                    </div>
                    <div class="col-md-12">Teléfono:<br/>
                        <input class="form-control  mb-10" type="text"
                               value="<?php echo isset($_POST["telefono"]) ? $_POST["telefono"] : '' ?>"
                               placeholder="Escribir telefono" name="telefono" required/>
                    </div>
                    <div class="col-md-4">Provincia
                        <div class="input-group">
                            <select class="pull-right form-control h40" name="provincia" id="provincia" required>
                                <option value="" selected disabled>Provincia</option>
                                <?php $funciones->provincias() ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">Localidad
                        <div class="input-group">
                            <select class="form-control h40" name="localidad" id="localidad" required>
                                <option value="" selected disabled>Localidad</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">Dirección:<br/>
                        <input class="form-control  mb-10" type="text"
                               value="<?php echo isset($_POST["direccion"]) ? $_POST["direccion"] : '' ?>"
                               placeholder="Escribir dirección" name="direccion" required/>
                    </div>
                    <label class="col-md-12 col-xs-12 mt-10 mb-10 crear" style="font-size:16px">
                        <input type="checkbox" name="invitado" id="ch-usuario" value="1" onchange="registerUser()">
                        ¿Deseas crear una cuenta de usuario y dejar tus datos grabados para la próxima compra?
                    </label>
                    <div class="col-md-6 col-xs-6 password" style="display: none;">Contraseña:<br/>
                        <input class="form-control  mb-10" type="password"
                               value=""
                               id="password-1"
                               placeholder="Escribir password" name="password1"/>
                    </div>
                    <div class="col-md-6 col-xs-6 password" style="display: none;">Repetir Contraseña:<br/>
                        <input class="form-control  mb-10" type="password"
                               value=""
                               id="password-2"
                               placeholder="Escribir repassword" name="password2"/>
                    </div>
                    <label class="col-md-12 col-xs-12 mt-10 mb-10" style="font-size:16px">
                        <input type="checkbox" id="c-factura" name="factura" value="1" onchange="facturaA()">
                        Solicitar FACTURA A
                    </label>
                    <div class="col-md-12 col-xs-12 factura" style="display: none;">CUIT:<br/>
                        <input class="form-control  mb-10" type="number" id="doc"
                               value="<?php echo isset($_POST["doc"]) ? $_POST["doc"] : '' ?>"
                               placeholder="Escribir CUIT" name="doc"/>
                    </div>
                    <div class="col-md-12 col-xs-12 mb-50">
                        <input class="btn btn-success" type="submit" value="¡Finalizar la compra!"
                               name="registrarmeBtn"/>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="col-md-12">
        <?php
        if (isset($_POST["l-pagar"])) {

            $factura = $funciones->antihack_mysqli(isset($_POST["factura"]) ? $_POST["factura"] : '');
            switch ($factura) {
                case 1:
                    $doc = $funciones->antihack_mysqli(isset($_POST["doc"]) ? $_POST["doc"] : '');
                    if (!empty($doc)) {
                        $usuarios->set("cod", $_SESSION['usuarios']['cod']);
                        $usuarios->editUnico("doc", $doc);
                        $funciones->headerMove(URL . "/checkout/" . $cod_pedido . "/" . $tipo_pedido . "&fact=1");
                    } else {
                        $funciones->headerMove(URL . "/checkout/" . $cod_pedido . "/" . $tipo_pedido . "&fact=1");
                    }
                    break;
                default:
                    $funciones->headerMove(URL . "/checkout/" . $cod_pedido . "/" . $tipo_pedido);
                    break;
            }
        }
        ?>
        <div class="col-md-12">
            <form method="post" class="row">
                <div class="row">
                    <input type="hidden" value="<?= $tipo_pedido ?>" name="metodos-pago"/>
                    <div class="col-md-6">Nombre:<br/>
                        <input class="form-control  mb-10" type="text"
                               value="<?= $_SESSION['usuarios']['nombre'] ?>"
                               placeholder="Escribir nombre" name="nombre" required readonly/>
                    </div>
                    <div class="col-md-6">Apellido:<br/>
                        <input class="form-control  mb-10" type="text"
                               value="<?= $_SESSION['usuarios']['apellido'] ?>"
                               placeholder="Escribir apellido" name="apellido" required readonly/>
                    </div>
                    <div class="col-md-12">Email:<br/>
                        <input class="form-control  mb-10" type="email"
                               value="<?= $_SESSION['usuarios']['email'] ?>"
                               placeholder="Escribir email" name="email" required readonly/>
                    </div>
                    <div class="col-md-12">Dirección:<br/>
                        <input class="form-control  mb-10" type="text"
                               value="<?= $_SESSION['usuarios']['direccion'] ?>"
                               placeholder="Escribir dirección" name="direccion" required readonly/>
                    </div>
                    <div class="col-md-6">Localidad:<br/>
                        <input class="form-control  mb-10" type="text"
                               value="<?= $_SESSION['usuarios']['localidad'] ?>"
                               placeholder="Escribir localidad" name="localidad" required readonly/>
                    </div>
                    <div class="col-md-6">Provincia:<br/>
                        <input class="form-control  mb-10" type="text"
                               value="<?= $_SESSION['usuarios']['provincia'] ?>"
                               placeholder="Escribir provincia" name="provincia" required readonly/>
                    </div>
                    <div class="col-md-12">Teléfono:<br/>
                        <input class="form-control  mb-10" type="text"
                               value="<?php echo isset($_POST["telefono"]) ? $_POST["telefono"] : '' ?>"
                               placeholder="Escribir telefono" name="telefono" required readonly/>
                    </div>
                    <hr>
                    <?php
                    if (!empty($_SESSION['usuarios']['doc'])) {
                        ?>
                        <label class="col-md-12 col-xs-12 mt-10 mb-10" style="font-size:16px">
                            <input type="checkbox" name="factura" value="1">
                            Solicitar FACTURA A
                        </label>
                        <?php
                    } else {
                        ?>
                        <label class="col-md-12 col-xs-12 mt-10 mb-10" style="font-size:16px">
                            <input type="checkbox" id="c-factura" name="factura" value="1" onchange="facturaA()">
                            Solicitar FACTURA A
                        </label>
                        <div class="col-md-12 col-xs-12 factura" style="display: none;">CUIT:<br/>
                            <input class="form-control  mb-10" type="number" id="doc"
                                   value="<?php echo isset($_POST["doc"]) ? $_POST["doc"] : '' ?>"
                                   placeholder="Escribir CUIT" name="doc"/>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-md-12 col-xs-12 mb-50 mt-10">
                        <input class="btn btn-block btn-secondary fs-20" type="submit" value="¡Finalizar la compra!"
                               name="l-pagar"/>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
    <?php
}

$template->themeEnd();
?>
<script>
    function facturaA() {
        $('.factura').slideToggle();
        if ($('#c-factura').prop("checked")) {
            $('#doc').prop('required', true);
        } else {
            $('#doc').prop('required', false);
        }
    }

    function registerUser() {
        $('.password').slideToggle();
        if ($('#ch-usuario').prop("checked")) {
            $('#password-1').prop('required', true);
            $('#password-2').prop('required', true);
        } else {
            $('#password-1').prop('required', false);
            $('#password-2').prop('required', false);
        }
    }
</script>
