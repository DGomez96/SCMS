@extends("Panel-Admin.Layouts.index")


@section("ContenidoPrincipal")

  <h3>
    <i class="fa fa-angle-right"></i> Listando Clientes 
    <button style="float:right;position:relative;top:-10px;" class="btn btn-round btn-success" data-uk-modal="{target:'#modalCrear'}">Crear Cliente</button>
  </h3>
  <div class="row mb">
    <!-- page start-->
    <div class="content-panel">
        <table class="table">
          <thead>
              
              <tr style="background:#ffa501;color:#2109cc">
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Descripcion</th>
                  <th>Negocio</th>   
                  <th>Estado</th>                
                  <th>Opciones</th>
              </tr>
          </thead>
          <tbody>
          
            @foreach($users as $usuario)
              <tr>
                @if(count($imgs) != '0')
                  @foreach($imgs as $img)

                      @if($img->id_user == $usuario->id)
                              <td><img src="{{asset('storage/'.$img['img'])}}" class="img-circle"  style="width:100px;heigh:auto" alt=""></td>
                              @break
                      @else
                        <td><img src="{{asset('assets/img/avatars/avatar_11.png')}}" alt="user avatar" class="dense-image dense-loading"></td>
                      @endif
                  @endforeach
                @else
                  <td><img src="{{asset('assets/img/avatars/avatar_11.png')}}" alt="user avatar" class="img-circle dense-loading"></td>
                @endif
                  <td >{{$usuario->name}}</td>
                  <td  >{{$usuario->email}}</td>
                  <td >{{$usuario->description}}</td>
                  <td> {{$usuario->company}} </td>
                  <td> Status</td>
                  <td>
                    
                  <form action=" {{ url('/panelAdministrador/Clientes/')}}{{'/'.$usuario->id}}" method="GET">
                  <input type="text" hidden name="edit" value="true">
                  <button class="btn btn-primary"><i class="fa fa-cog"></i></button>
                  </form>

                  <form action=" {{ url('/panelAdministrador/Clientes/')}}{{'/'.$usuario->id}}" method="GET">
                    <button class="btn btn-info"><i class="fa fa-eye"></i></button>

                  </form>

                  <form action=" {{ url('/panelAdministrador/Clientes/')}}{{'/'.$usuario->id}}" style="display:inline" method="POST">
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
    <div class="uk-width-medium-1-3 uk-grid-margin">
      <div class="uk-modal" id="modalCrear" aria-hidden="true" style="display: none; overflow-y: scroll;">
          <div class="uk-modal-dialog" style="top: 148px;">
              <div class="uk-modal-header">
                  <h3 class="uk-modal-title" style="text-align:center">Crear Usuario</h3>
              </div>

              {{-- Formulario Blade --}}
              
                            
              
              {!! Form::open(['action' => 'ClientsController@store','files' => true]) !!}
              
                {!! Form::label('img', 'Imagen',['class' => 'control-label']) !!}
                  
                  {!! Form::file('img', ['class' => 'form-control']) !!}
                  
                {!! Form::label('name', 'Nombre',['class' => 'control-label']) !!}
                  
                  {!! Form::text('name', '', ['class' => 'form-control']) !!}
                  
                {!! Form::label('email', 'E-Mail',['class' => 'control-label']) !!}

                  {!! Form::email('email', '', ['class' => 'form-control']) !!}
                
                {!! Form::label('telephone', 'Telefono',['class' => 'control-label']) !!}

                  {!! Form::number('telephone', '', ['class' => 'form-control','placeholder' => 'ejemplo: 902343536']) !!}
                
                {!! Form::label('company', 'Negocio',['class' => 'control-label']) !!}
                
                  {!! Form::text('company', '', ['class' => 'form-control']) !!}

                {!! Form::label('description', 'Descripcion',['class' => 'control-label']) !!}
                
                  {!! Form::textarea('description', '', ['class' => 'form-control','placeholder' => 'Inserta una breve descripcion, de a que se dedica el cliente']) !!}

                {!! Form::label('password', 'Password',['class' => 'control-label']) !!}

                  {!! Form::password('password', ['class' => 'form-control']) !!}
                  
                {!! Form::label('repassword', 'Repeat Password',['class' => 'control-label']) !!}
                  
                  {!! Form::password('re-password', ['class' => 'form-control']) !!}

                {!! Form::label('Rol', 'Rol',['class' => 'control-label']) !!}
                  
                {!! Form::select('Rol',array('1' => 'Administrador','2'=>'Suspendido','3'=>'Gestor','4'=>'Comercial','5'=>'Cliente de Web'),'Cliente de Web',['class' => 'form-control'] ) !!}
                
                                  
              <div class="uk-modal-footer uk-text-right">
                  <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                  
                  {!! Form::submit('Guardar', ['class' => 'md-btn md-btn-flat md-btn-flat-primary']) !!}
              </div>

              {!! Form::close() !!}
              
          </div>
      </div>
  </div>
    <!-- page end-->
</div>
<!-- /row -->
<!-- /wrapper -->
  <script src="{{ mix('/js/app.js') }}"></script>
  <script>
    $('table').dataTable();

  </script>

@endsection