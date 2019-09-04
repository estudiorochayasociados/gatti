<?php
require_once "../../Config/Autoload.php";
Config\Autoload::runCurl();
$funciones = new Clases\PublicFunction();
$producto = new Clases\Productos();
$atributo = new Clases\Atributos();
$subatributo = new Clases\Subatributos();
$combinacion = new Clases\Combinaciones();
$detalleCombinacion = new Clases\DetalleCombinaciones();
$productos2 = new Clases\Productos2();

$product = $funciones->antihack_mysqli(isset($_POST['product']) ? $_POST['product'] : '');
$amountAtributes = $funciones->antihack_mysqli(isset($_POST['amount-atributes']) ? $_POST['amount-atributes'] : '');

if ($amountAtributes == count($_POST['atribute'])) {
    if (!empty($product)) {
        $ERROR = '';
        $precio = 0;
        $producto->set("cod", $product);
        $productoData = $producto->view();

        if (!empty($productoData['data'])) {
            $productos2->set("cod_producto", $productoData['data']['cod_producto']);
            $producto2Data = $productos2->viewByCod();
            !empty($producto2Data['data']) ? $product2 = $producto2Data['data']['cod'] : $product2 = '';

            //SI TIENE COMBINACION
            if (!empty($_POST['combination'])) {
                $resultValidate = $combinacion->check($_POST['atribute'], $product2);

                if ($resultValidate['result'] === 1) {
                    $detalleCombinacion->set("codCombinacion", $resultValidate['combination']);
                    $detalleData = $detalleCombinacion->view();
                    if (!empty($detalleData)) {
                        $precio = $detalleData['precio'];
                        if (!empty($_SESSION['usuarios'])) {

                            if ($_SESSION['usuarios']['invitado'] != 1 || $_SESSION["usuarios"]["minorista"] == 1) {
                                $precio = $detalleData['precio'];
                            } else {
                                if (!empty($detalleData['mayorista'])) {
                                    $precio = $detalleData['mayorista'];
                                }
                            }
                        }
                    } else {
                        $ERROR = 'Ocurrió un error, intente nuevamente.';
                    }
                } else {
                    $ERROR = 'Lo sentimos no hay producto con esos atributos.';
                }
            }

            if (!empty($ERROR)) {
                $result = array("status" => false, "message" => $ERROR);
                echo json_encode($result);
            } else {
                $result = array("status" => true, "price" => $precio);
                echo json_encode($result);
            }
        } else {
            $result = array("status" => false, "message" => "Ocurrió un error, recargar la página.");
            echo json_encode($result);
        }
    } else {
        $result = array("status" => false, "message" => "Ocurrió un error, recargar la página.");
        echo json_encode($result);
    }
}
