<?php
date_default_timezone_set("America/Caracas");
	include ('conexion.php');
	
	$g = $_GET["g"];
	$p = $_GET['i'];
	
	if($g == "1") {
		$cedula = $_POST['cedula'];
		$nombre = $_POST['nombre'];
		$edad = date("Y/m/d")  - $_POST['fechanac']/65/24/60/60/1000;	
		$sexo = $_POST['sexo']; 
		$fechanac = $_POST['fechanac'];
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];
		$email = $_POST['email'];
		$clave = $_POST['clave'];

		 $sql = "insert into alumno (cedula, nombre, edad, sexo, fechanac, telefono, direccion, email, clave) values ('$cedula', '$nombre', '$edad', '$sexo', '$fechanac', '$telefono', '$direccion', '$email', '$clave')";
		
		if($p != "") {
			$sql = "update alumno set cedula='$cedula', nombre='$nombre', edad='$edad', sexo='$sexo', fechanac='$fechanac', telefono='$telefono', direccion='$direccion', email='$email', clave='$clave' where cedula='$cedula'";
		}
		else {
			 $sql;
		}

		if(mysql_query($sql)) {

			echo '<script>setTimeout(function(){swal({title:"Buen trabajo!!!",text:"Datos GUARDADOS Correctamente",type:"success"}, 
													function(isConfirm){location.href="listaalumnos.php";});}, 100);</script>';
		}
		else {
		 $sql;
		}
	}
	else {	
		$m = "Agregando nuevo registro";
		
		if($p != "") {
			//
			$m = "Editando registro";
			//Preparar la consulta
			$consulta = "SELECT * FROM alumno WHERE cedula='$p'"; 
			//Ejecutar la consulta
			$resultado = mysql_query($consulta) or die(mysql_error());
			
			if ($registro = mysql_fetch_array($resultado)) {
				$cedula = $registro["cedula"];
				$nombre = $registro["nombre"];
				$edad = $registro["edad"];
				$sexo = $registro["sexo"];
				$fechanac = $registro["fechanac"];
				$telefono = $registro["telefono"];
				$direccion = $registro["direccion"];
				$email = $registro["email"];
				$clave = $registro["clave"];	
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/sweetalert/sweetalert.css">
    	<script src="bootstrap-3.3.7/sweetalert/sweetalert.min.js"></script>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>.:  Gastronomía :.</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="assets/sweetalert/sweetalert.css">
 		<script src="assets/sweetalert/sweetalert.min.js"></script>
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css">

    <link rel="stylesheet" href="assets/css/main.css">
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
	</head>

	<body class="skin-2">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Soporte SAG
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
					  <li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									Perfiles
								</li>

								<li class="dropdown-content">
								  <ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														Preinscripciones ...
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Usuarios Registrados ...
											</a>
										</li>

									<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														Sugerencias ...
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
								    </li>

								  </ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										Ver Todos ...
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
						  </ul>
					  </li>



						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Bienvenido,</small>
									Rafa
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Configuración
								  </a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Perfil
								  </a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-power-off"></i>
										Salir
									</a>
								</li>
						  </ul>
					  </li>
				  </ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>


<!-- Navega-->
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->



<!--  Inicio del Menu -->
				<ul class="nav nav-list">
					<li class="active">
						<a href="error404.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Soporte </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Académico
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="listaalumnos.php">
								<i class="menu-icon fa fa-caret-right"></i>
									Registro de Estudiantes
								</a>
							</li>

							<li class="">
								<a href="listacursos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Registro de Cursos
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="listafacilitador.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Registro de Facilitadores
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="listainscritos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Inscripción
								</a>

								<b class="arrow"></b>
							</li>




						</ul>
					</li>

					<li class="">
						<a href="listanotasfil.php" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Calificaciones </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						<li class="">
								<a href="buscadornotasfacilitador.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Notas de Facilitador
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">

								<a href="listanotaschef.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Registro de Notas
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="buscadornotasperiodo.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Notas por Periodo
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="buscadornotascurso.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Consulta de Notas
								</a>

								<b class="arrow"></b>
							</li>
              <li class="">
								<a href="buscadornotascedula.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Notas por Cedula
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="buscadornotasnombre.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Notas por Nombre
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Listados </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="buscadoraluced.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Buscador por Cedula
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="buscadoralunom.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Buscador por Nombre
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="buscadorcursos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Buscador por Periodo
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="buscadordefechas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Buscador por Fechas
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="buscadornotascurso.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Notas por Curso
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
									<span class="menu-text"> Constancias </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="constanciaestudio.php" target="_blank">
									<i class="menu-icon fa fa-caret-right"></i>
									Estudio
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="constanciaasistencia.php" target="_blank">
									<i class="menu-icon fa fa-caret-right"></i>
									Asistencia
								</a>

								<b class="arrow"></b>
							</li>





						</ul>
					</li>

<!--
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
									<span class="menu-text"> Búsquedas </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="error404.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Alumnos por Nombre
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error404.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Alumnos por Cedula
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error404.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Alumnos por Cursos
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="error404.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Cursos
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error404.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Facilitadores
								</a>

								<b class="arrow"></b>
							</li>


						</ul>
					</li>
					-->
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
									<span class="menu-text"> Reportes </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="reporteinscripcion.php" target="_blank">
									<i class="menu-icon fa fa-caret-right"></i>
									Inscritos
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="reportealumnos.php" target="_blank">
									<i class="menu-icon fa fa-caret-right"></i>
									Alumnos
							  </a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="buscadordefechas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Por Fecha
							  </a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="reportefacilitadores.php" target="_blank">
									<i class="menu-icon fa fa-caret-right"></i>
									Por Facilitadores
							  </a>

								<b class="arrow"></b>
							</li>


						</ul>
					</li>

				  <li class="">
						<a href="listausuarios.php">
							<i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Usuarios

							<span class="badge badge-transparent tooltip-error" title="2 Important Events">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span>
							</span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text"> Administración </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="listaingresos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Gestión de Ingresos
							  </a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="listaegresos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Gestión de Egresos
							  </a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="correla.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Correlación I/E
							  </a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Pagos Pendientes
							  </a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#l">
									<i class="menu-icon fa fa-caret-right"></i>
									Crédito
							  </a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="reporteingresos.php" target="_blank">
									<i class="menu-icon fa fa-caret-right"></i>
									Ingresos
							  </a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="reporteegresos.php" target="_blank">
									<i class="menu-icon fa fa-caret-right"></i>
									Egresos
							  </a>

								<b class="arrow"></b>
							</li>

					  </ul>
					</li>

					<li class="">
						<a href="error-404.html" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-o"></i>

							<span class="menu-text">
								Configuración

							<span class="badge badge-primary">5</span>
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="bitacorafinal.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Bitácora
							  </a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error404.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Datos Empresa
							  </a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error404.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Respaldar BD
							  </a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error404.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Restaurar BD
							  </a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="error404.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Vaciar de Caches
							  </a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->


<!-- Final del Menu-->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
				  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Inicio</a>
							</li>
							<li class="active">Soporte Sistema de Gastronomía 1.12</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Buscar ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

	

						<div class="page-header">
							<h1>
								Gastronomía
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									administración &amp; soporte
								</small>
						  </h1>
				  </div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- CONTENIDO DE LA PAGINA -->
								

								<div class="col-xs-12">




 <section id="main-content">
          <section class="wrapper">

          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
    
                     
                    
                    
                    
                   <div class="module-head">
				
								</div>
								<div class="module-body table">
									<form class="form-horizontal row-fluid" action="edicionalumnos.php?i=<?php echo $p ?>&g=1" method="post">
									
									<div class="row">
										<div class="col-md-12">
											Cedula:
										</div>
										<div class="col-md-4">
											<input type="text"  name="cedula"  id="cedula" placeholder="Ingrese la Cedula" class="form-control round-form"  value="<?php echo $cedula; ?>" onkeypress="return soloNumeros(event)">
										</div>
										<div class="col-md-8">
											
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											Nombre:
										</div>
										<div class="col-md-8">
											<input type="text" name="nombre" id="nombre"  placeholder="Ingrese el Nombre" class="form-control round-form" value="<?php echo $nombre; ?>" onblur="aMayusculas(this.value,this.id)" onkeypress="return soloLetras(event)">
										</div>
										<div class="col-md-4">
											
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											Fecha de Nacimiento:
										</div>
										<div class="col-md-4">
											<input type="date" id="fechanac" name="fechanac"  placeholder="Ingrese la Fecha" class="form-control round-form" onblur="edad(this.value)" value="<?php echo $fechanac; ?>" >
										</div>
										<div class="col-md-8">
											
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											Edad:
										</div>
										<div class="col-md-4">
									
											<input type="text" id="edad2" name="edad2"  placeholder="Ingrese la Edad" class="form-control round-form" value="<?php echo $edad; ?>" readonly>
										</div>
										<div class="col-md-8">
											
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											Sexo:
										</div>
										<div class="col-md-8">
											<select name="sexo" id="sexo" class="form-control round-form" >
                                                <option value="S" <?PHP if($sexo=='S'){ echo 'selected="selected"'; } ?> >.: SELECCIONE SEXO :.</option>
                                                <option value="E" <?PHP if($sexo=='F'){ echo 'selected="selected"'; } ?> >FEMENINO</option>
                                                <option value="A" <?PHP if($sexo=='M'){ echo 'selected="selected"'; } ?> >MASCULINO</option>
                                            </select> 
										</div>
										<div class="col-md-4">
											
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											Dirección:
										</div>
										<div class="col-md-8">
											<textarea name="direccion" id="direccion"  placeholder="Ingrese la Dirección" class="form-control round-form" onKeyPress="Nombres()" value="<?php echo $direccion; ?>" onblur="aMayusculas(this.value,this.id)"></textarea>
										</div>
										<div class="col-md-4">
											
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											Teléfono:
										</div>
										<div class="col-md-4">
											<input type="text" id="telefono" name="telefono"  placeholder="Ingrese el Teléfono" class="form-control round-form" onkeypress="return soloNumeros(event)" value="<?php echo $telefono; ?>">
										</div>
										<div class="col-md-8">
											
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											Email:
										</div>
										<div class="col-md-8">
											<input type="email" id="email" name="email"  placeholder="Ingrese el Email" class="form-control round-form" onKeyPress="Nombres()" value="<?php echo $email; ?>" onblur="aMayusculas(this.value,this.id)">
										</div>
										<div class="col-md-4">
											
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											Clave:
										</div>
										<div class="col-md-4">
											<input type="password" id="clave" name="clave"  placeholder="Ingrese la Clave" class="form-control round-form" onKeyPress="Nombres()" value="<?php echo $clave; ?>" onblur="aMayusculas(this.value,this.id)">
										</div>
										<div class="col-md-8">
											
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-12">
											<button type="submit" name="boton" value="Guardar" class="btn btn-primary">
												Guardar
											</button>	
											<a href="listaalumnos.php" class="btn btn-danger">Regresar</a>									
										</div>
										
									</div>
									</form>
								</div>
							</div><!--/.module-->
							
						<br/> 
                             
                     
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
          	<!-- INLINE FORM ELELEMNTS -->
   
          	
          	
		</section>

  


								</div>	






								<!-- FIN DE LA PAGINA -->
							</div><!-- /.col -->
						</div><!-- /.row -->
			  </div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">NochesDigitales</span>
							 &copy; 2017-2019
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">

		
		
	function edad(Fecha){
	fecha = new Date(Fecha)
	hoy = new Date()
	ed = parseInt((hoy -fecha)/365/24/60/60/1000)
	document.getElementById('edad2').value =  ed + " años"
	}

	function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
	 function soloNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " 0123456789";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
	function aMayusculas(obj,id){
    obj = obj.toUpperCase();
    document.getElementById(id).value = obj;
}

			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				  });
				}
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>
		<script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {     
                   	 $('#sidebar, #content').toggleClass('active'); 
                 });
             });


    	var FormRegEstu = document.getElementById("FormRegEstu");
    	window.onload = iniciar;

    function iniciar(){

    		document.getElementById("Guardar").addEventListener('click', validacion, false);
    	}
		
    function ValidaCedula(){

    		var Cedula = document.getElementById("Cedula").value;

    		if( Cedula == null || Cedula.length == 0 || /^\s+$/.test(Cedula) ){
				alert("Este Campo no puede ser vacio");
			  	return false;
			}
			else if ( isNaN(Cedula) ){

				alert("Este Campo no puede contener letras");
			  	return false;
			}
			return true;
    	}
    function ValidaNombres(){

    		var Nombres = document.getElementById("Nombres").value;

			if( Nombres == null || Nombres.length == 0 || /^\s+$/.test(Nombres) ){
				alert("Este Campo no puede ser vacio");
			  	return false;
		}
			return true;
    	}
    function ValidaApellidos(){

    		var Apellidos = document.getElementById("Apellidos").value;

			if( Apellidos == null || Apellidos.length == 0 || /^\s+$/.test(Apellidos) ){
				alert("Este Campo no puede ser vacio");
			  	return false;
		}
			return true;
    	}
    function ValidaTelefono(){

    		var Telefono = document.getElementById("Telefono").value;

			if( Telefono == null || Telefono.length == 0 || /^\s+$/.test(Telefono) ){
				alert("Este Campo no puede ser vacio");
			  	return false;
		}
			return true;
    	}
    function ValidaCorreo(){

    		var Correo = document.getElementById("Correo").value;

			if( Correo == null || Correo.length == 0 || /^\s+$/.test(Correo) ){
				alert("Este Campo no puede ser vacio");
			  	return false;
		}
			
			return true;
    	}
    function ValidaNPago(){

    		var NPago = document.getElementById("NPago").value;

			if( NPago == null || NPago.length == 0 || /^\s+$/.test(NPago) ){
				alert("Este Campo no puede ser vacio");
			  	return false;
		}
		else if ( isNaN(NPago) ){
				alert("Este Campo no puede contener letras");
			  	return false;
			}
			return true;
    	}
    
	function validacion(e){

			if(ValidaCedula() && ValidaNombres() && ValidaApellidos() && ValidaTelefono() && ValidaCorreo() && ValidaNPago()){

				return true;
			}else{

				e.preventDefault();
				return false;
			}
	}
</script>
	</body>
</html>