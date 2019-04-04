<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
////Clases
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$banner = new Clases\Banner();
$categoria = new Clases\Categorias();
$producto = new Clases\Productos();
$novedad = new Clases\Novedades();
$slider = new Clases\Sliders();
$template->set("title", TITULO . " | Inicio");
$template->set("description", "Página principal de " . TITULO);
$template->set("keywords", "");
$template->themeInit();
////Datos
///Productos
$filter = array("variable2='1'");
$productos_datarand = $producto->listWithOps($filter, 'RAND()', 10);
$filter = array("variable2='0'");
$productos_datarandV2 = $producto->listWithOps($filter, 'RAND()', 10);
///Blogs
$novedades_datalast = $novedad->listWithOps('', '', 3);
///Banners
$categoria->set("area", "banners");
$categorias_banners = $categoria->listForArea('');
foreach ($categorias_banners as $catB) {
    if ($catB['titulo'] == "POPUP") {
        $banner->set("categoria", $catB['cod']);
        $banner_data_popup = $banner->listForCategory('RAND()', 1);
    }
}
///Sliders
$categoria->set("area", "sliders");
$categorias_sliders = $categoria->listForArea('');
foreach ($categorias_sliders as $catS) {
    if ($catS['titulo'] == "Principal") {
        $slider->set("categoria", $catS['cod']);
        $sliders_data = $slider->listForCategory();
    }
    if ($catS['titulo'] == "Mobile") {
        $slider->set("categoria", $catS['cod']);
        $slidersm_data = $slider->listForCategory();
    }
}
?>

