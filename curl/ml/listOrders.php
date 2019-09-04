<?php
require_once "../../Config/Autoload.php";
Config\Autoload::runCurl();
$funciones = new Clases\PublicFunction();
$producto = new Clases\Productos();

$token = $funciones->antihack_mysqli(isset($_POST['token']) ? $_POST['token'] : '1');

if (isset($_SESSION['access_token'])) {
    $response = $producto->getAllOrders('recent');

    if ($response['status']) {
        $result = array("status" => true, "pages" => $response['data']['paging']['total']-1);
        echo json_encode($result);
    } else {
        $result = array("status" => false);
        echo json_encode($result);
    }
} else {
    $result = array("status" => false);
    echo json_encode($result);
}
