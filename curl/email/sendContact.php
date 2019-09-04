<?php
require_once "../../Config/Autoload.php";
Config\Autoload::runCurl();
$funciones = new Clases\PublicFunction();
$enviar = new Clases\Email();
$pedido = new Clases\Pedidos();
$config = new Clases\Config();
$emailData = $config->viewEmail();
$captchaData = $config->viewCaptcha();

$nombre = $funciones->antihack_mysqli(isset($_POST['nombre']) ? $_POST['nombre'] : '');
$email = $funciones->antihack_mysqli(isset($_POST['email']) ? $_POST['email'] : '');
$consulta = $funciones->antihack_mysqli(isset($_POST['mensaje']) ? $_POST['mensaje'] : '');
$telefono = $funciones->antihack_mysqli(isset($_POST['telefono']) ? $_POST['telefono'] : '');
$email = $funciones->antihack_mysqli(isset($_POST['email']) ? $_POST['email'] : '');
$captcha = $funciones->antihack_mysqli(isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '');
if (!empty($captcha)) {
    $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $captchaData['data']['captcha_secret'] . '&response=' . $_POST['g-recaptcha-response']);
    $responseKeys = json_decode($response, true);

    if ($responseKeys["success"]) {
        $mensajeFinal = "<b>Nombre</b>: " . $nombre . " <br/>";
//        $mensajeFinal .= "<b>Teléfono</b>: " . $telefono . "<br/>";
        $mensajeFinal .= "<b>Email</b>: " . $email . "<br/>";
        $mensajeFinal .= "<b>Consulta</b>: " . $consulta . "<br/>";

        //USUARIO
        $enviar->set("asunto", "Realizaste tu consulta");
        $enviar->set("receptor", $email);
        $enviar->set("emisor", $emailData['data']['remitente']);
        $enviar->set("mensaje", $mensajeFinal);
        $enviar->emailEnviarCurl();
        $status = $enviar->emailEnviarCurl();

        $mensajeFinalAdmin = "<b>Nombre</b>: " . $nombre . " <br/>";
//        $mensajeFinalAdmin .= "<b>Teléfono</b>: " . $telefono . "<br/>";
        $mensajeFinalAdmin .= "<b>Email</b>: " . $email . "<br/>";
        $mensajeFinalAdmin .= "<b>Consulta</b>: " . $consulta . "<br/>";
        //ADMIN
        $enviar->set("asunto", "Consulta Web");
        $enviar->set("receptor", $emailData['data']['remitente']);
        $enviar->set("mensaje", $mensajeFinalAdmin);
        $enviar->emailEnviarCurl();

        if ($status) {
            echo json_encode(["status" => true, "message" => "¡Consulta enviada correctamente!."]);
        } else {
            echo json_encode(["status" => false, "message" => "¡No se ha podido enviar la consulta!."]);
        }
    } else {
        echo json_encode(["status" => false, "message" => "¡Completar el CAPTCHA correctamente!."]);
    }
} else {
    echo json_encode(["status" => false, "message" => "Ocurrió un error, recargar la página."]);
}
