<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$id = $funciones->antihack_mysqli(isset($_GET["id"]) ? $_GET["id"] : '');
$contenido = new Clases\Contenidos();
$contenido->set("cod", $id);
$contenido_data = $contenido->view();
$template->set("title", TITULO . " | Redes sociales");
$template->set("description", "Redes sociales de ".TITULO);
$template->set("keywords", "");
$template->themeInit();
?>
<div class="headerTitular">
    <div class="container">
        <h1>Seguinos en nuestras redes</h1>
    </div>
</div>
<div class="container cuerpoContenedor">
    <style>

        .powered-by {
            display: none !important;
            opacity: 0 !important;
        }

    </style>
    <!-- The Javascript can be moved to the end of the html page before the </body> tag -->
    <!-- Place <div> tag where you want the feed to appear -->
    <div id="curator-feed"><a href="https://curator.io" target="_blank" class="crt-logo crt-tag">Powered by Curator.io</a></div>
    <!-- The Javascript can be moved to the end of the html page before the </body> tag -->
    <script type="text/javascript">
        /* curator-feed */
        (function(){
            var i, e, d = document, s = "script";i = d.createElement("script");i.async = 1;
            i.src = "https://cdn.curator.io/published/01eabcb5-051a-41a7-84f6-36499673ef64.js";
            e = d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
        })();
    </script>
    <style>
        #curator-feed .crt-logo{
            position: absolute;
            right: 900000px;
        }
    </style>
</div>
<?php
$template->themeEnd();
?>
