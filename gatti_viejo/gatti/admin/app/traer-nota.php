<?php
include("cnx.php");
header('Access-Control-Allow-Origin: *');  
$idConn = Conectarse();
$codigo = $_GET["codigo"];
$sql = "SELECT * FROM  `notabase` WHERE IdNotas = '$codigo'";
$result = mysql_query($sql, $idConn);
while($data = mysql_fetch_array($result)){
	$fecha = explode("-",$data["FechaNotas"]);
	$cod = $data["CodNotas"];
	$sqlImagen = "SELECT `ruta` FROM `imagenes` WHERE `codigo` = '$cod'";
	$resultadoImagen = mysql_query($sqlImagen, $idConn); 
	?>
	<div style="background: #fff">
		<h4><?php echo $data["TituloNotas"]; ?></h4><hr/>
		<div class="clearfix"></div>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">  
			<div class="carousel-inner" role="listbox">
				<?php  
				$i=0;
				while ($imagenes = mysql_fetch_array($resultadoImagen)) {
					?>
					<div class="item <?php if($i === 0) {echo "active";} ?>" style="background:url(<?php echo BASE_URL."/".$imagenes["ruta"] ?>) no-repeat center center/contain;height:200px;">                
					</div>
					<?php
					$i++;
				}
				?> 
			</div> 
			<?php if($imagenesCont != 0) { ?>
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			<?php } ?>
		</div>
		<div class="clearfix"></div><hr/>
		<p><?php echo $data["DesarrolloNotas"]; ?></p>
		<button onclick="$('#nota').slideToggle()" class="btn btn-default">VOLVER</button>
	</div>

	<?php
}