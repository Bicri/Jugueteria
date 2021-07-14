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
                <h1 class="Titulo-seccion" id="tituloH" style=" margin:0;">Juguetes Top</h1>
                <div class="justialignCenter" style="width: 200px; margin-right: 100px; justify-content: space-between!important;">
                    <div title="Más vendidos" class="botonTop" style="width:60px; cursor:pointer" id="BtnTop">
                        <img src="src/img/flechaverde.svg" alt="Top">
                    </div>
                    <div title="Menos vendidos" class="botonTop" style="width:60px; transform:rotate(180deg); cursor:pointer; " id="bottom">
                        <img src="src/img/flecha.svg" alt="Top">
                    </div>
                </div>
            </div>

            <div class="Container-Elements" id="itemsAdministracion">
                <table class="table table-hover">
                    <thead style="position:sticky; top:78px; background: rgba(240, 248, 255,0.7); backdrop-filter:blur(25px);" id="thead">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Vendidos</th>
                            <th scope="col">Ingreso</th>
                        </tr>
                    </thead>

                    <tbody id="elementosTop">
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <template id="productoTop">
        <tr>
            <td class="table-light" id="idProdTop">123456789asdf</td>
            <td class="table-light" id="nomProdTop">PistolaNerf G 240 Naranja 24mm</td>
            <td class="table-light" id="cantidadTop">100</td>
            <td class="table-light" id="ingresoTop">500.87</td>
        </tr>
    </template>
    <!-- MODAL DE GASTOS -->
    <div class="containerModal " style="align-items: flex-start; background: rgba(0, 0, 0, 0.5);" id="modalGastos">
        <div class="modal-dialog" style="max-width:10000px; width:400px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gastos del día</h5>
                    <button type="button" class="btn btn-danger" id="cerrarModalGastos">Cancelar</button>
                    </button>
                </div>
                <!-- <div class="modal-body" style="display:flex; justify-content: center; align-items:center; flex-direction: row; width:100%;"> -->
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Vigilancia</label>
                            <input type="number" class="form-control" id="vigilanciaInput" placeholder="Introduce">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Comida</label>
                            <input type="number" class="form-control" id="comidanput" placeholder="Introduce">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Otros</label>
                            <input type="number" class="form-control" id="otrosInput" placeholder="Introduce">
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="justify-content: center;">
                    <button type="button" class="btn btn-primary" id="BTNgastos">Agregar gastos</button>
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- MODAL DE GASTOS -->


    <script src="src/js/Top.js"></script>
    <script src="src/js/gastos.js"></script>
</body>

</html>