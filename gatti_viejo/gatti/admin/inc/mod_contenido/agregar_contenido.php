<?php 
if (isset($_POST['agregar'])) {
    if ($_POST["codigo"] != '' && $_POST["contenido"] != '') {
      $codigo = $_POST["codigo"];
      $contenido = $_POST["contenido"];

      $sql = "INSERT INTO `contenidos` (`codigo`,`contenido`) VALUES ('$codigo','$contenido')";
      $link = Conectarse();
      $r = mysqli_query($link,$sql);

      header("location:index.php?op=verContenidos");

  }
}
?>

<div class="col-lg-12 col-md-12">
	<h4>Agregar Contenido</h4>
	<hr/>
	<form method="post" onsubmit="showLoading()">
		<label class="col-lg-12">Título:
			<br/>
			<input type="text" name="codigo" value=""   class="form-control"  />
		</label>
       <label class="col-lg-12" >Contenido: 
         <br/>
         <textarea name="contenido"  class="form-control"></textarea> 
     </label>  
     <div class="clearfix"></div>
     <label class="col-lg-12">
         <input type="submit" class="btn btn-primary" name="agregar" value="Agregar Contenido" />
     </label>
 </form>
</div>
