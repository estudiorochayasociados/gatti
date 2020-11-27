<?php 
ob_start();
session_start();
include("admin/dal/data.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include("inc/header.inc.php"); ?>
  <title>Software de Selección de Ventiladores · Gatti S.A.</title>
  <meta name="description" content="">
  <meta name="author" content="Estudio Rocha & Asociados">
</head>

<body>
 <?php include("inc/nav.inc.php"); ?>

 <div class="headerTitular">
   <div class="container">
    <h1>SOFTWARE DE SELECCIÓN DE VENTILADORES</h1>
  </div>
</div>
<div class="container cuerpoContenedor"> 
   <?php  Traer_Contenidos("software"); ?>
</div>  

<?php include("inc/footer.inc.php"); ?>

</body>
</html>
<?php
ob_end_flush();
?>
