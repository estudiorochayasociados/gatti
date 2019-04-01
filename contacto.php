<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$enviar = new Clases\Email();
$template->set("title", TITULO . " | Contacto");
$template->set("description", "Contacto de " . TITULO);
$template->set("keywords", "");
$template->themeInit();
?>
<div class="headerTitular">
    <div class="container">
        <h1>Contacto</h1>
    </div>
</div>
<div class="container cuerpoContenedor">
    <div class="col-md-8">
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/shell.js"></script>
        <script>
            hbspt.forms.create({
                portalId: "5689134",
                formId: "bdaf4984-aa07-47f3-bc2f-6d694af2953e"
            });
        </script>
        <br>
    </div>
    <div class="col-md-4">
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
        <?php
        include 'assets/inc/facebook.inc.php';
        ?>
    </div>
</div>
<?php
$template->themeEnd();
?>
