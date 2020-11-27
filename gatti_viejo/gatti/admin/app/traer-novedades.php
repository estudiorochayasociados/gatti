<?php
header('Access-Control-Allow-Origin: *');  

 include("cnx.php");

$idConn = Conectarse();
$sql = "SELECT * FROM  `notabase` ORDER BY IdNotas Desc";
$result = mysql_query($sql, $idConn);
while ($row = mysql_fetch_array($result)) {
	$fecha = explode("-",$row["FechaNotas"]);
	$cod = $row["CodNotas"];
	$sqlImagen = "SELECT `ruta` FROM `imagenes` WHERE `codigo` = '$cod'";
	$idConn = Conectarse();
	$resultadoImagen = mysql_query($sqlImagen, $idConn); 
	while ($imagenes = mysql_fetch_row($resultadoImagen)) {
		$imagen = $imagenes[0];
	}
	?>
	<div class="item" onclick="traerNota(<?php echo $row['IdNotas'] ?>)">		
		<img src="<?php echo BASE_URL."/".$imagen ?>" width="100%">				
		<div class="fh5co-desc" style="text-transform: uppercase !important">
			<?php echo utf8_encode($row['TituloNotas']); ?>
		</div>
	</div>
	<?php
}