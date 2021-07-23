<!DOCTYPE html>

<html lang="es" xml:lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="data:;base64,iVBORw0KGgo=">
    <title>Administracion</title>
    <link rel="stylesheet" href="src/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="src/css/estilos.css">
    <link rel="stylesheet" href="src/css/estilosInput.css">
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

                <div style="margin-left:400px;">

                    <input type="password" id="passwordAdmin" placeholder="Contraseña" oncopy="return false"class="inputText" style="width:200px;">
                </div>
                <!-- <input type="button" value="PruebaModal" id="pruebaModalInput" class="boton-aceptar"> -->
            </div>

            <div class="Container-Elements" id="itemsAdministracion">
                <table class="table table-hover">
                    <thead style="position:sticky; top:78px; background: rgba(240, 248, 255,0.7); backdrop-filter:blur(25px);">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio sugerido</th>
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
        <tr  style="line-height: 50px;">
            <td class="table-light" id="idProdTabla" >123456789asdf</td>
            <td class="table-light" id="nomProdTabla">PistolaNerf G 240 Naranja 24mm</td>
            <td class="table-light">Disponible <span id="cantidadTablaAdmin">100</span></td>
            <td class="table-light">$<span id="precioTablaAdmin">500.87<span /></td>
            <td class="table-light">
                <!-- <button class="btn btn-success" title="Agregar stock">➕</button> -->
                <img src="src/img/add.svg" title="Agregar stock" class="btn-success iconos">
                <img src="src/img/pencil.svg" title="Agregar stock" class="btn-warning iconos">
                <img src="src/img/delete.svg" title="Agregar stock" class="btn-danger iconos">
                <img src="src/img/add-list.svg" title="Agregar stock" class="btn-primary iconos">
                <!-- <input type="button" value="✏️" title="Editar producto" class="btn btn-warning">
                <input type="button" value="🗑️" title="Eliminar producto" class="btn btn-danger">
                <input type="button" value="📑" title="Agregar a lista de compras futuras" class="btn btn-primary"> -->
            </td>
        </tr>
    </template>

    <!-- MODAL PARA TODOS -->
    <div class="containerModal" id="modalUniversal">
        <img src="./src/img/bx-x.svg" alt="" class="close-icon" id="close-iconUni">

        <div class="contenidoModal  modalComprar" style="flex-direction:column;overflow-x:auto;  height:85%" id="contenidoModalUniversal">
            <div>
                <h1 class="titulo" id="tituloModalAdmin">AGREGAR NUEVO PRODUCTO</h1>
            </div>
            <div class="contenedorFormulario" id="colorform">
                <form style="display:flex; flex-direction: row; padding:20px;">

                    <div style="margin: 0 20px">
                        <!-- LABEL E INPUT PARA EL CÓDIGO DEL PRODUCTO -->
                        <div class="form-group">
                            <label class="font-weight-bold">Código de producto</label>
                            <input type="text" class="form-control" maxlength="14" id="idAdmin">

                            <small id="IDlHelp" class="form-text text-muted"></small>
                        </div>
                        <!-- LABEL E INPUT PARA EL NOMBRE DEL PRODUCTO -->
                        <div class="form-group">
                            <label class="font-weight-bold">Nombre</label>

                            <input type="text" maxlength="30" class="form-control" id="nomAdmin" >
                        </div>
                        <!-- LABEL E INPUT PARA EL COSTO DEL PRODUCTO -->
                        <div class="form-group">

                            <label class="font-weight-bold"> Costo</label>
                            <input type="text" maxlength="6" class="form-control" id="costoAdmin">
                        </div>
                    </div>
                    <div style="margin: 0 20px">
                        <!-- LABEL E INPUT PARA EL PRECIO DEL PRODUCTO -->
                        <div class="form-group">
                            <label class="font-weight-bold">Precio sugerido</label>
                            <input type="text" maxlength="6" class="form-control" id="precioAdmin">
                        </div>
                        <!-- LABEL E INPUT PARA LA CANTIDAD DEL PRODUCTO -->
                        <div class="form-group">
                            <label class="font-weight-bold">Cantidad</label>
                            <input type="text" maxlength="6" class="form-control" id="cantAdmin" >
                        </div>
                    </div>
                </form>

            </div>
            <input type="button" id="BotonModalAccion" value="Agregar" class="btn btn-success" style="margin:0;" target="_blank">
        </div>
    </div>

    <!-- MODAL CONFIRMACIÓN -->
    <div class="containerModal" style="background: rgba(0, 0, 120,0.2); align-items: flex-start;" id="modalConfirm">
        <div class="modal-dialog" style="max-width:10000px; width:600px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmación</h5>
                    <button type="button" class="btn btn-danger" id="cerrarModalConfirm">Cancelar</button>
                    </button>
                </div>
                <div>
                    <p style="margin:0 80px;">¿Estás seguro que deseas borrar este producto?</p>
                    <div class="modal-body" style="display:flex; justify-content: center; align-items:center; flex-direction: row; width:100%;">

                        <div style=" width:50%; margin: 0; display:flex; justify-content: space-evenly; align-items: center; flex-direction: column;
                    ">
                            <p>Id: <span id="idModalConfirm"> J123</span></p>
                            <p>Nombre: <span id="nomModalConfirm"> Batman</span></p>
                            <p>Cantidad: <span id="cantModalConfirm">500</span></p>
                        </div>
                        <div style="width: 50%; margin-left: 5px; display:flex; justify-content: center; align-items: center; flex-direction: column;
                    ">
                            <p>Precio: $<span id="precModalConfirm">30.02</span></p>
                            <p style="font-weight: 600;">Costo: $<span id="costoModal">300.02</span></p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="BTNconfirmacion1">Si, borralo y SIN agregar costos</button>
                        <button type="button" class="btn btn-info" id="BTNconfirmacion2">Si, borralo y AGREGA costos</button>

                    </div>
                </div>

            </div>

        </div>
    </div>
    
    <div class="containerModal" id="modalLista">
        <img src="./src/img/bx-x.svg" alt="" class="close-icon" id="closeIconLista">

        <div class="contenidoModal modalComprar" style="flex-direction:column;overflow-x:auto;  height:85%" id="contenidoModalLista">
            <div>
                <h1 class="titulo">Lista de compras futuras</h1>
            </div>
            <div class="contenedorFormulario">
                <form style="display:flex; flex-direction: row; padding:20px;">

                    <div style="margin: 0 20px">
                        <!-- LABEL E INPUT PARA EL CÓDIGO DEL PRODUCTO -->
                        <div class="form-group">
                            <label class="font-weight-bold">Código de producto</label>
                            <input type="text" class="form-control" style="cursor:not-allowed;" disabled id="idLista" placeholder="ID del producto">

                            <small id="IDlHelp" class="form-text text-muted"></small>
                        </div>
                        <!-- LABEL E INPUT PARA EL NOMBRE DEL PRODUCTO -->
                        <div class="form-group">
                            <label class="font-weight-bold">Nombre</label>

                            <input type="text" class="form-control" style="cursor:not-allowed;" disabled id="nomLista" placeholder="Nombre del producto">
                        </div>
                    </div>
                    <div style="margin: 0 20px">
                        <!-- LABEL E INPUT PARA LA CANTIDAD DEL PRODUCTO -->
                        <div class="form-group">
                            <label class="font-weight-bold">Cantidad en Almacén</label>
                            <input type="text" class="form-control" style="cursor:not-allowed;" disabled id="cantLista" placeholder="Cantidad del producto">
                        </div>
                        <!-- LABEL E INPUT PARA LA CANTIDAD DEL PRODUCTO -->
                        <div class="form-group">
                            <label class="font-weight-bold">Cantidad deseada</label>
                            <input type="text" class="form-control" id="cantdeseadaLista" placeholder="Cantidad deseada">
                        </div>
                    </div>
                </form>

            </div>
            <input type="button" id="BotonModalLista" value="Agregar" class="btn btn-success" style="margin:0;" target="_blank">
        </div>
    </div>

    <?php include_once("Layouts/modalGastos.php"); ?>

    <script src="src/js/Admin.js"></script>
    <script src="src/js/gastos.js"></script>
</body>

</html>