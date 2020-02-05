@extends('Panel-Admin.Layouts.index')

@section('ContenidoPrincipal')
  <h3>
    <i class="fa fa-angle-right"></i> Canon 
    <button style="float:right;position:relative;top:-10px;" class="btn btn-success"  onclick="crearCanon()">Crear Canon</button>
  </h3>
  

  <div class="row mb">
    <!-- page start-->
    <div class="content-panel " style="width:100%">
      <div class="adv-table" style="display:block">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
          <thead>

            <tr style="background:#ffa501;color:#2109cc">
              <th>Nombre Canon</th>
              <th>Impuesto</th>
              <th>Estatus</th>
              <th>Tipo</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($canones as $canon)

              <tr class="gradeA">
                <td>{{$canon['name']}}</td>
                <td>{{$canon['impuesto']}}</td>

                @if($canon['status'] == '1')
                  <td class="center hidden-phone" style="color:green"> Activo </td>
                @else
                  <td class="center hidden-phone" style="color:red"> Inactivo </td>
                @endif

                <td class="center hidden-phone">{{$canon['tipo']}}</td>
              
                <td class="center hidden-phone">
                  <a  class="btn btn-primary" onclick="abrirEditarCanon({{$canon}},{{$subCategorias}})"><i
                      class="fa fa-cog"></i></a>
                  <a class="btn btn-info" onclick="mostrarSCanon({{$canon}},{{$canon->canonSubcategoria}},{{$subCategorias}})"><i class="fa fa-eye"></i></a>
                  <form action="/panelAdministrador/Canon/{{$canon['id']}}" style="display:inline"
                    method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" onclick='borrar()'><i class="fa fa-trash-o"></i></button>
                  </form>
                </td>                
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- page end-->
    </div>
    
  </div> 
  
  <!-- Modale-->
  
  <!--Crear Canon-->
  @include('Panel-Admin.Canon.partials.modals.modalCrear')
  <!-- Mostrar Subcategorias-->
  @include('Panel-Admin.Canon.partials.modals.modalVerSub')

  <!-- Asociar -->
  @include('Panel-Admin.Canon.partials.modals.modalAsociar')

  <!--Editar -->
  @include('Panel-Admin.Canon.partials.modals.modalEditar')

@endsection