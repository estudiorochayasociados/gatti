<?php
//Clases
$usuario = new Clases\Usuarios();
$pedidos = new Clases\Pedidos();

$usuario->set("cod", $_SESSION["usuarios"]["cod"]);
$usuarioData = $usuario->view();

$filterPedidosAgrupados = array("usuario = '" . $usuarioData['cod'] . "' GROUP BY cod");
$pedidosArrayAgrupados = $pedidos->list($filterPedidosAgrupados);

$filterPedidosSinAgrupar = array("usuario = '" . $usuarioData['cod'] . "'");
$pedidosArraySinAgrupar = $pedidos->list($filterPedidosSinAgrupar);
asort($pedidosArraySinAgrupar);
?>
<?php
if (empty($pedidosArrayAgrupados)) {
    ?>
    <div class="container centro">
        <h4>No hay pedidos todavía.</h4>
    </div>
    <?php
} else {
    ?>
    <div class="col-md-12 mb-10" style="margin-top:10px;">
        <?php foreach ($pedidosArrayAgrupados as $key => $value): ?>
            <?php $usuarios->set("cod", $value["usuario"]); ?>
            <?php $usuarioData = $usuarios->view(); ?>
            <?php $precioTotal = 0; ?>
            <?php $fecha = explode(" ", $value["fecha"]); ?>
            <?php $fecha1 = explode("-", $fecha[0]); ?>
            <?php $fecha1 = $fecha1[2] . '-' . $fecha1[1] . '-' . $fecha1[0] . '-'; ?>
            <?php $fecha = $fecha1 . $fecha[1]; ?>
            <div class="panel panel-default">
                <a data-toggle="collapse" href="#collapse<?= $value["cod"] ?>" aria-expanded="false" aria-controls="collapse<?= $value["cod"] ?>" class="collapsed color_a">
                    <div class="panel-heading boton-cuenta" role="tab" id="heading">
                        <div class="row">
                            <div class="col-md-10 dis">
                                <span class="blanco">Pedido <?= $value["cod"] ?></span>
                                <span class="hidden-xs hidden-sm blanco">- Fecha <?= $fecha ?></span>
                            </div>
                            <div class="col-md-2 dis">
                                <?php if ($value["estado"] == 0): ?>
                                    <b>
                                        Estado: Carrito no cerrado
                                    </b>
                                <?php elseif ($value["estado"] == 1): ?>
                                    <b>
                                        Estado: Pago pendiente
                                    </b>
                                <?php elseif ($value["estado"] == 2): ?>
                                    <b>
                                        Estado: Pago aprobado
                                    </b>
                                <?php elseif ($value["estado"] == 3): ?>
                                    <b>
                                        Estado: Pago enviado
                                    </b>
                                <?php elseif ($value["estado"] == 4): ?>
                                    <b>
                                        Estado: Pago rechazado
                                    </b>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </a>
                <div id="collapse<?= $value["cod"] ?>" class="collapse" role="tabpanel"
                     aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body panel-over" style="height: auto;">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-hover">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>
                                            Producto
                                        </th>
                                        <th class="hidden-xs hidden-sm">
                                            Cantidad
                                        </th>
                                        <th class="hidden-xs hidden-sm">
                                            Precio
                                        </th>
                                        <th>
                                            Precio Final
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($pedidosArraySinAgrupar as $key2 => $value2): ?>
                                        <?php if ($value2['cod'] == $value["cod"]): ?>
                                            <tr>
                                                <td><?= $value2["producto"] ?>
                                                    <p class="visible-xs">Cantidad: <?= $value2["cantidad"] ?></p>
                                                    <p class="visible-xs">Precio: $<?= $value2["precio"] ?></p>
                                                </td>
                                                <td class="hidden-xs hidden-sm"><?= $value2["cantidad"] ?></td>
                                                <td class="hidden-xs hidden-sm">$<?= $value2["precio"] ?></td>
                                                <td>$<?= $value2["precio"] * $value2["cantidad"] ?></td>
                                                <?php $precioTotal = $precioTotal + ($value2["precio"] * $value2["cantidad"]); ?>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td><b>TOTAL DE LA COMPRA</b></td>
                                        <td class="hidden-xs hidden-sm"></td>
                                        <td class="hidden-xs hidden-sm"></td>
                                        <td><b>$<?= $precioTotal ?></b></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <span style="font-size:16px">
                    <b class="mb-10">FORMA DE PAGO:</b>
                        <br class="visible-xs">
                        <?php if ($value["tipo"] == 0): ?>
                            Transferencia bancaria
                        <?php elseif ($value["tipo"] == 1): ?>
                            Coordinar con vendedor
                        <?php elseif ($value["tipo"] == 2): ?>
                            Tarjeta de crédito o débito
                        <?php endif; ?>
                </span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
}
?>
