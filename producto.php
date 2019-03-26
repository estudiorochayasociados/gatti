<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
//
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$producto = new Clases\Productos();
$carrito = new Clases\Carrito();
//Producto
$cod = $funciones->antihack_mysqli(isset($_GET["cod"]) ? $_GET["cod"] : '');
$producto->set("cod", $cod);
$producto_data = $producto->view_();
//Productos relacionados
$categoria_cod = $producto_data['data']['categoria'];
$filter = array("categoria='$categoria_cod'", "cod!='$cod'");
$productos_relacionados_data = $producto->listWithOps($filter, '', '10');
//
if (!empty($producto_data['imagenes'][0]['ruta'])) {
    $ruta_ = URL . "/" . $producto_data['imagenes'][0]['ruta'];
} else {
    $ruta_ = '';
}
$template->set("title", TITULO . " | " . ucfirst(strip_tags($producto_data['data']['titulo'])));
$template->set("description", ucfirst(strip_tags($producto_data['data']['description'])));
$template->set("keywords", ucfirst(strip_tags($producto_data['data']['titulo'])));
$template->set("imagen", $ruta_);
$template->set("favicon", FAVICON);
$template->themeInit();
//Carro
$carro = $carrito->return();
$url_limpia = CANONICAL;
$url_limpia = str_replace("?success", "", $url_limpia);
$url_limpia = str_replace("?error", "", $url_limpia);
?>
<div class="headerTitular">
    <div class="container">
        <h1>PRODUCTOS</h1>
    </div>
