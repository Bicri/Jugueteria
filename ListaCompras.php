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
                <div style="width:40%; height:400px; position:sticky; top:100px; " class="justialignCenter">

                    <form style="margin-top:20px; flex-direction: column;" class="justialignCenter">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NOMBRE</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre del producto">
                            <small id="emailHelp" class="form-text text-muted">letras por si acaso xD</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Cantidad</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Cantidad deseada">
<<<<<<< HEAD
                        </div>
=======
                        </div>                        
>>>>>>> master
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>

                <!-- TABLA -->
                <div style="width:60%; margin:0; border: 1px solid lightgray; flex-direction: column;" class="justialignCenter">
                    <table class="table table-hover" style="margin:0;">
                        <thead style="position:sticky; top:89px; background: rgba(240, 248, 255,0.7); backdrop-filter:blur(25px);">
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Nombre</th>
<<<<<<< HEAD
                                <th scope="col">Cantidad Almacen</th>
                                <th scope="col">Cantidad deseada</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>

                        <tbody id="elementosAdmin">

                        </tbody>

=======
                                <th scope="col">Cantidad</th>
                                <th scope="col">Cantidad deseada</th>
                                <th scope="col">Columna#</th>
                            </tr>
                        </thead>

                        <tbody id="elementosAdmin" >
                        <tr>
            <td class="table-light" id="idProdTabla">primero</td>
            <td class="table-light" id="nomProdTabla">PistolaNerf G 240 Naranja 24mm</td>
            <td class="table-light">Disponible (<span id="cantidadTablaAdmin">100</span>)</td>
            <td class="table-light">$<span id="precioTablaAdmin">500.87<span /></td>
            <td class="table-light">
                <button class="btn btn-success" title="Agregar stock">➕</button>
                <input type="button" value="✏️" title="Editar producto" class="btn btn-warning">
                <input type="button" value="🗑️" title="Eliminar producto" class="btn btn-danger">
                <input type="button" value="📑" title="Agregar a lista de compras futuras" class="btn btn-primary">
            </td>
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
                        </tbody>
>>>>>>> master
                    </table>
                    <div class="justialignCenter" style=" width:100%;position: sticky; bottom: 2px; background: white;">
                        <a href="Controlador/ImprimeLista.php" style="margin:10px" class="btn btn-primary" target="_blank">Imprimir</a>
                        <input type="button" value="Borrar" class="btn btn-danger">
                    </div>
<<<<<<< HEAD
                </div>
=======



                </div>




>>>>>>> master
            </div>
        </div>



    </div>
</body>

</html>