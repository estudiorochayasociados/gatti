<?php 
ob_start();
session_start();
include("admin/dal/data.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("inc/header.inc.php"); ?>
	<title>Obras Instaladas · Gatti S.A.</title>
	<meta name="description" content="">
	<meta name="author" content="Estudio Rocha & Asociados">
</head>

<body>
	<?php include("inc/nav.inc.php") ?>

	<div class="headerTitular">
		<div class="container">
			<h1>OBRAS INSTALADAS</h1>
		</div>
	</div>
	<div class="container cuerpoContenedor"> 
		<?php  Traer_Contenidos("obras"); ?>
	</div>  
	<style>
		.cuerpoContenedor img {
			padding-right: 10px;
			padding-bottom: 10px;
		}

		@media screen and (max-width: 750px) {
			.cuerpoContenedor img {
				width:100% !important;
				padding:10px;
			}
		}
	</style>

	<?php include("inc/footer.inc.php"); ?>

</body>
</html>
<?php
ob_end_flush();
?>
