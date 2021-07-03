<?php

require_once ("../Clases_php/Fecha.php");

$fechas = new Fecha(0,0,0);
$hoy = $fechas->getToday();
$lunes = $fechas->getMonday();

echo "El dia de hoy es: ".$hoy->ToString();
echo "<br>El Lunes de esta semana fue : ".$lunes->ToString();


//http://jugueteria.com/Jugueteria/UsaLaFecha.php
?>