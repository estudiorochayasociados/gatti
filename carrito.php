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
$carroEnvio = $carrito->checkEnvio();
var_dump($_SESSION['carrito']);
if (count($carro) == 0) {
    $funciones->headerMove(URL . "/tienda");
}
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
        $metodos_de_envios = $envios->list(array("peso >= " . $carrito->peso_final() . " OR peso = 0"));
        $precioFinal = $carrito->precio_total();
        $pesoFinal = $carrito->peso_final();
        if ($carroEnvio == '') {
            if (($precioFinal > 500 && $precioFinal < 1500) || ($precioFinal > 3500 && $precioFinal < 7000)) {
                $carrito->set("id", "Envio-Seleccion");
                $carrito->set("cantidad", 1);
                $carrito->set("titulo", "ENVÍO GRATUITO");
                $carrito->set("precio", 0);
                $carrito->add();
                $funciones->headerMove(CANONICAL . "");
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
                        <b>Elegí el tipo de envío para tus productos: (<?= $pesoFinal ?>kg) </b><i style="float:right;font-size:12px">* Seleccionar la mejor opción y presionar Finalizar Carrito</i><br/>
                        <form method="post">
                            <select name="envio" class="form-control" id="envio" onchange="this.form.submit()">
                                <option value="" selected disabled>Elegir envío</option>
                                <?php
                                foreach ($metodos_de_envios as $key => $metodos_de_envio_) {
                                    if ($metodos_de_envio_["precio"] == 0) {
                                        $metodos_de_envio_precio = "¡Gratis!";
                                    } else {
                                        $metodos_de_envio_precio = "$" . $metodos_de_envio_["precio"];
                                    }
                                    if ($metodos_de_envio_['titulo'] == "CORREO ARGENTINO A SUCURSAL" || $metodos_de_envio_['titulo'] == "Correo Argentino a Domicilio") {
                                        if ($metodos_de_envio_['titulo'] == "CORREO ARGENTINO A SUCURSAL") {
                                            if ($pesoFinal <= 1 && $metodos_de_envio_['peso'] == 1) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            } elseif ($pesoFinal > 1 && $pesoFinal <= 3 && $metodos_de_envio_['peso'] == 3) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            } elseif ($pesoFinal > 3 && $pesoFinal <= 5 && $metodos_de_envio_['peso'] == 5) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            } elseif ($pesoFinal > 5 && $pesoFinal <= 10 && $metodos_de_envio_['peso'] == 10) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            } elseif ($pesoFinal > 10 && $pesoFinal <= 15 && $metodos_de_envio_['peso'] == 15) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            } elseif ($pesoFinal > 15 && $pesoFinal <= 20 && $metodos_de_envio_['peso'] == 20) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            } elseif ($pesoFinal > 20 && $pesoFinal <= 25 && $metodos_de_envio_['peso'] == 25) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            } elseif ($pesoFinal > 25 && $pesoFinal <= 30 && $metodos_de_envio_['peso'] == 30) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            }
                                        } else {
                                            if ($pesoFinal <= 1 && $metodos_de_envio_['peso'] == 1) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            } elseif ($pesoFinal > 1 && $pesoFinal <= 3 && $metodos_de_envio_['peso'] == 3) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            } elseif ($pesoFinal > 3 && $pesoFinal <= 5 && $metodos_de_envio_['peso'] == 5) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            } elseif ($pesoFinal > 5 && $pesoFinal <= 10 && $metodos_de_envio_['peso'] == 10) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            } elseif ($pesoFinal > 10 && $pesoFinal <= 15 && $metodos_de_envio_['peso'] == 15) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            } elseif ($pesoFinal > 15 && $pesoFinal <= 20 && $metodos_de_envio_['peso'] == 20) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            } elseif ($pesoFinal > 20 && $pesoFinal <= 25 && $metodos_de_envio_['peso'] == 25) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            } elseif ($pesoFinal > 25 && $pesoFinal <= 30 && $metodos_de_envio_['peso'] == 30) {
                                                echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                            }
                                        }
                                    } else {
                                        echo "<option value='" . $metodos_de_envio_["cod"] . "'>" . $metodos_de_envio_["titulo"] . " -> " . $metodos_de_envio_precio . "</option>";
                                    }
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
        if (($precioFinal > 500 && $precioFinal < 1500) || ($precioFinal > 3500 && $precioFinal < 7000)) {
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
                <div id="formEnvio" class="alert alert-danger animated fadeIn">
                    Selecciona un método de pago para poder finalizar la compra.
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
                        <span class="amount <?= $none ?>"><?= $carroItem["cantidad"]; ?>
                    </td>
                    <td>
                        <span class="amount <?= $none ?>"><?= "$" . $carroItem["precio"]; ?></span>
                    </td>
                    <td>
                        <?php
                        if ($carroItem["precio"] != 0) {
                            echo "$" . ($carroItem["precio"] * $carroItem["cantidad"]);
                        } else {
                            echo "¡Gratis!";
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
        <div class="col-md-12">
            <form method="post" class="row">
                <div class="col-md-6 text-right">
                    <p style="margin-top: 7px"><b>¿Tenés algún código de descuento para tus compras?</b></p>
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
                        <form class="" method="post">
                            <!---->
                            <?php
                            $metodo = $funciones->antihack_mysqli(isset($_POST["metodos-pago"]) ? $_POST["metodos-pago"] : '');
                            $metodo_get = $funciones->antihack_mysqli(isset($_GET["metodos-pago"]) ? $_GET["metodos-pago"] : '');

                            if ($metodo != '') {
                                $key_metodo = $carrito->checkPago();
                                $carrito->delete($key_metodo);
                                $pagos->set("cod", $metodo);
                                $pago__ = $pagos->view();
                                $precio_final_metodo = $carrito->precio_total();
                                if ($pago__["aumento"] != 0 || $pago__["disminuir"] != '') {
                                    if ($pago__["aumento"]) {
                                        $numero = (($precio_final_metodo * $pago__["aumento"]) / 100);
                                        $carrito->set("id", "Metodo-Pago");
                                        $carrito->set("cantidad", 1);
                                        $carrito->set("titulo", "CARGO +" . $pago__['aumento'] . "% / " . mb_strtoupper($pago__["titulo"]));
                                        $carrito->set("precio", $numero);
                                        $carrito->add();
                                    } else {
                                        $numero = (($precio_final_metodo * $pago__["disminuir"]) / 100);
                                        $carrito->set("id", "Metodo-Pago");
                                        $carrito->set("cantidad", 1);
                                        $carrito->set("titulo", "DESCUENTO -" . $pago__['disminuir'] . "% / " . mb_strtoupper($pago__["titulo"]));
                                        $carrito->set("precio", "-" . $numero);
                                        $carrito->add();
                                    }
                                    $funciones->headerMove(CANONICAL . "/" . $metodo . "#buy");
                                }
                            }
                            ?>
                            <div class="cart_totals_area">
                                <?php
                                if ($carroEnvio != '') {
                                    ?>
                                    <h3> Metodos de pago</h3>
                                    <hr>
                                    <?php
                                }
                                ?>
                                <div class="cart_t_list">
                                    <div class="media">
                                        <div class="media-body">
                                            <?php
                                            if ($carroEnvio == '') {
                                            } else {
                                                $lista_pagos = $pagos->list(array(" estado = 0 "));
                                                foreach ($lista_pagos as $pago) {
                                                    $precio_total = $carrito->precioSinMetodoDePago();
                                                    if ($pago["aumento"] != 0 || $pago["disminuir"] != 0) {
                                                        if ($pago["aumento"] > 0) {
                                                            $precio_total = (($precio_total * $pago["aumento"]) / 100) + $precio_total;
                                                        } else {
                                                            $precio_total = $precio_total - (($precio_total * $pago["disminuir"]) / 100);
                                                        }
                                                    }
                                                    ?>
                                                    <div class="radioButtonPay mb-10 metodos">
                                                        <input type="radio"
                                                               id="<?= ($pago["cod"]) ?>"
                                                               name="metodos-pago"
                                                               value="<?= ($pago["cod"]) ?>"
                                                               onclick="this.form.submit()" <?php if ($metodo_get === $pago["cod"]) {
                                                            echo " checked ";
                                                        } ?>>
                                                        <label for="<?= ($pago["cod"]) ?>">
                                                            <b><?= mb_strtoupper($pago["titulo"]) ?></b>
                                                        </label>
                                                        <p>
                                                            <?= $pago["leyenda"] . " | Total: $" . $precio_total; ?>
                                                        </p>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                        </form>
                    </div>
                    <!-- Cart Button Start -->
                    <!-- Cart Totals Start -->
                    <div class="col-md-4 col-sm-12 mb-15" id="buy">
                        <div class="cart_totals float-md-right text-md-right" style="text-align: center;">
                            <hr>
                            <br/>
                            <div>
                                <strong style="font-size: 26px;">Total: $<?= number_format($carrito->precio_total(), "2", ",", "."); ?></strong>
                            </div>
                            <?php if ($metodo_get != '') { ?>
                                <div class="wc-proceed-to-checkout">
                                    <a class="btn btn-success" href="<?= URL ?>/pagar/<?= $metodo_get ?>" style="width: 100%;">
                                        <i class="fa fa-check"></i>Finalizar Carrito
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <hr>
                        <div>
                            <a href="<?= URL ?>/tienda" class="btn btn-info" style="width: 100%;">
                                <i class="fa fa-shopping-cart"></i> Seguir comprando
                            </a>
                        </div>
                    </div>
                    <br>
                    <!-- Cart Totals End -->
                </div>
                <!-- Row End -->
                <!-- Form End -->
            </div>
        </div>
    </div>
<?php
$template->themeEnd();
?>