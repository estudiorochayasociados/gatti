<?php
include("cnx.php");
header('Access-Control-Allow-Origin: *');  
$idConn = Conectarse();
$codigo = isset($_GET["codigo"]) ? $_GET["codigo"] : '';

$sqlVerificar = "SELECT * FROM `portfolio` WHERE `id_portfolio` = '$codigo' OR `cod_portfolio` = '$codigo'";
$resultadoVerificar = mysql_query($sqlVerificar, $idConn);

$data = array();

while($row = mysql_fetch_array($resultadoVerificar)) {  
	$newdata = array(
		"IdProducto" => $row["id_portfolio"],
		"NombreProducto" => strtoupper($row["nombre_portfolio"]), 		
		"DescripcionProducto" => strtoupper($row["descripcion_portfolio"]),
		);
	array_push($data, $newdata);  
}

echo json_encode($data);  

?>