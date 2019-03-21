<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$portfolio = new Clases\Portfolio();
$productos = new Clases\Productos();
$img = new  Clases\Imagenes();
$categoria = new Clases\Categorias();
$ok=0;
if ($ok==1){
    $portfolio_data = $portfolio->list('');
    foreach ($portfolio_data as $port){
        $cod   = substr(md5(uniqid(rand())), 0, 10);
        $productos->set("cod",$cod);
        $productos->set("cod_producto",$port['cod_portfolio']);
        $productos->set("titulo",$port['nombre_portfolio']);
        $productos->set("desarrollo",$port['descripcion_portfolio']);

        $productos->set("",);
        $productos->set("",);
        $productos->set("",);
        $productos->set("",);
        $productos->set("",);
        $productos->set("",);
    }
}
?>

