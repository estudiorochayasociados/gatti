SET FOREIGN_KEY_CHECKS = 0; 
 CREATE DATABASE IF NOT EXISTS `gatti2`;
USE `gatti2`;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `admin` VALUES("1", "facundo@estudiorochayasoc.com.ar", "faAr2010"); 


DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `vistas` int(11) NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO `banners` VALUES("11", "fb9cec1100", "Mercado libre", "fcb7093cfd", "0", "https://perfil.mercadolibre.com.ar/gattisa"); 
INSERT INTO `banners` VALUES("12", "62787a4749", "Box Envios", "825bc91df3", "0", ""); 
INSERT INTO `banners` VALUES("13", "3a878ffc22", "Box 12 cuotas", "825bc91df3", "0", ""); 
INSERT INTO `banners` VALUES("14", "cef054286c", "Box Correo", "825bc91df3", "0", ""); 
INSERT INTO `banners` VALUES("15", "b4197de712", "Box Atención", "825bc91df3", "0", ""); 
INSERT INTO `banners` VALUES("16", "4b410b25bd", "Vacaciones", "61e2467f64", "0", ""); 


DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

INSERT INTO `categorias` VALUES("3", "72162d6137", "Generales", "novedades"); 
INSERT INTO `categorias` VALUES("4", "825bc91df3", "Rectangular 1/2", "banners"); 
INSERT INTO `categorias` VALUES("5", "3473ddb26e", "Principal", "sliders"); 
INSERT INTO `categorias` VALUES("9", "da8497826b", "Largo", "banners"); 
INSERT INTO `categorias` VALUES("19", "3df793d660", "Cuadrado", "banners"); 
INSERT INTO `categorias` VALUES("20", "fcb7093cfd", "Botonera", "banners"); 
INSERT INTO `categorias` VALUES("22", "dcc306bb21", "Mobile", "sliders"); 
INSERT INTO `categorias` VALUES("27", "e93de1739c", "AXIALES", "productos"); 
INSERT INTO `categorias` VALUES("28", "7f68015e9c", "CENTRIFUGOS", "productos"); 
INSERT INTO `categorias` VALUES("29", "06aaaafbc2", "CIRCULADORES", "productos"); 
INSERT INTO `categorias` VALUES("30", "fcc1569a20", "CORTINAS DE AIRE", "productos"); 
INSERT INTO `categorias` VALUES("31", "61e82f4be2", "ELECTRODOMESTICOS", "productos"); 
INSERT INTO `categorias` VALUES("32", "6d818d6604", "VENTILADORES ESPECIALES", "productos"); 
INSERT INTO `categorias` VALUES("33", "c31e9829ae", "ACCESORIOS ", "productos"); 
INSERT INTO `categorias` VALUES("34", "a45ed48c22", "LINEA HOGAR", "productos"); 
INSERT INTO `categorias` VALUES("35", "03b2fc7fcb", "AIRES ACONDICIONADOS ", "productos"); 
INSERT INTO `categorias` VALUES("36", "eed3230232", "LÍNEA INDUSTRIAL ", "productos"); 
INSERT INTO `categorias` VALUES("37", "7b90340746", "ALQUILERES", "productos"); 
INSERT INTO `categorias` VALUES("38", "61e2467f64", "POPUP", "banners"); 
INSERT INTO `categorias` VALUES("39", "792c4ae0ed", "Informacion", "landing"); 
INSERT INTO `categorias` VALUES("40", "34ae17e554", "Compra", "landing"); 
INSERT INTO `categorias` VALUES("41", "8c484da900", "Sorteo", "landing"); 
INSERT INTO `categorias` VALUES("42", "7985daf770", "Evento", "landing"); 


