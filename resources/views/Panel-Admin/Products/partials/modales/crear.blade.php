<div class="modal fade " id="ModalCrearProductos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:70% !important" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" id="ModalProductosLabel" style="text-align:center">Crear nuevo producto</h5>

        </div>
        <style>
          a.step:hover{
            background:transparent !important;
            color:black !important;
          }
          a.step:active,a.step:visited,a.step:checked,a.step:target,a.step:enabled,a.step:focus{
            color:black !important;
            background:transparent !important;
          }
        </style>
        <div class="modal-body">
          <div class="panel panel-bd lobidrag">
          <form action=" {{ url('/panelAdministrador/Productos')}} " class="" id="formularioCrearProducto" enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="panel-body">
              <div id="rootwizard">
                  <div class="navbar">
                      <div class="navbar-inner form-wizard">
                          <ul class="nav nav-pills nav-justified steps">
                              <li class="active">
                                  <a href="#tab1" data-toggle="tab" class="step" aria-expanded="true">
                                      <span class="number"> 1 </span>
                                      <span class="desc">Información </span>
                                  </a>
                              </li>
                              <li>
                                  <a href="#tab2" data-toggle="tab" class="step" aria-expanded="true">
                                      <span class="number"> 2 </span>
                                      <span class="desc">Tienda</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="#tab3" data-toggle="tab" class="step" aria-expanded="true">
                                      <span class="number"> 3 </span>
                                      <span class="desc">Precios</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div id="bar" class="progress">
                      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                  </div>
                  <div class="tab-content">
                      <div class="tab-pane active" id="tab1">
                          <div class="row">
                              <div class="col-sm-4">
                                  <div class="form-group row">
                                      <label for="product_name" class="col-sm-3 col-form-label">Productos*</label>
                                      <div class="col-sm-9">
                                          <input class="form-control error" name="name" autofocus="" type="text" id="name" required="" placeholder="Nombre" aria-required="true" aria-invalid="true" >
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-4">
                                  <div class="form-group row">
                                      <label for="category_id" class="col-sm-3 col-form-label">SubCategoria*</label>
                                      <div class="col-sm-9">
                                          <input list="categorias" class="form-control" id="category_id" name="category_id" class="col-sm-6 custom-select custom-select-sm">
                                          <datalist id="categorias">
                                              @foreach ($subCategorias as $subcategoria)
                                              
                                                <option value="{{$subcategoria['id']}}-{{$subcategoria['name']}}"> </option>

                                              @endforeach
                                          </datalist>
                                        
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-4">
                                  <div class="form-group row">
                                      <label for="image_thumb" class="col-sm-3 col-form-label">Imagenes</label>
                                      <div class="col-sm-9">
                                          <input type="file" name="img[]" class="form-control"  multiple="multiple">

                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-sm-12">
                                  <div class="form-group row">
                                      <label for="details" class="col-sm-3" style="margin:0px">Descripción Larga</label>
                                      <div class="col-sm-10">
                                          <textarea hidden id="description" name="description"/></textarea>
                                          <div id="edit" style="height:20rem;"></div >
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-sm-12">
                                  <div class="form-group row">
                                      <label for="descrip_corta" class="col-sm-5 col-form-label">Descripcion corta</label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" name="descrip_corta" id="descrip_corta" rows="3" placeholder="Descripción corta"></textarea>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="tab-pane" id="tab2">

                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group row">
                                      <label for="unit" class="col-sm-3 col-form-label">Unidades Almacen</label>
                                      <div class="col-sm-9">
                                          <input type="number" name="stock" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group row">
                                      <label for="brand" class="col-sm-3 col-form-label">Marca</label>
                                      <div class="col-sm-9">
                                          <input list="brands" class="form-control" id="brand_id" name="brand_id" class="col-sm-6 custom-select custom-select-sm">
                                          <datalist id="brands">
                                              @foreach ($marcas as $marca)
                                              
                                                <option value="{{$marca['id']}}-{{$marca['brand_name']}}"> </option>

                                              @endforeach
                                          </datalist>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              
                              <div class="col-sm-6">
                                  <div class="form-group row">
                                      <label for="tag" class="col-sm-3 col-form-label">Etiquetas separala por coma.</label>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" name="tag" placeholder="Etiquetas..">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group row">
                                      <label for="model" class="col-sm-3 col-form-label">Seguimiento Producto <span class="color-red">*</span></label>

                                      <div class="col-sm-9">
                                          <input type="text" tabindex="5" class="form-control" name="sku" id="sku" disabled placeholder="SKU" aria-required="true">
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              
                              <div class="col-sm-6">
                                  <div class="form-group row">
                                      <label for="tag" class="col-sm-3 col-form-label">Oferta?</label>
                                      <div class="col-md-9">
                                          <input list="oferta" class="form-control" id="offer" name="offer" class="col-sm-6 custom-select custom-select-sm">
                                          <datalist id="oferta">
                                              <option value="Si"></option>
                                              <option value="No"></option>
                                          </datalist>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group row ventaCaliente" hidden>
                                  <label for="tipoOferta"  class="col-sm-3 col-form-label">Venta Caliente</label>
                                  <div class="col-md-9">
                                    <input type="datetime-local" class="form-control" name="vent-hot" id="">
                                  </div>
                                </div>
                              </div>
                          </div>

                      </div>

                      <div class="tab-pane" id="tab3">
                        <div class="row">                
                          <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="tag" class="col-sm-3 col-form-label">Precio de Venta</label>
                                  <div class="col-md-9">
                                      <input type="number" class="form-control" name="purchase_price" >
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="color" name="colorLabel" class="col-sm-3 col-form-label" style="display:block">Color</label>
                                  <div class="col-md-9">
                                      <input type="text" class="form-control" name="colorInput"  placeholder="Separar Colores por ,"></input>
                                  </div>
                              </div>
                          </div>
  
          
                        </div>
                        <div class="row">                

                          <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="ean" class="col-sm-3 col-form-label">EAN</label>

                                  <div class="col-sm-9">
                                      <input name="ean" type="number" class="form-control col-sm-3" ></input>
                                  </div>

                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="size" class="col-sm-3 col-form-label"  style="display:block">Tamaño</label>
                                  <div class="col-md-9">
                                          <input type="text" class="form-control" name="size"  placeholder="Separar Tamaños por ,"></input>
                                  </div>  
                               </div>
                          </div>
                        </div>
                        <div class="row">                
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="tag" class="col-sm-3 col-form-label">Estado</label>
                                    <div class="col-md-9">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="status" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                                            <label class="onoffswitch-label" for="myonoffswitch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                      </div>
                                  </div>
          
                              </div>
                              
                          <div class="col-sm-6">
                              <div class="form-group row">
                                 <label for="">Coste del Envio</label>
                                 <div class="col-md-7">
                                      <input type="text" class="form-control" name="shipping_price" ></input>
                                  </div>   
                              </div>
                          </div>
                    
                           
                            <div class="col-md-9">
                              <input type="submit"  class="btn btn-primary" value="Guardar Producto" >
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          </form>   
        </div>            
        </div>
      </div>
    </div>
  </div>