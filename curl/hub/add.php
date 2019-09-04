<?php
require_once "../../Config/Autoload.php";
Config\Autoload::runCurl();
$funciones = new Clases\PublicFunction();
$hub = new Clases\Hubspot();

$email = $funciones->antihack_mysqli(isset($_POST['email']) ? $_POST['email'] : '');
if (!empty($email)) {
    $hub->set("email", $email);
    $hub->set("nombre", '');
    $hub->set("apellido", '');
    $hub->set("telefono", '');
    $hub->set("celular", '');
    $hub->set("provincia", '');
    $hub->set("localidad", '');
    $hub->set("direccion", '');
    $hub->set("postal", '');
    $response = $hub->addContact();

    if (is_bool($response)) {
        $result = array("status" => true, "message" => "¡Felicitaciones! Te suscribiste a nuestro sistema de promociones.");
        echo json_encode($result);
    } else {
        $result = array("status" => false, "message" => $response);
        echo json_encode($result);
    }
} else {
    $result = array("status" => false, "message" => "Ingresar un correo electrónico válido.");
    echo json_encode($result);
}