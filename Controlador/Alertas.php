<?php

require_once("../Modelo/Juguete.php");


$objJuguete = new Juguete();

$resp = $objJuguete->ObtenerVacio(); //captura la respuesta

print_r($resp);

// si $resp = -1 --> error en la bd
// $resp = Array ( [0] => Array ( [codigo] => J1 [nombre] => A [existencia] => 0 ) )

?>