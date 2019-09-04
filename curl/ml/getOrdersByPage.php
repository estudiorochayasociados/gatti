<?php
require_once "../../Config/Autoload.php";
Config\Autoload::runCurl();
$funciones = new Clases\PublicFunction();
$producto = new Clases\Productos();

$page = $funciones->antihack_mysqli(isset($_POST['page']) ? $_POST['page'] : '');

if (!empty($page)) {
    $response = $producto->getOrdersPaginated('recent', $page);

    if ($response['status']) {
        $result = array("status" => true, "orders" => $response['data']['results'], "page" => $response['data']['paging']['offset']);
        echo json_encode($result);
    } else {
        $result = array("status" => false);
        echo json_encode($result);
    }
} else {
    $result = array("status" => false);
    echo json_encode($result);
}
