<?php
//Clases
$pedidos = new Clases\Pedidos();
$funciones = new Clases\PublicFunction();
$usuarios = new Clases\Usuarios();
$hub = new Clases\Hubspot();

$estadoFiltro = isset($_GET["estadoFiltro"]) ? $_GET["estadoFiltro"] : '';
$estado = isset($_GET["estado"]) ? $_GET["estado"] : '';
$cod = isset($_GET["cod"]) ? $_GET["cod"] : '';
$tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : '';
$usuario = isset($_GET["usuario"]) ? $_GET["usuario"] : '';

$filter = '';

if ($estado != '' && $cod != '') {
    $pedidos->set("estado", $estado);
    $pedidos->set("cod", $cod);
    $pedidos->changeState();

    $pedido = $pedidos->view();
    $stage = $hub->getStage($estado);
    $hub->set("deal", $pedido['data']['hub_cod']);
    $hub->set("estado", $stage);
    $hub->updateStage();
    $funciones->headerMove(URL . '/?op=pedidos&accion=ver');
}

if ($usuario != '') {
    $filter = array("usuario ='" . $usuario . "'");
}

if ($estadoFiltro != '' && $estadoFiltro != 5) {
    $filter = array("estado ='" . $estadoFiltro . "'");
}

$pedidosData = $pedidos->listWithOps($filter, '', '');
?>
<div class="mt-20">
    <div class="col-lg-12 col-md-12">
        <h4>
            Pedidos
            <div class='col-md-2 pull-right'>
                <form method="get">
                    <input type="hidden" name="op" value="pedidos"/>
                    <input type="hidden" name="accion" value="ver"/>
                    <select name="estadoFiltro" onchange="this.form.submit()">
                        <option></option>
                        <option value="5" <?php if ($estadoFiltro == 5) {
                            echo "selected";
                        } ?>>Todos
                        </option>
                        <option value="4" <?php if ($estadoFiltro == 4) {
                            echo "selected";
                        } ?>>Rechazado
                        </option>
                        <option value="3" <?php if ($estadoFiltro == 3) {
                            echo "selected";
                        } ?>>Enviado
                        </option>
                        <option value="2" <?php if ($estadoFiltro == 2) {
                            echo "selected";
                        } ?>>Aprobado
                        </option>
                        <option value="1" <?php if ($estadoFiltro == 1) {
                            echo "selected";
                        } ?>>Pendiente
                        </option>
                        <option value="0" <?php if ($estadoFiltro == 0) {
                            echo "selected";
                        } ?>>Carrito no cerrado
                        </option>
                    </select>
                </form>
            </div>
        </h4>
        <hr/>
        <?php foreach ($pedidosData as $value): ?>
            <?php $precioTotal = 0; ?>
            <?php $fecha = explode(" ", $value['data']["fecha"]); ?>
            <?php $fecha1 = explode("-", $fecha[0]); ?>
            <?php $fecha1 = $fecha1[2] . '-' . $fecha1[1] . '-' . $fecha1[0] . '-'; ?>
            <?php $fecha = $fecha1 . $fecha[1]; ?>
            <div class="card">
                <a data-toggle="collapse" href="#collapse<?= $value['data']["cod"] ?>" aria-expanded="false" aria-controls="collapse<?= $value['data']["cod"] ?>" class="collapsed color_a">
                    <div class="card-header bg-info" role="tab" id="heading">
                        <span>Pedido <?= $value['data']["cod"] ?></span>
                        <span class="hidden-xs hidden-sm">- Fecha <?= $fecha ?></span>
                        <?php if ($value['data']["estado"] == 0): ?>
                            <span style="padding:5px;font-size:13px;margin-top:-5px;border-radius: 10px;"
                                  class="btn-primary pull-right">
                            Estado: Carrito no cerrado
                             </span>
                        <?php elseif ($value['data']["estado"] == 1): ?>
                            <span style="padding:5px;font-size:13px;margin-top:-5px;border-radius: 10px;"
                                  class="btn-warning pull-right">
                            Estado: Pago pendiente
                             </span>
                        <?php elseif ($value['data']["estado"] == 2): ?>
                            <span style="padding:5px;font-size:13px;margin-top:-5px;border-radius: 10px;"
                                  class="btn-success pull-right">
                            Estado: Pago aprobado
                             </span>
                        <?php elseif ($value['data']["estado"] == 3): ?>
                            <span style="padding:5px;font-size:13px;margin-top:-5px;border-radius: 10px;"
                                  class="btn-info pull-right">
                            Estado: Pago enviado
                             </span>
                        <?php elseif ($value['data']["estado"] == 4): ?>
                            <span style="padding:5px;font-size:13px;margin-top:-5px;border-radius: 10px;"
                                  class="btn-primary pull-right">
                            Estado: Pago rechazado
                             </span>
                        <?php endif; ?>
                    </div>
                </a>
                <div id="collapse<?= $value['data']["cod"] ?>" class="collapse" role="tabpanel"
                     aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-striped table-hover">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>
                                            Producto
                                        </th>
                                        <th>
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
                                    <?php foreach ($value['detail'] as $value2): ?>
                                        <?php if ($value2['cod'] == $value['data']["cod"]): ?>
                                            <tr>
                                                <td><?= $value2["producto"] ?></td>
                                                <td><?= $value2["cantidad"] ?></td>
                                                <td>$<?= $value2["precio"] ?></td>
                                                <td>$<?= $value2["precio"] * $value2["cantidad"] ?></td>
                                                <?php $precioTotal = $precioTotal + ($value2["precio"] * $value2["cantidad"]); ?>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td><b>TOTAL DE LA COMPRA</b></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>$<?= $precioTotal ?></b></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Usuario</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>Nombre</td>
                                        <td width="100%"><?= $value['user']['nombre'] . ' ' . $value['user']['apellido'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Dirección</td>
                                        <td width="100%"><?= $value['user']['direccion'] . ' - ' . $value['user']['localidad'] . ' - ' . $value['user']['provincia'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Teléfono</td>
                                        <td width="100%"><?= $value['user']['telefono'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td width="100%"><?= $value['user']['email'] ?></td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <h6><b>FORMA DE PAGO</b></h6>
                        <hr/>
                        <div class="alert alert-info" style="border-radius: 10px; padding: 10px;">
                            <?= $value['data']["tipo"] ?>
                        </div>
                        <div class="clearfix"></div>
                        <h6><b>OBSERVACIONES</b></h6>
                        <hr/>
                        <div class="alert alert-info" style="border-radius: 10px; padding: 10px;">
                            <?php
                            if (empty($value['data']['detalle'])) {
                                echo 'No hay observaciones del pedido';
                            }
                            ?>
                        </div>
                        <hr/>
                        <b>CAMBIAR ESTADO: </b>
                        <a href="<?= CANONICAL ?>&estado=1&cod=<?= $value['data']['cod'] ?>" class="btn btn-warning">Pendiente</a>
                        <a href="<?= CANONICAL ?>&estado=2&cod=<?= $value['data']['cod'] ?>" class="btn btn-success">Aprobado</a>
                        <a href="<?= CANONICAL ?>&estado=3&cod=<?= $value['data']['cod'] ?>" class="btn btn-info">Enviado</a>
                        <a href="<?= CANONICAL ?>&estado=4&cod=<?= $value['data']['cod'] ?>" class="btn btn-primary">Rechazado</a>
                        <a href="<?= CANONICAL ?>&borrar=<?= $value['data']['cod'] ?>" class="btn btn-danger">Eliminar Pedido</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
if (!empty($_GET["borrar"])) {
    $pedidos->set("cod", $funciones->antihack_mysqli(isset($_GET["borrar"]) ? $_GET["borrar"] : ''));
    $pedidos->delete();
    $funciones->headerMove(URL . "/index.php?op=pedidos");
}
?>

