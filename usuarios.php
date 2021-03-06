<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
////Clases
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$usuario = new Clases\Usuarios();
$enviar = new Clases\Email();
$hub = new Clases\Hubspot();
$link = $funciones->antihack_mysqli(isset($_GET["link"]) ? $_GET["link"] : '');

//
$template->set("title", TITULO . " | Usuarios");
$template->set("description", TITULO);
$template->set("keywords", "");
$template->themeInit();
?>
<div class="headerTitular">
    <div class="container">
        <h1>Ingreso de Usuarios</h1>
    </div>
</div>
<div class="container cuerpoContenedor">
    <div class="col-md-5">
        <div class="titular"><h3>Iniciar Sesión</h3></div>
        <?php
        if (isset($_POST["login"])) {
            if (isset($_POST['g-recaptcha-response'])) {
                // Verify the reCAPTCHA response
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . CAPTCHA_SECRET . '&response=' . $_POST['g-recaptcha-response']);
                $responseData = json_decode($verifyResponse);
                if ($responseData->success) {
                    $email = $funciones->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
                    $password = $funciones->antihack_mysqli(isset($_POST["password"]) ? $_POST["password"] : '');

                    $usuario->set("email", $email);
                    $usuario->set("password", $password);

                    if ($usuario->login() == 0) {
                        ?>
                        <br/>
                        <div class="alert alert-danger" role="alert">Email o contraseña incorrecta.</div>
                        <?php
                    } else {
                        if (!empty($link)) {
                            $funciones->headerMove(URL . '/' . $link);
                        } else {
                            $funciones->headerMove(URL . '/sesion');
                        }
                    }
                } else {
                    ?>
                    <br/>
                    <div class="alert alert-danger" role="alert">¡Completar el CAPTCHA correctamente!</div>
                    <?php
                }
            } else {
                ?>
                <br/>
                <div class="alert alert-danger" role="alert">Ocurrió un error, vuelva a cargar la página</div>
                <?php
            }
        }
        ?>
        <form method="post">
            <div class="row">
                <label class="col-md-12 col-xs-12">Email:<br/>
                    <input class="form-control" type="email" placeholder="Escribir email" name="email"/>
                </label>
                <label class="col-md-12 col-xs-12">Contraseña:<br/>
                    <input class="form-control" type="password" placeholder="Escribir contraseña" name="password"/>
                </label>
                <div class="col-md-12">
                    <a href="<?= URL ?>/recuperar">
                        Olvidaste tu contraseña? Haz click aquí.
                    </a>
                </div>
                <div class="col-md-12 col-xs-12"><br/>
                    <div class="form-field">
                        <div id="RecaptchaField1"></div>
                    </div>
                    <br>
                    <input class="btn btn-success" type="submit" value="Iniciar Sesión" name="login"/>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <div class="titular">
            <h3>
                Registrarme
            </h3>
        </div>
        <?php
        if (isset($_POST["registrar"])) {
            if (isset($_POST['g-recaptcha-response'])) {
                // Verify the reCAPTCHA response
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . CAPTCHA_SECRET . '&response=' . $_POST['g-recaptcha-response']);
                $responseData = json_decode($verifyResponse);
                if ($responseData->success) {
                    $pass1_ = $funciones->antihack_mysqli($_POST["password"]);
                    $pass2_ = $funciones->antihack_mysqli($_POST["password2"]);
                    if ($pass1_ == $pass2_) {
                        $nombre = $funciones->antihack_mysqli(isset($_POST["nombre"]) ? $_POST["nombre"] : '');
                        $apellido = $funciones->antihack_mysqli(isset($_POST["apellido"]) ? $_POST["apellido"] : '');
                        $email = $funciones->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
                        $telefono = $funciones->antihack_mysqli(isset($_POST["telefono"]) ? $_POST["telefono"] : '');
                        $celular = $funciones->antihack_mysqli(isset($_POST["celular"]) ? $_POST["celular"] : '');
                        $password = $funciones->antihack_mysqli(isset($_POST["password"]) ? $_POST["password"] : '');
                        $direccion = $funciones->antihack_mysqli(isset($_POST["direccion"]) ? $_POST["direccion"] : '');
                        $localidad = $funciones->antihack_mysqli(isset($_POST["localidad"]) ? $_POST["localidad"] : '');
                        $provincia = $funciones->antihack_mysqli(isset($_POST["provincia"]) ? $_POST["provincia"] : '');
                        $postal = $funciones->antihack_mysqli(isset($_POST["postal"]) ? $_POST["postal"] : '');
                        $cod = substr(md5(uniqid(rand())), 0, 10);
                        $fecha = getdate();
                        $fecha = $fecha['year'] . '-' . $fecha['mon'] . '-' . $fecha['mday'];

                        $usuario->set("cod", $cod);
                        $usuario->set("nombre", $nombre);
                        $usuario->set("apellido", $apellido);
                        $usuario->set("email", $email);
                        $usuario->set("direccion", $direccion);
                        $usuario->set("telefono", $telefono);
                        $usuario->set("celular", $celular);
                        $usuario->set("localidad", $localidad);
                        $usuario->set("provincia", $provincia);
                        $usuario->set("postal", $postal);
                        $usuario->set("password", $password);
                        $usuario->set("fecha", $fecha);

                        $hub->set("nombre", $nombre);
                        $hub->set("apellido", $apellido);
                        $hub->set("email", $email);
                        $hub->set("direccion", $direccion);
                        $hub->set("telefono", $telefono);
                        $hub->set("celular", $celular);
                        $hub->set("localidad", $localidad);
                        $hub->set("provincia", $provincia);
                        $hub->set("postal", $postal);

                        $response = $usuario->validateV2();
                        if ($response['status'] && $response['data']['invitado'] == 0) {
                            ?>
                            <br/>
                            <div class="alert alert-danger" role="alert">El email ya está registrado.</div>
                            <?php
                        } else {
                            $hub->addContact();
                            $usuario->add();
                            $usuario->set("password", $password);
                            $usuario->login();

                            //Envio de mail al usuario
                            $mensaje = 'Gracias por registrarse ' . ucfirst($nombre) . '<br/>';
                            $asunto = TITULO . ' - Registro';
                            $receptor = $email;
                            $emisor = EMAIL;
                            $enviar->set("asunto", $asunto);
                            $enviar->set("receptor", $receptor);
                            $enviar->set("emisor", $emisor);
                            $enviar->set("mensaje", $mensaje);
                            $enviar->emailEnviar();

                            //Envio de mail a la empresa
                            $mensaje2 = 'El usuario ' . ucfirst($nombre) . ' ' . ucfirst($apellido) . ' acaba de registrarse en nuestra plataforma' . '<br/>';
                            $asunto2 = TITULO . ' - Registro';
                            $receptor2 = EMAIL;
                            $emisor2 = EMAIL;
                            $enviar->set("asunto", $asunto2);
                            $enviar->set("receptor", $receptor2);
                            $enviar->set("emisor", $emisor2);
                            $enviar->set("mensaje", $mensaje2);
                            $enviar->emailEnviar();

                            $funciones->headerMove(URL . '/sesion');
                        }
                    } else {
                        ?>
                        <br/>
                        <div class="alert alert-danger" role="alert">Las contraseñas no coinciden.</div>
                        <?php
                    }
                } else {
                    ?>
                    <br/>
                    <div class="alert alert-danger" role="alert">¡Completar el CAPTCHA correctamente!</div>
                    <?php
                }
            } else {
                ?>
                <br/>
                <div class="alert alert-danger" role="alert">Ocurrió un error, vuelva a cargar la página</div>
                <?php
            }
        }
        ?>
        <form method="post" autocomplete="off">
            <div class="row">
                <label class="col-md-6 col-xs-6">Nombre:<br/>
                    <input class="form-control"
                           type="text"
                           value="<?= $funciones->antihack_mysqli((isset($_POST["nombre"]) ? $_POST["nombre"] : '')); ?>"
                           placeholder="Escribir nombre"
                           name="nombre"
                           required/>
                </label>
                <label class="col-md-6 col-xs-6">Apellido:<br/>
                    <input class="form-control"
                           type="text"
                           value="<?= $funciones->antihack_mysqli((isset($_POST["apellido"]) ? $_POST["apellido"] : '')); ?>"
                           placeholder="Escribir apellido"
                           name="apellido"
                           required/>
                </label>
                <label class="col-md-12 col-xs-12">Email:<br/>
                    <input class="form-control"
                           type="email"
                           value="<?= $funciones->antihack_mysqli((isset($_POST["email"]) ? $_POST["email"] : '')); ?>"
                           placeholder="Escribir email"
                           name="email"
                           required/>
                </label>
                <label class="col-md-6 col-xs-6">Password:<br/>
                    <input class="form-control"
                           type="password"
                           placeholder="Escribir password"
                           name="password"
                           required/>
                </label>
                <label class="col-md-6 col-xs-6">Repassword:<br/>
                    <input class="form-control"
                           type="password"
                           placeholder="Escribir repassword"
                           name="password2"
                           required/>
                </label>
                <label class="col-md-6 col-xs-6">Teléfono:<br/>
                    <input class="form-control"
                           type="text"
                           value="<?= $funciones->antihack_mysqli((isset($_POST["telefono"]) ? $_POST["telefono"] : '')); ?>"
                           placeholder="Escribir teléfono"
                           name="telefono"
                           required/>
                </label>
                <label class="col-md-6 col-xs-6">Celular:<br/>
                    <input class="form-control"
                           type="text"
                           value="<?= $funciones->antihack_mysqli((isset($_POST["celular"]) ? $_POST["celular"] : '')); ?>"
                           placeholder="Escribir celular"
                           name="celular"
                           required/>
                </label>
                <label class="col-md-6 col-xs-6">Provincia:<br/>
                    <select class="pull-right form-control h40" name="provincia" id="provincia" required>
                        <option value="" disabled>Provincia</option>
                        <?php $funciones->provincias() ?>
                    </select>
                </label>
                <label class="col-md-6 col-xs-6">Localidad:<br/>
                    <select class="form-control h40" name="localidad" id="localidad" required>
                        <option value="" disabled>Localidad</option>
                    </select>
                </label>
                <label class="col-md-6 col-xs-6">Código postal:<br/>
                    <input class="form-control"
                           type="text"
                           value="<?= $funciones->antihack_mysqli((isset($_POST["postal"]) ? $_POST["postal"] : '')); ?>"
                           placeholder="Escribir código postal"
                           name="postal"
                           required/>
                </label>
                <label class="col-md-12 col-xs-12">Direccion:<br/>
                    <input class="form-control"
                           type="text"
                           value="<?= $funciones->antihack_mysqli((isset($_POST["direccion"]) ? $_POST["direccion"] : '')); ?>"
                           placeholder="Escribir direccion"
                           name="direccion"
                           required/>
                </label>
                <div class="col-md-12 col-xs-12"><br/>
                    <div class="form-field">
                        <div id="RecaptchaField2"></div>
                    </div>
                    <br>
                    <input class="btn btn-success" type="submit" value="Registrarme" name="registrar"/>
                </div>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
    <br><br>
</div>
<?php
$template->themeEnd();
?>

<script>
    function CaptchaCallback(id, cod) {
        grecaptcha.render(id, {'sitekey': cod});
    }

    function captchaRefreshTime() {
        try {
            CaptchaCallback('RecaptchaField1', '<?= CAPTCHA_KEY ?>');
            CaptchaCallback('RecaptchaField2', '<?= CAPTCHA_KEY ?>');
        } catch (err) {
            setTimeout(captchaRefreshTime, 2000);
        }
    }

    captchaRefreshTime();
</script>