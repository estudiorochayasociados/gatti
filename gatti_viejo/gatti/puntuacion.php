<?php 
ob_start();
session_start();
include("admin/dal/data.php"); 
$cod = isset($_GET["cod"]) ? $_GET["cod"] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("inc/header.inc.php"); ?>
	<title>Puntuación · Gatti S.A.</title>
	<meta name="description" content="">
	<meta name="author" content="Estudio Rocha & Asociados">
</head>

<body>
	<?php include("inc/nav.inc.php") ?>

	<div class="headerTitular">
		<div class="container">
			<h1>PUNTUAR COMPRA</h1>
		</div>
	</div>
	<div class="container cuerpoContenedor"> 
		<center>
			<h3>Puntuar la compra CÓDIGO: <span class="label label-success"><?php echo $cod; ?></span></h3>
		</center>
		<hr/>
		<?php
		/*Consulta el codigo de pedido*/
		$sql = "SELECT * FROM puntuacion WHERE cod_puntuacion = '$cod'";
		$link = Conectarse_Mysqli();
		$result = mysqli_query($link,$sql);
		$data = mysqli_fetch_array($result);

		/*Si existe, devuelve mensaje que ya califico*/
		if($data["cod_puntuacion"]==$cod)
		{
			echo "<center><br/><span class='alert alert-danger'>¡Ustéd ya calificó esta compra!</span></center>";
		}
		/*Si no existe, permite calificar*/
		else{
			if (isset($_POST["agregar"])) {
				$calificacion = antihack_mysqli($_POST['calificacion']);
				$descripcion = antihack_mysqli($_POST['descripcion']);
				$sql = "INSERT INTO puntuacion (cod_puntuacion, calificacion_puntuacion, descripcion_puntuacion) VALUES ('$cod', '$calificacion', '$descripcion')";
				$link = Conectarse_Mysqli();
				if(mysqli_query($link, $sql)){
					echo "<span style='color: #7ede7e; font-weight: bolder;'>¡Calificación enviada correctamente!</span>";
				} else{
					echo "ERROR: no se pudo calificar. $sql. " . mysqli_error($link);
				}
				mysqli_close($link);
			}
			?>

			<form method="post" class="col-md-offset-4 col-md-4">
				<label for="calificacion">Calificar:</label><br>
				<select name="calificacion" class="form-control" id="calificacion" placeholder="Calificar">
					<option value="Muy satisfecho">Muy satisfecho</option>
					<option value="Satisfecho">Satisfecho</option>
					<option value="Poco satisfecho">Poco satisfecho</option>
					<option value="No satisfecho">Nada satisfecho</option>        
				</select>
				<br/>
				<label value="s" for="descripcion">Descripcion:</label><br>
				<textarea class="type-input" tabindex="3" cols="50" rows="5" placeholder="Comentario" name="descripcion" id="descripcion" required></textarea><br><br/>
				<input type="submit" name="agregar" class="btn btn-success" value="Enviar Calificación">
			</form> 

			<?php } ?>
		</div> 
		<?php include("inc/footer.inc.php"); ?>

	</body>
	</html>
	<?php
	ob_end_flush();
	?>
