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
$template->set("favicon", FAVICON);
$template->themeInit();
////Datos
///Productos
$productos_datalast = $producto->listWithOps('', '', 10);
$productos_datarand = $producto->listWithOps('', 'RAND()', 10);
///Blogs
$novedades_datalast = $novedad->listWithOps('', '', 3);
///Banners
$categoria->set("area", "banners");
$categorias_banners = $categoria->listForArea('');
foreach ($categorias_banners as $catB) {
    if ($catB['titulo'] == "Rectangular 1/2") {
        $banner->set("categoria", $catB['cod']);
        $banner_data_rectangular = $banner->listForCategory('RAND()', 2);
    }
    if ($catB['titulo'] == "Largo") {
        $banner->set("categoria", $catB['cod']);
        $banner_data_largo = $banner->listForCategory('RAND()', 1);
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
                    <a href="<?= $sli['data']["link"]; ?>">
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
                    </a>
                    <?php
                }
                ?>
                <a class="left carousel-control slick-arrow2" href="#myCarousel" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right carousel-control slick-arrow2" href="#myCarousel" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <?php
} elseif (!empty($slidersm_data)) {
    ?>
    <div class="visible-xs" style="position: relative;">
        <div id="myCarousel" class="sliderPrincipal carousel slide " data-ride="carousel" style="height:520px;overflow:hidden" data-pause="hover">
            <div class="carousel-inner" role="listbox">
                <?php //Slider_Read() ?>
                <a class="left carousel-control slick-arrow2" href="#myCarousel" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right carousel-control slick-arrow2" href="#myCarousel" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
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
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="titular"><h3>Productos visitados</h3></div>
            <div class="masVistos">
                <?php //Portfolio_Read_Slide() ?>
            </div>
        </div>
        <?php
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
                                <a href="<?= URL . '/blog/' . $funciones->normalizar_link($nov['data']["titulo"]) . '/' . $nov['data']['cod'] ?>">
                                    <div style="height:200px;background:url(<?= $nov['imagenes']['0']['ruta']; ?>) no-repeat center center/cover;"></div>
                                </a>
                                <div class="infoIndexNews">
                                    <p style="font-size:17px;padding: 10px 10px;text-align:left;margin-top:5px">
                                        <b style="font-size:18px;"><?= ucfirst($nov['data']['titulo']); ?></b>
                                    <div class="clearfix"></div>
                                    <a href="<?= URL . '/blog/' . $funciones->normalizar_link($nov['data']["titulo"]) . '/' . $nov['data']['cod'] ?>"
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

<script>
    $(document).ready(function () {
        $("#mostrarmodal").modal("show");
    });
</script>

<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img src="popup.jpg" width="100%"/>
            </div>
        </div>
    </div>
</div>
<?php
$template->themeEnd();
?>
