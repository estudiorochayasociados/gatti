<?php
$displockEnvio = "block";
$_SESSION["envioTipo"] = isset($_SESSION["envioTipo"]) ? $_SESSION["envioTipo"] : '';
$_SESSION["envio"] = isset($_SESSION["envio"]) ? $_SESSION["envio"] : '';


$descuentoSacar = isset($_GET["descuento"]) ? $_GET["descuento"] : '';
if (empty($_SESSION["carrito"])) {
    header("location:sesion.php");
}


$finalizar = isset($_GET["finalizar"]) ? $_GET["finalizar"] : '';
$pago = isset($_GET["pago"]) ? $_GET["pago"] : '';

$asunto = "Nueva compra de productos desde la web";
$receptor = "web@gattisa.com.ar";
//$receptor = "webestudiorocha@gmail.com";
if(isset($_SESSION["user"])) {
    $emailUsuario = $_SESSION["user"]["email"];
}
$asuntoUsuario = "¡Gracias por tu compra!";

$datosBancarios = "
<b>BANCO GALICIA</b><br/>
cta. cte no: 887-5 109/0<br/>
CBU 0070109520000000887504<br/>
SUC: 109<br/>
<br/>
<b>BANCO NACIÓN</b><br/>
Cta cte no: 4670026386<br/>
CBU: 01104671-20046700263862<br/>
SUC: 3160<br/>
<br/>
<b>BANCO CÓRDOBA</b><br/>
Cta. Cte n°: 307-300040/3<br/>
CBU: 0200307601000030004033<br/>";

