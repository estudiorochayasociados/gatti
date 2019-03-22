<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$portfolio = new Clases\Portfolio();
$productos = new Clases\Productos();
$img = new  Clases\Imagenes();
$categoria = new Clases\Categorias();
$ok = 1;
if ($ok == 1) {
    $portfolio_data = $portfolio->list('');
    foreach ($portfolio_data as $port) {
        $cod = substr(md5(uniqid(rand())), 0, 10);
        $productos->set("cod", $cod);
        $productos->set("cod_producto", $port['cod_portfolio']);
        $productos->set("titulo", $port['nombre_portfolio']);
        $productos->set("desarrollo", $port['descripcion_portfolio']);
        $productos->set("stock", $port['stock_portfolio']);

        $productos->set("precio", $port['precio_portfolio']);
        $productos->set("precio_descuento", $port['preciodesc_portfolio']);

        switch ($port['categoria_portfolio']) {
            case '10':
                $productos->set("categoria", "fcc1569a20");
                break;
            case '11':
                $productos->set("categoria", "61e82f4be2");
                break;
            case '12':
                $productos->set("categoria", "6d818d6604");
                break;
            case '13':
                $productos->set("categoria", "c31e9829ae");
                break;
            case '21':
                $productos->set("categoria", "a45ed48c22");
                break;
            case '22':
                $productos->set("categoria", "03b2fc7fcb");
                break;
            case '23':
                $productos->set("categoria", "eed3230232");
                break;
            case '25':
                $productos->set("categoria", "7b90340746");
                break;
            case '7':
                $productos->set("categoria", "e93de1739c");
                break;
            case '8':
                $productos->set("categoria", "7f68015e9c");
                break;
            case '9':
                $productos->set("categoria", "06aaaafbc2");
                break;
            case 'ALQUILERES':
                $productos->set("categoria", "7b90340746");
                break;
            case 'LÍNEA INDUSTRIAL':
                $productos->set("categoria", "eed3230232");
                break;
        }
        switch ($port['subcategoria_portfolio']) {
            case '10':
                $productos->set("subcategoria", "cbf69f7265");
                break;
            case '12':
                $productos->set("subcategoria", "0d1b59f0bf");
                break;
            case '13':
                $productos->set("subcategoria", "81aec204d8");
                break;
            case '14':
                $productos->set("subcategoria", "05bfcba812");
                break;
            case '15':
                $productos->set("subcategoria", "abc69bcbab");
                break;
            case '16':
                $productos->set("subcategoria", "39cf6773f4");
                break;
            case '17':
                $productos->set("subcategoria", "8b2ec1da68");
                break;
            case '19':
                $productos->set("subcategoria", "f1fbde6062");
                break;
            case '20':
                $productos->set("subcategoria", "54cf08e06b");
                break;
            case '21':
                $productos->set("subcategoria", "46643097e3");
                break;
            case '4':
                $productos->set("subcategoria", "74430dc081");
                break;
            case '5':
                $productos->set("subcategoria", "67e10f2925");
                break;
            case '9':
                $productos->set("subcategoria", "917986bc66");
                break;
            case 'VENTILADORES':
                $productos->set("subcategoria", "46643097e3");
                break;
        }

        $productos->set("variable1",$port['estado_portfolio']);
        $productos->set("variable2",$port['tipo_portfolio']);
        $productos->set("variable4",$port['peso_portfolio']);
        $productos->set("variable9",$port['video1_portfolio']);

        $productos->set("fecha",$port['fecha_portfolio']);
        if (!empty($port['imagen1_portfolio'])){
            $image = explode("/",$port['imagen1_portfolio']);
            $image__=$image[3];
        }
        if (!empty($port['imagen2_portfolio'])){
            $image = explode("/",$port['imagen2_portfolio']);
            $image__.='///'.$image[3];

        }
        if (!empty($port['imagen3_portfolio'])){
            $image = explode("/",$port['imagen3_portfolio']);
            $image__.='///'.$image[3];

        }
        if (!empty($port['imagen4_portfolio'])){
            $image = explode("/",$port['imagen4_portfolio']);
            $image__.='///'.$image[3];

        }
        if (!empty($port['imagen5_portfolio'])){
            $image = explode("/",$port['imagen5_portfolio']);
            $image__.='///'.$image[3];

        }
        $productos->set("variable8",$image__);
        //$productos->add();
    }
    $filter=array("id>100");
    $productos_data=$productos->listWithOps($filter,'id ASC','');
    foreach ($productos_data as $prod){
       $image__=explode("///",$prod['data']['variable8']);
       //var_dump($image__);
       //echo '<br>';
        foreach ($image__ as $i__){
            $img->set("cod",$prod['data']['cod']);
            $ruta = "assets/archivos/recortadas/".$i__;
            //var_dump($img);
            //echo '<br>';
            $img->set("ruta",$ruta);
            //$img->add();
        }
    }
}
?>

