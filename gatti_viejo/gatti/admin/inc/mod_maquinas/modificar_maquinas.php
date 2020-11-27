<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id != '') {
	$data = Reconstruidos_TraerPorId($id);
	$titulo = isset($data["nombre_portfolio"]) ? $data["nombre_portfolio"] : '';
	$categoria = isset($data["categoria_portfolio"]) ? $data["categoria_portfolio"] : '';
	$tipo = isset($data["tipo_portfolio"]) ? $data["tipo_portfolio"] : '';
	$maquina = isset($data["cod_portfolio"]) ? $data["cod_portfolio"] : '';
	$imagen = Imagenes_Reconstruidos_TraerPorId($data["cod_portfolio"]);
	$imagenes = explode("-",$imagen);
	$count = '';
}

if (isset($_POST['agregar'])) {
	$titulo = $_POST["titulo"];
	$categorias = $_POST["categoria"];
	$tipo = $_POST["tipo"];
	$descripcion = $_POST["descripcion"];

	foreach ($_FILES['files']['name'] as $f => $name) {     
		if(!empty($_FILES["files"]["tmp_name"][$f])) {
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
	}

	$sql2 = "
	UPDATE `maquinas` 
	SET 			
	`nombre_portfolio`= '$titulo',
	`descripcion_portfolio`= '$descripcion',
	`tipo_portfolio`= '$tipo',
	`categoria_portfolio`= '$categorias'						
	WHERE `id_portfolio`= '$id'";
	$link2 = Conectarse();
	$r2 = mysql_query($sql2, $link2);

	header("location: index.php?op=modificarMaquinas&id=$id");
}
?>
<div class="col-md-12">
	<hr/>
	<form method="post" enctype="multipart/form-data" onsubmit="showLoading()">
		<div class="row" >
			<label class="col-md-4">Título:
				<br/>
				<input type="text" name="titulo" class="form-control" value="<?php echo $data["nombre_portfolio"]; ?>" required>
			</label>
			<label class="col-md-3">Categoría Repuestos:
				<select name="categoria" class="form-control">
					<option value="" disabled selected>-- categorías --</option>
					<option value="1" <?php if($categoria == 1){ echo "selected"; } ?>>Nutrición</option>
					<option value="2" <?php if($categoria == 2){ echo "selected"; } ?>>Conservación de Forrajes</option>
					<option value="3" <?php if($categoria == 3){ echo "selected"; } ?>>Efluentes</option>
				</select>				
			</label>
			<label class="col-md-3">Tipo:
				<select name="tipo" class="form-control">
					<option value="" disabled selected>-- categorías --</option>
					<option value="1" <?php if($tipo == 1){ echo "selected"; } ?>>Reconstruidos</option>
					<option value="2" <?php if($tipo == 2){ echo "selected"; } ?>>Usados</option>					
				</select>				
			</label>
			<div class="clearfix">
				<br/>
			</div>
			<label class="col-md-12">Descripción:
				<br/>
				<textarea name="descripcion" class="form-control" style="height:300px;display:block">
					<?php echo (isset($data['descripcion_portfolio']) ? $data['descripcion_portfolio'] : '') ?>
				</textarea>
				<script>
					CKEDITOR.replace('descripcion');
				</script>
			</label>
			<div class="clearfix"></div>
			<div class="col-md-12"><br/>
				<div class="row">
					<?php 
					$countImagen = (count($imagenes))-1;
					for ($i = 0;$i < $countImagen;$i++) {
						echo '<div class="col-md-4 col-xs-4" style="margin-bottom:65px;height:200px;"><img src="../'.$imagenes[$i].'" width="100%" class="thumbnail img-responsive"><a class="btn-primary btn btn-block" href="index.php?op=modificarMaquinas&id='.$id.'&borrar='.$imagenes[$i].'">BORRAR IMAGEN</a></div>';
					} 
					?>
				</div>
			</div>
			<label class="col-md-12"> 
				Imágenes:<br/><br/>
				<input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
			</label>				 
			<div class="clearfix">				
				<div class="clearfix"></div><br/>
				<label class="col-md-12">
					<input type="submit" class="btn btn-primary " name="agregar" value="Modificar Repuesto" />
				</label>
			</div>
		</div>
	</form>
</div>

<?php

$borrar = isset($_GET["borrar"]) ? $_GET["borrar"] : '';

if ($borrar != '') {
	unlink("../".$borrar);
	$sql = "DELETE FROM `imagenes_maquinas` WHERE `ruta` = '$borrar'";
	$link = Conectarse();
	$r = mysql_query($sql, $link);
	header("location: index.php?op=modificarMaquinas&id=$id");
}

?>




