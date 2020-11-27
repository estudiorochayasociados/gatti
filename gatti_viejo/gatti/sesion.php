<?php 
ob_start();
session_start();
include("PHPMailer/class.phpmailer.php");
include("admin/dal/data.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("inc/header.inc.php"); ?>
	<title>Sesión · Gatti S.A.</title>
	<meta name="description" content="">
	<meta name="author" content="Estudio Rocha & Asociados">
	<?php
	if (@$_SESSION["user"]["id"] == '') {
		echo "<script> document.location.href='usuarios.php';</script>";
	}
	?>
</head>
<body>
	<?php include("inc/nav.inc.php") ?>
	<div class="headerTitular">
		<div class="container">
			<h1>Sesión</h1>
		</div>
	</div>
	<div class="container cuerpoContenedor">
		<div class="row">  
			<div class="col-md-3">
				<div class="titular">
					<h3>Sesión</h3>      					
				</div>
				<div class="menuSesion">
					<li><a href="<?=BASE_URL?>/sesion.php?op=pedidos"><i class="fa fa-list"></i> Ver Pedidos</a></li>
					<li><a href="<?=BASE_URL?>/sesion.php?op=mi-cuenta"><i class="fa fa-user"></i> Mi cuenta</a></li>
					<li><a href="<?=BASE_URL?>/sesion.php?op=salir"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a></li>
				</div>
				<hr/>
				<?php  Traer_Contenidos("facebook"); ?>
				<hr/>
			</div>
			<div class="col-md-9">
				<?php
				$op = isset($_GET["op"]) ? $_GET["op"] : '';
				switch($op) {
					
					case "pedidos":
					include('inc/pedidos.inc.php');
					break;
					case "mi-cuenta":
					include('inc/mi-cuenta.inc.php');
					break;
					case "ver-carrito":
					include('inc/ver-carrito.inc.php');
					break;
					case "salir":
					session_destroy();
					echo "<script> document.location.href='usuarios.php';</script>";
					break;
					default:
					include('inc/pedidos.inc.php');
					break;
				}
				?> 
			</div>  
		</div>  
	</div>
	<?php include("inc/footer.inc.php"); ?>
	<script>
		var txt = $("#envio option:selected").text();
		alert(text);
	</script>
</body>
</html>
<?php
ob_end_flush();
?>
