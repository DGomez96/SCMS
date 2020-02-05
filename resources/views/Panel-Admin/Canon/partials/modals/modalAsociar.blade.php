<!--Asociar-->
<div class="modal fade " id="asociarS" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#d9534f">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="asociarCanontitle" style="text-align:center">Asociar a </h5>

            </div>
            <div class="modal-body">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
                <thead>

                <tr style="background:#ffa501;color:#2109cc">
                    <th>Subcategoria a Asociar</th>
                    <th>Canon</th>
                </tr>
                </thead>
                <tbody id="asociarCanonT">

                </tbody>

            </table>
            <input type="text" list="asociar" id="asociarInput" class="form-control" name="name" required
            placeholder="Pulsa Enter para añadir la subcategoria">
            <datalist id="asociar">
                @foreach ($subCategorias as $subcategoria)
                
                <option value="{{$subcategoria['id']}}-{{$subcategoria['name']}}"> </option>

                @endforeach
            </datalist>
            <form action="{{ action('CanonsSubcategoriasController@store') }}" method="post" id="fCrearAsociacion">
                @csrf
                <br>
                <input type="submit" style="margin-left:40%;" class="btn btn-success" value="Guardar">
            </form>
            </div>
        </div>
    </div>
</div>