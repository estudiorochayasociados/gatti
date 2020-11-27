<?php
$index = strpos($_SERVER['REQUEST_URI'], "index");
$novedades = strpos($_SERVER['REQUEST_URI'], "novedades");
$nosotros = strpos($_SERVER['REQUEST_URI'], "nosotros");
$productos = strpos($_SERVER['REQUEST_URI'], "productos");
$videos = strpos($_SERVER['REQUEST_URI'], "videos");
$navidad = strpos($_SERVER['REQUEST_URI'], "navidad");
$contacto = strpos($_SERVER['REQUEST_URI'], "contacto");
$clientes = strpos($_SERVER['REQUEST_URI'], "clientes");
$alquileres = strpos($_SERVER['REQUEST_URI'], "alquileres");
$galeria = strpos($_SERVER['REQUEST_URI'], "galeria");
$catalogo = strpos($_SERVER['REQUEST_URI'], "catalogo");
$tienda = strpos($_SERVER['REQUEST_URI'], "tienda");
$feed = strpos($_SERVER['REQUEST_URI'], "feed");

?> 
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
        <a target="_blank" href="<?php  echo BASE_URL ?>/Catalogo_Digital.pdf" title="catalogo digital">CATÁLOGO</a>
        <li><span> / </span></li>
        <a target="_blank" href="<?php  echo BASE_URL ?>/software.php" title="software">SOFTWARE DE VENTILADORES</a>
        <li><span> / </span></li>
        <a target="_blank" href="<?php  echo BASE_URL ?>/archivos/COMO VENTILAR.pdf" title="GUÍA PARA UNA CORRECTA VENTILACIÓN">GUÍA PARA UNA CORRECTA VENTILACIÓN</a>
        <li><span> / </span></li>
        <a href="<?php  echo BASE_URL ?>/formularios" title="formularios IMPOSITIVOs">IMPOSITIVO</a>
      </div>
      <div class="navTop  align-right">
        <?php
        if(empty($_SESSION["user"]["id"])) {
          ?>
          <li><a href="<?php  echo BASE_URL ?>/usuarios" title="iniciar sesion">iniciar sesión</a></li>
          <li><span> / </span></li>
          <li><a href="<?php  echo BASE_URL ?>/usuarios" title="registrarme">registrarme</a></li>
          <?php
        } else {
          ?>
          <li><a href="usuarios.php" title="usuarios"><i class="fa fa-user"></i> <?php echo $_SESSION["user"]["nombre"] ?></a></li>          
          <?php
        }
        ?>

        <?php if(!empty($_SESSION["carrito"])) {   ?>
          <li><span> / </span></li>
          <li><a href="<?php echo BASE_URL ?>/carrito" title="carrito"><i class="fa fa-shopping-cart"></i> Ver carrito</a></li>          
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
        <a href="index.php" title="inicio"><img alt="inicio" alt="LOGO GATTI SA" src="<?php  echo BASE_URL ?>/img/logo.png" class="logo" /></a>
      </center>
      <div class="hidden-xs hidden-sm">
        <a href="index.php" title="inicio"><img alt="inicio" alt="LOGO GATTI SA" src="<?php  echo BASE_URL ?>/img/logo.png" class="logo" /></a>
      </div>
    </div>
    <div class="col-md-4 pull-right hidden-xs hidden-sm">
      <a href="https://wa.me/5493564589747" title="whatsapp de gatti" style="margin: 0" target="_blank">
        <div class="pull-right text-right">
          <h2 style="font-size: 17px">VENTAS CASA CENTRAL<br/><span style="font-size:31px">3564 589747</span></h2>
        </div>
        <img alt="whatsapp de gatti" src="<?php echo BASE_URL ?>/img/whatsapp.png" class="pull-right" style="margin-top:10px;width: 70px" />
      </a>
    </div>
  </div>
</div>
<div class="botonera">
  <div class="container">
    <div class="row">     
     <nav class="navbar"  >
      <div class="navbar-header">
        <center>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            menu <i class="fa fa-bars"></i>
          </button>          
        </center>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li  <?php if($index != '') { echo 'class="active"'; } ?>><a href="<?php  echo BASE_URL ?>/index"><img alt="index" src="<?php  echo BASE_URL ?>/img/house.png" width="20" /></a></li>

          <li class="<?php if($nosotros != '') { echo 'active'; } ?> dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <img src="<?php  echo BASE_URL ?>/img/factory.png" width="20" />  gatti
            </a>
            <ul class="dropdown-menu">
              <li><a title="NUESTRA HISTORIA" href="<?php  echo BASE_URL ?>/nosotros">  NUESTRA HISTORIA</a></li>
              <li><a title="TUNEL DEL VIENTO" href="<?php  echo BASE_URL ?>/tunel">  TUNEL DEL VIENTO</a></li>
              <li><a title="OBRAS INSTALADAS" href="<?php  echo BASE_URL ?>/obras">  OBRAS INSTALADAS</a></li>
            </ul>
          </li>

          <li class="<?php if($productos != '') { echo 'active'; } ?> dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <img src="<?php  echo BASE_URL ?>/img/floor-fan.png" width="20" />  productos
            </a>
            <ul class="dropdown-menu">
              <li <?php if($novedades != '') { echo 'class="active"'; } ?> ><a href="<?php  echo BASE_URL ?>/tienda" title="tienda online">COMPRA ONLINE</a></li>
              <li  <?php if($videos != '') { echo 'class="active"'; } ?> ><a href="<?php  echo BASE_URL ?>/productos" title="productos">FICHAS TÉCNICAS DE PRODUCTO</a></li>   
              <?php //Categoria_Read_Productos_Nav() ?>
            </ul>
          </li>
<!--
          <li  <?php if($tienda != '') { echo 'class="active"'; } ?> ><a title="tienda online" href="<?php  echo BASE_URL ?>/tienda"><img alt="tienda" src="<?php  echo BASE_URL ?>/img/sticker.png" width="20" /> tienda</a></li>
        --> 
        <li class="<?php if($novedades != '') { echo 'active'; } ?> dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <img src="<?php  echo BASE_URL ?>/img/heart.png" width="20" />  novedades
          </a>
          <ul class="dropdown-menu">
            <li <?php if($novedades != '') { echo 'class="active"'; } ?> ><a href="<?php  echo BASE_URL ?>/novedades" title="novedades">novedades</a></li>
            <li  <?php if($videos != '') { echo 'class="active"'; } ?> ><a href="<?php  echo BASE_URL ?>/videos" title="videos">videos</a></li>   
          </ul>
        </li>                  
        <li  <?php if($clientes != '') { echo 'class="active"'; } ?> ><a title="clientes" href="<?php  echo BASE_URL ?>/clientes"><img alt="clientes" src="<?php  echo BASE_URL ?>/img/stick-man.png" width="20" /> clientes</a></li>  
        <li  <?php if($alquileres != '') { echo 'class="active"'; } ?> ><a title="alquileres" href="<?php  echo BASE_URL ?>/alquileres"><img alt="alquileres" src="<?php  echo BASE_URL ?>/img/floor-fan.png" width="20" /> alquileres</a></li>  
        <li  <?php if($feed != '') { echo 'class="active"'; } ?> ><a title="Sociales" href="<?php  echo BASE_URL ?>/feed"><img alt="feed" src="<?php  echo BASE_URL ?>/img/heart.png" width="20" /> Redes Sociales</a></li>    
        <li  <?php if($contacto != '') { echo 'class="active"'; } ?> ><a title="contacto" href="<?php  echo BASE_URL ?>/contacto"><img alt="contacto" src="<?php  echo BASE_URL ?>/img/speech-bubble.png" width="20" /> </a></li>                
        <div class="hidden-md hidden-lg">
          <hr/>
          <li class="hidden-md hidden-lg"><a target="_blank" title="catalogo" href="<?php  echo BASE_URL ?>/catalogo digital/">CATÁLOGO DE LA EMPRESA</a></li><br/>

          <li class="hidden-md hidden-lg"><a target="_blank" title="software" href="<?php  echo BASE_URL ?>/software">SOFTWARE DE SELECCIÓN DE VENTILADORES</a></li><br/>

          <li class="hidden-md hidden-lg"><a target="_blank" title="archivos" href="<?php  echo BASE_URL ?>/archivos/COMO VENTILAR.pdf">GUÍA PARA UNA CORRECTA VENTILACIÓN</a></li><br/>
        </div>
      </ul>            
    </div>
  </nav>
</div>
</div>
</div>