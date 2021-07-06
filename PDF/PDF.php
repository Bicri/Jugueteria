<?php

require_once ("fpdf.php");
require_once ("../Modelo/Fecha.php");

class PDF extends FPDF
{
    function header()
    {
        //Titulo
        $this->setFont('Arial','B',18);
        $this->Cell(80);
        $this->Cell(30,10, 'Lista de Futuras Compras',0,1,'C');
        
        //Fecha de hoy
        $this->setFont('Arial','I',10);

        $hoy = new Fecha(0,0,0);
        $hoy = $hoy->getToday();

        $this->Cell(0,10,$hoy->fechaFormateada(),0,1,'R');
        $this->Ln(10);

        //Cabecera de tabla
        $this->setFont('Arial','B',12);
        $this->Cell(40,8,utf8_decode('Código'),'B',0,'C');
        $this->Cell(90,8,'Nombre','B',0,'C');
        $this->Cell(30,8,utf8_decode('Almacén'),'B',0,'C');
        $this->Cell(30,8,'Comprar','B',1,'C');
    }


    function footer()
    {
        //Numero de pagina
        $this->SetY(-18);
        $this->setFont('Arial','I',9);
        $this->Cell(0,10, utf8_decode('Página ').$this->PageNo().' de {nb}',0,0,'C');
    }
}

?>