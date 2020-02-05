@extends("Panel-Admin.Layouts.index")

@section("ContenidoPrincipal")
    <script>
        var productos = {!! json_encode($products->toArray()) !!};
    </script>
    <h3>
        <i class="fa fa-angle-right"></i> Productos 
        <button style="float:right;position:relative;top:-10px;" class="btn btn-success" onclick="abrirCrearProductos()">Crear Producto</button>
        <button style="float:right;position:relative;top:-10px;margin-right:2px" class="btn btn-danger"  onclick="abrirImportaroExportar();">Exportaciones e Importaciones</button>
    </h3>
    <div class="row mb">
        <!-- page start-->
        <div class="content-panel">
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin="">
                    <div class="uk-width-1-1">
                        <div class="uk-overflow-container">
                            <table class="uk-table" id="list-table">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <div class="input-group" style="width:100%">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                                <input class="form-control" id="product_search_name"  type="text"/>
                                                </div>
                                            </div>
                                        </th>
                                        
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <th>Nombre del Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad del Producto</th>
                                        <th>Estado del Producto</th>
                                        <th>¿Activo/Inactivo?</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $indice => $producto)
                                        <tr>
                                            <td><img class="img_thumb dense-image dense-loading" src="assets/img/ecommerce/s6_edge_3.jpg" alt=""></td>
                                            <td class="uk-text-large uk-text-nowrap"><a href="ecommerce_product_details.html">{{$producto->name}}</a></td>
                                            <td class="uk-text-nowrap">{{$producto->purchase_price}} €</td>
                                            <td>{{$producto->stock}}</td>
                                            <td class="uk-text-nowrap">
                                                @if($producto->stock > 1)
                                                    <span class="uk-badge uk-badge-success">En stock</span>
                                                @else
                                                    <span class="uk-badge uk-badge-danger">Sin Stock</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($producto->status == '0')
                                                    <div id="inactivo-{{$producto->id}}"><i class="material-icons uk-text-muted md-24"></i></div>
                                                    <p hidden>off</p>
                                                    <div id="activo-{{$producto->id}}" hidden><i class="material-icons uk-text-success md-24"></i></div>
                                                @else
                                                    <div id="inactivo-{{$producto->id}}" hidden><i class="material-icons uk-text-muted md-24"></i></div>
                                                    <div id="activo-{{$producto->id}}"><i class="material-icons uk-text-success md-24"></i></div>
                                                    <p hidden>on</p>

                                                @endif
                                            </td>
                                            <td class="uk-text-nowrap">
                                                <a href="ecommerce_product_details.html"><i class="material-icons md-24"></i></a>
                                                <a href="#"><i class="material-icons md-24"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                        <ul class="uk-pagination uk-margin-medium-top uk-margin-medium-bottom">
                            <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
                            <li class="uk-active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><span>…</span></li>
                            <li><a href="#">20</a></li>
                            <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- page end-->
    </div>
    <!-- /row -->
    <!-- /wrapper -->
        
  {{-- Modales --}}

  {{-- Exportaciones e Importaciones--}}
  @include('Panel-Admin.Products.partials.modales.importExport')

  {{--Crear Modal--}}
  @include('Panel-Admin.Products.partials.modales.crear')

  {{-- Scriptig especial --}}
  @include('Panel-Admin.Products.partials.script-list')
@endsection