<?php
    require_once("../Modelo/Juguete.php");
    //echo json_encode($_POST);   

    //echo json_encode($_SERVER["CONTENT_TYPE"]);

    //esta linea es la que tiene lo que le manda el js 7 el file_get_contents agarra lo que 
    //le mandan en este caso el objeto carrito
    $carritoRecibido =  file_get_contents('php://input');    
    
 
    //$carritoRecibido = '{"id":"10","nombre":"Batman","precio":"25.5","cantidad":2}';
    $carritoconDecode = json_decode($carritoRecibido);
    $objJuguete = new Juguete(); //instancia a juguete
    $resp = 1; //captura la respuesta

    $resp = $objJuguete->insertarCarrito($carritoconDecode);
    echo $resp;//si es 0 todo fine - si es 1 error


?>