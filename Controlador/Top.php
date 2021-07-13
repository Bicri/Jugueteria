<?php

require_once("../Modelo/Juguete.php");

// $jugueteRecibido = '{"accion":"1"}'; --> Los mas vendidos
// $jugueteRecibido = '{"accion":"0"}'; --> Los menos vendidos
$jugueteRecibido = '{"accion":"1"}';


$jugueteRecibido = json_decode($jugueteRecibido);

$objJuguete = new Juguete();

$resp = $objJuguete->Top($jugueteRecibido->accion); //captura la respuesta

print_r($resp);

// si $resp = -1 --> error en la bd
// $resp = Array ( [0] => Array ( [codigo] => J2 [nombre] => B [unidades] => 24 [ingreso] => 240.00 ) [1] => Array ( [codigo] => J3,1 [nombre] => C [unidades] => 22 [ingreso] => 220.00 ) [2] => Array ( [codigo] => J1 [nombre] => A [unidades] => 15 [ingreso] => 150.00 ) )

?>