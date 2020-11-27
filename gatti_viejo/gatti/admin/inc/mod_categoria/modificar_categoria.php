<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$rotar = isset($_GET['rotar']) ? $_GET['rotar'] : '';

if ($id != '') {
	$data = Categoria_TraerPorId($id);
	$titulo = isset($data["nombre_categoria"]) ? $data["nombre_categoria"] : '';
}


if (isset($_POST['agregar'])) {
	if ($_POST["nombre"] != '') {
		$titulo = $_POST["nombre"];

		$sql = "UPDATE `categorias` SET `nombre_categoria`= '$titulo' WHERE `id_categoria`= $id";
		$link = Conectarse_Mysqli();
		$r = mysqli_query($link,$sql);

		header("location:index.php?op=verCategoria");
	}
}
?>
<div class="col-lg-12">
	<hr/>
	<form method="post" enctype="multipart/form-data">
		<div class="row" >
			<label class="col-lg-8">Categoría:
				<br/>
				<input type="text" name="nombre" class="form-control" value="<?php echo $data["nombre_categoria"]; ?>" required>
			</label>
			<div class="clearfix">
				<br/>
			</div> 


			<label class="col-md-12">
				<input type="submit" class="btn btn-primary " name="agregar" value="Modificar Categoría" />
			</label>
		</div>
	</div>
</form>
</div>
