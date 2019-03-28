<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
//
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$novedades = new Clases\Novedades();
$imagen = new Clases\Imagenes();
$categoria = new Clases\Categorias();
//Blog
$cod = $funciones->antihack_mysqli(isset($_GET["cod"]) ? $_GET["cod"] : '');
$novedades->set("cod", $cod);
$novedades_data = $novedades->view();
$fecha = explode("-", $novedades_data['fecha']);
$imagen->set("cod", $cod);
$imagenes_data = $imagen->listForProduct();
//
if (!empty($novedades_data['imagenes'][0]['ruta'])) {
    $ruta_ = URL . "/" . $novedades_data['imagenes'][0]['ruta'];
} else {
    $ruta_ = '';
}
$template->set("title", TITULO . " | " . ucfirst(strip_tags($novedades_data['titulo'])));
$template->set("description", ucfirst(substr(strip_tags($novedades_data['desarrollo']), 0, 160)));
$template->set("keywords", ucfirst(strip_tags($novedades_data['titulo'])));
$template->set("imagen", $ruta_);
$template->set("favicon", FAVICON);
$template->themeInit();
?>
<div class="headerTitular">
    <div class="container">
        <h1>Novedades</h1>
    </div>
</div>
<div class="container cuerpoContenedor">
    <div class="col-md-8 col-xs-12">
        <div class="titular">
            <h3><?= ucfirst($novedades_data['titulo']); ?></h3>
        </div>
        <img src="<?= URL . '/' . $imagenes_data[0]['ruta'] ?>" width="100%" />
        <div class="clearfix"></div>
        <br/>
        <span class="meta-date">
            <i class="fa fa-calendar"></i> <?= $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0] ?>
        </span>
        <hr/>
        <p><?= $novedades_data["desarrollo"]; ?></p>
        <br/>
        <br/>
        <br/>
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="titular">
            <h3>Últimos novedades</h3>
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
