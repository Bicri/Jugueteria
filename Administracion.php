<!DOCTYPE html>
<html lang="es" xml:lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="data:;base64,iVBORw0KGgo=">
    <title>Administracion</title>
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
            <h1 class="Titulo-seccion" style="font-weight:400;background: white; letter-spacing: 2px; width:98.5%; margin: 0 20px; padding-top: 10px;">Administración</h1>
            <div class="Header-seccion">
                <input type="text" name="buscarID" id="buscarIDAdmin" class="inputText" id="">
                <input type="button" value="Buscar 🔎" id="botonBuscarIDAdmin" class="boton-primario" style="border-radius:50px;">
                <input type="button" value="Agregar nuevo  ➕" id="agregarNuevo" class="boton-mini">
                <!-- <input type="button" value="PruebaModal" id="pruebaModalInput" class="boton-aceptar"> -->
            </div>

            <div class="Container-Elements" id="itemsAdministracion">
                <table class="table table-hover">
                    <thead style="position:sticky; top:78px; background: rgba(240, 248, 255,0.7); backdrop-filter:blur(25px);">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody id="elementosAdmin">                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>



    <!-- TEMPLATE PARA CADA PRODUCTO EN LA TABLA-->
    <template id="FilaElementoAdmin">
        <tr>
            <td class="table-light" id="idProdTabla">123456789asdf</td>
            <td class="table-light" id="nomProdTabla">PistolaNerf G 240 Naranja 24mm</td>
            <td class="table-light">Disponible (<span id="cantidadTablaAdmin">100</span>)</td>
            <td class="table-light">$<span id="precioTablaAdmin">500.87<span /></td>
            <td class="table-light">
                <button class="btn btn-success" title="Agregar stock">➕</button>
                <input type="button" value="✏️" title="Editar producto" class="btn btn-warning">
                <input type="button" value="🗑️" title="Eliminar producto" class="btn btn-danger">
                <input type="button" value="📑" title="Agregar a lista de compras futuras" class="btn btn-primary">
            </td>
        </tr>
    </template>

    <!-- MODAL PARA TODOS -->
    <div class="containerModal  " id="modalUniversal">
        <img src="./src/img/bx-x.svg" alt="" class="close-icon" id="close-iconUni">
        <div class="contenidoModal  modalComprar" style="flex-direction:column;overflow-x:auto;  height:85%" id="contenidoModalUniversal">
            <div >
                <h1 class="titulo" id="tituloModalAdmin">AGREGAR NUEVO PRODUCTO</h1>
            </div>
            <div class="contenedorFormulario" id="colorform">
                <form  style="display:flex; flex-direction: row; padding:20px;">
                    <div style="margin: 0 20px">
                        <!-- LABEL E INPUT PARA EL CÓDIGO DEL PRODUCTO -->
                        <div class="form-group">
                            <label class="font-weight-bold">Código de producto</label>
                            <input type="text" class="form-control" id="idAdmin" placeholder="ID del producto">
                            <small id="IDlHelp" class="form-text text-muted"></small>
                        </div>
                        <!-- LABEL E INPUT PARA EL NOMBRE DEL PRODUCTO -->
                        <div class="form-group">
                        <label class="font-weight-bold">Nombre</label>
                            <input type="text" class="form-control" id="nomAdmin" placeholder="Nombre del producto">
                        </div>
                        <!-- LABEL E INPUT PARA EL COSTO DEL PRODUCTO -->
                        <div class="form-group">
                        <label class="font-weight-bold"> Costo</label>
                            <input type="number" class="form-control" id="costoAdmin" placeholder="Costo del producto">
                        </div>
                    </div>
                    <div style="margin: 0 20px">
                        <!-- LABEL E INPUT PARA EL PRECIO DEL PRODUCTO -->
                        <div class="form-group">
                        <label class="font-weight-bold">Precio de venta</label>
                            <input type="number" class="form-control" id="precioAdmin" placeholder="Precio del producto">
                        </div>
                        <!-- LABEL E INPUT PARA LA CANTIDAD DEL PRODUCTO -->
                        <div class="form-group">
                        <label class="font-weight-bold">Cantidad</label>
                            <input type="number" class="form-control" id="cantAdmin" placeholder="Cantidad del producto">
                        </div>    
                    </div>          
                </form>
            
            </div>
            <input type="button" id="BotonModalAccion" value="Agregar" class="boton-aceptar" style="margin:0;" target="_blank">    
        </div>
    </div>

    <script src="src/js/Admin.js"></script>
</body>

</html>