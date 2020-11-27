<?php
header('Access-Control-Allow-Origin: *');  
include("cnx.php");  
$con = Conectarse();
$email = isset($_GET["email"]) ? $_GET["email"] : '';
$consulta = "SELECT * FROM `usuarios` WHERE `email` = '$email'";
$result = mysql_query($consulta,$con);

//$data = '';
$data = array();

while($row = mysql_fetch_array($result)) {  
	$newdata = array(
		"id" => $row["id"],
		"nombre" => strtoupper($row["nombre"]), 		
		"empresa" => strtoupper($row["empresa"]),
		"email" => $row["email"]	
		);
	array_push($data, $newdata);  
}

echo json_encode($data);  
?>
