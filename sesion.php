<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$enviar = new Clases\Email();
$template->set("title", TITULO . " | Panel");
$template->set("description", "Panel " . TITULO);
$template->set("keywords", "Panel " . TITULO);
$template->set("favicon", FAVICON);
$template->themeInit();
$usuarios = new Clases\Usuarios();
$usuarioSesion = $usuarios->view_sesion();
if (empty($usuarioSesion)||$usuarioSesion['invitado']==1) {
    $funciones->headerMove(URL . "/index");
}
?>
<div class="headerTitular">
    <div class="container">
        <h1>Panel de usuario</h1>
    </div>
</div>
<section class="categories_product_main p_20 mt-10 mb-10">
    <div class="container">
        <div class="categories_main_inner">
            <div class="row row_disable">
                <div class="col-md-12 pt-15">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="<?= URL ?>/sesion/pedidos" class="boton-cuenta btn btn-lg btn-block mb-30 pt-40 pb-40">
                                <i class="fa fa-list fa-2x"></i>
                                <h4>Mis Pedidos</h4>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="<?= URL ?>/sesion/cuenta" class="boton-cuenta btn btn-lg btn-block mb-30 pt-40 pb-40">
                                <i class="fa fa-edit fa-2x"></i>
                                <h4>Mis datos</h4>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="<?= URL ?>/sesion?logout" class="boton-cuenta btn btn-lg btn-block mb-30 pt-40 pb-40">
                                <i class="fa fa-sign-out fa-2x"></i>
                                <h4>Salir</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 float-md-right">
                    <div class="categories_product_area">
                        <div class="row">
                            <?php
                            $op = isset($_GET["op"]) ? $_GET["op"] : 'pedidos';
                            if ($op != '') {
                                include("assets/inc/sesion/" . $op . ".php");
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$template->themeEnd();
?>
