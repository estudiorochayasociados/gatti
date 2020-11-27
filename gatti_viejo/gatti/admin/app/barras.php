<?php
include("cnx.php");
header('Access-Control-Allow-Origin: *');  
$idConn = Conectarse();
$sqlVerificar = "SELECT * FROM `portfolio`";
$resultadoVerificar = mysql_query($sqlVerificar, $idConn);
while($data = mysql_fetch_array($resultadoVerificar)) { ?>
<img  src="barcode.php?text=<?php echo $data["id_portfolio"] ?>" width="200px" style=" display:block;" />
<br/>
<?php } ?>