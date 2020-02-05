<div class="modal fade " id="ModalCrearCategorias" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" style="width:70% !important" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#d9534f">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="ModalImportTitle" style="text-align:center">Crear Categoría</h5>

      </div>
      <div class="modal-body">
        <form action=" {{ url('/panelAdministrador/Categorias')}} " class="" id="crearCategoria" method="post">
          @csrf
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group row">
                <label for="product_name" class="col-sm-3 col-form-label">Nombre Categoria*</label>
                <div class="col-sm-9">
                  <input class="form-control error" name="category_name" autofocus="" type="text" id="name" required=""
                    placeholder="Nombre de la Categoria" aria-required="true" aria-invalid="true">
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group row">
                <label for="category_id" class="col-sm-3 col-form-label">SubCategorias*</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="Separa las SubCategorías por ," name="sub_cat"
                    class="col-sm-6 custom-select custom-select-sm">

                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <input type="submit" class="btn btn-primary" value="Guardar">
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</div>
