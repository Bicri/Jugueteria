<?php

date_default_timezone_set('America/Mexico_City');



class Fecha{
    public $dia;
    public $mes;
    public $anio;
    private $semana;
    private $nombreMes;

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

    public function fechaFormateada()
    {
        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $this->semana = $dias[date("w")];
        $this->nombreMes = $meses[date("n")-1];
        return $this->semana.", ".$this->dia." de ".$this->nombreMes." del ".$this->anio;
    }

    public function ToString()
    {
        return $this->dia."/".$this->mes."/".$this->anio;
    }
}

?>