</div>
<div class="container cuerpoContenedor">
    <div class="row">
        <div class="col-md-12 col-xs-12" style="margin-top:10px">
            <h1 id="title" class="tituloProducto"><?= ucfirst($producto_data['data']['titulo']); ?>
            </h1>
            <br/><br/><br/>
            <div class="col-md-5">
                <div class='zoom' id='ex3'>
                    <img src="<?= URL . '/' . $producto_data['imagenes'][0]['ruta']; ?>" style="width:100% !important"/>
                </div>
                <div class="clearfix"></div>
                <br/>
                <div class="hidden-xs hidden-sm">
                    <?php
                    if (!empty($producto_data['imagenes'])) {
                        foreach ($producto_data['imagenes'] as $img) {
                            if (is_file($img['ruta'])) {
                                ?>
                                <a href="<?= URL . '/' . $img['ruta']; ?>" data-lightbox="roadtrip">
                                    <div class="col-md-3 thumbnail">
                                        <img src="<?= URL . '/' . $img['ruta']; ?>" style="width:100%"/>
                                    </div>
                                </a>
                                <?php
                            }
                        }
                    }

                    if (!empty($producto_data['data']['variable9'])) {
                        ?>
                        <a href="#"
                           class="video"
                           data-video="https://www.youtube.com/embed/<?= $producto_data['data']['variable9']; ?>"
                           data-toggle="modal"
                           data-target="#videoModal">
                            <div class="col-md-3 thumbnail"><img src="<?= URL ?>/assets/img/video-producto.png"/></div>
                        </a>
                        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <iframe width="100%" height="350" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <?php include("assets/inc/socialfb.inc.php"); ?>
                    <div class="clearfix"></div>
                    <br/>
                </div>
            </div>
            <div class="col-md-7">
                <p><b>Categoría: </b>
                    <a href="<?= URL . '/tienda?categoria=' . $producto_data['data']['categoria'] ?>"><?= $producto_data['categorias']['titulo'] ?></a>
                </p>
                <?php
                if ($producto_data['data']['variable2'] != 0) {
                    ?>
                    <br/>
                    <?php
                    if (!empty($producto_data['data']['precio_descuento']) && $producto_data['data']['precio_descuento'] > 0) {
                        ?>
                        <h2 class="label label-danger" style="font-size: 20px">Precio antes: $<?= $producto_data['data']['precio'] ?></h2>
                        <h2>Precio: $<?= $producto_data['data']['precio_descuento'] ?></h2>
                        <?php
                    } else {
                        ?>
                        <h2>Precio: $<?= $producto_data['data']['precio'] ?></h2>
                        <?php
                    }
                    ?>
                    <h4 style="color:red">
                        <?= "<i>10% de descuento en pago de contado: $" . ($producto_data['data']['precio'] - ($producto_data['data']['precio'] * 10 / 100)) . "</i>" ?>
                    </h4>
                    <?php
                    if ($producto_data['data']['stock'] > 0) {
                        if (isset($_POST["agregar_carrito"])) {
                            $carroEnvio = $carrito->checkEnvio();
                            if ($carroEnvio != '') {
                                $carrito->delete($carroEnvio);
                            }

                            $carroPago = $carrito->checkPago();
                            if ($carroPago != '') {
                                $carrito->delete($carroPago);
                            }
                            $carrito->set("id", $producto_data['data']['id']);
                            $carrito->set("cantidad", $_POST["cantidad"]);
                            $carrito->set("titulo", $producto_data['data']['titulo']);
                            $carrito->set("precio", $producto_data['data']['precio']);
                            $carrito->set("stock", $producto_data['data']['stock']);
                            $carrito->set("peso", $producto_data['data']['variable4']);
                            if (($producto_data['data']['precio_descuento'] <= 0) || $producto_data['data']["precio_descuento"] == '') {
                                $carrito->set("precio", $producto_data['data']['precio']);
                            } else {
                                $carrito->set("precio", $producto_data['data']['precio_descuento']);
                            }

                            if ($carrito->add()) {
                                $funciones->headerMove($url_limpia . "?success#title");
                            } else {
                                $funciones->headerMove($url_limpia . "?error#title");
                            }
                        }
                        ?>
                        <br/>
                        <b>Stock:
                            <div style="vertical-align:center;font-size:12px" class="label label-success"><?= $producto_data['data']['stock']; ?></div>
                            <br/>
                            <br/>
                        </b>
                        <form class="row" method="post">
                            <label class="col-md-4">
                                ¿Cuántos necesitas?:<br/>
                                <input type="number"
                                       value="1"
                                       name="cantidad"
                                       min="1"
                                       max="<?= $producto_data['data']['stock']; ?>"
                                       class="cantidad form-control"
                                       oninvalid="this.setCustomValidity('Ingresar un stock válido. Stock disponible: <?= $producto_data['data']['stock'] ?>')"
                                       oninput="this.setCustomValidity('')"
                                       onkeydown="return (event.keyCode!=13);"/>
                            </label>
                            <div class="precioFinal"></div>
                            <div class="clearfix"></div>
                            <br/>
                            <div class="col-md-12">
                                <?php
                                if (strpos(CANONICAL, "success") == true) {
                                    echo "<div class='alert alert-success'>Agregaste un producto a tu carrito, querés <a href='" . URL . "/carrito'><b>pasar por caja</b></a> o <a href='" . URL . "/tienda'><b>seguir comprando</b></a></div>";
                                }
                                if (strpos(CANONICAL, "error") == true) {
                                    echo "<div class='alert alert-danger'>No se puede agregar por falta de stock, compruebe si ya posee este producto en su carrito.</div>";
                                }
                                ?>
                                <button name="agregar_carrito" type="submit" class="btn btn-success">
                                    <i class="fa fa-cart-plus"></i> AGREGAR A CARRITO
                                </button>
                                <a href="<?= URL . "/carrito"; ?>" class="btn btn-info">
                                    <i class="fa fa-shopping-cart "></i> VER CARRITO
                                </a>
                            </div>
                        </form>
                        <?php
                    } else {
                        ?>
                        <br/>
                        <b>Stock:
                            <div style='vertical-align:center;font-size:12px' class='label label-danger'>* sin stock</div>
                            <br/>
                            <br/>
                        </b>
                        <?php
                    }
                    ?>
                    <br/>
                    <img src="<?= URL ?>/assets/img/mp.jpg" width="90%"/><br/>
                    <!-- PROMOS -->
                    <hr/>
                    <a data-toggle="modal" data-target="#promo">Promociones con Mercadopago</a>

                    <div class="modal fade" id="promo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <!--<iframe width="100%" height="350" src="https://www.mercadopago.com.ar/cuotas?iframe=true" frameborder="0" allowfullscreen></iframe>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN PROMOS -->
                    <?php
                } else {
                    echo $producto_data['data']['desarrollo'];
                    if ($producto_data['categorias']['titulo'] == 'AXIALES') {
                        ?>
                        <div class="clearfix"></div><br/>
                        <a href="<?= URL ?>/assets/archivos/MANUAL DE OPERACION Y MANTENIMIENTO AXIALES.pdf"
                           class="btn btn-primary btn-block"
                           target="_blank">
                            MANUAL DE OPERACIÓN Y MANTENIMIENTO AXIALES
                        </a>
                        <?php
                    }
                    ?>

                    <?php
                    if ($producto_data['categorias']['titulo'] == 'CENTRIFUGOS') {
                        ?>
                        <div class="clearfix"></div><br/>
                        <a href="<?= URL ?>/assets/archivos/MANUAL DE OPERACION Y MANTENIMIENTO CENTRIFUGOS.pdf"
                           class="btn btn-primary btn-block"
                           target="_blank">
                            MANUAL DE OPERACIÓN Y MANTENIMIENTO CENTRÍFUGOS
                        </a>
                        <?php
                    }
                }
                ?>
                <div class="clearfix"></div>
                <br/><br/>
                <img src="https://imgmp.mlstatic.com/org-img/banners/ar/medios/785X40.jpg"
                     title="MercadoPago - Medios de pago"
                     alt="MercadoPago - Medios de pago"
                     width="100%"/>
                <br><br>
                <br/><br/>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-md-12">
        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descripción del Producto</a>
                </li>
                <!--
                <li role="presentation">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Comentarios del Producto</a>
                </li>
                -->
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <h3>Descripión del producto</h3>
                    <hr/>
                    <p>
                        <?php
                        echo $producto_data['data']['desarrollo'];
                        if ($producto_data['categorias']['titulo'] == 'AXIALES') {
                        ?>
                    <div class="clearfix"></div>
                    <br/>
                    <a href="<?= URL ?>/assets/archivos/MANUAL DE OPERACION Y MANTENIMIENTO AXIALES.pdf"
                       class="btn btn-primary btn-block"
                       target="_blank">
                        MANUAL DE OPERACIÓN Y MANTENIMIENTO AXIALES
                    </a>
                    <?php
                    }
                    if ($producto_data['categorias']['titulo'] == 'CENTRIFUGOS') {
                        ?>
                        <div class="clearfix"></div><br/>
                        <a href="<?= URL ?>/assets/archivos/MANUAL DE OPERACION Y MANTENIMIENTO CENTRIFUGOS.pdf"
                           class="btn btn-primary btn-block"
                           target="_blank">
                            MANUAL DE OPERACIÓN Y MANTENIMIENTO CENTRÍFUGOS
                        </a>
                        <?php
                    }
                    ?>
                    </p>
                    <br/>
                </div>
                <!--
                <div role="tabpanel" class="tab-pane" id="profile">
                    <h3>Escribí comentarios o dudas</h3>
                    <hr/>
                    <?php // include("inc/comentariofb.inc.php"); ?>
                </div>
                -->
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<br/><br/>
<br/><br/>
<?php
$template->themeEnd();
?>
