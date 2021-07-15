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
                <h1 class="Titulo-seccion" id="tituloH" style=" margin:0;">Utilidad semanal</h1>
            </div>
            <div class="utilidadCont">

                <div class="datos justialignCenter" style="width:50% ;">
                    <div style= " margin-top:20px;display:flex; justify-content: center; align-items: center; flex-direction: row; width:95%;">
                        <div id="dateInicio" class="noneObj">
                            <label for="fechaInicio">Inicio</label>
                            <input type="date" class="inputText" style="margin:0!important; width: 190px; cursor:text;" id="fechaInicio">
                        </div>
                        <div id="dateFin" class="noneObj">
                            <label for="fechaInicio" style="margin-left: 10px;">Fin</label>
                            <input type="date" class="inputText" style="margin:0; width: 190px; cursor:text;" id="fechaFin">                            
                        </div>                        
                        <div id="botonFechasMostrar" class="noneObj">
                            <input type="button" value="Mostrar" class="btn boton-primario mb-1 ml-2" id="BtnFechas">
                        </div>
                    </div>
                    <div id="TODOS" style="width:100%;"class="datos justialignCenter">

                        <div class="renglonLabel">
                            <!-- style="display:none" -->
                            <div  class="etiquetas">
                                <h5 style="font-weight: 600; margin:0;">Ingresos</h5>
                                <h6 style="margin:0;" id="lblIngresos">$500.00</h6>
                            </div>
                        </div>
                        <div class="renglonLabel">
                            <!-- style="display:none" -->
                            <div class="etiquetas">
                                <h5 style="font-weight: 600; margin:0;">Costos directos</h5>
                                <h6 style="margin:0;"id="lblCDirectos">$500.00</h6>
                            </div>
                            <div id="gastosporcentaje" style="margin:0; width:100%;">
                                <div class="etiquetas">
                                    <h6 style="font-weight: 600; margin:0;">Vigilancia</h5>
                                    <h6 style="margin:0;">% <span id="vigilancia">90</span></h6>
                                </div>
                                <div class="etiquetas">
                                    <h6 style="font-weight: 600; margin:0;">Comida</h5>
                                    <h6 style="margin:0;">% <span id="comida"> 9</span></h6>
                                </div>
                                <div class="etiquetas">
                                    <h6 style="font-weight: 600; margin:0;">Otros</h5>
                                    <h6 style="margin:0;">% <span id="otros"> 1</span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="renglonLabel">
                            <!-- style="display:none" -->
                            <div style="margin:0;" class="etiquetas">
                                <h5 style="font-weight: 600; margin:0;">Costos indirectos</h5>
                                <h6 style="margin:0;" id="lblCIndirectos">$500.00</h6>
                            </div>
                        </div>
                        <div class="renglonLabel">
                            <!-- style="display:none" -->
                            <div style="margin:0;" class="etiquetas">
                                <h5 style="font-weight: 600; margin:0;" id="tituloUtilidad">Utilidad/Perdida</h5>
                                <h6 style="margin:0;" id="utilidad">$500.00</h6>
                            </div>
                        </div>
                        <div class="renglonLabel">
                            <!-- style="display:none" -->
                            <div style="margin:0;" class="etiquetas">
                                <h5 style="font-weight: 600; margin:0;">Almacen</h5>
                                <h6 style="margin:0;" id="almacen">$500.00</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grafica" style="width:50%; display:flex;align-items: center; justify-content: flex-end;">

                    <div class="justialignCenter" style="display:flex; width:100%;">
                        <input type="button" value="Finalizar semana" id="finSemana" class="btn boton-mini">
                        <input type="button" value="Finalizar año" id="finAnio" class="btn boton-aceptar">
                    </div>
                </div>
            </div>
        </div>                           

    </div>


    <?php include_once("Layouts/modalGastos.php"); ?>
    <script src="src/js/gastos.js"></script>
    <script src="src/js/Utilidad.js"></script>
</body>

</html>