<?php
session_start();
	include ('controlador.php');
		
	$boton=$_POST["boton"];
	
	$tipo_persona = $_POST['tipo_persona'];
	$rif = $_POST['rif'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$razon_social = $_POST['razon_social'];
	$telefono = $_POST['telefono'];
	$celular = $_POST['celular'];
	$correo = $_POST['correo'];
	$direccion = $_POST['direccion'];
	$ciudad = $_POST['ciudad'];
	$estado = $_POST['estado'];
		
	if($boton == "Guardar") {
	$sql="update clientes set tipo_persona='$tipo_persona', rif='$rif', nombres='$nombres', apellidos='$apellidos', razon_social='$razon_social', telefono='$telefono',  celular='$celular', correo='$correo', direccion='$direccion', ciudad='$ciudad', estado='$estado'  where  id_cliente=" . $_SESSION['id_cliente'];
	mysql_query($sql);
	
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
			<div class="">
				<h2>Informacion del cliente</h2>
				<div class="one-half">
					<?php
					if ($fila = mysql_fetch_assoc($resultado)){
					?>
					<form method="post" action="cuenta.php">
						<table style="width: 100%">
							<tr>
								<td><h4><strong> Tipo de Persona*</strong></h4></td>
								<td><select name='tipo_persona' id='tipo_persona' class='form-control col-md-7 col-xs-12'>
									<option value="V" <?php if ($tipo_persona == "V") { echo "selected='selected'"; } ?>>V</option>
									<option value="E" <?php if ($tipo_persona == "E") { echo "selected='selected'"; } ?>>E</option>
									<option value="J" <?php if ($tipo_persona == "J") { echo "selected='selected'"; } ?>>J</option>
									<option value="P" <?php if ($tipo_persona == "P") { echo "selected='selected'"; } ?>>P</option>
									<option value="G" <?php if ($tipo_persona == "G") { echo "selected='selected'"; } ?>>G</option>
								</select></td>
							</tr>
							<tr>
								<td><h4><strong> Cedula *</strong></h4></td>
								<td><h4><input name="rif" required="required" value="<?php echo $fila["rif"] ?>"></h4></td>

							</tr>
							<tr>
								<td><h4><strong>Nombre *</strong></h4></td>
								<td><h4><input name="nombres" required="required" value="<?php echo $fila["nombres"]?>"/></h4></td>

							</tr>
							<tr>
								<td><h4><strong>Apellidos *</strong></h4></td>
								<td><h4><input name="apellidos"  required="required" value="<?php echo $fila["apellidos"]?>"/></h4></td>
							</tr>
							<tr>
		 						<td><h4><strong>Razon Social *</strong></h4></td>
								<td><h4><input  name="razon_social"  required="required" value="<?php echo $fila["razon_social"] ?>"/></h4></td>
							</tr>
							<tr>
								<td><h4><strong>Telefono de oficina *</strong></h4></td>
								<td><h4><input name="telefono" required="required" value="<?php echo $fila["telefono"] ?>"/></h4></td>
							</tr>
							<tr>
								<td><h4><strong>Celular *</strong></h4></td>
								<td><h4><input name="celular" required="required" value="<?php echo $fila["celular"] ?>"/></h4></td>
							</tr>
							<tr>
								<td><h4><strong>Correo *</strong></h4></td>
								<td><h4><input name="correo" required="required" value="<?php echo $fila["correo"]?>"/></h4></td>
							</tr>
							<tr>
								<td><h4><strong>Direcci&oacute;n *</strong></h4></td>
								<td><h4><input name="direccion" required="required" value="<?php echo $fila["direccion"] ?>"/></h4></td>
							</tr>
							<tr>
								<td><h4><strong>Ciudad *</strong></h4></td>
								<td><h4><input name="ciudad" required="required" value="<?php echo $fila["ciudad"]?>"/></h4></td>
							</tr>
							<tr>
								<td><h4><strong>Estado *</strong></h4></td>
								<td><h4><input name="estado"  required="required" value="<?php echo $fila["estado"]?>"/></h4></td>
							</tr>
						</table>
						 <input type="submit" name="boton" value="Guardar" />
					</form>
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