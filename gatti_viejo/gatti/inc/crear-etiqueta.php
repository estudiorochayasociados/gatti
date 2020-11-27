<?php
session_start();

$cadena = '';
$etiqueta = isset($_GET["etiqueta"]) ? $_GET["etiqueta"] : '124124';

$cadena .= "<head><meta charset='utf-8'><style>*{font-family:arial;} </style></head>";
$cadena .= "<div style='width:700px;margin:auto;font-size:22px;border:1px solid #e1e1e1;padding:20px'>";
$cadena .= "<div style='display:block'><img src='http://gattisa.com.ar/img/logo.png' width='200' style='float:left' /><h4 style='float:right' >¡MUCHAS GRACIAS POR TU COMPRA!</h4></div>";
$cadena .= "<div style='display:block'>";
$cadena .= "<br/><br/><br/><hr/><b>Tipo de envío:</b> ". $_SESSION["envioTipo"]."<br/>";
$cadena .= "<b>Precio:</b> $".$_SESSION["envio"]."<br/>";
$cadena .= "<b>Nombre y apellido</b>: " . $_SESSION["user"]["nombre"] . "<br/>";
$cadena .= "<b>Email</b>: " . $_SESSION["user"]["email"] . "<br/>";
$cadena .= "<b>Provincia</b>: " . $_SESSION["user"]["provincia"] . "<br/>";
$cadena .= "<b>Localidad</b>: " . $_SESSION["user"]["localidad"] . "<br/>";
$cadena .= "<b>Domicilio</b>: " . $_SESSION["user"]["direccion"] . "<br/>";
$cadena .= "<b>Teléfono</b>: " . $_SESSION["user"]["telefono"] . "<br/>";
$cadena .= "</div>";
$cadena .= "</div>";
 
//echo $cadena; 
$fp = fopen("../archivos/$etiqueta.html", 'w+');
fwrite($fp, $cadena);
fclose($fp);

// ¡el contenido de 'data.txt' ahora es 123 y no 23!
?>


 