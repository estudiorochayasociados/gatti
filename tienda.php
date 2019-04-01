<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
//
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$producto = new Clases\Productos();
$categoria = new Clases\Categorias();
$subcategoria = new Clases\Subcategorias();
$banner = new Clases\Banner();
///Banners
$categoria->set("area", "banners");
$categorias_banners = $categoria->listForArea('');
foreach ($categorias_banners as $catB) {
    if ($catB['titulo'] == "Cuadrado") {
        $banner->set("categoria", $catB['cod']);
        $banner_data_cuadrado = $banner->listForCategory('RAND()', 1);
    }
}
//Categorias
$categorias_data = $categoria->listForCount('1', '');
//Productos
$pagina = $funciones->antihack_mysqli(isset($_GET["pagina"]) ? $_GET["pagina"] : '0');
$categoria_get = $funciones->antihack_mysqli(isset($_GET["categoria"]) ? $_GET["categoria"] : '');
$subcategoria_get = $funciones->antihack_mysqli(isset($_GET["subcategoria"]) ? $_GET["subcategoria"] : '');
$titulo = $funciones->antihack_mysqli(isset($_GET["buscar"]) ? $_GET["buscar"] : '');
//
$cantidad = 9;

if ($pagina > 0) {
    $pagina = $pagina - 1;
}

