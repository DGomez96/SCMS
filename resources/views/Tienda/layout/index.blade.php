
<?PHP 
    //Importaciones
    use App\Categoria;
    use App\SubCategorias;


    $uri = $_SERVER['REQUEST_URI'];

    $categorias = Categoria::all();
    $subCategorias = SubCategorias::all();

    $contadorCategorias = 0 ;
?>
<!doctype html>
<html class="no-js" lang="es">
    <head>
        @include('Tienda.layout.partials.head')
    </head>
    <body>

        <!-- Cuerpo -->
        
        <div class="wrapper home-one">
            <!-- HEADER AREA START -->
                @include('Tienda.layout.partials.header')
            <!-- HEADER AREA END -->

            <!-- Contenido Principal -->
                @yield("contenido")
            
            <!-- Fin contenido Principal -->

           <!-- FOOTER -->
                @include('Tienda.layout.partials.footer')
           <!-- FOOTER END -->
           <!-- Modal Producto -->
                @include('Tienda.layout.partials.VistaRapida')
            <!-- Modal Producto -->
        </div>
        <!-- Cuerpo -->

        <!-- Script De abajo -->

            @include('Tienda.layout.partials.bottomScript')


    </body>
</html>
