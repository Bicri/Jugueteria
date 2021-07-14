<!DOCTYPE html>
<html lang="es" xml:lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="data:;base64,iVBORw0KGgo=">
    <title>Lista de compras</title>
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

            <div class="Header-seccion">
                <h1 class="Titulo-seccion">Lista de compras</h1>
            </div>

            <div class="Container-Elements" style="position:relative;">
                <!-- INPUTS -->
                <div style="width:30%; height:400px; position:sticky; top:100px; " class="justialignCenter">

                    <form style="margin-top:20px; flex-direction: column;" class="justialignCenter">
                        <div class="form-group">
                            <label for="nomLista">NOMBRE</label>
                            <input type="text" class="form-control" id="nomLista" aria-describedby="emailHelp" placeholder="Nombre del producto">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="cantLista">Cantidad</label>
                            <input type="number" class="form-control" id="cantLista" placeholder="Cantidad deseada">
                        </div>
                        <button type="submit" class="btn btn-primary" id="BtnAgregar">Agregar</button>
                    </form>
                </div>

                <!-- TABLA -->
                <div style="width:70%; margin:0; border: 1px solid lightgray; flex-direction: column;" class="justialignCenter">
                    <table class="table table-hover" style="margin:0;">
                        <thead style="position:sticky; top:89px; background: rgba(240, 248, 255,0.7); backdrop-filter:blur(25px);">
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Almacen</th>
                                <th scope="col">Deseada</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>

                        <tbody id="elementosAdmin">

                        </tbody>

                    </table>
                    <div class="justialignCenter" style=" width:100%;position: sticky; bottom: 2px; background: white;">
                        <a href="Controlador/ImprimeLista.php" style="margin:10px" class="btn btn-primary disabled" target="_blank" id="BtnImprimir">Imprimir</a>
                        <input type="button" value="Borrar" id="BtnBorrar" class="btn btn-danger" disabled>
                    </div>
                </div>
            </div>
        </div>



    </div>


    <!-- TEMPLATE PARA CADA FILA -->
    <template id="FilaElementoLista">
        <tr>
            <td class="table-light" id="idProdLista">123456789ferf</td>
            <td class="table-light" id="nomProdLista">PistolaNerf G 240 naranja 4mm</td>
            <td class="table-light" id="cantidadProdLista">100</td>
            <td class="table-light" id="cantidadDeseadaLista">100</td>
            <td class="table-light">
                <button class="btn btn-info" title="Aumentar">+</button>
                <button class="btn btn-danger" title="Reducir">-</button>
            </td>
        </tr>
    </template>
    <!-- -.-.-.-.-.-.-.-.-.-.-.- -->
    
    <?php include_once("Layouts/modalGastos.php"); ?>

    <script src="src/js/ListaCompras.js"></script>
    <script src="src/js/gastos.js"></script>
</body>

</html>