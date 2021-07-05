<?php

date_default_timezone_set('America/Mexico_City');



class Fecha{
    private $dia;
    private $mes;
    private $anio;
    private $semana;

    public function getDia()
    {
        return $this->dia;
    }

    public function getMes()
    {
        return $this->mes;
    }

    public function getAnio()
    {
        return $this->anio;
    }

    public function getSemana()
    {
        return $this->semana;
    }

    function __construct($dia, $mes, $anio)
    {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
    }

    public function getToday()
    {
        return new Fecha(date("d"),date("m"),date("Y"));
    }

    public function getMonday()
    {
        return new Fecha(date( 'd', strtotime( 'monday this week' )),
                        date( 'm', strtotime( 'monday this week' ) ),
                        date( 'Y', strtotime( 'monday this week' ) ));
    }

    public function generarSemana()
    {
        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        $this->semana = $dias[date("w")];
        return $this->semana;
    }

    public function ToString()
    {
        return $this->dia."/".$this->mes."/".$this->anio;
    }
}

?>