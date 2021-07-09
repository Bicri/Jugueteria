<!DOCTYPE html>
<html lang="es" xml:lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <input type="button" value="Edit" id="pruebaOBJ" class="boton-mini" style="display:none">
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
                        <tr>
                            <td class="table-light" style="background: rgb(240, 248, 255);">123456789asdf</td>
                            <td class="table-light">PistolaNerf G 240 Naranja 24mm</td>
                            <td class="table-light">Disponible (<span id="cantidadTablaAdmin">100</span>)</td>
                            <td class="table-light">$<span id="precioTablaAdmin">500.87<span /></td>
                            <td class="table-light">
                                <button class="btn btn-info" title="Agregar nuevo">➕</button>
                                <input type="button" value="✏️" alt="HOLAA" class="btn btn-success">
                                <input type="button" value="🗑️" class="btn btn-danger">
                                <input type="button" value="📑" class="btn btn-primary">
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>



    <!-- TEMPLATE PARA CADA PRODUCTO EN LA TABLA-->
    <template id="FilaElementoAdmin">
        <tr>
            <td class="table-light" style="background: rgb(240, 248, 255);">123456789asdf</td>
            <td class="table-light">PistolaNerf G 240 Naranja 24mm</td>
            <td class="table-light">Disponible (<span id="cantidadTablaAdmin">100</span>)</td>
            <td class="table-light">$<span id="precioTablaAdmin">500.87<span /></td>
            <td class="table-light">
                <button class="btn btn-info" title="Agregar nuevo">➕</button>
                <input type="button" value="✏️" alt="HOLAA" class="btn btn-success">
                <input type="button" value="🗑️" class="btn btn-danger">
                <input type="button" value="📑" class="btn btn-primary">
            </td>
        </tr>
    </template>

    <!-- MODAL PARA TODOS -->
    <div class="containerModal  " id="modalUniversal">
        <img src="./src/img/bx-x.svg" alt="" class="close-icon" id="close-iconUni">
        <div class="contenidoModal  modalComprar" style="flex-direction:column;overflow-x:auto; text-align: center; height:80%" id="contenidoModalUniversal">
            <div style="position:absolute; top:3px;">
                <h1 class="titulo">AGREGAR NUEVO PRODUCTO</h1>
            </div>
            <div class="container1" style="width: auto; flex-direction: row;">
                <div style="display: flex; flex-direction: column;">
                    <div style="display:flex; flex-direction: column; margin-right: 20px; justify-content: center; align-items: start;">
                        <label for="" style="margin:0;">Código</label>
                        <input class="inputText" type="text" id="" placeholder="Ingrese el ID del producto">
                    </div>
                    <div style="display:flex; flex-direction: column; justify-content: center; align-items: start;">
                        <label for="" style="margin:0;">Nombre</label>
                        <input class="inputText" type="text" id="" placeholder="Ingrese el ID del producto">
                    </div>
                    <div style="display:flex; flex-direction: column; justify-content: center; align-items: start;">
                        <label for="" style="margin:0;">Costo</label>
                        <input class="inputText" type="text" id="" placeholder="Ingrese el ID del producto">
                    </div>
                </div>
                <div style="display: flex; flex-direction: column;">
                    <div style="display:flex; flex-direction: column; justify-content: center; align-items: start;">
                        <label for="" style="margin:0;">Precio de venta</label>
                        <input class="inputText" type="text" id="" placeholder="Ingrese el ID del producto">
                    </div>
                    <div style="display:flex; flex-direction: column; justify-content: center; align-items: start;">
                        <label for="" style="margin:0;">Cantidad</label>
                        <input class="inputText" type="text" id="" placeholder="Ingrese el ID del producto">
                    </div>
                </div>
                
            </div>
            <input type="button" value="Agregar" class="boton-aceptar">
        </div>
    </div>

    <script src="src/js/Admin.js"></script>
</body>

</html>