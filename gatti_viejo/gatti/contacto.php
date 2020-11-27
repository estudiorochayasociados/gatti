    <?php 
    ob_start();
    @session_start();
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
      <title>Contacto · Gatti S.A.</title>
      <meta name="description" content="">
      <meta name="author" content="Estudio Rocha & Asociados">
    </head>
    <body>
     <?php include("inc/nav.inc.php") ?>
     <div class="headerTitular">
       <div class="container">
        <h1>Contacto</h1>
      </div>
    </div>
    <div class="container cuerpoContenedor"> 
     <div class="col-md-8">
      <?php
     /* if(isset($_POST["registrarmeBtn"])) {
       $nombre = antihack(isset($_POST["nombre"]) ? $_POST["nombre"] : '');
       $apellido = antihack(isset($_POST["apellido"]) ? $_POST["apellido"] : '');
       $email = antihack(isset($_POST["email"]) ? $_POST["email"] : '');
       $pais = antihack(isset($_POST["pais"]) ? $_POST["pais"] : '');
       $provincia = antihack(isset($_POST["provincia"]) ? $_POST["provincia"] : '');
       $localidad = antihack(isset($_POST["localidad"]) ? $_POST["localidad"] : '');
       $direccion = antihack(isset($_POST["direccion"]) ? $_POST["direccion"] : '');
       $telefono = antihack(isset($_POST["telefono"]) ? $_POST["telefono"] : '');
       $mensajeF = antihack(isset($_POST["mensaje"]) ? $_POST["mensaje"] : '');


       Hubspot_AddContact($email,$nombre,$apellido,$telefono,$localidad,$provincia);

       $mensaje = '';
       $mensaje .= "<b>Nombre y apellido</b>: ".$nombre." ".$apellido."<br/>";
       $mensaje .= "<b>Email</b>: ".$email."<br/>";
       $mensaje .= "<b>País</b>: ".$pais."<br/>";
       $mensaje .= "<b>Provincia</b>: ".$provincia."<br/>";
       $mensaje .= "<b>Localidad</b>: ".$localidad."<br/>";
       $mensaje .= "<b>Domicilio</b>: ".$direccion."<br/>";
       $mensaje .= "<b>Teléfono</b>: ".$telefono."<br/>";
       $mensaje .= "<b>Mensaje</b>: ".$mensajeF."<br/>";

       $asunto = "Nuevo mensaje de contacto";
       $receptor = "web@gattisa.com.ar";


       $MailChimp = new MailChimp('132ac5701c716bf24ebd86e4f17f468f-us16');
       $list_id = 'e7332a2eb1';
       $result = $MailChimp->post("lists/$list_id/members", [
        'email_address' => $email,
        'status'        => 'subscribed'
      ]);
       Enviar_User_Admin($asunto,$mensaje,$receptor);
     }
     ?>
     <form method="post">
      <div class="row">
        <label class="col-md-6 col-xs-6">NOMBRE:<br/>
          <input class="form-control" type="text" value="<?php echo isset($_POST["nombre"]) ? $_POST["nombre"] : '' ?>" placeholder="NOMBRE" name="nombre" required />
        </label>
        <label class="col-md-6 col-xs-6">APELLIDO:<br/>
          <input class="form-control" type="text" value="<?php echo isset($_POST["apellido"]) ? $_POST["apellido"] : '' ?>" placeholder="APELLIDO" name="apellido" required />
        </label>
        <label class="col-md-12 col-xs-12">EMAIL:<br/>
          <input class="form-control" type="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : '' ?>" placeholder="EMAIL" name="email" required />
        </label> 
        <label class="col-md-12 col-xs-12">PAÍS:<br/>
          <input class="form-control" type="text" value="<?php echo isset($_POST["pais"]) ? $_POST["pais"] : '' ?>" placeholder="PAÍS"  name="pais" required />
        </label>  
        <label class="col-md-6 col-xs-6">TELÉFONO:<br/>
          <input class="form-control" type="text" value="<?php echo isset($_POST["telefono"]) ? $_POST["telefono"] : '' ?>" placeholder="TELÉFONO"  name="telefono" required />
        </label>  
        <label class="col-md-6 col-xs-6">DIRECCIÓN:<br/>
          <input class="form-control" type="text" value="<?php echo isset($_POST["direccion"]) ? $_POST["direccion"] : '' ?>" placeholder="DIRECCIÓN"  name="direccion" required />
        </label>
        <label class="col-md-6 col-xs-6">LOCALIDAD:<br/>
          <input class="form-control" type="text" value="<?php echo isset($_POST["localidad"]) ? $_POST["localidad"] : '' ?>" placeholder="LOCALIDAD"  name="localidad" required />
        </label>
        <label class="col-md-6 col-xs-6">PROVINCIA:<br/>
          <input class="form-control" type="text" value="<?php echo isset($_POST["provincia"]) ? $_POST["provincia"] : '' ?>" placeholder="PROVINCIA"  name="provincia" required />
        </label>
        <label class="col-md-12 col-xs-12">MENSAJE:<br/>
          <textarea class="form-control" value="<?php echo isset($_POST["mensaje"]) ? $_POST["mensaje"] : '' ?>" placeholder="MENSAJE"  name="mensaje" required></textarea>
        </label>
        <label class="col-md-12 col-xs-12"><br/>
          <input class="btn btn-success" type="submit" value="Enviar" name="registrarmeBtn" />
        </label>          
      </div>
    </form>
    <?php  */ ?>

    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/shell.js"></script>
    <script>
      hbspt.forms.create({
        portalId: "4511499",
        formId: "add01abd-6a51-4b3b-8611-b2e0efd063be"
      });
    </script>
    <br/>    
  </div>
  <div class="col-md-4">
    <?php  Traer_Contenidos("contacto"); ?>
    <div class="clearfix"></div>
    <a target="_blank" href="https://www.facebook.com/gattisa/"><i style="font-size: 30px;margin-right: 10px;margin-top: 10px;color:#fff" class="fa fa-facebook-square"></i></a>
    <a target="_blank" href="https://twitter.com/gattivent"><i style="font-size: 30px;margin-right: 10px;margin-top: 10px;color:#fff" class="fa fa-twitter-square"></i></a>
    <a target="_blank" href="https://www.instagram.com/gattiventilacion/"><i style="font-size: 30px;margin-right: 10px;margin-top: 10px;color:#fff" class="fa fa-instagram"></i></a>
    <a target="_blank" href="https://www.youtube.com/channel/UC7G9zR9o0vymBSb63dSvkLA"><i style="font-size: 30px;margin-right: 10px;margin-top: 10px;color:#fff" class="fa fa-youtube-square"></i></a>
    <?php  Traer_Contenidos("facebook"); ?>
    <br/><br/>
  </div>
</div>  
<div class="clearfix"></div>
<div class="row">
  <div id="map" style="width:100%;height:300px"></div>
</div>
<?php include("inc/footer.inc.php"); ?>

<script type="text/javascript">
  function initialize() {
   var myLatlng = new google.maps.LatLng(-31.419759,-62.064426);
   var mapOptions = {
    zoom: 16,
    center: myLatlng,
    scrollwheel: false,
    navigationControl: false,
    mapTypeControl: false,
    scaleControl: false,
    draggable: false
  };

  var map = new google.maps.Map(document.getElementById('map'), mapOptions);

  var marker = new google.maps.Marker({
    position: myLatlng,
    map: map
  });

  infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
</body>
</html>
<?php
ob_end_flush();
?>
