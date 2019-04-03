<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$template->set("title", TITULO . " | Cierre de compra");
$template->set("description", "Finalizá tu compra eligiendo tu medio de pago y la forma de envío");
$template->set("keywords", "");
$template->set("favicon", LOGO);
$template->themeInit();

$cod_pedido = $funciones->antihack_mysqli(isset($_GET["cod_pedido"]) ? $_GET["cod_pedido"] : '');
$tipo_pedido = $funciones->antihack_mysqli(isset($_GET["tipo_pedido"]) ? $_GET["tipo_pedido"] : '');

$carrito = new Clases\Carrito();
$pedidos = new Clases\Pedidos();
$detalle = new Clases\DetallePedidos();
$usuarios = new Clases\Usuarios();
$pagos = new Clases\Pagos();
$hub = new Clases\Hubspot();

$pedidos->set("cod", $cod_pedido);
$pedido = $pedidos->view();

$pagos->set("cod", $tipo_pedido);
$pago = $pagos->view();

$usuarioSesion = $usuarios->view_sesion();

$carro = $carrito->return();
$precio = $carrito->precio_total();

$timezone = -3;
$fecha = gmdate("Y-m-j H:i:s", time() + 3600 * ($timezone + date("I")));
?>
<?php

//Hubspot
$descripcion = '';
foreach ($carro as $c) {
    if ($c['precio'] != 0) {
        $price = $c['precio'] * $c['cantidad'];
    } else {
        $price = "Gratis";
    }
    switch ($c['id']) {
        case "Envio-Seleccion":
            $descripcion .= "Envio: " . $c['titulo'] . " precio: $" . $price . " |||";
            break;
        case "Metodo-Pago":
            $descripcion .= "Método de pago: " . $c['titulo'] . " precio: $" . $price . " |||";
            break;
        default:
            $descripcion .= "Producto: " . $c['titulo'] . " precio: $" . $price . " |||";
            break;
    }
}
$hub->set("email", $_SESSION['usuarios']['email']);
$response = $hub->getContactByEmail();
$vid = '';
if ($response != false) {
    $vid = $response['vid'];
} else {
    $hub->set("nombre", $_SESSION['usuarios']['nombre']);
    $hub->set("apellido", $_SESSION['usuarios']['apellido']);
    $hub->set("email", $_SESSION['usuarios']['email']);
    $hub->set("direccion", $_SESSION['usuarios']['direccion']);
    $hub->set("telefono", $_SESSION['usuarios']['telefono']);
    $hub->set("celular", $_SESSION['usuarios']['celular']);
    $hub->set("localidad", $_SESSION['usuarios']['localidad']);
    $hub->set("provincia", $_SESSION['usuarios']['provincia']);
    $hub->set("postal", $_SESSION['usuarios']['postal']);
    $hub->addContact();
    $response = $hub->getContactByEmail();
    $vid = $response['vid'];
}
$hub->set("titulo", "Pedido: " . $cod_pedido);
$stage = $hub->getStage(0);
$hub->set("estado", $stage);
$hub->set("vid", $vid);
$hub->set("fecha", time());
$hub->set("total", $precio);
$hub->set("descripcion", $descripcion);
$response = $hub->createDeal();
$hubcod = '';
if ($response != false) {
    $hubcod = $response['dealId'];
}
//
if (is_array($pedido)) {
    $pedidos->set("cod", $cod_pedido);
    $pedidos->delete();

    $pedidos->set("cod", $cod_pedido);
    $pedidos->set("total", $precio);
    $pedidos->set("estado", 0);
    $pedidos->set("tipo", $pago["titulo"]);
    $pedidos->set("usuario", $usuarioSesion["cod"]);
    $pedidos->set("detalle", "");
    $pedidos->set("fecha", $fecha);
    $pedidos->set("hub_cod", $hubcod);
    $pedidos->add();

    foreach ($carro as $carroItem) {
        $detalle->set("cod", $cod_pedido);
        $detalle->set("producto", $carroItem["titulo"]);
        $detalle->set("cantidad", $carroItem["cantidad"]);
        $detalle->set("precio", $carroItem["precio"]);
        $detalle->add();
    }
} else {
    $pedidos->set("cod", $cod_pedido);
    $pedidos->set("total", $precio);
    $pedidos->set("estado", 0);
    $pedidos->set("tipo", $pago["titulo"]);
    $pedidos->set("usuario", $usuarioSesion["cod"]);
    $pedidos->set("detalle", "");
    $pedidos->set("fecha", $fecha);
    $pedidos->set("hub_cod", $hubcod);
    $pedidos->add();

    foreach ($carro as $carroItem) {
        $detalle->set("cod", $cod_pedido);
        $detalle->set("producto", $carroItem["titulo"]);
        $detalle->set("cantidad", $carroItem["cantidad"]);
        $detalle->set("precio", $carroItem["precio"]);
        $detalle->add();
    }
}

switch ($pago["tipo"]) {
    case 0:
        $pedidos->set("cod", $cod_pedido);
        $pedidos->set("estado", $pago["defecto"]);
        $pedidos->changeState();
        $funciones->headerMove(URL . "/compra-finalizada");
        break;
    case 1:
        include("vendor/mercadopago/sdk/lib/mercadopago.php");
        $mp = new MP ("3087431389449841", "8V6jXmINfMLcpoEqV1cnVGQbEMnVwyjK");
        $preference_data = array("items" => array(array("id" => $cod_pedido, "title" => "COMPRA CÓDIGO N°:" . $cod_pedido, "quantity" => 1, "currency_id" => "ARS", "unit_price" => $precio)), "payer" => array("name" => $usuarioSesion["nombre"], "surname" => $usuarioSesion["apellido"], "email" => $usuarioSesion["email"]), "back_urls" => array("success" => URL . "/compra-finalizada.php?estado=2", "pending" => URL . "/compra-finalizada.php?estado=1", "failure" => URL . "/compra-finalizada.php?estado=0"), "external_reference" => $cod_pedido, "auto_return" => "all", //"client_id" => $usuarioSesion["cod"],
            "payment_methods" => array("excluded_payment_methods" => array(), "excluded_payment_types" => array(array("id" => "ticket"), array("id" => "atm"))));
        $preference = $mp->create_preference($preference_data);
        //$funciones->headerMove($preference["response"]["sandbox_init_point"]);
        echo "<iframe src='" . $preference["response"]["sandbox_init_point"] . "' width='100%' height='700px' style='border:0;margin:0'></iframe>";
        break;
}
?>
<?php
$template->themeEnd();
?>