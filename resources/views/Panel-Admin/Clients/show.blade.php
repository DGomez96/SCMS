@extends('Panel-Admin.Layouts.index')


@section('ContenidoPrincipal')
    <style>
        input {
            color:black;
        }
    </style>

    <div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-6-10" style="">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="md-card">
                            <div class="user_heading">
                                <input type="text" name="id" id="id" value="{{$user->id}}" hidden>
                                <div class="user_heading_avatar">
                                    @if(count($imgProfile) != 0)
                                        <img src="{{asset('storage/'.$imgProfile[0]->img)}}" alt="user avatar" class="dense-image dense-loading">
                                    @else
                                        <img src="{{asset('assets/img/avatars/avatar_11.png')}}" alt="user avatar" class="dense-image dense-loading">
                                    @endif
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b uk-margin-bottom">
                                        
                                        <span class="uk-text-truncate">
                                            <div id="1">{{$user->name}}</div>
                                            <input type="text" class="form-control" name="name" value="{{$user->name}}" style="color:black" hidden>
                                        </span>
                                        
                                        <span class="sub-heading">
                                            <div id="2">{{ $user->company == '' ? 'Este usuario no tiene compañia' : $user->company }}</div>
                                            <input type="text" class="form-control" name="company" value="{{$user->company}}" placeholder="Coloque su empresa aqui" style="color:black;width:50%" hidden>
                                        
                                        </span>
                                    </h2>
                                    <ul class="user_stats">
                                        <li>
                                            <h4 class="heading_a">2391 <span class="sub-heading">Compras</span></h4>
                                        </li>
                                        <li>
                                            <h4 class="heading_a">120 <span class="sub-heading">Gastos en Tienda</span></h4>
                                        </li>
                                        <li>
                                            <h4 class="heading_a">284 <span class="sub-heading">Pedido por Mes</span></h4>
                                        </li>
                                        <li>
                                            <h4 class="heading_a">{{($rol[0]['name'])}}<span class="sub-heading">Rol de la Cuenta</span></h4>
                                        </li>
                                    </ul>
                                </div>
                                <div id="btnEdit">
                                    <a class="md-fab md-fab-small md-fab-accent">
                                        <i class="material-icons"></i>
                                    </a>
                                </div>
                                <div id="btnGuardar" hidden>
                                    <button class="md-fab md-fab-small md-fab-accent">
                                        <i class="material-icons"></i>
                                    </button>
                                </div>

                                
                            </div>
                            <div class="user_content">
                                
                                <div class="uk-sticky-placeholder" style="height: 46px; margin: 0px;"><ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" data-uk-sticky="{ top: 48, media: 960 }" style="margin: 0px;">
                                    <li class="uk-active" aria-expanded="true"><a href="#">Sobre El</a></li>
                                    <li aria-expanded="false" class=""><a href="#">Compras</a></li>
                                    <li aria-expanded="false" class=""><a href="#">Facturas</a></li>
                                <li class="uk-tab-responsive uk-active uk-hidden" aria-haspopup="true" aria-expanded="false"><a>About</a><div class="uk-dropdown uk-dropdown-small"><ul class="uk-nav uk-nav-dropdown"></ul><div></div></div></li></ul></div>
                                <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                                    <li aria-hidden="false" class="uk-active" style="animation-duration: 200ms;">
                                        <div id="5">{{$user->description}}</div>
                                        <input type="text" class="form-control" name="description" value="{{$user->description}}" style="color:black" hidden>
                                            <div class="uk-width-large-1-2">
                                                <h4 class="heading_c uk-margin-small-bottom">Contact Info</h4>
                                                <ul class="md-list md-list-addon">
                                                    <li>
                                                        <div class="md-list-addon-element">
                                                            <i class="md-list-addon-icon material-icons"></i>
                                                        </div>
                                                        <div class="md-list-content">
                                                            <div id="3"><span class="md-list-heading">{{$user->email}}</span></div>
                                                            <input type="email" class="form-control" name="email" required value="{{$user->email}}" style="color:black" hidden>
                                                            <span class="uk-text-small uk-text-muted">Email</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="md-list-addon-element">
                                                            <i class="md-list-addon-icon material-icons"></i>
                                                        </div>
                                                        <div class="md-list-content">
                                                            <div id="4"><span class="md-list-heading">{{$user->telephone == '' ? 'No tiene telefono ' : $user->telephone}}</span></div>
                                                            <input type="number" class="form-control" name="telephone" required value="{{$user->telephone}}" style="color:black" hidden>
                                                            <span class="uk-text-small uk-text-muted">Telefono</span>
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{-- Alertas --}}
                        <div class="uk-width-large-3-10 uk-grid-margin" >
                            <div class="md-card">
                                <div class="md-card-content">
                                    <div class="uk-margin-medium-bottom">
                                        <h3 class="heading_c uk-margin-bottom">Ultimas Compras</h3>
                                        <ul class="md-list md-list-addon">
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons uk-text-warning"></i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Aut labore.</span>
                                                    <span class="uk-text-small uk-text-muted uk-text-truncate">Et quam consectetur minus dolore accusamus qui.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons uk-text-success"></i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Libero voluptas.</span>
                                                    <span class="uk-text-small uk-text-muted uk-text-truncate">Odio est quam animi eveniet dolores culpa sint.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons uk-text-danger"></i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Est enim.</span>
                                                    <span class="uk-text-small uk-text-muted uk-text-truncate">Aspernatur repellat cupiditate harum necessitatibus consectetur.</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            // enable hires images
            altair_helpers.retina_images();
            // fastClick (touch devices)
            if(Modernizr.touch) {
                FastClick.attach(document.body);
            }
        });


        $('#btnEdit').on('click',function(){

            let inputs = Array.from($('input'));
            
            let div = Array.from($('#1,#2,#3,#4,#5'));
            inputs.splice(0,4);
            console.log(inputs);
            for(i=0 ; i < inputs.length;i++ ){

                div[i].hidden = true;
                inputs[i].hidden = false;

            }

            $('#btnEdit').attr('hidden',true);
            $('#btnGuardar').attr('hidden',false);
        });

        function edit(){
            let inputs = Array.from($('input'));
            
            let div = Array.from($('#1,#2,#3,#4,#5'));
            inputs.splice(0,4);
            console.log(inputs);
            for(i=0 ; i < inputs.length;i++ ){

                div[i].hidden = true;
                inputs[i].hidden = false;

            }

            $('#btnEdit').attr('hidden',true);
            $('#btnGuardar').attr('hidden',false);
        }
    </script>

    @isset($edit)
        <script>edit()</script>
    @endisset

@endsection