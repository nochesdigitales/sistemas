<?php
session_start();
include ('controlador.php');
	
date_default_timezone_set('America/Caracas');
setlocale(LC_MONETARY, 'es_ES');

$cedula = $_POST['cedula'];
$clave = $_POST['clave'];
$_SESSION['cedula'] = "";

if(!$cedula == "" and !$clave == "" ){
	$sql = "select cedula from alumno where cedula = '" . $cedula . "' and clave = '" . $clave . "'";
	$res = mysql_query($sql);
	
	if (mysql_num_rows($res) > 0) {
		if ($fila = mysql_fetch_assoc($res)) { $_SESSION['cedula'] = $fila['clave']; } 
		echo "<script>window.location='notas.php?cedula=$cedula'</script>;";
	
    	}
	else {
		$e = "CombinaciÃ³n Usuario/ContraseÃ±a Incorrecta";
	}
}

?>
<!DOCTYPE html>

<style type="text/css">
.auto-style1 {
	border-collapse: collapse;
	border: 1px solid #0066FF;
	background-color: #0066FF;
}
</style>

<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title>.: Gastronomia :.</title>
	
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

<section id="content" class="container clearfix">

	<header class="page-header">
	
		<h1 class="page-title">Soporte T&eacute;cnico</h1>

	</header><!-- end .page-header -->

	<section style="text-align:center">
	
		<article>
			<form action="" method="post">
				<div>
						<h2 class="page-title" >Iniciar Sesion</h2>
						<p ><label><strong>Usuario</strong> </label>
							<input type="text" name="cedula" class="sesion" >
						</p>
						<p><label><strong>Contrase&ntilde;a</strong></label>
							<input type="password" name="clave" value="" id="" required class="sesion">
						</p>
						<input type="submit"  value="Entrar" >
				</div>
			</form>
			<?php if ($e != "") { ?>
				<p class="error"><strong>Error</strong> <?php echo $e; ?></p>
			<?php } ?>
						
		</article><!-- end .one-half (Altered) -->

		<!--<article class="one-half">
			<form action="soporte.php" method="post">
				<div>
						<h2 class="page-title" >Cliente Nuevo</h2>
						<p class="input-block">
							<label for=""><strong>Nombre</strong> </label>
							<input type="text" name="nombre" >
						</p>
						<p class="input-block">
							<label for="contact-name"><strong>Correo</strong></label>
							<input type="email" name="correo" value="" id="" required>
						</p>
						<input type="submit"  value="Entrar" >
				</div>
			</form>
			<?php if ($e != "") { ?>
				<p class="error"><strong>Error</strong> <?php echo $e; ?></p>
			<?php } ?>
						
		</article><!-- end .one-half (Altered) -->

		
	</section><!-- end #portfolio-items -->
	
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