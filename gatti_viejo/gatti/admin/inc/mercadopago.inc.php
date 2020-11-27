<?php
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

Enviar_User_Admin_Sin_Notificar($asunto,$mensaje,$receptor);

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
if($pagar < "20000") {
	require_once ('mercadopago/mercadopago.php');
	$path =  "http://". $_SERVER["SERVER_NAME"]."/";
	$mp = new MP('1593771261124394', 'mYbUuN2PQG9DXBValCyEpxS1Avu7slFZ');

	$preference_data = array(
		"items" => array(
			array(
				"title" => "Compra Gatti S.A.",			
				"currency_id" => "ARS", 
				"unit_price" => $pagar,
				"quantity" => 1
				)
			),
		"auto_return" => "approved",
		"back_urls"  => array(
			"failure" => BASE_URL."/sesion.php?op=ver-carrito&finalizar=ok&pago=2&estado=2",
			"pending" => BASE_URL."/sesion.php?op=ver-carrito&finalizar=ok&pago=2&estado=0",
			"success" => BASE_URL."/sesion.php?op=ver-carrito&finalizar=ok&pago=2&estado=1"
			)

		);

	$preference = $mp->create_preference($preference_data);

	?><a href="<?php echo $preference['response']['sandbox_init_point']; ?>"  class="btn btn-info btn-block <?php echo $display ?>" name="MP-Checkout" mp-mode="modal"><i class="fa fa-credit-card-alt"></i> 
	PAGO CON TARJETAS DE CRÉDITO
</a><?php
}
?>
<hr/>
<div class="row">
<!--
	<div class="col-md-4">
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" >
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="business" value="gabriel@vairolatti.com.ar">
			<input type="hidden" name="item_name" value="Compra Vairolatti S.A.">
			<input type="hidden" name="item_number" value="<?php echo rand(1,10000)  ?>">
			<input type="hidden" name="amount" value="<?php echo $dolares  ?>">
			<input type="hidden" name="quantity" value="1">
			<input type="hidden" value="http://www.vairolatti.com.ar/sesion.php?op=ver-carrito&finalizar=ok&pago=2&estado=0" name="return">
			<input type="hidden" name="no_note" value="1">
			<input type="hidden" name="currency_code" value="USD">
			<button type="submit" name="submit" class="btn btn-info btn-block" ><i class="fa fa-credit-card-alt"></i> Pagos Internacionales</button>
		</form>
	</div>
-->
<div class="col-md-6">
	<a href="sesion.php?op=ver-carrito&finalizar=ok&pago=1"  class="btn btn-block btn-success"><i class="fa fa-money"></i> Pagar con Transferencia Bancaria</a>
</div>
<div class="col-md-6">
	<a href="sesion.php?op=ver-carrito&finalizar=ok&pago=3"  class="btn btn-block btn-warning"><i class="fa fa-check"></i> Acordar con vendedor</a>
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
