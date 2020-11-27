<?php error_reporting( E_ALL ); ?>

<?php
$random = rand(0, 10000000);
if (isset($_POST["agregar"])) {
    if ($_POST["titulo"] != '') {
        $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : '';
        $cod = isset($_POST["cod"]) ? $_POST["cod"] : '';
        $stock = isset($_POST["stock"]) ? $_POST["stock"] : '';
        $precio = isset($_POST["precio"]) ? $_POST["precio"] : '';
        $preciodesc = isset($_POST["preciodesc"]) ? $_POST["preciodesc"] : '';
        $tienda = isset($_POST["tienda"]) ? $_POST["tienda"] : '';
        $moneda = isset($_POST["moneda"]) ? $_POST["moneda"] : '';
        $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : '';
        $categorias = isset($_POST["tipo"]) ? $_POST["tipo"] : '';
        $subcategorias = isset($_POST["subtipo"]) ? $_POST["subtipo"] : '';
        $peso = isset($_POST["peso"]) ? $_POST["peso"] : '';
        $video1 = isset($_POST["video1"]) ? $_POST["video1"] : '';
        $video2 = isset($_POST["video2"]) ? $_POST["video2"] : '';

        /**** PDF ***/ 
        if (!empty($_FILES["pdf"]["name"])) {
         $imgInicio1 = "";
         $pdf = "";
         $prefijo1 = substr(md5(uniqid(rand())), 0, 15);
         $imgInicio1 = $_FILES["pdf"]["tmp_name"];
         $tucadena1 = $_FILES["pdf"]["name"];
         $partes1 = explode(".", $tucadena1);
         $dominio1 = $partes1[1];

         if ($dominio1 != '') {
            $pdf = "archivos/productos/pdf/" . $prefijo1 . "." . $dominio1;
            $destinoFinal1 = "../archivos/productos/pdf/" . $prefijo1 . "." . $dominio1;
            move_uploaded_file($imgInicio1, $destinoFinal1);
            chmod($pdf, 0777);
        } else {
            $pdf = '';
        }
    } else {
        $pdf = '';
    }

    /**** FIN PDF ***/


    /* 1 */
    if (!empty($_FILES["img"]["name"])) {
        $imgInicio = "";
        $destinoImg = "";
        $prefijo = substr(md5(uniqid(rand())), 0, 6);
        $imgInicio = $_FILES["img"]["tmp_name"];
        $tucadena = $_FILES["img"]["name"];
        $partes = explode(".", $tucadena);
        $dominio = $partes[1];

        if ($dominio != '') {
            $destinoImg = "archivos/productos/" . $prefijo . "." . $dominio;
            $destinoFinal = "../archivos/productos/" . $prefijo . "." . $dominio;
            move_uploaded_file($imgInicio, $destinoFinal);
            @chmod($destinoFinal, 0777);
            $destinoRecortado = "../archivos/productos/recortadas/a_" . $prefijo . "." . $dominio;
            $destinoRecortadoFinal = "archivos/productos/recortadas/a_" . $prefijo . "." . $dominio;
                //Saber tamaño
            $tamano = getimagesize($destinoFinal);
            $tamano1 = explode(" ", $tamano[3]);
            $anchoImagen = explode("=", $tamano1[0]);
            $anchoFinal = str_replace('"', "", trim($anchoImagen[1]));
            if ($anchoFinal >= 900) {
                @EscalarImagen("900", "0", $destinoFinal, $destinoRecortado, "80");
            } else {
                @EscalarImagen($anchoFinal, "0", $destinoFinal, $destinoRecortado, "80");
            }
            unlink($destinoFinal);
        }
    } else {
        $destinoRecortadoFinal = '';
    }

    /* FIN 1 */

    /* 2 */
    if (!empty($_FILES["img2"]["name"])) {
        $imgInicio2 = "";
        $destinoImg2 = "";
        $prefijo2 = substr(md5(uniqid(rand())), 0, 6);
        $imgInicio2 = $_FILES["img2"]["tmp_name"];
        $tucadena2 = $_FILES["img2"]["name"];
        $partes2 = explode(".", $tucadena2);
        $dominio2 = $partes2[1];

        if ($dominio2 != '') {
            $destinoImg2 = "archivos/productos/" . $prefijo2 . "." . $dominio2;
            $destinoFinal2 = "../archivos/productos/" . $prefijo2 . "." . $dominio2;
            move_uploaded_file($imgInicio2, $destinoFinal2);
            chmod($destinoFinal2, 0777);
            $destinoRecortado2 = "../archivos/productos/recortadas/a_" . $prefijo2 . "." . $dominio2;
            $destinoRecortadoFinal2 = "archivos/productos/recortadas/a_" . $prefijo2 . "." . $dominio2;
                //Saber tamaño
            $tamano = getimagesize($destinoFinal2);
            $tamano1 = explode(" ", $tamano[3]);
            $anchoImagen = explode("=", $tamano1[0]);
            $anchoFinal = str_replace('"', "", trim($anchoImagen[1]));
            if ($anchoFinal >= 900) {
                @EscalarImagen("900", "0", $destinoFinal2, $destinoRecortado2, "80");
            } else {
                @EscalarImagen($anchoFinal, "0", $destinoFinal2, $destinoRecortado2, "80");
            }
            unlink($destinoFinal2);
        }
    } else {
        $destinoRecortadoFinal2 = '';
    }
    /* FIN 2 */

    /* 3 */
    if (!empty($_FILES["img3"]["name"])) {

        $imgInicio3 = "";
        $destinoImg3 = "";
        $prefijo3 = substr(md5(uniqid(rand())), 0, 6);
        $imgInicio3 = $_FILES["img3"]["tmp_name"];
        $tucadena3 = $_FILES["img3"]["name"];
        $partes3 = explode(".", $tucadena3);
        $dominio3 = $partes3[1];

        if ($dominio3 != '') {
            $destinoImg3 = "archivos/productos/" . $prefijo3 . "." . $dominio3;
            $destinoFinal3 = "../archivos/productos/" . $prefijo3 . "." . $dominio3;
            move_uploaded_file($imgInicio3, $destinoFinal3);
            chmod($destinoFinal3, 0777);
            $destinoRecortado3 = "../archivos/productos/recortadas/a_" . $prefijo3 . "." . $dominio3;
            $destinoRecortadoFinal3 = "archivos/productos/recortadas/a_" . $prefijo3 . "." . $dominio3;
                //Saber tamaño
            $tamano = getimagesize($destinoFinal3);
            $tamano1 = explode(" ", $tamano[3]);
            $anchoImagen = explode("=", $tamano1[0]);
            $anchoFinal = str_replace('"', "", trim($anchoImagen[1]));
            if ($anchoFinal >= 900) {
                @EscalarImagen("900", "0", $destinoFinal3, $destinoRecortado3, "80");
            } else {
                @EscalarImagen($anchoFinal, "0", $destinoFinal3, $destinoRecortado3, "80");
            }               
            unlink($destinoFinal3);
        }
    } else {
        $destinoRecortadoFinal3 = '';
    }
    /* FIN 3 */

    /* 4 */
    if (!empty($_FILES["img4"]["name"])) {
        $imgInicio4 = "";
        $destinoImg4 = "";
        $prefijo4 = substr(md5(uniqid(rand())), 0, 6);
        $imgInicio4 = $_FILES["img4"]["tmp_name"];
        $tucadena4 = $_FILES["img4"]["name"];
        $partes4 = explode(".", $tucadena4);
        $dominio4 = $partes4[1];

        if ($dominio4 != '') {
            $destinoImg4 = "archivos/productos/" . $prefijo4 . "." . $dominio4;
            $destinoFinal4 = "../archivos/productos/" . $prefijo4 . "." . $dominio4;
            move_uploaded_file($imgInicio4, $destinoFinal4);
            chmod($destinoFinal4, 0777);
            $destinoRecortado4 = "../archivos/productos/recortadas/a_" . $prefijo4 . "." . $dominio4;
            $destinoRecortadoFinal4 = "archivos/productos/recortadas/a_" . $prefijo4 . "." . $dominio4;
                 //Saber tamaño
            $tamano = getimagesize($destinoFinal4);
            $tamano1 = explode(" ", $tamano[3]);
            $anchoImagen = explode("=", $tamano1[0]);
            $anchoFinal = str_replace('"', "", trim($anchoImagen[1]));
            if ($anchoFinal >= 900) {
                @EscalarImagen("900", "0", $destinoFinal4, $destinoRecortado4, "80");
            } else {
                @EscalarImagen($anchoFinal, "0", $destinoFinal4, $destinoRecortado4, "80");
            }  
            unlink($destinoFinal4);
        }
    } else {
        $destinoRecortadoFinal4 = '';
    }
    /* FIN 4 */

    /* 5 */
    if ($_FILES["img5"]["tmp_name"] != '') {
        $imgInicio5 = "";
        $destinoImg5 = "";
        $prefijo5 = substr(md5(uniqid(rand())), 0, 6);
        $imgInicio5 = $_FILES["img5"]["tmp_name"];
        $tucadena5 = $_FILES["img5"]["name"];
        $partes5 = explode(".", $tucadena5);
        $dominio5 = $partes5[1];

        if ($dominio5 != '') {
            $destinoImg5 = "archivos/productos/" . $prefijo5 . "." . $dominio5;
            $destinoFinal5 = "../archivos/productos/" . $prefijo5 . "." . $dominio5;
            move_uploaded_file($imgInicio5, $destinoFinal5);
            chmod($destinoFinal5, 0777);
            $destinoRecortado5 = "../archivos/productos/recortadas/a_" . $prefijo5 . "." . $dominio5;
            $destinoRecortadoFinal5 = "archivos/productos/recortadas/a_" . $prefijo5 . "." . $dominio5;
                //Saber tamaño
            $tamano = getimagesize($destinoFinal5);
            $tamano1 = explode(" ", $tamano[3]);
            $anchoImagen = explode("=", $tamano1[0]);
            $anchoFinal = str_replace('"', "", trim($anchoImagen[1]));
            if ($anchoFinal >= 900) {
                @EscalarImagen("900", "0", $destinoFinal5, $destinoRecortado5, "80");
            } else {
                @EscalarImagen($anchoFinal, "0", $destinoFinal5, $destinoRecortado5, "80");
            }                 
            unlink($destinoFinal5);
        }
    } else {
        $destinoRecortadoFinal5 = '';
    }
    /* FIN 5 */



    $sql = "   INSERT INTO `portfolio`
    (`cod_portfolio`, `nombre_portfolio`, `descripcion_portfolio`, `categoria_portfolio`, `subcategoria_portfolio`, `moneda_portfolio`, `precio_portfolio`,  `preciodesc_portfolio`, `stock_portfolio`, `video1_portfolio`, `video2_portfolio`, `imagen1_portfolio`, `imagen2_portfolio`, `imagen3_portfolio`, `imagen4_portfolio`, `imagen5_portfolio`, `estado_portfolio`, `tipo_portfolio`, `peso_portfolio`, `pdf_portfolio`) 
    VALUES 
    ('$cod','$titulo','$descripcion','$categorias','$subcategorias','$moneda','$precio','$preciodesc','$stock','$video1','$video2','$destinoRecortadoFinal','$destinoRecortadoFinal2','$destinoRecortadoFinal3','$destinoRecortadoFinal4','$destinoRecortadoFinal5',0,'$tienda','$peso','$pdf')";

    $link = Conectarse_Mysqli();
    $r = mysqli_query($link,$sql);

    header("location:index.php?op=verPortfolio");
} else {
  echo "<br/><center><span class='large-11 button' style='background:#872F30'>* Todos los datos son obligatorios</span></center>";
}
}
?>

