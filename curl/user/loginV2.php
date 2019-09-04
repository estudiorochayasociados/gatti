<?php
require_once "../../Config/Autoload.php";
Config\Autoload::runCurl();
$funciones = new Clases\PublicFunction();
$usuario = new Clases\Usuarios();
$config = new Clases\Config();
$checkout = new Clases\Checkout();
$captchaData = $config->viewCaptcha();

$captcha = $funciones->antihack_mysqli(isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '');
if (!empty($captcha)) {
    $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $captchaData['data']['captcha_secret'] . '&response=' . $_POST['g-recaptcha-response']);
    $responseKeys = json_decode($response, true);

    if ($responseKeys["success"]) {
        $user = $funciones->antihack_mysqli(isset($_POST['l-user']) ? $_POST['l-user'] : '');
        $pass = $funciones->antihack_mysqli(isset($_POST['l-pass']) ? $_POST['l-pass'] : '');
        $stage = !empty($_SESSION['stages']) ? $_SESSION['stages'] : '';
        if (!empty($user) && !empty($pass)) {
            $usuario->set("email", $user);
            $usuario->set("password", $pass);
            $response = $usuario->login();
            if (isset($response['error'])) {
                if ($response['error'] == 1) {
                    echo json_encode(["status" => false, "message" => "El usuario no esta activado, comunicarse con el soporte."]);
                } else {
                    echo json_encode(["status" => false, "message" => "Email o contraseña incorrectos."]);
                }
            } else {
                if (!empty($stage)) {
                    $checkout->user($_SESSION['usuarios']['cod'], 'USER');
                }
                echo json_encode(["status" => true]);
            }
        } else {
            echo json_encode(["status" => false, "message" => "Completar ambos campos."]);
        }
    } else {
        echo json_encode(["status" => false, "message" => "Ocurrió un error, recargue la página."]);
    }
} else {
    echo json_encode(["status" => false, "message" => "¡Completar el CAPTCHA correctamente!."]);
}