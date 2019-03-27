<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$id = $funciones->antihack_mysqli(isset($_GET["id"]) ? $_GET["id"] : '');
$contenido = new Clases\Contenidos();
$contenido->set("cod", $id);
$contenido_data = $contenido->view();
$template->set("title", TITULO . " | " . ucfirst(strip_tags($contenido_data['cod'])));
$template->set("description", ucfirst(substr(strip_tags($contenido_data['contenido']), 0, 160)));
$template->set("keywords", "");
$template->set("favicon", FAVICON);
$template->themeInit();
if (empty($contenido_data)) {
    $funciones->headerMove(URL);
}
?>
<div class="headerTitular">
    <div class="container">
        <?php
        switch ($contenido_data['cod']) {
            case 'nosotros':
                echo "<h1>NOSOTROS</h1>";
                break;
            case 'tunel':
                echo "<h1>TUNEL DEL VIENTO</h1>";
                break;
            case 'obras':
                echo "<h1>OBRAS INSTALADAS</h1>";
                break;
            case 'software':
                echo "<h1>SOFTWARE DE VENTILADORES</h1>";
                break;
            case 'formularios':
                echo "<h1>FORMULARIOS IMPOSITIVOS</h1>";
                break;
        }
        ?>
    </div>
</div>
<div class="container cuerpoContenedor">
    <?= $contenido_data['contenido']; ?>
</div>
<?php
$template->themeEnd();
?>

