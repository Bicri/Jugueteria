<?php

require_once ("Producto.php");

class Juguete extends Producto{
    private $costo;
    private $dia;
    private $mes;
    private $anio;

    function __construct($codigo, $nombre, $venta, $existencia, $costo,$dia,$mes,$anio)
    {
        parent::__construct($codigo, $nombre, $venta, $existencia);
        $this->costo = $costo;
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
    }

    public function getcosto()
    {
        return $this->costo;
    }
    public function setcosto($costo)
    {
        $this->costo = $costo;
    }

    public function getdia()
    {
        return $this->dia;
    }
    public function setdia($dia)
    {
        $this->dia = $dia;
    }

    public function getmes()
    {
        return $this->mes;
    }
    public function setmes($mes)
    {
        $this->mes = $mes;
    }

    public function getanio()
    {
        return $this->anio;
    }
    public function setanio($anio)
    {
        $this->anio = $anio;
    }

    public function toString()
    {
        return "Juguete{".parent::toString()."
                costo: ".$this->costo."
                dia: ".$this->dia."
                mes: ".$this->mes."
                anio: ".$this->anio."}";
    }
}

?>