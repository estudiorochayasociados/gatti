<?php
require_once "../../Config/Autoload.php";
Config\Autoload::runCurl();
$funciones = new Clases\PublicFunction();
$carrito = new Clases\Carrito();
$pagos = new Clases\Pagos();
$checkout = new Clases\Checkout();
$pedidos = new Clases\Pedidos();
$detalle = new Clases\DetallePedidos();
$descuento = new Clases\Descuentos();
$config = new Clases\Config();
$usuario = new Clases\Usuarios();
$usuarioSesion = $usuario->viewSession();

$cod = $funciones->antihack_mysqli(isset($_POST['cod']) ? $_POST['cod'] : '');

if (!empty($cod)) {

    $pagos->set("cod", $cod);
    $pagosData = $pagos->view();

    if (!empty($pagosData['data'])) {
        $carroPago = $carrito->checkPago();
        if (!empty($carroPago)) {
            $carrito->delete($carroPago);
        }

        $precio = $carrito->totalPrice();
        if (!empty($pagosData['data']["aumento"]) || !empty($pagosData['data']["disminuir"])) {
            if ($pagosData['data']["aumento"]) {
                $numero = (($precio * $pagosData['data']["aumento"]) / 100);
                $carrito->set("id", "Metodo-Pago");
                $carrito->set("cantidad", 1);
                $carrito->set("titulo", "CARGO +" . $pagosData['data']['aumento'] . "% / " . mb_strtoupper($pagosData['data']["titulo"]));
                $carrito->set("precio", $numero);
                $carrito->add();
            } else {
                $numero = (($precio * $pagosData['data']["disminuir"]) / 100);
                $carrito->set("id", "Metodo-Pago");
                $carrito->set("cantidad", 1);
                $carrito->set("titulo", "DESCUENTO -" . $pagosData['data']['disminuir'] . "% / " . mb_strtoupper($pagosData['data']["titulo"]));
                $carrito->set("precio", $numero * (-1));
                $carrito->add();
            }
        } else {
            $carrito->set("id", "Metodo-Pago");
            $carrito->set("cantidad", 1);
            $carrito->set("titulo", mb_strtoupper($pagosData['data']["titulo"]));
            $carrito->set("precio", 0);
            $carrito->add();
        }
        $precio = $carrito->totalPrice();

        $data = array(
            "cod" => $cod,
        );

        if ($checkout->stage3('', $data)) {
            $detalleCompleto = array(
                'leyenda' => '',
                'descuento' => '',
                'link' => '',
                'envio' => array(
                    'tipo' => '',
                    'nombre' => '',
                    'apellido' => '',
                    'email' => '',
                    'provincia' => '',
                    'localidad' => '',
                    'direccion' => '',
                    'telefono' => ''
                ),
                'pago' => array(
                    'nombre' => '',
                    'apellido' => '',
                    'email' => '',
                    'dni' => '',
                    'provincia' => '',
                    'localidad' => '',
                    'direccion' => '',
                    'telefono' => '',
                    'factura' => false
                )
            );

            if (!empty($pagosData['data']['leyenda'])) {
                //                $detalleCompleto['leyenda'] = $pagosData['data']['leyenda'];
                $detalleCompleto['leyenda'] = str_replace(["\n", "\r"], "", $pagosData['data']['leyenda']);
            }

            $carro = $carrito->return();
            if (!empty($usuarioSesion)) {
                $descuentoCheck = $descuento->descuentoCheck($carro, $usuarioSesion);
            } else {
                $descuentoCheck = $descuento->descuentoCheck($carro);
            }

            if (isset($descuentoCheck['cod'])) {
                if (!empty($descuentoCheck['cod'])) {
                    $detalleCompleto['descuento'] = $descuentoCheck['cod'];
                }
            }

            $envioTitulo = $carrito->checkEnvio();
            $detalleCompleto['envio']['tipo'] = $_SESSION['carrito'][$envioTitulo]['titulo'];
            $detalleCompleto['envio']['nombre'] = $_SESSION['stages']['stage-1']['data']['nombre'];
            $detalleCompleto['envio']['apellido'] = $_SESSION['stages']['stage-1']['data']['apellido'];
            $detalleCompleto['envio']['email'] = $_SESSION['stages']['stage-1']['data']['email'];
            $detalleCompleto['envio']['provincia'] = $_SESSION['stages']['stage-1']['data']['provincia'];
            $detalleCompleto['envio']['localidad'] = $_SESSION['stages']['stage-1']['data']['localidad'];
            $detalleCompleto['envio']['direccion'] = $_SESSION['stages']['stage-1']['data']['calle'];
            $detalleCompleto['envio']['telefono'] = $_SESSION['stages']['stage-1']['data']['telefono'];

            $detalleCompleto['pago']['nombre'] = $_SESSION['stages']['stage-2']['data']['nombre'];
            $detalleCompleto['pago']['apellido'] = $_SESSION['stages']['stage-2']['data']['apellido'];
            $detalleCompleto['pago']['email'] = $_SESSION['stages']['stage-2']['data']['email'];
            $detalleCompleto['pago']['dni'] = $_SESSION['stages']['stage-2']['data']['dni'];
            $detalleCompleto['pago']['provincia'] = $_SESSION['stages']['stage-2']['data']['provincia'];
            $detalleCompleto['pago']['localidad'] = $_SESSION['stages']['stage-2']['data']['localidad'];
            $detalleCompleto['pago']['direccion'] = $_SESSION['stages']['stage-2']['data']['calle'];
            $detalleCompleto['pago']['telefono'] = $_SESSION['stages']['stage-2']['data']['telefono'];
            if (!empty($_SESSION['stages']['stage-2']['data']['factura'])) {
                $detalleCompleto['pago']['factura'] = true;
            }

            $detalleCompletoJSON = json_encode($detalleCompleto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            $timezone = -3;
            $fecha = gmdate("Y-m-j H:i:s", time() + 3600 * ($timezone + date("I")));

            $pedidos->set("cod", $_SESSION['cod_pedido']);
            $pedidos->set("total", $precio);
            if (!empty($pagosData['data']['tipo'])) {
                $pedidos->set("estado", 1);
            } else {
                $pedidos->set("estado", $pagosData['data']['defecto']);
            }
            $pedidos->set("tipo", $pagosData['data']["titulo"]);
            $pedidos->set("usuario", $_SESSION['stages']['user_cod']);
            $pedidos->set("detalle", $detalleCompletoJSON);
            $pedidos->set("fecha", $fecha);
            $pedidos->set("hub_cod", ""); //$hubcod);
            $pedidos->add();

            $pedidosData = $pedidos->view();
            if (!empty($pedidosData['data'])) {
                $pedidos->edit();
                if (!empty($pedidosData['detail'])) {
                    if (@count($pedidosData['detail']) != @count($carro)) {
                        foreach ($carro as $carroItem) {
                            $detalle->set("cod", $_SESSION['cod_pedido']);
                            $detalle->set("producto", $carroItem["titulo"]);
                            $detalle->set("cantidad", $carroItem["cantidad"]);
                            $detalle->set("precio", $carroItem["precio"]);
                            if ($carroItem['id'] == "Envio-Seleccion") {
                                $detalle->set("variable1", "ME");
                            } else {
                                if ($carroItem['id'] == "Metodo-Pago") {
                                    $detalle->set("variable1", "MP");
                                } else {
                                    $detalle->set("variable1", "");
                                }
                            }
                            $detalle->set("variable2", serialize($carroItem["descuento"]));
                            $detalle->set("variable3", "");
                            if (is_array($carroItem['opciones'])) {
                                if (isset($carroItem['opciones']['texto'])) {
                                    $detalle->set("variable3", $carroItem['opciones']['texto']);
                                }
                            }
                            $detalle->set("variable4", "");
                            $detalle->set("variable5", "");
                            $detalle->add();
                        }

                        foreach ($pedidosData['detail'] as $detail) {
                            $detalle->delete($detail['id']);
                        }
                    }
                } else {
                    foreach ($carro as $carroItem) {
                        $detalle->set("cod", $_SESSION['cod_pedido']);
                        $detalle->set("producto", $carroItem["titulo"]);
                        $detalle->set("cantidad", $carroItem["cantidad"]);
                        $detalle->set("precio", $carroItem["precio"]);
                        if ($carroItem['id'] == "Envio-Seleccion") {
                            $detalle->set("variable1", "ME");
                        } else {
                            if ($carroItem['id'] == "Metodo-Pago") {
                                $detalle->set("variable1", "MP");
                            } else {
                                $detalle->set("variable1", "");
                            }
                        }
                        $detalle->set("variable2", serialize($carroItem["descuento"]));
                        $detalle->set("variable3", "");
                        if (is_array($carroItem['opciones'])) {
                            if (isset($carroItem['opciones']['texto'])) {
                                $detalle->set("variable3", $carroItem['opciones']['texto']);
                            }
                        }
                        $detalle->set("variable4", "");
                        $detalle->set("variable5", "");
                        $detalle->add();
                    }
                }
            } else {
                $pedidos->add();

                foreach ($carro as $carroItem) {
                    $detalle->set("cod", $_SESSION['cod_pedido']);
                    $detalle->set("producto", $carroItem["titulo"]);
                    $detalle->set("cantidad", $carroItem["cantidad"]);
                    $detalle->set("precio", $carroItem["precio"]);
                    if ($carroItem['id'] == "Envio-Seleccion") {
                        $detalle->set("variable1", "ME");
                    } else {
                        if ($carroItem['id'] == "Metodo-Pago") {
                            $detalle->set("variable1", "MP");
                        } else {
                            $detalle->set("variable1", "");
                        }
                    }
                    $detalle->set("variable2", serialize($carroItem["descuento"]));
                    $detalle->set("variable3", "");
                    if (is_array($carroItem['opciones'])) {
                        if (isset($carroItem['opciones']['texto'])) {
                            $detalle->set("variable3", $carroItem['opciones']['texto']);
                        }
                    }
                    $detalle->set("variable4", "");
                    $detalle->set("variable5", "");
                    $detalle->add();
                }
            }

            $checkPedido = $pedidos->view();
            if (!empty($checkPedido['data'])) {
                if (!empty($pagosData['data']['tipo'])) {
                    switch ($pagosData['data']['tipo']) {
                        case 1:
                            $response = array("status" => true, "type" => "API", "url" => URL . '/curl/payments/mp.v2.php');
                            echo json_encode($response);
                            break;
                        case 3:
                            $response = array("status" => true, "type" => "API", "url" => URL . '/curl/payments/tp.php');
                            echo json_encode($response);
                            break;
                        default:
                            $response = array("status" => false, "message" => "[301] Ocurrió un error, recargar la página.");
                            echo json_encode($response);
                            break;
                    }
                } else {
                    $checkout->close();
                    $response = array("status" => true, "url" => URL . '/checkout/detail');
                    echo json_encode($response);
                }
            } else {
                $checkout->destroy();
                unset($_SESSION["usuarios"]);
                $url = URL . '/carrito';
                $response = array("status" => false, "message" => "Lo sentimos, hubo un problema en el armado de tu carro, te recomedamos volver a realizar tu compra haciendo click <a href='$url'>aquí</a>");
                echo json_encode($response);
            }
        } else {
            $response = array("status" => false, "message" => "[303] Ocurrió un error, recargar la página.");
            echo json_encode($response);
        }
    } else {
        $response = array("status" => false, "message" => "[304] Ocurrió un error, recargar la página.");
        echo json_encode($response);
    }
} else {
    $response = array("status" => false, "message" => "[305] Ocurrió un error, recargar la página.");
    echo json_encode($response);
}
