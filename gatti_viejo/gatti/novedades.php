<?php 
 ob_start();
  session_start();
  include("admin/dal/data.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include("inc/header.inc.php"); ?>

  <title>Novedades · Gatti S.A.</title>
  <meta name="description" content="">
  <meta name="author" content="Estudio Rocha & Asociados">
</head>

<body>
 <?php include("inc/nav.inc.php") ?>

 <div class="headerTitular">
   <div class="container">
    <h1>Novedades</h1>
  </div>
</div>
<div class="container cuerpoContenedor">   
  <div class="col-md-8 col-xs-12" style="margin-top:10px">
    <?php Notas_Read_Front() ?>
  </div>
  <div class="col-md-4 col-xs-12">
    <div class="titular"><h3>Últimas novedades</h3></div>
    <?php Notas_Read_Front_Side() ?>
    <br/>
      <?php  Traer_Contenidos("facebook"); ?>
  </div>
</div>  

<?php include("inc/footer.inc.php"); ?>

</body>
</html>
<?php
ob_end_flush();
?>
