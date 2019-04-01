<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$hub = new Clases\Hubspot();


$hub->set("email","t@t.com");
$user = $hub->getContactByEmail();
var_dump($user);
echo "<hr>";
$hub->set("vid",$user['vid']);
$hub->set("nombre", "prueba us");
$response = $hub->updateContact();
var_dump($response);
?>