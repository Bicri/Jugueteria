<?php

    require_once ("../Modelo/Fecha.php");

    $fechas = new Fecha(0,0,0);
    $hoy = $fechas->getToday();
    $lunes = $fechas->getMonday();
    echo "El dia de hoy es: ".$hoy->ToString();
    echo "<br> Fecha formateada: ".$hoy->fechaFormateada();
    echo "<br>El Lunes de esta semana fue : ".$lunes->ToString();

?>
