<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
//
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$novedades = new Clases\Novedades();
$imagen = new Clases\Imagenes();
$categoria = new Clases\Categorias();
//
$template->set("title", TITULO . " | Novedades");
$template->set("description", "Novedades de " . TITULO);
$template->set("keywords", "Novedades de " . TITULO);
$template->set("favicon", FAVICON);
$template->themeInit();

$pagina = $funciones->antihack_mysqli(isset($_GET["pagina"]) ? $_GET["pagina"] : '0');

$cantidad = 4;

if ($pagina > 0) {
    $pagina = $pagina - 1;
}

if ($_GET) {
    if (@count($_GET) > 1) {
        if (isset($_GET["pagina"])) {
            $anidador = "&";
        }
    } else {
        if (isset($_GET["pagina"])) {
            $anidador = "?";
        } else {
            $anidador = "&";
        }
    }
} else {
    $anidador = "?";
}

if (isset($_GET['pagina'])):
    $url = $funciones->eliminar_get(CANONICAL, 'pagina');
else:
    $url = CANONICAL;
endif;

$novedades_data = $novedades->listWithOps("", "", $cantidad * $pagina . ',' . $cantidad);
$numeroPaginas = $novedades->paginador("", $cantidad);
?>
<div class="headerTitular">
    <div class="container">
        <h1>Novedades</h1>
    </div>
</div>
<div class="container cuerpoContenedor">
    <div class="col-md-8 col-xs-12" style="margin-top:10px">
        <?php //Notas_Read_Front()
        if (!empty($novedades_data)) {
            foreach ($novedades_data as $nov) {
                ?>
                <div class="col-md-12 blog-post">
                    <div class="blog-thumbnail">
                        <a href="<?= URL . '/novedad/' . $funciones->normalizar_link($nov['data']["titulo"]) . '/' . $nov['data']['cod'] ?>">
                            <div style="height:300px;background:url(<?= $nov['imagenes']['0']['ruta']; ?>) no-repeat center center/cover;">
                            </div>
                        </a>
                    </div>
                    <h2 class="blog-title">
                        <a href="<?= URL . '/novedad/' . $funciones->normalizar_link($nov['data']["titulo"]) . '/' . $nov['data']['cod'] ?>">
                            <?= ucfirst($nov['data']['titulo']); ?>
                        </a>
                    </h2>
                    <div class="meta">
                        <p>
                            <span class="meta-date"><i class="fa fa-calendar"></i> <?= $nov['fecha_actual']; ?></span>
                        </p>
                    </div>
                    <div class="blog-content">
                        <p><?= ucfirst(substr(strip_tags($nov['data']['desarrollo']), 0, 150)); ?>...</p>
                        <a href="<?= URL . '/novedad/' . $funciones->normalizar_link($nov['data']["titulo"]) . '/' . $nov['data']['cod'] ?>"
                           class="btn btn-default">
                            <i class="fa fa-caret-right"></i> Ver más
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <?php
            }
        }
        ?>
        <div class="clearfix"></div>
        <div class="row centro mb-10 mt-20">
            <div class="Zebra_Pagination">
                <ul>
                    <?php
                    // <li><a href="javascript:void(0)" class="navigation previous disabled" rel="prev"><i class="fa fa-arrow-left"></i></a></li>
                    // <li><a href="/tienda?page=2" class="navigation next" rel="next"><i class="fa fa-arrow-right"></i></a></li>
                    if (!empty($numeroPaginas)) {
                        if ($numeroPaginas != 1 && $numeroPaginas != 0) {
                            $url_final = $funciones->eliminar_get(CANONICAL, "pagina");
                            $links = '';
                            $links .= "<li><a class='page-numbers' href='" . $url_final . $anidador . "pagina=1'>1</a></li>";
                            $i = max(2, $pagina - 5);

                            if ($i > 2) {
                                $links .= "<li><a href='#'>...</a></li>";
                            }
                            for (; $i <= min($pagina + 6, $numeroPaginas); $i++) {
                                if ($pagina + 1 == $i) {
                                    $current = "current";
                                } else {
                                    $current = "";
                                }
                                $links .= "<li><a class='$current' href='" . $url_final . $anidador . "pagina=" . $i . "'>" . $i . "</a></li>";
                            }
                            if ($i - 1 != $numeroPaginas) {
                                $links .= "<li><a href='#'>...</a></li>";
                                $links .= "<li><a href='" . $url_final . $anidador . "pagina=" . $numeroPaginas . "'>" . $numeroPaginas . "</a></li>";
                            }
                            echo $links;
                            echo "";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="titular">
            <h3>Últimas novedades</h3>
        </div>
        <?php
        include 'assets/inc/novside.inc.php';
        ?>
        <br/>
        <?php
        include 'assets/inc/facebook.inc.php';
        ?>
    </div>
</div>
<?php
$template->themeEnd();
?>
