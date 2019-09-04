<?php
require_once "../../Config/Autoload.php";
Config\Autoload::runCurl();
$funciones = new Clases\PublicFunction();
$carrito = new Clases\Carrito();
$pagos = new Clases\Pagos();
$checkout = new Clases\Checkout();
$pedidos = new Clases\Pedidos();
$config = new Clases\Config();

$cod = $funciones->antihack_mysqli(isset($_POST['cod']) ? $_POST['cod'] : '');

if (!empty($cod)) {
    $pedidos->set("cod", $cod);
    $pedidosData = $pedidos->view();

    if (!empty($pedidosData['data'])) {
        include("../../vendor/mercadopago/sdk/lib/mercadopago.php");

        $config->set("id", 1);
        $paymentsData = $config->viewPayment();
        $mp = new MP ($paymentsData['data']['variable1'], $paymentsData['data']['variable2']);
        $preference_data = array(
            "items" => array(
                array(
                    "id" => $_SESSION['cod_pedido'],
                    "title" => "COMPRA CÓDIGO N°:" . $_SESSION['cod_pedido'],
                    "quantity" => 1,
                    "currency_id" => "ARS",
                    "unit_price" => floatval($pedidosData['data']['total'])
                )
            ),
            "payer" => array(
                "name" => $_SESSION['usuarios']["nombre"],
                "surname" => $_SESSION['usuarios']["apellido"],
                "email" => $_SESSION['usuarios']["email"]),
            "back_urls" => array(
                "success" => URL . "/checkout/detail",
                "pending" => URL . "/checkout/detail",
                "failure" => URL . "/checkout/detail"
            ),
            "shipments" => [
                'mode' => 'me2',
                'dimensions' => '70x70x70,1000',
                'default_shipping_method' => 73328,
                'local_pickup' => true
            ],
            "notification_url" => URL . "/ipn.php",
            "external_reference" => $_SESSION['cod_pedido'],
            "auto_return" => "all",
            //"client_id" => $usuarioSesion["cod"],
            "payment_methods" => array(
                "excluded_payment_methods" => array(),
                "excluded_payment_types" => array(
                    array("id" => "ticket"),
                    array("id" => "atm")
                )
            )
        );
        $preference = $mp->create_preference($preference_data);
        var_dump($preference);
//        $checkout->close();
//        $response = array("status" => true, "url" => $preference['response']['sandbox_init_point']);
//        echo json_encode($response);
    } else {
        $response = array("status" => false, "message" => "Ocurrió un error, recargar la página.");
        echo json_encode($response);
    }
} else {
    $response = array("status" => false, "message" => "Ocurrió un error, recargar la página.");
    echo json_encode($response);
}
