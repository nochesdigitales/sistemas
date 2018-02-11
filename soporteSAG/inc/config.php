<?php
session_start();
//Variables Globales
	$strCharset	     = "iso-8859-1";
	$strTitulo  	 = "IUTCM \" gastronomia \"";
	$strAutor 		 = "Rafa";

//URL del Sitio
	$strURL = "http://localhost/sagaa 2.0";
//Variables de Conexion a la Base de Datos
	$strServidor = "localhost";
	$strUsuario  = "root";
	$strClave    = "12345678";
	$strBD       = "sag"; 
//Query de Conexion
	$strConex = mysql_connect("$strServidor","$strUsuario","$strClave") 
				or die ("ERROR: No se logro la conexión con el Servidor.");

	mysql_select_db($strBD,$strConex) 
	or die ("Error: No se puede seleccionar la base de datos.");

//Fecha del Servidor
	setlocale (LC_TIME,"spanish");
	//$strFecha = str_replace("De","de",ucwords(strftime("%A, %d de %B de %Y")));
?>