<?php
require_once "../../Config/Autoload.php";
Config\Autoload::runCurl();
$funciones = new Clases\PublicFunction();
$enviar = new Clases\Email();
$config = new Clases\Config();
$usuario = new Clases\Usuarios();
$emailData = $config->viewEmail();
$captchaData = $config->viewCaptcha();

$email = $funciones->antihack_mysqli(isset($_POST['email']) ? $_POST['email'] : '');

$captcha = $funciones->antihack_mysqli(isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '');
if (!empty($captcha)) {
    $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $captchaData['data']['captcha_secret'] . '&response=' . $_POST['g-recaptcha-response']);
    $responseKeys = json_decode($response, true);
    if ($responseKeys["success"]) {
        if (!empty($email)) {
            $usuario->set("email", $email);
            $usuarioData = $usuario->validate();

            if (!empty($usuarioData['data'])) {
                if ($usuarioData['data']['invitado'] != '1') {
                    $usuario->set("cod", $usuarioData['data']['cod']);
                    $password = substr(md5(uniqid(rand())), 0, 10);
                    $usuario->editSingle("password", $password);

                    //Envio de mail al usuario
                    $mensaje = 'Hola ' . $usuarioData['data']['nombre'] . " " . $usuarioData['data']['apellido'] . ' ¿cómo estás? Esperamos que super bien. <h3>Tu contraseña fue renovada y es la siguiente: ' . $password . '</h3>';
                    $asunto = TITULO . ' - Recuperacion de contraseña';
                    $receptor = $usuarioData['data']['email'];
                    $emisor = $emailData['data']['remitente'];
                    $enviar->set("asunto", $asunto);
                    $enviar->set("receptor", $receptor);
                    $enviar->set("emisor", $emisor);
                    $enviar->set("mensaje", $mensaje);
                    $enviar->emailEnviarCurl();

                    $response = array("status" => true);
                    echo json_encode($response);
                } else {
                    $response = array("status" => false, "message" => "El email que intenta recuperar, no existe.");
                    echo json_encode($response);
                }
            } else {
                $response = array("status" => false, "message" => "El email que intenta recuperar, no existe.");
                echo json_encode($response);
            }
        } else {
            $response = array("status" => false, "message" => "Ocurrió un error, recargar la página.");
            echo json_encode($response);
        }
    } else {
        $response = array("status" => false, "message" => "¡Completar el CAPTCHA correctamente!");
        echo json_encode($response);
    }
} else {
    $response = array("status" => false, "message" => "Ocurrió un error, recargar la página.");
    echo json_encode($response);
}
