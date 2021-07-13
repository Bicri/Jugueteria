<?php

require_once("../Modelo/Juguete.php");

//NOTA: Se debe construir una interfaz en donde se encuentre una tabla con los juguetes de la lista
//Dicha tabla debe tener una funcionalidad semejante a el carrito, es decir tiene botones de + y -

//Accion 1 -> Ingresa un juguete sin codigo (Los juguetes con codigo se tratan en Almacen)
//Accion 2 --> Suma/Resta a uno en la tabla Lista --> Depende de flag la accion
//Accion 3 --> Borra Toda la tabla
//Accion 4 --> Obtiene toda la lista

//$jugueteRecibido = '{"accion":"7","idNuevo":"1","Bandera":"1","nombre":"Lorem","cantidad":"2"}';
// si flag = 1 --> Aumenta en uno
// Si flag = 0 --> Disminuye en 1
//$jugueteRecibido = '{"accion":"1","idNuevo":"","nombre":"Lorem","cantidad":"2","flag":"0"}';
$jugueteRecibido = (file_get_contents('php://input'));
$jugueteRecibido = json_decode($jugueteRecibido);

$objJuguete = new Juguete();
$resp = 5; //captura la respuesta


//---------------------------------- Agregar a Lista --------------------------------------------
// Ejemplo de juguete recibido:
// $jugueteRecibido = '{"accion":"1","idNuevo":"","nombre":"Lorem","cantidad":"2"}';
// El idNuevo siempre esta vacio y es obligatorio
if($jugueteRecibido->accion == "1")
{
    $resp = $objJuguete->AgregarLista($jugueteRecibido);
    echo $resp;
    // resp = 0 --> correcto
    // resp = -1 --> error bd
}

//----------------------- Adiciona uno a Juguete en tabla Lista --------------------------------------------
// Ejemplo de juguete recibido:
// $jugueteRecibido = '{"accion":"2","idNuevo":"","nombre":"Lorem","flag":"1"}'; -->Para juguetes no registrados en la BD
// $jugueteRecibido = '{"accion":"2","idNuevo":"J12","nombre":"","flag":"1"}'; --> Para juguetes registrado en la BD
// si flag = 1 --> Aumenta en uno
// Si flag = 0 --> Disminuye en 1
else if($jugueteRecibido->accion == "2")
{
    $resp = $objJuguete->AddLess_Lista($jugueteRecibido);
    echo $resp;
    // resp = 0 --> correcto
    // resp = -1 --> error bd
}


//----------------------- Borra toda la lista --------------------------------------------
// Ejemplo de juguete recibido:
// $jugueteRecibido = '{"accion":"3"}';
else if($jugueteRecibido->accion == "3")
{
    $resp = $objJuguete->borra_Lista();
    echo $resp;
    // resp = 0 --> correcto
    // resp = -1 --> error bd
}

//----------------------- Recibe toda la lista --------------------------------------------
// Ejemplo de juguete recibido:
// $jugueteRecibido = '{"accion":"4"}';
else if($jugueteRecibido->accion == "4")
{
    $resp = $objJuguete->ObtenerLista();
    echo json_encode($resp);
    // resp =  Array ( [0] => Array ( [codigo] => Sin codigo [nombre] => Lorem [existencia] => 0 [deseado] => 2 ) )
    // resp = Array ( ) --> Sin juguetes en Lista
    // resp = -1 --> error bd
}




?>