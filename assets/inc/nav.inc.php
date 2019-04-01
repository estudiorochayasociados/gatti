<?php
$usuario = new Clases\Usuarios();
$carrito = new Clases\Carrito();
$banner = new Clases\Banner();
$categoria = new Clases\Categorias();
$countCarrito = count($carrito->return());
$carro = $carrito->return();
if (isset($_GET['logout'])) {
    $usuario->logout();
}
?>
<div id="load" style="background: rgba(255,255,255,0.5);position: fixed;top:0;text-align: center;height: 100vh;width: 100%;z-index: 999;padding-top:25%">
    <div class="container">
        <div class="error_inner centro">
            <img src="<?= LOGO ?>" width="200">
            <br>
            <i class="mt-10 fa fa-2x fa-spinner  fa-spin"></i>
        </div>
    </div>
</div>
<div class="botonera headerTopProvincias text-center" style="padding-top: 6px">
    <label style="color:#fff">
        ¿De dónde nos estás visitando?
        <select name="provinciaChat" id="provinciaChat" onchange="sector($('#provinciaChat').val())" style="color:#333">
            <option value="1">Bolivia</option>
            <option value="1">Chile</option>
            <option value="1">Paraguay</option>
            <option value="1">Uruguay</option>
            <option value="1">Jujuy</option>
            <option value="1">Salta</option>
            <option value="1">Tucumán</option>
            <option value="1">Santiago del Estero</option>
            <option value="1">Catamarca</option>
            <option value="1">La Rioja</option>
            <option value="1">San Juan</option>
            <option value="1">Córdoba</option>
            <option value="1">San Luis</option>
            <option value="1">Mendoza</option>
            <option value="2">Formosa</option>
            <option value="2">Chaco</option>
            <option value="2">Misiones</option>
            <option value="2">Corrientes</option>
            <option value="2">Santa Fe</option>
            <option value="2">Entre Ríos</option>
            <option value="3">Buenos Aires</option>
            <option value="3">La Pampa</option>
            <option value="3">Neuquén</option>
            <option value="3">Río Negro</option>
            <option value="3">Chubut</option>
            <option value="3">Santa Cruz</option>
            <option value="3">Tierra del Fuego</option>
        </select>
    </label>
