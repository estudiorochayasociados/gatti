<?php
require_once "../../Config/Autoload.php";
Config\Autoload::runAdminAPI();
$funciones = new Clases\PublicFunction();
$producto = new Clases\Productos();

$cod = $funciones->antihack_mysqli(isset($_POST['cod']) ? $_POST['cod'] : '');
$atribute = $funciones->antihack_mysqli(isset($_POST['atribute']) ? $_POST['atribute'] : '');
$value = $funciones->antihack_mysqli(isset($_POST['value']) ? $_POST['value'] : '');

if (empty($cod) || empty($cod) || empty($cod)) {
    die();
}

$producto->set("cod", $cod);

if ($producto->editUnicoV2($atribute, $value)) {
    echo json_encode(["status" => true, "message" => "Modificado correctamente."]);
} else {
    echo json_encode(["status" => false, "message" => "Ocurrió un error, recargue la página nuevamente."]);
}