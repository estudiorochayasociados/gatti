<?php 
ob_start();
session_start();
include("admin/dal/data.php"); 
$id = isset($_GET["id"]) ? $_GET["id"] : '';
if($id != '') {
 if(!is_numeric($id)) {
  exit();
}
}

$nota = Nota_TraerPorId($id);
$fecha = explode("-",$nota["FechaNotas"]);
$cod = $nota["CodNotas"];
$sqlImagen = "SELECT `ruta` FROM `imagenes` WHERE `codigo` = '$cod'";
$idConn = Conectarse();
$resultadoImagen = mysqli_query($idConn,$sqlImagen); 
while ($imagenes = mysqli_fetch_row($resultadoImagen)) {
  $imagen = BASE_URL."/".$imagenes[0];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include("inc/header.inc.php"); ?>

  <title><?php echo $nota["TituloNotas"] ?> · Gatti S.A.</title>
  <meta name="description" content="">
  <meta name="author" content="Estudio Rocha & Asociados">

  <!-- Marcado JSON-LD generado por el Asistente para el marcado de datos estructurados de Google. -->
  <script type="application/ld+json">
    {
      "@context" : "http://schema.org",
      "@type" : "Article",     
      "name" : "<?= $nota["TituloNotas"] ?>",
      "author" : {
      "@type" : "Person",
      "name" : "Gatti S.A."
    },
     "headline": "<?= $nota["TituloNotas"] ?>",

     "datePublished": "<?= $nota["FechaNotas"] ?>",
 "dateCreated": "<?= $nota["FechaNotas"] ?>",
 "dateModified": "<?= $nota["FechaNotas"] ?>",
    "image" : "<?= $imagen ?>",
    "articleSection" : "Novedades",
    "articleBody" : "<?= strip_tags($nota["DesarrolloNotas"]) ?>",
    "url" : "http://<?= CANONICAL ?>",
    "publisher" : {
    "@type" : "Organization",
    "name" : "Gatti S.A.",
    "logo": {
      "@type": "ImageObject",
            "url": "<?= BASE_URL ?>/img/logo.png"
    }
  }, 
  "mainEntityOfPage": {
         "@type": "WebPage",
         "@id": "<?= BASE_URL ?>/novedades"
      }
}
</script>
</head>

<body>
 <?php include("inc/nav.inc.php") ?>

 <div class="headerTitular">
   <div class="container">
    <h1>Novedades</h1>
  </div>
</div>
<div class="container cuerpoContenedor">   
  <div class="col-md-8 col-xs-12">
   <div class="titular">
    <h3><?php echo $nota["TituloNotas"]; ?></h3>      
  </div>
  <img src="<?php echo $imagen ?>" width="100%" />
  <div class="clearfix"></div><br/>
  <span class="meta-date"><i class="fa fa-calendar"></i> <?php echo $fecha[2]."-".$fecha[1]."-".$fecha[0] ?></span>  
  <span class="tags"><?php echo utf8_encode($nota["EtiquetasNotas"]) ?></a>, <i class="fa fa-tags"></i> 
    <a href="<?php echo $verMas ?>.php?op=notas"><?php echo $nota["CategoriaNotas"] ?></a></span>
    <hr/>
    <p><?php echo $nota["DesarrolloNotas"] ?></p>
    <br/><br/><br/>
  </div>
  <div class="col-md-4 col-xs-12">
   <div class="titular">
    <h3>Últimos novedades</h3>      
  </div>
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
