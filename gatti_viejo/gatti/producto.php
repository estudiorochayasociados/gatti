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
  $buscar = isset($_GET["buscar"]) ? $_GET["buscar"] : '';
  $productos = isset($_GET["id"]) ? $_GET["id"] : '';
  if(!is_numeric($productos)) {
    exit();
  }
  $data = Portfolio_TraerPorId($productos);
  $title = mb_strtoupper($data["nombre_portfolio"]);
  $tags = str_replace(" ",",",$data["nombre_portfolio"]);
  $descripcion = substr($data["descripcion_portfolio"],0,75);
  ?>
  <title><?php echo $title; ?> · Gatti S.A.</title>
  <meta name="description" content="<?php echo strip_tags($descripcion); ?>">
  <meta name="keywords" content="<?php echo $tags; ?>">
  <meta name="author" content="Estudio Rocha & Asociados">
  <?php
  $moneda="ARS";
  $precio = $data["precio_portfolio"];
  $preciodesc = $data["preciodesc_portfolio"];
  $categoriaData = Categoria_Read_PorId($data["categoria_portfolio"]);
  ?>
  <meta property="fb:app_id" content="171104813521342" />


<!-- Marcado JSON-LD generado por el Asistente para el marcado de datos estructurados de Google. -->
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Product",
  "name" : "<?=$data["nombre_portfolio"]?>",
  "image" : "<?=BASE_URL?>/<?=$data["imagen1_portfolio"]?>",
  "description" : "<?=strip_tags($data["descripcion_portfolio"])?>",
  "brand" : {
    "@type" : "Brand",
    "name" : "Gatti S.A.",
    "logo" : "<?=BASE_URL?>/img/logo.png"
  },
  "offers" : {
    "@type" : "Offer",
    "price" : "<?=$data["precio_portfolio"]?>",
    "priceCurrency": "ARS"
  }
}
</script>
</head>

<body>
 <?php
 include("inc/nav.inc.php") ;
 ?> 
 <div class="headerTitular">
   <div class="container">
    <h1>PRODUCTOS</h1>
  </div>
