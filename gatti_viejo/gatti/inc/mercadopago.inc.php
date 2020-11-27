<?php error_reporting( E_ALL );
$cod = substr(md5(uniqid(rand())), 0, 7);
$precio = (float)$_SESSION["precioFinal"];
$promedioPrecio = ($precio * 10) / 100;
//$pagar = $promedioPrecio + $precio;
$pagar = $precio;

$moneda="ARS";
$pagar = $precio; 

$user = $_SESSION["user"]["id"];
$carrito = $_SESSION["carritoFinal"];
$asunto = "Nuevo pre-pedido de productos";
$receptor = "web@gattisa.com.ar";
$mensaje = 'Nuevo pre-pedido de productos <br/><hr/>';
$mensaje .= '<table border="1" style="text-align:left;width:100%;font-size:13px !important"><thead><th>Nombre producto</th><th>Cantidad</th><th>Precio unidad</th><th>Precio total</th></thead>';
$mensaje .= $_SESSION["carritoFinal"];
$mensaje .= '</table>';
$mensaje .= '<br/><hr/>';
$mensaje .= '<br/><b>Datos del usuario:</b><br/>';
$mensaje .= "<b>Nombre y apellido</b>: ".$_SESSION["user"]["nombre"]."<br/>";
$mensaje .= "<b>Email</b>: ".$_SESSION["user"]["email"]."<br/>";
$mensaje .= "<b>País</b>: ".$_SESSION["user"]["pais"]."<br/>";
$mensaje .= "<b>Provincia</b>: ".$_SESSION["user"]["provincia"]."<br/>";
$mensaje .= "<b>Localidad</b>: ".$_SESSION["user"]["localidad"]."<br/>";
$mensaje .= "<b>Domicilio</b>: ".$_SESSION["user"]["direccion"]."<br/>";
$mensaje .= "<b>Teléfono</b>: ".$_SESSION["user"]["telefono"]."<br/>";
$mensaje .= "<b>Empresa</b>: ".$_SESSION["user"]["empresa"]."<br/><hr/>";
//$mensaje .= "<b>DATOS DEL MEDIO DE PAGO: </b>".$descripcion."<hr/><br/>";

$con = Conectarse();
$sql = "INSERT INTO `pedidos`(`productos_pedidos`, `usuario_pedidos`, `estado_pedidos`, `fecha_pedidos`, `cod_pedidos`) VALUES ('$carrito','$user',9,NOW(),'$cod')";
$mysql_query = mysqli_query($con,$sql);

//@Enviar_User_Admin_Sin_Notificar($asunto,$mensaje,$receptor);

?>
<div class="titular">
	<h3> Finalizar compra</h3>      
</div>
<b>Hola <?php echo $_SESSION["user"]["nombre"] ?></b>
<br/>El monto total del carrito abonando con Tarjeta de Crédito es de: <b>$<?php echo $_SESSION["precioFinal"] ?></b>  
<br/><br/>
<div class="animated fadeInRight alert alert-info">
	<b><h4 style="text-transform: uppercase;font-weight: 700">PROMO DEL MES: 10% de descuento en pago en efectivo</h4></b>
	<p style="font-size: 25px">El monto total del carrito abonando en  EFECTIVO  es:  $<?php echo (($_SESSION["precioFinal"] - ($_SESSION["precioFinal"]*10)/100)) ?>  <br/>
		<i style="color:red;font-size: 12px">* pago con transferencia bancaria o acordar con vendedor</i>
	</p>
</div>
<!--<b>* con tarjeta de crédito tiene un recargo del 10%:</b> <b>$<?php //echo $pagar; ?></b>-->

<div class="clearfix"></div><br/>
<b>¿Con qué te gustaría abonar?</b><br/>
<hr/> 
<?php
//MERCADOPAGO
require_once ('mercadopago/mercadopago.php');
$mp = new MP('1593771261124394', 'mYbUuN2PQG9DXBValCyEpxS1Avu7slFZ');
$preference_data = array(
	"items" => array(
		array(
			"title" => "ORDEN: ".$cod,			
			"currency_id" => "ARS", 
			"unit_price" => $pagar,
			"quantity" => 1
		)
	),
	"auto_return" => "approved",
	"notification_url" => "http://www.gattisa.com.ar/ipn.php",
	"back_urls"  => array(
		//"failure" => BASE_URL."/sesion.php?op=ver-carrito&finalizar=ok&pago=2&estado=2&cod=".$cod,
		"failure" => "/sesion.php?op=ver-carrito&finalizar=ok&pago=2&estado=2&cod=".$cod,
		//"pending" => BASE_URL."/sesion.php?op=ver-carrito&finalizar=ok&pago=2&estado=0&cod=".$cod,
		"pending" => "/sesion.php?op=ver-carrito&finalizar=ok&pago=2&estado=0&cod=".$cod,
		//"success" => BASE_URL."/sesion.php?op=ver-carrito&finalizar=ok&pago=2&estado=1&cod=".$cod
		"success" => "/sesion.php?op=ver-carrito&finalizar=ok&pago=2&estado=1&cod=".$cod
	)

);
$preference = $mp->create_preference($preference_data);

