<?php
// Zona Horaria
date_default_timezone_set('America/Caracas');
// Libreria ClassPDF
 require_once('pdf-php/class.ezpdf.php');
// Tipo de Hoja, ejm: A4, Carta, Oficio, etc 
 $pdf =& new Cezpdf('a4');
// Tipo de Letra del Reporte 
 $pdf->selectFont('pdf-php/fonts/courier.afm');
 $pdf->ezSetCmMargins(1,1,1.5,1.5);

// Conexion con el Usuario y Clave de AppServer
 $conexion = mysql_connect("localhost", "root", "12345678");
// Conexion con la Base de Datos
 mysql_select_db("sag", $conexion);
// Seleccion de la Tabla, se pueden usar consultas SQL
 $queEmp = "SELECT * FROM notas";
 $resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
 $ixx = 0; 
 while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('CODIGO1'=>$ixx));
 }
 $titles = array(

// Campos de la Tabla (Tabla) y (Etiquetas)
				'idcurso'=>'<b>Id Curso</b>',				
				'idfacilitador'=>'<b>Facilitador</b>',	
				'nommodulo'=>'<b>Nombre</b>',
				'idalumno'=>'<b>Cedula</b>',		
				'nombre'=>'<b>Alumno</b>',	
				'nota'=>'<b>Nota</b>'
					
			);
 $options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);

// Insertar Imagenes en el Reporte
 $pdf->ezImage("img/img.jpg", 0, 150, 'none', 'left');
// Insertar Texto en el Reporte 
 $pdf->ezText("Reporte de Notas", 12); 
 $pdf->ezText($txttit, 12);
 $pdf->ezTable($data, $titles, '', $options);
 $pdf->ezText("\n\n\n", 10);
// Insertar Hora y Fecha en el Reporte 
 $pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
 $pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
 $pdf->ezStream();
?> 