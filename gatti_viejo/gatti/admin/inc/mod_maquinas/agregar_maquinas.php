<?php
$random = "maq_".substr(md5(uniqid(rand())), 0, 10);
$maquina = $random;

if (isset($_POST["agregar"])) {

	$titulo = $_POST["titulo"];
	$descripcion = $_POST["descripcion"];
	$categorias = $_POST["categoria"];
	$tipo = $_POST["tipo"];
	$count = '';

	foreach ($_FILES['files']['name'] as $f => $name) {     
		$imgInicio = $_FILES["files"]["tmp_name"][$f];
		$tucadena = $_FILES["files"]["name"][$f];
		$partes = explode(".", $tucadena);
		$dom = (count($partes) - 1);
		$dominio = $partes[$dom];
		$prefijo = rand(0, 10000000);

		if ($dominio != '') {
			$destinoImg = "archivos/maquinas/" . $prefijo . "." . $dominio;
			$destinoFinal = "../archivos/maquinas/" . $prefijo . "." . $dominio;
			move_uploaded_file($imgInicio, $destinoFinal);
			chmod($destinoFinal, 0777);	
			$destinoRecortado = "../archivos/maquinas/recortadas/a_" . $prefijo . "." . $dominio;
			$destinoRecortadoFinal = "archivos/maquinas/recortadas/a_" . $prefijo . "." . $dominio;
            //Saber tamaño
			$tamano = getimagesize($destinoFinal);
			$tamano1 = explode(" ", $tamano[3]);
			$anchoImagen = explode("=", $tamano1[0]);
			$anchoFinal = str_replace('"', "", trim($anchoImagen[1]));
			if ($anchoFinal >= 900) {
				@EscalarImagen("900", "0", $destinoFinal, $destinoRecortado, "70");
			} else {
				@EscalarImagen($anchoFinal, "0", $destinoFinal, $destinoRecortado, "70");
			}
			unlink($destinoFinal);
		}	 
		$count++;  
		$sql = "INSERT INTO `imagenes_maquinas`(`ruta`, `maquina`) VALUES ('$destinoRecortadoFinal','$maquina')";
		$link = Conectarse();
		$r = mysql_query($sql, $link);
	}


	$sql2 = "
	INSERT INTO `maquinas`
	( `nombre_portfolio`, `descripcion_portfolio`, `categoria_portfolio`,`tipo_portfolio`,`cod_portfolio`, `fecha_portfolio`) 
	VALUES 
	('$titulo','$descripcion','$categorias', '$tipo', '$maquina',  NOW())";
	$link2= Conectarse();
	$r2 = mysql_query($sql2, $link2);

	header("location:index.php?op=verMaquinas");
} 
?>

<div class="col-md-12	">
	<h4>Agregar a Máquinas reconstruidas</h4>
	<hr/>
	<form method="post" enctype="multipart/form-data" onsubmit="showLoading()">
		<div class="row" >
			<label class="col-md-6">Título:
				<br/>
				<input type="text" name="titulo" class="form-control" value="<?php echo (isset($_POST['titulo']) ? $_POST['titulo'] : '') ?>" required>
			</label>
			<label class="col-lg-3">Categoría Repuestos:
				<select name="categoria" class="form-control">
					<option value="" disabled selected>-- categorías --</option>
					<option value="1">Nutrición</option>
					<option value="2">Conservación de Forrajes</option>
					<option value="3">Efluentes</option>
				</select>				
			</label>
			<label class="col-lg-3">Tipo:
				<select name="tipo" class="form-control">
					<option value="" disabled selected>-- categorías --</option>
					<option value="1">Reconstruidos</option>
					<option value="2">Usados</option>					
				</select>				
			</label>
			<div class="clearfix"></div>
			<label class="col-md-12">Descripción:
				<br/>
				<textarea name="descripcion" class="form-control"    style="height:300px;display:block"><?php echo (isset($_POST['descripcion']) ? $_POST['descripcion'] : '') ?></textarea>
				<script>
				CKEDITOR.replace('descripcion');
				</script>
				<div class="clearfix">
					<br/>
				</div>
				<br>
				<label class="col-md-12">Imágenes:
					<br/>
					<input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
				</label>				 
				<div class="clearfix">
					<br/>
				</div>
				<br>
				<label class="col-md-12">
					<input type="submit" class="btn btn-primary" name="agregar" value="Subir Máquinas" />
				</label>
			</div>
		</form>
	</div>
