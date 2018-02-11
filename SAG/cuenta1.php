<?php
session_start();
	include ('controlador.php');
	
	
	if ($boton == "Guardar") {
	$sql = "update clientes set id_cliente where id_cliente=" . $_SESSION['id_cliente'];
	$res = mysql_query($sql) or die(mysql_error());

	}

	//Preparar la consulta
	$consulta = "SELECT * FROM clientes where id_cliente=" . $_SESSION['id_cliente'] ; 
	//Ejecutar la consulta
	$resultado = mysql_query($consulta) or die(mysql_error());
	
	$consulta = "SELECT  pro.descripcion, tip.descripcion as tipo FROM productos_cliente as pdc  INNER JOIN (productos as pro INNER JOIN tipo_productos as tip on pro.id_tipo=tip.id_tipo) on pdc.id_producto=pro.id_producto where id_cliente=" . $_SESSION['id_cliente'];
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
				<div class="three-fourth last">
					<h3>Informacion del cliente</h3>
						<form action="cuenta.php" method="post" >
							<p class="input-block">
								<label for="contact-name"><strong>Cedula/rif</strong> (obligatorio)</label>
								<select name='tipo_persona' id='tipo_persona'>
									<option value="V" <?php if ($tipo_persona == "V") { echo "selected='selected'"; } ?>>V</option>
									<option value="E" <?php if ($tipo_persona == "E") { echo "selected='selected'"; } ?>>E</option>
									<option value="J" <?php if ($tipo_persona == "J") { echo "selected='selected'"; } ?>>J</option>
									<option value="P" <?php if ($tipo_persona == "P") { echo "selected='selected'"; } ?>>P</option>
									<option value="G" <?php if ($tipo_persona == "G") { echo "selected='selected'"; } ?>>G</option>
								</select>
								<input name="rif" type="number" id="rif" placeholder="Número de documento de identificación" required="required"  value="<?PHP echo $rif; ?>" />

								
							</p>
							<p class="input-block">
								<label for="contact-email"><strong>Email</strong> (obligatorio)</label>
								<input type="email" name="email" value="" id="contact-email" required>
							</p>
							<p class="input-block">
								<label for="contact-subject"><strong>Objetivo</strong></label>
								<input type="text" name="subject" value="" id="contact-subject">
							</p>
							<p class="textarea-block">
								<label for="contact-message"><strong>Su Mensaje</strong> 
								</label>
								<textarea name="message" id="contact-message" cols="88" rows="6" required></textarea>
							</p>
							<div class="hidden">
								<label for="contact-spam-check">No escriba en este campo:</label>
								<input name="spam-check" type="text" value="" id="contact-spam-check" />
							</div>
						<input type="submit" value="Enviar">
						<div class="clear"></div>
					</form>
				</div><!-- end .three-fourth.last -->

				
				
				
				
				
				
				
				
				
				
			<!--<div class="one-fourth">
				<h3>Informacion del cliente</h3>
				<div class="one-fourth">
					<?php
					if ($fila = mysql_fetch_assoc($resultado)){
					?>
						<p><?php echo $fila["tipo_persona"] . "-" . $fila["rif"] ?></p>
						<p><?php echo $fila["nombres"] . "-" . $fila["apellidos"]   ?></p>
						<p><?php echo $fila["razon_social"] ?></p>
						<p><?php echo $fila["telefono"]  . " / " . $fila["celular"] ?></p>
						<p><?php echo $fila["correo"] ?></p>
						<p><?php echo $fila["sector_empresarial"] ?></p>
						<p><?php echo $fila["direccion"] ?></p>
						<p><?php echo $fila["ciudad"] . " - Estado - " . $fila["estado"] ?></p>
					<?php
					}
					?>
				</div>
			</div><!-- end .three-fourth.last -->




		</div><!-- end .container -->
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