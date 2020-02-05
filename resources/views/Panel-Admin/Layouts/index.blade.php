{{--PHP SCRIPT--}}
<?php 
    $URI = $_SERVER['REQUEST_URI'] ;
    $email = Auth::user()->name;
    
    $spliteada = explode("/", $URI);

    if(!isset($spliteada[3])){
      $spliteada[3] = 1;
    }

?>

<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
  <head>
    <title>@yield('Titulo','Panel Administrador')</title>

    @include('Panel-Admin.Layouts.partials.Head-ScriptyLibrerias')

  </head>
  <body>
    
    <section id="container">
        {{-- Header --}}
        @include('Panel-Admin.Layouts.partials.header')
    
        
        {{-- Sidebar --}}
        @include('Panel-Admin.Layouts.partials.sidebar')
    
        {{--Contenido Principal--}}
        <section id="main-content">
          <section class="wrapper">
            @yield("ContenidoPrincipal")
          </section>
        </section>
    
        {{--Comienzo del Footer--}}
        @include('Panel-Admin.Layouts.partials.footer')
    
        {{-- VUE Y SCRIPTS --}}
        @include('Panel-Admin.Layouts.partials.script')
    </section>
  </body>
</html>