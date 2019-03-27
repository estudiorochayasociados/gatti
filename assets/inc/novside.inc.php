<?php
$novedades_data_side = $novedades->listWithOps('', '', 5);
if (!empty($novedades_data_side)) {
    foreach ($novedades_data_side as $nov) {
        ?>
        <li class="notasSide row">
            <div class="col-md-4" style="overflow:hidden;height:60px">
                <a href="<?= URL . '/blog/' . $funciones->normalizar_link($nov['data']["titulo"]) . '/' . $nov['data']['cod'] ?>">
                    <img src="<?= URL . '/' . $nov['imagenes']['0']['ruta']; ?>" width="100%">
                </a>
            </div>
            <div class="col-md-8">
                <a href="<?= URL . '/blog/' . $funciones->normalizar_link($nov['data']["titulo"]) . '/' . $nov['data']['cod'] ?>">
                    <?= ucfirst(substr(strip_tags($nov['data']['titulo']), 0, 40)); ?>
                </a>
                <br/>
                <span class="meta-date" style="font-size:13px"><i class="fa fa-calendar"></i> <?= $nov['fecha_actual']; ?></span>
            </div>
        </li>
        <?php
    }
}
?>

