<div class="col-md-12">
	<h4>Agregar Categoría</h4>
	<hr/>
	<form  method="post" class="row">
		<?php
		if (isset($_POST["publicar"])) {
			if ($_POST["nombre"] != '') {
				$categoria = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
				$idConn = Conectarse_Mysqli();
				$sql =
				"INSERT INTO `categorias`(`nombre_categoria`)
				VALUES ('$categoria')";
				$resultado = mysqli_query($idConn,$sql);
				header("location:index.php?op=verCategoria");
			} else {
				echo "<span class='error'>Lo sentimos, todos los datos deben ser completados para subir la categoría.</span>";
			}
		}
		?>
		<label class="col-md-6">
			<input type="text" name="nombre" placeholder="Categoría" value="<?php echo isset($_POST["nombre"]) ? $_POST["nombre"] : ''  ?>" class="form-control" />
		</label>
		<label class="col-md-6">
			<input type="submit" class="btn btn-success" name="publicar" value="CREAR CATEGORIA"/>
		</label>
	</form>
</div>