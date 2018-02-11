<?php
#de aqui me base para el proyecto:
#evilnapsis.com
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gastronomia IUTCM</title>
    <link href="res/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="res/font-awesome/css/font-awesome.min.css">
    <script src="res/js/jquery.min.js"></script>
<script src="res/plugins/morris/raphael-min.js"></script>
<script src="res/plugins/morris/morris.js"></script>
  <link rel="stylesheet" href="res/plugins/morris/morris.css">
  <link rel="stylesheet" href="res/plugins/morris/example.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
<script src="magia.js"></script>
<!-- 
este meta es para adaptar la pantalla a diferentes dispositivos como pc,laptop o celular 
-->
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />

  </head>
 
  <body>
<<nav class="navbar navbar-default menu ">
  <div class="container ">
  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      	<button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle">
				<span class="fa fa-gear"></span>
	</button>
    <a id="link" class="navbar-brand" href="./">Gastronomía</a></div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
<li class="<?php if(isset($active) and $active == 1){ echo 'active';} ?>"><a href="inicio.php">HOME</a></li>
				<li class="dropdown <?php if(isset($active) and $active == 2){ echo 'active';} ?>">
				<a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-sitemap fa-fw"></i> Registros</a>				</li>
				<li class="dropdown <?php if(isset($active) and $active == 3){ echo 'active';} ?>">
				<a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-briefcase fa-fw"></i> Busquedas</a>				</li>				
				<li class="dropdown <?php if(isset($active) and $active == 4){ echo 'active';} ?>">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-th"></i> Mas opciones</a>
				</li>
  </ul>
			<ul class="nav navbar-nav navbar-right user-nav">
				<li class="dropdown profile_menu">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle"><img width="25px" alt="Avatar" src="assets/img/avatars/empleado.png"><span>></span><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="../SAGAA 2.0/menuadmin.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a></li>
      </ul>
    </div>
  </div>
</nav>
<div>

      
      <?php 
  View::load("index");
?>


<script src="res/bootstrap/js/bootstrap.min.js"></script>


  </body>
</html>
