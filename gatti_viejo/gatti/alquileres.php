<?php 
ob_start();
session_start();
include("admin/dal/data.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  include("inc/header.inc.php"); 
  $buscar = isset($_GET["buscar"]) ? $_GET["buscar"] : 'alquileres';
  $productos = isset($_GET["id"]) ? $_GET["id"] : '';
  $buscar = limpiar_caracteres_especiales($buscar);
  ?>
  <title>Alquileres · Gatti S.A.</title>
  <meta name="description" content="">    
  <meta name="author" content="Estudio Rocha & Asociados">
</head>

<body>
 <?php
 include("inc/nav.inc.php") ;
 ?>
 <div class="headerTitular">
   <div class="container">
     <h1>Alquileres</h1>
   </div>
 </div> 
 <div class="container cuerpoContenedor">   
  <div class="row">   
    <div class="col-md-12 col-xs-12" style="margin-top:10px"> 
      <?php Portfolio_Read_Front(0,$buscar,'',3) ?>
    </div> 
  </div>
</div>  
<?php include("inc/footer.inc.php"); ?>
</body>
</html>
<?php
ob_end_flush();
?>
