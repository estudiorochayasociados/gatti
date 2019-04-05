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
        define('URL', "http://" . $_SERVER['HTTP_HOST'] . "/Gatti2");
        define('CANONICAL', "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
        define('GOOGLE_TAG', "");
        define('TITULO', "GATTI SA");
        define('TELEFONO', "3564 589747");
        define('CIUDAD', "San Francisco");
        define('PROVINCIA', "Cordoba");
        define('PAIS', "Argentina");
        define('EMAIL', "mkt@gattisa.com.ar");
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
        define('SALT', hash("sha256", "salt@estudiorochayasoc.com.ar"));
        define('HUBKEY', "9d0a9974-0576-4494-9798-22e3300e4b21");
        define('LOGO', URL . "/assets/img/logo/logo.png");
        define('MELI_ID', "5737861010581482");
        define('MELI_SECRET', "eVbx5m7ynhVosyvbHrME9s7RYKy27nbY");
        require_once "../Clases/Zebra_Image.php";
        spl_autoload_register(function ($clase) {
            $ruta = str_replace("\\", "/", $clase) . ".php";
            include_once "../" . $ruta;
        });
    }
}
