<?php
$productos = new Clases\Productos();
$imagenes = new Clases\Imagenes();
$filter = array();
$data = $productos->list("");
?>
<div class="mt-20">
    <div class="col-lg-12 col-md-12">
        <h4>Productos <a class="btn btn-success pull-right" href="<?= URL ?>/index.php?op=productos&accion=agregar">AGREGAR PRODUCTOS</a></h4>
        <hr/>
        <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
        <hr/>
        <table class="table  table-bordered  ">
            <thead>
            <th>Título</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Tipo</th>
            <th>Envío</th>
            <th>Ajustes</th>
            </thead>
            <?php
            if (!empty($data)) {
                foreach ($data as $key => $data_) {
                    echo "<tr>";
                    echo "<td>" . strtoupper($data_["titulo"]) . "</td>";
                    echo "<td>" . strtoupper($data_["stock"]) . "</td>";
                    echo "<td>$" . strtoupper($data_["precio"]) . "</td>";
                    echo "<td>";
                    if ($data_["variable2"] == 0) {
                        echo "Productos";
                    } else {
                        echo "Tienda";
                    }
                    echo "</td>";
                    ?>
                    <td>
                        <?php
                        if (!empty($data_['variable2'])) {
                            $cod = $data_["cod"];
                            ?>
                            <form id="frm-shipping<?= $cod ?>" data-url="<?= URL ?>">
                                <input type="checkbox"
                                       id="frm-shipping<?= $cod ?>-ch"
                                       data-cod="<?= $cod ?>"
                                       data-atribute="variable10"
                                       data-value="<?= !empty($data_['variable10']) ? 0 : 1 ?>"
                                    <?= !empty($data_['variable10']) ? 'checked' : '' ?>
                                       onchange="updateSingle('frm-shipping<?= $cod ?>','checkbox')">
                            </form>
                            <?php
                        }
                        ?>
                    </td>
                    <?php
                    echo "<td>";

                    echo '<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Modificar" href="' . URL . '/index.php?op=productos&accion=modificar&cod=' . $data_["cod"] . '">
                    <i class="fa fa-cog"></i></a>';

                    echo '<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" href="' . URL . '/index.php?op=productos&accion=ver&borrar=' . $data_["cod"] . '">
                    <i class="fa fa-trash"></i></a>';

                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
if (isset($_GET["borrar"])) {
    $cod = $funciones->antihack_mysqli(isset($_GET["borrar"]) ? $_GET["borrar"] : '');
    $productos->set("cod", $cod);
    $imagenes->set("cod", $cod);
    $productos->delete();
    $imagenes->deleteAll();
    $funciones->headerMove(URL . "/index.php?op=productos");
}
?>
