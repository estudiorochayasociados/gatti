<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$enviar = new Clases\Email();
$template->set("title", TITULO . " | Contacto");
$template->set("description", "Contacto de " . TITULO);
$template->set("keywords", "");
$template->themeInit();?>
<div class="headerTitular">
    <div class="container">
        <h1>Contacto</h1>
    </div>
</div>
<div class="container cuerpoContenedor">
    <div class="col-md-6">
        <form method="post">
            <div class="row">
                <div id="alert-box" class="col-md-12">
                    <?php
                    if (isset($_POST["enviar"])) {

                            $nombre = $funciones->antihack_mysqli(isset($_POST["nombre"]) ? $_POST["nombre"] : '');
                            $telefono = $funciones->antihack_mysqli(isset($_POST["telefono"]) ? $_POST["telefono"] : '');
                            $email = $funciones->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
                            $consulta = $funciones->antihack_mysqli(isset($_POST["mensaje"]) ? $_POST["mensaje"] : '');

                            $mensajeFinal = "<b>Nombre</b>: " . $nombre . " <br/>";
//                                        $mensajeFinal .= "<b>Teléfono</b>: " . $telefono . "<br/>";
                            $mensajeFinal .= "<b>Email</b>: " . $email . "<br/>";
                            $mensajeFinal .= "<b>Consulta</b>: " . $consulta . "<br/>";

                            //USUARIO
                            $enviar->set("asunto", "Realizaste tu consulta");
                            $enviar->set("receptor", $email);
                            $enviar->set("emisor", $email);
                            $enviar->set("mensaje", $mensajeFinal);
                            if ($enviar->emailEnviar() == 1) {
                                echo '<div class="alert alert-success" role="alert">¡Consulta enviada correctamente!</div>';
                            }

                            $mensajeFinalAdmin = "<b>Nombre</b>: " . $nombre . " <br/>";
//                                        $mensajeFinalAdmin .= "<b>Teléfono</b>: " . $telefono . "<br/>";
                            $mensajeFinalAdmin .= "<b>Email</b>: " . $email . "<br/>";
                            $mensajeFinalAdmin .= "<b>Consulta</b>: " . $consulta . "<br/>";
                            //ADMIN
                            $enviar->set("asunto", "Consulta Web");
                            $enviar->set("receptor",EMAIL );
                            $enviar->set("mensaje", $mensajeFinalAdmin);
                            if ($enviar->emailEnviar() == 0) {
                                echo '<div class="alert alert-danger" role="alert">¡No se ha podido enviar la consulta!</div>';
                            }

                    }
                    ?>
                </div>
                <div class="col-lg-12">
                    <div class="name-fild-padding mb-sm-30 mb-xs-30">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-fild">
                                    <p><label>Nombre </label></p>
                                    <input name="nombre" value="" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-fild">
                                    <p><label>Email </label></p>
                                    <input name="email" value="" type="email" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-fild">
                                    <p><label>Mensaje </label></p>
                                    <textarea class="form-control" name="mensaje" rows="5" placeholder="Tu mensaje.." required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <button class="btn" name="enviar" type="submit"><span>Enviar mensaje</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <br>
        <?php
        include 'assets/inc/facebook.inc.php';
        ?>
    </div>

    <div class="col-md-6">
        <p><strong>CENTRAL HOUSE</strong><br>
            Rosario de Santa Fe 298 / San Francisco / Cba.<br>
            Whatsapp: +54 9 (3564) 589747<br>
            Tel: (03564) 420619 / 421022<br>
            casacentral@gattisa.com.ar&nbsp;<br>
            ventas@gattisa.com.ar</p>

        <p>&nbsp;</p>

        <hr>
        <p><strong>SUC. BUENOS AIRES</strong><br>
            Independencia 998 / (C1099AAW) Buenos Aires<br>
            Whatsapp:+54 9 (11) 58917312<br>
            Tel: (011) 4300-0607 / 0421<br>
            buenosaires@gattisa.com.ar</p>

        <p>&nbsp;</p>

        <hr>
        <p><strong>SUC. ROSARIO</strong><br>
            Salta 2998 esq. Suipacha / (S2002KTJ) Rosario<br>
            Whatsapp: +54 9 (341) 6548296<br>
            Tel: (0341) 4354452<br>
            rosario@gattisa.com.ar</p>

        <p>&nbsp;</p>
        <div class="clearfix"></div>

    </div>
</div>
<?php
$template->themeEnd();
?>
