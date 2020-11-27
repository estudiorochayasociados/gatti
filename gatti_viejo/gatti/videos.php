<?php 
 ob_start();
  session_start();
include("admin/dal/data.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include("inc/header.inc.php"); ?>
  <title>Videos · Gatti S.A.</title>
  <meta name="description" content="">
  <meta name="author" content="Estudio Rocha & Asociados">
</head>

<body>
 <?php include("inc/nav.inc.php") ?>

 <div class="headerTitular">
   <div class="container">
    <h1>Nuestros Videos</h1>
  </div>
</div>
<div class="container cuerpoContenedor">   
  <div class="col-md-12 col-xs-12" style="margin-top:10px">
    <div class="row"> 
      <?php Videos_Read_Front() ?>
    </div>
  </div> 
</div>  

<?php include("inc/footer.inc.php"); ?>

</body>
</html>
<?php
ob_end_flush();
?>
