<?php

require_once ("../Modelo/Lista.php");
require_once ("../PDF/PDF.php");

$lista = new Lista();
$items = $lista->ObtenerLista();
/* Mostrar Resultados
foreach($items as $item)
{
    echo $item["codigo"]." - ".$item["nombre"]." - ".$item["existencia"]." - ".$item["deseado"];
    echo "<br>";
}*/

$pdf = new PDF(); //Crea Header and Footer
$pdf->AddPage();
$pdf->AliasNbPages();


//Cuerpo 
$pdf->SetFont('Arial','',10);
foreach($items as $item)
{
    $pdf->Cell(40,8,$item["codigo"],'B',0,'C');
    $pdf->Cell(90,8,$item["nombre"],'B',0,'C');
    $pdf->Cell(30,8,$item["existencia"],'B',0,'C');
    $pdf->Cell(30,8,$item["deseado"],'B',1,'C');  
}
$items = null;

$pdf->Output('D','Lista de compras.pdf');



/* Datos de prueba con arial 10
$pdf->Cell(40,8,'000000000000095','B',0,'C');
$pdf->Cell(90,8,'CADENA QUE SOPORTA 30 CARACTERES','B',0,'C');
$pdf->Cell(30,8,'Almacen','B',0,'C');
$pdf->Cell(30,8,'Cantidad','B',1,'C');



Funcionamiento de Cell()
                                //Borde 'LRTB'
$pdf->Cell(35,8,'000000000000095',1,1,'C');
                                  //Next 1 = next line inicio, 0 = derecha, 2 = abajo*/

?>