//TODO PAGO /*
/*include_once 'todopago/TodoPago/lib/Sdk.php';
define('MERCHANT', 687559);
define('SECURITY', '040AE30164072C8EF2BB7A67EF52EF73');
define('ENTORNO', 'prod');
use TodoPago\Sdk;
$http_header = array('Authorization'=>'TODOPAGO '.SECURITY,'user_agent' => 'PHPSoapClient');
$connector = new Sdk($http_header, ENTORNO);

$optionsSAR_comercio = array (
	'Security'=>SECURITY,
	'EncodingMethod'=>'XML',
	'Merchant'=>MERCHANT,
	'URL_OK'=> BASE_URL."/sesion.php?op=ver-carrito&finalizar=ok&pago=2&tipo=todopago&estado=2&cod=".$cod,
	'URL_ERROR'=> BASE_URL."/sesion.php?op=ver-carrito&finalizar=ok&pago=2&tipo=todopago&estado=1&cod=".$cod
);
 

$ip = GetIP();

$optionsSAR_operacion = array (
	'MERCHANT'=> MERCHANT,
	'OPERATIONID'=>$cod,
	'CURRENCYCODE'=> 032,
	'AMOUNT'=>$_SESSION["precioFinal"], 
	'MININSTALLMENTS' => 1, 
	'MAXINSTALLMENTS' => 3, 
	'CSBTCITY'=> $_SESSION["user"]["localidad"],
	'CSSTCITY'=> $_SESSION["user"]["localidad"],
	'CSBTCOUNTRY'=> "AR",
	'CSSTCOUNTRY'=> "AR",
	'CSBTEMAIL'=> $_SESSION["user"]["email"],
	'CSSTEMAIL'=> $_SESSION["user"]["email"],
	'CSBTFIRSTNAME'=> $_SESSION["user"]["nombre"],
	'CSSTFIRSTNAME'=> $_SESSION["user"]["nombre"],      
	'CSBTLASTNAME'=> isset($_SESSION["user"]["apellido"]) ? $_SESSION["user"]["apellido"] : 'compra',
	'CSSTLASTNAME'=> isset($_SESSION["user"]["apellido"]) ? $_SESSION["user"]["apellido"] : 'compra',
	'CSBTPHONENUMBER'=> $_SESSION["user"]["telefono"],     
	'CSSTPHONENUMBER'=> $_SESSION["user"]["telefono"],     
	'CSBTPOSTALCODE'=> "2400",
	'CSSTPOSTALCODE'=> "2400",
	'CSBTSTATE'=> "B",
	'CSSTSTATE'=> "B",
	'CSBTSTREET1'=> $_SESSION["user"]["direccion"],
	'CSSTSTREET1'=> $_SESSION["user"]["direccion"],
	'CSBTCUSTOMERID'=> $_SESSION["user"]["id"],
	'CSBTIPADDRESS'=> $ip,       
	'CSPTCURRENCY'=> "ARS",
	'CSPTGRANDTOTALAMOUNT'=> $_SESSION["precioFinal"],
	'CSMDD7'=> "",     
	'CSMDD8'=> "Y",       
	'CSMDD9'=> "",       
	'CSMDD10'=> "",      
	'CSMDD11'=> "",
	'CSMDD12'=> "",     
	'CSMDD13'=> "",
	'CSMDD14'=> "",
	'CSMDD15'=> "",        
	'CSMDD16'=> "",
	'CSITPRODUCTCODE'=> "default",
	'CSITPRODUCTDESCRIPTION'=> $_SESSION["carritoFinal"],     
	'CSITPRODUCTNAME'=> $_SESSION["carritoFinal"],  
	'CSITPRODUCTSKU'=> $_SESSION["carritoFinal"],
	'CSITTOTALAMOUNT'=> $_SESSION["precioFinal"],
	'CSITQUANTITY'=> "1",
	'CSITUNITPRICE'=> $_SESSION["precioFinal"]
);
$rta = $connector->sendAuthorizeRequest($optionsSAR_comercio, $optionsSAR_operacion);
$_SESSION["todopago"] = $rta;
//var_dump($_SESSION["todopago"]);*/
?> 
<div class="row"> 
	<div class="col-md-12">
		<a href="<?php echo $preference['response']['init_point']; ?>"  class="btn btn-info btn-block <?php echo $display ?>" name="MP-Checkout" mp-mode="modal"><i class="fas fa-credit-card"></i> PAGO CON MERCADO PAGO</a>
	</div>
	<!--
	<div class="col-md-6">
		<a href="<?php echo $rta['URL_Request']; ?>"  class="btn btn-info btn-block <?php echo $display ?>"><i class="fas fa-credit-card"></i> PAGO CON TODO PAGO </a>
	</div>
-->
	<div class="clearfix"></div>
	<hr/>
	<div class="col-md-6">
		<a href="<?php echo BASE_URL ?>/sesion.php?op=ver-carrito&finalizar=ok&pago=1&cod=<?php echo $cod; ?>"  class="btn btn-block btn-success"><i class="fa fa-bank"></i> Pagar con Transferencia Bancaria</a>
	</div>
	<div class="col-md-6">
		<a href="<?php echo BASE_URL ?>/sesion.php?op=ver-carrito&finalizar=ok&pago=3&cod=<?php echo $cod; ?>"  class="btn btn-block btn-warning"><i class="fa fa-money"></i> Pagar de contado en sucursal</a>
	</div>
</div>
<div class="clearfix"></div><br/><br/>
<img src="https://imgmp.mlstatic.com/org-img/banners/ar/medios/785X40.jpg" title="MercadoPago - Medios de pago" alt="MercadoPago - Medios de pago" width="100%" />

<script type="text/javascript">
	(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;
		s.src = document.location.protocol+"//resources.mlstatic.com/mptools/render.js";
		var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}
		window.$MPC_loaded !== true ? (window.attachEvent ? window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
	</script>
	<br/><br/><br/>