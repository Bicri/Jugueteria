<?php
require_once("../Modelo/Juguete.php");
require_once ("../Modelo/Fecha.php");
//accion 1 --> Ingresar Nuevo
//accion 2 --> Agregar stock
//accion 3 --> Solicitar Juguete a editar (devuelve un juguete)
//accion 4 --> Edicion terminada
//accion 5 --> Agregar a lista
//accion 6 --> Deseo borrar (ya paso el modal que le pregunta si esta seguro) --> devuleve el costo de su juguete

//accion 7 --> Bandera 0 = No desea agregar el costo del juguete borrado a utilidades
//             Bandera 1 = desea agregar el costo del juguete borrado a utilidades

//Los datos en el objeto recibido dependen de la accion que se requiera, cuando no sea necesario
//recibir algunos datos mandar sus atributos en vacio "" o simplemente no crear esa propiedad
//Verificar en cada if los atributos que solicita

//Juguete Genérico:
//              $jugueteRecibido = '{"accion":"7","idNuevo":"1","idViejo":"1","nombre":"","precio":"","costo":"","cantidad":"2","anio":"","mes":"","dia":""}';
//$jugueteRecibido = '{"accion":"1","idNuevo":"5","nombre":"fase1","precio":"10","costo":"12","cantidad":"20"}';
$jugueteRecibido = (file_get_contents('php://input'));


$jugueteRecibido = json_decode($jugueteRecibido);


$objJuguete = new Juguete();
$hoy = new Fecha(0,0,0);
$hoy = $hoy->getToday();


$resp = 5; //captura la respuesta

//---------------------------------- Agregar Nuevo Juguete --------------------------------------------
// Ejemplo de juguete recibido:
// $jugueteRecibido = '{"accion":"1","idNuevo":"","nombre":"Batman","precio":"25.5","costo":"10","cantidad":"2"}';
// $jugueteRecibido = '{"accion":"1","idNuevo":"123","nombre":"Batman","precio":"25.5","costo":"10","cantidad":"2"}';
if($jugueteRecibido->accion == "1")
{
    $resp = $objJuguete->NuevoJuguete($jugueteRecibido,$hoy);
    echo $resp;
    //Si resp = 0 --> Agregado con exito
    //Si resp = 1 --> Juguete repetido ERROR
    //Si resp = -1 --> Error en bd
}




//---------------------------------- Agregar Stock a Juguete --------------------------------------------
// Ejemplo de juguete recibido:
// $jugueteRecibido = '{"accion":"2","idNuevo":"123","precio":"25.5","costo":"10","cantidad":"2"}';
else if($jugueteRecibido->accion == "2")
{
    $resp = $objJuguete->AgregarStock($jugueteRecibido,$hoy);
    echo $resp;
    //Si resp = 0 --> Agregado con exito
    //Si resp = -1 --> Error en bd
}




//---------------------------------- Solicitar Edicion de  Juguete --------------------------------------------
// Ejemplo de juguete recibido:
// $jugueteRecibido = '{"accion":"3","idNuevo":"123"}';
else if($jugueteRecibido->accion == "3")
{
    $resp = $objJuguete->SolicitarEdicion($jugueteRecibido);
    echo json_encode($resp);
    // resp = Array ( [codigo] => 1 [nombre] => Batman [precio] => 30.00 [existencia] => 4 [costo] => 10.00 [anio] => 2021 [mes] => 7 [dia] => 9 )
    //Si resp = -1 --> Error en bd
}




//---------------------------------- Efectuando la Edicion del Juguete --------------------------------------------
// Ejemplo de juguete recibido:
// $jugueteRecibido = '{"accion":"4","idNuevo":"123","idViejo":"123","nombre":"Batman","precio":"35","costo":"15","cantidad":"10","anio":"2021","mes":"07","dia":"09"}';
// $jugueteRecibido = '{"accion":"4","idNuevo":"81","idViejo":"123","nombre":"Batman","precio":"35","costo":"15","cantidad":"10","anio":"2021","mes":"07","dia":"09"}';
// $jugueteRecibido = '{"accion":"4","idNuevo":"","idViejo":"123","nombre":"Batman","precio":"35","costo":"15","cantidad":"10","anio":"2021","mes":"07","dia":"09"}';
else if($jugueteRecibido->accion == "4")
{
    $resp = $objJuguete->EditaProducto($jugueteRecibido);
    echo $resp;
    //Si resp = 0 --> Agregado con exito
    //Si resp = 1 --> Juguete con id repetido ERROR
    //Si resp = -1 --> Error en bd  
}




//---------------------------------- Agregando Juguete a Lista --------------------------------------------
// Ejemplo de juguete recibido:
// $jugueteRecibido = '{"accion":"5","idNuevo":"123","cantidad":"10"}';
else if($jugueteRecibido->accion == "5")
{
    $resp = $objJuguete->AgregarLista($jugueteRecibido);
    echo $resp;
    //Si resp = 0 --> Agregado con exito
    //Si resp = -1 --> Error en bd  
}




//--------------------------- Obteniendo el costo del juguete a borrar --------------------------------------
// Ejemplo de juguete recibido:
// $jugueteRecibido = '{"accion":"6","idNuevo":"123"}';
else if($jugueteRecibido->accion == "6")
{
    $resp = $objJuguete->ObtenerCostoBorrado($jugueteRecibido->idNuevo);
    echo json_encode($resp);
    // resp = Array ( [codigo] => 1 [nombre] => carss [existencia] => 7 [costo] => 76.50 )
    // NOTA: Si la existencia es igual a 0 EN LA TABLA, no ejecutar este paso, pasar a la accion 7 con bandera en 0
    // En caso de haber mandado un producto con existencia 0, no imprime nada (Evitar incurrir en esta accion)
    //Si resp = -1 --> Error en bd  
}




//--------------------------- Borrando Juguete --------------------------------------
// Ejemplo de juguete recibido:
// NOTA idViejo es la BANDERA, si Bandera = 0, no se agrega el costo. Si bandera = 1, se agrega su costo
// La bandera se representa con el idViejo
// $jugueteRecibido = '{"accion":"7","idNuevo":"123","idViejo":"0"}';
// $jugueteRecibido = '{"accion":"7","idNuevo":"123","idViejo":"1"}';
else if($jugueteRecibido->accion == "7")
{
    $resp = $objJuguete->BorraJuguete($jugueteRecibido,$hoy);
    echo $resp;
    //Si resp = 0 --> Eliminado con exito
    //Si resp = -1 --> Error en bd
}



//Cualquier otra accion
else
{
    echo $resp = -2; //ERROR EN IF
}

?>