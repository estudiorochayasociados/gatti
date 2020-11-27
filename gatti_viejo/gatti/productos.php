<?php 
ob_start();
session_start();
include("admin/dal/data.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php 
  include("inc/header.inc.php"); 
  $categoria = isset($_GET["buscar"]) ? $_GET["buscar"] : '';
  $productos = isset($_GET["id"]) ? $_GET["id"] : '';
  $categoria = str_replace("-"," ",$categoria);
  ?>
  <title>Productos · Gatti S.A.</title>
  <meta name="description" content="">    
  <meta name="author" content="Estudio Rocha & Asociados">
</head>

<body>
 <?php
 include("inc/nav.inc.php") ;
 ?>

 <div class="headerTitular">
   <div class="container">
     <h1>Productos</h1>
    
   </div>
 </div> 
 <div class="container cuerpoContenedor">   
  <div class="row">   
    <div class="col-md-8 col-xs-12" style="margin-top:10px">
      <div class="hidden-lg hidden-md">
        <div class="titular">
          <h3><?php echo "FILTROS DE BÚSQUEDA"; ?></h3>      
        </div>
        <form method="get">
          <?php  
          if($categoria != '') { ?>
          <span class="alert btn-block alert-warning">
            <a href="<?php echo BASE_URL ?>/productos"><i class="fa fa-close"></i> <?php echo $categoria ?></a>
          </span>
          <?php } ?>

          <?php echo "Filtrá por la categoría que te interesa." ?>
          <select class="form-control" name="categoria" onchange="this.form.submit()">
            <?php if($categoria != '') { ?>
            <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
            <?php } else { ?>
            <option>-- Seleccionar Categoría --</option>
            <?php } ?>
            <option disabled>──────────</option>
            <?php Categoria_Read_Productos() ?>
          </select>
        </form>
        <div class="clearfix"></div><br/>
      </div>
      <?php Portfolio_Read_Front(0,$categoria,'',4) ?>
    </div>
    <div class="col-md-4 col-xs-12">
      <div class="hidden-sm hidden-xs">
        <div class="titular">
          <h3><?php echo "FILTROS DE BÚSQUEDA"; ?></h3>      
        </div>
        <?php Categoria_Read_Productos_Botones(0) ?>
      </div>
      <br/>
      <?php  Traer_Contenidos("facebook"); ?>
     </div>
   </div>
</div>  



<?php include("inc/footer.inc.php"); ?>
<style>
  .zoom {
    display:inline-block;
    position: relative;
  }
  .zoom:after {
    content:'';
    display:block; 
    width:33px; 
    height:33px; 
    position:absolute; 
    top:0;
    right:0;
    background:url(icon.png);
  }
  .zoom img {
    display: block;
  }
  .zoom img::selection { background-color: transparent; }
  #ex2 img:hover { cursor: url(grab.cur), default; }
  #ex2 img:active { cursor: url(grabbed.cur), default; }
</style>
<script src='js/zoom.min.js'></script>
<script>
  $(document).ready(function(){
    $('.zoom').zoom({
      touch:true
    }); 
  });

  $(function() {
    $(".image").click(function() {
      var image = $(this).attr("rel");
      $('#ex3').hide();
      $('#ex3').fadeIn('slow');
      $('#ex3').html('<img  src="' + image + '"  width="100%" />');
      return false;
    });
  });  
</script>
</body>
</html>
<?php
ob_end_flush();
?>
 