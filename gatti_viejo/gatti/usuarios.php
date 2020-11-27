<?php 
ob_start();
session_start();

include("PHPMailer/class.phpmailer.php");
include("admin/dal/data.php"); 

if(!empty($_SESSION["user"]["id"])) {
  header("location:sesion.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php 
  include("inc/header.inc.php");
  use \DrewM\MailChimp\MailChimp;
  ?>
  <title>Usuarios · Gatti S.A.</title>
  <meta name="description" content="">
  <meta name="author" content="Estudio Rocha & Asociados">
</head>
<body>
 <?php include("inc/nav.inc.php") ?>
 <div class="headerTitular">
   <div class="container">
     <h1>Ingreso de Usuarios</h1>
   </div>
 </div>
 <div class="container cuerpoContenedor"> 
   <div class="col-md-5">
     <div class="titular"><h3>Iniciar Sesión</h3></div>
     <?php
     if (isset($_POST["ingresarBtn"])) {
      $password = antihack(isset($_POST["password"]) ? $_POST["password"] : '');
      $email = antihack(isset($_POST["email"]) ? $_POST["email"] : '');
      if (!empty($email) && !empty($password)) {
        $data = RLogin($email, $password); 
        echo "<script> document.location.href='sesion.php';</script>";
      }
    }  
    ?>
    <form method="post">
      <div class="row">
        <label class="col-md-12 col-xs-12">Email:<br/>
          <input class="form-control" type="email" value="<?php echo antihack(isset($_POST["email"]) ? $_POST["email"] : '') ?>" placeholder="Escribir email" name="email" />
        </label>
        <label class="col-md-12 col-xs-12">Contraseña:<br/>
          <input class="form-control" type="password" value="<?php echo antihack(isset($_POST["password"]) ? $_POST["password"] : '') ?>" placeholder="Escribir contraseña"  name="password" />
        </label>
        <div class="col-md-12 col-xs-12"><br/>
          <input class="btn btn-success" type="submit" value="Iniciar Sesión" name="ingresarBtn" />
        </div>      
      </div>
    </form>
  </div>
  <div class="col-md-7">
    <div class="titular"><h3>Registrarme</h3></div>
    <?php
    $error="none";

    if(isset($_POST["registrarmeBtn"])) { 
      if(isset($_POST["g-recaptcha-response"])){
        $captcha=$_POST["g-recaptcha-response"];
      }

      if(!$captcha){
        $error="block;color:red;padding:5px 0px";
      }

      $secretKey = CAPTCHA_SECRET;
      $ip = $_SERVER['REMOTE_ADDR'];
      $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
      $responseKeys = json_decode($response,true);
      if(intval($responseKeys["success"]) !== 1) {
                //echo '<h2>You are spammer ! Get the @$%K out</h2>';
      } else {
        if (!empty($_POST["nombre"]) && !empty($_POST["password1"]) && !empty($_POST["password2"]) && !empty($_POST["email"])) {
          if ($_POST["password1"] == $_POST["password2"]) {
            $emailRevisar = Revisar_Email("usuarios", "email", $_POST["email"]);
            if ($emailRevisar != "si") {
              $nombre = antihack_mysqli($_POST["nombre"])." ".antihack_mysqli($_POST["apellido"]);
              $apellido = antihack_mysqli($_POST["apellido"]);
              $email = antihack_mysqli($_POST["email"]);
              $pass = antihack_mysqli($_POST["password1"]);
              $telefono = antihack_mysqli($_POST["telefono"]);
              $domicilio = antihack_mysqli($_POST["domicilio"]);
              $localidad = antihack_mysqli($_POST["localidad"]);
              $provincia = antihack_mysqli($_POST["provincia"]); 

              $MailChimp = new MailChimp('132ac5701c716bf24ebd86e4f17f468f-us16');
              $list_id = 'e7332a2eb1';
              $result = $MailChimp->post("lists/$list_id/members", [
                'email_address' => $email,
                'status'        => 'subscribed'
              ]);

              Hubspot_AddContact($email,$nombre,$apellido,$telefono,$localidad,$provincia);

              $mensaje = 'Nuevo usuario registrado<br/>';
              $mensaje .= "<b>Nombre y apellido</b>: ".antihack_mysqli($_POST["nombre"])." ".antihack_mysqli($_POST["apellido"])."<br/>";
              $mensaje .= "<b>Email</b>: ".antihack_mysqli($_POST["email"])."<br/>";
              $mensaje .= "<b>Provincia</b>: ".antihack_mysqli($_POST["provincia"])."<br/>";
              $mensaje .= "<b>Localidad</b>: ".antihack_mysqli($_POST["localidad"])."<br/>";
              $mensaje .= "<b>Domicilio</b>: ".antihack_mysqli($_POST["domicilio"])."<br/>";
              $mensaje .= "<b>Teléfono</b>: ".antihack_mysqli($_POST["telefono"])."<br/>";

              $asunto = "Nuevo usuario registrado";
              $receptor = "web@gattisa.com.ar";

              $sql = "INSERT INTO `usuarios`
              (`nombre`, `email`, `empresa`, `cuit`,`pass`, `telefono`, `direccion`, `localidad`, `provincia`, `pais`,`inscripto`) 
              VALUES
              ('$nombre','$email', '$empresa', '$cuit','$pass','$telefono','$domicilio','$localidad','$provincia', '$pais', NOW())";

              $link = Conectarse_Mysqli();
              $r = mysqli_query($link,$sql);

              if($r) {
                RLogin($email, $pass);
                Enviar_User_Admin($asunto,$mensaje,$receptor);
              }

              echo "<script> document.location.href='sesion.php';</script>";

              echo '<div class="alert alert-success animated fadeInDown" id="" role="alert">Muchas gracias ' . strtoupper(strtoupper($nombre)) . ', te registraste exitosamente!.</div>';
            } else {
              echo "<div class='alert alert-danger'>Lo sentimos el correo electrónico ya existe.</div>";
            }
          } else {
            echo "<div class='alert alert-danger'>Lo sentimos las contraseñas no coindicen.</div>";
          }
        } else {
          echo '<div class="alert alert-danger animated fadeInDown" id="" role="alert">Te pedimos disculpas , pero no podemos enviar tu mensaje , porque son necesarios todos los datos.</div>';
        }
      }
    }
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
        <label class="col-md-6 col-xs-6">Password:<br/>
          <input class="form-control" type="password" value="<?php echo antihack(isset($_POST["password1"]) ? $_POST["password1"] : ''); ?>" placeholder="Escribir password"  name="password1" required/>
        </label>
        <label class="col-md-6 col-xs-6">Repassword:<br/>
          <input class="form-control" type="password" value="<?php echo antihack(isset($_POST["password2"]) ? $_POST["password2"] : ''); ?>" placeholder="Escribir repassword"  name="password2" required/>
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