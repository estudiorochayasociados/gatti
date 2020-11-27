<?php
include("cnx.php");
?>
<html>
<head><!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

	<link rel="stylesheet" href="smile/smile-alert.css">
	<script src="smile/smile-alert.js"></script>

</head>
<!-- Latest compiled and minified JavaScript -->



<body>
	<div class="col-md-12">
		<h1>TIEMPO REAL DE APP</h1>
		<table class="table table-hover table-bordered">
			<thead>
				<th>Fecha</th>
				<th>Nombre</th>
				<th>Telefono</th>
				<th>¿Dónde?</th>
				<th>Producto</th>
			</thead>
			<tbody id="table">

			</tbody>
		</table>
	</div>
</body>

<script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  ></script>

</html>

<script>
	setInterval(function() {
		$.get('<?php echo BASE_URL;  ?>/admin/app/traer-registros-usuarios.php', function(data) {
			$('#table').html(data);
		});
	}, 1000);
</script>