<div class="col-lg-12   ">
    <h4>Agregar a Producto</h4>
    <hr/>
    <form method="post" enctype="multipart/form-data">
        <div class="row" >
            <label class="col-lg-4">Título:
                <br/>
                <input type="text" name="titulo" class="form-control" value="<?php echo (isset($_POST['titulo']) ? $_POST['titulo'] : '') ?>" required>
            </label>
            <label class="col-lg-4">Categoría Productos:
                <select name="tipo" class="form-control">
                  <?php Categoria_Read_portfolio(""); ?>
              </select>
          </label>
          <label class="col-lg-4">Subcategoría Productos:
            <select name="subtipo" class="form-control">
              <?php Subcategoria_Read_portfolio(""); ?>
          </select>
      </label>
      <div class="clearfix"></div>
      <label class="col-md-2">Moneda:
        <select name="moneda" class="form-control">
           <option value="" disabled selected>-- moneda --</option>
           <option value="ARS" selected>ARS</option>                  
       </select>              
   </label> 
   <label class="col-md-1">Código:<br/>
    <input type="text" class="form-control" name="cod" value="<?php echo (isset($_POST["cod"]) ? $_POST["cod"] : '' ); ?>">                 
</label>
<label class="col-md-2">¿Productos / Tienda?:
    <select name="tienda" class="form-control">
       <option value="0">PRODUCTOS</option>
       <option value="1">TIENDA</option>                  
   </select>        
