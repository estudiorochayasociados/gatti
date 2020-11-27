<?php
include("cnx.php");
header('Access-Control-Allow-Origin: *');  

$idConn = Conectarse();

$email = isset($_GET["email"]) ? $_GET["email"] : '';
$pass = isset($_GET["pass"]) ? $_GET["pass"] : ''; 

$sqlVerificar = "SELECT COUNT(*) FROM `usuarios` WHERE `email` = '$email' AND `pass` = '$pass' ";
$resultadoVerificar = mysql_query($sqlVerificar, $idConn);
$data = mysql_fetch_array($resultadoVerificar);

if($data[0] != 0) {
	echo "1";	
} else {
	echo "2";
}

?>