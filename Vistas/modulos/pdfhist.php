<?php
ob_end_clean();
while (ob_get_level())
header("Content-Encoding: None", true);
require "plantpdf.php";

	class text extends PDF
	{
		function __construct()
		{
			parent::__construct();
		}

		function MultiCell($w, $h, $txt, $border=0, $align='J', $fill=false)
		{
			parent::MultiCell($w, $h, $this->normalize($txt), $border, $align, $fill);
		}

		function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
		{
			parent::Cell($w, $h, $this->normalize($txt), $border, $ln, $align, $fill, $link);
		}

		function Write($h, $txt, $link='')
		{
			parent::Write($h, $this->normalize($txt), $link);
		}

		function Text($x, $y, $txt)
		{
			parent::Text($x, $y, $this->normalize($txt));
		}

		protected function normalize($word)
		{
			// Thanks to: http://stackoverflow.com/questions/3514076/special-characters-in-fpdf-with-php
			
			$word = str_replace("@","%40",$word);
			$word = str_replace("`","%60",$word);
			$word = str_replace("¢","%A2",$word);
			$word = str_replace("£","%A3",$word);
			$word = str_replace("¥","%A5",$word);
			$word = str_replace("|","%A6",$word);
			$word = str_replace("«","%AB",$word);
			$word = str_replace("¬","%AC",$word);
			$word = str_replace("¯","%AD",$word);
			$word = str_replace("º","%B0",$word);
			$word = str_replace("±","%B1",$word);
			$word = str_replace("ª","%B2",$word);
			$word = str_replace("µ","%B5",$word);
			$word = str_replace("»","%BB",$word);
			$word = str_replace("¼","%BC",$word);
			$word = str_replace("½","%BD",$word);
			$word = str_replace("¿","%BF",$word);
			$word = str_replace("À","%C0",$word);
			$word = str_replace("Á","%C1",$word);
			$word = str_replace("Â","%C2",$word);
			$word = str_replace("Ã","%C3",$word);
			$word = str_replace("Ä","%C4",$word);
			$word = str_replace("Å","%C5",$word);
			$word = str_replace("Æ","%C6",$word);
			$word = str_replace("Ç","%C7",$word);
			$word = str_replace("È","%C8",$word);
			$word = str_replace("É","%C9",$word);
			$word = str_replace("Ê","%CA",$word);
			$word = str_replace("Ë","%CB",$word);
			$word = str_replace("Ì","%CC",$word);
			$word = str_replace("Í","%CD",$word);
			$word = str_replace("Î","%CE",$word);
			$word = str_replace("Ï","%CF",$word);
			$word = str_replace("Ð","%D0",$word);
			$word = str_replace("Ñ","%D1",$word);
			$word = str_replace("Ò","%D2",$word);
			$word = str_replace("Ó","%D3",$word);
			$word = str_replace("Ô","%D4",$word);
			$word = str_replace("Õ","%D5",$word);
			$word = str_replace("Ö","%D6",$word);
			$word = str_replace("Ø","%D8",$word);
			$word = str_replace("Ù","%D9",$word);
			$word = str_replace("Ú","%DA",$word);
			$word = str_replace("Û","%DB",$word);
			$word = str_replace("Ü","%DC",$word);
			$word = str_replace("Ý","%DD",$word);
			$word = str_replace("Þ","%DE",$word);
			$word = str_replace("ß","%DF",$word);
			$word = str_replace("à","%E0",$word);
			$word = str_replace("á","%E1",$word);
			$word = str_replace("â","%E2",$word);
			$word = str_replace("ã","%E3",$word);
			$word = str_replace("ä","%E4",$word);
			$word = str_replace("å","%E5",$word);
			$word = str_replace("æ","%E6",$word);
			$word = str_replace("ç","%E7",$word);
			$word = str_replace("è","%E8",$word);
			$word = str_replace("é","%E9",$word);
			$word = str_replace("ê","%EA",$word);
			$word = str_replace("ë","%EB",$word);
			$word = str_replace("ì","%EC",$word);
			$word = str_replace("í","%ED",$word);
			$word = str_replace("î","%EE",$word);
			$word = str_replace("ï","%EF",$word);
			$word = str_replace("ð","%F0",$word);
			$word = str_replace("ñ","%F1",$word);
			$word = str_replace("ò","%F2",$word);
			$word = str_replace("ó","%F3",$word);
			$word = str_replace("ô","%F4",$word);
			$word = str_replace("õ","%F5",$word);
			$word = str_replace("ö","%F6",$word);
			$word = str_replace("÷","%F7",$word);
			$word = str_replace("ø","%F8",$word);
			$word = str_replace("ù","%F9",$word);
			$word = str_replace("ú","%FA",$word);
			$word = str_replace("û","%FB",$word);
			$word = str_replace("ü","%FC",$word);
			$word = str_replace("ý","%FD",$word);
			$word = str_replace("þ","%FE",$word);
			$word = str_replace("ÿ","%FF",$word);

			return urldecode($word);
		}

	}

