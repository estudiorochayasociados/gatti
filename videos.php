<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$id = $funciones->antihack_mysqli(isset($_GET["id"]) ? $_GET["id"] : '');
$videos = new Clases\Videos();
$videos_data = $videos->list('');
$template->set("title", TITULO . " | Videos");
$template->set("description", "Videos de " . TITULO);
$template->set("keywords", "");
$template->themeInit();
?>
<div class="headerTitular">
    <div class="container">
        <h1>Nuestros Videos</h1>
    </div>
</div>
<div class="container cuerpoContenedor">
    <div class="col-md-12 col-xs-12" style="margin-top:10px">
        <div class="row">
            <?php //Videos_Read_Front()
            if (!empty($videos_data)) {
                foreach ($videos_data as $vid) {
                    ?>
                    <div class="col-md-4">
                        <div >
                            <h4><?= $vid['titulo']; ?></h4>
                            <div class="boxInfo">
                                <iframe width="100%" height="250px" src="//www.youtube.com/embed/<?= $vid['link']; ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<?php
$template->themeEnd();
?>
