<div class="containerModal " style="align-items: flex-start; background: rgba(0, 0, 0, 0.5);" id="modalGastosF">
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
                    <small class="form-text text-muted"> Puedes dejar en blanco 2 de las 3 opciones en caso de que solo se requiera registrar 1 gasto</small>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vigilancia</label>
                        <input type="number" class="form-control" id="vigilanciaInput" placeholder="Introduce el gasto">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Comida</label>
                        <input type="number" class="form-control" id="comidanput" placeholder="Introduce el gasto">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Otros</label>
                        <input type="number" class="form-control" id="otrosInput" placeholder="Introduce el gasto">
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