</div>
<div class="headerTop">
    <div class="">
        <div class="container">
            <div class="navTop hidden-xs hidden-sm" style="float:left;">
                <a target="_blank" href="<?= URL ?>/assets/archivos/Catalogo_Digital.pdf" title="catalogo digital">CATÁLOGO</a>
                <li><span> / </span></li>
                <a target="_blank" href="<?= URL ?>/c/software" title="software">SOFTWARE DE VENTILADORES</a>
                <li><span> / </span></li>
                <a target="_blank" href="<?= URL ?>/assets/archivos/COMO VENTILAR.pdf" title="GUÍA PARA UNA CORRECTA VENTILACIÓN">GUÍA PARA UNA CORRECTA VENTILACIÓN</a>
                <li><span> / </span></li>
                <a href="<?= URL ?>/c/formularios" title="formularios IMPOSITIVOs">IMPOSITIVO</a>
            </div>
            <div class="navTop  align-right">
                <?php
                if (empty($_SESSION['usuarios'])) {
                    ?>
                    <li>
                        <a href="<?= URL ?>/usuarios" title="iniciar sesion">iniciar sesión</a>
                    </li>
                    <li>
                        <span> / </span>
                    </li>
                    <li>
                        <a href="<?= URL ?>/usuarios" title="registrarme">registrarme</a>
                    </li>
                    <?php
                } else {
                    if ($_SESSION['usuarios']['invitado'] == 0) {
                        ?>
                        <li>
                            <a href="<?= URL ?>/sesion" title="usuarios"><i class="fa fa-user"></i> <?= $_SESSION["usuarios"]["nombre"] ?></a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li>
                            <a href="<?= URL ?>/usuarios" title="iniciar sesion">iniciar sesión</a>
                        </li>
                        <li>
                            <span> / </span>
                        </li>
                        <li>
                            <a href="<?= URL ?>/usuarios" title="registrarme">registrarme</a>
                        </li>
                        <?php
                    }
                }
                ?>
                <?php
                if (!empty($_SESSION["carrito"])) {
                    ?>
                    <li>
                        <span> / </span>
                    </li>
                    <li>
                        <a href="<?= URL ?>/carrito" title="carrito"><i class="fa fa-shopping-cart"></i> Ver carrito</a>
                    </li>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row" style="padding:5px 0px;">
        <div class="col-md-3 col-xs-12 col-sm-12" style="z-index: 0;">
            <center class="hidden-md hidden-lg">
                <a href="index.php" title="inicio">
                    <img alt="LOGO GATTI SA" src="<?= LOGO ?>" class="logo"/>
                </a>
            </center>
            <div class="hidden-xs hidden-sm">
                <a href="index.php" title="inicio">
                    <img alt="LOGO GATTI SA" src="<?= LOGO ?>" class="logo"/>
                </a>
            </div>
        </div>
        <div class="col-md-4 pull-right hidden-xs hidden-sm">
            <a href="https://wa.me/5493564589747" title="whatsapp de gatti" style="margin: 0" target="_blank">
                <div class="pull-right text-right">
                    <h2 style="font-size: 17px">VENTAS CASA CENTRAL<br/><span style="font-size:31px"><?= TELEFONO ?></span></h2>
                </div>
                <img alt="whatsapp de gatti" src="<?= URL ?>/assets/img/whatsapp.png" class="pull-right" style="margin-top:10px;width: 70px"/>
            </a>
        </div>
    </div>
</div>
<div class="botonera">
    <div class="container">
        <div class="row">
            <nav class="navbar">
                <div class="navbar-header">
                    <center>
                        <button type="button"
                                class="navbar-toggle collapsed"
                                data-toggle="collapse"
                                data-target="#navbar"
                                aria-expanded="false"
                                aria-controls="navbar">
                            MENU <i class="fa fa-bars"></i>
                        </button>
                    </center>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="<?= URL ?>/index">
                                <img alt="index" src="<?= URL ?>/assets/img/house.png" width="20"/>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#"
                               class="dropdown-toggle back-a"
                               data-toggle="dropdown"
                               role="button"
                               aria-haspopup="true"
                               aria-expanded="false">
                                <img src="<?= URL ?>/assets/img/factory.png" width="20"/> GATTI
                            </a>
                            <ul class="dropdown-menu back-ul">
                                <li>
                                    <a title="NUESTRA HISTORIA" href="<?= URL ?>/c/nosotros"> NUESTRA HISTORIA</a>
                                </li>
                                <li>
                                    <a title="TUNEL DEL VIENTO" href="<?= URL ?>/c/tunel"> TUNEL DEL VIENTO</a>
                                </li>
                                <li>
                                    <a title="OBRAS INSTALADAS" href="<?= URL ?>/c/obras"> OBRAS INSTALADAS</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#"
                               class="dropdown-toggle back-a"
                               data-toggle="dropdown"
                               role="button"
                               aria-haspopup="true"
                               aria-expanded="false">
                                <img src="<?= URL ?>/assets/img/floor-fan.png" width="20"/> Productos
                            </a>
                            <ul class="dropdown-menu back-ul">
                                <li>
                                    <a href="<?= URL ?>/tienda" title="tienda online">COMPRA ONLINE</a>
                                </li>
                                <li>
                                    <a href="<?= URL ?>/productos" title="productos">FICHAS TÉCNICAS DE PRODUCTO</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#"
                               class="dropdown-toggle back-a"
                               data-toggle="dropdown"
                               role="button"
                               aria-haspopup="true"
                               aria-expanded="false">
                                <img src="<?= URL ?>/assets/img/heart.png" width="20"/> Novedades
                            </a>
                            <ul class="dropdown-menu back-ul">
                                <li>
                                    <a href="<?= URL ?>/novedades" title="novedades">Novedades</a>
                                </li>
                                <li>
                                    <a href="<?= URL ?>/videos" title="videos">Videos</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a title="clientes" href="<?= URL ?>/clientes">
                                <img alt="clientes" src="<?= URL ?>/assets/img/stick-man.png" width="20"/> Clientes
                            </a>
                        </li>
                        <li>
                            <a title="alquileres" href="<?= URL ?>/productos?categoria=7b90340746">
                                <img alt="alquileres" src="<?= URL ?>/assets/img/floor-fan.png" width="20"/> Alquileres
                            </a>
                        </li>
                        <li>
                            <a title="Sociales" href="<?= URL ?>/feed">
                                <img alt="feed" src="<?= URL ?>/assets/img/heart.png" width="20"/> Redes Sociales
                            </a>
                        </li>
                        <li>
                            <a title="contacto" href="<?= URL ?>/contacto">
                                <img alt="contacto" src="<?= URL ?>/assets/img/speech-bubble.png" width="20"/>
                            </a>
                        </li>
                        <div class="hidden-md hidden-lg">
                            <hr/>
                            <li class="hidden-md hidden-lg">
                                <a target="_blank" title="catalogo" href="<?= URL ?>/assets/archivos/Catalogo_Digital.pdf">CATÁLOGO DE LA EMPRESA</a>
                            </li>
                            <br/>
                            <li class="hidden-md hidden-lg">
                                <a target="_blank" title="software" href="<?= URL ?>/c/software">SOFTWARE DE SELECCIÓN DE VENTILADORES</a>
                            </li>
                            <br/>
                            <li class="hidden-md hidden-lg">
                                <a target="_blank" title="archivos" href="<?= URL ?>/assets/archivos/COMO VENTILAR.pdf">GUÍA PARA UNA CORRECTA VENTILACIÓN</a>
                            </li>
                            <br/>
                        </div>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>