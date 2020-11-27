<?php
header('Access-Control-Allow-Origin: *');  
include("cnx.php");  
$con = Conectarse();

$consulta = "SELECT * FROM contenidos WHERE codigo = 'encuestas1'";
$result = mysql_query($consulta,$con);

//$data = '';
$data = array();

while($row = mysql_fetch_array($result)) {  
	$newdata = array(
		"id" => $row["id"],
		"nombre" => strtoupper($row["contenido"])
		);
	array_push($data, $newdata);  
}

echo json_encode($data);  
?>
