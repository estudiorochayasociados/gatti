<?php
include("cnx.php");
header('Access-Control-Allow-Origin: *');  
$idConn = Conectarse();
$codigo = $_GET["codigo"];
$sql = "SELECT *
FROM contenidos
WHERE codigo = '$codigo'";
$result = mysql_query($sql, $idConn);
while($data = mysql_fetch_array($result)){
	echo $data["contenido"];
}