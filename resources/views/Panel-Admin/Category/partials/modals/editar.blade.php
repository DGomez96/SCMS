<div class="modal fade " id="editarCategoria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#d9534f">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" style="text-align:center">Modificar Categoria</h5>

      </div>
      <div class="modal-body">
        <form action="Categorias" method="post" id="formularioEditarCategoria">
          @csrf
          {{ method_field('PATCH') }}
          <label for="category_name">Categoria Principal</label>
          <input type="text" class="form-control" name="category_name" id="category_name" required>
          <label for="subCategorias">SubCategorias</label>
          <input type="text"  class="form-control" name="subcategorias" id="subcategory" required>
          <input type="hidden" name="sCategorias" value="{{$subcategory}}">
          <input type="hidden" name="id" id="id" value="">
          <br>
          <input type="submit" style="margin-left:40%;" class="btn btn-dark" value="Guardar">
        </form>
      </div>
    </div>
  </div>
</div>