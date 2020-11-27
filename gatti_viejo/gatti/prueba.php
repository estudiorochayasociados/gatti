<?php 
ob_start();
session_start();

include("PHPMailer/class.phpmailer.php");
include("admin/dal/data.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php 
  include("inc/header.inc.php");
  use \DrewM\MailChimp\MailChimp;


  ?>
  <title>Finalizar Carrito | Gatti S.A.</title>
  <meta name="description" content="Ingresá como usuario de Gatti SA y empezá a comprar tus ventiladores, extractores y aires acondicionados">
  <meta name="keywords" content="ingreso de usuarios para tienda online">
  <meta name="author" content="Estudio Rocha & Asociados">
</head>
<body>
 <?php include("inc/nav.inc.php") ?>
 <div class="headerTitular">
   <div class="container">
     <h1>Finalizar carrito</h1>
   </div>
 </div>
 <div class="container cuerpoContenedor">  
  <div class="col-md-12">
    <div class="titular"><h3>Dejanos tus datos para finalizar la comprar</h3></div>
    <?php
    Enviar_User_Admin("prueba","mensaje","mkt@gattisa.com.ar");
    ?>
  <form method="post" autocomplete="off">
    <div class="row">
      <label class="col-md-6 col-xs-6">Nombre:<br/>
        <input class="form-control" type="text" value="<?php echo antihack(isset($_POST["nombre"]) ? $_POST["nombre"] : ''); ?>" placeholder="Escribir nombre" name="nombre" required/>
      </label>
      <label class="col-md-6 col-xs-6">Apellido:<br/>
        <input class="form-control" type="text" value="<?php echo antihack(isset($_POST["apellido"]) ? $_POST["apellido"] : ''); ?>" placeholder="Escribir apellido" name="apellido" required/>
      </label>
      <label class="col-md-12 col-xs-12">Email:<br/>
        <input class="form-control" type="email" value="<?php echo antihack(isset($_POST["email"]) ? $_POST["email"] : ''); ?>" placeholder="Escribir email" name="email" required/>
      </label> 
      <label class="col-md-6 col-xs-6">Telefono:<br/>
        <input class="form-control" type="text" value="<?php echo antihack(isset($_POST["telefono"]) ? $_POST["telefono"] : ''); ?>" placeholder="Escribir telefono"  name="telefono" required/>
      </label>  
      <label class="col-md-6 col-xs-6">Direccion:<br/>
        <input class="form-control" type="text" value="<?php echo antihack(isset($_POST["domicilio"]) ? $_POST["domicilio"] : ''); ?>" placeholder="Escribir direccion"  name="domicilio" required/>
      </label>
      <label class="col-md-6 col-xs-6">Localidad:<br/>
        <input class="form-control" type="text" value="<?php echo antihack(isset($_POST["localidad"]) ? $_POST["localidad"] : ''); ?>" placeholder="Escribir localidad"  name="localidad" required />
      </label>
      <label class="col-md-6 col-xs-6">Provincia:<br/>
        <input class="form-control" type="text" value="<?php echo antihack(isset($_POST["provincia"]) ? $_POST["provincia"] : ''); ?>" placeholder="Escribir provincia"  name="provincia"  required/>
      </label>
      <label  class="col-md-12 col-xs-12 mt-10 mb-10 crear" style="font-size:16px;margin-top: 20px">
        <input type="checkbox" name="invitado" value="1" onchange="$('.password').slideToggle()"> ¿Deseas crear una cuenta de usuario y dejar tus datos grabados para la próxima compra?
      </label>       
      <div class="col-md-6 col-xs-6 password" style="display: none;">Contraseña:<br/>
        <input class="form-control  mb-10" type="password" value="<?php echo isset($_POST["password1"]) ? $_POST["password1"] : '' ?>" placeholder="Escribir password"  name="password1" />
      </div>
      <div class="col-md-6 col-xs-6 password" style="display: none;">Repetir Contraseña:<br/>
        <input class="form-control  mb-10" type="password" value="<?php echo isset($_POST["password2"]) ? $_POST["password2"] : '' ?>" placeholder="Escribir repassword"  name="password2" />
      </div>  
<!--
      <label  class="col-md-12 col-xs-12 mt-10 mb-10" style="font-size:16px;margin-top: 20px">
        <input type="checkbox" name="factura" value="0" onchange="$('.factura').slideToggle()"> Solicitar FACTURA A
      </label>       
      <div class="col-md-12 col-xs-12 factura" style="display: none;">CUIT:<br/>
        <input class="form-control  mb-10" type="number" value="<?php echo isset($_POST["cuit"]) ? $_POST["cuit"] : '' ?>" placeholder="Escribir CUIT"  name="cuit"  />
      </div>         
-->
      <div class="col-sm-12"><br/>
        <h5 style="display: <?php echo $error; ?>">Error de validación</h5>
        <div class="g-recaptcha" data-sitekey="<?php echo CAPTCHA_SITE ?>"></div><br/> 
      </div>

      <div class="col-md-12 col-xs-12"><br/>
        <input class="btn btn-success" type="submit" value="Registrarme" name="registrarmeBtn" />
      </div>      
    </div>
  </form>
</div>
<div class="clearfix"></div><br><br>
</div>  
<?php include("inc/footer.inc.php"); ?>
</body>
</html>
<?php
@ob_end_flush();
?>