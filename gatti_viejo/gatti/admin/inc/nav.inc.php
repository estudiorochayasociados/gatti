<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="index.php"><b>GATTI</b></a>
	</div>
	<!-- /.navbar-header -->

	<ul class="nav navbar-top-links navbar-right">		
		<li><a href="index.php"><i class="fa fa-dashboard fa-fw"></i> INICIO</a></li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">
				<i class="fa fa-newspaper-o fa-fw"></i> NOVEDADES <span class="caret"></span>
			</a> 
			<ul class="dropdown-menu">
				<li>
					<a href="index.php?op=verNotas"> VER NOVEDADES</a>
				</li>
				<li>
					<a href="index.php?op=agregarNotas"> AGREGAR NOVEDADES</a>
				</li>
			</ul>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">
				<i class="fa  fa-film fa-fw"></i> VIDEOS <span class="caret"></span>
			</a> 
			<ul class="dropdown-menu">
				<li>
					<a href="index.php?op=verVideos"> VER VIDEOS</a>
				</li>
				<li>
					<a href="index.php?op=agregarVideos"> AGREGAR VIDEOS</a>
				</li>
			</ul>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">
				<i class="fa  fa-tags fa-fw"></i> CUPÓN <span class="caret"></span>
			</a> 
			<ul class="dropdown-menu">
				<li>
					<a href="index.php?op=verCupon"> Ver Cupón</a>
				</li>
				<li>
					<a href="index.php?op=agregarCupon"> Agregar Cupón</a>
				</li>
			</ul>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">
				<i class="fa  fa-user fa-fw"></i> CLIENTES <span class="caret"></span>
			</a> 
			<ul class="dropdown-menu">
				<li>
					<a href="index.php?op=verClientes"> VER CLIENTES</a>
				</li>
				<li>
					<a href="index.php?op=agregarClientes"> AGREGAR CLIENTES</a>
				</li>
			</ul>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">
				<i class="fa fa-shopping-cart fa-fw"></i> PRODUCTOS  <span class="caret"></span>
			</a> 
			<ul class="dropdown-menu">
				<li>
					<a href="index.php?op=verPortfolio"> VER PRODUCTOS</a>
				</li>
				<li>
					<a href="index.php?op=agregarPortfolio"> AGREGAR PRODUCTOS</a>
				</li>
			</ul>
		</li> 
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">
				<i class="fa fa-tag fa-fw"></i> CATEGORIAS  <span class="caret"></span>
			</a> 
			<ul class="dropdown-menu">
				<li>
					<a href="index.php?op=verCategoria"> VER CATEGORIAS</a>
				</li>
				<li>
					<a href="index.php?op=agregarCategoria"> AGREGAR CATEGORIAS</a>
				</li>
				<hr/>
				<li>
					<a href="index.php?op=verSubcategoria"> VER SUBCATEGORIAS</a>
				</li>
				<li>
					<a href="index.php?op=agregarSubcategoria"> AGREGAR SUBCATEGORIAS</a>
				</li>
			</ul>
		</li>  
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">
				<i class="fa fa-edit fa-fw"></i> CONTENIDOS  <span class="caret"></span>
			</a> 
			<ul class="dropdown-menu">
				<li>
					<a href="index.php?op=verContenidos"> VER CONTENIDOS</a>
				</li>
				<li>
					<a href="index.php?op=agregarContenidos"> AGREGAR CONTENIDOS</a>
				</li>
			</ul>
		</li> 
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">
				<i class="fa fa-list fa-fw"></i> PEDIDOS  <span class="caret"></span>
			</a> 
			<ul class="dropdown-menu">
				<li>
					<a href="index.php?op=verPedidos"> VER PEDIDOS</a>
				</li>						
			</ul>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">
				<i class="fa fa-bullhorn  fa-fw"></i> SLIDER <span class="caret"></span>
			</a> 
			<ul class="dropdown-menu">
				<li>
					<a href="index.php?op=verSlider"> VER SLIDERS</a>
				</li>
				<li>
					<a href="index.php?op=agregarSlider"> AGREGAR SLIDERS</a>
				</li>
			</ul>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">
				<i class="fa  fa-users fa-fw"></i> USUARIOS <span class="caret"></span>
			</a> 
			<ul class="dropdown-menu">
				<li>
					<a href="index.php?op=verUsuarios"> VER USUARIOS</a>
				</li>
				<li>
					<a href="index.php?op=agregarUsuarios"> AGREGAR USUARIOS</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="index.php?op=verEnvios"><i class="fa fa-truck fa-fw"></i> CORREO ARGENTINO</a>
		</li>
		<li style="display: none">

			<a href="index.php?op=verContacto"><i class="fa fa-comment fa-fw"></i> CONSULTAS DE CONTACTO</a>
		</li>
		<li>
			<a href="index.php?op=salir"><i class="fa fa-sign-out fa-fw"></i> SALIR</a>
		</li>
	</ul>
</nav>
