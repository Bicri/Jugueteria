<?php


class Producto{
    protected $codigo;
    protected $nombre;
    protected $venta;
    protected $existencia;

    function __construct($codigo, $nombre, $venta, $existencia){
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->venta = $venta;
        $this->existencia = $existencia;
    }

    public function getcodigo()
    {
        return $this->codigo;
    }
    public function getnombre()
    {
        return $this->nombre;
    }
    public function getventa()
    {
        return $this->venta;
    }
    public function getexistencia()
    {
        return $this->existencia;
    }

    public function setcodigo($codigo)
    {
        $this->codigo=$codigo;
    }
    public function setnombre($nombre)
    {
        $this->nombre=$nombre;
    }
    public function setventa($venta)
    {
        $this->venta = $venta;
    }
    public function setexistencia($existencia)
    {
        $this->existencia = $existencia;
    }

    public function toString()
    {
        return "Producto{
            codigo: ".$this->codigo."
            nombre: ".$this->nombre."
            venta: ".$this->venta."
            existencia: ".$this->existencia."}";
    }

    
}

?>