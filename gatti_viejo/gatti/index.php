<?php
ob_start();
@session_start();
include("admin/dal/data.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("inc/header.inc.php"); ?>

    <title>Gatti S.A.</title>
    <meta name="description" content="">
    <meta name="author" content="Estudio Rocha & Asociados">

</head>

<body>
<?php include("inc/nav.inc.php"); ?>

<center>
    <?php include("inc/slider.inc.php"); ?>
</center>

<!-- RASTREAR IP 
   <?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //Verificar la ip compartida de internet
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { //verificar si la ip fue provista por un proxy
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
echo $ip;
?>
FIN RASTREAR IP -->

<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="titular"><h3>Productos visitados</h3></div>
            <div class="masVistos">
                <?php Portfolio_Read_Slide() ?>
            </div>
        </div>
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="titular"><h3>Últimas novedades</h3></div>
            <div class="row">
                <?php Notas_Read_Front_Index() ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function()
    {
        $("#mostrarmodal").modal("show");
    });
</script>

<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img src="popup.jpg" width="100%"/>
            </div>
        </div>
    </div>
</div>

<?php include("inc/footer.inc.php"); ?>

</body>
</html>

<?php
ob_end_flush();
?>