DROP TABLE IF EXISTS `contenidos`;
CREATE TABLE `contenidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` longtext,
  `cod` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO `contenidos` VALUES("8", "<p>En 1964 en la provincia de C&oacute;rdoba, el Sr. Alfredo Luis CARLOS Gatti, funda una peque&ntilde;a empresa dedicada a la reparaci&oacute;n de motores el&eacute;ctricos y a la fabricaci&oacute;n de tableros de uso industrial. Al principio de los setenta, Electromec&aacute;nica Gatti comienza la fabricaci&oacute;n de maquinas de soldar, las cuales tuvieron una excelente aceptaci&oacute;n, imponi&eacute;ndose en el mercado r&aacute;pidamente.<br />
INSERT INTO `contenidos` VALUES("9", "<p><strong>CENTRAL HOUSE</strong><br />
INSERT INTO `contenidos` VALUES("17", "<p>   <iframe src=\"https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fgattisa%2F&amp;tabs&amp;height=214&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=175360699291374\" style=\"border:none;overflow:hidden\" scrolling=\"no\" allowtransparency=\"true\" width=\"100%\" height=\"214\" frameborder=\"0\"></iframe></p>", "facebook"); 
INSERT INTO `contenidos` VALUES("18", "<span style=\"font-size:13px\">El aire es soplado o aspirado a través de un conducto equipado con rejillas estabilizadoras al comienzo para garantizar que el flujo se comporte de manera laminar o con obstáculos u otros objetos si se desea que se comporte de forma turbulenta. Los modelos se montan para su estudio en un equipo llamado balanza a la cual están adosados los sensores que brindan la información necesaria para calcular los coeficientes de sustentación y resistencia, necesarios para conocer si es factible o no emplear el modelo en la vida real. </span>
INSERT INTO `contenidos` VALUES("20", "<div class=\"btgrid\">
INSERT INTO `contenidos` VALUES("22", "124124", "encuestas"); 
INSERT INTO `contenidos` VALUES("23", "<iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLSe1V7wlE2iWjgINE2Xinvaw45O4LuAq6bOr_hcehe-91VrVzw/viewform?embedded=true\" width=\"100%\" height=\"500\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\">Cargando...</iframe>", "encuestas1"); 
INSERT INTO `contenidos` VALUES("24", "<p>ALQUILERES</p>
INSERT INTO `contenidos` VALUES("25", "<div class=\"container cuerpoContenedor\">


DROP TABLE IF EXISTS `envios`;
CREATE TABLE `envios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) NOT NULL,
  `titulo` text NOT NULL,
  `peso` int(11) DEFAULT NULL,
  `precio` float NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

INSERT INTO `envios` VALUES("4", "df9c10fa5e", "Correo Argentino a Sucursal", "1", "165", "0"); 
INSERT INTO `envios` VALUES("5", "4c44179c48", "CORREO ARGENTINO A SUCURSAL", "3", "200", "0"); 
INSERT INTO `envios` VALUES("6", "c13ec65da8", "CORREO ARGENTINO A SUCURSAL", "5", "225", "0"); 
INSERT INTO `envios` VALUES("7", "5565c92fa0", "CORREO ARGENTINO A SUCURSAL", "10", "315", "0"); 
INSERT INTO `envios` VALUES("8", "3e20bda806", "CORREO ARGENTINO A SUCURSAL", "15", "430", "0"); 
INSERT INTO `envios` VALUES("9", "0f025f8217", "CORREO ARGENTINO A SUCURSAL", "20", "575", "0"); 
INSERT INTO `envios` VALUES("10", "62a51d9235", "CORREO ARGENTINO A SUCURSAL", "25", "750", "0"); 
INSERT INTO `envios` VALUES("11", "f0a2889172", "CORREO ARGENTINO A SUCURSAL", "30", "905", "0"); 
INSERT INTO `envios` VALUES("12", "4b045d5191", "Correo Argentino a Domicilio", "1", "225", "0"); 
INSERT INTO `envios` VALUES("13", "aa181676a7", "Correo Argentino a Domicilio", "3", "295", "0"); 
INSERT INTO `envios` VALUES("14", "f855001982", "Correo Argentino a Domicilio", "5", "320", "0"); 
INSERT INTO `envios` VALUES("15", "c041a48d82", "Correo Argentino a Domicilio", "10", "405", "0"); 
INSERT INTO `envios` VALUES("16", "7a3c16c066", "Correo Argentino a Domicilio", "15", "520", "0"); 
INSERT INTO `envios` VALUES("17", "d3a7b74618", "Correo Argentino a Domicilio", "20", "660", "0"); 
INSERT INTO `envios` VALUES("18", "5bc494c8d6", "Correo Argentino a Domicilio", "25", "815", "0"); 
INSERT INTO `envios` VALUES("19", "3d7909ed98", "Correo Argentino a Domicilio", "30", "1015", "0"); 
INSERT INTO `envios` VALUES("20", "47015b0cd3", "Retiro en Sucursal Rosario", "0", "0", "0"); 
INSERT INTO `envios` VALUES("21", "9db96b83f4", "Retiro en Sucursal Buenos Aires", "0", "0", "0"); 
INSERT INTO `envios` VALUES("22", "d318d61a1c", "Retiro en Sucursal San Francisco Córdoba", "0", "0", "0"); 


DROP TABLE IF EXISTS `galerias`;
CREATE TABLE `galerias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) DEFAULT NULL,
  `titulo` text,
  `desarrollo` text,
  `categoria` text,
  `keywords` text,
  `description` text,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `galerias` VALUES("1", "2f630e911f", "Clientes", "", "", "", "", "0000-00-00"); 


DROP TABLE IF EXISTS `imagenes`;
CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(255) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2251 DEFAULT CHARSET=latin1;

INSERT INTO `imagenes` VALUES("176", "assets/archivos/recortadas/a_78992fbafd.jpg", "281f0433e1", "0"); 
INSERT INTO `imagenes` VALUES("177", "assets/archivos/recortadas/a_1481282c85.jpg", "2e35f0a788", "0"); 
INSERT INTO `imagenes` VALUES("178", "assets/archivos/recortadas/a_dfca5678cc.jpg", "fcb1a43fe5", "0"); 
INSERT INTO `imagenes` VALUES("179", "assets/archivos/recortadas/a_b535ddab7f.jpg", "82f8e26525", "0"); 
INSERT INTO `imagenes` VALUES("1424", "assets/archivos/recortadas/a_37cbac.jpg", "9f693d642e", "0"); 
INSERT INTO `imagenes` VALUES("1425", "assets/archivos/recortadas/a_7c87e2.jpg", "9f693d642e", "0"); 
INSERT INTO `imagenes` VALUES("1426", "assets/archivos/recortadas/a_853dfc.jpg", "9f693d642e", "0"); 
INSERT INTO `imagenes` VALUES("1427", "assets/archivos/recortadas/a_accea2.jpg", "9f693d642e", "0"); 
INSERT INTO `imagenes` VALUES("1428", "assets/archivos/recortadas/a_70c777.JPG", "9f693d642e", "0"); 
INSERT INTO `imagenes` VALUES("1429", "assets/archivos/recortadas/a_7c38bc.jpg", "b0fce4847d", "0"); 
INSERT INTO `imagenes` VALUES("1430", "assets/archivos/recortadas/a_538734.jpg", "b0fce4847d", "0"); 
INSERT INTO `imagenes` VALUES("1431", "assets/archivos/recortadas/a_bbcb91.jpg", "b0fce4847d", "0"); 
INSERT INTO `imagenes` VALUES("1432", "assets/archivos/recortadas/a_4b9877.jpg", "b0fce4847d", "0"); 
INSERT INTO `imagenes` VALUES("1433", "assets/archivos/recortadas/a_172cb7.jpg", "f3aacdff42", "0"); 
INSERT INTO `imagenes` VALUES("1434", "assets/archivos/recortadas/a_8d25bf.JPG", "f3aacdff42", "0"); 
INSERT INTO `imagenes` VALUES("1435", "assets/archivos/recortadas/a_14d042.jpg", "f3aacdff42", "0"); 
INSERT INTO `imagenes` VALUES("1436", "assets/archivos/recortadas/a_5c993c.jpg", "f3aacdff42", "0"); 
INSERT INTO `imagenes` VALUES("1437", "assets/archivos/recortadas/a_82c081.jpg", "f3aacdff42", "0"); 
INSERT INTO `imagenes` VALUES("1438", "assets/archivos/recortadas/a_f622ea.jpg", "3c23a2467c", "0"); 
INSERT INTO `imagenes` VALUES("1439", "assets/archivos/recortadas/a_6bda19.-min", "3c23a2467c", "0"); 
INSERT INTO `imagenes` VALUES("1440", "assets/archivos/recortadas/a_66277a.jpg", "3c23a2467c", "0"); 
INSERT INTO `imagenes` VALUES("1441", "assets/archivos/recortadas/a_078a6a.jpg", "3c23a2467c", "0"); 
INSERT INTO `imagenes` VALUES("1442", "assets/archivos/recortadas/a_710130.jpg", "3c23a2467c", "0"); 
INSERT INTO `imagenes` VALUES("1443", "assets/archivos/recortadas/a_8d7f24.jpg", "4b5c8d7cd9", "0"); 
INSERT INTO `imagenes` VALUES("1444", "assets/archivos/recortadas/a_85a40c.JPG", "4b5c8d7cd9", "0"); 
INSERT INTO `imagenes` VALUES("1445", "assets/archivos/recortadas/a_a49477.jpg", "4b5c8d7cd9", "0"); 
INSERT INTO `imagenes` VALUES("1446", "assets/archivos/recortadas/a_deedb0.jpg", "4b5c8d7cd9", "0"); 
INSERT INTO `imagenes` VALUES("1447", "assets/archivos/recortadas/a_27c3a9.jpg", "4b5c8d7cd9", "0"); 
INSERT INTO `imagenes` VALUES("1448", "assets/archivos/recortadas/a_8e5865.jpg", "ab44ef5eb1", "0"); 
INSERT INTO `imagenes` VALUES("1449", "assets/archivos/recortadas/a_5d8ea4.jpg", "ab44ef5eb1", "0"); 
INSERT INTO `imagenes` VALUES("1450", "assets/archivos/recortadas/a_f37ab6.jpg", "ab44ef5eb1", "0"); 
INSERT INTO `imagenes` VALUES("1451", "assets/archivos/recortadas/a_5c2cc7.jpg", "ab44ef5eb1", "0"); 
INSERT INTO `imagenes` VALUES("1452", "assets/archivos/recortadas/a_03cbf4.jpg", "ab44ef5eb1", "0"); 
INSERT INTO `imagenes` VALUES("1453", "assets/archivos/recortadas/a_c229be.jpg", "c1eabdf3d4", "0"); 
INSERT INTO `imagenes` VALUES("1454", "assets/archivos/recortadas/a_f3c35a.jpg", "c1eabdf3d4", "0"); 
INSERT INTO `imagenes` VALUES("1455", "assets/archivos/recortadas/a_81fb6b.jpg", "c1eabdf3d4", "0"); 
INSERT INTO `imagenes` VALUES("1456", "assets/archivos/recortadas/a_b6db10.jpg", "c1eabdf3d4", "0"); 
INSERT INTO `imagenes` VALUES("1457", "assets/archivos/recortadas/a_e133dd.jpg", "c1eabdf3d4", "0"); 
INSERT INTO `imagenes` VALUES("1458", "assets/archivos/recortadas/a_4248ce.jpg", "8ac6b7e37c", "0"); 
INSERT INTO `imagenes` VALUES("1459", "assets/archivos/recortadas/a_ee282e.jpg", "8ac6b7e37c", "0"); 
INSERT INTO `imagenes` VALUES("1460", "assets/archivos/recortadas/a_7c6bab.JPG", "8ac6b7e37c", "0"); 
INSERT INTO `imagenes` VALUES("1461", "assets/archivos/recortadas/a_1b32e1.png", "8ac6b7e37c", "0"); 
INSERT INTO `imagenes` VALUES("1462", "assets/archivos/recortadas/a_9d68c0.jpg", "8ac6b7e37c", "0"); 
INSERT INTO `imagenes` VALUES("1463", "assets/archivos/recortadas/a_961636.jpg", "6c4c0f8090", "0"); 
INSERT INTO `imagenes` VALUES("1464", "assets/archivos/recortadas/a_1eb019.jpg", "6c4c0f8090", "0"); 
INSERT INTO `imagenes` VALUES("1465", "assets/archivos/recortadas/a_3493dc.jpg", "6c4c0f8090", "0"); 
INSERT INTO `imagenes` VALUES("1466", "assets/archivos/recortadas/a_a32cc5.jpg", "6c4c0f8090", "0"); 
INSERT INTO `imagenes` VALUES("1467", "assets/archivos/recortadas/a_f3619b.jpg", "6c4c0f8090", "0"); 
INSERT INTO `imagenes` VALUES("1468", "assets/archivos/recortadas/a_59bca6.jpg", "3458478bd1", "0"); 
INSERT INTO `imagenes` VALUES("1469", "assets/archivos/recortadas/a_e10a72.jpg", "3458478bd1", "0"); 
INSERT INTO `imagenes` VALUES("1470", "assets/archivos/recortadas/a_14e5a1.jpg", "3458478bd1", "0"); 
INSERT INTO `imagenes` VALUES("1471", "assets/archivos/recortadas/a_74a62d.jpg", "3458478bd1", "0"); 
INSERT INTO `imagenes` VALUES("1472", "assets/archivos/recortadas/a_72da2d.jpg", "3458478bd1", "0"); 
INSERT INTO `imagenes` VALUES("1473", "assets/archivos/recortadas/a_b3867f.jpg", "5638157d2e", "0"); 
INSERT INTO `imagenes` VALUES("1474", "assets/archivos/recortadas/a_1e1f05.jpg", "5638157d2e", "0"); 
INSERT INTO `imagenes` VALUES("1475", "assets/archivos/recortadas/a_183751.jpg", "5638157d2e", "0"); 
INSERT INTO `imagenes` VALUES("1476", "assets/archivos/recortadas/a_3d1092.jpg", "5638157d2e", "0"); 
INSERT INTO `imagenes` VALUES("1477", "assets/archivos/recortadas/a_ff65af.jpg", "5638157d2e", "0"); 
INSERT INTO `imagenes` VALUES("1478", "assets/archivos/recortadas/a_fbd241.jpg", "fce5c10ccc", "0"); 
INSERT INTO `imagenes` VALUES("1479", "assets/archivos/recortadas/a_d7fef6.jpg", "fce5c10ccc", "0"); 
INSERT INTO `imagenes` VALUES("1480", "assets/archivos/recortadas/a_8d58ba.jpg", "fce5c10ccc", "0"); 
INSERT INTO `imagenes` VALUES("1481", "assets/archivos/recortadas/a_21ee53.jpg", "fce5c10ccc", "0"); 
INSERT INTO `imagenes` VALUES("1482", "assets/archivos/recortadas/a_d8581a.jpg", "fce5c10ccc", "0"); 
INSERT INTO `imagenes` VALUES("1483", "assets/archivos/recortadas/a_444ae9.jpg", "354067cdd1", "0"); 
INSERT INTO `imagenes` VALUES("1484", "assets/archivos/recortadas/a_16362a.JPG", "354067cdd1", "0"); 
INSERT INTO `imagenes` VALUES("1485", "assets/archivos/recortadas/a_03def8.JPG", "354067cdd1", "0"); 
INSERT INTO `imagenes` VALUES("1486", "assets/archivos/recortadas/a_20d945.JPG", "354067cdd1", "0"); 
INSERT INTO `imagenes` VALUES("1487", "assets/archivos/recortadas/a_b6cdd0.jpg", "354067cdd1", "0"); 
INSERT INTO `imagenes` VALUES("1488", "assets/archivos/recortadas/a_36409f.jpg", "c964fdd7b8", "0"); 
INSERT INTO `imagenes` VALUES("1489", "assets/archivos/recortadas/a_dd63b4.JPG", "c964fdd7b8", "0"); 
INSERT INTO `imagenes` VALUES("1490", "assets/archivos/recortadas/a_35c8f9.jpg", "c964fdd7b8", "0"); 
INSERT INTO `imagenes` VALUES("1491", "assets/archivos/recortadas/a_a8b9f1.jpg", "c964fdd7b8", "0"); 
INSERT INTO `imagenes` VALUES("1492", "assets/archivos/recortadas/a_959c58.jpg", "c964fdd7b8", "0"); 
INSERT INTO `imagenes` VALUES("1493", "assets/archivos/recortadas/a_f3a2ea.jpg", "42e7c36904", "0"); 
INSERT INTO `imagenes` VALUES("1494", "assets/archivos/recortadas/a_e2372a.JPG", "42e7c36904", "0"); 
INSERT INTO `imagenes` VALUES("1495", "assets/archivos/recortadas/a_6cab1b.jpg", "42e7c36904", "0"); 
INSERT INTO `imagenes` VALUES("1496", "assets/archivos/recortadas/a_3fcb60.jpg", "ad19ce04a8", "0"); 
INSERT INTO `imagenes` VALUES("1497", "assets/archivos/recortadas/a_04b680.jpg", "ad19ce04a8", "0"); 
INSERT INTO `imagenes` VALUES("1498", "assets/archivos/recortadas/a_3db73d.jpg", "ad19ce04a8", "0"); 
INSERT INTO `imagenes` VALUES("1499", "assets/archivos/recortadas/a_9c3292.jpg", "5f16d77052", "0"); 
INSERT INTO `imagenes` VALUES("1500", "assets/archivos/recortadas/a_04450e.jpg", "5f16d77052", "0"); 
INSERT INTO `imagenes` VALUES("1501", "assets/archivos/recortadas/a_d9d46f.jpg", "5f16d77052", "0"); 
INSERT INTO `imagenes` VALUES("1502", "assets/archivos/recortadas/a_d45f38.png", "55da673c0d", "0"); 
INSERT INTO `imagenes` VALUES("1503", "assets/archivos/recortadas/a_3d54d6.JPG", "55da673c0d", "0"); 
INSERT INTO `imagenes` VALUES("1504", "assets/archivos/recortadas/a_c8cc15.JPG", "55da673c0d", "0"); 
INSERT INTO `imagenes` VALUES("1505", "assets/archivos/recortadas/a_972527.jpg", "55da673c0d", "0"); 
INSERT INTO `imagenes` VALUES("1506", "assets/archivos/recortadas/a_0e40b9.jpg", "52f0613f54", "0"); 
INSERT INTO `imagenes` VALUES("1507", "assets/archivos/recortadas/a_2e8f83.png", "29ea661797", "0"); 
INSERT INTO `imagenes` VALUES("1508", "assets/archivos/recortadas/a_90cf06.jpg", "29ea661797", "0"); 
INSERT INTO `imagenes` VALUES("1509", "assets/archivos/recortadas/a_e7f074.jpg", "29ea661797", "0"); 
INSERT INTO `imagenes` VALUES("1510", "assets/archivos/recortadas/a_3960c6.png", "5c335814c2", "0"); 
INSERT INTO `imagenes` VALUES("1511", "assets/archivos/recortadas/a_2a2bec.JPG", "52d3fe1ed1", "0"); 
INSERT INTO `imagenes` VALUES("1512", "assets/archivos/recortadas/a_a65223.jpg", "52d3fe1ed1", "0"); 
INSERT INTO `imagenes` VALUES("1513", "assets/archivos/recortadas/a_ab963d.JPG", "52d3fe1ed1", "0"); 
INSERT INTO `imagenes` VALUES("1514", "assets/archivos/recortadas/a_9ff982.JPG", "52d3fe1ed1", "0"); 
INSERT INTO `imagenes` VALUES("1515", "assets/archivos/recortadas/a_23b3ae.jpg", "262c79dcbf", "0"); 
INSERT INTO `imagenes` VALUES("1516", "assets/archivos/recortadas/a_f4c6de.jpg", "262c79dcbf", "0"); 
INSERT INTO `imagenes` VALUES("1517", "assets/archivos/recortadas/a_1e3453.jpg", "262c79dcbf", "0"); 
INSERT INTO `imagenes` VALUES("1518", "assets/archivos/recortadas/a_40ae41.jpg", "262c79dcbf", "0"); 
INSERT INTO `imagenes` VALUES("1519", "assets/archivos/recortadas/a_6af84f.jpg", "262c79dcbf", "0"); 
INSERT INTO `imagenes` VALUES("1520", "assets/archivos/recortadas/a_3fba68.JPG", "44fc46d0fe", "0"); 
INSERT INTO `imagenes` VALUES("1521", "assets/archivos/recortadas/a_e93f1a.JPG", "44fc46d0fe", "0"); 
INSERT INTO `imagenes` VALUES("1522", "assets/archivos/recortadas/a_b8a72f.JPG", "44fc46d0fe", "0"); 
INSERT INTO `imagenes` VALUES("1523", "assets/archivos/recortadas/a_77f78c.JPG", "44fc46d0fe", "0"); 
INSERT INTO `imagenes` VALUES("1524", "assets/archivos/recortadas/a_9150e4.jpg", "fd2341a665", "0"); 
INSERT INTO `imagenes` VALUES("1525", "assets/archivos/recortadas/a_4e0643.jpg", "fd2341a665", "0"); 
INSERT INTO `imagenes` VALUES("1526", "assets/archivos/recortadas/a_8d5a06.jpg", "fd2341a665", "0"); 
INSERT INTO `imagenes` VALUES("1527", "assets/archivos/recortadas/a_5468a0.jpg", "48075888e4", "0"); 
INSERT INTO `imagenes` VALUES("1528", "assets/archivos/recortadas/a_cf08b8.jpg", "48075888e4", "0"); 
INSERT INTO `imagenes` VALUES("1529", "assets/archivos/recortadas/a_689c5f.jpg", "48075888e4", "0"); 
INSERT INTO `imagenes` VALUES("1530", "assets/archivos/recortadas/a_327cce.jpg", "48075888e4", "0"); 
INSERT INTO `imagenes` VALUES("1531", "assets/archivos/recortadas/a_668a8d.JPG", "b930c85355", "0"); 
INSERT INTO `imagenes` VALUES("1532", "assets/archivos/recortadas/a_f68b1a.JPG", "b930c85355", "0"); 
INSERT INTO `imagenes` VALUES("1533", "assets/archivos/recortadas/a_b19191.JPG", "b930c85355", "0"); 
INSERT INTO `imagenes` VALUES("1534", "assets/archivos/recortadas/a_8ceb50.JPG", "dc1532d697", "0"); 
INSERT INTO `imagenes` VALUES("1535", "assets/archivos/recortadas/a_10fe1f.JPG", "dc1532d697", "0"); 
INSERT INTO `imagenes` VALUES("1536", "assets/archivos/recortadas/a_c4c4f7.JPG", "dc1532d697", "0"); 
INSERT INTO `imagenes` VALUES("1537", "assets/archivos/recortadas/a_6e137b.JPG", "dc1532d697", "0"); 
INSERT INTO `imagenes` VALUES("1538", "assets/archivos/recortadas/a_a76bdf.JPG", "19ad1f690f", "0"); 
INSERT INTO `imagenes` VALUES("1539", "assets/archivos/recortadas/a_1d5f39.JPG", "19ad1f690f", "0"); 
INSERT INTO `imagenes` VALUES("1540", "assets/archivos/recortadas/a_5e5861.JPG", "19ad1f690f", "0"); 
INSERT INTO `imagenes` VALUES("1541", "assets/archivos/recortadas/a_9ca8fd.jpg", "19ad1f690f", "0"); 
INSERT INTO `imagenes` VALUES("1542", "assets/archivos/recortadas/a_66c08a.png", "19ad1f690f", "0"); 
INSERT INTO `imagenes` VALUES("1543", "assets/archivos/recortadas/a_88661b.jpg", "6901fd927a", "0"); 
INSERT INTO `imagenes` VALUES("1544", "assets/archivos/recortadas/a_3562c3.jpg", "6901fd927a", "0"); 
INSERT INTO `imagenes` VALUES("1545", "assets/archivos/recortadas/a_d0f614.png", "51d4057c84", "0"); 
INSERT INTO `imagenes` VALUES("1546", "assets/archivos/recortadas/a_9d4832.JPG", "51d4057c84", "0"); 
INSERT INTO `imagenes` VALUES("1547", "assets/archivos/recortadas/a_945d25.JPG", "51d4057c84", "0"); 
INSERT INTO `imagenes` VALUES("1548", "assets/archivos/recortadas/a_640123.jpg", "e37ba91d3c", "0"); 
INSERT INTO `imagenes` VALUES("1549", "assets/archivos/recortadas/a_c8eac9.jpg", "e37ba91d3c", "0"); 
INSERT INTO `imagenes` VALUES("1550", "assets/archivos/recortadas/a_f20c90.png", "3e42904cf7", "0"); 
INSERT INTO `imagenes` VALUES("1551", "assets/archivos/recortadas/a_1355fe.jpg", "3e42904cf7", "0"); 
INSERT INTO `imagenes` VALUES("1552", "assets/archivos/recortadas/a_8a1ee6.jpg", "3e42904cf7", "0"); 
INSERT INTO `imagenes` VALUES("1553", "assets/archivos/recortadas/a_c6362c.JPG", "3e42904cf7", "0"); 
INSERT INTO `imagenes` VALUES("1554", "assets/archivos/recortadas/a_e9c21d.jpg", "3e42904cf7", "0"); 
INSERT INTO `imagenes` VALUES("1555", "assets/archivos/recortadas/a_a0e093.jpg", "2e4716e3c2", "0"); 
INSERT INTO `imagenes` VALUES("1556", "assets/archivos/recortadas/a_11252c.jpg", "2e4716e3c2", "0"); 
INSERT INTO `imagenes` VALUES("1557", "assets/archivos/recortadas/a_de2112.JPG", "2e4716e3c2", "0"); 
INSERT INTO `imagenes` VALUES("1558", "assets/archivos/recortadas/a_94ca94.jpg", "2e4716e3c2", "0"); 
INSERT INTO `imagenes` VALUES("1559", "assets/archivos/recortadas/a_4da4a4.jpg", "2e4716e3c2", "0"); 
INSERT INTO `imagenes` VALUES("1560", "assets/archivos/recortadas/a_0db409.JPG", "3b82915d0e", "0"); 
INSERT INTO `imagenes` VALUES("1561", "assets/archivos/recortadas/a_215b55.jpg", "3b82915d0e", "0"); 
INSERT INTO `imagenes` VALUES("1562", "assets/archivos/recortadas/a_73829e.jpg", "3b82915d0e", "0"); 
INSERT INTO `imagenes` VALUES("1563", "assets/archivos/recortadas/a_c7f09b.JPG", "759c8192f1", "0"); 
INSERT INTO `imagenes` VALUES("1564", "assets/archivos/recortadas/a_93e57c.jpg", "759c8192f1", "0"); 
INSERT INTO `imagenes` VALUES("1565", "assets/archivos/recortadas/a_a98940.jpg", "759c8192f1", "0"); 
INSERT INTO `imagenes` VALUES("1566", "assets/archivos/recortadas/a_dd5716.jpg", "1a1a88c413", "0"); 
INSERT INTO `imagenes` VALUES("1567", "assets/archivos/recortadas/a_c1f38f.jpg", "1a1a88c413", "0"); 
INSERT INTO `imagenes` VALUES("1568", "assets/archivos/recortadas/a_ebf5c7.jpg", "1a1a88c413", "0"); 
INSERT INTO `imagenes` VALUES("1569", "assets/archivos/recortadas/a_6d32ea.jpg", "1a1a88c413", "0"); 
INSERT INTO `imagenes` VALUES("1570", "assets/archivos/recortadas/a_a9308e.jpg", "1a1a88c413", "0"); 
INSERT INTO `imagenes` VALUES("1571", "assets/archivos/recortadas/a_35d103.png", "61579233ce", "0"); 
INSERT INTO `imagenes` VALUES("1572", "assets/archivos/recortadas/a_409cf8.JPG", "61579233ce", "0"); 
INSERT INTO `imagenes` VALUES("1573", "assets/archivos/recortadas/a_c17e4d.JPG", "61579233ce", "0"); 
INSERT INTO `imagenes` VALUES("1574", "assets/archivos/recortadas/a_9dd3a9.jpg", "61579233ce", "0"); 
INSERT INTO `imagenes` VALUES("1575", "assets/archivos/recortadas/a_ac4c53.jpg", "962e035ce1", "0"); 
INSERT INTO `imagenes` VALUES("1576", "assets/archivos/recortadas/a_1fcaa8.jpg", "962e035ce1", "0"); 
INSERT INTO `imagenes` VALUES("1577", "assets/archivos/recortadas/a_204609.jpg", "962e035ce1", "0"); 
INSERT INTO `imagenes` VALUES("1578", "assets/archivos/recortadas/a_ed2584.jpg", "962e035ce1", "0"); 
INSERT INTO `imagenes` VALUES("1579", "assets/archivos/recortadas/a_ff005b.jpg", "962e035ce1", "0"); 
INSERT INTO `imagenes` VALUES("1580", "assets/archivos/recortadas/a_1a686c.png", "4623bcd20d", "0"); 
INSERT INTO `imagenes` VALUES("1581", "assets/archivos/recortadas/a_ab9058.jpg", "b9f2db89a9", "0"); 
INSERT INTO `imagenes` VALUES("1582", "assets/archivos/recortadas/a_a0ca45.jpg", "b9f2db89a9", "0"); 
INSERT INTO `imagenes` VALUES("1583", "assets/archivos/recortadas/a_bdc019.jpg", "b9f2db89a9", "0"); 
INSERT INTO `imagenes` VALUES("1584", "assets/archivos/recortadas/a_cd8930.jpg", "b9f2db89a9", "0"); 
INSERT INTO `imagenes` VALUES("1585", "assets/archivos/recortadas/a_c70a90.jpg", "b9f2db89a9", "0"); 
INSERT INTO `imagenes` VALUES("1586", "assets/archivos/recortadas/a_14c014.jpg", "fa768e7b51", "0"); 
INSERT INTO `imagenes` VALUES("1587", "assets/archivos/recortadas/a_bb0def.JPG", "fa768e7b51", "0"); 
INSERT INTO `imagenes` VALUES("1588", "assets/archivos/recortadas/a_7057b3.jpg", "fa768e7b51", "0"); 
INSERT INTO `imagenes` VALUES("1589", "assets/archivos/recortadas/a_65f934.jpg", "fa768e7b51", "0"); 
INSERT INTO `imagenes` VALUES("1590", "assets/archivos/recortadas/a_909a73.jpg", "1d0801c6e7", "0"); 
INSERT INTO `imagenes` VALUES("1591", "assets/archivos/recortadas/a_90dc16.jpg", "1d0801c6e7", "0"); 
INSERT INTO `imagenes` VALUES("1592", "assets/archivos/recortadas/a_60df06.jpg", "1d0801c6e7", "0"); 
INSERT INTO `imagenes` VALUES("1593", "assets/archivos/recortadas/a_f0b5ff.jpg", "1d0801c6e7", "0"); 
INSERT INTO `imagenes` VALUES("1594", "assets/archivos/recortadas/a_04b2a8.jpg", "4c9ccdb5f9", "0"); 
INSERT INTO `imagenes` VALUES("1595", "assets/archivos/recortadas/a_459f13.jpg", "4c9ccdb5f9", "0"); 
INSERT INTO `imagenes` VALUES("1596", "assets/archivos/recortadas/a_6f5274.jpg", "4c9ccdb5f9", "0"); 
INSERT INTO `imagenes` VALUES("1597", "assets/archivos/recortadas/a_87e802.jpg", "4c9ccdb5f9", "0"); 
INSERT INTO `imagenes` VALUES("1598", "assets/archivos/recortadas/a_181200.jpg", "d176fa51ff", "0"); 
INSERT INTO `imagenes` VALUES("1599", "assets/archivos/recortadas/a_2576a7.jpg", "d176fa51ff", "0"); 
INSERT INTO `imagenes` VALUES("1600", "assets/archivos/recortadas/a_641667.jpg", "d176fa51ff", "0"); 
INSERT INTO `imagenes` VALUES("1601", "assets/archivos/recortadas/a_287343.jpg", "d176fa51ff", "0"); 
INSERT INTO `imagenes` VALUES("1602", "assets/archivos/recortadas/a_20fadc.png", "001a3887af", "0"); 
INSERT INTO `imagenes` VALUES("1603", "assets/archivos/recortadas/a_503b46.jpg", "001a3887af", "0"); 
INSERT INTO `imagenes` VALUES("1604", "assets/archivos/recortadas/a_a67b98.jpg", "7fbb976797", "0"); 
INSERT INTO `imagenes` VALUES("1605", "assets/archivos/recortadas/a_afc2f5.jpg", "7fbb976797", "0"); 
INSERT INTO `imagenes` VALUES("1606", "assets/archivos/recortadas/a_b3b76d.JPG", "7fbb976797", "0"); 
INSERT INTO `imagenes` VALUES("1607", "assets/archivos/recortadas/a_890979.JPG", "7fbb976797", "0"); 
INSERT INTO `imagenes` VALUES("1608", "assets/archivos/recortadas/a_7c14f5.jpg", "f0a4d8bdef", "0"); 
INSERT INTO `imagenes` VALUES("1609", "assets/archivos/recortadas/a_d8c92d.JPG", "f0a4d8bdef", "0"); 
INSERT INTO `imagenes` VALUES("1610", "assets/archivos/recortadas/a_a2c7a5.jpg", "a8e6eacdb5", "0"); 
INSERT INTO `imagenes` VALUES("1611", "assets/archivos/recortadas/a_028d7c.jpg", "a8e6eacdb5", "0"); 
INSERT INTO `imagenes` VALUES("1612", "assets/archivos/recortadas/a_cf3987.jpg", "a8e6eacdb5", "0"); 
INSERT INTO `imagenes` VALUES("1613", "assets/archivos/recortadas/a_faee7b.png", "c013f6db44", "0"); 
INSERT INTO `imagenes` VALUES("1614", "assets/archivos/recortadas/a_58ce45.jpg", "c013f6db44", "0"); 
INSERT INTO `imagenes` VALUES("1615", "assets/archivos/recortadas/a_4f8c74.jpg", "c013f6db44", "0"); 
INSERT INTO `imagenes` VALUES("1616", "assets/archivos/recortadas/a_f8efb1.jpg", "c013f6db44", "0"); 
INSERT INTO `imagenes` VALUES("1617", "assets/archivos/recortadas/a_458ab9.jpg", "6d499bd960", "0"); 
INSERT INTO `imagenes` VALUES("1618", "assets/archivos/recortadas/a_7dc86d.jpg", "6d499bd960", "0"); 
INSERT INTO `imagenes` VALUES("1619", "assets/archivos/recortadas/a_0107ca.JPG", "6d499bd960", "0"); 
INSERT INTO `imagenes` VALUES("1620", "assets/archivos/recortadas/a_bcdb99.JPG", "6d499bd960", "0"); 
INSERT INTO `imagenes` VALUES("1621", "assets/archivos/recortadas/a_64d054.JPG", "6d499bd960", "0"); 
INSERT INTO `imagenes` VALUES("1622", "assets/archivos/recortadas/a_aa5539.jpg", "2f350b4b9a", "0"); 
INSERT INTO `imagenes` VALUES("1623", "assets/archivos/recortadas/a_250543.jpg", "2f350b4b9a", "0"); 
INSERT INTO `imagenes` VALUES("1624", "assets/archivos/recortadas/a_705c2a.jpg", "8e78bb24f6", "0"); 
INSERT INTO `imagenes` VALUES("1625", "assets/archivos/recortadas/a_1f2f4b.jpg", "8e78bb24f6", "0"); 
INSERT INTO `imagenes` VALUES("1626", "assets/archivos/recortadas/a_86e730.jpg", "8e78bb24f6", "0"); 
INSERT INTO `imagenes` VALUES("1627", "assets/archivos/recortadas/a_ab7013.jpg", "6f1f84d0cf", "0"); 
INSERT INTO `imagenes` VALUES("1628", "assets/archivos/recortadas/a_f50a95.jpg", "0fa169efae", "0"); 
INSERT INTO `imagenes` VALUES("1629", "assets/archivos/recortadas/a_1180ae.jpg", "c0b768f3a5", "0"); 
INSERT INTO `imagenes` VALUES("1630", "assets/archivos/recortadas/a_a36da3.jpg", "c0b768f3a5", "0"); 
INSERT INTO `imagenes` VALUES("1631", "assets/archivos/recortadas/a_57b1d3.jpg", "c0b768f3a5", "0"); 
INSERT INTO `imagenes` VALUES("1632", "assets/archivos/recortadas/a_1cd1cd.jpg", "c0b768f3a5", "0"); 
INSERT INTO `imagenes` VALUES("1633", "assets/archivos/recortadas/a_9e44f1.jpg", "3f67e5d436", "0"); 
INSERT INTO `imagenes` VALUES("1634", "assets/archivos/recortadas/a_80d005.jpg", "3f67e5d436", "0"); 
INSERT INTO `imagenes` VALUES("1635", "assets/archivos/recortadas/a_b76aeb.jpg", "3f67e5d436", "0"); 
INSERT INTO `imagenes` VALUES("1636", "assets/archivos/recortadas/a_9dbd02.jpg", "3f67e5d436", "0"); 
INSERT INTO `imagenes` VALUES("1637", "assets/archivos/recortadas/a_8cc9d3.jpg", "3f67e5d436", "0"); 
INSERT INTO `imagenes` VALUES("1638", "assets/archivos/recortadas/a_6a8c00.jpg", "471b74a567", "0"); 
INSERT INTO `imagenes` VALUES("1639", "assets/archivos/recortadas/a_da7ac9.jpg", "471b74a567", "0"); 
INSERT INTO `imagenes` VALUES("1640", "assets/archivos/recortadas/a_a7506a.jpg", "471b74a567", "0"); 
INSERT INTO `imagenes` VALUES("1641", "assets/archivos/recortadas/a_04d024.jpg", "471b74a567", "0"); 
INSERT INTO `imagenes` VALUES("1642", "assets/archivos/recortadas/a_212f45.jpg", "471b74a567", "0"); 
INSERT INTO `imagenes` VALUES("1643", "assets/archivos/recortadas/a_e12004.jpg", "e9ebad6b72", "0"); 
INSERT INTO `imagenes` VALUES("1644", "assets/archivos/recortadas/a_58f60a.jpg", "e9ebad6b72", "0"); 
INSERT INTO `imagenes` VALUES("1645", "assets/archivos/recortadas/a_9fb7fe.jpg", "e9ebad6b72", "0"); 
INSERT INTO `imagenes` VALUES("1646", "assets/archivos/recortadas/a_f92586.jpg", "e9ebad6b72", "0"); 
INSERT INTO `imagenes` VALUES("1647", "assets/archivos/recortadas/a_43a1e7.jpg", "ad132d5edf", "0"); 
INSERT INTO `imagenes` VALUES("1648", "assets/archivos/recortadas/a_19b0e0.jpg", "ad132d5edf", "0"); 
INSERT INTO `imagenes` VALUES("1649", "assets/archivos/recortadas/a_0566c9.jpg", "ad132d5edf", "0"); 
INSERT INTO `imagenes` VALUES("1650", "assets/archivos/recortadas/a_8aeff5.jpg", "ad132d5edf", "0"); 
INSERT INTO `imagenes` VALUES("1651", "assets/archivos/recortadas/a_ebb4db.jpg", "ad132d5edf", "0"); 
INSERT INTO `imagenes` VALUES("1652", "assets/archivos/recortadas/a_3a578b.jpg", "5c8f3cc895", "0"); 
INSERT INTO `imagenes` VALUES("1653", "assets/archivos/recortadas/a_e65451.jpg", "5c8f3cc895", "0"); 
INSERT INTO `imagenes` VALUES("1654", "assets/archivos/recortadas/a_7773c5.jpg", "5c8f3cc895", "0"); 
INSERT INTO `imagenes` VALUES("1655", "assets/archivos/recortadas/a_21e9c1.jpg", "5c8f3cc895", "0"); 
INSERT INTO `imagenes` VALUES("1656", "assets/archivos/recortadas/a_ec07a9.jpg", "5c8f3cc895", "0"); 
INSERT INTO `imagenes` VALUES("1657", "assets/archivos/recortadas/a_ab27d0.jpg", "06b25e73dc", "0"); 
INSERT INTO `imagenes` VALUES("1658", "assets/archivos/recortadas/a_4830de.jpg", "06b25e73dc", "0"); 
INSERT INTO `imagenes` VALUES("1659", "assets/archivos/recortadas/a_632288.jpg", "06b25e73dc", "0"); 
INSERT INTO `imagenes` VALUES("1660", "assets/archivos/recortadas/a_25533b.jpg", "06b25e73dc", "0"); 
INSERT INTO `imagenes` VALUES("1661", "assets/archivos/recortadas/a_83beed.jpg", "06b25e73dc", "0"); 
INSERT INTO `imagenes` VALUES("1662", "assets/archivos/recortadas/a_d9b93a.jpg", "95761594da", "0"); 
INSERT INTO `imagenes` VALUES("1663", "assets/archivos/recortadas/a_59fa40.jpg", "95761594da", "0"); 
INSERT INTO `imagenes` VALUES("1664", "assets/archivos/recortadas/a_a11c4c.jpg", "95761594da", "0"); 
INSERT INTO `imagenes` VALUES("1665", "assets/archivos/recortadas/a_b7e8ae.jpg", "95761594da", "0"); 
INSERT INTO `imagenes` VALUES("1666", "assets/archivos/recortadas/a_064414.jpg", "95761594da", "0"); 
INSERT INTO `imagenes` VALUES("1667", "assets/archivos/recortadas/a_83975a.jpg", "82e6109bff", "0"); 
INSERT INTO `imagenes` VALUES("1668", "assets/archivos/recortadas/a_087490.jpg", "82e6109bff", "0"); 
INSERT INTO `imagenes` VALUES("1669", "assets/archivos/recortadas/a_bfbfa1.JPG", "82e6109bff", "0"); 
INSERT INTO `imagenes` VALUES("1670", "assets/archivos/recortadas/a_de7c6f.jpg", "82e6109bff", "0"); 
INSERT INTO `imagenes` VALUES("1671", "assets/archivos/recortadas/a_43c434.jpg", "82e6109bff", "0"); 
INSERT INTO `imagenes` VALUES("1672", "assets/archivos/recortadas/a_1033df.jpg", "8657992f3e", "0"); 
INSERT INTO `imagenes` VALUES("1673", "assets/archivos/recortadas/a_39923c.jpg", "8657992f3e", "0"); 
INSERT INTO `imagenes` VALUES("1674", "assets/archivos/recortadas/a_9386aa.jpg", "8657992f3e", "0"); 
INSERT INTO `imagenes` VALUES("1675", "assets/archivos/recortadas/a_b2acf1.jpg", "8657992f3e", "0"); 
INSERT INTO `imagenes` VALUES("1676", "assets/archivos/recortadas/a_3da648.jpg", "8657992f3e", "0"); 
INSERT INTO `imagenes` VALUES("1677", "assets/archivos/recortadas/a_79a969.jpg", "a32c084276", "0"); 
INSERT INTO `imagenes` VALUES("1678", "assets/archivos/recortadas/a_2eced0.jpg", "a32c084276", "0"); 
INSERT INTO `imagenes` VALUES("1679", "assets/archivos/recortadas/a_5512a5.jpg", "a32c084276", "0"); 
INSERT INTO `imagenes` VALUES("1680", "assets/archivos/recortadas/a_291cb4.jpg", "a32c084276", "0"); 
INSERT INTO `imagenes` VALUES("1681", "assets/archivos/recortadas/a_e2a47b.jpg", "2eec7ca0e5", "0"); 
INSERT INTO `imagenes` VALUES("1682", "assets/archivos/recortadas/a_fbc28d.jpg", "2eec7ca0e5", "0"); 
INSERT INTO `imagenes` VALUES("1683", "assets/archivos/recortadas/a_339059.jpg", "3d07e126b6", "0"); 
INSERT INTO `imagenes` VALUES("1684", "assets/archivos/recortadas/a_efa3c2.jpg", "3d07e126b6", "0"); 
INSERT INTO `imagenes` VALUES("1685", "assets/archivos/recortadas/a_e818f3.jpg", "59608dcecd", "0"); 
INSERT INTO `imagenes` VALUES("1686", "assets/archivos/recortadas/a_a74eb1.jpg", "59608dcecd", "0"); 
INSERT INTO `imagenes` VALUES("1687", "assets/archivos/recortadas/a_2b6568.jpg", "59608dcecd", "0"); 
INSERT INTO `imagenes` VALUES("1688", "assets/archivos/recortadas/a_683be1.jpg", "59608dcecd", "0"); 
INSERT INTO `imagenes` VALUES("1689", "assets/archivos/recortadas/a_b332bf.jpg", "d431bc40c0", "0"); 
INSERT INTO `imagenes` VALUES("1690", "assets/archivos/recortadas/a_77662c.jpg", "d431bc40c0", "0"); 
INSERT INTO `imagenes` VALUES("1691", "assets/archivos/recortadas/a_2c3cf2.jpg", "d431bc40c0", "0"); 
INSERT INTO `imagenes` VALUES("1692", "assets/archivos/recortadas/a_a7932a.jpg", "d431bc40c0", "0"); 
INSERT INTO `imagenes` VALUES("1693", "assets/archivos/recortadas/a_f1b881.jpg", "075186e1ad", "0"); 
INSERT INTO `imagenes` VALUES("1694", "assets/archivos/recortadas/a_07bf04.jpg", "075186e1ad", "0"); 
INSERT INTO `imagenes` VALUES("1695", "assets/archivos/recortadas/a_2da02a.jpg", "075186e1ad", "0"); 
INSERT INTO `imagenes` VALUES("1696", "assets/archivos/recortadas/a_442c17.jpg", "075186e1ad", "0"); 
INSERT INTO `imagenes` VALUES("1697", "assets/archivos/recortadas/a_fb272e.jpg", "075186e1ad", "0"); 
INSERT INTO `imagenes` VALUES("1698", "assets/archivos/recortadas/a_1e061f.jpg", "d2f049a23c", "0"); 
INSERT INTO `imagenes` VALUES("1699", "assets/archivos/recortadas/a_700048.jpg", "d2f049a23c", "0"); 
INSERT INTO `imagenes` VALUES("1700", "assets/archivos/recortadas/a_c1d74e.jpg", "d2f049a23c", "0"); 
INSERT INTO `imagenes` VALUES("1701", "assets/archivos/recortadas/a_9f29b8.jpg", "d2f049a23c", "0"); 
INSERT INTO `imagenes` VALUES("1702", "assets/archivos/recortadas/a_54c78c.jpg", "d2f049a23c", "0"); 
INSERT INTO `imagenes` VALUES("1703", "assets/archivos/recortadas/a_235a49.jpg", "67d651818d", "0"); 
INSERT INTO `imagenes` VALUES("1704", "assets/archivos/recortadas/a_d863c9.jpg", "67d651818d", "0"); 
INSERT INTO `imagenes` VALUES("1705", "assets/archivos/recortadas/a_c5aeb0.jpg", "67d651818d", "0"); 
INSERT INTO `imagenes` VALUES("1706", "assets/archivos/recortadas/a_e0a87d.jpg", "67d651818d", "0"); 
INSERT INTO `imagenes` VALUES("1707", "assets/archivos/recortadas/a_2d9e34.jpg", "67d651818d", "0"); 
INSERT INTO `imagenes` VALUES("1708", "assets/archivos/recortadas/a_7f0205.jpg", "0fb2ef8095", "0"); 
INSERT INTO `imagenes` VALUES("1709", "assets/archivos/recortadas/a_366709.jpg", "0fb2ef8095", "0"); 
INSERT INTO `imagenes` VALUES("1710", "assets/archivos/recortadas/a_76aa4b.jpg", "0fb2ef8095", "0"); 
INSERT INTO `imagenes` VALUES("1711", "assets/archivos/recortadas/a_ed116a.jpg", "0fb2ef8095", "0"); 
INSERT INTO `imagenes` VALUES("1712", "assets/archivos/recortadas/a_03d23a.png", "0fb2ef8095", "0"); 
INSERT INTO `imagenes` VALUES("1713", "assets/archivos/recortadas/a_fba15b.png", "d5ec50d63f", "0"); 
INSERT INTO `imagenes` VALUES("1714", "assets/archivos/recortadas/a_d11a99.jpg", "d5ec50d63f", "0"); 
INSERT INTO `imagenes` VALUES("1715", "assets/archivos/recortadas/a_f2db19.JPG", "d5ec50d63f", "0"); 
INSERT INTO `imagenes` VALUES("1716", "assets/archivos/recortadas/a_dfd4ba.jpg", "d5ec50d63f", "0"); 
INSERT INTO `imagenes` VALUES("1717", "assets/archivos/recortadas/a_56434c.png", "3119211a83", "0"); 
INSERT INTO `imagenes` VALUES("1718", "assets/archivos/recortadas/a_ccee60.JPG", "3119211a83", "0"); 
INSERT INTO `imagenes` VALUES("1719", "assets/archivos/recortadas/a_ec1b54.jpg", "3119211a83", "0"); 
INSERT INTO `imagenes` VALUES("1720", "assets/archivos/recortadas/a_8ec9b1.jpg", "3119211a83", "0"); 
INSERT INTO `imagenes` VALUES("1721", "assets/archivos/recortadas/a_22b6d6.png", "1ff26ef3ca", "0"); 
INSERT INTO `imagenes` VALUES("1722", "assets/archivos/recortadas/a_9faa93.jpg", "1ff26ef3ca", "0"); 
INSERT INTO `imagenes` VALUES("1723", "assets/archivos/recortadas/a_da73da.JPG", "1ff26ef3ca", "0"); 
INSERT INTO `imagenes` VALUES("1724", "assets/archivos/recortadas/a_0bb601.jpg", "1ff26ef3ca", "0"); 
INSERT INTO `imagenes` VALUES("1725", "assets/archivos/recortadas/a_103a06.png", "48a79f1414", "0"); 
INSERT INTO `imagenes` VALUES("1726", "assets/archivos/recortadas/a_461f86.jpg", "48a79f1414", "0"); 
INSERT INTO `imagenes` VALUES("1727", "assets/archivos/recortadas/a_622479.jpg", "48a79f1414", "0"); 
INSERT INTO `imagenes` VALUES("1728", "assets/archivos/recortadas/a_32d4ff.jpg", "d670c7fd7c", "0"); 
INSERT INTO `imagenes` VALUES("1729", "assets/archivos/recortadas/a_e35a52.png", "d670c7fd7c", "0"); 
INSERT INTO `imagenes` VALUES("1730", "assets/archivos/recortadas/a_ff1765.png", "d670c7fd7c", "0"); 
INSERT INTO `imagenes` VALUES("1731", "assets/archivos/recortadas/a_2dab3a.jpg", "01fa55e190", "0"); 
INSERT INTO `imagenes` VALUES("1732", "assets/archivos/recortadas/a_400ef4.jpg", "01fa55e190", "0"); 
INSERT INTO `imagenes` VALUES("1733", "assets/archivos/recortadas/a_396076.jpg", "feac6e287c", "0"); 
INSERT INTO `imagenes` VALUES("1734", "assets/archivos/recortadas/a_a27c32.png", "feac6e287c", "0"); 
INSERT INTO `imagenes` VALUES("1735", "assets/archivos/recortadas/a_c8b0d6.jpg", "0b209790d5", "0"); 
INSERT INTO `imagenes` VALUES("1736", "assets/archivos/recortadas/a_70a41c.JPG", "0b209790d5", "0"); 
INSERT INTO `imagenes` VALUES("1737", "assets/archivos/recortadas/a_29d9fd.png", "6affa53a50", "0"); 
INSERT INTO `imagenes` VALUES("1738", "assets/archivos/recortadas/a_51175a.jpg", "6affa53a50", "0"); 
INSERT INTO `imagenes` VALUES("1739", "assets/archivos/recortadas/a_76f55b.jpg", "27743cb1d0", "0"); 
INSERT INTO `imagenes` VALUES("1740", "assets/archivos/recortadas/a_1d66a0.JPG", "27743cb1d0", "0"); 
INSERT INTO `imagenes` VALUES("1741", "assets/archivos/recortadas/a_3bc0cc.jpg", "9a629fd4b4", "0"); 
INSERT INTO `imagenes` VALUES("1742", "assets/archivos/recortadas/a_1e9570.jpg", "ef85830c24", "0"); 
INSERT INTO `imagenes` VALUES("1743", "assets/archivos/recortadas/a_249b38.JPG", "ef85830c24", "0"); 
INSERT INTO `imagenes` VALUES("1744", "assets/archivos/recortadas/a_14675f.jpg", "ef85830c24", "0"); 
INSERT INTO `imagenes` VALUES("1745", "assets/archivos/recortadas/a_8fe86d.jpg", "ef85830c24", "0"); 
INSERT INTO `imagenes` VALUES("1746", "assets/archivos/recortadas/a_3a8e8b.jpg", "a7ca1c19ca", "0"); 
INSERT INTO `imagenes` VALUES("1747", "assets/archivos/recortadas/a_f5d7df.jpg", "a7ca1c19ca", "0"); 
INSERT INTO `imagenes` VALUES("1748", "assets/archivos/recortadas/a_7d97d1.jpg", "a7ca1c19ca", "0"); 
INSERT INTO `imagenes` VALUES("1749", "assets/archivos/recortadas/a_a16469.jpg", "a7ca1c19ca", "0"); 
INSERT INTO `imagenes` VALUES("1750", "assets/archivos/recortadas/a_9e09a4.jpg", "a7ca1c19ca", "0"); 
INSERT INTO `imagenes` VALUES("1751", "assets/archivos/recortadas/a_54d9be.jpg", "2806c4ca23", "0"); 
INSERT INTO `imagenes` VALUES("1752", "assets/archivos/recortadas/a_b2a764.jpg", "2806c4ca23", "0"); 
INSERT INTO `imagenes` VALUES("1753", "assets/archivos/recortadas/a_e023ef.jpg", "2806c4ca23", "0"); 
INSERT INTO `imagenes` VALUES("1754", "assets/archivos/recortadas/a_76448e.jpg", "2806c4ca23", "0"); 
INSERT INTO `imagenes` VALUES("1755", "assets/archivos/recortadas/a_b092f5.jpg", "d5228c9177", "0"); 
INSERT INTO `imagenes` VALUES("1756", "assets/archivos/recortadas/a_2c5cda.jpg", "d5228c9177", "0"); 
INSERT INTO `imagenes` VALUES("1757", "assets/archivos/recortadas/a_07090a.jpg", "b90c5328dc", "0"); 
INSERT INTO `imagenes` VALUES("1758", "assets/archivos/recortadas/a_5cf8de.jpg", "b90c5328dc", "0"); 
INSERT INTO `imagenes` VALUES("1759", "assets/archivos/recortadas/a_bdd929.jpg", "a1ce295017", "0"); 
INSERT INTO `imagenes` VALUES("1760", "assets/archivos/recortadas/a_e8322f.jpg", "a1ce295017", "0"); 
INSERT INTO `imagenes` VALUES("1761", "assets/archivos/recortadas/a_e190c8.jpg", "4dfb90f863", "0"); 
INSERT INTO `imagenes` VALUES("1762", "assets/archivos/recortadas/a_e019c8.jpg", "4dfb90f863", "0"); 
INSERT INTO `imagenes` VALUES("1763", "assets/archivos/recortadas/a_355a71.jpg", "4dfb90f863", "0"); 
INSERT INTO `imagenes` VALUES("1764", "assets/archivos/recortadas/a_d6e401.jpg", "f880491a7b", "0"); 
INSERT INTO `imagenes` VALUES("1765", "assets/archivos/recortadas/a_0b92f2.jpg", "f880491a7b", "0"); 
INSERT INTO `imagenes` VALUES("1766", "assets/archivos/recortadas/a_032c0c.jpg", "a489d0ee6f", "0"); 
INSERT INTO `imagenes` VALUES("1767", "assets/archivos/recortadas/a_73c740.jpg", "a489d0ee6f", "0"); 
INSERT INTO `imagenes` VALUES("1768", "assets/archivos/recortadas/a_7b5d32.jpg", "a489d0ee6f", "0"); 
INSERT INTO `imagenes` VALUES("1769", "assets/archivos/recortadas/a_b4efb9.jpg", "cabff8120f", "0"); 
INSERT INTO `imagenes` VALUES("1770", "assets/archivos/recortadas/a_cb7168.JPG", "cabff8120f", "0"); 
INSERT INTO `imagenes` VALUES("1771", "assets/archivos/recortadas/a_878113.JPG", "37e229458e", "0"); 
INSERT INTO `imagenes` VALUES("1772", "assets/archivos/recortadas/a_414f8a.JPG", "37e229458e", "0"); 
INSERT INTO `imagenes` VALUES("1773", "assets/archivos/recortadas/a_1d7056.JPG", "37e229458e", "0"); 
INSERT INTO `imagenes` VALUES("1774", "assets/archivos/recortadas/a_11ed37.JPG", "37e229458e", "0"); 
INSERT INTO `imagenes` VALUES("1775", "assets/archivos/recortadas/a_f93f98.JPG", "508ac8a1c6", "0"); 
INSERT INTO `imagenes` VALUES("1776", "assets/archivos/recortadas/a_8ad57b.JPG", "508ac8a1c6", "0"); 
INSERT INTO `imagenes` VALUES("1777", "assets/archivos/recortadas/a_be6324.jpg", "508ac8a1c6", "0"); 
INSERT INTO `imagenes` VALUES("1778", "assets/archivos/recortadas/a_622520.jpg", "508ac8a1c6", "0"); 
INSERT INTO `imagenes` VALUES("1779", "assets/archivos/recortadas/a_c3f731.jpg", "508ac8a1c6", "0"); 
INSERT INTO `imagenes` VALUES("1780", "assets/archivos/recortadas/a_c19f1a.JPG", "d16a295e0d", "0"); 
INSERT INTO `imagenes` VALUES("1781", "assets/archivos/recortadas/a_f6b14a.jpg", "d16a295e0d", "0"); 
INSERT INTO `imagenes` VALUES("1782", "assets/archivos/recortadas/a_421833.jpg", "d16a295e0d", "0"); 
INSERT INTO `imagenes` VALUES("1783", "assets/archivos/recortadas/a_9f708d.jpg", "d16a295e0d", "0"); 
INSERT INTO `imagenes` VALUES("1784", "assets/archivos/recortadas/a_7345fd.jpg", "80e161c8bf", "0"); 
INSERT INTO `imagenes` VALUES("1785", "assets/archivos/recortadas/a_7c71ba.jpg", "80e161c8bf", "0"); 
INSERT INTO `imagenes` VALUES("1786", "assets/archivos/recortadas/a_287237.jpg", "80e161c8bf", "0"); 
INSERT INTO `imagenes` VALUES("1787", "assets/archivos/recortadas/a_a67278.jpg", "80e161c8bf", "0"); 
INSERT INTO `imagenes` VALUES("1788", "assets/archivos/recortadas/a_7fddb3.jpg", "80e161c8bf", "0"); 
INSERT INTO `imagenes` VALUES("1789", "assets/archivos/recortadas/a_2e3266.jpg", "9f724033d1", "0"); 
INSERT INTO `imagenes` VALUES("1790", "assets/archivos/recortadas/a_872e12.jpg", "9f724033d1", "0"); 
INSERT INTO `imagenes` VALUES("1791", "assets/archivos/recortadas/a_7a5b59.jpg", "9f724033d1", "0"); 
INSERT INTO `imagenes` VALUES("1792", "assets/archivos/recortadas/a_871881.jpg", "9f724033d1", "0"); 
INSERT INTO `imagenes` VALUES("1793", "assets/archivos/recortadas/a_461f3e.jpg", "9f724033d1", "0"); 
INSERT INTO `imagenes` VALUES("1794", "assets/archivos/recortadas/a_e8919d.jpg", "2942eb9314", "0"); 
INSERT INTO `imagenes` VALUES("1795", "assets/archivos/recortadas/a_620e5b.jpg", "2942eb9314", "0"); 
INSERT INTO `imagenes` VALUES("1796", "assets/archivos/recortadas/a_0bdedd.jpg", "2942eb9314", "0"); 
INSERT INTO `imagenes` VALUES("1797", "assets/archivos/recortadas/a_92f922.jpg", "2942eb9314", "0"); 
INSERT INTO `imagenes` VALUES("1798", "assets/archivos/recortadas/a_f30abc.jpg", "2942eb9314", "0"); 
INSERT INTO `imagenes` VALUES("1799", "assets/archivos/recortadas/a_46c929.jpg", "19a22c5c89", "0"); 
INSERT INTO `imagenes` VALUES("1800", "assets/archivos/recortadas/a_97c996.jpg", "19a22c5c89", "0"); 
INSERT INTO `imagenes` VALUES("1801", "assets/archivos/recortadas/a_b1eea7.jpg", "19a22c5c89", "0"); 
INSERT INTO `imagenes` VALUES("1802", "assets/archivos/recortadas/a_232445.jpg", "19a22c5c89", "0"); 
INSERT INTO `imagenes` VALUES("1803", "assets/archivos/recortadas/a_e213be.jpg", "19a22c5c89", "0"); 
INSERT INTO `imagenes` VALUES("1804", "assets/archivos/recortadas/a_161573.jpg", "54e9a49e77", "0"); 
INSERT INTO `imagenes` VALUES("1805", "assets/archivos/recortadas/a_4d7215.jpg", "54e9a49e77", "0"); 
INSERT INTO `imagenes` VALUES("1806", "assets/archivos/recortadas/a_4f571c.jpg", "54e9a49e77", "0"); 
INSERT INTO `imagenes` VALUES("1807", "assets/archivos/recortadas/a_c76095.jpg", "54a09c6dae", "0"); 
INSERT INTO `imagenes` VALUES("1808", "assets/archivos/recortadas/a_0e6f22.jpg", "54a09c6dae", "0"); 
INSERT INTO `imagenes` VALUES("1809", "assets/archivos/recortadas/a_d0c976.jpg", "54a09c6dae", "0"); 
INSERT INTO `imagenes` VALUES("1810", "assets/archivos/recortadas/a_9881d5.jpg", "54a09c6dae", "0"); 
INSERT INTO `imagenes` VALUES("1811", "assets/archivos/recortadas/a_4629d8.jpg", "54a09c6dae", "0"); 
INSERT INTO `imagenes` VALUES("1812", "assets/archivos/recortadas/a_edd2d9.jpg", "93eadf829a", "0"); 
INSERT INTO `imagenes` VALUES("1813", "assets/archivos/recortadas/a_763f24.jpg", "93eadf829a", "0"); 
INSERT INTO `imagenes` VALUES("1814", "assets/archivos/recortadas/a_a7ea21.jpg", "93eadf829a", "0"); 
INSERT INTO `imagenes` VALUES("1815", "assets/archivos/recortadas/a_b560fb.jpg", "0827688ec9", "0"); 
INSERT INTO `imagenes` VALUES("1816", "assets/archivos/recortadas/a_cdfe69.jpg", "0827688ec9", "0"); 
INSERT INTO `imagenes` VALUES("1817", "assets/archivos/recortadas/a_a2578d.jpg", "0827688ec9", "0"); 
INSERT INTO `imagenes` VALUES("1818", "assets/archivos/recortadas/a_206758.jpg", "0827688ec9", "0"); 
INSERT INTO `imagenes` VALUES("1819", "assets/archivos/recortadas/a_bb1b4f.jpg", "0827688ec9", "0"); 
INSERT INTO `imagenes` VALUES("1820", "assets/archivos/recortadas/a_e24988.jpg", "9c67a772e6", "0"); 
INSERT INTO `imagenes` VALUES("1821", "assets/archivos/recortadas/a_e9843f.jpg", "9c67a772e6", "0"); 
INSERT INTO `imagenes` VALUES("1822", "assets/archivos/recortadas/a_e9a6e4.jpg", "9c67a772e6", "0"); 
INSERT INTO `imagenes` VALUES("1823", "assets/archivos/recortadas/a_e459f8.JPG", "9c67a772e6", "0"); 
INSERT INTO `imagenes` VALUES("1824", "assets/archivos/recortadas/a_b7198f.jpg", "9c67a772e6", "0"); 
INSERT INTO `imagenes` VALUES("1825", "assets/archivos/recortadas/a_eebb96.jpg", "95bab25013", "0"); 
INSERT INTO `imagenes` VALUES("1826", "assets/archivos/recortadas/a_57d4ac.jpg", "95bab25013", "0"); 
INSERT INTO `imagenes` VALUES("1827", "assets/archivos/recortadas/a_3078a3.jpg", "95bab25013", "0"); 
INSERT INTO `imagenes` VALUES("1828", "assets/archivos/recortadas/a_1a165a.jpg", "95bab25013", "0"); 
INSERT INTO `imagenes` VALUES("1829", "assets/archivos/recortadas/a_0327bf.jpg", "95bab25013", "0"); 
INSERT INTO `imagenes` VALUES("1830", "assets/archivos/recortadas/a_9f0e6c.jpg", "bdd9090c46", "0"); 
INSERT INTO `imagenes` VALUES("1831", "assets/archivos/recortadas/a_6f104e.jpg", "bdd9090c46", "0"); 
INSERT INTO `imagenes` VALUES("1832", "assets/archivos/recortadas/a_1c907d.jpg", "bdd9090c46", "0"); 
INSERT INTO `imagenes` VALUES("1833", "assets/archivos/recortadas/a_c8b798.jpg", "bdd9090c46", "0"); 
INSERT INTO `imagenes` VALUES("1834", "assets/archivos/recortadas/a_8dc212.jpg", "23f88a3e2e", "0"); 
INSERT INTO `imagenes` VALUES("1835", "assets/archivos/recortadas/a_3d5e45.jpg", "23f88a3e2e", "0"); 
INSERT INTO `imagenes` VALUES("1836", "assets/archivos/recortadas/a_9c53fe.jpg", "23f88a3e2e", "0"); 
INSERT INTO `imagenes` VALUES("1837", "assets/archivos/recortadas/a_a78604.jpg", "23f88a3e2e", "0"); 
INSERT INTO `imagenes` VALUES("1838", "assets/archivos/recortadas/a_53b9ef.jpg", "5d2fbe2889", "0"); 
INSERT INTO `imagenes` VALUES("1839", "assets/archivos/recortadas/a_a24fc5.jpg", "5d2fbe2889", "0"); 
INSERT INTO `imagenes` VALUES("1840", "assets/archivos/recortadas/a_e526ba.jpg", "5d2fbe2889", "0"); 
INSERT INTO `imagenes` VALUES("1841", "assets/archivos/recortadas/a_31babf.jpg", "2984016b60", "0"); 
INSERT INTO `imagenes` VALUES("1842", "assets/archivos/recortadas/a_aa3116.jpg", "2984016b60", "0"); 
INSERT INTO `imagenes` VALUES("1843", "assets/archivos/recortadas/a_7ae9c1.jpg", "2984016b60", "0"); 
INSERT INTO `imagenes` VALUES("1844", "assets/archivos/recortadas/a_9c4774.jpg", "2984016b60", "0"); 
INSERT INTO `imagenes` VALUES("1845", "assets/archivos/recortadas/a_6be455.jpg", "2984016b60", "0"); 
INSERT INTO `imagenes` VALUES("1846", "assets/archivos/recortadas/a_fbd181.jpg", "24e637f639", "0"); 
INSERT INTO `imagenes` VALUES("1847", "assets/archivos/recortadas/a_6aa6d2.jpg", "24e637f639", "0"); 
INSERT INTO `imagenes` VALUES("1848", "assets/archivos/recortadas/a_00a508.jpg", "24e637f639", "0"); 
INSERT INTO `imagenes` VALUES("1849", "assets/archivos/recortadas/a_ffcdf3.jpg", "24e637f639", "0"); 
INSERT INTO `imagenes` VALUES("1850", "assets/archivos/recortadas/a_2ddfdd.jpg", "3e1771a11f", "0"); 
INSERT INTO `imagenes` VALUES("1851", "assets/archivos/recortadas/a_08cb90.jpg", "3e1771a11f", "0"); 
INSERT INTO `imagenes` VALUES("1852", "assets/archivos/recortadas/a_61442f.jpg", "3e1771a11f", "0"); 
INSERT INTO `imagenes` VALUES("1853", "assets/archivos/recortadas/a_7babd5.jpg", "3e1771a11f", "0"); 
INSERT INTO `imagenes` VALUES("1854", "assets/archivos/recortadas/a_c9b1f5.jpg", "56b43d33ab", "0"); 
INSERT INTO `imagenes` VALUES("1855", "assets/archivos/recortadas/a_909f9f.jpg", "56b43d33ab", "0"); 
INSERT INTO `imagenes` VALUES("1856", "assets/archivos/recortadas/a_9a7c56.jpg", "56b43d33ab", "0"); 
INSERT INTO `imagenes` VALUES("1857", "assets/archivos/recortadas/a_1b5350.jpg", "b83b31d422", "0"); 
INSERT INTO `imagenes` VALUES("1858", "assets/archivos/recortadas/a_4b36ec.jpg", "b83b31d422", "0"); 
INSERT INTO `imagenes` VALUES("1859", "assets/archivos/recortadas/a_c66f3a.jpg", "b83b31d422", "0"); 
INSERT INTO `imagenes` VALUES("1860", "assets/archivos/recortadas/a_39bbb3.jpg", "291ae3757c", "0"); 
INSERT INTO `imagenes` VALUES("1861", "assets/archivos/recortadas/a_d2f264.jpg", "291ae3757c", "0"); 
INSERT INTO `imagenes` VALUES("1862", "assets/archivos/recortadas/a_73f7a7.jpg", "291ae3757c", "0"); 
INSERT INTO `imagenes` VALUES("1863", "assets/archivos/recortadas/a_1612fe.jpg", "291ae3757c", "0"); 
INSERT INTO `imagenes` VALUES("1864", "assets/archivos/recortadas/a_fcbd56.jpg", "d7d5275ff0", "0"); 
INSERT INTO `imagenes` VALUES("1865", "assets/archivos/recortadas/a_3e05e6.jpg", "d7d5275ff0", "0"); 
INSERT INTO `imagenes` VALUES("1866", "assets/archivos/recortadas/a_604d18.jpg", "d7d5275ff0", "0"); 
INSERT INTO `imagenes` VALUES("1867", "assets/archivos/recortadas/a_35df0a.jpg", "d7d5275ff0", "0"); 
INSERT INTO `imagenes` VALUES("1868", "assets/archivos/recortadas/a_01f869.jpg", "7b68188753", "0"); 
INSERT INTO `imagenes` VALUES("1869", "assets/archivos/recortadas/a_878c07.jpg", "7b68188753", "0"); 
INSERT INTO `imagenes` VALUES("1870", "assets/archivos/recortadas/a_02b5c4.jpg", "7b68188753", "0"); 
INSERT INTO `imagenes` VALUES("1871", "assets/archivos/recortadas/a_db348a.jpg", "8b7150adf8", "0"); 
INSERT INTO `imagenes` VALUES("1872", "assets/archivos/recortadas/a_9b83a8.jpg", "8b7150adf8", "0"); 
INSERT INTO `imagenes` VALUES("1873", "assets/archivos/recortadas/a_6d953a.jpg", "8b7150adf8", "0"); 
INSERT INTO `imagenes` VALUES("1874", "assets/archivos/recortadas/a_11501e.jpg", "d92850a073", "0"); 
INSERT INTO `imagenes` VALUES("1875", "assets/archivos/recortadas/a_d0f683.jpg", "d92850a073", "0"); 
INSERT INTO `imagenes` VALUES("1876", "assets/archivos/recortadas/a_32c2f3.jpg", "d92850a073", "0"); 
INSERT INTO `imagenes` VALUES("1877", "assets/archivos/recortadas/a_359ccd.jpg", "d92850a073", "0"); 
INSERT INTO `imagenes` VALUES("1878", "assets/archivos/recortadas/a_248091.JPG", "4ef20335a5", "0"); 
INSERT INTO `imagenes` VALUES("1879", "assets/archivos/recortadas/a_b9487e.JPG", "4ef20335a5", "0"); 
INSERT INTO `imagenes` VALUES("1880", "assets/archivos/recortadas/a_b85e0b.JPG", "4ef20335a5", "0"); 
INSERT INTO `imagenes` VALUES("1881", "assets/archivos/recortadas/a_7f12ee.jpg", "4ef20335a5", "0"); 
INSERT INTO `imagenes` VALUES("1882", "assets/archivos/recortadas/a_717bc0.jpg", "aac6b49fb0", "0"); 
INSERT INTO `imagenes` VALUES("1883", "assets/archivos/recortadas/a_1864eb.jpg", "aac6b49fb0", "0"); 
INSERT INTO `imagenes` VALUES("1884", "assets/archivos/recortadas/a_a7e637.jpg", "aac6b49fb0", "0"); 
INSERT INTO `imagenes` VALUES("1885", "assets/archivos/recortadas/a_98fb03.jpg", "aac6b49fb0", "0"); 
INSERT INTO `imagenes` VALUES("1886", "assets/archivos/recortadas/a_15996e.JPG", "9bbdef4e28", "0"); 
INSERT INTO `imagenes` VALUES("1887", "assets/archivos/recortadas/a_b4aa2c.JPG", "9bbdef4e28", "0"); 
INSERT INTO `imagenes` VALUES("1888", "assets/archivos/recortadas/a_3e851a.jpg", "9bbdef4e28", "0"); 
INSERT INTO `imagenes` VALUES("1889", "assets/archivos/recortadas/a_10aa49.jpg", "bc03d6b89b", "0"); 
INSERT INTO `imagenes` VALUES("1890", "assets/archivos/recortadas/a_1d703d.jpg", "bc03d6b89b", "0"); 
INSERT INTO `imagenes` VALUES("1891", "assets/archivos/recortadas/a_53c9ed.jpg", "bc03d6b89b", "0"); 
INSERT INTO `imagenes` VALUES("1892", "assets/archivos/recortadas/a_11870e.jpg", "bc03d6b89b", "0"); 
INSERT INTO `imagenes` VALUES("1893", "assets/archivos/recortadas/a_5565dd.jpg", "61d4a4a07a", "0"); 
INSERT INTO `imagenes` VALUES("1894", "assets/archivos/recortadas/a_41d2f4.jpg", "61d4a4a07a", "0"); 
INSERT INTO `imagenes` VALUES("1895", "assets/archivos/recortadas/a_4206aa.jpg", "5948e638a8", "0"); 
INSERT INTO `imagenes` VALUES("1896", "assets/archivos/recortadas/a_3f6957.JPG", "f0826453f4", "0"); 
INSERT INTO `imagenes` VALUES("1897", "assets/archivos/recortadas/a_a0c7ef.jpg", "f0826453f4", "0"); 
INSERT INTO `imagenes` VALUES("1898", "assets/archivos/recortadas/a_a95d42.jpg", "f0826453f4", "0"); 
INSERT INTO `imagenes` VALUES("1899", "assets/archivos/recortadas/a_8fc747.jpg", "f0826453f4", "0"); 
INSERT INTO `imagenes` VALUES("1900", "assets/archivos/recortadas/a_b2e80a.png", "38c49a0500", "0"); 
INSERT INTO `imagenes` VALUES("1901", "assets/archivos/recortadas/a_2b3cb5.jpg", "38c49a0500", "0"); 
INSERT INTO `imagenes` VALUES("1902", "assets/archivos/recortadas/a_9238be.jpg", "38c49a0500", "0"); 
INSERT INTO `imagenes` VALUES("1903", "assets/archivos/recortadas/a_45b63c.jpg", "38c49a0500", "0"); 
INSERT INTO `imagenes` VALUES("1904", "assets/archivos/recortadas/a_72ac4d.png", "94e19beb12", "0"); 
INSERT INTO `imagenes` VALUES("1905", "assets/archivos/recortadas/a_637921.jpg", "94e19beb12", "0"); 
INSERT INTO `imagenes` VALUES("1906", "assets/archivos/recortadas/a_bce735.jpg", "94e19beb12", "0"); 
INSERT INTO `imagenes` VALUES("1907", "assets/archivos/recortadas/a_7b7620.jpg", "94e19beb12", "0"); 
INSERT INTO `imagenes` VALUES("1908", "assets/archivos/recortadas/a_232dc9.png", "767a5d166c", "0"); 
INSERT INTO `imagenes` VALUES("1909", "assets/archivos/recortadas/a_6af889.jpg", "767a5d166c", "0"); 
INSERT INTO `imagenes` VALUES("1910", "assets/archivos/recortadas/a_dfae35.jpg", "767a5d166c", "0"); 
INSERT INTO `imagenes` VALUES("1911", "assets/archivos/recortadas/a_a0321a.jpg", "767a5d166c", "0"); 
INSERT INTO `imagenes` VALUES("1912", "assets/archivos/recortadas/a_b09f33.jpg", "da15de6357", "0"); 
INSERT INTO `imagenes` VALUES("1913", "assets/archivos/recortadas/a_88aa25.png", "da15de6357", "0"); 
INSERT INTO `imagenes` VALUES("1914", "assets/archivos/recortadas/a_bf713f.jpg", "da15de6357", "0"); 
INSERT INTO `imagenes` VALUES("1915", "assets/archivos/recortadas/a_9fc36a.jpg", "da15de6357", "0"); 
INSERT INTO `imagenes` VALUES("1916", "assets/archivos/recortadas/a_5d27e0.jpg", "a85a2f3deb", "0"); 
INSERT INTO `imagenes` VALUES("1917", "assets/archivos/recortadas/a_0c2f7e.jpg", "a85a2f3deb", "0"); 
INSERT INTO `imagenes` VALUES("1918", "assets/archivos/recortadas/a_8b47b7.jpg", "a85a2f3deb", "0"); 
INSERT INTO `imagenes` VALUES("1919", "assets/archivos/recortadas/a_a517e5.jpg", "a85a2f3deb", "0"); 
INSERT INTO `imagenes` VALUES("1920", "assets/archivos/recortadas/a_37aa15.jpg", "88a1dc9803", "0"); 
INSERT INTO `imagenes` VALUES("1921", "assets/archivos/recortadas/a_6591f5.jpg", "88a1dc9803", "0"); 
INSERT INTO `imagenes` VALUES("1922", "assets/archivos/recortadas/a_7ea5e8.jpg", "88a1dc9803", "0"); 
INSERT INTO `imagenes` VALUES("1923", "assets/archivos/recortadas/a_1f4623.jpg", "88a1dc9803", "0"); 
INSERT INTO `imagenes` VALUES("1924", "assets/archivos/recortadas/a_bd141e.jpg", "cbfbc66475", "0"); 
INSERT INTO `imagenes` VALUES("1925", "assets/archivos/recortadas/a_acb4cd.jpg", "cbfbc66475", "0"); 
INSERT INTO `imagenes` VALUES("1926", "assets/archivos/recortadas/a_9776bd.jpg", "cbfbc66475", "0"); 
INSERT INTO `imagenes` VALUES("1927", "assets/archivos/recortadas/a_246827.jpg", "cbfbc66475", "0"); 
INSERT INTO `imagenes` VALUES("1928", "assets/archivos/recortadas/a_8dec92.jpg", "cbfbc66475", "0"); 
INSERT INTO `imagenes` VALUES("1929", "assets/archivos/recortadas/a_02902c.JPG", "5cd338bca7", "0"); 
INSERT INTO `imagenes` VALUES("1930", "assets/archivos/recortadas/a_df36fd.JPG", "5cd338bca7", "0"); 
INSERT INTO `imagenes` VALUES("1931", "assets/archivos/recortadas/a_0228f5.jpg", "5cd338bca7", "0"); 
INSERT INTO `imagenes` VALUES("1932", "assets/archivos/recortadas/a_f5aedb.JPG", "2d69f7f56e", "0"); 
INSERT INTO `imagenes` VALUES("1933", "assets/archivos/recortadas/a_1b0d64.JPG", "2d69f7f56e", "0"); 
INSERT INTO `imagenes` VALUES("1934", "assets/archivos/recortadas/a_01d290.jpg", "2d69f7f56e", "0"); 
INSERT INTO `imagenes` VALUES("1935", "assets/archivos/recortadas/a_3b9265.JPG", "ceeb7b90b3", "0"); 
INSERT INTO `imagenes` VALUES("1936", "assets/archivos/recortadas/a_be5254.JPG", "ceeb7b90b3", "0"); 
INSERT INTO `imagenes` VALUES("1937", "assets/archivos/recortadas/a_620325.jpg", "ceeb7b90b3", "0"); 
INSERT INTO `imagenes` VALUES("1938", "assets/archivos/recortadas/a_8a5cfa.JPG", "9144489320", "0"); 
INSERT INTO `imagenes` VALUES("1939", "assets/archivos/recortadas/a_eb7f1c.JPG", "9144489320", "0"); 
INSERT INTO `imagenes` VALUES("1940", "assets/archivos/recortadas/a_ed203d.jpg", "9144489320", "0"); 
INSERT INTO `imagenes` VALUES("1941", "assets/archivos/recortadas/a_5f599a.JPG", "6270836294", "0"); 
INSERT INTO `imagenes` VALUES("1942", "assets/archivos/recortadas/a_55ac17.JPG", "6270836294", "0"); 
INSERT INTO `imagenes` VALUES("1943", "assets/archivos/recortadas/a_7473a7.jpg", "6270836294", "0"); 
INSERT INTO `imagenes` VALUES("1944", "assets/archivos/recortadas/a_aebd2f.jpg", "073fe09325", "0"); 
INSERT INTO `imagenes` VALUES("1945", "assets/archivos/recortadas/a_3cb962.jpg", "073fe09325", "0"); 
INSERT INTO `imagenes` VALUES("1946", "assets/archivos/recortadas/a_71b9d6.jpg", "073fe09325", "0"); 
INSERT INTO `imagenes` VALUES("1947", "assets/archivos/recortadas/a_41ba70.jpg", "073fe09325", "0"); 
INSERT INTO `imagenes` VALUES("1948", "assets/archivos/recortadas/a_43dfbe.jpg", "073fe09325", "0"); 
INSERT INTO `imagenes` VALUES("1949", "assets/archivos/recortadas/a_c23d1f.jpg", "31bbb05963", "0"); 
INSERT INTO `imagenes` VALUES("1950", "assets/archivos/recortadas/a_f858b0.jpg", "31bbb05963", "0"); 
INSERT INTO `imagenes` VALUES("1951", "assets/archivos/recortadas/a_25b2b2.jpg", "31bbb05963", "0"); 
INSERT INTO `imagenes` VALUES("1952", "assets/archivos/recortadas/a_9d4ebe.jpg", "31bbb05963", "0"); 
INSERT INTO `imagenes` VALUES("1953", "assets/archivos/recortadas/a_2bd4da.jpg", "31bbb05963", "0"); 
INSERT INTO `imagenes` VALUES("1954", "assets/archivos/recortadas/a_59bdce.JPG", "6c2e6d67c8", "0"); 
INSERT INTO `imagenes` VALUES("1955", "assets/archivos/recortadas/a_d08ef4.JPG", "6c2e6d67c8", "0"); 
INSERT INTO `imagenes` VALUES("1956", "assets/archivos/recortadas/a_1fddc5.JPG", "6c2e6d67c8", "0"); 
INSERT INTO `imagenes` VALUES("1957", "assets/archivos/recortadas/a_686056.JPG", "6c2e6d67c8", "0"); 
INSERT INTO `imagenes` VALUES("1958", "assets/archivos/recortadas/a_0d94b4.jpg", "6c2e6d67c8", "0"); 
INSERT INTO `imagenes` VALUES("1959", "assets/archivos/recortadas/a_d6c659.jpg", "c4df4f8666", "0"); 
INSERT INTO `imagenes` VALUES("1960", "assets/archivos/recortadas/a_65be24.jpg", "c4df4f8666", "0"); 
INSERT INTO `imagenes` VALUES("1961", "assets/archivos/recortadas/a_750e93.jpg", "c4df4f8666", "0"); 
INSERT INTO `imagenes` VALUES("1962", "assets/archivos/recortadas/a_3a0460.jpg", "fe7298c021", "0"); 
INSERT INTO `imagenes` VALUES("1963", "assets/archivos/recortadas/a_283c0c.jpg", "fe7298c021", "0"); 
INSERT INTO `imagenes` VALUES("1964", "assets/archivos/recortadas/a_767ad9.jpg", "fe7298c021", "0"); 
INSERT INTO `imagenes` VALUES("1965", "assets/archivos/recortadas/a_feefd7.jpg", "adf9be6b89", "0"); 
INSERT INTO `imagenes` VALUES("1966", "assets/archivos/recortadas/a_93b713.jpg", "adf9be6b89", "0"); 
INSERT INTO `imagenes` VALUES("1967", "assets/archivos/recortadas/a_dcb7e7.jpg", "adf9be6b89", "0"); 
INSERT INTO `imagenes` VALUES("1968", "assets/archivos/recortadas/a_35980e.jpg", "adf9be6b89", "0"); 
INSERT INTO `imagenes` VALUES("1969", "assets/archivos/recortadas/a_f8275e.jpg", "adf9be6b89", "0"); 
INSERT INTO `imagenes` VALUES("1970", "assets/archivos/recortadas/a_cb6db7.png", "55025cba1c", "0"); 
INSERT INTO `imagenes` VALUES("1971", "assets/archivos/recortadas/a_e10c8f.jpg", "55025cba1c", "0"); 
INSERT INTO `imagenes` VALUES("1972", "assets/archivos/recortadas/a_abd290.jpg", "55025cba1c", "0"); 
INSERT INTO `imagenes` VALUES("1973", "assets/archivos/recortadas/a_a521d5.jpg", "55025cba1c", "0"); 
INSERT INTO `imagenes` VALUES("1974", "assets/archivos/recortadas/a_c4d051.jpg", "55025cba1c", "0"); 
INSERT INTO `imagenes` VALUES("1975", "assets/archivos/recortadas/a_33318d.jpg", "947ccb67b0", "0"); 
INSERT INTO `imagenes` VALUES("1976", "assets/archivos/recortadas/a_3314d5.jpg", "947ccb67b0", "0"); 
INSERT INTO `imagenes` VALUES("1977", "assets/archivos/recortadas/a_5ed689.jpg", "947ccb67b0", "0"); 
INSERT INTO `imagenes` VALUES("1978", "assets/archivos/recortadas/a_004d64.jpg", "947ccb67b0", "0"); 
INSERT INTO `imagenes` VALUES("1979", "assets/archivos/recortadas/a_f9cd3a.jpg", "bedb9a905d", "0"); 
INSERT INTO `imagenes` VALUES("1980", "assets/archivos/recortadas/a_56176d.jpg", "bedb9a905d", "0"); 
INSERT INTO `imagenes` VALUES("1981", "assets/archivos/recortadas/a_3ba769.jpg", "bedb9a905d", "0"); 
INSERT INTO `imagenes` VALUES("1982", "assets/archivos/recortadas/a_cf1c69.jpg", "bedb9a905d", "0"); 
INSERT INTO `imagenes` VALUES("1983", "assets/archivos/recortadas/a_236d57.php", "bedb9a905d", "0"); 
INSERT INTO `imagenes` VALUES("1984", "assets/archivos/recortadas/a_f765ff.JPG", "3d68e06273", "0"); 
INSERT INTO `imagenes` VALUES("1985", "assets/archivos/recortadas/a_529f7a.jpg", "3d68e06273", "0"); 
INSERT INTO `imagenes` VALUES("1986", "assets/archivos/recortadas/a_823d30.jpg", "3d68e06273", "0"); 
INSERT INTO `imagenes` VALUES("1987", "assets/archivos/recortadas/a_5897d1.jpg", "3d68e06273", "0"); 
INSERT INTO `imagenes` VALUES("1988", "assets/archivos/recortadas/a_5f211c.jpg", "3d68e06273", "0"); 
INSERT INTO `imagenes` VALUES("1989", "assets/archivos/recortadas/a_6f587b.JPG", "0eb6d0d328", "0"); 
INSERT INTO `imagenes` VALUES("1990", "assets/archivos/recortadas/a_1103bc.jpg", "0eb6d0d328", "0"); 
INSERT INTO `imagenes` VALUES("1991", "assets/archivos/recortadas/a_2ad34e.jpg", "0eb6d0d328", "0"); 
INSERT INTO `imagenes` VALUES("1992", "assets/archivos/recortadas/a_22d8f0.jpg", "0eb6d0d328", "0"); 
INSERT INTO `imagenes` VALUES("1993", "assets/archivos/recortadas/a_bd8c81.jpg", "0eb6d0d328", "0"); 
INSERT INTO `imagenes` VALUES("1994", "assets/archivos/recortadas/a_71e77e.jpg", "695e4f0dfc", "0"); 
INSERT INTO `imagenes` VALUES("1995", "assets/archivos/recortadas/a_acfff8.jpg", "695e4f0dfc", "0"); 
INSERT INTO `imagenes` VALUES("1996", "assets/archivos/recortadas/a_06c3a0.-min", "695e4f0dfc", "0"); 
INSERT INTO `imagenes` VALUES("1997", "assets/archivos/recortadas/a_1d977d.jpg", "695e4f0dfc", "0"); 
INSERT INTO `imagenes` VALUES("1998", "assets/archivos/recortadas/a_d3cd8f.jpg", "695e4f0dfc", "0"); 
INSERT INTO `imagenes` VALUES("1999", "assets/archivos/recortadas/a_829f06.jpg", "18cc36f913", "0"); 
INSERT INTO `imagenes` VALUES("2000", "assets/archivos/recortadas/a_3d7e4a.jpg", "18cc36f913", "0"); 
INSERT INTO `imagenes` VALUES("2001", "assets/archivos/recortadas/a_bd8a87.-min", "18cc36f913", "0"); 
INSERT INTO `imagenes` VALUES("2002", "assets/archivos/recortadas/a_2386ac.jpg", "18cc36f913", "0"); 
INSERT INTO `imagenes` VALUES("2003", "assets/archivos/recortadas/a_144e61.jpg", "18cc36f913", "0"); 
INSERT INTO `imagenes` VALUES("2004", "assets/archivos/recortadas/a_aab865.jpg", "4ed22a6a00", "0"); 
INSERT INTO `imagenes` VALUES("2005", "assets/archivos/recortadas/a_79a7bb.jpg", "4ed22a6a00", "0"); 
INSERT INTO `imagenes` VALUES("2006", "assets/archivos/recortadas/a_f57a93.jpg", "4ed22a6a00", "0"); 
INSERT INTO `imagenes` VALUES("2007", "assets/archivos/recortadas/a_a8fc75.jpg", "3a6e31565e", "0"); 
INSERT INTO `imagenes` VALUES("2008", "assets/archivos/recortadas/a_ec2b02.jpg", "3a6e31565e", "0"); 
INSERT INTO `imagenes` VALUES("2009", "assets/archivos/recortadas/a_4c326c.jpg", "3a6e31565e", "0"); 
INSERT INTO `imagenes` VALUES("2010", "assets/archivos/recortadas/a_dcdafe.jpg", "1711508c72", "0"); 
INSERT INTO `imagenes` VALUES("2011", "assets/archivos/recortadas/a_825209.JPG", "1711508c72", "0"); 
INSERT INTO `imagenes` VALUES("2012", "assets/archivos/recortadas/a_83cf4a.JPG", "1711508c72", "0"); 
INSERT INTO `imagenes` VALUES("2013", "assets/archivos/recortadas/a_17e4a0.jpg", "a78d568e5e", "0"); 
INSERT INTO `imagenes` VALUES("2014", "assets/archivos/recortadas/a_7a68e4.jpg", "a78d568e5e", "0"); 
INSERT INTO `imagenes` VALUES("2015", "assets/archivos/recortadas/a_ee28b4.jpg", "a78d568e5e", "0"); 
INSERT INTO `imagenes` VALUES("2016", "assets/archivos/recortadas/a_62baeb.jpg", "a78d568e5e", "0"); 
INSERT INTO `imagenes` VALUES("2017", "assets/archivos/recortadas/a_9b9b3a.jpg", "9a9da91373", "0"); 
INSERT INTO `imagenes` VALUES("2018", "assets/archivos/recortadas/a_6bf280.jpg", "9a9da91373", "0"); 
INSERT INTO `imagenes` VALUES("2019", "assets/archivos/recortadas/a_7250e6.jpg", "9a9da91373", "0"); 
INSERT INTO `imagenes` VALUES("2020", "assets/archivos/recortadas/a_dc6690.jpg", "9a9da91373", "0"); 
INSERT INTO `imagenes` VALUES("2021", "assets/archivos/recortadas/a_1bad71.jpg", "f003b53cfc", "0"); 
INSERT INTO `imagenes` VALUES("2022", "assets/archivos/recortadas/a_3ad264.jpg", "f003b53cfc", "0"); 
INSERT INTO `imagenes` VALUES("2023", "assets/archivos/recortadas/a_443b63.jpg", "f003b53cfc", "0"); 
INSERT INTO `imagenes` VALUES("2024", "assets/archivos/recortadas/a_1850dd.jpg", "f5b6ff51ae", "0"); 
INSERT INTO `imagenes` VALUES("2025", "assets/archivos/recortadas/a_4ca646.jpg", "f5b6ff51ae", "0"); 
INSERT INTO `imagenes` VALUES("2026", "assets/archivos/recortadas/a_b1bc2a.jpg", "f5b6ff51ae", "0"); 
INSERT INTO `imagenes` VALUES("2027", "assets/archivos/recortadas/a_bda224.jpg", "f5b6ff51ae", "0"); 
INSERT INTO `imagenes` VALUES("2028", "assets/archivos/recortadas/a_c2f00d.jpg", "f5b6ff51ae", "0"); 
INSERT INTO `imagenes` VALUES("2029", "assets/archivos/recortadas/a_03f7bd.jpg", "7e47e584a8", "0"); 
INSERT INTO `imagenes` VALUES("2030", "assets/archivos/recortadas/a_b3cd29.jpg", "7e47e584a8", "0"); 
INSERT INTO `imagenes` VALUES("2031", "assets/archivos/recortadas/a_19ca45.jpg", "7e47e584a8", "0"); 
INSERT INTO `imagenes` VALUES("2032", "assets/archivos/recortadas/a_bc3b4b.jpg", "7e47e584a8", "0"); 
INSERT INTO `imagenes` VALUES("2033", "assets/archivos/recortadas/a_17e83e.jpg", "7e47e584a8", "0"); 
INSERT INTO `imagenes` VALUES("2034", "assets/archivos/recortadas/a_a8b81f.jpg", "3ca477166f", "0"); 
INSERT INTO `imagenes` VALUES("2035", "assets/archivos/recortadas/a_f7317b.jpg", "3ca477166f", "0"); 
INSERT INTO `imagenes` VALUES("2036", "assets/archivos/recortadas/a_489e35.jpg", "3ca477166f", "0"); 
INSERT INTO `imagenes` VALUES("2037", "assets/archivos/recortadas/a_bb42b7.jpg", "3ca477166f", "0"); 
INSERT INTO `imagenes` VALUES("2038", "assets/archivos/recortadas/a_9c8442.jpg", "3ca477166f", "0"); 
INSERT INTO `imagenes` VALUES("2039", "assets/archivos/recortadas/a_ee2417.jpg", "fbcdb27b20", "0"); 
INSERT INTO `imagenes` VALUES("2040", "assets/archivos/recortadas/a_449aa5.jpg", "fbcdb27b20", "0"); 
INSERT INTO `imagenes` VALUES("2041", "assets/archivos/recortadas/a_b7be09.jpg", "fbcdb27b20", "0"); 
INSERT INTO `imagenes` VALUES("2042", "assets/archivos/recortadas/a_8f3433.jpg", "fbcdb27b20", "0"); 
INSERT INTO `imagenes` VALUES("2043", "assets/archivos/recortadas/a_ca24e1.jpg", "fbcdb27b20", "0"); 
INSERT INTO `imagenes` VALUES("2044", "assets/archivos/recortadas/a_aada8e.jpg", "4bab61030d", "0"); 
INSERT INTO `imagenes` VALUES("2045", "assets/archivos/recortadas/a_6483e7.jpg", "4bab61030d", "0"); 
INSERT INTO `imagenes` VALUES("2046", "assets/archivos/recortadas/a_837bd4.jpg", "4bab61030d", "0"); 
INSERT INTO `imagenes` VALUES("2047", "assets/archivos/recortadas/a_38ad69.jpg", "4bab61030d", "0"); 
INSERT INTO `imagenes` VALUES("2048", "assets/archivos/recortadas/a_fe3c27.jpg", "4bab61030d", "0"); 
INSERT INTO `imagenes` VALUES("2049", "assets/archivos/recortadas/a_7bbd2a.jpg", "033c358489", "0"); 
INSERT INTO `imagenes` VALUES("2050", "assets/archivos/recortadas/a_87bf27.jpg", "033c358489", "0"); 
INSERT INTO `imagenes` VALUES("2051", "assets/archivos/recortadas/a_76ceb1.jpg", "2f43c03334", "0"); 
INSERT INTO `imagenes` VALUES("2052", "assets/archivos/recortadas/a_28ebc2.JPG", "9f021f347c", "0"); 
INSERT INTO `imagenes` VALUES("2053", "assets/archivos/recortadas/a_d809cd.JPG", "9f021f347c", "0"); 
INSERT INTO `imagenes` VALUES("2054", "assets/archivos/recortadas/a_1441c0.jpg", "9f021f347c", "0"); 
INSERT INTO `imagenes` VALUES("2055", "assets/archivos/recortadas/a_a66905.jpg", "9f021f347c", "0"); 
INSERT INTO `imagenes` VALUES("2056", "assets/archivos/recortadas/a_87623e.php", "9f021f347c", "0"); 
INSERT INTO `imagenes` VALUES("2057", "assets/archivos/recortadas/a_143215.jpg", "fe0634365c", "0"); 
INSERT INTO `imagenes` VALUES("2058", "assets/archivos/recortadas/a_0ea365.jpg", "fe0634365c", "0"); 
INSERT INTO `imagenes` VALUES("2059", "assets/archivos/recortadas/a_a226da.jpg", "f6b7177fe0", "0"); 
INSERT INTO `imagenes` VALUES("2060", "assets/archivos/recortadas/a_7aaafe.jpg", "f6b7177fe0", "0"); 
INSERT INTO `imagenes` VALUES("2061", "assets/archivos/recortadas/a_71620d.jpg", "f6b7177fe0", "0"); 
INSERT INTO `imagenes` VALUES("2062", "assets/archivos/recortadas/a_f99ae8.png", "f6b7177fe0", "0"); 
INSERT INTO `imagenes` VALUES("2063", "assets/archivos/recortadas/a_6a9875.jpg", "f6b7177fe0", "0"); 
INSERT INTO `imagenes` VALUES("2064", "assets/archivos/recortadas/a_7b688c.jpg", "0e6ee7e3bb", "0"); 
INSERT INTO `imagenes` VALUES("2065", "assets/archivos/recortadas/a_5b9ef2.jpg", "0e6ee7e3bb", "0"); 
INSERT INTO `imagenes` VALUES("2066", "assets/archivos/recortadas/a_3013d5.jpg", "0e6ee7e3bb", "0"); 
INSERT INTO `imagenes` VALUES("2067", "assets/archivos/recortadas/a_daa1e0.jpg", "b154c8ad1e", "0"); 
INSERT INTO `imagenes` VALUES("2068", "assets/archivos/recortadas/a_7f16dd.jpg", "b154c8ad1e", "0"); 
INSERT INTO `imagenes` VALUES("2069", "assets/archivos/recortadas/a_527032.jpg", "b154c8ad1e", "0"); 
INSERT INTO `imagenes` VALUES("2070", "assets/archivos/recortadas/a_9fe5c0.jpg", "b154c8ad1e", "0"); 
INSERT INTO `imagenes` VALUES("2071", "assets/archivos/recortadas/a_ff83cd.jpg", "08088eae14", "0"); 
INSERT INTO `imagenes` VALUES("2072", "assets/archivos/recortadas/a_7b1d49.jpg", "08088eae14", "0"); 
INSERT INTO `imagenes` VALUES("2073", "assets/archivos/recortadas/a_b3c35f.jpg", "08088eae14", "0"); 
INSERT INTO `imagenes` VALUES("2074", "assets/archivos/recortadas/a_9537a5.jpg", "08088eae14", "0"); 
INSERT INTO `imagenes` VALUES("2075", "assets/archivos/recortadas/a_f75e8c.jpg", "23939dc05c", "0"); 
INSERT INTO `imagenes` VALUES("2076", "assets/archivos/recortadas/a_42485b.jpg", "23939dc05c", "0"); 
INSERT INTO `imagenes` VALUES("2077", "assets/archivos/recortadas/a_63370f.jpg", "548ac35e04", "0"); 
INSERT INTO `imagenes` VALUES("2078", "assets/archivos/recortadas/a_faeecc.jpg", "afd4a8070a", "0"); 
INSERT INTO `imagenes` VALUES("2079", "assets/archivos/recortadas/a_f506f1.jpg", "5c99a65d71", "0"); 
INSERT INTO `imagenes` VALUES("2080", "assets/archivos/recortadas/a_47454d.jpg", "5c99a65d71", "0"); 
INSERT INTO `imagenes` VALUES("2081", "assets/archivos/recortadas/a_2b4ae5.jpg", "5c99a65d71", "0"); 
INSERT INTO `imagenes` VALUES("2082", "assets/archivos/recortadas/a_8a7ee0.jpg", "16e859e563", "0"); 
INSERT INTO `imagenes` VALUES("2083", "assets/archivos/recortadas/a_7b8c4c.jpg", "16e859e563", "0"); 
INSERT INTO `imagenes` VALUES("2084", "assets/archivos/recortadas/a_f82efe.jpg", "55b49e2c91", "0"); 
INSERT INTO `imagenes` VALUES("2085", "assets/archivos/recortadas/a_ab195f.jpg", "55b49e2c91", "0"); 
INSERT INTO `imagenes` VALUES("2086", "assets/archivos/recortadas/a_b15beb.jpg", "27dda25267", "0"); 
INSERT INTO `imagenes` VALUES("2087", "assets/archivos/recortadas/a_379d73.jpg", "27dda25267", "0"); 
INSERT INTO `imagenes` VALUES("2088", "assets/archivos/recortadas/a_6bf968.png", "839d6e7f10", "0"); 
INSERT INTO `imagenes` VALUES("2089", "assets/archivos/recortadas/a_bfc7a2.jpg", "839d6e7f10", "0"); 
INSERT INTO `imagenes` VALUES("2090", "assets/archivos/recortadas/a_8f31c7.png", "839d6e7f10", "0"); 
INSERT INTO `imagenes` VALUES("2091", "assets/archivos/recortadas/a_787172.png", "36f1978573", "0"); 
INSERT INTO `imagenes` VALUES("2092", "assets/archivos/recortadas/a_f03b79.jpg", "36f1978573", "0"); 
INSERT INTO `imagenes` VALUES("2093", "assets/archivos/recortadas/a_4536cb.png", "36f1978573", "0"); 
INSERT INTO `imagenes` VALUES("2094", "assets/archivos/recortadas/a_a4dec0.png", "c83b5d3f91", "0"); 
INSERT INTO `imagenes` VALUES("2095", "assets/archivos/recortadas/a_eb5f0c.png", "c83b5d3f91", "0"); 
INSERT INTO `imagenes` VALUES("2096", "assets/archivos/recortadas/a_cb8061.jpg", "c83b5d3f91", "0"); 
INSERT INTO `imagenes` VALUES("2097", "assets/archivos/recortadas/a_9163bc.png", "c83b5d3f91", "0"); 
INSERT INTO `imagenes` VALUES("2098", "assets/archivos/recortadas/a_e04526.png", "1603ac6676", "0"); 
INSERT INTO `imagenes` VALUES("2099", "assets/archivos/recortadas/a_9eaa1b.jpg", "1603ac6676", "0"); 
INSERT INTO `imagenes` VALUES("2100", "assets/archivos/recortadas/a_5935dc.jpg", "1603ac6676", "0"); 
INSERT INTO `imagenes` VALUES("2101", "assets/archivos/recortadas/a_0efa79.jpg", "1603ac6676", "0"); 
INSERT INTO `imagenes` VALUES("2102", "assets/archivos/recortadas/a_88d1f9.png", "1603ac6676", "0"); 
INSERT INTO `imagenes` VALUES("2103", "assets/archivos/recortadas/a_f1649e.png", "b6cd81c0ff", "0"); 
INSERT INTO `imagenes` VALUES("2104", "assets/archivos/recortadas/a_d4d729.jpg", "b6cd81c0ff", "0"); 
INSERT INTO `imagenes` VALUES("2105", "assets/archivos/recortadas/a_23d7a6.jpg", "b6cd81c0ff", "0"); 
INSERT INTO `imagenes` VALUES("2106", "assets/archivos/recortadas/a_62b617.jpg", "b6cd81c0ff", "0"); 
INSERT INTO `imagenes` VALUES("2107", "assets/archivos/recortadas/a_ad51ea.png", "b6cd81c0ff", "0"); 
INSERT INTO `imagenes` VALUES("2108", "assets/archivos/recortadas/a_81ab95.png", "2a7e6d26da", "0"); 
INSERT INTO `imagenes` VALUES("2109", "assets/archivos/recortadas/a_355c3c.jpg", "2a7e6d26da", "0"); 
INSERT INTO `imagenes` VALUES("2110", "assets/archivos/recortadas/a_b8c322.jpg", "2a7e6d26da", "0"); 
INSERT INTO `imagenes` VALUES("2111", "assets/archivos/recortadas/a_797daf.jpg", "2a7e6d26da", "0"); 
INSERT INTO `imagenes` VALUES("2112", "assets/archivos/recortadas/a_b4a02b.png", "2a7e6d26da", "0"); 
INSERT INTO `imagenes` VALUES("2113", "assets/archivos/recortadas/a_14e64b.jpg", "50b211e60c", "0"); 
INSERT INTO `imagenes` VALUES("2114", "assets/archivos/recortadas/a_f7a1f7.jpg", "50b211e60c", "0"); 
INSERT INTO `imagenes` VALUES("2115", "assets/archivos/recortadas/a_456c91.jpg", "50b211e60c", "0"); 
INSERT INTO `imagenes` VALUES("2116", "assets/archivos/recortadas/a_5922f7.jpg", "50b211e60c", "0"); 
INSERT INTO `imagenes` VALUES("2117", "assets/archivos/recortadas/a_086c6e.jpg", "50b211e60c", "0"); 
INSERT INTO `imagenes` VALUES("2118", "assets/archivos/recortadas/a_0b9e57.jpg", "4770bb7401", "0"); 
INSERT INTO `imagenes` VALUES("2119", "assets/archivos/recortadas/a_49e632.jpg", "4770bb7401", "0"); 
INSERT INTO `imagenes` VALUES("2120", "assets/archivos/recortadas/a_fbd1bb.jpg", "4770bb7401", "0"); 
INSERT INTO `imagenes` VALUES("2121", "assets/archivos/recortadas/a_eb8971.png", "4770bb7401", "0"); 
INSERT INTO `imagenes` VALUES("2122", "assets/archivos/recortadas/a_c6753b.jpg", "4770bb7401", "0"); 
INSERT INTO `imagenes` VALUES("2123", "assets/archivos/recortadas/a_91644d.jpg", "e17d2d527f", "0"); 
INSERT INTO `imagenes` VALUES("2124", "assets/archivos/recortadas/a_5f9544.jpg", "e17d2d527f", "0"); 
INSERT INTO `imagenes` VALUES("2125", "assets/archivos/recortadas/a_5d6c00.jpg", "e17d2d527f", "0"); 
INSERT INTO `imagenes` VALUES("2126", "assets/archivos/recortadas/a_eaf672.png", "e17d2d527f", "0"); 
INSERT INTO `imagenes` VALUES("2127", "assets/archivos/recortadas/a_8ae81c.jpg", "e17d2d527f", "0"); 
INSERT INTO `imagenes` VALUES("2128", "assets/archivos/recortadas/a_7fe6cf.png", "d69883cc81", "0"); 
INSERT INTO `imagenes` VALUES("2129", "assets/archivos/recortadas/a_12d1bf.jpg", "d69883cc81", "0"); 
INSERT INTO `imagenes` VALUES("2130", "assets/archivos/recortadas/a_b81b7f.png", "d69883cc81", "0"); 
INSERT INTO `imagenes` VALUES("2131", "assets/archivos/recortadas/a_ca9c33.png", "0436a7446d", "0"); 
INSERT INTO `imagenes` VALUES("2132", "assets/archivos/recortadas/a_a666fb.png", "0436a7446d", "0"); 
INSERT INTO `imagenes` VALUES("2133", "assets/archivos/recortadas/a_378355.jpg", "0436a7446d", "0"); 
INSERT INTO `imagenes` VALUES("2134", "assets/archivos/recortadas/a_64d1d7.png", "0436a7446d", "0"); 
INSERT INTO `imagenes` VALUES("2135", "assets/archivos/recortadas/a_f1ba96.png", "52d6ed5c71", "0"); 
INSERT INTO `imagenes` VALUES("2136", "assets/archivos/recortadas/a_514a4a.png", "52d6ed5c71", "0"); 
INSERT INTO `imagenes` VALUES("2137", "assets/archivos/recortadas/a_5f7eff.jpg", "52d6ed5c71", "0"); 
INSERT INTO `imagenes` VALUES("2138", "assets/archivos/recortadas/a_530b63.png", "52d6ed5c71", "0"); 
INSERT INTO `imagenes` VALUES("2139", "assets/archivos/recortadas/a_3bfbb4.png", "8d31838006", "0"); 
INSERT INTO `imagenes` VALUES("2140", "assets/archivos/recortadas/a_451e12.png", "8d31838006", "0"); 
INSERT INTO `imagenes` VALUES("2141", "assets/archivos/recortadas/a_788f5a.jpg", "8d31838006", "0"); 
INSERT INTO `imagenes` VALUES("2142", "assets/archivos/recortadas/a_ebd90b.png", "8d31838006", "0"); 
INSERT INTO `imagenes` VALUES("2143", "assets/archivos/recortadas/a_310031.png", "853f1506f7", "0"); 
INSERT INTO `imagenes` VALUES("2144", "assets/archivos/recortadas/a_b0548a.png", "853f1506f7", "0"); 
INSERT INTO `imagenes` VALUES("2145", "assets/archivos/recortadas/a_cfa531.jpg", "853f1506f7", "0"); 
INSERT INTO `imagenes` VALUES("2146", "assets/archivos/recortadas/a_20221f.png", "853f1506f7", "0"); 
INSERT INTO `imagenes` VALUES("2147", "assets/archivos/recortadas/a_a3ac6b.png", "5c27afc5de", "0"); 
INSERT INTO `imagenes` VALUES("2148", "assets/archivos/recortadas/a_af651a.jpg", "5c27afc5de", "0"); 
INSERT INTO `imagenes` VALUES("2149", "assets/archivos/recortadas/a_5e2fb0.jpg", "5c27afc5de", "0"); 
INSERT INTO `imagenes` VALUES("2150", "assets/archivos/recortadas/a_4e12b3.jpg", "5c27afc5de", "0"); 
INSERT INTO `imagenes` VALUES("2151", "assets/archivos/recortadas/a_bbf8c5.jpg", "5c27afc5de", "0"); 
INSERT INTO `imagenes` VALUES("2152", "assets/archivos/recortadas/a_caaa45.png", "79758a5c5f", "0"); 
INSERT INTO `imagenes` VALUES("2153", "assets/archivos/recortadas/a_1a132b.jpg", "79758a5c5f", "0"); 
INSERT INTO `imagenes` VALUES("2154", "assets/archivos/recortadas/a_fdbbe7.jpg", "79758a5c5f", "0"); 
INSERT INTO `imagenes` VALUES("2155", "assets/archivos/recortadas/a_66434f.jpg", "79758a5c5f", "0"); 
INSERT INTO `imagenes` VALUES("2156", "assets/archivos/recortadas/a_33efcc.jpg", "79758a5c5f", "0"); 
INSERT INTO `imagenes` VALUES("2157", "assets/archivos/recortadas/a_5eed28.jpg", "5bd25f29a0", "0"); 
INSERT INTO `imagenes` VALUES("2158", "assets/archivos/recortadas/a_bb17d6.png", "5bd25f29a0", "0"); 
INSERT INTO `imagenes` VALUES("2159", "assets/archivos/recortadas/a_279d1d.jpg", "5bd25f29a0", "0"); 
INSERT INTO `imagenes` VALUES("2160", "assets/archivos/recortadas/a_066187.jpg", "5bd25f29a0", "0"); 
INSERT INTO `imagenes` VALUES("2161", "assets/archivos/recortadas/a_c274dc.jpg", "5bd25f29a0", "0"); 
INSERT INTO `imagenes` VALUES("2162", "assets/archivos/recortadas/a_a7aacf.jpg", "87db7eea3e", "0"); 
INSERT INTO `imagenes` VALUES("2163", "assets/archivos/recortadas/a_d902b3.png", "87db7eea3e", "0"); 
INSERT INTO `imagenes` VALUES("2164", "assets/archivos/recortadas/a_24d2cd.jpg", "87db7eea3e", "0"); 
INSERT INTO `imagenes` VALUES("2165", "assets/archivos/recortadas/a_493f0f.jpg", "87db7eea3e", "0"); 
INSERT INTO `imagenes` VALUES("2166", "assets/archivos/recortadas/a_27dde2.jpg", "87db7eea3e", "0"); 
INSERT INTO `imagenes` VALUES("2167", "assets/archivos/recortadas/a_013589.png", "9a47d49146", "0"); 
INSERT INTO `imagenes` VALUES("2168", "assets/archivos/recortadas/a_d48a35.07", "9a47d49146", "0"); 
INSERT INTO `imagenes` VALUES("2169", "assets/archivos/banner/21bb9085e3.jpg", "4b410b25bd", "0"); 
INSERT INTO `imagenes` VALUES("2170", "assets/archivos/recortadas/a_1912fae37d.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2171", "assets/archivos/recortadas/a_b66026ef8b.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2172", "assets/archivos/recortadas/a_c2c9e1f253.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2173", "assets/archivos/recortadas/a_ae9e202b17.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2175", "assets/archivos/recortadas/a_312817478d.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2176", "assets/archivos/recortadas/a_78681a01f1.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2177", "assets/archivos/recortadas/a_db866c754f.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2178", "assets/archivos/recortadas/a_50817b0e3c.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2179", "assets/archivos/recortadas/a_f08db44f30.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2180", "assets/archivos/recortadas/a_4e08b4d66a.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2181", "assets/archivos/recortadas/a_90fff63031.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2183", "assets/archivos/recortadas/a_bcc46c8b04.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2184", "assets/archivos/recortadas/a_adb5089287.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2185", "assets/archivos/recortadas/a_10241342da.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2186", "assets/archivos/recortadas/a_4b352e7572.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2187", "assets/archivos/recortadas/a_e3198ddb6c.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2188", "assets/archivos/recortadas/a_7bd242ddfb.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2189", "assets/archivos/recortadas/a_d3b6906f3a.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2190", "assets/archivos/recortadas/a_2b3eb74c6d.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2191", "assets/archivos/recortadas/a_2c65f700f2.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2192", "assets/archivos/recortadas/a_99454c81aa.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2193", "assets/archivos/recortadas/a_b073e68f68.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2194", "assets/archivos/recortadas/a_d059a519ba.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2195", "assets/archivos/recortadas/a_fdb609bb3c.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2196", "assets/archivos/recortadas/a_cb696e439a.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2197", "assets/archivos/recortadas/a_c7b08c9fce.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2198", "assets/archivos/recortadas/a_4de2243f80.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2199", "assets/archivos/recortadas/a_40f336d415.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2200", "assets/archivos/recortadas/a_fdba6547de.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2201", "assets/archivos/recortadas/a_973f479564.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2202", "assets/archivos/recortadas/a_2c5ad2ac68.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2203", "assets/archivos/recortadas/a_49e0a4ede0.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2204", "assets/archivos/recortadas/a_d9abbe9c4c.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2206", "assets/archivos/recortadas/a_7406f8caaa.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2207", "assets/archivos/recortadas/a_40ba29dae3.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2208", "assets/archivos/recortadas/a_74b3d437aa.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2209", "assets/archivos/recortadas/a_5824853cff.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2210", "assets/archivos/recortadas/a_f9364e6a4b.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2211", "assets/archivos/recortadas/a_c620639b88.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2212", "assets/archivos/recortadas/a_9ec0f79826.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2213", "assets/archivos/recortadas/a_4b24ed9af6.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2214", "assets/archivos/recortadas/a_31c6b10e8e.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2215", "assets/archivos/recortadas/a_8c8a0968d8.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2216", "assets/archivos/recortadas/a_7908fec801.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2217", "assets/archivos/recortadas/a_47237e4aa1.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2218", "assets/archivos/recortadas/a_6fd6089747.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2219", "assets/archivos/recortadas/a_6c266afa43.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2220", "assets/archivos/recortadas/a_5d2d6742a8.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2221", "assets/archivos/recortadas/a_93cfec8cae.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2222", "assets/archivos/recortadas/a_22ade0b7ad.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2223", "assets/archivos/recortadas/a_e524a6cc7d.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2224", "assets/archivos/recortadas/a_a8e36ed323.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2225", "assets/archivos/recortadas/a_5777360414.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2226", "assets/archivos/recortadas/a_4cf74a3713.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2227", "assets/archivos/recortadas/a_ba8c4bc6d1.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2228", "assets/archivos/recortadas/a_42869bf348.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2229", "assets/archivos/recortadas/a_31ce6dc2ef.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2230", "assets/archivos/recortadas/a_bb80755e5d.png", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2231", "assets/archivos/recortadas/a_a5fd7e5bc0.jpg", "2f630e911f", "0"); 
INSERT INTO `imagenes` VALUES("2234", "assets/archivos/recortadas/a_be7469dd75.jpeg", "e0b7bfd717", "0"); 
INSERT INTO `imagenes` VALUES("2235", "assets/archivos/recortadas/a_c9e8b2cce4.jpg", "05c3cd7fa9", "0"); 
INSERT INTO `imagenes` VALUES("2236", "assets/archivos/recortadas/a_5e6ed9e577.jpg", "d636fbe0cd", "0"); 
INSERT INTO `imagenes` VALUES("2237", "assets/archivos/recortadas/a_1b426d7444.jpg", "2d35edcced", "0"); 
INSERT INTO `imagenes` VALUES("2238", "assets/archivos/recortadas/a_93f0e58762.jpg", "bd4c733dae", "0"); 
INSERT INTO `imagenes` VALUES("2239", "assets/archivos/recortadas/a_b5ba739672.jpg", "089de09b7d", "0"); 
INSERT INTO `imagenes` VALUES("2240", "assets/archivos/recortadas/a_a8ae22d4d0.jpg", "2eda646ec4", "0"); 
INSERT INTO `imagenes` VALUES("2241", "assets/archivos/recortadas/a_49e4724609.jpg", "148757bcd5", "0"); 
INSERT INTO `imagenes` VALUES("2242", "assets/archivos/recortadas/a_0156f6e289.jpg", "877aca6998", "0"); 
INSERT INTO `imagenes` VALUES("2243", "assets/archivos/recortadas/a_bd9aa93616.jpg", "1e45a1c68d", "0"); 
INSERT INTO `imagenes` VALUES("2244", "assets/archivos/recortadas/a_ecf9f596e9.jpg", "10db16a27c", "0"); 
INSERT INTO `imagenes` VALUES("2245", "assets/archivos/recortadas/a_b94952dc63.jpg", "0d429c25fc", "0"); 
INSERT INTO `imagenes` VALUES("2246", "assets/archivos/recortadas/a_814612d986.jpeg", "652a20fcf2", "0"); 
INSERT INTO `imagenes` VALUES("2247", "assets/archivos/recortadas/a_fe4d81e3ef.jpg", "0a261a88b3", "0"); 
INSERT INTO `imagenes` VALUES("2248", "assets/archivos/recortadas/a_5107854b37.jpeg", "742de85860", "0"); 
INSERT INTO `imagenes` VALUES("2249", "assets/archivos/recortadas/a_b9e6f51092.JPG", "7c3e19b97d", "0"); 
INSERT INTO `imagenes` VALUES("2250", "assets/archivos/recortadas/a_7b6fbe1826.jpeg", "4933f24cfe", "0"); 


DROP TABLE IF EXISTS `novedades`;
CREATE TABLE `novedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) DEFAULT NULL,
  `titulo` text,
  `desarrollo` text,
  `categoria` text,
  `keywords` text,
  `description` text,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

INSERT INTO `novedades` VALUES("27", "e0b7bfd717", "WHATSAPP VENTAS ", "<p>WHATSAPP VENTAS</p>
INSERT INTO `novedades` VALUES("28", "05c3cd7fa9", "NUEVO PRODUCTO", "", "", "", "", "2017-03-24"); 
INSERT INTO `novedades` VALUES("29", "d636fbe0cd", "WHATSAPP SUCURSAL CÓRDOBA", "<p>Ahora podes consultar el estado de tu pedido y contactarte con nuestros vendedores por Whatsapp !!</p>
INSERT INTO `novedades` VALUES("30", "2d35edcced", "NUEVO HORARIO SUC. CÓRDOBA", "", "", "", "", "2017-06-27"); 
INSERT INTO `novedades` VALUES("31", "bd4c733dae", "CONSEGUÍ CARRIER EN NUESTA OFICINA DE CÓRDOBA", "", "", "", "", "2017-08-25"); 
INSERT INTO `novedades` VALUES("32", "089de09b7d", "¿Qué garantia tienen nuestros productos? ", "", "", "", "", "2017-09-13"); 
INSERT INTO `novedades` VALUES("33", "2eda646ec4", "WHATSAPP SUCURSAL ROSARIO", "", "", "", "", "2017-09-21"); 
INSERT INTO `novedades` VALUES("34", "148757bcd5", "VACACIONES", "", "", "", "", "2018-02-07"); 
INSERT INTO `novedades` VALUES("35", "877aca6998", "Importancia del cuidado y mantenimiento de nuestros extractores", "<p dir=\"ltr\">Sabemos que cada producto conlleva un <strong>regular mantenimiento y cuidado para que siempre su funcionamiento y rendimiento sea óptimo</strong>. ¿Pero qué pasa cuando no se le da importancia?</p>
INSERT INTO `novedades` VALUES("36", "1e45a1c68d", "Producto Gatti de la semana: extractor de aire industrial para pared", "<p>En Gatti SA pensamos siempre en nuestros clientes y en el cuidado del ambiente en donde desarrollan su actividad profesional o comercial.</p>
INSERT INTO `novedades` VALUES("37", "f088c21ef8", "LUNES 30 NO TRABAJAMOS ", "", "", "", "", "2018-04-27"); 
INSERT INTO `novedades` VALUES("38", "10db16a27c", "Producto Gatti de la semana: Cortinas de Aire FM 900 y 1200 mm", "<p>En Gatti siempre pensamos en el confort de nuestros clientes y sobre todo en el espacio donde desarrollan sus trabajos diarios.</p>
INSERT INTO `novedades` VALUES("39", "0d429c25fc", "Producto Gatti de la semana: Extractor de Aire forzador de conducto para baños y cocinas", "<p>En Gatti SA nos enfocamos en brindar la mejor solución en ventilación de ambientes y espacios. En esta oportunidad <strong>presentamos el novedoso Extractor Tubular de 100 150 y 200 para exterior.</strong></p>
INSERT INTO `novedades` VALUES("40", "652a20fcf2", "MARTES 25 TRABAJAMOS NORMALMENTE ! ", "", "", "", "", "2018-09-25"); 
INSERT INTO `novedades` VALUES("41", "0a261a88b3", "¡Tenemos precios PRE-SUMMER para que refresques tu casa con los ventiladores más lindos de internet!", "<p>Conocé nuestros Platil de Madera y disfrutá del poder del viento.<br />
INSERT INTO `novedades` VALUES("42", "742de85860", "LUNES 24 Y 31 ", "", "", "", "", "2018-12-21"); 
INSERT INTO `novedades` VALUES("43", "7c3e19b97d", "NUEVO SERVICIO !! CORTE POR PLASMA CNC ", "<p>Te ofrecemos un NUEVO SERVICIO - CORTE POR PLASMA CNC&nbsp; ! Realizamos trabajos a pedidos en aluminio, acero carbono y acero. Hasta 1 pulgada de espesor y desde 1500 mm de ancho hasta 6000 mm.&nbsp;</p>


DROP TABLE IF EXISTS `pagos`;
CREATE TABLE `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `leyenda` text NOT NULL,
  `cod` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `aumento` int(11) DEFAULT '0',
  `disminuir` int(11) DEFAULT '0',
  `defecto` int(11) DEFAULT '0',
  `tipo` int(11) NOT NULL DEFAULT '0' COMMENT '¿TARJETA DE CREDITO? SI ES PARA TARJETA DE CRÉDITO COLOCAR UN 1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `pagos` VALUES("1", "Depósito bancario BANCO MACRO", "CUENTA BANCARIA", "1fa6940637", "0", "0", "10", "2", "0"); 
INSERT INTO `pagos` VALUES("2", "Tarjeta de crédito", "Cuenta de mercadopago", "1fa6124437", "0", "100", "0", "1", "1"); 
INSERT INTO `pagos` VALUES("4", "CHEQUES 30/60/90", "LOS CHEQUE SERÁN RECIBIDOS EN 24 HORAS PARA LUEGO ENVIAR EL PRODUCTO", "92f769a440", "0", "3", "0", "1", "0"); 
INSERT INTO `pagos` VALUES("5", "AHORA 12", "MÉTODO DE PAGO UNICAMENTE TELEFÓNICO DE DÍA A JUEVES A DOMINGO", "74f3f48448", "0", "30", "0", "1", "0"); 
INSERT INTO `pagos` VALUES("6", "CUENTA CORRIENTE", "PRUEBA", "3380aaa757", "0", "0", "3", "1", "0"); 


DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) NOT NULL,
  `estado` int(11) DEFAULT '0',
  `tipo` varchar(255) DEFAULT '0',
  `detalle` text,
  `total` float NOT NULL DEFAULT '0',
  `usuario` varchar(255) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `hub_cod` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `pedidos` VALUES("1", "85E0F85", "1", "AHORA 12", "", "6396", "212f219591", "2019-04-04 11:22:43", "661934118"); 
INSERT INTO `pedidos` VALUES("3", "5BAC006536", "1", "CUENTA CORRIENTE", "", "28130", "3382624dce", "2019-04-04 12:20:57", "662004327"); 
INSERT INTO `pedidos` VALUES("4", "856A0DB", "0", "Tarjeta de crédito", "", "19400", "54ff49e919", "2019-04-04 12:21:40", "662009289"); 
INSERT INTO `pedidos` VALUES("5", "A24083D", "1", "AHORA 12", "", "2132", "ae1485b1a6", "2019-04-04 12:37:47", "662010208"); 
INSERT INTO `pedidos` VALUES("7", "FEACC87", "1", "AHORA 12", "", "2132", "ae1485b1a6", "2019-04-04 12:46:08", "662049578"); 


DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE `portfolio` (
  `id_portfolio` int(11) NOT NULL AUTO_INCREMENT,
  `cod_portfolio` varchar(255) NOT NULL,
  `nombre_portfolio` varchar(255) NOT NULL,
  `descripcion_portfolio` text NOT NULL,
  `categoria_portfolio` varchar(255) NOT NULL,
  `subcategoria_portfolio` varchar(255) NOT NULL,
  `moneda_portfolio` varchar(255) NOT NULL,
  `precio_portfolio` float NOT NULL,
  `preciodesc_portfolio` float NOT NULL,
  `stock_portfolio` int(11) NOT NULL,
  `imagen1_portfolio` varchar(255) NOT NULL,
  `imagen2_portfolio` varchar(255) NOT NULL,
  `imagen3_portfolio` varchar(255) NOT NULL,
  `imagen4_portfolio` varchar(255) NOT NULL,
  `imagen5_portfolio` varchar(255) NOT NULL,
  `estado_portfolio` int(11) NOT NULL,
  `tipo_portfolio` int(1) NOT NULL,
  `fecha_portfolio` date NOT NULL,
  `peso_portfolio` float NOT NULL,
  `pdf_portfolio` varchar(255) NOT NULL,
  `video1_portfolio` varchar(255) NOT NULL,
  `video2_portfolio` varchar(255) NOT NULL,
  PRIMARY KEY (`id_portfolio`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

INSERT INTO `portfolio` VALUES("1", "VT CLSICO BLANCO", "VENTILADOR DE TECHO  CHAPA  BLANCO", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: VT CL&Aacute;SICO</span></strong><br />
INSERT INTO `portfolio` VALUES("3", "VTLUJO", "VENTILADOR DE TECHO DE MADERA ", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: VT Lujo</span></strong><br />
INSERT INTO `portfolio` VALUES("5", "EBG4", "EXTRACTOR DE AIRE BAÑO 4 PULGADAS - EBG 4", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- Modelo: EBG 4&quot;</span></strong><br />
INSERT INTO `portfolio` VALUES("6", "EBG5", "EXTRACTOR DE AIRE BAÑO 5 PULGADAS - EBG 5", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">&nbsp;- MODELO: EBG 5&quot; &nbsp;&nbsp;</span></strong><br />
INSERT INTO `portfolio` VALUES("7", "EBG6", "EXTRACTOR DE AIRE BAÑO 6 PULGADAS - EBG 6", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- Modelo: EBG 6&quot;</span></strong><br />
INSERT INTO `portfolio` VALUES("8", "CAMP100", "EXTRACTOR DE AIRE SATELITAL DE 10 CM PARA BAÑO / COCINA", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: campanita 100</span></strong><br />
INSERT INTO `portfolio` VALUES("9", "CAMP150", "EXTRACTOR DE AIRE PARRILLERO 15 CM PARA ALTA TEMPERATURA", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">-&nbsp;MODELO: CAMPANITA 150 AT</span></strong><br />
INSERT INTO `portfolio` VALUES("10", "CAMP250", "EXTRACTOR DE AIRE PARRILLETRO 25 CM PARA ALTA TEMPERATURA ", "<div><strong>- MODELO: CAMPANITA 250</strong></div>
INSERT INTO `portfolio` VALUES("11", "TUBULAR 100", "EXTRACTOR DE AIRE ENTRE CONDUCTO 10 CM COCINA / BAÑO", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: TUBULAR 100</span></strong><br />
INSERT INTO `portfolio` VALUES("12", "TUBULAR 150", "EXTRACTOR DE AIRE ENTRE CONDUCTO 15 CM COCINA/BAÑO", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: TUBULAR 150</span></strong><br />
INSERT INTO `portfolio` VALUES("13", "TUBULAR 250 ", "EXTRACTOR DE AIRE ENTRE CONDUCTO 25 CM COCINA/BAÑO ", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: TUBULAR 250</span></strong><br />
INSERT INTO `portfolio` VALUES("14", "CENTURY 200", "EXTRACTOR DE AIRE PARA BAÑO/COCINA 20 CM PARA PARED  ", "<p><strong>- Modelo: CENTURY 200 HOGAR</strong><br />
INSERT INTO `portfolio` VALUES("15", "CENTURY 250 H", "EXTRACTOR DE AIRE PARA BAÑO/COCINA 25 CM PARA PARED ", "<p><span style=\"font-size:14px\"><strong>- Modelo: CENTURY 250 HOGAR</strong><br />
INSERT INTO `portfolio` VALUES("16", "CENTURY 300 H", "EXTRACTOR DE AIRE PARA BAÑO/COCINA 30 CM PARA PARED", "<p><span style=\"font-size:14px\"><strong>- Modelo: CENTURY 300 HOGAR</strong><br />
INSERT INTO `portfolio` VALUES("17", "CENTURY 300 C", "EXTRACTOR  DE AIRE SEMI INDUSTRIAL 30 CM PARA PARED", "<p><span style=\"font-size:14px\"><strong>- MODELO: CENTURY 300 COMERCIAL</strong><br />
INSERT INTO `portfolio` VALUES("18", "CENTURY 350 C", "EXTRACTOR DE AIRE SEMI INDUSTRIAL 35CM PARA PARED BAÑO/COCINA", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: CENTURY 350 COMERCIAL </span></strong><br />
INSERT INTO `portfolio` VALUES("19", "CENTURY 400 C ", "EXTRACTOR DE AIRE SEMI INDUSTRIAL 40 CM PARA PARED BAÑO/COCINA", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: CENTURY 400</span></strong><br />
INSERT INTO `portfolio` VALUES("20", "0", "SERIE K", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("21", "0", "SERIE W", "<p>GENERALIDAD</p>
INSERT INTO `portfolio` VALUES("22", "0", "SERIE WH/KH", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("23", "0", "SERIE KE", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("24", "0", "SERIE KP/WP ", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("25", "0", "EÓLICOS", "<p>GENERALIDAD</p>
INSERT INTO `portfolio` VALUES("26", "0", "HÉLICES AXIALES", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("27", "0", "SERIE WF", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("28", "0", "RA /RB /RG /RH / RD/ RE", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("29", "0", "CA DADE", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("30", "0", "RU EN LÍNEA", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("31", "0", "RM", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("32", "0", "CA CB EN LÍNEA", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("33", "0", "UH - TORRE DE EXTRACCIÓN ", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("34", "0", "SILVY", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("35", "0", "FABY HOGAR - PIE Y PARED", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("36", "VTSUPERLUJO", "VENTILADOR DE TECHO DE MADERA PALA DE 2 COLORES ", "<p>- MODELO: VT SUPER LUJO<br />
INSERT INTO `portfolio` VALUES("37", "FABY 16 PARED BLANCO ", "VENTILADOR DE PARED FABY 16\" ", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: FABY 16&quot;</span></strong><br />
INSERT INTO `portfolio` VALUES("38", "FABY 20 PARED", "VENTILADOR DE PARED 20", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: FABY 20&quot;</span></strong><br />
INSERT INTO `portfolio` VALUES("39", "FABY 25 PARED", "VENTILADOR SEMI INDUSTRIAL DE PARED 25 METÁLICO", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong>- MODELO: FABY 25&quot; PARED</strong></span></span></p>
INSERT INTO `portfolio` VALUES("40", "FABY 16 PIE BLANCO", "VENTILADOR DE PIE FABY 16\" ", "<p><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: FABY 16&quot;</span></strong><br />
INSERT INTO `portfolio` VALUES("41", "0", "VENTILADOR INDUSTRIAL FABY - PIE Y PARED", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("42", "0", "VPK", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("43", "0", "CORTINAS DE AIRE", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("44", "0", "EXTRACTOR DE AIRE BAÑO EBG", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("45", "0", "EXTRACTOR DE AIRE CAMPANITA / TUBULAR", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("46", "VTCLASICO", "VENTILADOR DE TECHO CHAPA -  CLÁSICO ", "<p>- MODELO: VENTILADOR CL&Aacute;SICO</p>
INSERT INTO `portfolio` VALUES("47", "0", "EXTRACTOR DE AIRE CENTURY - HOGAR / COMERCIAL ", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("48", "0", "VPK 1000", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("49", "0", "KU 765", "<p>GENERALIDADES Y APLICACIONES</p>
INSERT INTO `portfolio` VALUES("51", "0", "RB 420", "<p>GENERALIDADES Y APLICACIONES</p>
INSERT INTO `portfolio` VALUES("53", "0", "BRAZOS ARTICULADOS", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("54", "0", "PERSIANA POR GRAVEDAD", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("55", "0", "REJILLAS DE PROTECCIÓN DE ENTRADA Y SALIDA", "<p>GENERALIDADES Y APLICACIONES</p>
INSERT INTO `portfolio` VALUES("56", "0", "CONTRA BOCAS DE SALIDA", "<p>GENERALIDADES Y APLICACIONES</p>
INSERT INTO `portfolio` VALUES("57", "0", "ACCESORIOS DE BOCA DE ENTRADA", "<p>GENERALIDADES Y APLICACIONES&nbsp;</p>
INSERT INTO `portfolio` VALUES("58", "0", "REJILLAS DE PROTECCIÓN EN ALAMBRE", "<p>GENERALIDADES Y APLICACIONES</p>
INSERT INTO `portfolio` VALUES("59", "0", "CLAPETAS REGULADORAS DE CAUDAL", "<p>GENERALIDADES Y APLICACIONES</p>
INSERT INTO `portfolio` VALUES("61", "0", "RU", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("63", "PERSIANA4", "PERSIANA DE PLÁSTICO MOVIL 4", "<p>MODELO: PERSIANA DE PL&Aacute;STICO 4&quot;</p>
INSERT INTO `portfolio` VALUES("65", "PERSIANA6", "PERSIANA DE PLÁSTICO MOVIL 6", "<p>MODELO: PERSIANA DE PL&Aacute;STICO 6&quot;</p>
INSERT INTO `portfolio` VALUES("68", "FABY 25 PIE", "VENTILADOR SEMI INDUSTRIAL DE PIE 25", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong>- MODELO: FABY PIE&nbsp;25&quot;</strong><br />
INSERT INTO `portfolio` VALUES("69", "NEXGEN2250FC", "SPLIT NEXGEN SMART CARRIER 2250 Kcal - FRIO/CALOR", "<p>MARCA: Carrier&nbsp;2250 Kcal FR&Iacute;O CALOR<br />
INSERT INTO `portfolio` VALUES("70", "NEXGEN2900FC", "SPLIT NEXGEN SMART CARRIER -  2900 Kcal FRIO/CALOR", "<p>MARCA: Carrier&nbsp;2900 Kcal FR&Iacute;O/CALOR<br />
INSERT INTO `portfolio` VALUES("71", "NEXGEN4550FC", "SPLIT NEXGEN SMART 4550 Kcal FRIO CALOR", "<p>&nbsp;&nbsp;&nbsp;MARCA: Carrier&nbsp;4550 Kcal FR&Iacute;O/CALOR<br />
INSERT INTO `portfolio` VALUES("73", "NEXGEN5500FC", "SPLIT NEXGEN SMART  5500 Kcal FRIO CALOR", "<p><strong>MARCA: Carrier&nbsp;5500 Kcal FR&Iacute;O/CALOR</strong><br />
INSERT INTO `portfolio` VALUES("75", "VTCLÁSICOBLANCOX2", "PROMO VENTILADOR DE TECHO CHAPA X  2 UNID. ", "<p>- MODELO: VT CL&Aacute;SICO<br />
INSERT INTO `portfolio` VALUES("77", "VTLUJOX2", "PROMO VENTILADOR DE TECHO MADERA X 2 UNID. ", "<p>- MODELO: VT Lujo<br />
INSERT INTO `portfolio` VALUES("78", "VTCHAPAX2NE", "PROMO VENTILADOR DE TECHO CHAPA NEGRO X  2 UNID.", "<p>- MODELO: VT CL&Aacute;SICO</p>
INSERT INTO `portfolio` VALUES("79", "EBG4+PERS", "PROMO EXTRACTOR DE AIRE BAÑO 4 (10 cm)  + PERSIANA MOVIL PROMO", "<p>- MODELO: Extractor de Ba&ntilde;o 4&quot; (EBG 4&quot;) + Persiana Pl&aacute;stica M&oacute;vil 4&quot;<br />
INSERT INTO `portfolio` VALUES("80", "EBG6+PER", "PROMO EXTRACTOR DE AIRE BAÑO 6 (15 cm) + PERSIANA MOVIL PROMO", "<p>- MODELO: Extractor de Ba&ntilde;o 6&quot; (EBG 6&quot;) + Persiana Pl&aacute;stica M&oacute;vil 6&quot;<br />
INSERT INTO `portfolio` VALUES("82", "VTCLÁSICO+LUZD", "VENTILADOR DE TECHO CHAPA BLANCO C/ TULIPA DORADA ", "<div><strong>MODELO: VENTILADOR DE CHAPA BLANCO + ARA&Ntilde;A 3 LUCES DORADO</strong></div>
INSERT INTO `portfolio` VALUES("83", "VTBTP", "VENTILADOR DE TECHO CHAPA BLANCO C/ TULIPA PLATIL ", "<div><strong>MODELO: VENTILADOR DE TECHO CHAPA BLANCO + ARA&Ntilde;A 3 LUCES PLATIL</strong></div>
INSERT INTO `portfolio` VALUES("84", "MIDEA LUMINA2350", "SPLIT MIDEA LUMINA  II - 2350 Kcal FRIO SOLO", "<p>MARCA: MIDEA 2350 Kcal/H FRIO SOLO</p>
INSERT INTO `portfolio` VALUES("85", "MIDEALUMINA2750F", "SPLIT MIDEA LUMINA II -  2750  Kcal FRIO SOLO", "<p>MARCA: MIDEA 2750 Kcal/H FRIO SOLO&nbsp; (3210 W)</p>
INSERT INTO `portfolio` VALUES("86", "MIDEABLANC5300FC", "SPLIT MIDEA BLANC - 5300 Kcal FRIO/CALOR", "<p>MARCA: MIDEA BLANC&nbsp;5300 Kcal/H &nbsp;FRIO/CALOR&nbsp; (6170 W)</p>
INSERT INTO `portfolio` VALUES("87", "VTB+PLAFÓN BL.", "VENTILADOR DE TECHO CHAPA BLANCO C/ PLAFON BLANCO", "<div><strong>&nbsp;MODELO: VENTILADOR DE TECHO CHAPA BLANCO + PLAFON ABIERTO BLANCO</strong><br />
INSERT INTO `portfolio` VALUES("88", "KRM450/4P MONO", "EXTRACTOR DE AIRE AXIAL INDUSTRIAL 45 CM MONOFÁSICO PARA PARED", "<div><span style=\"color:#000000\"><span style=\"font-size:14px\"><em><strong>- MODELO: KRM 450/4 P MONOF&Aacute;SICO</strong></em><br />
INSERT INTO `portfolio` VALUES("89", "VTLUJO+PLAFÓN D.", "VENTILADOR TECHO MADERA C/ PLAFON DORADO", "<div>&nbsp;<strong>MODELO: VENTILADOR DE TECHO MADERA + PLAF&Oacute;N ABIERTO DORADO</strong></div>
INSERT INTO `portfolio` VALUES("90", "KRM 350/4P MONOF", "EXTRACTOR DE AIRE AXIAL INDUSTRIAL 35 CM MONOFÁSICO PARA PARED", "<p><span style=\"font-size:14px\"><strong><em>- MODELO: KRM 350/4 P MONOF&Aacute;SICO</em></strong><br />
INSERT INTO `portfolio` VALUES("92", "VTSUPERLUJO", "VENTILADOR DE TECHO MADERA - MODELO: SUPER LUJO", "<p><strong>- MODELO: VENTILADOR SUPER LUJO</strong></p>
INSERT INTO `portfolio` VALUES("93", "VTPLATIL", "VENTILADOR DE TECHO - MODELO: PLATIL", "<p><strong>- MODELO: VENTILADOR PLATIL</strong></p>
INSERT INTO `portfolio` VALUES("94", "LUM403D", "ARAÑA 3 LUCES DORADO", "<p>- MODELO: ARA&Ntilde;A 3 LUCES DORADO</p>
INSERT INTO `portfolio` VALUES("95", "LUM403P", "ARAÑA 3 LUCES PLATEADO", "<p>- MODELO: ARA&Ntilde;A 3 LUCES PLATEADO</p>
INSERT INTO `portfolio` VALUES("96", "ILU410B", "ARAÑA 3 LUCES BLANCA", "<p>- MODELO: ARA&Ntilde;A 3 LUCES BLANCA</p>
INSERT INTO `portfolio` VALUES("97", "ILU416B", "PLAFÓN ABIERTO 1 LUZ BLANCO", "<p>- MODELO: ARA&Ntilde;A 3 LUCES DORADO</p>
INSERT INTO `portfolio` VALUES("98", "ILU415D", "PLAFON ABIERTO 1 LUZ DORADO", "<p>- MODELO: PLAF&Oacute;N ABIERTO DORADO</p>
INSERT INTO `portfolio` VALUES("99", "ILU415P", "PLAFON ABIERTO 1 LUZ PLATEADO", "<p>- MODELO: PLAF&Oacute;N ABIERTO PLATEADO</p>
INSERT INTO `portfolio` VALUES("101", "VTSUPERLUJO", "VENTILADOR DE TECHO DE MADERA SUPER LUJO", "<p>- MODELO: VT SUPER LUJO<br />
INSERT INTO `portfolio` VALUES("102", "FABY20PNE", "VENTILADOR DE PIE FABY 20", "<p>- MODELO: FABY 20&quot;</p>
INSERT INTO `portfolio` VALUES("103", "VTPLATIL 6006", "VENTILADOR DE TECHO PLATIL", "<p>- MODELO: VT PLATIL 6006<br />
INSERT INTO `portfolio` VALUES("105", "VTPLATILAP", "VENTILADOR DE TECHO PLATIL C/ APLIQUE 3 LUCES PLATIL", "<p>- MODELO: VT PLATIL<br />
INSERT INTO `portfolio` VALUES("106", "VTPLATILPA", "VENTILADOR DE TECHO PLATIL C/ PLAFON ABIERTO PLATIL", "<p>- MODELO: VT PLATIL<br />
INSERT INTO `portfolio` VALUES("109", "CAJAREGULADORA", "CAJA REGULADORA DE VELOCIDAD ", "<p>- MODELO: CAJA REGULADORA DE VELOCIDAD</p>
INSERT INTO `portfolio` VALUES("110", "TURBO20", "TURBO FIJO DE 20 PULGADAS", "<p>- MODELO: TURBO 20&quot;</p>
INSERT INTO `portfolio` VALUES("112", "VTCLÁSICOBLANCO+DO", "VENTILADOR DE TECHO CHAPA BLANCO C/ DORADO", "<p>&nbsp;- MODELO: VT CL&Aacute;SICO CON HERRAJES DORADOS</p>
INSERT INTO `portfolio` VALUES("113", "VTCLÁSICONEGRO", "VENTILADOR DE CHAPA NEGRO", "<p>&nbsp;- MODELO: VT CL&Aacute;SICO NEGRO</p>
INSERT INTO `portfolio` VALUES("114", "PLATIL5008", "VENTILADOR DE TECHO PLATIL ", "<p>- MODELO: VT PLATIL 5008<br />
INSERT INTO `portfolio` VALUES("116", "KPM 350/4", "EXTRACTOR DE AIRE  INDUSTRIAL 35 CM PARED ARO PLÁSTICO", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><em><strong>&nbsp;- MODELO: KPM 350/4 P 0.33</strong></em><br />
INSERT INTO `portfolio` VALUES("117", "KPM450/4P", "EXTRACTOR DE AIRE INDUSTRIAL 45 CM PARED ARO PLÁSTICO", "<p><span style=\"font-size:14px\"><em><strong>&nbsp;- MODELO: KPM 450/4 P 0.33</strong></em><br />
INSERT INTO `portfolio` VALUES("118", "KUM350/4", "EXTRACTOR DE AIRE INDUSTRIAL 35 CM PARA CONDUCTO", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><em><strong>- MODELO: KUM 350/4 P 0.33</strong></em><br />
INSERT INTO `portfolio` VALUES("121", "MIDEALUMINA5750", "SPLIT MIDEA LUMINA II - 5750 Kcal FRIO SOLO", "<p>MARCA: MIDEA&nbsp;5750 Kcal/H FRIO SOLO&nbsp;</p>
INSERT INTO `portfolio` VALUES("122", "MIDEALUMINA4750", "SPLIT MIDEA LUMINA II - 4750 Kcal FRIO SOLO", "<p>MARCA: MIDEA&nbsp;LUMINA II 4750&nbsp;Kcal/H FRIO SOLO&nbsp;</p>
INSERT INTO `portfolio` VALUES("123", "MIDEABLANC2970FC", "SPLIT MIDEA BLANC - 2970 Kcal FRIO CALOR", "<div>MODELO:&nbsp; MIDEA BLANC 2790 Kcal/H&nbsp; FRIO/CALOR<br />
INSERT INTO `portfolio` VALUES("124", "MIDEABLANC2230FC", "SPLIT MIDEA BLANC - 2230 Kcal FRIO CALOR", "<p>MARCA:&nbsp;&nbsp;MIDEA BLANC&nbsp; 2230 Kcal/H &nbsp;FRIO/CALOR&nbsp;</p>
INSERT INTO `portfolio` VALUES("126", "FABY29PARED", "VENTILADOR INDUSTRIAL DE PARED 29 2 VELOCIDADES", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: FABY 29&quot; PARED</span><br />
INSERT INTO `portfolio` VALUES("127", "VTLUJOX2", "PROMO VENTILADOR DE TECHO MADERA  X 2 UNIDADES", "<p style=\"margin-left:0px; margin-right:0px; text-align:left\">- MODELO: VT Lujo<br />
INSERT INTO `portfolio` VALUES("128", "VTLUJO", "VENTILADOR DE TECHO MADERA LUJO", "<p style=\"margin-left:0px; margin-right:0px; text-align:left\">- MODELO: VT Lujo<br />
INSERT INTO `portfolio` VALUES("129", "VTSUPERLUJOX2", "PROMO VENTILADOR DE TECHO MADERA SUPER LUJO X 2 UNIDADES", "<p style=\"margin-left:0px; margin-right:0px; text-align:left\">- MODELO: VT SUPER LUJO X 2 UNIDADES<br />
INSERT INTO `portfolio` VALUES("130", "VTSUPERLUJOX2", "PROMO VENTILADOR DE TECHO MADERA SUPER LUJO X 2 UNIDADES", "<p style=\"margin-left:0px; margin-right:0px; text-align:left\">- MODELO: VT SUPER LUJO X 2 UNIDADES<br />
INSERT INTO `portfolio` VALUES("132", "VARIATENC", "VARIADOR DE TENSIÓN ENCHUFABLE", "<div><strong>- MODELO: REGULADOR DE TENSI&Oacute;N ENCHUFABLE 1200w</strong></div>
INSERT INTO `portfolio` VALUES("134", "SOMBR.C100", "REPUESTO SOMBRERO CAMPANITA 100", "<p>- MODELO: Sombrerete extractor de aire campanita 100<br />
INSERT INTO `portfolio` VALUES("135", "TURBINACAMPANITA100", "REPUESTO TURBINA  CAMPANITA 100", "<p style=\"margin-left:0px; margin-right:0px; text-align:left\">- MODELO: Turbina extractor de aire campanita 100<br />
INSERT INTO `portfolio` VALUES("136", "ARO CAMP100", "REPUESTO ARO SOPORTE CAMPANITA 100", "<p style=\"margin-left:0px; margin-right:0px; text-align:left\">- MODELO: Anillo soporte extractor de aire campanita 100<br />
INSERT INTO `portfolio` VALUES("137", "EOL4", "EXTRACTOR EÓLICO 4 PULGADAS GALVANIZADO", "<div>- MODELO: EXTRACTOR E&Oacute;LICO DE 4&quot; (10 CM)<br />
INSERT INTO `portfolio` VALUES("138", "EO6", "EXTRACTOR EÓLICO 6 PULGADAS GALVANIZADO", "<div>- MODELO: EXTRACTOR E&Oacute;LICO DE 6&quot; (15 CM)<br />
INSERT INTO `portfolio` VALUES("139", "EO8", "EXTRACTOR EÓLICO 8 PULGADAS GALVANIZADO", "<p>- MODELO: EXTRACTOR E&Oacute;LICO DE 8&quot; (20 CM)<br />
INSERT INTO `portfolio` VALUES("140", "EO15", "EXTRACTOR EÓLICO 15 PULGADAS GALVANIZADO C/ RODAMIENTOS ", "<p>- MODELO: EXTRACTOR E&Oacute;LICO DE 15&quot; (37,5 CM)<br />
INSERT INTO `portfolio` VALUES("141", "EO24", "EXTRACTOR EOLICO 24\" GALVANIZADO C/ RODAMIENTOS", "<p>- MODELO: EXTRACTOR E&Oacute;LICO DE 24&quot; (61,5 CM)<br />
INSERT INTO `portfolio` VALUES("142", "EO29\"", "EXTRACTOR EOLICO 29\" GALVANIZADO C/ RODAMIENTOS", "<p>- MODELO: EXTRACTOR E&Oacute;LICO DE 29&quot; (72.5 CM)<br />
INSERT INTO `portfolio` VALUES("144", "MOTORCAMP100", "MOTOR EXTRACTOR DE AIRE 10 CM  PARA CAMPANITA 100", "<p>- MODELO: MOTOR PARA EXTRACTOR CAMPANITA 100<br />
INSERT INTO `portfolio` VALUES("145", "MOTORCAMP150", "MOTOR EXTRACTOR DE AIRE 15 CM  PARA CAMPANITA 150", "<div>- MODELO: MOTOR PARA EXTRACTOR CAMPANITA 150<br />
INSERT INTO `portfolio` VALUES("146", "MOTORCAMP250", "MOTOR EXTRACTOR DE AIRE 25 CM  PARA CAMPANITA 250", "<p>- MODELO: MOTOR PARA EXTRACTOR CAMPANITA 250<br />
INSERT INTO `portfolio` VALUES("147", "EOL15+BASE", "EXTRACTOR EÓLICO 15 PULGADAS GALVANIZADO + BASE", "<div>- MODELO: EXTRACTOR E&Oacute;LICO DE 15&quot; (37,5 CM) + BASE<br />
INSERT INTO `portfolio` VALUES("148", "PERS PLASTICA 35CM", "PERSIANA MOVIL PLÁSTICA 350 MM", "<div>- MODELO: PERSIANA PL&Aacute;STICA MOVIL 350 MM</div>
INSERT INTO `portfolio` VALUES("149", "TUB150C/TECHO", "Extractor De Aire Forzador Conducto 15 cm Para Baño-Cocina", "<p>- MODELO: TUBULAR 150 PARA EXTERIOR<br />
INSERT INTO `portfolio` VALUES("150", "KRM550/4P", "Extractor De Aire Industrial 55 Cm Para Pared ", "<div>- MODELO: KRM 550/4 P<br />
INSERT INTO `portfolio` VALUES("151", "PER 250", "PERSIANA PLÁSTICA MOVIL 250 MM", "<div>- MODELO: PERSIANA PL&Aacute;STICA MOVIL 250 MM</div>
INSERT INTO `portfolio` VALUES("152", "BARRAL NEGRO 1MT", "BARRAL NEGRO VENTILADOR DE TECHO 1 MT. ", "<div>BARRAL PARA VENTILADOR DE TECHO GATTI<br />
INSERT INTO `portfolio` VALUES("153", "BARRALBLANCO", "BARRAL BLANCO PARA VENTILADOR DE TECHO 1 MT", "<div style=\"-webkit-text-stroke-width:0px; background-color:transparent; box-sizing:border-box; color:#333333; font-family:sans-serif,Arial,Verdana,\">BARRAL PARA VENTILADOR DE TECHO GATTI<br />
INSERT INTO `portfolio` VALUES("154", "KUM550", "Extractor De Aire Industrial 55 Cm Monofásico Para Conducto ", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><em><strong>- MODELO: KRM 550/4 P</strong></em><br />
INSERT INTO `portfolio` VALUES("155", "PERSIANA650", "Persiana Extractor De Aire 65 Cm Baño/cocina", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: PERSIANA MET&Aacute;LICA MOVIL 650 MM</span><br />
INSERT INTO `portfolio` VALUES("156", "PERSIANA 750", "Persiana Extractor De Aire 75 Cm Baño/cocina", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: PERSIANA MET&Aacute;LICA MOVIL 750 MM REFORZADA </span><br />
INSERT INTO `portfolio` VALUES("159", "PERSIANA550", "Persiana Extractor De Aire 55 Cm Baño/cocina ", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: PERSIANA MET&Aacute;LICA MOVIL 550 MM</span><br />
INSERT INTO `portfolio` VALUES("161", "PERSIANA350", "Persiana Extractor De Aire 35 Cm Baño/cocina", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: PERSIANA MET&Aacute;LICA MOVIL 350 MM</span><br />
INSERT INTO `portfolio` VALUES("162", "PERSIANA 850", "Persiana Extractor De Aire 85 Cm Baño/cocina Reforzada ", "<div><span style=\"font-size:14px\">- MODELO: PERSIANA MET&Aacute;LICA MOVIL 850 MM REFORZADA</span></div>
INSERT INTO `portfolio` VALUES("163", "PERSIANA1000", "Persiana Extractor De Aire 100 Cm Baño/cocina Reforzada ", "<div><span style=\"font-size:14px\">- MODELO: PERSIANA MET&Aacute;LICA MOVIL 750 MM REFORZADA</span></div>
INSERT INTO `portfolio` VALUES("164", "FM 900 Y 1200", "CORTINA DE AIRE FM 900 Y 1200", "<p style=\"margin-left:0px; margin-right:0px; text-align:left\">GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("165", "KRT350 TRIFÁ.", "EXTRACTOR DE AIRE INDUSTRIAL 35 CM TRIFÁSICO PARA PARED", "<div><em><strong>- MODELO: KRM 350/4 P TRIF&Aacute;SICO</strong></em><br />
INSERT INTO `portfolio` VALUES("168", "KRT 450/4P TRIF", "EXTRACTOR DE AIRE INDUSTRIAL 45 CM TRIFÁSICO PARA PARED", "<p><span style=\"font-size:14px\"><em><strong>- MODELO: KRT 450/4 P TRIF&Aacute;SICO</strong></em><br />
INSERT INTO `portfolio` VALUES("169", "KRM 550/4 P MONO", "EXTRACTOR DE AIRE AXIAL INDUSTRIAL 55 CM MONOFÁSICO PARA PARED", "<div><span style=\"font-size:14px\"><em><strong>- MODELO: KRM 550/4 P MONOF&Aacute;SICO</strong></em><br />
INSERT INTO `portfolio` VALUES("170", "KRT 550/4 P TRIF.", "EXTRACTOR DE AIRE INDUSTRIAL 55 CM TRIFÁSICO PARA PARED", "<div>- MODELO: KRM 550/4 P TRIF&Aacute;SICO<br />
INSERT INTO `portfolio` VALUES("171", "KRM 650/4 P MONO", "EXTRACTOR DE AIRE AXIAL INDUSTRIAL 65 CM MONOFÁSICO PARA PARED", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><em><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: KRM 650/4 P MONOF&Aacute;SICO</span></strong></em><br />
INSERT INTO `portfolio` VALUES("172", "FM 3009", "CORTINA DE AIRE 90 CM FRÍO SOLO CON CONTROL REMOTO", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: CORTINA DE AIRE DE 90CM FRIO SOLO CON CONTROL REMOTO</span><br />
INSERT INTO `portfolio` VALUES("173", "FM 3012", "CORTINA DE AIRE 120 CM FRÍO SOLO CON CONTROL REMOTO", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: CORTINA DE AIRE DE 120CM FRIO SOLO CON CONTROL REMOTO</span><br />
INSERT INTO `portfolio` VALUES("174", "KPM 550/6P", "EXTRACTOR DE AIRE INDUSTRIAL 55CM PARA PARED, ARO PLÁSTICO", "<div><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong>&nbsp;- MODELO: KPM 550/6 P 0.33</strong><br />
INSERT INTO `portfolio` VALUES("175", "VTCHAPANEGROX3", "Pack X3 Ventilador Chapa Negro Nacional", "<p><span style=\"color:#000000\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><em><strong><span style=\"background-color:transparent\">- MODELO: VT CL&Aacute;SICO</span></strong></em><br />
INSERT INTO `portfolio` VALUES("176", "CLASICOBLANCOX3", "Pack X3 Ventilador Chapa Blanco Nacional", "<p><span style=\"color:#000000\"><em><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: VT CL&Aacute;SICO</span></strong></em><br />
INSERT INTO `portfolio` VALUES("177", "EÓLICO24+BASE", "Extractor Eolico 24 Pulgadas Galvanizado C/ Rod. + Base ", "<div>&nbsp;MODELO: EXTRACTOR E&Oacute;LICO DE 15&quot; (37,5 CM) + BASE<br />
INSERT INTO `portfolio` VALUES("178", "EOLI29+BASE", "Extractor Eolico 29 Pulgadas Galvanizado C/ Rod. + Base ", "<div>MODELO: EXTRACTOR E&Oacute;LICO DE 29&quot; (72,5 CM) + BASE</div>
INSERT INTO `portfolio` VALUES("179", "VTLUJOX3", "Pack X3 Ventilador Madera Nacional ", "<div><span style=\"color:#000000\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><em><strong>- MODELO: VT LUJO</strong></em><br />
INSERT INTO `portfolio` VALUES("180", "VTLUJOX3", "Pack X3 Ventilador Madera Nacional", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: VT LUJO X 3 UNIDADES</span><br />
INSERT INTO `portfolio` VALUES("181", "KUM450/4P", "Extractor De Aire Industrial 45 Cm Monofásico P/ Conducto", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><em><strong>- MODELO: KUM 450/4 P MONOF&Aacute;SICO</strong></em><br />
INSERT INTO `portfolio` VALUES("182", "KUT 450/4 P ", "Extractor De Aire Industrial 45 Cm Trifásico P/ Conducto ", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: KUT 450/4 P TRIF&Aacute;SICO</span><br />
INSERT INTO `portfolio` VALUES("183", "COMBO CAM100+EBG4", "Combo Extractor De Aire Cocina 4\" + Baño 4\"", "<div><strong>- MODELO: COMBO CAMPANITA 100 + EBG 4&quot;</strong></div>
INSERT INTO `portfolio` VALUES("184", "COMBO CAMP 100 + EBG 6", "Combo Extractor De Aire Cocina 4\" + Baño 6\"", "<div>- MODELO: COMBO CAMPANITA 100 + EBG 6&quot;</div>
INSERT INTO `portfolio` VALUES("185", "PERS PLÁSTICA 20CM", "Persiana Movil Plástica 20 Cm P/ Extractor", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: PERSIANA PL&Aacute;STICA MOVIL 200 MM</span><br />
INSERT INTO `portfolio` VALUES("186", "PERS PLASTICA 30 CM", "Persiana Extractor De Aire 30 Cm Cocina Baño", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: PERSIANA PL&Aacute;STICA MOVIL 300 MM</span><br />
INSERT INTO `portfolio` VALUES("188", "PERS. PLAST. 40CM", "Persiana Extractor De Aire 40 Cm Cocina Baño", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: PERSIANA PL&Aacute;STICA MOVIL 400 MM</span><br />
INSERT INTO `portfolio` VALUES("190", "VTLUJO + 3 LUCES", "Ventilador de techo madera con aplique 3 luces dorado", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">MODELO: VENTILADOR DE TECHO MADERA + APLIQUE 3 LUCES DORADO</span><br />
INSERT INTO `portfolio` VALUES("191", "VT BLANCO + 3 APLIQUES B", "VENTILADOR DE TECHO CHAPA BLANCO CON APLIQUE 3 LUCES ", "<div>MODELO: VENTILADOR DE TECHO CHAPA BLANCO + APLIQUE 3 LUCES BLANCO</div>
INSERT INTO `portfolio` VALUES("192", "PALA LUJO", "Repuesto Juego Palas Madera Ventilador De Techo ", "<div>JUEGO DE 4 PALAS DE MADERA</div>
INSERT INTO `portfolio` VALUES("194", "CACR 700", "CORTINA DE AIRE 70 CM FRÍO/CALOR - CACR 700", "<div><strong><span style=\"font-size:14px\">MODELO: CORTINA DE AIRE CACR 700</span></strong></div>
INSERT INTO `portfolio` VALUES("195", "CACR 900", "Cortina De Aire 90 Cm Frío / Calor - CACR 900", "<div><span style=\"font-size:14px\"><strong>MODELO: CORTINA DE AIRE CACR 900</strong></span></div>
INSERT INTO `portfolio` VALUES("196", "CACR 1200", "CORTINA DE AIRE 120 CM FRÍO/CALOR - CACR 1200", "<div><strong><span style=\"font-size:14px\">MODELO: CORTINA DE AIRE CACR 1200</span></strong></div>
INSERT INTO `portfolio` VALUES("197", "CAMR 900", "CORTINA DE AIRE 900 MM FRÍO/CALOR 2 VELOCIDADES", "<div>MODELO: CORTINA DE AIRE CAMR 900 2 VELOCIDADES</div>
INSERT INTO `portfolio` VALUES("198", "CAMR1200", "CORTINA DE AIRE 1200 MM FRÍO / CALOR 2 VELOCIDADES", "<div style=\"-webkit-text-stroke-width:0px; background-color:transparent; box-sizing:border-box; color:#333333\">MODELO: CORTINA DE AIRE CAMR 1200 2 VELOCIDADES</div>
INSERT INTO `portfolio` VALUES("199", "VTLUJO PLATA", "VENTILADOR DE TECHO MADERA LUJO PLATA", "<p>- MODELO: VT LUJO PLATA<br />
INSERT INTO `portfolio` VALUES("200", "VTLUJO NEGRO", "VENTILADOR DE TECHO MADERA LUJO NEGRO ", "<p>- MODEL: VT BLACK LUXURY<br />
INSERT INTO `portfolio` VALUES("202", "KRT650/4 P", "EXTRACTOR DE AIRE INDUSTRIAL 65 CM TRIFÁSICO PARA PARED", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: KRM 650/4 P TRIF&Aacute;SICO </span><br />
INSERT INTO `portfolio` VALUES("203", "FABY 29 PIE", "VENTILADOR INDUSTRIAL DE PIE  29 PULGADAS - 2 VELOCIDADES", "<p><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: FABY 29&quot; PIE</span></strong><br />
INSERT INTO `portfolio` VALUES("204", "", "VENTILADOR DE TECHO CHAPA - MODELO: LUJO", "<p style=\"margin-left:0px; margin-right:0px; text-align:left\">- MODELO: VENTILADOR LUJO</p>
INSERT INTO `portfolio` VALUES("205", "", "CA BOX ", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("206", "EBG 4\" PLATIL ", "Extractor De Aire Baño 4 Cromado Gatti Ventilación Potenciado", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- Modelo: EBG 4&quot; PLATIL</span><br />
INSERT INTO `portfolio` VALUES("207", "EBG 6", "EXTRACTOR DE AIRE BAÑO 6", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- Modelo: EBG 6&quot; PLATIL </span><br />
INSERT INTO `portfolio` VALUES("208", "BARRAL 50 CM", "BARRAL PARA VENTILADOR DE TECHO 50 CM ", "<p><span style=\"color:#000000\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><span style=\"background-color:transparent\">BARRAL PARA VENTILADOR DE TECHO GATTI</span><br />
INSERT INTO `portfolio` VALUES("209", "ALQUILER FABY 29", "Alquiler De Ventiladores De Pie 29 Para Eventos / Fiestas ", "<h3 style=\"color:#333333; font-style:normal; margin-left:0px; margin-right:0px; text-align:left\"><span style=\"font-size:14px\"><strong>Incluye</strong></span></h3>
INSERT INTO `portfolio` VALUES("210", "ALQUILER FABY 25", "Alquiler De Ventiladores De Pie 25 Para Eventos / Fiestas ", "<h3 style=\"color:#333333; font-style:normal; margin-left:0px; margin-right:0px; text-align:left\"><span style=\"font-size:14px\"><strong>Incluye</strong></span></h3>
INSERT INTO `portfolio` VALUES("211", "FABY 27", "VENTILADOR SEMI INDUSTRIAL DE PIE 27 ", "<p style=\"margin-left:0px; margin-right:0px; text-align:left\">- MODELO: FABY 27&quot;<br />
INSERT INTO `portfolio` VALUES("212", "VT LUJO PLATEADO X 2", "PROMO VENTILADOR DE TECHO MADERA  PLATEADO X 2 UNID.", "<p style=\"margin-left:0px; margin-right:0px; text-align:left\">- MODELO: VT LUJO MADERA PLATA&nbsp;<br />
INSERT INTO `portfolio` VALUES("213", "VT LUJO PLATEADO X 2", "PROMO VENTILADOR DE TECHO MADERA PLATIL  X 2 UNID.", "<p style=\"margin-left:0px; margin-right:0px; text-align:left\">- MODELO: VT LUJO MADERA PLATA&nbsp;<br />
INSERT INTO `portfolio` VALUES("214", "VT LUJO NEGRO X 2", "PROMO VENTILADOR DE TECHO MADERA NEGRO X 2 UNID. ", "<p><span style=\"font-size:14px\"><span style=\"background-color:transparent; color:#666666; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: VT LUJO MADERA NEGRO&nbsp;</span><br />
INSERT INTO `portfolio` VALUES("215", "CENTURY OV1", "EXTRACTOR CENTURY - VENTS ", "<p>GENERALIDAD</p>
INSERT INTO `portfolio` VALUES("216", "EBG VENTS ", "EXTRACTOR DE AIRE BAÑO - VENTS ", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("217", "TUBULAR VENTS ", "TUBULAR UK - VENTS ", "<p>GENERALIDADES</p>
INSERT INTO `portfolio` VALUES("218", "VENTS 100 S", "EXTRACTOR DE AIRE BAÑO 4\" (10 cm) ", "<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"color:#000000\"><em><strong>&nbsp;- MODELO: VENTS 100 S</strong><br />
INSERT INTO `portfolio` VALUES("219", "VENTS 125 S", "EXTRACTOR DE AIRE BAÑO 5\" (12 CM) ", "<p><span style=\"color:null\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><em><strong><span style=\"background-color:transparent\">- MODELO: VENTS 125 S</span></strong></em><br />
INSERT INTO `portfolio` VALUES("220", "VENTS 150 S", "EXTRACTOR DE AIRE BAÑO 6\" (15 CM) ", "<p><span style=\"font-size:14px\"><em><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: VENTS 150 S</span></strong></em><br />
INSERT INTO `portfolio` VALUES("221", "UL 100", "EXTRACTOR DE AIRE ENTRE CONDUCTO CHAPA 4", "<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><em><strong>- MODELO: TUBULAR UL 100</strong></em><br />
INSERT INTO `portfolio` VALUES("222", "UL 150", "EXTRACTOR DE AIRE ENTRE CONDUCTO CHAPA 6", "<div><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><em><strong>- MODELO: TUBULAR UL 150</strong></em><br />
INSERT INTO `portfolio` VALUES("223", "UL 250", "EXTRACTOR DE AIRE ENTRE CONDUCTO CHAPA  10", "<div><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><em><strong>- MODELO: TUBULAR UL 250</strong></em><br />
INSERT INTO `portfolio` VALUES("224", "OVI 315 ", "EXTRACTOR  SEMI INDUSTRIAL PARA BAÑO/COCINA 31.5 CM PARA PARED ", "<p><span style=\"color:#000000\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><em><strong><span style=\"background-color:transparent\">- MODELO: EXTRACTOR OV1 315</span></strong></em><br />
INSERT INTO `portfolio` VALUES("225", "VENTS VK 100", "EXTRACTOR DE AIRE ENTRE CONDUCTO PLÁSTICOS 10 CM COCINA / BAÑO ", "<p><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><em><strong>- MODELO: VK 100</strong></em><br />
INSERT INTO `portfolio` VALUES("226", "VENTS VK 150", "EXTRACTOR DE AIRE ENTRE CONDUCTO PLÁSTICOS 15 CM COCINA / BAÑO ", "<p style=\"margin-left:0px; margin-right:0px; text-align:left\"><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif; font-size:14px\"><em><strong>- MODELO: VK 150</strong></em><br />
INSERT INTO `portfolio` VALUES("227", "VENTS VK 250 ", "EXTRACTOR DE AIRE ENTRE CONDUCTO PLÁSTICOS 25 CM COCINA / BAÑO", "<div>- MODELO: VK 250<br />
INSERT INTO `portfolio` VALUES("228", "VENTS VK 315", "EXTRACTOR DE AIRE ENTRE CONDUCTO PLÁSTICOS 31.5  CM COCINA / BAÑO ", "<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"color:#000000\"><span style=\"font-size:14px\"><em><strong><span style=\"background-color:transparent\">- MODELO: VK 315</span></strong></em><br />
INSERT INTO `portfolio` VALUES("234", "RVF 150", "EXTRACTOR DE AIRE PARA TECHO 15 CM TIPO HONGO ", "<p><em><strong>- MODELO: EXTRACTOR DE AIRE PARA TECHO 15 CM HONGO</strong></em><br />
INSERT INTO `portfolio` VALUES("235", "RVF 250", "EXTRACTOR DE AIRE PARA TECHO 25 CM TIPO HONGO", "<p><em><strong>- MODELO: EXTRACTOR DE AIRE PARA TECHO 25 CM HONGO</strong></em><br />
INSERT INTO `portfolio` VALUES("236", "VENTS 100 + PERSIANA ", "Extractor De Baño 4 (10 Cm) Vents + Persiana 4\" ", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><em><strong><span style=\"background-color:transparent\">MODELO: VENTS 100 S</span></strong></em><br />
INSERT INTO `portfolio` VALUES("237", "VENTS 150 + PERSIANA ", "Extractor De Baño 6 (15 Cm) Vents + Persiana 6\"", "<p><span style=\"color:#000000\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\"><em><strong><span style=\"background-color:transparent\">MODELO: VENTS 150 S</span></strong></em><br />
INSERT INTO `portfolio` VALUES("239", "VCU 2E 140 X 60", "VENTILADOR CENTRÍFUGO VCU 2E 140 X 60", "<p><em><strong>MODELO: VENTILADOR CENTRIFUGO VCU 2E 140 X 60&nbsp;</strong></em><br />


DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) DEFAULT NULL,
  `titulo` text,
  `precio` float DEFAULT NULL,
  `precio_descuento` float DEFAULT NULL,
  `stock` int(11) DEFAULT '0',
  `desarrollo` text,
  `categoria` text,
  `subcategoria` text,
  `keywords` text,
  `description` text,
  `variable1` text COMMENT 'estado: 0-Activo 1-Inactivo',
  `variable2` text COMMENT 'tipo: 1-Tienda 0-Productos',
  `variable3` text,
  `variable4` text COMMENT 'peso',
  `variable5` text COMMENT 'altura',
  `variable6` text COMMENT 'ancho',
  `variable7` text COMMENT 'profundidad',
  `variable8` text COMMENT 'imagenes de la pagina vieja',
  `variable9` text COMMENT 'video',
  `variable10` text,
  `fecha` date DEFAULT NULL,
  `meli` varchar(255) DEFAULT NULL,
  `url` text,
  `cod_producto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=latin1;

INSERT INTO `productos` VALUES("1", "9f693d642e", "VENTILADOR DE TECHO  CHAPA  BLANCO", "2975", "3500", "5", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: VT CL&Aacute;SICO</span></strong><br />
INSERT INTO `productos` VALUES("2", "b0fce4847d", "VENTILADOR DE TECHO DE MADERA ", "3230", "3800", "4", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: VT Lujo</span></strong><br />
INSERT INTO `productos` VALUES("3", "f3aacdff42", "EXTRACTOR DE AIRE BAÑO 4 PULGADAS - EBG 4", "860", "0", "10", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- Modelo: EBG 4&quot;</span></strong><br />
INSERT INTO `productos` VALUES("4", "3c23a2467c", "EXTRACTOR DE AIRE BAÑO 5 PULGADAS - EBG 5", "940", "0", "9", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">&nbsp;- MODELO: EBG 5&quot; &nbsp;&nbsp;</span></strong><br />
INSERT INTO `productos` VALUES("5", "4b5c8d7cd9", "EXTRACTOR DE AIRE BAÑO 6 PULGADAS - EBG 6", "1200", "0", "10", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- Modelo: EBG 6&quot;</span></strong><br />
INSERT INTO `productos` VALUES("6", "ab44ef5eb1", "EXTRACTOR DE AIRE SATELITAL DE 10 CM PARA BAÑO / COCINA", "2999", "0", "2", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: campanita 100</span></strong><br />
INSERT INTO `productos` VALUES("7", "c1eabdf3d4", "EXTRACTOR DE AIRE PARRILLERO 15 CM PARA ALTA TEMPERATURA", "6870", "0", "1", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">-&nbsp;MODELO: CAMPANITA 150 AT</span></strong><br />
INSERT INTO `productos` VALUES("8", "8ac6b7e37c", "EXTRACTOR DE AIRE PARRILLETRO 25 CM PARA ALTA TEMPERATURA ", "8200", "0", "1", "<div><strong>- MODELO: CAMPANITA 250</strong></div>
INSERT INTO `productos` VALUES("9", "6c4c0f8090", "EXTRACTOR DE AIRE ENTRE CONDUCTO 10 CM COCINA / BAÑO", "4000", "0", "1", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: TUBULAR 100</span></strong><br />
INSERT INTO `productos` VALUES("10", "3458478bd1", "EXTRACTOR DE AIRE ENTRE CONDUCTO 15 CM COCINA/BAÑO", "5440", "0", "2", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: TUBULAR 150</span></strong><br />
INSERT INTO `productos` VALUES("11", "5638157d2e", "EXTRACTOR DE AIRE ENTRE CONDUCTO 25 CM COCINA/BAÑO ", "6600", "0", "1", "<p><span style=\"color:#000000\"><span style=\"font-size:14px\"><strong><span style=\"background-color:transparent; font-family:Proxima Nova,-apple-system,Helvetica Neue,Helvetica,Roboto,Arial,sans-serif\">- MODELO: TUBULAR 250</span></strong><br />
INSERT INTO `productos` VALUES("12", "fce5c10ccc", "EXTRACTOR DE AIRE PARA BAÑO/COCINA 20 CM PARA PARED  ", "2300", "0", "2", "<p><strong>- Modelo: CENTURY 200 HOGAR</strong><br />
INSERT INTO `productos` VALUES("13", "354067cdd1", "EXTRACTOR DE AIRE PARA BAÑO/COCINA 25 CM PARA PARED ", "3700", "0", "2", "<p><span style=\"font-size:14px\"><strong>- Modelo: CENTURY 250 HOGAR</strong><br />