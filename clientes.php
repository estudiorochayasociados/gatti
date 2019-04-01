<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$id = $funciones->antihack_mysqli(isset($_GET["id"]) ? $_GET["id"] : '');
$galerias = new Clases\Galerias();
$imagenes = new Clases\Imagenes();
$filter = array("titulo='Clientes'");
$galerias_data = $galerias->list($filter);
$template->set("title", TITULO . " | Videos");
$template->set("description", "Videos de " . TITULO);
$template->set("keywords", "");
$template->themeInit();
?>
<div class="headerTitular">
    <div class="container">
        <h1>Clientes</h1>
    </div>
</div>
<div class="container cuerpoContenedor">
    <?php
    if (!empty($galerias_data)) {
        foreach ($galerias_data as $gal) {
            $filtro = array("cod='".$gal['cod']."'");
            $imagenes_data = $imagenes->list($filtro);
            foreach ($imagenes_data as $img) {
                ?>
                <div class="col-md-2 mt-5">
                    <div style="background:url('<?= $img['ruta']; ?>') no-repeat center center/contain;height:200px;">
                    </div>
                </div>
                <?php
            }
        }
    }
    ?>
</div>
<?php
$template->themeEnd();
?>
