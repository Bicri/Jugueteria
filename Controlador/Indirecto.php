<?php

require_once("../Modelo/Utilidad.php");
require_once ("../Modelo/Fecha.php");

//$indirectoRecibido = '{"vigilancia":"50","comida":"100","otros":"0"}';
$indirectoRecibido = '{"vigilancia":"0","comida":"0","otros":"10"}';


$indirectoRecibido = json_decode($indirectoRecibido);

$utilidad = new Utilidad();
$hoy = new Fecha(0,0,0);
$hoy = $hoy->getToday();

$resp = 5; //captura la respuesta


if($indirectoRecibido->vigilancia == 0 && $indirectoRecibido->comida == 0 && $indirectoRecibido->otros == 0)
{
    echo "Ingrese almenos un campo";
}else
{
    $resp = $utilidad->InsertaIndirecto($indirectoRecibido, $hoy);
    echo $resp;
    // si resp = -1 --> Error en la BD
    // si resp = 0 --> insertado
}

?>