<div class="col-md-12">
  <div class="titular">
    <h3>Mi cuenta</h3>      
  </div>  <?php
  $data = Usuario_TraerPorId($_SESSION["user"]["id"]);
   if (isset($_POST["registrarmeBtn"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["password1"]) && !empty($_POST["password2"]) && !empty($_POST["email"])) {
      if ($_POST["password1"] == $_POST["password2"]) {
        if($data["email"] != $_POST["email"]) {
          $emailRevisar = Revisar_Email("usuarios", "email", $_POST["email"]);  
        } else {
          $emailRevisar = "no";
        }

        if ($emailRevisar != "si") {
          $id = $_SESSION['user']['id'];
          $nombre = $_POST["nombre"];
          $email = $_POST["email"];
          $empresa = $_POST["empresa"];
          $pass = $_POST["password1"];
          $telefono = $_POST["telefono"];
          $domicilio = $_POST["domicilio"];
          $localidad = $_POST["localidad"];
          $provincia = $_POST["provincia"];
          $pais = $_POST["pais"];
          $cuit = $_POST["cuit"];

          $sql =  "
          UPDATE `usuarios`
          SET
          `nombre` = '$nombre',
          `email` = '$email',
          `pass` = '$pass',
          `empresa` = '$empresa',
          `cuit` = '$cuit',
          `telefono` = '$telefono',
          `direccion` = '$domicilio',
          `localidad` = '$localidad',
          `provincia` = '$provincia',
          `pais` = '$pais'
          WHERE `id` = '$id' ";

          $link = Conectarse();
          $r = mysql_query($sql, $link);

          RLogin($email, $pass);
          header("Refresh:0");

          echo '<div class="alert alert-success animated fadeInDown" id="" role="alert">Muchas gracias ' . strtoupper(strtoupper($nombre)) . ', se modificó exitosamente!.</div>';
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
  ?>
  <form method="post" autocomplete="off">
    <div class="row">
      <label class="col-md-12 col-xs-6">Nombre:<br/>
        <input class="form-control" type="text" value="<?php echo isset($data["nombre"]) ? $data["nombre"] : '' ?>" placeholder="Nombre" name="nombre" required/>
      </label> 
      <label class="col-md-12 col-xs-12">Email:<br/>
        <input class="form-control" type="email" value="<?php echo isset($data["email"]) ? $data["email"] : '' ?>" placeholder="Email" name="email" required/>
      </label>
      <label class="col-md-6 col-xs-12">Empresa:<br/>
        <input class="form-control" type="text" value="<?php echo isset($data["empresa"]) ? $data["empresa"] : '' ?>" placeholder="Empresa" name="empresa" />
      </label>
      <label class="col-md-6 col-xs-12">Cuit:<br/>
        <input class="form-control" type="text" value="<?php echo isset($data["cuit"]) ? $data["cuit"] : '' ?>" placeholder="Cuit" name="cuit" />
      </label>
      <label class="col-md-6 col-xs-6">Password:<br/>
        <input class="form-control" type="password" value="<?php echo isset($data["pass"]) ? $data["pass"] : '' ?>" placeholder="Password"  name="password1" required/>
      </label>
      <label class="col-md-6 col-xs-6">Repassword:<br/>
        <input class="form-control" type="password" value="<?php echo isset($data["pass"]) ? $data["pass"] : '' ?>" placeholder="Repassword"  name="password2" required/>
      </label>
      <label class="col-md-12 col-xs-12">Pais:<br/>
        <input class="form-control" type="text" value="<?php echo isset($data["pais"]) ? $data["pais"] : '' ?>" placeholder="Pais"  name="pais" required/>
      </label>  
      <label class="col-md-6 col-xs-6">Telefono:<br/>
        <input class="form-control" type="text" value="<?php echo isset($data["telefono"]) ? $data["telefono"] : '' ?>" placeholder="Telefono"  name="telefono" required/>
      </label>  
      <label class="col-md-6 col-xs-6">Direccion:<br/>
        <input class="form-control" type="text" value="<?php echo isset($data["direccion"]) ? $data["direccion"] : '' ?>" placeholder="Direccion"  name="domicilio" required/>
      </label>
      <label class="col-md-6 col-xs-6">Localidad:<br/>
        <input class="form-control" type="text" value="<?php echo isset($data["localidad"]) ? $data["localidad"] : '' ?>" placeholder="Localidad"  name="localidad" required />
      </label>
      <label class="col-md-6 col-xs-6">Provincia:<br/>
        <input class="form-control" type="text" value="<?php echo isset($data["provincia"]) ? $data["provincia"] : '' ?>" placeholder="Provincia"  name="provincia"  required/>
      </label>
      <label class="col-md-12 col-xs-12"><br/>
        <input class="btn btn-success" type="submit" value="Modificar cuenta" name="registrarmeBtn" />
      </label>      
    </div>
  </form>
</div>
<div class="clearfix"></div><br><br>
</div>