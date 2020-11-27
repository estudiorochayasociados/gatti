<?php
header('Access-Control-Allow-Origin: *');  

include("cnx.php");

$idConn = Conectarse();
$sql = "SELECT * FROM  `portfolio` where estado_portfolio = 0";
$result = mysql_query($sql, $idConn);
while ($row = mysql_fetch_array($result)) { 
	$imagen = BASE_URL."/".$row["imagen1_portfolio"]; 
	$fecha = explode("-",$row["fecha_portfolio"]);
	$titulo = htmlspecialchars($row["nombre_portfolio"]);
	?>
	<div class="item" onclick="traerProducto(<?php echo $row['id_portfolio'] ?>)">		
		<div class="col-md-12">
			<div class="product-wrap" style="height:150px;overflow:hidden;background:url('<?php echo $imagen ?>') no-repeat center center;background-size:contain"></div>
			<h1 class="tituloProducto"> <?php echo  ($titulo); ?> </h1>
			<span class="precioProducto"><b>Categoría: </b><br/> <?php echo $row["categoria_portfolio"] ?> </span><br/> 
			<div class="clearfix"></div><br/>
			<button class="btn btn-primary"  ><i class="fa fa-plus"></i> VER MÁS</button>
		</div>
	</div> 
	<?php
}