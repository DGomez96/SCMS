@extends('Panel-Admin.Layouts.index')
  <script>
    var subcategorias = {!! json_encode($subcategory->toArray()) !!};
  </script>
  @section('ContenidoPrincipal')
    <h3>
      <i class="fa fa-angle-right"></i> Categorias y SubCategorias
      <button style="float:right;position:relative;top:-10px;" class="btn btn-success"  onclick="abrirCrearCategoria()">Crear Categoria</button>
    </h3>

    <div class="row mb">
      <!-- page start-->
      <div class="content-panel " style="width:100%">
        <div class="adv-table" style="display:block">
          <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
            <thead>

              <tr style="background:#ffa501;color:#2109cc">
                <th>Nombre</th>
                <th>Número de Subcategorias</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categorias as $categoria)

                <tr class="gradeA">
                  <td>{{$categoria->category_name}}</td>
                  {{ $contador = 0 }}
                  @foreach($subcategory as $subcate)
                    @if($subcate->id_category == $categoria->id)
                      <?php $contador++?>
                    @endif
                  @endforeach
                  <td>{{ $contador }}</td>

                  <td class="center hidden-phone">
                    <a onclick="editarCategoria({{$categoria->id}},'{{$categoria->category_name}}')" class="btn btn-primary"><i
                        class="fa fa-cog"></i></a>
                    <a class="btn btn-info"
                      onclick="SubcategoriaModal({{$categoria->id}},'{{$categoria->category_name}}')"><i
                        class="fa fa-eye"></i></a>

                    <form action=" {{ url('/panelAdministrador/Categorias/'.$categoria->id) }}" style="display:inline"
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

    {{-- Modale--}}
    @include('Panel-Admin.Category.partials.modals.crear')

    {{-- Modal ver Subcategorias--}}
    @include('Panel-Admin.Category.partials.modals.ver')

    {{--Editar--}}
    @include('Panel-Admin.Category.partials.modals.editar')
  @endsection