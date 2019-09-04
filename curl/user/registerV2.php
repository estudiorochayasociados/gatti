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
        $password1 = $funciones->antihack_mysqli(isset($_POST["r-password1"]) ? $_POST["r-password1"] : "");
        $password2 = $funciones->antihack_mysqli(isset($_POST["r-password2"]) ? $_POST["r-password2"] : "");
        $stage = !empty($_SESSION['stages']) ? $_SESSION['stages'] : '';
        if ($password1 == $password2) {
            $nombre = $funciones->antihack_mysqli(isset($_POST["r-nombre"]) ? $_POST["r-nombre"] : '');
            $apellido = $funciones->antihack_mysqli(isset($_POST["r-apellido"]) ? $_POST["r-apellido"] : '');
            $email = $funciones->antihack_mysqli(isset($_POST["r-email"]) ? $_POST["r-email"] : '');
            $direccion = $funciones->antihack_mysqli(isset($_POST["r-direccion"]) ? $_POST["r-direccion"] : '');
            $localidad = $funciones->antihack_mysqli(isset($_POST["localidad"]) ? $_POST["localidad"] : '');
            $provincia = $funciones->antihack_mysqli(isset($_POST["provincia"]) ? $_POST["provincia"] : '');
            $pais = $funciones->antihack_mysqli(isset($_POST["r-pais"]) ? $_POST["r-pais"] : '');
            $postal = $funciones->antihack_mysqli(isset($_POST["r-postal"]) ? $_POST["r-postal"] : '');
            $telefono = $funciones->antihack_mysqli(isset($_POST["r-telefono"]) ? $_POST["r-telefono"] : '');
            $cod = substr(md5(uniqid(rand())), 0, 10);
            $fecha = getdate();
            $fecha = $fecha['year'] . '-' . $fecha['mon'] . '-' . $fecha['mday'];

            $usuario->set("cod", $cod);
            $usuario->set("nombre", $nombre);
            $usuario->set("apellido", $apellido);
            $usuario->set("doc", "");
            $usuario->set("email", $email);
            $usuario->set("direccion", $direccion);
            $usuario->set("telefono", $telefono);
            $usuario->set("celular", "");
            $usuario->set("minorista", "1");
            $usuario->set("invitado", 0);
            $usuario->set("descuento", 0);
            $usuario->set("localidad", $localidad);
            $usuario->set("provincia", $provincia);
            $usuario->set("pais", $pais);
            $usuario->set("postal", $postal);
            $usuario->set("password", $password1);
            $usuario->set("fecha", $fecha);
            $usuario->set("estado", 1);

            $response = $usuario->validate();
            if ($response['status']) {
                $usuario->set("cod",$response['data']['cod']);
                if ($response['data']['invitado'] != '1') {
                    if ($response['data']['email'] == $email && $response['data']['password'] == $usuario->hash()) {
                        $usuario->login();
                        if (!empty($stage)) {
                            $checkout->user($_SESSION['usuarios']['cod'], 'USER');
                        }
                        echo json_encode(["status" => true, "cod" => $response['data']['cod']]);
                    } else {
                        $url = URL;
                        echo json_encode(["status" => false, "message" => "Ya hay un usuario con ese email, si este correo es suyo y no recuerda la contraseña, recupere la contraseña en el siguiente link <a href='$url/recuperar'>recuperar contraseña</a>."]);
                    }
                } else {
                    if ($usuario->edit()) {
                        $usuario->set("email", $email);
                        $usuario->set("password", $password1);
                        $usuario->login();
                        if (!empty($stage)) {
                            $checkout->user($_SESSION['usuarios']['cod'], 'NEWER');
                        }
                        echo json_encode(["status" => true, "cod" => $cod]);
                    } else {
                        echo json_encode(["status" => false, "message" => "3Ocurrió un error, vuelva a cargar la página."]);
                    }
                }
            } else {
                if ($usuario->add()) {
                    $usuario->set("email", $email);
                    $usuario->set("password", $password1);
                    $usuario->login();
                    if (!empty($stage)) {
                        $checkout->user($_SESSION['usuarios']['cod'], 'NEWER');
                    }
                    echo json_encode(["status" => true, "cod" => $cod]);
                } else {
                    echo json_encode(["status" => false, "message" => "Ocurrió un error, vuelva a cargar la página."]);
                }
            }
        } else {
            echo json_encode(["status" => false, "message" => "Las contraseñas no coinciden."]);
        }
    } else {
        echo json_encode(["status" => false, "message" => "¡Completar el CAPTCHA correctamente!"]);
    }
} else {
    echo json_encode(["status" => false, "message" => "Ocurrió un error, vuelva a cargar la página."]);
}