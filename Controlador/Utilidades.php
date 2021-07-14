<?php

require_once("../Modelo/Utilidad.php");
require_once ("../Modelo/Fecha.php");


//$UtilidadRecibida = '{"accion":"","anioI":"0","mesI":"0","diaI":"10","anioF":"0","mesF":"0","diaF":"10"}';
$UtilidadRecibida = '{"accion":"0","anioI":"2021","mesI":"07","diaI":"12","anioF":"2021","mesF":"07","diaF":"14"}';

$UtilidadRecibida = json_decode($UtilidadRecibida);

$utilidad = new Utilidad();




$resp = 5; //captura la respuesta

//----------------   Utilidad Semanal ------------------------
// Ejemplo de utilidad Recibida:
// $UtilidadRecibida = '{"accion":"0"}';
if($UtilidadRecibida->accion == "0")
{
    $fecha = new Fecha(0,0,0);
    $hoy = $fecha->getToday();
    $lunes = $fecha->getMonday();

    $resp = $utilidad->UtilidadSemanal($hoy, $lunes);
    echo json_encode($resp);

    //Atencion --> Los datos que recibe a continuacion son los siguientes:
    echo "<br><br><br> Interpretacion de los datos <br><br>";
    $resp = json_encode($resp);
    $resp = json_decode($resp);
    echo "Ingresos de la semana: ".$resp[0]->Ingresos." en la posicion [0][0] del array <br><br>";
    echo "Costos directos de la semana: ".$resp[0]->Costos." en la posicion [0][1] del array <br><br>";
    echo "Costos indirectos de la semana: ".$resp[0]->Indirecto." en la posicion [0][2] del array <br>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vigilancia: ".$resp[1]->Ingresos."% en la posicion [1][0] del array <br>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comida: ".$resp[1]->Costos."% en la posicion [1][1] del array <br>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Otros: ".$resp[1]->Indirecto."% en la posicion [1][2] del array <br><br>";
    if($resp[0]->Utilidad>=0) //Importante validar 
    {
        echo "Utilidad de la semana: ".$resp[0]->Utilidad." en la posicion [0][3] del array <br>";
    }else
    {
        echo "Perdida de la semana: ".$resp[0]->Utilidad." en la posicion [0][3] del array <br>";
    }
    echo "<br>Inversion en almacen: ".$resp[1]->Utilidad." en la posicion [1][3] del array <br><br>";
}

//----------------   Utilidad Anual ------------------------
// Ejemplo de utilidad Recibida:
// $UtilidadRecibida = '{"accion":"1","anioI":"2021","mesI":"06","diaI":"20","anioF":"2021","mesF":"07","diaF":"03"}';
else if($UtilidadRecibida->accion == "1")
{
    $resp = $utilidad->UtilidadPeriodo($UtilidadRecibida);
    echo json_encode($resp);
}

//----------------   Borrar Semana  ------------------------
// Ejemplo de utilidad Recibida:
// $UtilidadRecibida = '{"accion":"2"}';
else if($UtilidadRecibida->accion == "2")
{
    $resp = $utilidad->borra_semana();
    echo $resp;
    //si resp = 0 --> borrado exitantemente
    //si resp = -1 --> Error en b
}

//----------------   Borrar Anual  ------------------------
// Ejemplo de utilidad Recibida:
// $UtilidadRecibida = '{"accion":"3"}';
else if($UtilidadRecibida->accion == "3")
{
    $resp = $utilidad->borra_anio();
    echo $resp;
    //si resp = 0 --> borrado exitantemente
    //si resp = -1 --> Error en b
}

else{
    echo "error en if";
}


?>