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
$template->set("description", "Página principal de ".TITULO);
$template->set("keywords", "");
$template->set("favicon", FAVICON);
$template->themeInit();
////Datos
///Productos
$productos_datalast = $producto->listWithOps('', '', 10);
$productos_datarand = $producto->listWithOps('', 'RAND()', 10);
///Blogs
$novedades_datalast = $novedad->listWithOps('', '', 4);
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
$template->themeEnd();
?>
