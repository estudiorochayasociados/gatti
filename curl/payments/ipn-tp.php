<?php
require_once dirname(__DIR__, 2) . "/Config/Autoload.php";
Config\Autoload::runSitio();

$funciones = new Clases\PublicFunction();
$pedidos = new Clases\Pedidos();
$cod = $funciones->antihack_mysqli(isset($_SESSION['cod_pedido']) ? $_SESSION['cod_pedido'] : '');

$mode = "prod"; //identificador de entorno obligatorio, la otra opción es "prod"
$http_header = array('Authorization' => "TODOPAGO 040AE30164072C8EF2BB7A67EF52EF73"); //authorization key del ambiente requerido
$merchant = "687559";
$connector = new TodoPago\Sdk($http_header, $mode);


$dataPayment = $connector->getStatus(array('MERCHANT' => $merchant, 'OPERATIONID' => $_SESSION['cod_pedido']));
if ($dataPayment["Operations"]["RESULTCODE"] == "-1") {
    $estado = 2;
    $link = URL . "/checkout/detail";
} else {
    $estado = 4;
    $link = URL . "/checkout/detail&message=" . $dataPayment["Operations"]["RESULTMESSAGE"];
}

$pedidos->set("estado", $estado);
$pedidos->set("cod", $cod);
$pedidos->changeState();
$funciones->headerMove($link);
