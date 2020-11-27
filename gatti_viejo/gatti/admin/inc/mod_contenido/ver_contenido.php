<div class="col-lg-12 col-md-12">
	<h4>Contenindos</h4>
	<hr/>
 	<input class="form-control" id="myInput" type="text" placeholder="Buscar..">
	<hr/>
	<table class="table  table-bordered  ">
		<thead>
			<th width="10%">Id</th>
			<th width="50%">Título</th>
 			<th width="10%">Ajustes</th>
		</thead>
		<tbody>
			<?php
			Contenidos_Read();
			?>
		</tbody>
	</table>
</div>
 