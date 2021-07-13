<?php

$password = "";
// Abriendo el archivo
$archivo = fopen("Jugueteria.txt", "r");
 
// Recorremos todas las lineas del archivo
while(!feof($archivo)){
    // Leyendo una linea
    $password = trim($password.fgets($archivo));

}
 
// Cerrando el archivo
fclose($archivo);


echo json_encode($password);

?>