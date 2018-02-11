<?php
session_start();
	include ('controlador.php');
	$cedula=$_GET['cedula'];
	
	//Preparar la consulta
	$consulta = "SELECT * FROM nota"; 
	//Ejecutar la consulta
	$resultado = mysql_query($consulta) or die(mysql_error());
	
	$consulta1 = "SELECT * FROM alumno where cedula='$cedula'"; 
  	$resultado1 = mysql_query($consulta1) or die(mysql_error());
  	$total1 = mysql_num_rows($resultado1);
	
?>
<!DOCTYPE html>

<style type="text/css">
.auto-style1 {
	border-collapse: collapse;
	border: 1px solid #0066FF;
	background-color: #0066FF;
}
body,td,th {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	color: #000000;
}
body {
	background-color: #900F11;
}
</style>


<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		

		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title>.: Gastronomia :.</title>
	
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!--[if !lte IE 6]><!-->
		<link rel="stylesheet" href="css/style.css" media="screen" />
        <link rel="stylesheet" href="css/bootstrap.css" />
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
	
		<h1 class="page-title">Calificaciones</h1>

	</header><!-- end .page-header -->

	<section style="text-align:center">
	
		<article>
                 		
								<h3>&nbsp;</h3>
								</div>
								<div ><form name="form2" method="post" action="">
 						<?php
                        while($fila = mysql_fetch_assoc($resultado1)){
                        ?>
						<p>Perfil del Estudiante:</p>
						<p>Cedula: <?php echo $fila["cedula"] ?></p>
						<p>Nombre: <?php echo $fila["nombre"] ?></p>
						<p hidden="">Clave: <?php echo $fila["telefono"] ?> </p>
						<p hidden="">Clave: <?php echo $fila["email"] ?> </p>
						<p hidden="">Clave: <?php echo $fila["direccion"] ?> </p>
						<p hidden="">Clave: <?php echo $fila["clave"] ?> </p>
						<?php
                        }
                        ?> 
                          </form>
									<form name="form" method="post" action="">
                                    
					<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												
											</thead>
											<tbody>									
												<?php
												while($fila = mysql_fetch_assoc($resultado)){
												?>
												<tr >											
													<td><p><span>Modulo de Curso</span></p></td>
													<td><p><span>Calificacion</span></p></td>
												</tr>
												<tr >											
													<td><p><span>Ayudante de Cocina</span></p></td>
													<td><p><span><?php echo $fila["nota1"] ?></span></p></td>
												</tr>
												<tr >											
													<td><p><span>Cocinero A y B</span></p></td>
													<td><p><span><?php echo $fila["nota2"] ?></span></p></td>
												</tr>
												<tr >											
													<td><p><span>Primer Cocinero</span></p></td>
													<td><p><span><?php echo $fila["nota3"] ?></span></p></td>
												</tr>
												<tr >											
													<td><p><span>Chef Internacional</span></p></td>
													<td><p><span><?php echo $fila["nota4"] ?></span></p></td>
												</tr>
                								<tr >											
													<th><p><span><center>Promedio</span></center></p></th>
													<th><p><span><center><?php echo (($fila["nota1"]) + ($fila["nota2"]) + ($fila["nota3"]) + ($fila["nota4"]))/4 ?></span></center></p></th>
												</tr>	
											
												<?php
												}
												?>											
											</tbody>
										</table>
								  </form>
								</div>
							</div><!--/.module-->
							
						<a href="datosusuario.php?cedula=$cedula" data-description="quienes somos" class="button">
				Datos de Usuario</a>
				<a href="soporte.php" data-description="quienes somos" class="button">
				Salir</a>
				<div class="clear"></div>
						<br/> 
                             
                    
                     
                     
          		</div>




						
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