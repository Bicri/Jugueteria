<?php 

require_once ("../PDF/fpdf.php");


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',18);
$pdf->Cell(50,12, 'Hola mundo',1,1,'C');
$pdf->Output();


?>