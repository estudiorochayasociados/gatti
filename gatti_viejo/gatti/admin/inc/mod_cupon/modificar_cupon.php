<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id != '') {
  $data = Descuentos_AdminTraerPorId($id);
}

if (isset($_POST['agregar'])) {
  $codigo = isset($_POST["codigo"]) ? $_POST["codigo"] : '';
  $descuento = isset($_POST["descuento"]) ? $_POST["descuento"] : '';
  $tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : '';
  $minimo = isset($_POST["minimo"]) ? $_POST["minimo"] : '';

  $sql = "
  UPDATE `descuento` 
  SET 
  `codigo` = '$codigo',
  `descuento` = '$descuento',
  `tipo` = '$tipo',
  `minimo` = '$minimo'
  WHERE `id`= '$id'";
  $link = Conectarse_Mysqli();
  $r = mysqli_query($link,$sql);
  header("location:index.php?op=verCupon");

}
?>

<div class="col-lg-10 col-md-12">
	<h4>Modificar &rarr; <?php echo strtoupper($data["codigo"]); ?></h4>
	<hr/>
 <form method="post" class="row" onsubmit="showLoading()">
  <label class="col-lg-6">Código:
    <br/>
    <input type="text" name="codigo" value="<?php echo $data["codigo"] ?>"  class="form-control"  />
  </label>
  <label class="col-lg-6">Descuento:
    <br/>
    <input type="text" name="descuento" value="<?php echo $data["descuento"] ?>" class="form-control"  />
  </label>
  <label class="col-lg-6">Tipo:
    <br/>
    <select name="tipo" class="form-control">
      <option></option>
      <option value="0" <?php if($data["tipo"] == 0) { echo "selected" ;} ?>>% de descuento</option>
      <option value="1" <?php if($data["tipo"] == 1) { echo "selected" ;} ?>>$ dinero</option>
    </select>
  </label>
  <label class="col-lg-6">Carrito mínimo:
    <br/>
    <input type="text" name="minimo" value="<?php echo $data["minimo"] ?>"  class="form-control"  />
  </label>       
  <div class="clearfix"></div><br/>
  <div class="col-lg-12">
   <input type="submit" class="btn btn-primary" name="agregar" value="Modificar Cupon" />
 </div>
</form>
</div> 