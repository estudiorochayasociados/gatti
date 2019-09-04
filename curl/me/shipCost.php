<?php
require_once "../../Config/Autoload.php";
Config\Autoload::runCurl();
$funciones = new Clases\PublicFunction();
$producto = new Clases\Productos();

$zip = $funciones->antihack_mysqli(isset($_GET['zip']) ? $_GET['zip'] : '');

if (!empty($zip)) {
    $shipments = $producto->shipCost($zip);
    if ($shipments['status']) {
        $response = '';
        foreach ($shipments['data']['options'] as $options) {
            $response .= "<div class='alert alert-info mt-5'>";
            $response .= "<strong>" . $options['name'] . "</strong><br>";
            $response .= "<strong>Costo: </strong><strong style='color: green'>$" . $options['cost'] . "</strong>";
            $response .= "</div>";
        }
        $result = array("status" => true, "text" => $response);
        echo json_encode($result);
    } else {
        $response = "<div class='alert alert-danger mt-5'><p>" . $shipments['message'] . "</p></div>";
        $result = array("status" => false, "text" => $response);
        echo json_encode($result);
    }
} else {
    $response = "<div class='alert alert-danger mt-5'><p>Ingrese un Código postal correcto.</p></div>";
    $result = array("status" => false, 'text' => $response);
    echo json_encode($result);
}