<?php
require_once "../../Config/Autoload.php";
Config\Autoload::runCurl();
$funciones = new Clases\PublicFunction();
$hub = new Clases\Hubspot();

$email = $funciones->antihack_mysqli(isset($_POST['email']) ? $_POST['email'] : '');
$firstName = $funciones->antihack_mysqli(isset($_POST['firstName']) ? $_POST['firstName'] : '');
$lastName = $funciones->antihack_mysqli(isset($_POST['lastName']) ? $_POST['lastName'] : '');
$number = $funciones->antihack_mysqli(isset($_POST['number']) ? $_POST['number'] : '');

$hub->set("email", $email);
$hub->set("nombre", $firstName);
$hub->set("apellido", $lastName);
$hub->set("telefono", $number);
$hub->set("celular", $number);
$hub->set("provincia", '');
$hub->set("localidad", '');
$hub->set("direccion", '');
$hub->set("postal", '');
$response = $hub->addContact();

if (is_bool($response)) {
    $result = array("status" => true, "message" => "¡Felicitaciones! Te suscribiste a nuestro sistema de promociones.");
    echo json_encode($result);
} else {
    $result = array("status" => false, "message" => $response, "email" => $email, "nombre" => $firstName, "apellido" => $lastName);
    echo json_encode($result);
}
//"nombre"=>$nombre,"apellido"=>$apellido