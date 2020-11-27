<?php
header('Access-Control-Allow-Origin: *');  
include("cnx.php");
$idConn = Conectarse();

$codigo = isset($_GET["codigo"]) ? $_GET["codigo"] : '';
$idUsuario = isset($_GET["idUsuario"]) ? $_GET["idUsuario"] : ''; 
$tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : ''; 

$sqlVerificar = "INSERT INTO `scanner_producto`(`usuario_scanner`, `codigo_scanner`,`tipo_scanner`, `fecha_scanner`) VALUES ('$idUsuario','$codigo','$tipo',NOW())";
$resultadoVerificar = mysql_query($sqlVerificar, $idConn);

$usuario = Usuario_TraerPorId($idUsuario);
$producto = Portfolio_TraerPorId($codigo);

$nombreUsuario = $usuario["nombre"];
$telefonoUsuario = $usuario["telefono"];
$localidadUsuario = $usuario["localidad"];
$provinciaUsuario = $usuario["provincia"];
$emailUsuario = $usuario["email"];

$sTexto = "<b>Nueva actividad en la app de tipo: </b>".strtoupper($tipo) ."<hr/><br/>";
$sTexto .= "<b>Producto: </b>".($producto["nombre_portfolio"])."<hr/><br/>";
$sTexto .= "<b>Nombre: </b>".($nombreUsuario)."<br/>";
$sTexto .= "<b>Teléfono: </b>".($telefonoUsuario)."<br/>";
$sTexto .= "<b>Email: </b>".($emailUsuario)."<br/>";
$sTexto .= "<b>Localidad: </b>".($localidadUsuario)."<br/>";
$sTexto .= "<b>Provincia: </b>".($provinciaUsuario)."<br/>";

$sDe="facundo@estudiorochayasoc.com";
Enviar("facundo@estudiorochayasoc.com.ar", "Nueva actividad de $tipo", $sTexto, $sDe);

?>