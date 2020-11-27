<?php
header('Access-Control-Allow-Origin: *');  
define("BASE_URL","http://gattisa.com.ar");
header('Content-Type: text/html; charset=utf-8');

function Conectarse() {
	
	$dbhost = 'localhost';
	$dbuser = 'gatti';
	$dbpass = 'faAr2010';
	$dbname = 'dbnuevo'; 
	
	$connId = @mysql_connect($dbhost, $dbuser, $dbpass) or die('Ocurrió un error al conectarse al servidor mysql');

	mysql_select_db($dbname, $connId);		    
	mysql_query("SET NAMES utf8");		 
	
	return $connId;
}


function Conectarse_Mysqli() {
	$connId = @mysqli_connect("localhost","gatti",'faAr2010',"dbnuevo") or die("Error en el server".mysqli_error($con));
	//mysql_query("SET NAMES utf8");		 	
	return $connId;
}

function Enviar($sPara, $sAsunto, $sTexto, $sDe)	{  
	$mail = $sTexto;

	$titulo = $sAsunto;

	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

	$headers .= "From: MkUser < $sDe >\r\n";

	$bool = mail($sPara,$titulo,$mail,$headers);  
}

function Usuario_TraerPorEmail($email) {
	$sql = "SELECT *
	FROM usuarios
	WHERE email = $email";
	$link = Conectarse();
	$result = mysql_query($sql, $link);
	$data = mysql_fetch_array($result);

	return $data;
}


function Usuario_TraerPorId($id) {
	$sql = "SELECT *
	FROM usuarios
	WHERE id = $id";
	$link = Conectarse();
	$result = mysql_query($sql, $link);
	$data = mysql_fetch_array($result);

	return $data;
}

function Portfolio_TraerPorId($id) {
	$sql = "SELECT *
	FROM portfolio
	WHERE  id_portfolio = $id";
	$link = Conectarse();
	$result = mysql_query($sql, $link);
	$data = mysql_fetch_array($result);

	return $data;
}
function TiempoRealRegistros() {
	$idConn = Conectarse();
	$sql = "SELECT * FROM  `scanner_producto` ORDER BY fecha_scanner Desc";
	$result = mysql_query($sql, $idConn);
	while ($row = mysql_fetch_array($result)) {
			//var_dump($row);
		$usuarioFinal = $row["usuario_scanner"];	
		$usuario = Usuario_TraerPorId($usuarioFinal);
		
		$usuarioMensaje = '';
		$usuarioMensaje .= '<b>Nombre:</b> '.$usuario["nombre"].'<br/>';
		$usuarioMensaje .= '<b>Empresa:</b> '.$usuario["empresa"].'<br/>';
		$usuarioMensaje .= '<b>Email:</b> '.$usuario["email"].'<br/>';
		$usuarioMensaje .= '<b>Teléfono:</b> '.$usuario["telefono"].'<br/>';
		$usuarioMensaje .= '<b>Domicilio:</b> '.$usuario["direccion"].'<br/>';
		$usuarioMensaje .= '<b>Localidad:</b> '.$usuario["localidad"].'<br/>';
		$usuarioMensaje .= '<b>Provincia:</b> '.$usuario["provincia"].'<br/>';
		$usuarioMensaje .= '<b>Pais:</b> '.$usuario["pais"].'<br>';

		$productoFinal = $row["codigo_scanner"];	
		$producto = Portfolio_TraerPorId($productoFinal);

		?>
		<tr>
			<td class="maxwidth"><?php echo ($row['fecha_scanner']) ?></td>           
			<td style="text-transform:uppercase"><?php echo strtoupper($usuario["nombre"]) ?> <button onclick="alert('<?php echo $usuarioMensaje; ?>')"><i class="glyphicon glyphicon-info-sign"></i></button></td>              
			<td style="text-transform:uppercase"><?php echo strtoupper($usuario["telefono"]) ?></td>              
			<td style="text-transform:uppercase"><?php echo strtoupper($row["tipo_scanner"]) ?></td>              
			<td style="text-transform:uppercase"><?php echo strtoupper($producto["nombre_portfolio"]) ?></td>              
		</tr>


		<?php
	}
}
?>
