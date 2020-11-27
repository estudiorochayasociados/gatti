<div class="col-lg-12 col-md-12">
	<h4>Cupón</h4>
	<hr/>
	<table class="table table-bordered">
		<thead>
			<th>Código</th>
			<th>Descuento</th>
			<th>Tipo</th>	
			<th>Mínimo</th>
			<th></th>
		</thead>
		<tbody>
			<?php
			Cupon_Read();
			?>
		</tbody>
	</table>
</div>


<?php
$borrar = isset($_GET["borrar"]) ? $_GET["borrar"] : '';
if ($borrar != '') {
	$sql = "DELETE FROM `descuento` WHERE `id` = '$borrar'";
	$link = Conectarse_Mysqli();
	$r = mysqli_query($link,$sql);	
	header("location: index.php?op=verCupon");
}
?>