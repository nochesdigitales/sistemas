<?php
date_default_timezone_set('America/Caracas');
//Incluimos Librerias del sistema
require_once("../inc/config.php");
require_once('fpdf.php');

$srtLink = mysql_connect("$strServidor","$strUsuario","$strClave") 
				or die ("ERROR: No se logro la conexión con el Servidor.");

	mysql_select_db($strBD,$srtLink) or die ("Error: No se puede seleccionar la base de datos.");


class PDF extends FPDF
{




//Cabecera de página
   function Header()
   {
    //Arial 
	$this->SetFont('Arial','B',12);
	//Logo
	$this->Image('../img/img.jpg',80,38,50);
    //Salto de linea
    $this->Ln(3);
		
    $this->SetX(25);
	$this->Cell(40,6,'',0,0,'C');
	$this->SetFont('Arial','BU',10);
	$this->Cell(60,6,'',0,0,'C');
$this->Ln(4);
   }
   
}



$pdf=new PDF('P','mm','A4'); 
//Contenido
$pdf->SetFont('Arial','B',7);
$pdf->SetY(280);
$pdf->SetX(14);
	$cedula = $_POST['cedula'];

$strQuery = "SELECT * FROM inscripciones WHERE inscripciones.cedula='$cedula'";
		$strResultado = mysql_query($strQuery) or die (mysql_error());
		$strDatos = mysql_fetch_array($strResultado);


			//Variables
			$strfecha=date("d/m/Y");
			$stridinsc = $strDatos['idinsc'];
			$stridcurso = $strDatos['idcurso'];
			$strperiodo	 = $strDatos['periodo'];
			$strcedula = $strDatos['cedula'];
			$strfechacurso = $strDatos['fechacurso'];
			$stridfacilitador = $strDatos['idfacilitador'];
			$strnombre = $strDatos['nombre'];

			
setlocale (LC_TIME,"spanish");
//$strFecha = str_replace("De","del",strtoupper(strftime("%d de %B de %Y")));

$pdf->Ln(20);
$pdf->SetFont('Arial','',12);
$pdf->Multicell
(186,5,"
ESCUELA DE GASTRONOMIA IUTCM
Mérida
",0,'C',0);

$pdf->Ln(20);
$pdf->SetFont('Arial','B',12);
$pdf->Multicell
(186,6,"



CONSTANCIA DE ASISTENCIA
",0,'C',0);

$pdf->SetFont('Arial','',11);
$pdf->Ln(2);
$pdf->SetX(14);
$pdf->Multicell(186,7,"
A quien le pueda Interesar


Por medio de la presente se hace constar que el ciudadano $strnombre titular de la cedula de identidad Nro V- $strcedula, es estudiante del de la Escuela de Gastronomía IUTCM y el mismo asistió a la Escuela para un evento programado, agradeciendo de antemano la colaboración prestada

Constancia que se expide en la ciudad de Mérida, a los $strfecha.   

Sin otro particular a que hacer referencia, me suscribo de Ud. (s). 

Atentamente,

 ",0,'J',0);

$pdf->Ln(15);
$pdf->SetFont('Arial','',11);
$pdf->Multicell
(186,4,"
Lcda. Milagros Zambrano
Coordinadora Escuela de Gastronomía IUTCM
Extensión  Mérida


",0,'C',0);
$pdf->Ln(10);
$pdf->SetX(14);   
$pdf->Output();

?>
