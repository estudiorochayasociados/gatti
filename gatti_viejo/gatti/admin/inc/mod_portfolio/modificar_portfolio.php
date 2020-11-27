<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$rotar = isset($_GET['rotar']) ? $_GET['rotar'] : '';

if ($id != '') {
	$data = Portfolio_TraerPorId($id);
	$titulo = isset($data["nombre_portfolio"]) ? $data["nombre_portfolio"] : '';
	$precio = isset($data["precio_portfolio"]) ? $data["precio_portfolio"] : '';;
	$preciodesc = isset($data["preciodesc_portfolio"]) ? $data["preciodesc_portfolio"] : '';;
	$moneda = isset($data["moneda_portfolio"]) ? $data["moneda_portfolio"] : '';;
	$categoria = isset($data["categoria_portfolio"]) ? $data["categoria_portfolio"] : '';
	$subcategoria = isset($data["subcategoria_portfolio"]) ? $data["subcategoria_portfolio"] : '';
	$peso = isset($data["peso_portfolio"]) ? $data["peso_portfolio"] : '';
	$video1 = isset($data["video1_portfolio"]) ? $data["video1_portfolio"] : '';
	$video2 = isset($data["video2_portfolio"]) ? $data["video2_portfolio"] : '';


	$pdf = isset($data["pdf_portfolio"]) ? $data["pdf_portfolio"] : '';
	$img = isset($data["imagen1_portfolio"]) ? $data["imagen1_portfolio"] : '';
	$img2 = isset($data["imagen2_portfolio"]) ? $data["imagen2_portfolio"] : '';
	$img3 = isset($data["imagen3_portfolio"]) ? $data["imagen3_portfolio"] : '';
	$img4 = isset($data["imagen4_portfolio"]) ? $data["imagen4_portfolio"] : '';
	$img5 = isset($data["imagen5_portfolio"]) ? $data["imagen5_portfolio"] : '';	
}


