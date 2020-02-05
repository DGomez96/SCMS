<div class="modal fade " id="crearCanon" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#d9534f">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" style="text-align:center">Crear Canones</h5>

            </div>
            <div class="modal-body">
            <form action="Canon" method="post" id="formularioCanon">
                @csrf
                <label for="crear">Nombre del Canon</label>
                <input type="text" class="form-control" name="name" required
                placeholder="nombre del canon.">
                <label for="crear">Impuesto</label>
                <input type="number" step="any" class="form-control" name="impuesto" required
                    placeholder="Impuesto">
                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="Porcentaje">Porcentaje</option>
                    <option value="Fijo">Fijo</option>
                </select>
                
                <label for="crear">Subcategoria del Canon</label>
                <input list="categorias" class="form-control" name="id_subCategory" class="col-sm-6 custom-select custom-select-sm">
                <datalist id="categorias">
                    @foreach ($subCategorias as $subcategoria)
                    
                        <option value="{{$subcategoria['id']}}-{{$subcategoria['name']}}"> </option>

                    @endforeach
                </datalist>
                <label for="crear">Estado</label>
                <div class="onoffswitch">
                    <input type="checkbox" name="status" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                    <label class="onoffswitch-label" for="myonoffswitch">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
                <br>
                <input type="submit" style="margin-left:40%;" class="btn btn-dark" value="Crear">
            </form>
            </div>
        </div>
    </div>
</div>