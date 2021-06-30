<?php

//require_once ("Codigos_php/Conexion.php");
require_once ("Clases_php/Juguete.php");

$producto = new Juguete("123","balero",12.5,10,15,29,07,2021);
echo "hola <br>";

echo ($producto->toString());

?>
