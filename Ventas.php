<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugueteria</title>
    <link rel="stylesheet" href="src/css/estilos.css">
    <link rel="stylesheet" href="src/css/estilosInput.css">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="src/css/styles.css" />
</head>

<body>
    <div class="contenedorFlex">
        <?php include_once("Layouts/header.php"); ?>
        <div class="MasterContainer">            
        <h1 class="Titulo-seccion">VENTAS</h1>    
        <div class="Header-seccion">    
            <input type="text" name="" class="inputText" id="">
            <input type="button" value="Buscar" class="boton-primario">
            <input type="button" value="Ver carrito" class="boton-mini">
        </div>
            
            
            <div class="Container-Elements" id="items">      
            <div class="producto">
        <h5>Nombre</h5>
        <p>Código: <span id="codigo"></span></p>
        <p>PrecioVenta: <span id="precio"></span></p>
        <p>Cantidad: <span id="cantidad"></span></p>
        <button class="btn btn-dark boton-card">Comprar</button>
      </div>
      <div class="producto">
        <h5>Nombre</h5>
        <p>Código: <span id="codigo"></span></p>
        <p>PrecioVenta: <span id="precio"></span></p>
        <p>Cantidad: <span id="cantidad"></span></p>
        <button class="btn btn-dark boton-card">Comprar</button>
      </div>
      <div class="producto">
        <h5>Nombre</h5>
        <p>Código: <span id="codigo"></span></p>
        <p>PrecioVenta: <span id="precio"></span></p>
        <p>Cantidad: <span id="cantidad"></span></p>
        <button class="btn btn-dark boton-card">Comprar</button>
      </div>
      <div class="producto">
        <h5>Nombre</h5>
        <p>Código: <span id="codigo"></span></p>
        <p>PrecioVenta: <span id="precio"></span></p>
        <p>Cantidad: <span id="cantidad"></span></p>
        <button class="btn btn-dark boton-card">Comprar</button>
      </div>
      <div class="producto">
        <h5>Nombre</h5>
        <p>Código: <span id="codigo"></span></p>
        <p>PrecioVenta: <span id="precio"></span></p>
        <p>Cantidad: <span id="cantidad"></span></p>
        <button class="btn btn-dark boton-card">Comprar</button>
      </div>
      <div class="producto">
        <h5>Nombre</h5>
        <p>Código: <span id="codigo"></span></p>
        <p>PrecioVenta: <span id="precio"></span></p>
        <p>Cantidad: <span id="cantidad"></span></p>
        <button class="btn btn-dark boton-card">Comprar</button>
      </div>
      <div class="producto">
        <h5>Nombre</h5>
        <p>Código: <span id="codigo"></span></p>
        <p>PrecioVenta: <span id="precio"></span></p>
        <p>Cantidad: <span id="cantidad"></span></p>
        <button class="btn btn-dark boton-card">Comprar</button>
      </div>
      <div class="producto">
        <h5>Nombre</h5>
        <p>Código: <span id="codigo"></span></p>
        <p>PrecioVenta: <span id="precio"></span></p>
        <p>Cantidad: <span id="cantidad"></span></p>
        <button class="btn btn-dark boton-card">Comprar</button>
      </div>
      <div class="producto">
        <h5>Nombre</h5>
        <p>Código: <span id="codigo"></span></p>
        <p>PrecioVenta: <span id="precio"></span></p>
        <p>Cantidad: <span id="cantidad"></span></p>
        <button class="btn btn-dark boton-card">Comprar</button>
      </div>
            </div>
        </div>
        </div>
    </div>


    <!-- TEMPLATE PARA CADA PRODUCTO -->
    <template id="template-card">
      <div class="producto">
        <h5>Nombre</h5>
        <p>Código: <span id="codigo"></span></p>
        <p>PrecioVenta: <span id="precio"></span></p>
        <p>Cantidad: <span id="cantidad"></span></p>
        <button class="btn btn-dark boton-card">Comprar</button>
      </div>
    </template>
    <!-- TEMPLATE PARA CADA PRODUCTO -->
    <script src="src/js/script.js"></script>
</body>

</html>