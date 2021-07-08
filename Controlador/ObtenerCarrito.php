<?php

require_once("../Modelo/Juguete.php");

$juguete = new Juguete();

$items = $juguete->ObtenerCarrito();

echo json_encode(['statuscode' => 200,'items'=>$items]);


?>