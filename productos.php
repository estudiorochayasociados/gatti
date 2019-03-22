<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
//
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$producto = new Clases\Productos();
$categoria = new Clases\Categorias();
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
$categoria->set("area", "productos");
$categorias_data = $categoria->listForArea('');
sort($categorias_data);
//Productos
$pagina = $funciones->antihack_mysqli(isset($_GET["pagina"]) ? $_GET["pagina"] : '0');
$categoria_get = $funciones->antihack_mysqli(isset($_GET["categoria"]) ? $_GET["categoria"] : '');
$titulo = $funciones->antihack_mysqli(isset($_GET["buscar"]) ? $_GET["buscar"] : '');
//
$cantidad = 6;

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

$filter = array("variable2='0'");

if (!empty($categoria_get)) {
    $categoria->set("cod", $categoria_get);
    $categoria_data_filtro = $categoria->view();
    $cod = $categoria_data_filtro['cod'];
    array_push($filter, "categoria='$cod'");
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
$template->set("favicon", FAVICON);
$template->set("body", "home3");
$template->themeInit();
?>
<div class="headerTitular">
    <div class="container">
        <h1>Productos</h1>
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
                        <a href="<?= URL ?>/productos">
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
                        //Categoria_Read_Productos() ;
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
            <?php
            //Portfolio_Read_Front(0, $buscar, '', 4)
            if (!empty($productos_data)) {
                foreach ($productos_data as $prod){
                    ?>
                    <div class=" col-md-4 col-xs-12 product-box hvr-outline-in">
                        <a href="<?= URL . '/producto/' . $funciones->normalizar_link($prod['data']["titulo"]) . '/' . $prod['data']['cod'] ?>"
                           class="relative">
                            <?php if (true) { ?>
                                <span class="top label label-info">¡PRODUCTO EN OFERTA!</span>
                            <?php } ?>
                            <div class="product-wrap" style="height:150px;overflow:hidden;background:url('<?php //echo $imagen ?>') no-repeat center center;background-size:contain"></div>
                        </a>
                        <h1 class="tituloProducto"><a href="<?php //BASE_URL . "/producto/" . normaliza_acentos(htmlspecialchars($row["nombre_portfolio"])) . "/" . $row["id_portfolio"] ?>" style="font-size:25px"><?php //echo($titulo); ?></a></h1>
                        <span class="precioProducto"><b>Categoría: </b><br/><a href="<?php //echo BASE_URL ?>/<?php //echo $tipoURI ?>/<?php //echo $row2["id_categoria"] ?>"><?php //echo($row2["nombre_categoria"]) ?></a></span><br/>
                        <?php
                        //if ($tipo != 0) {
                        //    if ($row["preciodesc_portfolio"] != 0) {
                        //        ?>
                        //        <div class="label label-danger" style="float:left;font-size: 12px;display:inherit;margin-bottom: 2px !important"><?php //echo "<b>Antes: </b>$" . ($row["preciodesc_portfolio"]) ?></div>
                        //        <div class="clearfix"></div>
                        //        <div class="label label-success" style="float:left;font-size: 15px;display:inherit;margin-bottom: 2px !important"><?php //echo "<b>Ahora: </b>$" . ($precio) ?></div>
                        //        <div class="clearfix"></div>
                        //        <?php
                        //    } else {
                        //        ?>
                        //        <span class="precioProducto"><?php //echo "<b>Precio: </b>$" . ($precio) ?></span><br/>
                        //        <?php
                        //    }
                        //    ?>
                        //    <span class="precioProducto" style="color:red"><?php //echo "<i>Precio de contado: $" . ($precio - ($precio * 10 / 100)) . "</i>" ?></span>
                        //    <?php
                        //    if ($row["stock_portfolio"] == 0) {
                        //        echo "<div class='label label-danger'>* sin stock</div>";
                        //    }
                        //}
                        ?>
                        <div class="clearfix"></div>
                        <br/>
                        <a href="<?php //BASE_URL . "/producto/" . normaliza_acentos(htmlspecialchars($row["nombre_portfolio"])) . "/" . $row["id_portfolio"] ?>" class="btn btn-primary botonComprar"><i class="fa fa-plus"></i> VER MÁS</a>
                    </div>
                    <?php
                }
                ?>
                <?php
            } else {
                ?>
                <?php
            }
            ?>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class="hidden-sm hidden-xs">
                <div class="titular">
                    <h3>FILTROS DE BÚSQUEDA</h3>
                </div>
                <?php //Categoria_Read_Productos_Botones(0) ?>
            </div>
            <br/>
            <?php //Traer_Contenidos("facebook"); ?>
        </div>
    </div>
</div>
<?php
$template->themeEnd();
?>
