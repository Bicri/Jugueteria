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

            <div class="Header-seccion" style=" flex-direction: row; justify-content: space-between; align-items: center;">
                <h1 class="Titulo-seccion" id="tituloH" style=" margin:0;">Alertas</h1>
            </div>


            <div class="Container-Elements" id="itemsAdministracion">
                <table class="table table-hover">
                    <thead style="position:sticky; top:78px; background: rgba(240, 248, 255,0.7); backdrop-filter:blur(25px);" id="thead">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Existencia</th>
                        </tr>
                    </thead>

                    <tbody id="elementosAlert">

                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <template id="productoAlert">
        <tr>
            <td class="table-light" id="idProdTop">123456789asdf</td>
            <td class="table-light" id="nomProdTop">PistolaNerf G 240 Naranja 24mm</td>
            <td class="table-danger" id="cantidadTop">100</td>
        </tr>
    </template>


    <?php include_once("Layouts/modalGastos.php"); ?>

    <script src="src/js/gastos.js"></script>

    <script src="src/js/alertas.js"></script>

</body>

</html>