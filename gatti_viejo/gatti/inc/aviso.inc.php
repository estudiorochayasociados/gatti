<?php
$codPedido = isset($_GET["cod"]) ? $_GET["cod"] : '';
$tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : 'MERCADO PAGO';
$estadoPagoOrden = isset($_GET["estado"]) ? $_GET["estado"] : '';
$dealname = "ORDEN: ".$codPedido;
$etiqueta = '';
 switch ($_SESSION["envioTipo"]) {
    case "Retiro en Sucursal Rosario":
    $receptor = "rosario@gattisa.com.ar";
    break;
    case "Retiro en Sucursal Buenos Aires":
    $receptor = "buenosaires@gattisa.com.ar";
    break;
    case "Retiro en Sucursal San Francisco Córdoba":
    $receptor = "casacentral@gattisa.com.ar ";
    break; 
    default:
    $receptor = "casacentral@gattisa.com.ar ";

    $cadenaEtiqueta = '';
    $cadenaEtiqueta .= "<head><meta charset='utf-8'><style>*{font-family:arial;} </style></head>";
    $cadenaEtiqueta .= "<div style='width:700px;margin:auto;font-size:22px;border:1px solid #e1e1e1;padding:20px'>";
    $cadenaEtiqueta .= "<div style='display:block'><img src='http://gattisa.com.ar/img/logo.png' width='200' style='float:left' /><h4 style='float:right' >¡MUCHAS GRACIAS POR TU COMPRA!</h4></div>";
    $cadenaEtiqueta .= "<div style='display:block'>";
    $cadenaEtiqueta .= "<br/><br/><br/><hr/><b>Tipo de envío:</b> ". $_SESSION["envioTipo"]."<br/>";
    $cadenaEtiqueta .= "<b>Precio:</b> $".$_SESSION["envio"]."<br/>";
    $cadenaEtiqueta .= "<b>Nombre y apellido</b>: " . $_SESSION["user"]["nombre"] . "<br/>";
    $cadenaEtiqueta .= "<b>Email</b>: " . $_SESSION["user"]["email"] . "<br/>";
    $cadenaEtiqueta .= "<b>Provincia</b>: " . $_SESSION["user"]["provincia"] . "<br/>";
    $cadenaEtiqueta .= "<b>Localidad</b>: " . $_SESSION["user"]["localidad"] . "<br/>";
    $cadenaEtiqueta .= "<b>Domicilio</b>: " . $_SESSION["user"]["direccion"] . "<br/>";
    $cadenaEtiqueta .= "<b>Teléfono</b>: " . $_SESSION["user"]["telefono"] . "<br/>";
    $cadenaEtiqueta .= "<b>Código Pedido</b>: " . $codPedido . "<br/>";
    $cadenaEtiqueta .= "</div>";
    $cadenaEtiqueta .= "</div>";

    $fp = fopen("archivos/envio/$codPedido.html", 'w+');
    fwrite($fp, $cadenaEtiqueta);
    fclose($fp);
    $etiqueta = BASE_URL."/archivos/envio/$codPedido.html";

    break;
}


//HUBSPOT
$user = Hubspot_Get("https://api.hubapi.com/contacts/v1/contact/email/".$emailUsuario."/profile");

$emailUsuario = $_SESSION["user"]["email"];

$descripcionHubspot = str_replace("<td>", "", $_SESSION["carritoFinal"]);
$descripcionHubspot = str_replace("</td>", " ", $descripcionHubspot);
$descripcionHubspot = str_replace("<tr>", "", $descripcionHubspot);
$descripcionHubspot = str_replace("<b>", "", $descripcionHubspot);
$descripcionHubspot = str_replace("</b>", "", $descripcionHubspot);
$descripcionHubspot = str_replace("</tr>", "\n", $descripcionHubspot);

$idUser = $user->vid;

if($idUser != '') {
    $array = array(
        "associations" => array(
            "associatedVids" => $idUser
        ), 
        "properties" => array(
            array('name' => "dealname","value" => "ORDEN: $codPedido"),
            array('name' => "description","value" => $descripcionHubspot),
            array('name' => "dealstage","value" => "closedwon"),
            array('name' => "pipeline","value" => "default"), 
            array('name' => "amount","value" => $_SESSION["precioFinal"]),
            array('name' => "dealtype","value" => "newbusiness")
        )
    );

    Hubspot_Dev($array, "https://api.hubapi.com/deals/v1/deal");
}

