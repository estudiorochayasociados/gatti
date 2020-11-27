<?php
include("cnx.php");
include("qr/qrcode.php");
header('Access-Control-Allow-Origin: *');  
$idConn = Conectarse();
$sqlVerificar = "SELECT * FROM `portfolio`";
$resultadoVerificar = mysql_query($sqlVerificar, $idConn);
while($data = mysql_fetch_array($resultadoVerificar)) { 
	$qr = new qrcode();
	$qr->text($data["id_portfolio"]);
	echo "<p><img src='".$qr->get_link()."' border='0'/></p>";
} ?>