<?php
if (!empty($sliders_data)) {
    ?>
    <div class="hidden-xs" style="position: relative;">
        <div id="myCarousel" class="sliderPrincipal carousel slide " data-ride="carousel" style="height:520px;overflow:hidden" data-pause="hover">
            <div class="carousel-inner" role="listbox">
                <?php
                $active = 0;
                foreach ($sliders_data as $sli) {
                    ?>
                    <div class="item <?php if ($active == 0) {
                        echo 'active';
                        $active++;
                    } ?>"
                         style="background:url('<?= URL . '/' . $sli['imagenes']['0']['ruta']; ?>') center center/cover;height:520px">
                        <?php
                        if (!empty($sli['data']['titulo'])) {
                            ?>
                            <div class="caption animated fadeInLeft" style="animation-delay: 0.2s">
                                <div class="col-md-12 col-xs-12 captionSlider">
                                    <div class="container">
                                        <div class="col-md-6 col-sm-12">
                                            <?php
                                            if (!empty($sli['data']['titulo'])) {
                                                ?>
                                                <h1 class="wow fadeInLeft" data-wow-delay="0.6s"><?= $sli['data']['titulo'] ?></h1>
                                                <?php
                                            }
                                            ?>
                                            <div class="clearfix"></div>
                                            <?php
                                            if (!empty($sli['data']['subtitulo'])) {
                                                ?>
                                                <h2 class="wow fadeInUp" data-wow-delay="0.6s"><?= $sli['data']['subtitulo'] ?></h2>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                if (@count($sliders_data) > 1) {
                    ?>
                    <a class="left carousel-control slick-arrow2" href="#myCarousel" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right carousel-control slick-arrow2" href="#myCarousel" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
} elseif (!empty($slidersm_data)) {
    ?>
    <div class="visible-xs" style="position: relative;">
        <div id="myCarouselM" class="sliderPrincipal carousel slide " data-ride="carousel" style="height:520px;overflow:hidden" data-pause="hover">
            <div class="carousel-inner" role="listbox">
                <?php
                $active = 0;
                foreach ($slidersm_data as $sli) {
                    ?>
                    <div class="item <?php if ($active == 0) {
                        echo 'active';
                        $active++;
                    } ?>"
                         style="background:url('<?= URL . '/' . $sli['imagenes']['0']['ruta']; ?>') center center/cover;height:400px">
                        <?php
                        if (!empty($sli['data']['titulo'])) {
                            ?>
                            <div class="caption animated fadeInLeft" style="animation-delay: 0.2s">
                                <div class="col-md-12 col-xs-12 captionSlider">
                                    <div class="container">
                                        <div class="col-md-6 col-sm-12">
                                            <?php
                                            if (!empty($sli['data']['titulo'])) {
                                                ?>
                                                <h1 class="wow fadeInLeft" data-wow-delay="0.6s"><?= $sli['data']['titulo'] ?></h1>
                                                <?php
                                            }
                                            ?>
                                            <div class="clearfix"></div>
                                            <?php
                                            if (!empty($sli['data']['subtitulo'])) {
                                                ?>
                                                <h2 class="wow fadeInUp" data-wow-delay="0.6s"><?= $sli['data']['subtitulo'] ?></h2>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                if (@count($slidersm_data) > 1) {
                    ?>
                    <a class="left carousel-control slick-arrow2" href="#myCarouselM" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right carousel-control slick-arrow2" href="#myCarouselM" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}
?>
<div style="background: #f1f1f1;box-shadow: 0px 5px 10px rgba(0,0,0,.2)">
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="padding: 0px 0px 20px 0 !important">
                <img src="<?= URL ?>/assets/img/box1.png" width="100%"/>
            </div>

            <div class="col-md-3" style="padding: 0px 0px 20px 0 !important">
                <img src="<?= URL ?>/assets/img/box2.png" width="100%"/>
            </div>

            <div class="col-md-3" style="padding: 0px 0px 20px 0 !important">
                <img src="<?= URL ?>/assets/img/box3.png" width="100%"/>
            </div>
            <div class="col-md-3" style="padding: 0px 0px 20px 0 !important">
                <img src="<?= URL ?>/assets/img/box4.png" width="100%"/>
            </div>
        </div>
    </div>
</div>
<div style="width:100%;background:#F8E002;box-shadow: 0px -5px 10px rgba(0,0,0,.2)">
    <center class="container">
        <a href="https://perfil.mercadolibre.com.ar/gattisa" target="_blank">
            <img src="<?= URL ?>/assets/img/banner-mercadolibre-lider.jpg" style="width: 70%; ">
        </a>
    </center>
</div>
<div class="clearfix"></div>
<br/>
<div class="container">
    <div class="row">
        <?php
        if (!empty($productos_datarand)) {
            ?>
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="titular"><h3>Tienda Online</h3></div>
                <div class="masVistos">
                    <?php
                    foreach ($productos_datarand as $prod) {
                        ?>
                        <div class="productosMasVistos">
                            <a href="<?= URL . '/producto/' . $funciones->normalizar_link($prod['data']["titulo"]) . '/' . $prod['data']['cod'] ?>">
                                <div class="product-wrap"
                                     style="height:200px;background:url(<?= $prod['imagenes']['0']['ruta']; ?>) no-repeat center center/contain;">
                                </div>
                            </a>
                            <h1 class="tituloProducto">
                                <a href="<?= URL . '/producto/' . $funciones->normalizar_link($prod['data']["titulo"]) . '/' . $prod['data']['cod'] ?>">
                                    <?= ucfirst($prod['data']['titulo']); ?>
                                </a>
                            </h1>
                            <br/>
                            <?php
                             if (!empty($prod['data']['precio_descuento']) && $prod['data']['precio_descuento'] > 0) {
                                    ?>
                                    <div class="label label-danger"
                                         style="font-size: 12px;margin-bottom: 2px !important">
                                        <?= "<b>Antes: </b>$" . ($prod['data']["precio"]) ?>
                                    </div>
                                    <div class="label label-success"
                                         style="font-size: 12px;margin-bottom: 2px !important">
                                        <?= "<b>Ahora: </b>$" . ($prod['data']['precio_descuento']) ?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <?php
                                    $desc_ = $prod['data']['precio_descuento'];
                                } else {
                                    ?>
                                    <span class="precioProducto"><?= "<b>Precio: </b>$" . ($prod['data']['precio']) ?>
                                    </span>
                                    <br/>
                                    <?php
                                    $desc_ = $prod['data']['precio'];
                                }
                                ?>
                                <span class="precioProducto" style="color:red">
                                    <?= "<i>Precio de contado: $" . ($desc_ - ($desc_ * 10 / 100)) . "</i>" ?>
                                </span>
                                <?php
                                if ($prod['data']['stock'] == 0) {
                                    ?>
                                    <br>
                                    <div class='label label-danger'>* sin stock</div>
                                    <?php
                                }
                            ?>
                            <div class="clearfix"></div>
                            <br/>
                            <a href="<?= URL . '/producto/' . $funciones->normalizar_link($prod['data']["titulo"]) . '/' . $prod['data']['cod'] ?>"
                               class="btn btn-default">
                                <i class="fa fa-plus"></i> VER MÁS
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        if (!empty($productos_datarandV2)) {
            ?>
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="titular"><h3>Productos</h3></div>
                <div class="masVistos">
                    <?php
                    foreach ($productos_datarandV2 as $prod) {
                        ?>
                        <div class="productosMasVistos">
                            <a href="<?= URL . '/producto/' . $funciones->normalizar_link($prod['data']["titulo"]) . '/' . $prod['data']['cod'] ?>">
                                <div class="product-wrap"
                                     style="height:200px;background:url(<?= $prod['imagenes']['0']['ruta']; ?>) no-repeat center center/contain;">
                                </div>
                            </a>
                            <h1 class="tituloProducto">
                                <a href="<?= URL . '/producto/' . $funciones->normalizar_link($prod['data']["titulo"]) . '/' . $prod['data']['cod'] ?>">
                                    <?= ucfirst($prod['data']['titulo']); ?>
                                </a>
                            </h1>
                            <span class="precioProducto"><b>Categoría: </b><br/>
                                <a href="<?= URL . '/productos?categoria=' . $prod['data']['categoria']; ?>">
                                    <?= ucfirst($prod['categorias']['titulo']); ?>
                                </a>
                            </span>
                            <br/>
                            <div class="clearfix"></div>
                            <br/>
                            <a href="<?= URL . '/producto/' . $funciones->normalizar_link($prod['data']["titulo"]) . '/' . $prod['data']['cod'] ?>"
                               class="btn btn-default">
                                <i class="fa fa-plus"></i> VER MÁS
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        if (!empty($novedades_datalast)) {
            ?>
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="titular">
                    <h3>Últimas novedades</h3>
                </div>
                <div class="row">
                    <?php
                    foreach ($novedades_datalast as $nov) {
                        ?>
                        <div class="col-md-4">
                            <div class="notasMasVistos">
                                <a href="<?= URL . '/novedad/' . $funciones->normalizar_link($nov['data']["titulo"]) . '/' . $nov['data']['cod'] ?>">
                                    <div style="height:200px;background:url(<?= $nov['imagenes']['0']['ruta']; ?>) no-repeat center center/cover;"></div>
                                </a>
                                <div class="infoIndexNews">
                                    <p style="font-size:17px;padding: 10px 10px;text-align:left;margin-top:5px">
                                        <b style="font-size:18px;"><?= ucfirst($nov['data']['titulo']); ?></b>
                                    <div class="clearfix"></div>
                                    <a href="<?= URL . '/novedad/' . $funciones->normalizar_link($nov['data']["titulo"]) . '/' . $nov['data']['cod'] ?>"
                                       class="btn btn-info fright">ver nota</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php
if (!empty($banner_data_popup)) {
    ?>
    <script>
        $(document).ready(function () {
            $("#mostrarmodal").modal("show");
        });
    </script>
    <?php
    foreach ($banner_data_popup as $ban) {
        ?>
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="<?= URL . '/' . $ban['imagenes'][0]['ruta']; ?>" width="100%"/>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
$template->themeEnd();
?>
