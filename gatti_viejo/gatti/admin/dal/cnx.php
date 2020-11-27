<?php
header('Access-Control-Allow-Origin: *');  
define("BASE_URL","http://".$_SERVER['HTTP_HOST']."/gatti/gatti");
define("HUBSPOT","46168670-e983-4f6b-a547-d0bcec3aa6cf");
define("HUBSPOT_SCRIPT",'');
header('Content-Type: text/html; charset=utf-8');
define("CAPTCHA_SITE","6LfwlVUUAAAAAKbrTmmJ4HCxU8bF8Ms6JjbmL1Me");
define("CAPTCHA_SECRET","6LfwlVUUAAAAAOBjeQuKlRpsjEngOoSmaDFgXAO4");
define("CANONICAL","http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]);


function Conectarse() {
	$connId = mysqli_connect("localhost","root",'',"gatti") or die("Error en el server".mysqli_error($connId));
	mysqli_set_charset($connId,'utf8');
	return $connId;
}


function Conectarse_Mysqli() {
	$connId = mysqli_connect("localhost","root",'',"gatti") or die("Error en el server".mysqli_error($connId));
	mysqli_set_charset($connId,'utf8');
	return $connId;
}

?>
