<?php 
ob_start();
session_start();
include("admin/dal/data.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("inc/header.inc.php"); ?>
	<title>Formularios · Gatti S.A.</title>
	<meta name="description" content="">
	<meta name="author" content="Estudio Rocha & Asociados">
</head>

<body>
	<?php include("inc/nav.inc.php") ?>

	<div class="headerTitular">
		<div class="container">
			<h1>Formularios Impositivos</h1>
		</div>
	</div>
	<div class="container cuerpoContenedor"> 
		<div class="col-md-4 text-center">			
			<a href="<?php echo BASE_URL ?>/archivos/impositivo/CUIT AFIP.pdf" target="_blank"><br/>
				<img src="https://www.europair.com/web/img/web/decorado/pdf-ico.png" width="70%" /><br/><br/>
				<h4>CUIT AFIP</h4>
			</a>
			<hr/>
		</div>
		<div class="col-md-4 text-center">			
			<a href="<?php echo BASE_URL ?>/archivos/impositivo/PADRON WEB.pdf" target="_blank"><br/>
				<img src="https://www.europair.com/web/img/web/decorado/pdf-ico.png" width="70%" /><br/><br/>
				<h4>PADRON WEB</h4>
			</a>
			<hr/>
		</div>
		<div class="col-md-4 text-center">			
			<a href="<?php echo BASE_URL ?>/archivos/impositivo/IIBB.pdf" target="_blank"><br/>
				<img src="https://www.europair.com/web/img/web/decorado/pdf-ico.png" width="70%" /><br/><br/>
				<h4>IIBB</h4>
			</a>
			<hr/>
		</div>
	</div>  

	<?php include("inc/footer.inc.php"); ?>

</body>
</html>
<?php
ob_end_flush();
?>
