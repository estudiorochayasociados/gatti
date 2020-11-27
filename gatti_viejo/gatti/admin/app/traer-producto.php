<?php
include("cnx.php");
header('Access-Control-Allow-Origin: *');  
$idConn = Conectarse();
$codigo = $_GET["codigo"];
$sql = "SELECT * FROM  `portfolio` WHERE id_portfolio = '$codigo' OR cod_portfolio = '$codigo'";
$result = mysql_query($sql, $idConn);
while($data = mysql_fetch_array($result)){	
	?>
	<div style="background: #fff">
		<?php		
		echo "<h3 style='text-align:left !important'> ".$data["nombre_portfolio"]."<hr/></h3>";
		echo "<p style='text-align:left !important'><img src='".BASE_URL."/".$data["imagen1_portfolio"]."' width='100%' /><hr/></p>";
		echo "<p style='text-align:left !important'><b>Categoria:</b> ".$data["categoria_portfolio"]."<hr/></p>";
		echo "<p style='text-align:left !important'><b>Descripción:</b> ".$data["descripcion_portfolio"]."<hr/></p>";
		echo "<p style='text-align:left !important'><b>Manual:</b> ".$data["pdf_portfolio"]."<hr/></p>";
		echo "<p style='text-align:left !important'><b>Preguntas Frecuentes:</b> ".$data["preguntas_portfolio"]."<hr/></p>";
		?>
		<button onclick="$('#producto').slideToggle()" class="btn btn-default">VOLVER</button>
	</div>
	<?php
}