</label>
<label class="col-md-2">¿Peso kg?:
   <input type="text" name="peso" class="form-control" value="<?php echo (isset($_POST["peso"]) ? $_POST["peso"] : '' ); ?>"/>    
</label>
<label class="col-md-2">Precio:
    <div class="input-group">
       <div class="input-group-addon">$</div>
       <input type="text" class="form-control" name="precio" value="<?php echo (isset($_POST["precio"]) ? $_POST["precio"] : '' ); ?>">                 
   </div>     
</label>
<label class="col-md-2">Precio Desc:
    <div class="input-group">
       <div class="input-group-addon">$</div>
       <input type="text" class="form-control" name="preciodesc" value="<?php echo (isset($_POST["preciodesc"]) ? $_POST["preciodesc"] : '' ); ?>">                 
   </div>     
</label>
<label class="col-md-4">Stock:
    <div class="input-group">
       <input type="number" class="form-control" name="stock" value="<?php echo (isset($_POST["stock"]) ? $_POST["stock"] : '' ); ?>">                    
       <div class="input-group-addon">unid.</div>

   </div>     
</label>              
<label class="col-lg-4">Link Video: (https://www.youtube.com/watch?v=<b>OCBspLsKTjo</b>)
    <br/>
    <input type="text" name="video1" class="form-control" value="<?php echo (isset($_POST['video1']) ? $_POST['video1'] : '') ?>" >
</label>
<label class="col-lg-4">Link Video 2: (https://www.youtube.com/watch?v=<b>OCBspLsKTjo</b>)
    <br/>
    <input type="text" name="video2" class="form-control" value="<?php echo (isset($_POST['video2']) ? $_POST['video2'] : '') ?>" >
</label>
<div class="clearfix"></div>             
<label class="col-md-12 col-lg-12">Desarrollo:
    <br/>
    <textarea name="descripcion" class="form-control"  style="height:300px;display:block"><?php echo (isset($_POST['descripcion']) ? $_POST['descripcion'] : '') ?></textarea>

</label>
<div class="clearfix"><br/></div><br/>
<label class="col-md-12"><b>Manual Pdf:</b>
    <br/>
    <input type="file" class="form-control" id="file2" name="pdf"  />
</label>       
<div class="clearfix">
    <br/>
</div>
<br> 
<label class="col-lg-2 col-md-2">Imagen 1 producto:
    <br/>
    <input type="file" name="img" class="form-control"/>
</label>
<label class="col-lg-2 col-md-2">Imagen 2 producto:
    <br/>
    <input type="file" name="img2" class="form-control"/>
</label>
<label class="col-lg-2 col-md-2">Imagen 3  producto:
    <br/>
    <input type="file" name="img3" class="form-control"/>
</label>
<label class="col-lg-2 col-md-2">Imagen 4 producto:
    <br/>
    <input type="file" name="img4" class="form-control"/>
</label>
<label class="col-lg-2 col-md-2">Imagen 5 producto:
    <br/>
    <input type="file" name="img5" class="form-control"/>
</label>    

<div class="clearfix">
    <br/>
</div>

<div class="clearfix">
    <br/>
</div>
<br>
<label class="col-lg-7">
    <input type="submit" class="btn btn-primary" name="agregar" value="Subir Producto" />
</label>
</div>
</form>
</div>
