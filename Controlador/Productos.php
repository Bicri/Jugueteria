<?php

    require_once ("../Modelo/Juguete.php");


    $juguete = new Juguete();


    if(isset($_GET["buscarId"]) && $_GET["buscarId"]!='')
    {
        $items = $juguete->obtenerProductoCoincidencia($_GET["buscarId"]);
        echo json_encode(['statuscode' => 200,'items'=>$items]);
    }else
    {
        $items = $juguete->ObtenerTodos();
        echo json_encode(['statuscode' => 200,'items'=>$items]);
    }


?>