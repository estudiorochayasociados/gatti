<?php 
if (isset($_POST['agregar'])) {
  $codigo = isset($_POST["codigo"]) ? $_POST["codigo"] : '';
  $descuento = isset($_POST["descuento"]) ? $_POST["descuento"] : '';
  $tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : '';
  $minimo = isset($_POST["minimo"]) ? $_POST["minimo"] : '';

  $sql = "INSERT INTO `descuento`(`codigo`, `descuento`, `tipo`, `minimo`) VALUES ('$codigo', '$descuento', '$tipo', '$minimo')";
  $link = Conectarse_Mysqli();
  $r = mysqli_query($link,$sql);
  //header("location:index.php?op=verCupon");
}
?>
<div class="col-md-12">
	<h4>Agregar Cupón</h4>
	<hr/>
	<form method="post" class="row" onsubmit="showLoading()">
		<label class="col-lg-6">Código:
			<br/>
			<input type="text" name="codigo"  class="form-control"  />
		</label>
    <label class="col-lg-6">Descuento:
      <br/>
      <input type="text" name="descuento" class="form-control"  />
    </label>
    <label class="col-lg-6">Tipo:
      <br/>
      <select name="tipo" class="form-control">
        <option></option>
        <option value="0">% de descuento</option>
        <option value="1">$ dinero</option>
      </select>
    </label>
    <label class="col-lg-6">Carrito mínimo:
      <br/>
      <input type="text" name="minimo"  class="form-control"  />
    </label>       
    <div class="clearfix"></div><br/>
    <div class="col-lg-12">
     <input type="submit" class="btn btn-primary" name="agregar" value="Agregar Cupon" />
   </div>
 </form>
</div>
