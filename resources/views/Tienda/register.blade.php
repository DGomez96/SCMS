@extends("Tienda.layout.index")

@section("contenido")
<div class="breadcrumbs-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <nav class="woocommerce-breadcrumb">
                                <a href="index.html">Home</a>
                                <span class="separator">/</span> register
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcrumbs End -->
            <!-- Page title -->
            <div class="entry-header">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" style="text-align: center">{{ __('Registro de Cliente') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseñas') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Empresa') }}</label>

                                        <div class="col-md-6">
                                            <input id="company" type="text" class="form-control" name="company" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="landline" class="col-md-4 col-form-label text-md-right">{{ __('Telefono Fijo') }}</label>

                                        <div class="col-md-6">
                                            <input id="landline" type="tel" class="form-control" name="landline" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="mobile-phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefono Movil') }}</label>

                                        <div class="col-md-6">
                                            <input id="mobile-phone" type="tel" class="form-control" name="mobile-phone" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Certificado de vendedor') }}</label>

                                        <div class="col-md-6">
                                            <input id="file" type="file" class="form-control" name="file" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">{{ __('IAE') }}</label>

                                        <div class="col-md-6">
                                            <input  type="file" class="form-control" name="iae" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Registrar') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
@endsection