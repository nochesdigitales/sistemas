<?php
$host="localhost"; 
$user="root"; // usuario
$pass="12345678"; // clave de root 
$dbname="sag"; // Nombre de la base de ddatos ojo cambiar 

$conexion=mysql_connect($host,$user,$pass) or die ("Problemas con el Servidor");
mysql_select_db($dbname,$conexion) or die ("Problemas en la Base de Datos"); 

date_default_timezone_set('America/Caracas');
?>
  