</div>
<?php
if(is_file($data["imagen1_portfolio"])) {
  $imagen = BASE_URL."/".$data["imagen1_portfolio"];
  $imagen2 = BASE_URL."/".$data["imagen2_portfolio"];
}  else {
  $imagen = BASE_URL."/"."img/producto_sin_imagen.jpg";
}
?>
<div class="container cuerpoContenedor">   
  <div class="row">   
    <div class="col-md-12 col-xs-12" style="margin-top:10px">
      <h1 class="tituloProducto"><?php echo $data["nombre_portfolio"]; ?> 


      </h1>
      <br/><br/><br/>
      <div class="col-md-5">
        <div class='zoom' id='ex3' >
          <img src="<?php echo $imagen ?>" style="width:100% !important"/> 
        </div>
        <div class="clearfix"></div><br/>
        <div class="hidden-xs hidden-sm">
          <?php 
          if(is_file($data["imagen1_portfolio"])) {
            echo '<a href="'.BASE_URL."/".$data["imagen1_portfolio"].'" data-lightbox="roadtrip" > <div class="col-md-3 thumbnail"><img src="'.BASE_URL."/".$data["imagen1_portfolio"].'" style="width:100%" /></div></a>';
          }  

          if(is_file($data["imagen2_portfolio"])) {
            echo '<a href="'.BASE_URL."/".$data["imagen2_portfolio"].'" data-lightbox="roadtrip" > <div class="col-md-3 thumbnail"><img src="'.BASE_URL."/".$data["imagen2_portfolio"].'" style="width:100%" /></div></a>';
          }  

          if(is_file($data["imagen3_portfolio"])) {
            echo '<a href="'.BASE_URL."/".$data["imagen3_portfolio"].'" data-lightbox="roadtrip" > <div class="col-md-3 thumbnail"><img src="'.BASE_URL."/".$data["imagen3_portfolio"].'" style="width:100%" /></div></a>';
          }

          if(is_file($data["imagen4_portfolio"])) {
            echo '<a href="'.BASE_URL."/".$data["imagen4_portfolio"].'" data-lightbox="roadtrip" > <div class="col-md-3 thumbnail"><img src="'.BASE_URL."/".$data["imagen4_portfolio"].'" style="width:100%" /></div></a>';
          }

          if(is_file($data["imagen5_portfolio"])) {
            echo '<a href="'.BASE_URL."/".$data["imagen5_portfolio"].'" data-lightbox="roadtrip" > <div class="col-md-3 thumbnail"><img src="'.BASE_URL."/".$data["imagen5_portfolio"].'" style="width:100%" /></div></a>';
          } 
          if($data["video1_portfolio"]) {
            echo '<a href="#" class="video" data-video="https://www.youtube.com/embed/'.$data["video1_portfolio"].'" data-toggle="modal" data-target="#videoModal"> <div class="col-md-3 thumbnail"><img src="'.BASE_URL.'/img/video-producto.png" /></div></a>
            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <iframe width="100%" height="350" src="" frameborder="0" allowfullscreen></iframe>
            </div>
            </div>
            </div>
            </div>';
          } 
          if($data["video2_portfolio"]) {
            echo '<a href="#" class="video" data-video="https://www.youtube.com/embed/'.$data["video2_portfolio"].'" data-toggle="modal" data-target="#videoModal2"> <div class="col-md-3 thumbnail"><img src="'.BASE_URL.'/img/video-producto.png" /></div></a>
            <div class="modal fade" id="videoModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <iframe width="100%" height="350" src="" frameborder="0" allowfullscreen></iframe>
            </div>
            </div>
            </div>
            </div>';
          }
          ?>
          <?php include ("inc/socialfb.inc.php"); ?>
          <div class="clearfix"></div><br/></div>
        </div>
        <div class="col-md-7">   
          <p><?php echo "<b>Categoría: </b><a href='".BASE_URL."/tienda/".$categoriaData['id_categoria']."'>".($categoriaData['nombre_categoria'])."</a></p>"; ?>
          <?php
          if($data["tipo_portfolio"] != 0) {
            ?><br/>
            <?php if($preciodesc != 0) { ?>
            <h2 class="label label-danger" style="font-size: 20px"><?php echo "Precio antes: <strike>$$preciodesc </strike>"?></h2> 
            <?php } ?>
            <h2><?php echo "Precio: $".($precio) ?></h2> 
            <h4 style="color:red"><?php echo "<i>10% de descuento en pago de contado: $".($precio - ($precio*10/100))."</i>" ?></h4> 
            <?php
            if($data["stock_portfolio"] == 0) {
              echo "<br/><b>Stock: <div style='vertical-align:center;font-size:12px' class='label label-danger'>* sin stock</div><br/><br/></b>";
            } else {
              echo "<br/><b>Stock: <div style='vertical-align:center;font-size:12px' class='label label-success'>".$data["stock_portfolio"]."</div><br/><br/></b>";
            }
            ?>
            <?php
            if(isset($_POST["agregar_carrito"])) {
              $cantidad = $_POST["cantidad"];
              if($cantidad == '' || $data["stock_portfolio"] < $cantidad) {
                echo "<span class='alert alert-warning'>Ups!! No contamos con esa cantidad.</span><br/><br/>";
              } else {
                $_SESSION["envioTipo"] = 'Seleccionar tipo de envio.';
                $_SESSION["envio"]= '';
                $idProducto = $_POST["id"];
                $var = $idProducto."-".$cantidad;
                array_push($_SESSION["carrito"], $var);
                header("location: ".BASE_URL."/carrito");
                echo "<span class='alert btn-block alert-success'><i class='fa fa-cart-plus'></i> Excelente, añadiste un nuevo producto a tu carro. <a href='sesion.php?op=ver-carrito'>Ir al carro</a></span>";
              }
            }
            ?>
            <form class="row" method="post">
              <input type="hidden" value="<?php echo $data["id_portfolio"] ?>" name="id" />
              <label class="col-md-4">
                ¿Cuántos necesitas?:<br/>
                <input type="number" value="1" name="cantidad" min="1"  class="cantidad form-control" />
              </label>
              <div class="precioFinal"></div>
              <div class="clearfix"></div><br/>
              <div class="col-md-12">
                <button name="agregar_carrito" class="btn btn-success"><i class="fa fa-cart-plus"></i> AGREGAR A CARRITO</button>
                <a href="<?=BASE_URL."/sesion.php?op=ver-carrito";?>" class="btn btn-info"><i class="fa fa-shopping-cart "></i> VER CARRITO</a>
              </div>
            </form>
            <br/>   
            <img src="<?php echo BASE_URL ?>/img/mp.jpg" width="90%" /><br/>
            <!-- PROMOS --><hr/>
            <a  data-toggle="modal" data-target="#promo">Promociones con Mercadopago</a>

            <div class="modal fade" id="promo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <!--<iframe width="100%" height="350" src="https://www.mercadopago.com.ar/cuotas?iframe=true" frameborder="0" allowfullscreen></iframe>-->
                  </div>
                </div>
              </div>
            </div>
            <!-- FIN PROMOS -->     
            <?php  
          }  else {
            echo $data["descripcion_portfolio"];
            if($data["pdf_portfolio"] != '') { 
              ?>
              <div class="clearfix"></div><br/>  
              <a href="<?php echo BASE_URL; ?>/<?php echo $data["pdf_portfolio"] ?>" class="btn btn-default btn-block" target="_blank">FOLLETO DEL PRODUCTO</a>
              <?php } ?>

              <?php if($data["categoria_portfolio"] == 'AXIALES') { ?>
              <div class="clearfix"></div><br/>  
              <a href="archivos/MANUAL DE OPERACION Y MANTENIMIENTO AXIALES.pdf" class="btn btn-primary btn-block" target="_blank">MANUAL DE OPERACIÓN Y MANTENIMIENTO AXIALES</a>
              <?php } ?>

              <?php if($data["categoria_portfolio"] == 'CENTRIFUGOS') { ?>
              <div class="clearfix"></div><br/>  
              <a href="archivos/MANUAL DE OPERACION Y MANTENIMIENTO CENTRIFUGOS.pdf" class="btn btn-primary btn-block" target="_blank">MANUAL DE OPERACIÓN Y MANTENIMIENTO CENTRÍFUGOS</a>
              <?php 
            }
          }
          ?>          
          <div class="clearfix"></div><br/><br/> 
          <img src="https://imgmp.mlstatic.com/org-img/banners/ar/medios/785X40.jpg" title="MercadoPago - Medios de pago" alt="MercadoPago - Medios de pago" width="100%" />
          <br><br>
          <br/><br/> 
        </div>
      </div>
    </div>
  </div> 


  <div class="container">
    <div class="col-md-12">
      <div> 
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descripción del Producto</a></li>
          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Comentarios del Producto</a></li>
        </ul> 
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">      
            <h3>Descripión del producto</h3>
            <hr/>
            <p>
              <?php echo $data["descripcion_portfolio"] ?>

              <?php if($data["pdf_portfolio"] != '') {  ?>
              <div class="clearfix"></div><br/>  
              <a href="<?php echo $data["pdf_portfolio"] ?>" class="btn btn-default btn-block" target="_blank">FOLLETO DEL PRODUCTO</a>
              <?php } ?>

              <?php if($data["categoria_portfolio"] == 'AXIALES') { ?>
              <div class="clearfix"></div><br/>  
              <a href="archivos/MANUAL DE OPERACION Y MANTENIMIENTO AXIALES.pdf" class="btn btn-primary btn-block" target="_blank">MANUAL DE OPERACIÓN Y MANTENIMIENTO AXIALES</a>
              <?php } ?>

              <?php if($data["categoria_portfolio"] == 'CENTRIFUGOS') { ?>
              <div class="clearfix"></div><br/>  
              <a href="archivos/MANUAL DE OPERACION Y MANTENIMIENTO CENTRIFUGOS.pdf" class="btn btn-primary btn-block" target="_blank">MANUAL DE OPERACIÓN Y MANTENIMIENTO CENTRÍFUGOS</a>
              <?php } ?>
            </p>
            <br/>
          </div>
          <div role="tabpanel" class="tab-pane" id="profile"> 
            <h3>Escribí comentarios o dudas</h3>
            <hr/>
            <?php include ("inc/comentariofb.inc.php"); ?>
          </div> 
        </div>
      </div>
    </div>
  </div> 
  <div class="clearfix"></div>        
  <br/><br/>
  <br/><br/>
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
