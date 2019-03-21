<?php

namespace config;
class autoload
{
    public static function runSitio()
    {
        //require_once "Config/Minify.php";
        session_start();
        $_SESSION["cod_pedido"] = isset($_SESSION["cod_pedido"]) ? $_SESSION["cod_pedido"] : substr(md5(uniqid(rand())), 0, 10);
        define('SALT', hash("sha256", "salt@estudiorochayasoc.com.ar"));
        define('URL', "http://" . $_SERVER['HTTP_HOST'] . "/Gatti2");
        define('CANONICAL', "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
        define('GOOGLE_TAG', "");
        define('TITULO', "GATTI SA");
        define('TELEFONO', "03564 422291");
        define('CIUDAD', "San Francisco");
        define('PROVINCIA', "Cordoba");
        define('PAIS', "Argentina");
        define('EMAIL', "web@estudiorochayasoc.com.ar");
        define('PASS_EMAIL', "weAr2010");
        define('SMTP_EMAIL', "cs1008.webhostbox.net");
        define('DIRECCION', "Av. 9 de Septiembre 3203");
        define('LOGO', URL . "/assets/img/logo.png");
        define('FAVICON', URL . "/assets/img/favicon.ico");
        define('APP_ID_FB', "");
        spl_autoload_register(function ($clase) {
            $ruta = str_replace("\\", "/", $clase) . ".php";
            include_once $ruta;
        });
    }

    public static function runSitio2()
    {
        spl_autoload_register(function ($clase) {
            $ruta = str_replace("\\", "/", $clase) . ".php";
            include_once "../../" . $ruta;
        });
    }

    public static function runAdmin()
    {
        session_start();
        define('URLSITE', "http://" . $_SERVER['HTTP_HOST'] . "/Gatti2");
        define('URL', "http://" . $_SERVER['HTTP_HOST'] . "/Gatti2/admin");
        define('CANONICAL', "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
        define('LOGO', URL . "/assets/img/logo/logo.png");
        define('MELI_ID', "7999670077552792");
        define('MELI_SECRET', "obJyQzXFSXH0H4FqCbz6tJAR2ARakJNb");
        require_once "../Clases/Zebra_Image.php";
        spl_autoload_register(function ($clase) {
            $ruta = str_replace("\\", "/", $clase) . ".php";
            include_once "../" . $ruta;
        });
    }
}
