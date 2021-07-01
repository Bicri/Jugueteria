<?php


require_once ("Clases_php/Conexion.php");

$conectate = new Conexion();
$conectate->conectar();


$items = $conectate->obtenerProc();
echo json_encode(['statuscode' => 200,'items'=>$items]);



$conectate->desconectar();


    

?>
