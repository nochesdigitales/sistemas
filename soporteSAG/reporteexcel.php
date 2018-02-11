<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ListadoInscritos.xls");


		$conexion=mysql_connect("localhost","root","12345678");
		mysql_select_db("sag",$conexion);		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Gastronomia :.</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="5" bgcolor="skyblue"><CENTER>
    <strong>Reporte de Ingresos y Egresos</strong>
    </CENTER></td>
  </tr>
  <tr bgcolor="blue">
    <td><strong>Id</strong></td>
    <td><strong>Concepto</strong></td>
    <td><strong>Descripcion</strong></td>
    <td><strong>Monto</strong></td>
    <td><strong>Fecha</strong></td>
    <td><strong>Tipo</strong></td>
    <td><strong>Creado</strong></td>
  </tr>
  
<?PHP
		
$sql=mysql_query("select * from operation");
while($res=mysql_fetch_array($sql)){		

	$id=$res["id"];
	$concept=$res["concept"];
	$description=$res["description"];
	$amount=$res["amount"];
	$date_at=$res["date_at"];				
  $kind=$res["kind"];
  $created_at=$res["created_at"];   
?>  
 <tr>
	<td><?php echo $id; ?></td>
	<td><?php echo $concept; ?></td>
	<td><?php echo $description; ?></td>
  <td><?php echo $amount; ?></td>
	<td><?php echo $date_at; ?></td>
  <td><?php echo $kind; ?></td>
  <td><?php echo $created_at; ?></td>
                  
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>