$antecedentes = $_POST["antecedentesE"];
$alergias = $_POST["alergiasE"];
$presponsable = $_POST["presponsableE"];
$intervenciones = $_POST["intervencionesE"];
$vacunas = $_POST["vacunasE"];
$cel = $_POST["celE"];
$email = $_POST["emailE"];
$estadocivil = $_POST["estadocivilE"];
$ocupacion = $_POST["ocupacionE"];
$fecha = $_POST["fechaE"];
$nombrep = $_POST["nombrep"];
$documento = $_POST["documento"];
$actualizaciones = $_POST["actualizaciones"];
$fechaAct = $_POST["fechaAct"];

$titulo = " Historial PDF " .$nombrep;
$pdf = new text();
  $pdf->AliasNbPages();
$pdf->AddPage('portrait', 'A4');
$pdf->SetFont('helvetica','B',17);
$pdf->SetTitle($titulo);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->MultiCell(190, 5, "HISTORIAL CLÍNICO", 10, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(17,5, "Paciente:", 0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(14,5, $nombrep, 0,0);
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(14,5, "Cédula:", 0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(10,5, $documento, 0,0);
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(33,5, "Fecha de creación:", 0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(0,5, $fecha, 0,0);
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(190,10, "Antecedentes:", 1,0);
$pdf->Ln();
$pdf->SetFont('Arial','I',10);
$pdf->MultiCell(190, 8, $antecedentes, 1, 'L');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,10, "Alergias:", 1,0);
$pdf->SetFont('Arial','I',10); 
$pdf->Cell(135, 10, $alergias, 1,0);
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,10, "Persona responsable:", 1,0); 
$pdf->SetFont('Arial','I',10);
$pdf->Cell(135, 10, $presponsable, 1,0);
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,10, "Vacunas faltantes:", 1,0); 
$pdf->SetFont('Arial','I',10);
$pdf->Cell(135, 10, $vacunas, 1,0);	
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,10, "Celular:", 1,0);
$pdf->SetFont('Arial','I',10); 
$pdf->Cell(135, 10, $cel, 1,0);	
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,10, "Correo electrónico:", 1,0); 
$pdf->SetFont('Arial','I',10);
$pdf->Cell(135, 10, $email, 1,0);	
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,10, "Estado civil:", 1,0); 
$pdf->SetFont('Arial','I',10);
$pdf->Cell(135, 10, $estadocivil, 1,0);
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,10, "Ocupación:", 1,0); 
$pdf->SetFont('Arial','I',10);
$pdf->Cell(135, 10, $ocupacion, 1,0);
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(190,10, "Actualizaciones:", 1,0);
$pdf->Ln();
$pdf->SetFont('Arial','I',10);
$pdf->MultiCell(190, 8, $actualizaciones, 1, 'L');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,10, "Fecha de actualización:", 1,0); 
$pdf->SetFont('Arial','I',10);
$pdf->Cell(135, 10, $fechaAct, 1,0);
// $pdf->Image('Vistas/modulos/clinicasalud.png',55,190,95);
$pdf->Output();
ob_end_flush();
?>