if (isset($_POST['agregar'])) {
	if ($_POST["titulo"] != '') {
		$titulo = $_POST["titulo"];
		$categorias = $_POST["tipo"];
		$subcategorias = $_POST["subtipo"];
		$descripcion = $_POST["descripcion"];
		$precio = $_POST["precio"];
		$preciodesc = $_POST["preciodesc"];
		$tienda = $_POST["tienda"];
		$moneda = $_POST["moneda"];
		$cod = $_POST["cod"];
		$stock = $_POST["stock"];
		$peso = $_POST["peso"];
		$video1 = $_POST["video1"];
		$video2 = $_POST["video2"];

		if (!empty($_FILES["pdf"]["name"])) {
			$pdfInicio = "";
			$destinoPdf = "";
			$prefijoPdf = substr(md5(uniqid(rand())), 0, 6);
			$pdfInicio = $_FILES["pdf"]["tmp_name"];
			$tucadenaPDF = $_FILES["pdf"]["name"];
			$partesPdf = explode(".", $tucadenaPDF);
			$dominioPdf = $partesPdf[1];
			if ($dominioPdf != '') {
				$destinoPdf = "archivos/productos/pdf/" . $prefijoPdf . "." . $dominioPdf;
				$destinoFinalPdf = "../archivos/productos/pdf/" . $prefijoPdf . "." . $dominioPdf;
				move_uploaded_file($pdfInicio, $destinoFinalPdf);
				chmod($destinoFinalPdf, 0777);				 
			}
		} else {
			$destinoPdf = $pdf;
		}

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
				chmod($destinoFinal, 0777);
				$destinoRecortado = "../archivos/productos/recortadas/a_" . $prefijo . "." . $dominio;
				$destinoRecortadoFinal = "archivos/productos/recortadas/a_" . $prefijo . "." . $dominio;
//Saber tamaño
				$tamano = getimagesize($destinoFinal);
				$tamano1 = explode(" ", $tamano[3]);
				$anchoImagen = explode("=", $tamano1[0]);
				$anchoFinal = str_replace('"', "", trim($anchoImagen[1]));
				if ($anchoFinal >= 700) {
					@EscalarImagen("700", "0", $destinoFinal, $destinoRecortado, "60");
				} else {
					@EscalarImagen($anchoFinal, "0", $destinoFinal, $destinoRecortado, "60");
				}                   
				unlink($destinoFinal);
				unlink("../".$img);
			}
		} else {
			$destinoRecortadoFinal = $img;
		}
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
				if ($anchoFinal >= 700) {
					@EscalarImagen("700", "0", $destinoFinal2, $destinoRecortado2, "60");
				} else {
					@EscalarImagen($anchoFinal, "0", $destinoFinal2, $destinoRecortado2, "60");
				}   
				unlink($destinoFinal2);
				unlink("../".$img2);
			}
		} else {
			$destinoRecortadoFinal2 = $img2;
		}

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
				if ($anchoFinal >= 700) {
					@EscalarImagen("700", "0", $destinoFinal3, $destinoRecortado3, "60");
				} else {
					@EscalarImagen($anchoFinal, "0", $destinoFinal3, $destinoRecortado3, "60");
				}                   
				unlink($destinoFinal3);
				unlink("../".$img3);
			}
		} else {
			$destinoRecortadoFinal3 = $img3;
		}

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
				if ($anchoFinal >= 700) {
					@EscalarImagen("700", "0", $destinoFinal4, $destinoRecortado4, "60");
				} else {
					@EscalarImagen($anchoFinal, "0", $destinoFinal4, $destinoRecortado4, "60");
				}   
				unlink($destinoFinal4);
				unlink("../".$img4);
			}
		} else {
			$destinoRecortadoFinal4 = $img4;
		}

		/* 5 */
		if (!empty($_FILES["img5"]["name"])) {
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
				if ($anchoFinal >= 700) {
					@EscalarImagen("700", "0", $destinoFinal5, $destinoRecortado5, "60");
				} else {
					@EscalarImagen($anchoFinal, "0", $destinoFinal5, $destinoRecortado5, "60");
				}   
				unlink($destinoFinal5);
				unlink("../".$img5);
			}
		} else {
			$destinoRecortadoFinal5 = $img5;
		}

		$sql = "
		UPDATE `portfolio` 
		SET 			
		`nombre_portfolio`= '$titulo',
		`descripcion_portfolio`= '$descripcion',
		`cod_portfolio`= '$cod',
		`categoria_portfolio`= '$categorias',		
		`subcategoria_portfolio`= '$subcategorias',					
		`precio_portfolio`= '$precio',	
		`preciodesc_portfolio`= '$preciodesc',	
		`tipo_portfolio`= '$tienda',						
		`stock_portfolio`= '$stock',
		`video1_portfolio`= '$video1',
		`video2_portfolio`= '$video2',	
		`peso_portfolio`= '$peso',						
		`moneda_portfolio`= '$moneda',	
		`pdf_portfolio`='$destinoPdf',
		`imagen1_portfolio`='$destinoRecortadoFinal',
		`imagen2_portfolio`='$destinoRecortadoFinal2',
		`imagen3_portfolio`='$destinoRecortadoFinal3',
		`imagen4_portfolio`='$destinoRecortadoFinal4',
		`imagen5_portfolio`='$destinoRecortadoFinal5'
		WHERE `id_portfolio`= $id";
		
		$link = Conectarse_Mysqli();
		$r = mysqli_query($link,$sql);

		header("location:index.php?op=verPortfolio");
	}
}
?>
<div class="col-lg-12">
	<hr/>
	<form method="post" enctype="multipart/form-data">
		<div class="row" >
			<label class="col-lg-4">Título:
				<br/>
				<input type="text" name="titulo" class="form-control" value="<?php echo $data["nombre_portfolio"]; ?>" required>
			</label>
			<label class="col-lg-4">Categoría productos:	 
				<select name="tipo" class="form-control"> 
					<?php Categoria_Read_portfolio($data["categoria_portfolio"]); ?>

				</select>
			</label>
			<label class="col-lg-4">Subcategoría productos:	 
 				<select name="subtipo" class="form-control"> 
					<?php Subcategoria_Read_portfolio($data["subcategoria_portfolio"]); ?>
				</select>
			</label>
			<div class="clearfix"></div>
			<label class="col-md-2">Moneda:
				<select name="moneda" class="form-control">
					<option value="" disabled  >-- moneda --</option>
					<option value="ARS" <?php if($moneda == "ARS"){ echo "selected"; } ?>>ARS</option>
				</select>				
			</label>
			<label class="col-md-2">Código:<br/>
				<input type="text" class="form-control" name="cod" value="<?php echo (isset($data["cod_portfolio"]) ? $data["cod_portfolio"] : '' ); ?>">					
			</label>
			<label class="col-md-2">¿Productos / Tienda?:
				<select name="tienda" class="form-control">
					<option value="0" <?php if($data["tipo_portfolio"] == "0"){ echo "selected"; } ?> >PRODUCTOS</option>
					<option value="1" <?php if($data["tipo_portfolio"] == "1"){ echo "selected"; } ?> >TIENDA</option>                  
				</select>        
			</label>
			<label class="col-md-2">Peso:
				<input type="text" name="peso" class="form-control" value="<?php echo (isset($data["peso_portfolio"]) ? $data["peso_portfolio"] : '' ); ?>"/>    
			</label>
			<label class="col-md-2">Precio:
				<div class="input-group">
					<div class="input-group-addon">$</div>
					<input type="text" class="form-control" name="precio" value="<?php echo (isset($data["precio_portfolio"]) ? $data["precio_portfolio"] : '' ); ?>">					
				</div>		
			</label>
			<label class="col-md-2">Precio Desc:
				<div class="input-group">
					<div class="input-group-addon">$</div>
					<input type="text" class="form-control" name="preciodesc" value="<?php echo (isset($data["preciodesc_portfolio"]) ? $data["preciodesc_portfolio"] : '' ); ?>">					
				</div>		
			</label>
			<label class="col-md-4">Stock:
				<div class="input-group">
					<input type="number" class="form-control" name="stock" value="<?php echo (isset($data["stock_portfolio"]) ? $data["stock_portfolio"] : '' ); ?>">					
					<div class="input-group-addon">unid.</div>
					
				</div>		
			</label>
 			<label class="col-lg-4">Link Video:  (https://www.youtube.com/watch?v=<b>OCBspLsKTjo</b>)
				<br/>
				<input type="text" name="video1" class="form-control" value="<?php echo $data["video1_portfolio"]; ?>" >
			</label>
			<label class="col-lg-4">Link Video 2:  (https://www.youtube.com/watch?v=<b>OCBspLsKTjo</b>)
				<br/>
				<input type="text" name="video2" class="form-control" value="<?php echo $data["video2_portfolio"]; ?>" >
			</label>
			<div class="clearfix"></div><br/>
			<label class="col-md-12 col-lg-12">Desarrollo:
				<br/>
				<textarea name="descripcion" class="form-control"  style="height:300px;display:block">
					<?php echo (isset($data['descripcion_portfolio']) ? $data['descripcion_portfolio'] : '') ?>
				</textarea>
				<script>
					CKEDITOR.replace('descripcion');
				</script> 
			</label>
			<div class="clearfix">
				<br/>
			</div> 

			<?php if($pdf === '') { ?>
			<label class="col-md-12">
				<br/>
				Manual Pdf
				<br/>
				<input type="file" class="form-control" name="pdf" />
			</label>
			<?php }else { ?>
			<div  class="col-md-12">
				<br/>
				Manual Pdf
				<br/>
				<br/>
				<a href="../<?php echo $pdf ?>" class="button" target="_blank">Ver MANUAL</a>
				<br/>
				<label>
					<p>
						&rarr; Cambiar
					</p>
					<input type="file" class="form-control" name="pdf" id="pdf" style="display:none"/>
					<div class="clearfix"></div>
				</label>
			</div>
			<?php } ?>

			<div class="clearfix">    
				<br/>
			</div>
			<label class="col-lg-2" style="margin-top:20px;margin-bottom: 20px">
				<?php if($img === '') {
					?>Imagen 1
					<br/>
					<br/>
					<input type="file"   class="form-control" name="img" />
					<?php }else { ?>
					<div style="height:100%;overflow: hidden">
						<br/>
						<label>Imagen 1
							<br/>
							<br/>
							<img src="../<?php echo $img ?>" width="100%" style="max-height:160px" ></label>
							<br/>
							<p onclick="">
								&rarr; Cambiar
							</p>
						</div>
						<div id="imgDiv" style="display:none">Imagen 1
							<br/>
							<br/>
							<input type="file"   class="form-control" name="img" id="img2" />
						</div>

						<?php } ?>
					</label>

					<label class="col-lg-2" style="margin-top:20px;margin-bottom: 20px">
						<?php if($img2 === '') {
							?>Imagen 2
							<br/>
							<br/>
							<input type="file"   class="form-control" name="img2" />
							<?php }else { ?>
							<div style="overflow: hidden">
								<br/>
								<label>Imagen 2
									<br/>
									<br/>
									<img src="../<?php echo $img2 ?>" width="100%"></label>
									<br/>
									<p onclick="">
										&rarr; Cambiar
									</p>
								</div>
								<div id="imgDiv" style="display:none">Imagen 2
									<br/>
									<br/>
									<input type="file"   class="form-control" name="img2" id="img2" />
								</div>
								<?php } ?>
							</label>

							<label class="col-lg-2" style="margin-top:20px;margin-bottom: 20px">
								<?php if($img3 === '') {
									?>Imagen 3
									<br/>
									<br/>
									<input type="file"   class="form-control" name="img3" />
									<?php }else { ?>
									<div style="height:100%;overflow: hidden">
										<br/>
										<label>Imagen 3
											<br/>
											<br/>
											<img src="../<?php echo $img3 ?>" width="100%"; ></label>
											<br/>
											<p onclick="">
												&rarr; Cambiar
											</p>
										</div>
										<div id="imgDiv" style="display:none">Imagen 3
											<br/>
											<br/>
											<input type="file"   class="form-control" name="img3" id="img2" />
										</div>

										<?php } ?>
									</label>

									<label class="col-lg-2" style="margin-top:20px;margin-bottom: 20px">
										<?php if($img4 === '') {
											?>Imagen 4
											<br/>
											<br/>
											<input type="file"   class="form-control" name="img4" />
											<?php }else { ?>
											<div style="height:100%;overflow: hidden">
												<br/>
												<label>Imagen 4
													<br/>
													<br/>
													<img src="../<?php echo $img4 ?>" width="100%"; ></label>
													<br/>
													<p onclick="">
														&rarr; Cambiar
													</p>
												</div>
												<div id="imgDiv" style="display:none">Imagen 4
													<br/>
													<br/>
													<input type="file"   class="form-control" name="img4" id="img2" />
												</div>

												<?php } ?>
											</label>

											<label class="col-lg-2" style="margin-top:20px;margin-bottom: 20px">
												<?php if($img5 === '') {
													?>Imagen 5
													<br/>
													<br/>
													<input type="file"   class="form-control" name="img5" />
													<?php } else { ?>
													<div style="height:100%;overflow: hidden">
														<br/>
														<label>Imagen 5
															<br/>
															<br/>
															<img src="../<?php echo $img5 ?>" width="100%"; ></label>
															<br/>
															<p onclick="">
																&rarr; Cambiar
															</p>
														</div>
														<div id="imgDiv" style="display:none">Imagen 5
															<br/>
															<br/>
															<input type="file"   class="form-control" name="img5" id="img2" />
														</div>

														<?php } ?>
													</label>													 
													<div class="clearfix"></div>
													<label class="col-md-12">
														<input type="submit" class="btn btn-primary " name="agregar" value="Modificar Producto" />
													</label>
												</div>
											</div>
										</form>
									</div>
