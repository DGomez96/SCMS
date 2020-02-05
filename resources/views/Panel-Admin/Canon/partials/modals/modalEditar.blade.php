
<div class="modal fade " id="editarCanon" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    
<div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header" style="background:#d9534f">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" style="text-align:center">Editar Canon</h5>

    </div>

    <div class="modal-body">

        <form action="Canon/" method="post" id="formularioEditarCanon">
        @csrf
        {{ method_field('PATCH') }}

        
        <div class="row">

            <div class="col-sm-6">
            <label for="crear">Nombre del Canon</label>
            <input type="text" class="form-control" name="name" id="editarname" required>
            </div>

            <div class="col-sm-6">
            <label for="crear">Impuesto</label>
            <input type="number" step="any" class="form-control" name="impuesto"  id="impuestoEditar" required>  
            </div>

        </div>

        <br>

        <div class="row">

            <div class="col-sm-1">
            <label for="tipo">Tipo</label>
            </div>
            <div class="col-sm-9">
            <select name="tipo" id="tipoEditar" class="form-control">
                <option value="Porcentaje" id="porcentaje">Porcentaje</option>
                <option value="Fijo" id="fijo">Fijo</option>
            </select>
            </div>
        
        </div>

        <label for="crear">Estado</label>

        <div class="onoffswitch">
            <input type="checkbox" name="statusEditar" class="onoffswitch-checkbox" id="onoffswitchEditar" checked="">
            <label class="onoffswitch-label" for="myonoffswitch">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
            </label>
        </div>

        <input type="submit" style="margin-left:40%;" class="btn btn-success" value="Guardar">
        </form>

    </div>
    </div>
</div>
</div>