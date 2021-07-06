<!DOCTYPE html>
<html lang="es" xml:lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jugueteria</title>
  <link rel="stylesheet" href="src/css/estilos.css">
  <link rel="stylesheet" href="src/css/estilosInput.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <link rel="stylesheet" href="src/css/styles.css" />
  <link rel="stylesheet" href="src/css/modales.css" />
</head>

<body>
  <div class="contenedorFlex">
    <?php include_once("Layouts/header.php"); ?>
    <div class="MasterContainer">
      <h1 class="Titulo-seccion" style="background: white; width:98.5%; margin: 0 20px; padding-top: 10px;">Ventas</h1>
      <div class="Header-seccion">
        <input type="text" name="buscarID" id="buscarID" class="inputText" id="">
        <input type="button" value="Buscar" id="pruebaID" class="boton-primario">
        <input type="button" value="Ver carrito" id="verCarrito" class="boton-mini">
        <button id="pruebaOBJ">Edit</button>
      </div>


      <div class="Container-Elements" id="items">



        <!-- TEMPLATE PARA CADA PRODUCTO -->
        <template id="template-card">
          <div class="producto">
            <h5>Nombre</h5>
            <p>Código: <span id="codigo"></span></p>
            <p>Precio de venta: <span id="precio"></span></p>
            <p>Almacen: <span id="cantidad"></span></p>
            <button class="btn btn-dark boton-card" style=" border:none;
        backdrop-filter: blur(25px);
        ">Comprar</button>
          </div>
        </template>
        <!-- ------------------------------------ -->
        <!-- TEMPLATE PARA mensaje SIN RESULTADOS -->
        <template id="template-sinResultados">
          <div class="producto">
            <h5 style="padding:0; margin:0;"></h5>
          </div>
        </template>
        <!-- ------------------------------------ -->
        
      </div>
    </div>
  </div>



  <!-- ----------------MODALES-------------------- -->

  <!-- ----------------MODAL CARRITO------------------- -->  
  <div class="containerModal">
    <img src="./src/img/bx-x.svg" alt="" class="close-icon">

    <div class="contenidoModal" style="overflow-x:auto; height:80%">

      <div style="position:sticky; top:0; background:white;">
        <h1>Carrito</h1>
        <!-- TABLA EN CEROS DE CARRITO -->
      </div>
      <table class="table">
        <thead style="position:sticky; top:0; background:white;">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Acción</th>
            <th scope="col">Total</th>
          </tr>
        </thead>

        <tbody id="cardss"> </tbody>
        <tfoot>
          <tr id="footer">
            <th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>
          </tr>
        </tfoot>
      </table>
      <hr />
      <!-- FIN TABLA EN CEROS DE CARRITO -->
    </div>

    <template id="template-elementos-carrito">
      <tr>
        <th scope="row" id="idEnCart">id</th>
        <td id="nombreEnCart">Café</td>
        <td id="cantidadEnCart">1</td>
        <td>
          <button class="btn btn-info btn-sm" id="boton-addCantidad">
            +
          </button>
          <button class="btn btn-danger btn-sm" id="boton-restarCantidad">
            -
          </button>
        </td>
        <td>$ <span id="precioEnCart">500</span></td>
      </tr>
    </template>

    <template id="template-footer">
      <th scope="row" colspan="2">Total productos</th>
      <td>10</td>
      <td>
        <button class="btn btn-danger btn-sm" id="vaciar-carrito">
          vaciar todo
        </button>
      </td>
      <td class="font-weight-bold">$ <span>5000</span></td>
    </template>







    <script src="src/js/modales.js"></script>
    <script src="src/js/script.js"></script>

</body>

</html>