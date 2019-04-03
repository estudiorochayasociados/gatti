<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$hub = new Clases\Hubspot();
$pedido = new Clases\Pedidos();
$producto = new Clases\Productos();
//$data = $pedido->listWithOps('','','1');
//var_dump($data);

//$hub->set("email","t@t.com");
//$user = $hub->getContactByEmail();
////var_dump($user);
////echo "<hr>";
//$hub->set("vid",$user['vid']);
//$hub->set("nombre", "prueba us");
//$response = $hub->updateContact();
//var_dump($response);
//$t=time();
//echo $t;
//echo "<br>";
//    $hub->set("vid", 451);
//$hub->set("titulo", "Pedido: ");
//$hub->set("estado", "decisionmakerboughtin");
//$hub->set("fecha",  time());
//$hub->set("total", 5);
//$hub->set("descripcion", "asdasdasdasd");
//$hub->createDeal();

$pedidos = $pedido->listWithOps('','','1');
//var_dump($pedidos);
$hub->set("deal",$pedidos[0]['data']['hub_cod']);
$id=$hub->getDealId();
$hub->set("deal",$id['dealId']);
$stage = $hub->getStage(1);
$hub->set("estado",$stage);
//$hub->updateStage();


//var_dump($prod);
?>