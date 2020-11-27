<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.11&appId=171104813521342';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php
$id = antihack_mysqli(isset($_GET["id"]) ? $_GET["id"] : ''); 
$nota = antihack(strpos($_SERVER['REQUEST_URI'], "nota"));
$producto = antihack(strpos($_SERVER['REQUEST_URI'], "producto"));
$host= $_SERVER["HTTP_HOST"];

if($nota){
	?>
	<div class="fb-comments" data-href="<?php echo "http://" . $host;?>/nota.php?id=<?php echo $id; ?>" data-width="100%" data-numposts="20" data-order-by="reverse_time"></div>
<?php }

if($producto){
	?>
	<div class="fb-comments" data-href="<?php echo "http://" . $host;?>/producto.php?id=<?php echo $id; ?>" data-width="100%" data-numposts="20" data-order-by="reverse_time"></div>
<?php } ?>
