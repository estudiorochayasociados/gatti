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
////////////////////////////////////////////////

$carrito = new Clases\Carrito();
$pedidos = new Clases\Pedidos();
$detalle = new Clases\DetallePedidos();
$usuarios = new Clases\Usuarios();
$pagos = new Clases\Pagos();
$hub = new Clases\Hubspot();

$usuarioSesion = $usuarios->view_sesion();
if (empty($usuarioSesion)) {
    $funciones->headerMove(URL);
}

////////////////////////////////////////////////
$cod_pedido = $funciones->antihack_mysqli(isset($_GET["cod_pedido"]) ? $_GET["cod_pedido"] : '');
$tipo_pedido = $funciones->antihack_mysqli(isset($_GET["tipo_pedido"]) ? $_GET["tipo_pedido"] : '');
$factura = $funciones->antihack_mysqli(isset($_GET["fact"]) ? $_GET["fact"] : '');

$pedidos->set("cod", $cod_pedido);
$pedido = $pedidos->view();

$pagos->set("cod", $tipo_pedido);
$pago = $pagos->view();

$usuarios->set("cod", $usuarioSesion['cod']);
$userData = $usuarios->view();

$factura_ = '';

if (!empty($pago['leyenda'])) {
    $factura_ .= "<b>DESCRIPCIÓN DEL PAGO: </b>" . $pago['leyenda'] . "<br/>";
}

if (!empty($factura)) {
    $factura_ .= "<b>SOLICITÓ FACTURA A CON EL CUIT: </b>" . $userData["doc"] . "<br/>";
}

$carro = $carrito->return();
$precio = $carrito->precio_total();

$timezone = -3;
$fecha = gmdate("Y-m-j H:i:s", time() + 3600 * ($timezone + date("I")));

////////////////////////////////////////////////Hubspot
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
    $hub->set("celular", !empty($_SESSION['usuarios']['celular']) ? $_SESSION['usuarios']['celular'] : '');
    $hub->set("localidad", $_SESSION['usuarios']['localidad']);
    $hub->set("provincia", $_SESSION['usuarios']['provincia']);
    $hub->set("postal", !empty($_SESSION['usuarios']['postal']) ? $_SESSION['usuarios']['postal'] : '');
    $hub->addContact();

    $response = $hub->getContactByEmail();
    $vid = $response['vid'];
}
$hub->set("vid", $vid);
$hub->set("titulo", "Pedido: " . $cod_pedido);
$stage = $hub->getStage(0);
$hub->set("estado", $stage);
$hub->set("total", $precio);
$hub->set("descripcion", $descripcion);
$response = $hub->createDeal();
$hubcod = '';
if ($response != false) {
    $hubcod = $response['dealId'];
}
////////////////////////////////////////////////


