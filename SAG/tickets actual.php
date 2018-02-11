<?php
session_start();
include ('controlador.php');

$boton = $_POST['boton'];
$p = $_GET['i'];
$e = "";

$pre = "";
$suf = "";

foreach($_POST as $nombre_campo => $valor){ 
	$asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
	eval($asignacion); 
	
	if($boton == "Guardar" and $nombre_campo != "boton") {
		if ($pre != "") { $pre = $pre . ","; };
		$pre = $pre . $nombre_campo;
		
		if ($suf != "") { $suf = $suf . ","; };
		$suf = $suf . "'$valor'";
	}
}

if ($boton == "Guardar") {
	$fecha = date ('Y-m-d');	
	$pre  .= ',id_cliente, estatus';
	$suf  .=  "," . $_SESSION['id_cliente'] . ", 'Pendiente'";
	$pre  .= ',fecha';
	$suf  .=  ",'$fecha'";
	$sql = "insert into requerimiento ($pre) values ($suf)";

	if(mysql_query($sql)) {
		echo "<script language='javascript'>window.location='tickets.php'</script>;";
	}
	else {
		echo mysql_errno() . ": " . mysql_error() . "\n";
	}
}

//Preparar la consulta
$consulta = "SELECT * FROM clientes where id_cliente=" . $_SESSION['id_cliente'] ; 
//Ejecutar la consulta
$resultado = mysql_query($consulta) or die(mysql_error());

$consulta = "SELECT pro.descripcion, pdc.id_producto, tip.descripcion as tipo FROM productos_cliente as pdc  INNER JOIN (productos as pro INNER JOIN tipo_productos as tip on pro.id_tipo=tip.id_tipo) on pdc.id_producto=pro.id_producto where id_cliente=" . $_SESSION['id_cliente'];
$res = mysql_query($consulta) or die(mysql_error());

?>

<!DOCTYPE html>
	<!--[if IE 7]>               
	  <html class="ie7 no-js" lang="es">    
	   <![endif]-->
	<!--[if lte IE 8]>             
	 <html class="ie8 no-js" lang="es">    
	  <![endif]-->
	<!--[if (gte IE 9)|!(IE)]><!-->
	<html class="not-ie no-js" lang="es">
	<!--<![endif]-->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Sistemas Enlaza2</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<!--[if !lte IE 6]><!-->
		<link rel="stylesheet" href="css/style.css" media="screen"/>
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,800,700,400italic|PT+Serif:400,400italic"/>
		<link rel="stylesheet" href="css/fancybox.min.css" media="screen"/>
		<link rel="stylesheet" href="css/video-js.min.css" media="screen"/>
		<link rel="stylesheet" href="css/audioplayerv1.min.css" media="screen"/>
		<!--<![endif]-->
		<!--[if lte IE 6]>
				<link rel="stylesheet" href="//universal-ie6-css.googlecode.com/files/ie6.1.1.css" media="screen, projection">
			<![endif]-->
		<!-- HTML5 Shiv + detect touch events -->
		<script src="js/modernizr.custom.js"></script>
		<!-- HTML5 video player -->
		<script src="js/video.min.js"></script>
		<script>_V_.options.flash.swf = 'js/video-js.swf';</script>
	</head>
	<body>
		<? include "menu.php"; ?>
		<section id="content" class="clearfix">
			<div class="container clearfix">
				<header class="page-header">
					<h1 class="page-title">Panel de Control</h1>
				</header><!-- end .page-header -->
			</div><!-- end .container -->
			<div class="container clearfix">
				<? include "menusoporte.php"; ?>
				<div class="two-third">
				<h2>Tickets de Ayuda</h2>
				<form action="tickets.php" method="post">
					<h4>Para realizar la apertura de un ticket de ayuda, debe completar los siguientes pasos</h4>
					<ul class="tabs-nav">
						<li class="active"><a href="#tab1">Paso 1</a></li>
						<li><a href="#tab2">Paso 2</a></li>
						<li><a href="#tab3">Paso 3</a></li>
					</ul><!-- end .tabs-nav -->
					<div class="tabs-container">
					
							<div class="tab-content" id="tab1">
								<h4>1. Seleccione el producto.</h4>
								<h4>Productos contratados</h4>
								<?php
									while($fila = mysql_fetch_assoc($res)){
									?>
								<input type="radio" name="id_producto" value="<?php echo $fila["id_producto"]?>"><?php echo $fila["tipo"] . "-" .  $fila["descripcion"]?>
								<br>
								<?php
									}
								?>
							</div>
							<!-- end #tab1 -->
							<div class="tab-content" id="tab2">
								<h4>2. Seleccione la categoria.</h4>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select name='id_categoria' id='id_categoria' class='form-control col-md-7 col-xs-12'>
										<?php
							        	            	$sSQL = "select * from categoria order by descripcion";
												$result = mysql_query($sSQL); 
												while ($row = mysql_fetch_array($result)) {									
													$sel = "";					
													if ($row["id_categoria"] == $id_categoria) { $sel = "selected='selected'"; }
												?>
										<option value="<?php echo $row["id_categoria"] ?>" <?php echo $sel ?>><?php echo $row["descripcion"] ?></option>
									                     <?php
									        	}
									        	?>
									</select>
								</div>
							</div>
							<!-- end #tab2 -->
							<div class="tab-content" id="tab3">
								<h4>3. Describa con detalles el problema presentado para ampliar la información sobre el mismo.</h4>
								<article class="one-half">
									<p class="textarea-block"><label><strong>Descripci&oacute;n</strong></label>
										<textarea name="descripcion" id="contact-message" cols="88" rows="6" required></textarea></p>
									<p class="input-block"><label><strong>Email</strong> (obligatorio</label>
										<input type="email" name="correo" value="" id="contact-email" required></p>
									<p>Recibir las respuestas a este correo electrónico</p>
									<!--<p class="input-block"><label for="contact-subject"><strong>Anexar Archivo</strong></label>
										<input type="file" name="archivo" value="" id="contact-subject"></p>
									<p> Seleccione el archivo que desea anexar al ticket de ayuda. Recuerde que puede subir imágenes,
									 documentos, archivos, etc para complementar la revisión del caso</p>-->
									 <input type="Submit" value="Guardar" name="boton">
									<div class="clear"></div>
								</article>
							</div><!-- end #tab3 -->
						
					</div><!-- end .tabs-container -->
				</form>
				</div>
			</div>
		</section>
		<!-- end #content -->
		<? include "footer.php"; ?>
		<!--[if !lte IE 6]><!-->
		<script src="../../ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>
		<!--[if lt IE 9]> <script src="js/selectivizr-and-extra-selectors.min.js"></script> <![endif]-->
		<script src="js/jquery.ui.widget.min.js"></script>
		<script src="js/respond.min.js"></script>
		<script src="js/jquery.easing-1.3.min.js"></script>
		<script src="js/jquery.fancybox.pack.js"></script>
		<script src="js/jquery.smartStartSlider.min.js"></script>
		<script src="js/jquery.jcarousel.min.js"></script>
		<script src="js/jquery.cycle.all.min.js"></script>
		<script src="js/jquery.isotope.min.js"></script>
		<script src="js/audioplayerv1.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script src="js/jquery.gmap.min.js"></script>
		<script src="js/jquery.touchSwipe.min.js"></script>
		<script src="js/custom.js"></script>
		<!--<![endif]-->
	</body>
</html>