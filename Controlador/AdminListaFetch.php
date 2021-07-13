<?php
    require_once("../Modelo/Juguete.php");
    $jugueteRecibido = (file_get_contents('php://input'));
    $jugueteRecibido = json_decode($jugueteRecibido);

    $objJuguete = new Juguete();
    $resp = 5; //captura la respuesta
    $resp = $objJuguete->ObtenerLista();
    echo json_encode($resp);
?>