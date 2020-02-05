<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Rutas de Web 

//Get
Route::get('/', 'vistasTienda@index')->name('indice');
Route::get('/faq','vistasTienda@faq');
Route::get('/miCuenta','vistasTienda@miCuenta');
Route::get('/logeo','vistasTienda@login');
Route::get('/sigin','vistasTienda@sigin')->name('sigin');
Route::get('/Tienda','vistasTienda@shop')->name('Tienda');
//Autentificaciones
Auth::routes();

//Rutas de Paneles

//Rutas de Paneles de Tiendas


//Middlewares
Route::middleware(['auth'])->group(function(){

    //Rutas Paneles

    //Administrador

    //Indice
    Route::get('/panelAdministrador/','panelA@index')
        ->name('/panelAdministrador/index')
        ->middleware('permission:PanelA.index');
    //Clientes

    //Chat

    //Ver Chat
    Route::get('/panelAdministrador/Chat','panelA@chat')
        ->name('/panelAdministrador/Chat')
        ->middleware('permission:PanelA.chat');
    
    Route::get('/panelAdministrador/send','panelA@send')
        ->name('/panelAdministrador/send')
        ->middleware('permission:PanelA.chat');
    //Facturas
    //Nueva Factura
    Route::get('/panelAdministrador/nuevaFactura','panelA@factura')
        ->name('/panelAdministrador/nuevaFactura')
        ->middleware('permission:PanelA.factura');

    //RUTAS DE FUNCIONES 

    //EXPORT HACIENDO CATALOGO PDF
    Route::get('/panelAdministrador/downloadCatalogo','ProductController@exportPDF')->name('/panelAdministrador/downloadCatalogo');

    //EXPORT EXCEL
    Route::get('/panelAdministrador/downloadCatalogoEX','ProductController@exportEXCEL')->name('/panelAdministrador/downloadCatalogoEX');

    //IMPORT EXCEL 
    Route::POST('/panelAdministrador/importCatalogo','ProductController@importEXCEL')->name('/panelAdministrador/importCatalogo');
    Route::get('/panelAdministrador/editarExcel','ProductController@editExcel')->name('/panelAdministrador/editarExcel');

    //Asincronas

    //Peticion de SubCategorias

    //Resource
   
    //Productos
    Route::resource('/panelAdministrador/Productos', 'ProductController');
    
    //Clientes
    Route::resource('/panelAdministrador/Clientes','ClientsController');
    
    //Categorias
    Route::resource('/panelAdministrador/Categorias','CategoriaController');
    
    //SubCategorias
    Route::resource('/panelAdministrador/SubCategorias', 'SubCategoriasController');
    
    //Canones
    Route::resource('/panelAdministrador/Canon','CanonController');
    
    //SubCategorias Canones
    Route::resource('/panelAdministrador/Canon/SubCanones', 'CanonsSubcategoriasController');
    
    //Facturas
    Route::resource('/panelAdministrador/Facturas','InvoicesController');
    //url prubas

});

//Api Rest 

Route::get('/api/getCategorias','ApiController@getCategorias');
Route::get('/api/getSub','ApiController@getSub');