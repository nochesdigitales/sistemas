<?php
session_start();
include ('controlador.php');
	
$boton = $_POST['boton'];
$p = $_GET['i'];
$e = "";

$sql = "SELECT pdc.id_procli, pdc.fecha, pro.descripcion, tip.descripcion as tipo FROM productos_cliente as pdc INNER JOIN (productos as pro INNER JOIN tipo_productos as tip on pro.id_tipo=tip.id_tipo) on pdc.id_producto=pro.id_producto where id_cliente=" . $_SESSION['id_cliente'];
$res = mysql_query($sql) or die(mysql_error());
?>

<!DOCTYPE html>

<!--[if IE 7]>               
  <html class="ie7 no-js" lang="es">    
   <![endif]-->
<!--[if lte IE 8]>             
 <html class="ie8 no-js" lang="es">    
  <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
 <html class="not-ie no-js" lang="es">  <!--<![endif]-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title>Sistemas Enlaza2</title>
	
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!--[if !lte IE 6]><!-->
		<link rel="stylesheet" href="css/style.css" media="screen" />

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,800,700,400italic|PT+Serif:400,400italic" />
		
		<link rel="stylesheet" href="css/fancybox.min.css" media="screen" />

		<link rel="stylesheet" href="css/video-js.min.css" media="screen" />

		<link rel="stylesheet" href="css/audioplayerv1.min.css" media="screen" />
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
					<h2>Productos Contratados</h2>
					<table>
						<thead>
							<tr>
								<th><h3>Tipo de Producto</h3></th>
								<th style="padding-left:10px"><h3>Descripcion</h3></th>
								<th style="padding-left:30px"><h3>Fecha de Contratacion</h3></th>
							</tr>
						</thead>
						<tbody>
							<?php
							while($fila = mysql_fetch_assoc($res)){
								$fecha = new DateTime($fila["fecha"]);
							?>
							<tr>
								<td style="padding-left:30px"><?php echo $fila["tipo"] ?></td>
								<td style="padding-left:50px"><?php echo $fila["descripcion"] ?></td>
								<td style="padding-left:30px"><?php echo date_format($fecha, 'd/m/Y'); ?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>	
		</section><!-- end #content -->
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