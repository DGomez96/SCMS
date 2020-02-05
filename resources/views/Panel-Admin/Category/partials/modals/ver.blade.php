<div class="modal fade " id="verSubCategorias" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" style="width:70% !important" role="document">
    <div class="modal-content">
      <div class="modal-header" id="cabeceraVerSubcategoria" style="background:#d9534f">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="verSubCategoryTittle" style="text-align:center"></h5>

      </div>
      <div class="modal-body" id="bodySubCategorias">
        <div class="adv-table" style="display:block">
          <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
            <thead>

              <tr style="background:#ffa501;color:#2109cc">
                <th>Nombre Subcategoria</th>
                <th>Categoria Asociada</th>

                <th>Opciones</th>
              </tr>
            </thead>
            <tbody id="tablaSubcategoria">

            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--Crear Subcategoria-->
<div class="modal fade " id="crearSubcategoria" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#d9534f">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" style="text-align:center">Crear Subcategoria</h5>

      </div>
      <div class="modal-body">
        <form action="SubCategorias" method="post" id="formularioCrear">
          @csrf
          <label for="crear">Nombre</label>
          <input type="text" class="form-control" name="name" required
            placeholder="nombre de las subcategorias,separado por comas.">
          <br>
          <input type="submit" style="margin-left:40%;" class="btn btn-dark" value="Guardar">
        </form>
      </div>
    </div>
  </div>
</div>
</div>