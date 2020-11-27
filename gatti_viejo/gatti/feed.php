<?php 
ob_start();
session_start();
include("admin/dal/data.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("inc/header.inc.php"); ?>
	<title>Seguinos en nuestras redes · Gatti S.A.</title>
	<meta name="description" content="">
	<meta name="author" content="Estudio Rocha & Asociados">
</head>

<body>
	<?php include("inc/nav.inc.php"); ?>

	<div class="headerTitular">
		<div class="container">
			<h1>Seguinos en nuestras redes</h1>
		</div>
	</div>
	<div class="container cuerpoContenedor"> 
		<style>

		.powered-by {
			display: none !important;
			opacity: 0 !important;
		}

	</style>
	<!-- The Javascript can be moved to the end of the html page before the </body> tag -->
	<!-- Place <div> tag where you want the feed to appear -->
		<div id="curator-feed"><a href="https://curator.io" target="_blank" class="crt-logo crt-tag">Powered by Curator.io</a></div>
		<!-- The Javascript can be moved to the end of the html page before the </body> tag -->
		<script type="text/javascript">
			/* curator-feed */
			(function(){
				var i, e, d = document, s = "script";i = d.createElement("script");i.async = 1;
				i.src = "https://cdn.curator.io/published/01eabcb5-051a-41a7-84f6-36499673ef64.js";
				e = d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
			})();
		</script>
		<style>
		#curator-feed .crt-logo{
			position: absolute;
			right: 900000px;
		}
	</style>
</div>  

<?php include("inc/footer.inc.php"); ?>

</body>
</html>
<?php
ob_end_flush();
?>
