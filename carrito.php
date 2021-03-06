<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$template->set("title", TITULO . " | Carrito de compra");
$template->set("description", "Carrito de compra " . TITULO);
$template->set("keywords", "Carrito de compra " . TITULO);
$template->themeInit();
//Clases
$productos = new Clases\Productos();
$imagenes = new Clases\Imagenes();
$categorias = new Clases\Categorias();
$banners = new Clases\Banner();
$carrito = new Clases\Carrito();
$envios = new Clases\Envios();
$pagos = new Clases\Pagos();
$carro = $carrito->return();
$metodo_get = isset($_GET["metodos-pago"]) ? $_GET["metodos-pago"] : '';
$carroEnvio = $carrito->checkEnvio();
$carroPago = $carrito->checkPago();
if (count($carro) == 0) {
    $funciones->headerMove(URL . "/tienda");
}
$envioEspecial = false;
//foreach ($carro as $carro_) {
//    $productos->set("id", $carro_['id']);
//    $pro = $productos->view();
//    if (!empty($pro)) {
//        if ($pro['cod'] == 'f3aacdff42') {
//            $envioEspecial = true;
//        }
//    }
//}
?>
    <div class="headerTitular">
        <div class="container">
            <h1>Clientes</h1>
        </div>
    </div>
    <div class="container">
        <div class="titular">
            <h3> Carrito de compra</h3>
        </div>
        <?php
        $envio_ok = 0;
        $pesoFinal = $carrito->peso_final();
        $tope = $envios->peso($pesoFinal);
        $metodos_de_envios = $envios->list(array("peso BETWEEN " . $carrito->peso_final() . " AND " . $tope . " OR peso = 0"));
        $precioFinal = $carrito->precio_total();
        if ($carroEnvio == '') {
            if (($pesoFinal == 0) && $precioFinal > 0) {
                $carrito->set("id", "Envio-Seleccion");
                $carrito->set("cantidad", 1);
                $carrito->set("titulo", "ENVÍO GRATUITO");
                $carrito->set("precio", 0);
                $carrito->add();
                $funciones->headerMove(CANONICAL . "");
                $envio_ok = 1;
            } else {
                if ($pesoFinal <= 30) {
                    ?>
                    <div id="formEnvio" class="alert alert-warning animated fadeIn">
                        <?php
                        if (isset($_POST["envio"])) {
                            if ($carroEnvio != '') {
                                $carrito->delete($carroEnvio);
                            }
                            $envio_final = $_POST["envio"];
                            $envios->set("cod", $envio_final);
                            $envio_final_ = $envios->view();
                            $carrito->set("id", "Envio-Seleccion");
                            $carrito->set("cantidad", 1);
                            $carrito->set("titulo", $envio_final_["titulo"]);
                            $carrito->set("precio", $envio_final_["precio"]);
                            $carrito->add();
                            $funciones->headerMove(CANONICAL . "");
                        }
                        ?>
                        <p class="text-uppercase bold fs-20 text-center">Elegí el tipo de envío para tus productos: (<?= $pesoFinal ?>kg) </p>
                        <form method="post">
                            <select name="envio" class="form-control text-uppercase" id="envio" onchange="this.form.submit()">
                                <option value="" selected disabled>Elegir método de envío</option>
                                <?php
                                foreach ($metodos_de_envios as $key => $metodos_de_envio_) {
                                    if (empty($metodos_de_envio_["precio"])) {
                                        $metodos_de_envio_precio = "";
                                    } else {
                                        $metodos_de_envio_precio = "-> $" . $metodos_de_envio_["precio"];
                                    }
                                    echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . $metodos_de_envio_precio . "</option>";
                                }
                                ?>
                            </select>
                        </form>
                    </div>
                    <?php
                } else {
                    $carrito->set("id", "Envio-Seleccion");
                    $carrito->set("cantidad", 1);
                    $carrito->set("titulo", "ENVÍO ESPECIAL");
                    $carrito->set("precio", 0);
                    $carrito->add();
                    $funciones->headerMove(CANONICAL . "");
                }
            }
        }
        if ($envio_ok == 1) {
            ?>
            <div id="formEnvio" class="alert alert-success animated fadeIn">
                <b>¡Te regalamos tu envío, porque tu pedido se encuentra entre $550 a $1500 o de $3500 a $7000.</b>
            </div>
            <?php
        } else {
            if ($pesoFinal <= 30) {
            } else {
                ?>
                <div id="formEnvio" class="alert alert-danger animated fadeIn">
                    Tu pedido necesita ENVÍO ESPECIAL, debemos contactarnos con un transporte que pueda realizar tu envío.
                </div>
                <?php
            }
        }
        if (!empty($carroEnvio)) {
            $carroPago = $carrito->checkPago();
            if (empty($carroPago)) {
                ?>
                <div id="formPago" class="alert alert-warning animated fadeIn">
                    <?php
                    $metodo = $funciones->antihack_mysqli(isset($_POST["metodos-pago"]) ? $_POST["metodos-pago"] : '');
                    if ($metodo != '') {
                        $key_metodo = $carrito->checkPago();
                        $carrito->delete($key_metodo);
                        $pagos->set("cod", $metodo);
                        $pago__ = $pagos->view();
                        $precio_final_metodo = $carrito->precio_total();
                        $precio_envio = $carrito->precio_envio();
                        if ($pago__["aumento"] != 0 || $pago__["disminuir"] != '') {
                            if ($pago__["aumento"]) {
                                $numero = ((($precio_final_metodo-$precio_envio) * $pago__["aumento"]) / 100);
                                $carrito->set("id", "Metodo-Pago");
                                $carrito->set("cantidad", 1);
                                $carrito->set("titulo", "CARGO +" . $pago__['aumento'] . "% / " . mb_strtoupper($pago__["titulo"]));
                                $carrito->set("precio", $numero);
                                $carrito->add();
                            } else {
                                $numero = ((($precio_final_metodo-$precio_envio) * $pago__["disminuir"]) / 100);
                                $carrito->set("id", "Metodo-Pago");
                                $carrito->set("cantidad", 1);
                                $carrito->set("titulo", "DESCUENTO -" . $pago__['disminuir'] . "% / " . mb_strtoupper($pago__["titulo"]));
                                $carrito->set("precio", "-" . $numero);
                                $carrito->add();
                            }
                            $funciones->headerMove(CANONICAL . "/" . $metodo);
                        }
                    }
                    ?>
                    <p class="text-uppercase bold fs-20 text-center">Elegí el medio de pago que desea relizar. </p>
                    <form method="post">
                        <select name="metodos-pago" class="form-control text-uppercase" id="pago" onchange="this.form.submit()">
                            <option value="" selected disabled>Elegir método de pago</option>
                            <?php
                            $lista_pagos = $pagos->list(array(" estado = 0 "));
                            foreach ($lista_pagos as $pago) {
                                $precio_total = $carrito->precioSinMetodoDePago();
                                $precio_envio = $carrito->precio_envio();
                                if ($pago["aumento"] != 0 || $pago["disminuir"] != 0) {
                                    if ($pago["aumento"] > 0) {
                                        $precio_total = ((($precio_total-$precio_envio) * $pago["aumento"]) / 100) + $precio_total;
                                    } else {
                                        $precio_total = $precio_total - ((($precio_total-$precio_envio) * $pago["disminuir"]) / 100);
                                    }
                                }
                                echo "<option value='" . $pago["cod"] . "'>" . $pago["titulo"] . " -> Total: $" . $precio_total . "</option>";
                            }
                            ?>
                        </select>
                    </form>
                </div>
                <?php
            }
        }
        //Eliminar
        if (isset($_GET["remover"])) {
            $carroPago = $carrito->checkPago();
            if ($carroPago != '') {
                $carrito->delete($carroPago);
            }
            $carroEnvio = $carrito->checkEnvio();
            if ($carroEnvio != '') {
                $carrito->delete($carroEnvio);
            }
            $carrito->delete($_GET["remover"]);
            $funciones->headerMove(URL . "/carrito");
        }
        ?>
        <table class="table table-striped">
            <thead>
            <th>Nombre producto</th>
            <th class="hidden-xs hidden-sm">Cantidad</th>
            <th>Precio unidad</th>
            <th>Precio total</th>
            <th></th>
            </thead>
            <?php
            $i = 0;
            $precio = 0;
            foreach ($carro as $key => $carroItem) {
                $precio += ($carroItem["precio"] * $carroItem["cantidad"]);
                $opciones = @implode(" - ", $carroItem["opciones"]);
                $productos->set("id", $carroItem['id']);
                $pro = $productos->view();
                if ($carroItem["id"] == "Envio-Seleccion" || $carroItem["id"] == "Metodo-Pago") {
                    $clase = "text-bold";
                    $none = "hidden";
                } else {
                    $clase;
                    $none = "";
                }
                ?>
                <tr>
                    <td>
                        <?= mb_strtoupper($carroItem["titulo"]); ?>
                        <span class="amount hidden-md hidden-lg <?= $none ?>">Cantidad: <?= $carroItem["cantidad"]; ?>
                    </td>
                    <td class="hidden-xs hidden-sm">
                        <span class="amount <?= $none ?>"><?= $carroItem["cantidad"]; ?></span>
                    </td>
                    <td>
                        <span class="amount <?= $none ?>"><?= "$" . $carroItem["precio"]; ?></span>
                    </td>
                    <td>
                        <?php
                        if ($carroItem["precio"] != 0) {
                            echo "$" . ($carroItem["precio"] * $carroItem["cantidad"]);
                        } else {
                            echo "";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="<?= URL ?>/carrito.php?remover=<?= $key ?>">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
        <hr>
        <div class="col-md-12 hidden-xs hidden-sm hidden-lg hidden-md">
            <form method="post" class="row">
                <div class="col-md-6 text-right">
                    <p style="margin-top: 7px">
                        <b>
                            ¿Tenés algún código de descuento para tus compras?
                        </b>
                    </p>
                </div>
                <div class="col-md-4">
                    <input type="text" name="codigoDescuento" class="form-control" placeholder="CÓDIGO DE DESCUENTO">
                </div>
                <div class="col-md-2">
                    <input type="submit" value="USAR CÓDIGO" name="btn_codigo" class="btn btn-default"/>
                </div>
            </form>
        </div>
        <br>
        <div class="row mb-5">
            <div class="col-md-12 col-sm-12">
                <div class="row mb-10">
                    <!-- Cart Button Start -->
                    <div class="col-md-8 col-sm-12">
                    </div>
                    <!-- Cart Button Start -->
                    <!-- Cart Totals Start -->
                    <div class="col-md-12 col-sm-12 mb-15" id="buy">
                        <div class="cart_totals float-md-right text-md-right" style="text-align: center;">
                            <hr>
                            <br/>
                            <div class="mb-20">
                                <strong class="text-uppercase" style="font-size: 36px;">Total: $<?= number_format($carrito->precio_total(), "2", ",", "."); ?></strong>
                            </div>
                            <?php
                            if ($carroEnvio != '' && $carroPago != '') {
                                ?>
                                <div class="mt-20 wc-proceed-to-checkout">
                                    <a class="btn btn-success btn-block btn-lg" href="<?= URL ?>/pagar/<?= $metodo_get ?>">
                                        <i class="fa fa-check"></i> Finalizar Carrito
                                    </a>
                                </div>
                                <?php
                            } elseif ($carroEnvio == '' && $carroPago != '') {
                                ?>
                                <div class="mt-20 wc-proceed-to-checkout">
                                    <a class="btn btn-info btn-block" onclick="$('#formEnvio').addClass('alert-danger')">
                                        <i class="fa fa-check"></i> Seleccionar Método de Envío
                                    </a>
                                </div>
                                <?php
                            } elseif ($carroEnvio != '' && $carroPago == '') {
                                ?>
                                <div class="mt-20 wc-proceed-to-checkout">
                                    <a class="btn btn-info btn-block" onclick="$('#formPago').addClass('alert-danger')">
                                        <i class="fa fa-check"></i> Seleccionar Método de Pago
                                    </a>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="mt-20 wc-proceed-to-checkout">
                                    <a class="btn btn-info btn-block" onclick="$('#formEnvio').addClass('alert-danger')">
                                        <i class="fa fa-check"></i> Seleccionar Método de Envío
                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <hr>
                    </div>
                    <br>
                    <!-- Cart Totals End -->
                </div>
                <!-- Row End -->
                <!-- Form End -->
            </div>
        </div>
    </div>
    <br>
<?php
$template->themeEnd();
?>