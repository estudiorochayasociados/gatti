<?php

function Conectarse() {
	
	$dbhost = 'localhost';
	$dbuser = 'estudfh2_db';
	$dbpass = "faAr2010";
	$dbname = 'estudfh2_codini';
	/**/
	// NOTA: Reemplace password por el password de su cuenta de hosting
	
	//"tv5_luque","2261494","tv5luque"
	
	$connId = @mysql_connect($dbhost, $dbuser, $dbpass) or die('Ocurrió un error al conectarse al servidor mysql');

	mysql_select_db($dbname, $connId);		    
    mysql_query("SET NAMES utf8");		 
	
	return $connId;
}


function Conectarse_Mysqli() {
	$connId = @mysqli_connect("localhost","estudfh2_db","faAr2010","estudfh2_codini") or die("Error en el server".mysqli_error($con));
	//mysql_query("SET NAMES utf8");		 	
	return $connId;
}

?>
