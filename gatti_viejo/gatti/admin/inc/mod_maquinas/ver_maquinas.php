<div class="col-lg-12">
	<h4>Máquinas reconstruidas</h4>
	<hr/>
	<table class="table  table-bordered table-striped">
		<thead>
			<th>Id</th>
			<th width="60%">Título</th>
			<th>Categoría</th>
			<th>Tipo</th>
			<th>Ajustes</th>
		</thead>
		<tbody>
			<?php
			Maquinas_Read();
			$borrar = isset($_GET["borrar"]) ? $_GET["borrar"] : '';

			if ($borrar != '') {
				$link = Conectarse();

				$imagen = Imagenes_Reconstruidos_TraerPorId($borrar);
				$imagenes = explode("-",$imagen);
				$countImagen = (count($imagenes))-1;
				
				for ($i = 0;$i < $countImagen;$i++) {
					unlink("../".$imagenes[$i]);
				} 
				$sqlImagen = "DELETE FROM `imagenes_maquinas` WHERE `maquina` = '$borrar'";
				$sql = "DELETE FROM `maquinas` WHERE `cod_portfolio` = '$borrar'";
				$r = mysql_query($sql, $link);
				$r2 = mysql_query($sqlImagen, $link);
				header("location: index.php?op=verMaquinas");
			}
			?>
		</tbody>
	</table>
</div>

