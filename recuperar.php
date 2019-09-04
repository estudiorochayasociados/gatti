<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
////Clases
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$contenido = new Clases\Contenidos();
$usuario = new Clases\Usuarios();
$enviar = new Clases\Email();

///Datos
$userData = $usuario->view_sesion();
if (!empty($userData)) {
    $funciones->headerMove(URL . '/sesion');
}
$link = $funciones->antihack_mysqli(isset($_GET["link"]) ? $_GET["link"] : '');
//
$template->set("title", "Recuperación de contraseña | " . TITULO);
$template->set("description", "Panel de para usuarios de " . TITULO);
$template->set("keywords", "");
$template->set("body", "contacts");
$template->themeInit();
?>

<div class="container cuerpoContenedor">
    <div class="col-md-12">
        <div class="titular">
            <h3>Recuperar contraseña</h3>
        </div>
        <?php
        if (isset($_POST["recuperar"])) {
            $email = $funciones->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');

            $usuario->set("email", $email);
            $response = $usuario->validateV2();

            if ($response['status'] && $response['data']['invitado'] != 1) {
                $pass = substr(md5(uniqid(rand())), 0, 10);
                $usuario->set("cod", $response['data']['cod']);
                if ($usuario->editUnico("password", $pass)) {

                    //Envio de mail al usuario
                    $mensaje = 'Hola ' . $response['data']['nombre'] . " " . $response['data']['apellido'] . ' ¿cómo estás? Esperamos que super bien. <h3>Tu contraseña fue renovada y es la siguiente: ' . $pass . '</h3>';
                    $asunto = TITULO . ' - Recuperacion de contraseña';
                    $receptor = $response['data']['email'];
                    $emisor = EMAIL;
                    $enviar->set("asunto", $asunto);
                    $enviar->set("receptor", $receptor);
                    $enviar->set("emisor", $emisor);
                    $enviar->set("mensaje", $mensaje);
                    $enviar->emailEnviar();
                    ?>
                    <br/>
                    <div class="alert alert-success" role="alert">Contraseña enviada correctamente</div>
                    <?php
                } else {
                    ?>
                    <br/>
                    <div class="alert alert-danger" role="alert">Ocurrió un error, recargue la página nuevamente.</div>
                    <?php
                }
            } else {
                ?>
                <br/>
                <div class="alert alert-danger" role="alert">Email incorrecto.</div>
                <?php
            }
        }
        ?>
        <form method="post">
            <div class="form-fild">
                <p><label>Email <span class="required">*</span></label></p>
                <input style="width: 100% !important;" name="email" type="email" required>
            </div>
            <br>
            <div class="login-submit">
                <input type="submit" value="Recuperar" name="recuperar" class="btn">
            </div>
        </form>
    </div>
</div>
<?php
$template->themeEnd();
?>
