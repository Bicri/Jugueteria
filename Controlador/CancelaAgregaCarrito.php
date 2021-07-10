<?php


require_once ("../Modelo/Juguete.php");
require_once ("../Modelo/Fecha.php");

$accion =  file_get_contents('php://input'); 

//$accion = '{"Total":"21"}'; //Si total = 0 --> accion de eliminar carrito
                           //Si total es mayor a 0 accion de efectuar venta



$accion = json_decode($accion);

$objJuguete = new Juguete(); //instancia a juguete
$resp = 1; //captura la respuesta

if($accion->Total == 0)
{
    $resp = $objJuguete->rollbackCarrito();
}
else
{
    $hoy = new Fecha(0,0,0);
    $hoy = $hoy->getToday();
    $resp = $objJuguete->efectuarVenta($hoy);
}

echo $resp;
/*
si resp = 0 --> No hay error, accion de Agregar/Quitar ejecutada con exito
si resp = -1 --> error en la bd
*/



?>