if (is_array($pedido['data'])) {
    $pedidos->set("cod", $cod_pedido);
    $pedidoViejo = $pedidos->view();

    $pedidos->set("total", $precio);
    $pedidos->set("estado", 0);
    $pedidos->set("tipo", $pago["titulo"]);
    $pedidos->set("usuario", $usuarioSesion["cod"]);
    $pedidos->set("detalle", $factura_);
    $pedidos->set("fecha", $fecha);
    $pedidos->set("hub_cod", $hubcod);
    $pedidos->edit();

    foreach ($carro as $carroItem) {
        $detalle->set("cod", $cod_pedido);
        $detalle->set("producto", $carroItem["titulo"]);
        $detalle->set("cantidad", $carroItem["cantidad"]);
        $detalle->set("precio", $carroItem["precio"]);
        $detalle->add();
    }
    if (!empty($pedidoViejo['detail'])) {
        foreach ($pedidoViejo['detail'] as $detail) {
            $detalle->deleteById($detail['id']);
        }
    }
} else {
    $pedidos->set("cod", $cod_pedido);
    $pedidos->set("total", $precio);
    $pedidos->set("estado", 0);
    $pedidos->set("tipo", $pago["titulo"]);
    $pedidos->set("usuario", $usuarioSesion["cod"]);
    $pedidos->set("detalle", $factura_);
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

        ////////////////////////////////////////////////
        $pedido_info = $pedidos->view();
        $stage = $hub->getStage($pago["defecto"]);
        $hub->set("deal", $pedido_info['data']['hub_cod']);
        $hub->set("estado", $stage);
        $hub->updateStage();
        ////////////////////////////////////////////////

        $funciones->headerMove(URL . "/compra-finalizada");
        break;
    case 1:
        include("vendor/mercadopago/sdk/lib/mercadopago.php");
        $mp = new MP(MP_ID, MP_SECRET);
        $preference_data = array(
            "items" => array(array("id" => $cod_pedido, "title" => "COMPRA CÓDIGO N°:" . $cod_pedido, "quantity" => 1, "currency_id" => "ARS", "unit_price" => $precio)), "payer" => array("name" => $usuarioSesion["nombre"], "surname" => $usuarioSesion["apellido"], "email" => $usuarioSesion["email"]), "back_urls" => array("success" => URL . "/compra-finalizada.php?estado=2", "pending" => URL . "/compra-finalizada.php?estado=1", "failure" => URL . "/compra-finalizada.php?estado=0"), "external_reference" => $cod_pedido, "auto_return" => "all", //"client_id" => $usuarioSesion["cod"],
            "payment_methods" => array("excluded_payment_methods" => array(), "excluded_payment_types" => array(array("id" => "ticket"), array("id" => "atm")))
        );
        $preference = $mp->create_preference($preference_data);
        //$funciones->headerMove($preference["response"]["sandbox_init_point"]);
        echo "<iframe src='" . $preference["response"]["init_point"] . "' width='100%' height='700px' style='border:0;margin:0'></iframe>";
        break;

    case 3:
        include("vendor/todopago/php-sdk/TodoPago/lib/Sdk.php");
        $mode = "prod"; //identificador de entorno obligatorio, la otra opción es "prod"
        $http_header = array('Authorization' => "TODOPAGO 040AE30164072C8EF2BB7A67EF52EF73"); //authorization key del ambiente requerido
        $merchant = "687559";
        $connector = new TodoPago\Sdk($http_header, $mode);
        $operation_id = $_SESSION['cod_pedido'];
        $precio = number_format($precio, "2", ".", "");
        $nombre = $_SESSION['usuarios']["nombre"];
        $apellido = $_SESSION['usuarios']["apellido"];
        $email = $_SESSION['usuarios']['email'];
        $celular = $_SESSION['usuarios']['telefono'];
        $postal = $_SESSION['usuarios']['postal'];
        $localidad = $_SESSION['usuarios']['localidad'];
        $domicilio = $_SESSION['usuarios']['direccion'];
        $rand_user = rand(1, 9999);

        //comercio
        $optionsSAR_comercio = array(
            'Security' => "040AE30164072C8EF2BB7A67EF52EF73",
            'Merchant' => $merchant,
            'URL_OK' => URL . "/compra-finalizada.php?estado=2",
            'URL_ERROR' => URL . "/compra-finalizada.php?estado=0"
        );

        //operacion
        $optionsSAR_operacion = array(
            'CSBTCITY' => $localidad, //Ciudad de facturación, REQUERIDO.
            'CSBTCOUNTRY' => 'AR', //País de facturación. REQUERIDO. Código ISO.
            'CSBTCUSTOMERID' => $rand_user, //Identificador del usuario al que se le emite la factura. REQUERIDO. No puede contener un correo electrónico.
            'CSBTIPADDRESS' => $_SERVER['REMOTE_ADDR'], //'192.0.0.4', //IP de la PC del comprador. REQUERIDO.
            'CSBTEMAIL' => $email, //Mail del usuario al que se le emite la factura. REQUERIDO.
            'CSBTFIRSTNAME' => $nombre, //Nombre del usuario al que se le emite la factura. REQUERIDO.
            'CSBTLASTNAME' => $apellido, //Apellido del usuario al que se le emite la factura. REQUERIDO.
            'CSBTPHONENUMBER' => $celular, //Teléfono del usuario al que se le emite la factura. No utilizar guiones, puntos o espacios. Incluir código de país. REQUERIDO.
            'CSBTPOSTALCODE' => $postal, //Código Postal de la dirección de facturación. REQUERIDO.
            'CSBTSTATE' => 'X', //Provincia de la dirección de facturación. REQUERIDO. Ver tabla anexa de provincias.
            'CSBTSTREET1' => $domicilio, //Domicilio de facturación (calle y nro). REQUERIDO.
            'CSBTSTREET2' => '', //Complemento del domicilio. (piso, departamento). OPCIONAL.
            'CSPTCURRENCY' => 'ARS', //Moneda. REQUERIDO.
            'CSPTGRANDTOTALAMOUNT' => "$precio", //Con decimales opcional usando el punto como separador de decimales. No se permiten comas, ni como separador de miles ni como separador de decimales. REQUERIDO. (Ejemplos:$125,38-> 125.38 $12-> 12 o 12.00)
            'CSSTCITY' => $localidad, //Ciudad de envío de la orden. REQUERIDO.
            'CSSTCOUNTRY' => 'AR', //País de envío de la orden. REQUERIDO.
            'CSSTEMAIL' => $email, //Mail del destinatario, REQUERIDO.
            'CSSTFIRSTNAME' => $nombre, //Nombre del destinatario. REQUERIDO.
            'CSSTLASTNAME' => $apellido, //Apellido del destinatario. REQUERIDO.
            'CSSTPHONENUMBER' => $celular, //Número de teléfono del destinatario. REQUERIDO.
            'CSSTPOSTALCODE' => $postal, //Código postal del domicilio de envío. REQUERIDO.
            'CSSTSTATE' => 'X', //Provincia de envío. REQUERIDO. Son de 1 caracter
            'CSSTSTREET1' => $domicilio, //Domicilio de envío. REQUERIDO.
            //Retail: datos a enviar por cada producto, los valores deben estar separados con #:
            'CSITPRODUCTCODE' => 'default', //Código de producto. REQUERIDO. Valores posibles(adult_content;coupon;default;electronic_good;electronic_software;gift_certificate;handling_only;service;shipping_and_handling;shipping_only;subscription)
            'CSITPRODUCTDESCRIPTION' => 'ORDEN ' . $operation_id, //Descripción del producto. REQUERIDO.
            'CSITPRODUCTNAME' => 'ORDEN ' . $operation_id, //Nombre del producto. REQUERIDO.
            'CSITPRODUCTSKU' => $operation_id, //Código identificador del producto. REQUERIDO.
            'CSITTOTALAMOUNT' => "$precio", //CSITTOTALAMOUNT=CSITUNITPRICE*CSITQUANTITY "999999[.CC]" Con decimales opcional usando el punto como separador de decimales. No se permiten comas, ni como separador de miles ni como separador de decimales. REQUERIDO.
            'CSITQUANTITY' => '1', //Cantidad del producto. REQUERIDO.
            'CSITUNITPRICE' => "$precio", //Formato Idem CSITTOTALAMOUNT. REQUERIDO.
            //
            'MERCHANT' => $merchant, //dato fijo (número identificador del comercio)
            'OPERATIONID' => $operation_id, //número único que identifica la operación, generado por el comercio.
            'CURRENCYCODE' => 32, //por el momento es el único tipo de moneda aceptada
            'AMOUNT' => $precio,
            'EMAILCLIENTE' => $email
        );
        $values = $connector->sendAuthorizeRequest($optionsSAR_comercio, $optionsSAR_operacion);
        if ($values['URL_Request']) {
            $funciones->headerMove($values['URL_Request']);
        } else {
            $error = $values["StatusMessage"];
            $carrito->delete($carrito->checkEnvio());
            $carrito->delete($carrito->checkPago());
            unset($_SESSION["usuarios"]);
            echo "<script>alert('$error')</script>";
            $funciones->headerMove(URL . "/carrito");
        }
        break;
}
?>
<?php
$template->themeEnd();
?>