<?php
ob_end_clean();
while (ob_get_level())
header("Content-Encoding: None", true);
require "plantpdf.php";
require "cone.php";
    
    class text extends PDF
    {

        function __construct()
        {
            parent::__construct1();
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

$id=$_POST['idconsultorio'];
$sql = "SELECT r.id_doctor, r.idservicio, r.idpaciente, r.fecha, r.pago, s.nombre, s.costo, d.nombre AS doctornombre, d.apellido, d.idconsultorio, c.nombreconsultorio, p.documento
    FROM recetas AS r
    INNER JOIN pacientes AS p on r.idpaciente=p.idpaciente
    INNER JOIN doctores AS d ON  r.id_doctor=d.id
    INNER JOIN servicios AS s ON r.idservicio=s.idservicio
    INNER JOIN consultorios AS c ON d.idconsultorio=c.idconsultorio
    WHERE d.idconsultorio= $id";
    $resultado = $mysqli->query($sql);
    $pdf = new text();
    $pdf->AliasNbPages();
    $pdf->AddPage();
     $datos = $resultado->fetch_assoc(); 
        if(empty($datos["nombreconsultorio"])){
         $pdf = new text();
         $pdf->AddPage();
        $pdf->SetTitle("Consultorio sin servicios");
         $pdf->SetFont("Arial", "B", 20);
         $pdf->Cell(290, 0, "Ups! :(", 0, 1, "C");
        $pdf->Ln(20);
        $pdf->Cell(290, 0, "Este consultorio todavía no ha generado servicios", 0, 1, "C");

             $pdf->AliasNbPages();
    }
    else{
        $pdf->AliasNbPages();
        $pdf->SetTitle("Reporte de servicios de " .$datos['nombreconsultorio']);
      $pdf->SetFont("Arial", "B", 20);
    $pdf->Cell(290, 0, "Todos los servicios de ".$datos['nombreconsultorio'], 0, 1, "C");
    $pdf->Ln(5);

     $pdf->SetFont("Arial", "B", 12);
      $pdf->Cell(10, 5,  "#", 1, 0, "C");
    $pdf->Cell(50, 5, "Doctor", 1, 0, "C");
     $pdf->Cell(35, 5, "Consultorio", 1, 0, "C");
    $pdf->Cell(85, 5, "Servicio", 1, 0, "C");
    $pdf->Cell(15, 5, "Costo", 1, 0, "C");
    $pdf->Cell(15, 5, "Pago", 1, 0, "C");
        $pdf->Cell(37, 5, "Paciente Ced.", 1, 0, "C");
    $pdf->Cell(25, 5, "Fecha", 1, 1, "C");
    $pdf->SetFont("Arial", "", 10);

    foreach ($resultado as $key => $value){

        $pdf->Cell(10, 5,  ($key+1), 1, 0, "C");
        $pdf->Cell(50, 5, $value['doctornombre']." ".$value['apellido'] , 1, 0, "C");
         $pdf->Cell(35, 5,  $value['nombreconsultorio'], 1, 0, "C");
         $pdf->Cell(85, 5, $value['nombre'], 1, 0, "C");
        $pdf->Cell(15, 5, $value['costo'], 1, 0, "C");
          $pdf->Cell(15, 5, $value['pago'], 1, 0, "C");
         $pdf->Cell(37, 5, $value['documento'], 1, 0, "C");
           $pdf->Cell(25, 5, $value['fecha'], 1, 1, "C");
    

    }

    }
      

$pdf->Output();
ob_end_flush();
?>