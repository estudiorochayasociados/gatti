<?php
header('Access-Control-Allow-Origin: *');  
include("cnx.php");
$idConn = Conectarse();

$nombre = isset($_GET["nombre"]) ? $_GET["nombre"] : '';
$apellido = isset($_GET["apellido"]) ? $_GET["apellido"] : '';
$empresa = isset($_GET["empresa"]) ? $_GET["empresa"] : '';
$email = isset($_GET["email"]) ? $_GET["email"] : '';
$pass = isset($_GET["pass"]) ? $_GET["pass"] : '';
$telefono = isset($_GET["telefono"]) ? $_GET["telefono"] : '';

$sqlVerificar = "SELECT COUNT(*) FROM `usuarios` WHERE `email` = '$email'";
$resultadoVerificar = mysql_query($sqlVerificar, $idConn);
$data = mysql_fetch_array($resultadoVerificar);

if($data[0] == 0) {
	$nombre = $nombre." ".$apellido;
	$sql = "
	INSERT INTO `usuarios`
	(`nombre`, `empresa`, `email`, `pass`, `telefono`, `inscripto`)
	VALUES
	('$nombre','$empresa','$email','$pass','$telefono',NOW())
	";
	$resultado = mysql_query($sql, $idConn);
	if($resultado) {
		echo "1";
	} else {
		echo "2";
	}	
} else {
	echo "3";
}

?>