if ($finalizar != '') {
    if ($pago == '') {
        include("inc/mercadopago.inc.php");
    } else {
        include("inc/aviso.inc.php");
    }
} else { ?>
    <div class="titular">
        <h3> Carrito de compra</h3>
    </div>
    <table class="table table-striped">
        <thead>
            <th>Nombre producto</th>
            <th>Cantidad</th>
            <th>Precio unidad</th>
            <th>Precio total</th>
            <th></th>
        </thead>
        <?php

        $eliminar = isset($_GET["eliminar"]) ? $_GET["eliminar"] : '';
        if ($eliminar != '') {
            unset($_SESSION["carrito"][$eliminar]);
            $_SESSION["envioTipo"] = '';
            $_SESSION["envio"] = '';
            header("location: ".BASE_URL."/carrito");
        }

        $contaCarrito = count($_SESSION["carrito"]);
        end($_SESSION["carrito"]);
        $contaCarrito = key($_SESSION["carrito"]);
        $precioFinal = 0;
        $carroFinal = '';
        $codigoDescuento = isset($_SESSION["codigoDescuento"]) ? $_SESSION["codigoDescuento"] : '';
        for ($i = 0; $i <= $contaCarrito; $i++) {
            if (isset($_SESSION["carrito"][$i])) {
                @$carrito = explode("-", $_SESSION["carrito"][$i]);
                @$dataProducto = Portfolio_TraerPorId($carrito[0]);
                @$peso += $dataProducto["peso_portfolio"]*$carrito[1];
                $moneda = "ARS";
                $precio = $dataProducto["precio_portfolio"];
                $precio = number_format($precio, 2, '.', '');

                $stock = $dataProducto["stock_portfolio"];
                if ($carrito[1] > $stock) {
                    $error = 1;
                } else {
                    $error = 0;
                }
                $precioTotal = $precio * $carrito[1];
                $precioTotal = number_format($precioTotal, 2, '.', '');
                $precioFinal = $precioFinal + $precioTotal;
                $precioFinal = number_format($precioFinal, 2, '.', '');
                $carroFinal .= "<tr><td>" . $dataProducto["nombre_portfolio"] . "</td><td>" . $carrito[1] . "</td><td>$" . $precio . "</td><td>$" . $precioTotal . "</td></tr>";
                ?>
                <?php if ($error == 1) {
                    echo "Lo sentimos otro usuario agoto el stock de <b>" . $dataProducto["nombre_portfolio"] . "</b> a un total de: <b>" . $dataProducto["stock_portfolio"] . " unidades</b>, para poder seguir comprando debe eliminar el item en la cruz azul al final de la tabla.<br/>";
                } ?>
                <tr <?php if ($error == 1) {
                    echo "style='background:#c2251d !important;color:#f1f1f1 !important'";
                } ?>>
                <td>
                    <a href="<?=BASE_URL?>/producto.php?id=<?php echo $dataProducto["id_portfolio"] ?>"><?php echo $dataProducto["nombre_portfolio"] ?></a>
                </td>
                <td>
                    <?php echo $carrito[1] ?>
                </td>
                <td>
                    <?php echo "$" . $precio ?>
                </td>
                <td>
                    <?php echo "$" . $precioTotal ?>
                </td>
                <td>
                    <a href="<?=BASE_URL?>/sesion.php?op=ver-carrito&eliminar=<?php echo $i ?>"><i class="fa fa-close"></i></a>
                </td>
            </tr>
            <?php
        }
    }


    $precioEnvio = '';

    if ($peso <= 1) {
        $precioEnvioDomicilio = Precio_Envio(1,"dom");
        $precioEnvioSucursal = Precio_Envio(1,"suc");
    } elseif ($peso <= 3) {
        $precioEnvioDomicilio = Precio_Envio(3,"dom");
        $precioEnvioSucursal = Precio_Envio(3,"suc");
    } elseif ($peso <= 5) {
        $precioEnvioDomicilio = Precio_Envio(5,"dom");
        $precioEnvioSucursal = Precio_Envio(5,"suc");
    } elseif ($peso <= 10) {
        $precioEnvioDomicilio = Precio_Envio(10,"dom");
        $precioEnvioSucursal = Precio_Envio(10,"suc");
    } elseif ($peso <= 15) {
        $precioEnvioDomicilio = Precio_Envio(15,"dom");
        $precioEnvioSucursal = Precio_Envio(15,"suc");
    } elseif ($peso <= 20) {
        $precioEnvioDomicilio = Precio_Envio(20,"dom");
        $precioEnvioSucursal = Precio_Envio(20,"suc");
    }elseif ($peso <= 25) {
        $precioEnvioDomicilio = Precio_Envio(25,"dom");
        $precioEnvioSucursal = Precio_Envio(25,"suc");
    } elseif ($peso <= 30) {
        $precioEnvioDomicilio = Precio_Envio(30,"dom");
        $precioEnvioSucursal = Precio_Envio(30,"suc");
    } 

    $ivaTotal = 0;
    $precioFinal = $ivaTotal + $precioFinal;
    if (isset($_POST["envio"])) {
        echo $_POST["envio"]."<br/>";
        $envioExplotado = explode("|", $_POST["envio"]);  
        //var_dump($envioExplotado);
        @$_SESSION["envioTipo"] = $envioExplotado[1];
        @$_SESSION["envio"] = $envioExplotado[0];
        $displockEnvio = "none";
    }

    if($descuentoSacar == 1) {
        $_SESSION["descuento"] = '';
        $descuento = 0;
        header("location:sesion.php?op=ver-carrito");
    }

    if(isset($_SESSION["descuento"])) {
        if($_SESSION["descuento"] != '') {
            if($precioFinal <= $_SESSION["descuento"]["minimo"]) {
                $descuento = 0;
                $_SESSION["descuento"] = '';
                header("location:sesion.php?op=ver-carrito");
            }
        }
    }

    if (($precioFinal > 500 && $precioFinal < 1500) || ($precioFinal > 3500 && $precioFinal < 7000)) {
        @$_SESSION["envioTipo"] = "Envío Gratuito";
        @$_SESSION["envio"] = "0";
        ?>
        <div id="formEnvio" class="alert alert-success animated fadeIn">
            <b>¡Te regalamos tu envío, porque tu pedido se encuentra entre $550 a $1500 o de $3500 a $7000.</b>
        </div>
        <?php
    } else {
      if ($peso <= 30) { ?>
          <div id="formEnvio" class="alert alert-warning animated fadeIn"
          style="display: <?php echo $displockEnvio ?>">
          <b>Elegí el tipo de envío para tus productos: (<?php echo $peso ?>kg) </b><i style="float:right;font-size:12px">* Seleccionar la mejor opción y presionar Finalizar Carrito</i><br/>
          <form method="post">
            <select name="envio" class="form-control" id="envio" onchange="this.form.submit()">
                <option value="" selected disabled>Elegir envío</option>
                <option value="<?php echo $precioEnvioSucursal ?>|Correo Argentino a Sucursal <?php echo $peso ?>kg" <?php if (isset($_POST["envio"])) { if ($_POST["envio"] == $precioEnvioSucursal) { echo "selected"; }        } ?>>
                    Correo Argentino a Sucursal $<?php echo $precioEnvioSucursal ?>
                </option>
                <option value="<?php echo $precioEnvioDomicilio ?>|Correo Argentino a Domicilio <?php echo $peso ?>kg" <?php if (isset($_POST["envio"])) { if ($_POST["envio"] == $precioEnvioDomicilio) { echo "selected"; }    } ?>>
                    Correo Argentino a Domicilio $<?php echo $precioEnvioDomicilio ?>
                </option> 
                <option value="0|Retiro en Sucursal Rosario" <?php if (isset($_POST["envio"])) { if ($_POST["envio"] == "0|Retiro en Sucursal Rosario") { echo "selected"; }} ?>>
                    Retiro en Sucursal Rosario
                </option>
                <option value="0|Retiro en Sucursal Buenos Aires" <?php if (isset($_POST["envio"])) { if ($_POST["envio"] == "0|Retiro en Sucursal Buenos Aires") { echo "selected"; }} ?>>
                    Retiro en Sucursal Buenos Aires
                </option>
                <option value="0|Retiro en San Francisco Córdoba" <?php if (isset($_POST["envio"])) { if ($_POST["envio"] == "0|Retiro en San Francisco Córdoba") { echo "selected"; }} ?>>
                    Retiro en Sucursal San Francisco Córdoba
                </option>
            </select>
        </form>
    </div>
    <?php
} else {
    @$_SESSION["envioTipo"] = "Envío especial por cuenta del cliente";
    @$_SESSION["envio"] = "0";
    ?>
    <div id="formEnvio" class="alert alert-danger animated fadeIn">
        Tu pedido necesita ENVÍO ESPECIAL, debemos contactarnos con un transporte que pueda realizar tu envío.
    </div>
    <?php
}
}
?>

<?php
if (!is_numeric($_SESSION["envio"])) {
    $error = 1;
}
?>


<?php
if (@isset($_SESSION["descuento"])) {
    if(@$_SESSION["descuento"]["descuento"] != '') { 
        echo "<tr>";
        if($_SESSION["descuento"]["tipo"] == 0) {
            $descuento = (($precioFinal*$_SESSION["descuento"]["descuento"]) / 100);                    
            echo "<td><b>Descuento: ".$_SESSION["descuento"]["codigo"]." - ".$_SESSION["descuento"]["descuento"]."% de descuento</b></td><td></td>";
            echo "<td></td>";
            echo "<td>$".$descuento."</td>";
        } else {             
            $descuento = ($precioFinal - $_SESSION["descuento"]["descuento"]);
            echo "<td><b>Descuento: ".$_SESSION["descuento"]["codigo"]." - $".$_SESSION["descuento"]["descuento"]." de descuento</b></td><td></td>";
            echo "<td></td>";
            echo "<td>$".$descuento."</td>";
        }
        echo '<td><a href="'.BASE_URL.'/sesion.php?op=ver-carrito&descuento=1" data-toggle="tooltip" title="Borrar Descuento"><i class="fa fa-close"></i></a></td></tr>';
    }else {
        $descuento = 0;
    }
} else {
    $descuento = 0;
}
?>


<tr>
    <td><b>Tipo de envío: <?php echo $_SESSION["envioTipo"]; ?></b></td>
    <td></td>
    <td></td>
    <td>
        <?php
        if (isset($_SESSION["envio"])) {
            if ($_SESSION["envio"] != '') {
                if ($_SESSION["envio"] === 0) {
                    echo "Gratis";
                } else {
                    echo "$" . $_SESSION["envio"];
                }
            }
        }
        ?>
    </td>
    <td><a href="#" onclick="$('#formEnvio').show()"><i class="fa fa-refresh"></i></a></td>
</tr>

<tr>
    <td><b>Precio Final Total</b></td>
    <td></td>
    <td></td>
    <td id="precioFinalFinal"><b>$<?php echo @(($precioFinal - $descuento) + $_SESSION["envio"]); ?></b></td>
    <td></td>
</tr>
</table>
<?php 
$displayCodigo = 'block';

if(isset($_POST["btn_codigo"])) {
    $codigo = isset($_POST["codigoDescuento"]) ? $_POST["codigoDescuento"] : '';
    if($codigo != '') {
        $dataCodigo = Buscar_Codigo_Descuento($codigo);
        if($dataCodigo[0] != '') {
            if($precioFinal >= $dataCodigo["minimo"]) {
                $_SESSION["descuento"] = $dataCodigo;                
                if($dataCodigo["tipo"] == 0) {
                    ?>
                    <span class="alert alert-success" style="display: block">¡Excelente! tenes un <? echo $dataCodigo["descuento"] ?>% de descuento en tus compras.</span>
                    <div class="clearfix"></div>
                    <?php
                    header("location:sesion.php?op=ver-carrito");
                } else {
                    ?>
                    <span class="alert alert-success" style="display: block">¡Excelente! tenes un descuento de $<? echo $dataCodigo["descuento"] ?> pesos en tus compras.</span>
                    <div class="clearfix"></div>
                    <?php
                    header("location:sesion.php?op=ver-carrito");
                }
            } else {
                ?><span class="alert alert-danger" style="display: block">Lo sentimos este cupón es para compras mayores a $<? echo $dataCodigo["minimo"] ?> pesos en tus compras.</span><?php
            }
        }
    }    
}

?>
<?php 
if(@!isset($_SESSION["descuento"]) || $_SESSION["descuento"] == '') { 
    if(@$_SESSION["descuento"]["codigo"] == '') {
        ?>
        <form method="post" class="row">
            <div class="col-md-6 text-right">
                <p style="margin-top: 7px"><b>¿Tenés algún código de descuento para tus compras?</b></p>
            </div>
            <div class="col-md-4">
                <input type="text" name="codigoDescuento" class="form-control" placeholder="CÓDIGO DE DESCUENTO">
            </div>
            <div class="col-md-2">
                <input type="submit" value="USAR CÓDIGO" name="btn_codigo" class="btn btn-default" />
            </div>
        </form>
        <?php 
    }
} 
?>
<div class="clearfix"> </div><br/>

<a href="<?=BASE_URL?>/tienda.php" class="btn btn-info fLeft"> <i class="fa fa-shopping-cart"></i> Seguir comprando</a>
<a href="<?=BASE_URL?>/sesion.php?op=ver-carrito&finalizar=ok" class="btn btn-success fRight"  <?php if ($error == 1) {
    echo 'data-toggle="tooltip" alt="ELEGÍ TU FORMA DE ENVÍOS" title="ELEGÍ TU FORMA DE ENVÍOS" disabled onclick="return false;"';
} ?>> <i class="fa fa-check"></i> Finalizar Carrito</a>
<br/><br/><br/><br/>

<?php
$precioFinal = ($precioFinal - $descuento) + $_SESSION["envio"];
$_SESSION["precioFinal"] = number_format($precioFinal, 2, '.', '');
$_SESSION["carritoFinal"] = $carroFinal;
if (@isset($_SESSION["descuento"])) {
    if(@$_SESSION["descuento"]["descuento"] != '') { 
        $_SESSION["carritoFinal"] .= "<tr>";
        if($_SESSION["descuento"]["tipo"] == 0) {
            $_SESSION["carritoFinal"] .= "<td><b>Descuento: ".$_SESSION["descuento"]["codigo"]." - ".$_SESSION["descuento"]["descuento"]."% de descuento</b></td><td></td>";
            $_SESSION["carritoFinal"] .= "<td></td>";
            $_SESSION["carritoFinal"] .= "<td>$".$descuento."</td>";
        } else {             
            $_SESSION["carritoFinal"] .= "<td><b>Descuento: ".$_SESSION["descuento"]["codigo"]." - $".$_SESSION["descuento"]["descuento"]." de descuento</b></td><td></td>";
            $_SESSION["carritoFinal"] .= "<td></td>";
            $_SESSION["carritoFinal"] .= "<td>$".$descuento."</td>";
        }
        $_SESSION["carritoFinal"] .= '</tr>';
    } else {
        $descuento = 0;
    }
} else {
    $descuento = 0;
}
$_SESSION["carritoFinal"] .= "<tr><td><b>" . $_SESSION["envioTipo"] . "</b></td><td></td><td></td><td><b>$" . $_SESSION["envio"] . "</b></td> </tr>";
$_SESSION["carritoFinal"] .= "<tr><td><b>Precio Final Total</b></td><td></td><td></td><td><b>$$precioFinal</b></td> </tr>";
}
?> 

