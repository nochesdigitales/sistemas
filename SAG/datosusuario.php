<?php
session_start();
	include ('controlador.php');
	$cedula=$_GET['cedula'];
date_default_timezone_set("America/Caracas");
?>
<!DOCTYPE html>

<!--[if IE 7]>                  <html class="ie7 no-js" lang="es">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="es">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="es">  <!--<![endif]-->

<!-- Mirrored from demo.samuli.me/smartstart/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 03 Feb 2015 20:54:17 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title>.: Gastronomia :.</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
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

<header id="header" class="container clearfix">

	<a href="index-2.html" id="logo">
		<img src="img/LogoPNG Gastro2.png" alt="E2" width="165" style="padding-top:13px">
	</a>


	<nav id="main-nav">
		
		<ul>
			<li class="current">
				<a href="index.html" data-description="todo empieza aqui">Inicio</a>
			</li>
			<li>
				<a href="nosotros.html" data-description="quienes somos">
				Nosotros</a>
			</li>
			<li>
				<a href="#" data-description="lo que ofrecemos">
				Cursos & Talleres</a>
				<ul>
					<li><a href="#">Talleres Cortos</a></li>
					<li><a href="#">Cursos</a></li>
					<li><a href="#">Cursos Intensivos</a></li>
					<li><a href="#">Diplomados</a></li>
					<li><a href="#">Modulos</a></li>
				</ul>
			</li>
			<li>
				<a href="contacto.html" data-description="su opinion">
				Contactenos</a>
			</li>
			<li>
				<a href="soporte.php" data-description="Calificaciones">
				Escuela</a>
			</li>
		</ul>

	</nav><!-- end #main-nav -->
	
</header><!-- end #header -->

<section id="content" class="clearfix">

	<div class="container clearfix">

		<header class="page-header">
		
			<h1 class="page-title">Datos de Usuario</h1>
			
		</header><!-- end .page-header -->

	</div><!-- end .container -->

	<!--<section id="map">
		<p class="container"></p>
	</section><!-- end #map 
-->
	<div class="container clearfix">
		
		<div class="one-fourth">

			<h3>Informaci&oacute;n de contacto</h3>

			<p>Telefono: (0274) 263 3049<br/>
			(0424) 777-4919 <br>
				E-mail: rafael.perez@iutcm.edu.ve<br/>
				Web:<span lang="es"> </span>www.nochesdigitales.com.ve</p>
			
		</div><!-- end .one-fourth -->
		
		<div class="three-fourth last">

			<h3>Formulario de Estudiante</h3>

			<form action="" method="post" class="contact-form">
			
				<p class="input-block">
					<label for="contact-name"><strong>Cedula</strong> </label>
				  <input type="text" name="Cedula" value="" id="contact-name" readonly value="<?php echo $cedula; ?>">
				</p>

			  <p class="input-block">
					<label for="contact-email"><strong>Nombre</strong> </label>
					<input type="email" name="Nombre" value="" id="contact-email" readonly>
				</p>
				
				<p class="input-block">
					<label for="contact-subject"><strong>Telefono</strong></label>
					<input type="text" name="Telefono" value="" id="contact-subject" readonly>
				</p>

				<p class="input-block">
					<label for="contact-email"><strong>Email</strong> </label>
					<input type="email" name="Email" value="" id="contact-email" readonly>
				</p>
                
                <p class="input-block">
					<label for="contact-email"><strong>Direcci&oacute;n</strong> </label>
				  <input type="email" name="Direccion" value="" id="contact-email" readonly>
				</p>
			
            <p class="input-block">
					<label for="contact-email"><strong>Clave</strong></label>
			  <input type="email" name="Direccion" value="" id="contact-email" >
			  </p>
                
                <p class="input-block">
					<label for="contact-email"><strong>Confirmar Clave</strong> (obligatorio)</label>
				  <input type="email" name="Direccion" value="" id="contact-email" >
				</p>
			  <div class="hidden">
					<label for="contact-spam-check">No escriba en este campo:</label>
					<input name="spam-check" type="text" value="" id="contact-spam-check" />
				</div>

				<a href="nosotros.html" data-description="quienes somos" class="button">
				Guardar</a>
				<a href="soporte.php" data-description="quienes somos" class="button">
				Salir</a>
				<div class="clear"></div>

			</form>

		</div><!-- end .three-fourth.last -->

	</div><!-- end .container -->
		
</section><!-- end #content -->

<footer id="footer" class="clearfix">

	<div class="container">

		<div class="three-fourth">

			<nav id="footer-nav" class="clearfix">

				<ul>
					<li><a href="#">Inicio</a></li>
					<li><a href="#">Nosotros</a></li>
					<li><a href="#">Cursos & Talleres</a></li>
					<li><a href="#">Contactenos</a></li>
					<li><a href="#">Escuela</a></li>

				</ul>
				
			</nav><!-- end #footer-nav -->

			<ul class="contact-info">
				<li class="address"></li>
				<li class="phone">(0274) 263-3049 / (0424) 777 4919</li>
				<li class="email"><a href="rafael.perez@iutcm.edu.ve">
				rafael.perez@iutcm.edu.ve</a></li>
			</ul><!-- end .contact-info -->
			
		</div><!-- end .three-fourth -->

		<div class="one-fourth last">

			<span class="title">Permanezca conectado</span>

			<ul class="social-links">
				<li class="twitter"><a href="#">Twitter</a></li>
				<li class="facebook"><a href="#">Facebook</a></li>
				<li class="skype"><a href="#">Skype</a></li>
			</ul><!-- end .social-links -->

		</div><!-- end .one-fourth.last -->
		
	</div><!-- end .container -->

</footer><!-- end #footer -->

<footer id="footer-bottom" class="clearfix">

	<div class="container">

		<ul>
			<li>www.nochesdigitales.com.ve</li>
			<!--<li><a href="#">Legal Notice</a></li>-->
			<li><a href="#">Terminos y condiciones</a></li>
		</ul>

	</div><!-- end .container -->

</footer><!-- end #footer-bottom -->

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

<!-- Mirrored from demo.samuli.me/smartstart/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 03 Feb 2015 20:54:17 GMT -->
</html>