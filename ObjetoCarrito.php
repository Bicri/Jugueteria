<?php

    //echo json_encode($_POST);   
    
    //echo json_encode($_SERVER["CONTENT_TYPE"]);


    //esta linea es la que tiene lo que le manda el js 7 el file_get_contents agarra lo que 
    //le mandan en este caso el objeto carrito
    echo json_encode(file_get_contents('php://input')); 
    //así quedaría la cadena con 3 productos de ejemplo
    $carritoRecibido = '{
        "10":{"id":"10","nombre":"Batman","precio":"25.5","cantidad":15},
        "23":{"id":"23","nombre":"Matchbox","precio":"50","cantidad":15},
        "70":{"id":"70","nombre":"Hot wheels","precio":"52","cantidad":4}
    }';
    $carritoconDecode = json_decode($carritoRecibido);
    //LA DIFERENCIA SOLO ES LA IMPRESIÓN para ver la estructura de lo que te convierte
    echo "<br><br><br><br><br><br><br><br>";
    var_dump($carritoconDecode);
    echo "<br><br><br><br><br><br><br><br>";
    print_r($carritoconDecode);

    
    
