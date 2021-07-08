<?php

require_once("../Modelo/Juguete.php");

$jugueteRecibido = '{"id":"2","accion":"0"}'; //Si accion = 1 -> inserta uno
                                               //Si accion = 0 -> resta uno

$jugueteRecibido=json_decode($jugueteRecibido);

$objJuguete = new Juguete(); //instancia a juguete
$resp = 1; //captura la respuesta

$resp = $objJuguete->tarjetaCarrito($jugueteRecibido);

echo $resp;
/*
si resp = 0 --> No hay error, accion de Agregar/Quitar ejecutada con exito
si resp = 1 --> quiere agregar cantidad de un producto con cero en almcen (error)
si resp = -1 --> error en la bd
*/

?>