echo '<div class="titular"><h3>Compra realizada</h3></div>';
$carrito = $_SESSION["carritoFinal"];
if ($carrito == '') {
    unset($_SESSION["carrito"]);
    unset($_SESSION["carritoFinal"]);
    unset($_SESSION["precioFinal"]);
    unset($_SESSION["descuento"]);
}
switch ($pago) {
            // Tipo 1 transferencia - 2 tarjeta - 3 acordar con vendedor
            // Estado 0 pendiente de pago - 1 pago exitoso - 2 problemas con el pago - 3 enviado
    case 1:
    if ($carrito != '') {

        $_SESSION["carritoFinal"] .= "<tr><td><b>PROMO 10% DESCUENTO PAGO EFECTIVO</b></td><td></td><td></td><td><b>$" . ($_SESSION["precioFinal"] - ($_SESSION["precioFinal"] * 10) / 100) . "</b></td></tr></table>";

        $_SESSION["carritoFinal"] .= '<hr><b>Datos del pago:</b><br/><span style="font-size:12px">Transferencia Bancaria</span><hr/>Código de pedido: '.$codPedido;

        echo "<span class='alert alert-success btn-block'><b>¡Excelente, finalizaste tu carrito!.</b> <br/>A continuación vas a ver los datos de las cuentas bancarias y también te llegará un correo para que te comuniques con nosotros.</span>";
        echo '<table class="table table-striped"><thead><th>Nombre producto</th><th>Cantidad</th><th>Precio unidad</th><th>Precio total</th></thead>';
        echo $_SESSION["carritoFinal"];
        echo '<div class="clearfix"></div><br/>';
        echo "<div class='col-md-6 col-xs-12'><b>DATOS DE LAS CUENTAS BANCARIAS:</b><br/>$datosBancarios</div>";
        echo "<div class='col-md-6 col-xs-12'>";
        Traer_Contenidos("contacto");
        echo "</div>";
        echo '<div class="clearfix"></div><br/>';
        echo '<a href="sesion.php?op=pedidos" class="btn btn-success"><i class="fa fa-list"></i> Ver mis pedidos</a>';
        echo '<div class="clearfix"></div><br/>';
        $user = $_SESSION["user"]["id"];


        $mensaje = 'Nuevo pedido de productos <br/>';
        $mensaje .= '<table border="1" style="text-align:left;width:100%;font-size:13px !important"><thead><th>Nombre producto</th><th>Cantidad</th><th>Precio unidad</th><th>Precio total</th></thead>';
        $mensaje .= $_SESSION["carritoFinal"];
        $mensaje .= '</table>';
        $mensaje .= '<br/><hr/>';
        $mensaje .= '<br/><b>Datos del usuario:</b><br/>';
        $mensaje .= "<b>Nombre y apellido</b>: " . $_SESSION["user"]["nombre"] . "<br/>";
        $mensaje .= "<b>Email</b>: " . $_SESSION["user"]["email"] . "<br/>";
        $mensaje .= "<b>País</b>: " . $_SESSION["user"]["pais"] . "<br/>";
        $mensaje .= "<b>Provincia</b>: " . $_SESSION["user"]["provincia"] . "<br/>";
        $mensaje .= "<b>Localidad</b>: " . $_SESSION["user"]["localidad"] . "<br/>";
        $mensaje .= "<b>Domicilio</b>: " . $_SESSION["user"]["direccion"] . "<br/>";
        $mensaje .= "<b>Teléfono</b>: " . $_SESSION["user"]["telefono"] . "<br/>";
        $mensaje .= "<b>Empresa</b>: " . $_SESSION["user"]["empresa"] . "<br/>";
        if($etiqueta != '') {
            $mensaje .= "<br/><a href='".$etiqueta."' style='padding:10px;display:block;color:#fff;background:#E66515' target='_blank'>IMPRIMIR TICKET DE ENVÍO</a>";
        }


        $mensajeUsuario = 'Gracias por tu compra<br/><hr/>';
        $mensajeUsuario .= '<table border="1" style="text-align:left;width:100%;font-size:13px !important"><thead><th>Nombre producto</th><th>Cantidad</th><th>Precio unidad</th><th>Precio total</th></thead>';
        $mensajeUsuario .= $_SESSION["carritoFinal"];
        $mensajeUsuario .= '</table>';
        $mensajeUsuario .= '<br/><hr/>';
        $mensajeUsuario .= '<br/><b>Datos del usuario:</b><br/>';
        $mensajeUsuario .= "<b>Nombre y apellido</b>: " . $_SESSION["user"]["nombre"] . "<br/>";
        $mensajeUsuario .= "<b>Email</b>: " . $_SESSION["user"]["email"] . "<br/>";
        $mensajeUsuario .= "<b>País</b>: " . $_SESSION["user"]["pais"] . "<br/>";
        $mensajeUsuario .= "<b>Provincia</b>: " . $_SESSION["user"]["provincia"] . "<br/>";
        $mensajeUsuario .= "<b>Localidad</b>: " . $_SESSION["user"]["localidad"] . "<br/>";
        $mensajeUsuario .= "<b>Domicilio</b>: " . $_SESSION["user"]["direccion"] . "<br/>";
        $mensajeUsuario .= "<b>Teléfono</b>: " . $_SESSION["user"]["telefono"] . "<br/>";
        $mensajeUsuario .= "<b>Empresa</b>: " . $_SESSION["user"]["empresa"] . "<br/>";
        $mensajeUsuario .= "<br><i><b>Muchas gracias por tu compra, en el transcurso de las 24 hs un representante se estará comunicando con vos.</b></i>";

        Enviar_User_Admin($asunto, $mensaje, $receptor);
        Enviar_User($asuntoUsuario, $mensajeUsuario, $emailUsuario);

        $contaCarrito = count($_SESSION["carrito"]);
        $precioFinal = 0;
        $carroFinal = '';
        $con = Conectarse();

        for($i = 0; $i < $contaCarrito; $i++) {               

            @$carritoUpdate = explode("-",$_SESSION["carrito"][$i]);
            @$idProductoModificar = $carritoUpdate[0];
            @$cantidadProductoModificar = $carritoUpdate[1];

            $sql2 = "UPDATE `portfolio` SET `stock_portfolio`= (`stock_portfolio` - '$cantidadProductoModificar')  WHERE `id_portfolio`= '$idProductoModificar' ";
            $resultado2 = mysqli_query($con,$sql2);
        }

        $sql = "UPDATE `pedidos` SET `tipo_pedidos`= '$pago',`estado_pedidos`= 0 WHERE `cod_pedidos`= '$codPedido'";
        $resultado = mysqli_query($con,$sql);
        if ($resultado) {
            unset($_SESSION["carrito"]);
            unset($_SESSION["carritoFinal"]);
            unset($_SESSION["precioFinal"]);            
        }
    } else {
        echo "<span class='alert alert-success btn-block'><b>Lo sentimos, el carrito está vacio.</b> Vuelva a intentarlo.</span>";
    }
    break;
    case 2:
    if($tipo != "todopago") { 
        $cupon = isset($_GET["collection_id"]) ? $_GET["collection_id"] : '';
        $status = isset($_GET["collection_status"]) ? $_GET["collection_status"] : '';
        $payment_type = isset($_GET["payment_type"]) ? $_GET["payment_type"] : '';

        if ($status == "approved") {
            $estado = "1";
            $estadoPago = "aprobado";
            $alert = "alert alert-success";
        } elseif ($status == "pending") {
            $estado = "0";
            $estadoPago = "pendiente";
            $alert = "alert alert-warning";
        } elseif ($status == "rejected") {
            $estado = "2";
            $estadoPago = "rechazado";
            $alert = "alert alert-danger";
        }
    }

    $descripcion = "Cupón: " . $cupon . " / ";
    $descripcion .= "Medio: " . $tipo . " / ";
    $descripcion .= "Estado del pago: " . $estadoPago . " / ";
    $descripcion .= "Tipo de pago: " . $payment_type . " / ";
    $descripcion .= "Código de pedido: " . $codPedido . " / ";

    $_SESSION["carritoFinal"] .= '<hr><b>Datos del pago:</b><br/><span style="font-size:12px">' . $descripcion . "</span><hr/>";

    if ($carrito != '') {
        echo "<span class='" . $alert . " btn-block'><b>¡Excelente, finalizaste tu carrito!.</b> Tu pago se encuentra en estado: <b>$estadoPago</b>.</span>";
        echo '<table class="table table-striped"><thead><th>Nombre producto</th><th>Cantidad</th><th>Precio unidad</th><th>Precio total</th></thead>';
        echo $_SESSION["carritoFinal"];
        echo "</table>";
        echo '<div class="clearfix"></div><br/>';
        echo "<div class='col-md-6 col-xs-12'>";
        Traer_Contenidos("contacto");
        echo "</div>";
        echo '<div class="clearfix"></div><br/>';
        echo '<a href="sesion.php?op=pedidos" class="btn btn-success"><i class="fa fa-list"></i> Ver mis pedidos</a>';
        echo '<div class="clearfix"></div><br/>';
        $user = $_SESSION["user"]["id"];

        $mensaje = 'Nuevo pedido de productos <br/>';
        $mensaje .= '<table border="1" style="text-align:left;width:100%;font-size:13px !important"><thead><th>Nombre producto</th><th>Cantidad</th><th>Precio unidad</th><th>Precio total</th></thead>';
        $mensaje .= $_SESSION["carritoFinal"];
        $mensaje .= '</table>';
        $mensaje .= '<br/><hr/>';
        $mensaje .= '<br/><b>Datos del usuario:</b><br/>';
        $mensaje .= "<b>Nombre y apellido</b>: " . $_SESSION["user"]["nombre"] . "<br/>";
        $mensaje .= "<b>Email</b>: " . $_SESSION["user"]["email"] . "<br/>";
        $mensaje .= "<b>País</b>: " . $_SESSION["user"]["pais"] . "<br/>";
        $mensaje .= "<b>Provincia</b>: " . $_SESSION["user"]["provincia"] . "<br/>";
        $mensaje .= "<b>Localidad</b>: " . $_SESSION["user"]["localidad"] . "<br/>";
        $mensaje .= "<b>Domicilio</b>: " . $_SESSION["user"]["direccion"] . "<br/>";
        $mensaje .= "<b>Teléfono</b>: " . $_SESSION["user"]["telefono"] . "<br/>";
        $mensaje .= "<b>Empresa</b>: " . $_SESSION["user"]["empresa"] . "<br/>";
        if($etiqueta != '') {
            $mensaje .= "<a href='".$etiqueta."' style='padding:5px;display:block;color:#fff;background:#E66515' target='_blank'>IMPRIMIR TICKET DE ENVÍO</a>";
        } 

        $mensajeUsuario = 'Gracias por tu compra<br/><hr/>';
        $mensajeUsuario .= '<table border="1" style="text-align:left;width:100%;font-size:13px !important"><thead><th>Nombre producto</th><th>Cantidad</th><th>Precio unidad</th><th>Precio total</th></thead>';
        $mensajeUsuario .= $_SESSION["carritoFinal"];
        $mensajeUsuario .= '</table>';
        $mensajeUsuario .= '<br/><hr/>';
        $mensajeUsuario .= '<br/><b>Datos del usuario:</b><br/>';
        $mensajeUsuario .= "<b>Nombre y apellido</b>: " . $_SESSION["user"]["nombre"] . "<br/>";
        $mensajeUsuario .= "<b>Email</b>: " . $_SESSION["user"]["email"] . "<br/>";
        $mensajeUsuario .= "<b>País</b>: " . $_SESSION["user"]["pais"] . "<br/>";
        $mensajeUsuario .= "<b>Provincia</b>: " . $_SESSION["user"]["provincia"] . "<br/>";
        $mensajeUsuario .= "<b>Localidad</b>: " . $_SESSION["user"]["localidad"] . "<br/>";
        $mensajeUsuario .= "<b>Domicilio</b>: " . $_SESSION["user"]["direccion"] . "<br/>";
        $mensajeUsuario .= "<b>Teléfono</b>: " . $_SESSION["user"]["telefono"] . "<br/>";
        $mensajeUsuario .= "<b>Empresa</b>: " . $_SESSION["user"]["empresa"] . "<br/>";

        Enviar_User_Admin($asunto, $mensaje, $receptor);
        Enviar_User($asuntoUsuario, $mensajeUsuario, $emailUsuario);

        $contaCarrito = count($_SESSION["carrito"]);
        $precioFinal = 0;
        $carroFinal = '';
        $con = Conectarse(); 

        for($i = 0; $i < $contaCarrito; $i++) {               

            @$carritoUpdate = explode("-",$_SESSION["carrito"][$i]);
            @$idProductoModificar = $carritoUpdate[0];
            @$cantidadProductoModificar = $carritoUpdate[1];

            $sql2 = "UPDATE `portfolio` SET `stock_portfolio`= (`stock_portfolio` - '$cantidadProductoModificar')  WHERE `id_portfolio`= '$idProductoModificar' ";
            $resultado2 = mysqli_query($con,$sql2);
        }



        $sql = "UPDATE `pedidos` SET `tipo_pedidos`= '$pago',`estado_pedidos`= '$estado' WHERE `cod_pedidos`= '$codPedido'";

        $resultado = mysqli_query($con,$sql);
        if ($resultado) {
            unset($_SESSION["carrito"]);
            unset($_SESSION["carritoFinal"]);
            unset($_SESSION["precioFinal"]);            
        }

    } else {
        echo "<span class='alert alert-success btn-block'><b>Lo sentimos, el carrito está vacio.</b> Vuelva a intentarlo.</span>";
    }
    break;
    case 3:
    if ($carrito != '') {
        $_SESSION["carritoFinal"] .= "<tr><td><b>PROMO 10% DESCUENTO PAGO EFECTIVO</b></td><td></td><td></td><td><b>$" . ($_SESSION["precioFinal"] - ($_SESSION["precioFinal"] * 10) / 100) . "</b></td></tr></table>";

        $_SESSION["carritoFinal"] .= '<hr><b>Datos del pago:</b><br/><span style="font-size:12px">De Contado en Sucursal</span><hr/>Código de pedido: '.$codPedido;

        echo "<span class='alert alert-success btn-block'><b>¡Excelente, finalizaste tu carrito!.</b> <br/>A continuación vas a ver los datos de las cuentas bancarias y también te llegará un correo para que te comuniques con nosotros.</span>";
        echo '<table class="table table-striped"><thead><th>Nombre producto</th><th>Cantidad</th><th>Precio unidad</th><th>Precio total</th></thead>';
        echo $_SESSION["carritoFinal"];
        echo '<div class="clearfix"></div><br/>';
        echo "<div class='col-md-6 col-xs-12'>";
        Traer_Contenidos("contacto");
        echo "</div>";
        echo '<div class="clearfix"></div><br/>';
        echo '<a href="sesion.php?op=pedidos" class="btn btn-success"><i class="fa fa-list"></i> Ver mis pedidos</a>';
        echo '<div class="clearfix"></div><br/>';
        $user = $_SESSION["user"]["id"];


        $mensaje = 'Nuevo pedido de productos <br/>';
        $mensaje .= '<table border="1" style="text-align:left;width:100%;font-size:13px !important"><thead><th>Nombre producto</th><th>Cantidad</th><th>Precio unidad</th><th>Precio total</th></thead>';
        $mensaje .= $_SESSION["carritoFinal"];
        $mensaje .= '</table>';
        $mensaje .= '<br/><hr/>';
        $mensaje .= '<br/><b>Datos del usuario:</b><br/>';
        $mensaje .= "<b>Nombre y apellido</b>: " . $_SESSION["user"]["nombre"] . "<br/>";
        $mensaje .= "<b>Email</b>: " . $_SESSION["user"]["email"] . "<br/>";
        $mensaje .= "<b>País</b>: " . $_SESSION["user"]["pais"] . "<br/>";
        $mensaje .= "<b>Provincia</b>: " . $_SESSION["user"]["provincia"] . "<br/>";
        $mensaje .= "<b>Localidad</b>: " . $_SESSION["user"]["localidad"] . "<br/>";
        $mensaje .= "<b>Domicilio</b>: " . $_SESSION["user"]["direccion"] . "<br/>";
        $mensaje .= "<b>Teléfono</b>: " . $_SESSION["user"]["telefono"] . "<br/>";
        $mensaje .= "<b>Empresa</b>: " . $_SESSION["user"]["empresa"] . "<br/>";
        if($etiqueta != '') {
            $mensaje .= "<a href='".$etiqueta."' style='padding:5px;display:block;color:#fff;background:#E66515' target='_blank'>IMPRIMIR TICKET DE ENVÍO</a>";
        }

        $mensajeUsuario = 'Gracias por tu compra<br/><hr/>';
        $mensajeUsuario .= '<table border="1" style="text-align:left;width:100%;font-size:13px !important"><thead><th>Nombre producto</th><th>Cantidad</th><th>Precio unidad</th><th>Precio total</th></thead>';
        $mensajeUsuario .= $_SESSION["carritoFinal"];
        $mensajeUsuario .= '</table>';
        $mensajeUsuario .= '<br/><hr/>';
        $mensajeUsuario .= '<br/><b>Datos del usuario:</b><br/>';
        $mensajeUsuario .= "<b>Nombre y apellido</b>: " . $_SESSION["user"]["nombre"] . "<br/>";
        $mensajeUsuario .= "<b>Email</b>: " . $_SESSION["user"]["email"] . "<br/>";
        $mensajeUsuario .= "<b>País</b>: " . $_SESSION["user"]["pais"] . "<br/>";
        $mensajeUsuario .= "<b>Provincia</b>: " . $_SESSION["user"]["provincia"] . "<br/>";
        $mensajeUsuario .= "<b>Localidad</b>: " . $_SESSION["user"]["localidad"] . "<br/>";
        $mensajeUsuario .= "<b>Domicilio</b>: " . $_SESSION["user"]["direccion"] . "<br/>";
        $mensajeUsuario .= "<b>Teléfono</b>: " . $_SESSION["user"]["telefono"] . "<br/>";
        $mensajeUsuario .= "<b>Empresa</b>: " . $_SESSION["user"]["empresa"] . "<br/>";
        $mensajeUsuario .= "<br><i><b>Muchas gracias por tu compra, en el transcurso de las 24 hs un representante se estará comunicando con vos.</b></i>";


        Enviar_User_Admin($asunto, $mensaje, $receptor);
        Enviar_User($asuntoUsuario, $mensajeUsuario, $emailUsuario);

        $contaCarrito = count($_SESSION["carrito"]);
        $precioFinal = 0;
        $carroFinal = '';
        $con = Conectarse();

        for($i = 0; $i < $contaCarrito; $i++) {               

            @$carritoUpdate = explode("-",$_SESSION["carrito"][$i]);
            @$idProductoModificar = $carritoUpdate[0];
            @$cantidadProductoModificar = $carritoUpdate[1];

            $sql2 = "UPDATE `portfolio` SET `stock_portfolio`= (`stock_portfolio` - '$cantidadProductoModificar')  WHERE `id_portfolio`= '$idProductoModificar' ";
            $resultado2 = mysqli_query($con,$sql2);
        }


        $sql = "UPDATE `pedidos` SET `tipo_pedidos`= '$pago',`estado_pedidos`= 0 WHERE `cod_pedidos`= '$codPedido'";

        $resultado = mysqli_query($con,$sql);
        if ($resultado) {
            unset($_SESSION["carrito"]);
            unset($_SESSION["carritoFinal"]);
            unset($_SESSION["precioFinal"]);            
        }
    } else {
        echo "<span class='alert alert-success btn-block'><b>Lo sentimos, el carrito está vacio.</b> Vuelva a intentarlo.</span>";
    }
    break;
}


if($_SESSION["user"]["invitado"] == 0) {
    unset($_SESSION["user"]);    
}
?>