if (@count($filter) == 0) {
    $filter = '';
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

$filter = array("variable2='1'");

if (!empty($categoria_get)) {
    if (!empty($subcategoria_get)) {
        $categoria->set("cod", $categoria_get);
        $categoria_data_filtro = $categoria->view();
        $cod = $categoria_data_filtro['cod'];
        $subcategoria->set("cod", $subcategoria_get);
        $subcategoria_data_filtro = $subcategoria->view();
        $cod_sub = $subcategoria_data_filtro['cod'];
        array_push($filter, "categoria='$cod' AND subcategoria='$cod_sub'");
    } else {
        $categoria->set("cod", $categoria_get);
        $categoria_data_filtro = $categoria->view();
        $cod = $categoria_data_filtro['cod'];
        array_push($filter, "categoria='$cod'");
    }
}

if ($titulo != '') {
    $titulo_espacios = strpos($titulo, " ");
    if ($titulo_espacios) {
        $filter_title = array();
        $titulo_explode = explode(" ", $titulo);
        foreach ($titulo_explode as $titulo_) {
            array_push($filter_title, "(titulo LIKE '%$titulo_%'  || desarrollo LIKE '%$titulo_%')");
        }
        $filter_title_implode = implode(" OR ", $filter_title);
        array_push($filter, "(" . $filter_title_implode . ")");
    } else {
        array_push($filter, "(titulo LIKE '%$titulo%' || desarrollo LIKE '%$titulo%')");
    }
}

$productos_data = $producto->listWithOps($filter, '', ($cantidad * $pagina) . ',' . $cantidad);
if (!empty($productos_data)) {
    $numeroPaginas = $producto->paginador($filter, $cantidad);
}
$template->set("title", TITULO . " | Productos");
$template->set("description", "Todos los productos de " . TITULO);
$template->set("keywords", "Todos los productos de " . TITULO);
$template->set("body", "home3");
$template->themeInit();
?>
<div class="headerTitular">
    <div class="container">
        <h1>TIENDA ONLINE</h1>
    </div>
</div>
<div class="container cuerpoContenedor">
    <div class="row">
        <div class="col-md-8 col-xs-12" style="margin-top:10px">
            <div class="hidden-lg hidden-md">
                <div class="titular">
                    <h3>FILTROS DE BÚSQUEDA</h3>
                </div>
                <form method="get">
                    <?php
                    if (!empty($categoria_get)) {
                        ?>
                        <a href="<?= URL ?>/tienda">
                            <span class="alert btn-block alert-warning">
                                <i class="fa fa-close"></i> <?= $categoria_data_filtro['titulo']; ?>
                            </span>
                        </a>
                        <?php
                    }
                    ?>
                    Filtrá por la categoría que te interesa.

                    <select class="form-control" name="buscar" onchange="this.form.submit()">
                        <?php if (!empty($categoria_get)) {
                            ?>
                            <option value="<?= $categoria_get ?>"><?= $categoria_data_filtro['titulo']; ?></option>
                            <?php
                        } else {
                            ?>
                            <option>-- Seleccionar Categoría --</option>
                            <?php
                        }
                        ?>
                        <option disabled>──────────</option>
                        <?php
                        if (!empty($categorias_data)) {
                            foreach ($categorias_data as $cat) {
                                ?>
                                <option value="<?= $cat['cod']; ?>"><?= $cat["titulo"] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </form>
                <div class="clearfix"></div>
                <br/>
            </div>
            <div class="col-md-12">
                <?php
                if (!empty($productos_data)) {
                    foreach ($productos_data as $prod) {
                        ?>
                        <div class=" col-md-4 col-xs-12 product-box hvr-outline-in">
                            <a href="<?= URL . '/producto/' . $funciones->normalizar_link($prod['data']["titulo"]) . '/' . $prod['data']['cod'] ?>"
                               class="relative">
                                <?php
                                if (!empty($prod['data']['precio_descuento']) && $prod['data']['precio_descuento'] > 0) {
                                    ?>
                                    <span class="top label label-info">¡PRODUCTO EN OFERTA!</span>
                                    <?php
                                }
                                ?>
                                <div class="product-wrap"
                                     style="height:150px;background:url(<?= $prod['imagenes']['0']['ruta']; ?>) no-repeat center center/contain;">
                                </div>
                            </a>
                            <h1 class="tituloProducto">
                                <a href="<?= URL . '/producto/' . $funciones->normalizar_link($prod['data']["titulo"]) . '/' . $prod['data']['cod'] ?>"
                                   style="font-size:25px"><?= ucfirst($prod['data']['titulo']); ?>
                                </a>
                            </h1>
                            <span class="precioProducto">
                            <b>Categoría: </b>
                            <br/>
                            <a href="<?= URL . '/tienda?categoria=' . $prod['data']['categoria'] ?>">
                                <?= ucfirst($prod['categorias']['titulo']); ?>
                            </a>
                        </span>
                            <br/>
                            <?php
                            if ($prod['data']['variable2'] != 0) {
                                if (!empty($prod['data']['precio_descuento']) && $prod['data']['precio_descuento'] > 0) {
                                    ?>
                                    <div class="label label-danger"
                                         style="float:left;font-size: 12px;display:inherit;margin-bottom: 2px !important">
                                        <?= "<b>Antes: </b>$" . ($prod['data']["precio"]) ?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="label label-success"
                                         style="float:left;font-size: 15px;display:inherit;margin-bottom: 2px !important">
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
                                    <div class='label label-danger'>* sin stock</div>
                                    <?php
                                }
                            }
                            ?>
                            <div class="clearfix"></div>
                            <br/>
                            <a href="<?= URL . '/producto/' . $funciones->normalizar_link($prod['data']["titulo"]) . '/' . $prod['data']['cod'] ?>"
                               class="btn btn-primary botonComprar">
                                <i class="fa fa-plus"></i> VER MÁS
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                } else {
                    ?>
                    <h3>No se encontró ningun producto.</h3>
                    <?php
                }
                ?>
            </div>
            <div class="clearfix"></div>
            <div class="row centro mb-10">
                <div class="Zebra_Pagination">
                    <ul>
                        <?php
                        // <li><a href="javascript:void(0)" class="navigation previous disabled" rel="prev"><i class="fa fa-arrow-left"></i></a></li>
                        // <li><a href="/tienda?page=2" class="navigation next" rel="next"><i class="fa fa-arrow-right"></i></a></li>
                        if (!empty($numeroPaginas)) {
                            if ($numeroPaginas != 1 && $numeroPaginas != 0) {
                                $url_final = $funciones->eliminar_get(CANONICAL, "pagina");
                                $links = '';
                                $links .= "<li class='mt-30'><a class='page-numbers' href='" . $url_final . $anidador . "pagina=1'>1</a></li>";
                                $i = max(2, $pagina - 5);

                                if ($i > 2) {
                                    $links .= "<li class='mt-30'><a href='#'>...</a></li>";
                                }
                                for (; $i <= min($pagina + 6, $numeroPaginas); $i++) {
                                    if ($pagina + 1 == $i) {
                                        $current = "current";
                                    } else {
                                        $current = "";
                                    }
                                    $links .= "<li class='mt-30'><a class='$current' href='" . $url_final . $anidador . "pagina=" . $i . "'>" . $i . "</a></li>";
                                }
                                if ($i - 1 != $numeroPaginas) {
                                    $links .= "<li class='mt-30'><a href='#'>...</a></li>";
                                    $links .= "<li class='mt-30'><a href='" . $url_final . $anidador . "pagina=" . $numeroPaginas . "'>" . $numeroPaginas . "</a></li>";
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
            <div class="hidden-sm hidden-xs">
                <div class="titular">
                    <h3>FILTROS DE BÚSQUEDA</h3>
                </div>
                <?php
                foreach ($categorias_data as $cat) {
                    ?>
                    <hr class="hr-chicos"/>
                    <a class="catt" href="<?= URL . '/tienda?categoria=' . $cat['cod']; ?>"><?= $cat['titulo']; ?></a>
                    <br>
                    <?php
                    $subs_data = $subcategoria->listForCount('');
                    foreach ($subs_data as $sub) {
                        if ($sub['categoria'] == $cat['cod']) {
                            ?>
                            <a class="subb" href="<?= URL . '/tienda?categoria=' . $cat['cod'] . '&subcategoria=' . $sub['cod'] ?>"><?= $sub['titulo']; ?></a>
                            <br>
                            <?php
                        }
                    }
                }
                ?>
            </div>
            <br/>
            <?php
            include 'assets/inc/facebook.inc.php';
            ?>
        </div>
    </div>
</div>
<?php
$template->themeEnd();
?>
