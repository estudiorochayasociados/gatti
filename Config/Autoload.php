<?php

namespace config;
class autoload
{

    public static function runSitio()
    {
        //require_once "Config/Minify.php";
        session_start();
        $_SESSION["cod_pedido"] = isset($_SESSION["cod_pedido"]) ? $_SESSION["cod_pedido"] : strtoupper(substr(md5(uniqid(rand())), 0, 7));
        define('SALT', hash("sha256", "salt@estudiorochayasoc.com.ar"));
        define('URL', "https://" . $_SERVER['HTTP_HOST'] . "/Gatti");
        define('CANONICAL', "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
        define('GOOGLE_TAG', "");
        define('TITULO', "GATTI SA");
        define('TELEFONO', "3564589747");
        define('TELEFONO_VENTAS_ONLINE', "3564589745");
        define('CIUDAD', "San Francisco");
        define('PROVINCIA', "Cordoba");
        define('PAIS', "Argentina");
        define('EMAIL', "webestudiorocha@gmail.com");
        define('EMAIL_NOTIFICACION','web@estudiorochayasoc.com.ar');
        define('PASS_EMAIL', "weAr2010");
        define('SMTP_EMAIL', "cs1008.webhostbox.net");
        define('DIRECCION', "Av. 9 de Septiembre 3203");
        define('LOGO', URL . "/assets/img/logo.png");
        define('FAVICON', URL . "/assets/img/favicon.png");
        define('HUBKEY', "9d0a9974-0576-4494-9798-22e3300e4b21");
        define('APP_ID_FB', "");
        define('MP_ID',"1593771261124394");
        define('MP_SECRET',"mYbUuN2PQG9DXBValCyEpxS1Avu7slFZ");
        define('CAPTCHA_KEY',"6LfwlVUUAAAAAKbrTmmJ4HCxU8bF8Ms6JjbmL1Me");
        define('CAPTCHA_SECRET',"6LfwlVUUAAAAAOBjeQuKlRpsjEngOoSmaDFgXAO4");
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
        define('URLSITE', "https://" . $_SERVER['HTTP_HOST'] . "/Gatti");
        define('URL', "https://" . $_SERVER['HTTP_HOST'] . "/Gatti/admin");
        define('CANONICAL', "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
        define('SALT', hash("sha256", "salt@estudiorochayasoc.com.ar"));
        define('HUBKEY', "9d0a9974-0576-4494-9798-22e3300e4b21");
        define('LOGO', URL . "/assets/img/logo/logo.png");
        define('MELI_ID', "7886107849656513");
        define('MELI_SECRET', "qpmHgTrLTYlff4gA8PUsE8mqjsgDE3ki");
        require_once "../Clases/Zebra_Image.php";
        spl_autoload_register(function ($clase) {
            $ruta = str_replace("\\", "/", $clase) . ".php";
            include_once "../" . $ruta;
        });
    }

    public static function runAdminAPI()
    {
        session_start();
        define('URLSITE', "https://" . $_SERVER['HTTP_HOST'] . "/Gatti");
        define('URL', "https://" . $_SERVER['HTTP_HOST'] . "/Gatti/admin");
        define('CANONICAL', "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
        require_once "../../Clases/Zebra_Image.php";
        spl_autoload_register(function ($clase) {
            $ruta = str_replace("\\", "/", $clase) . ".php";
            include_once "../../" . $ruta;
        });
    }
}
