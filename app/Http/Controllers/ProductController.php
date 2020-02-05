<?php

namespace App\Http\Controllers;
//Request
use Illuminate\Http\Request;
//BBDD
use Illuminate\Support\Facades\DB;
//Modelos
use App\Product;
use App\Marcas;
use App\Categoria;
use App\Ofertas;
use App\Etiquetas;
use App\Etiquetas_Product;
use App\Img;
use App\caracteristicas__contenido;
//Librerias 
use Carbon\Carbon;
//PDF
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel as Excel;

use  App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Prod_Caracteristicas;
use App\SubCategorias;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $marcas =  Marcas::get();
        $subCategorias = SubCategorias::get();
        $products = Product::get();
        $imagen = Img::get();
        return view('/Panel-Admin/Products/index')
        ->with('marcas',$marcas)
        ->with('subCategorias',$subCategorias)
        ->with('products',$products)
        ->with('imagen',$imagen);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $producto = $request->except(['_token','tag','offer','vent-hot','colorInput','size','img']);
        $tags = $request->input("tag");
        $offer = $request->input("offer");
        $venthot = $request->input('vent-hot');
        $img = $request->all()['img'];
        $colorInput = $request->input('colorInput');
        $size = $request->input('size');

        $colorInput = explode(',',$colorInput);
        $contenidoCaracteristicas = caracteristicas__contenido::get();
        $size = explode(',',$size);
        
        
        //Comprobando si el Estatus estaba disponible o no
        if(isset($producto['status'])){
            $producto['status'] = 1;
        }else{
            $producto['status'] = 0;

        }
        
        //Cogiendo la Marca y la Categoria
        list($id_cat) = explode("-", $producto['category_id']);
        list($id_brand) = explode("-", $producto['brand_id']);

        //Cogiendo IDS
        
        $producto['category_id'] = $id_cat;
        $producto['brand_id'] = $id_brand;

        //Cogiendo Tiempo Actual
        $producto['created_at'] =  Carbon::now()->toDateTimeString();
        $producto['updated_at'] =  Carbon::now()->toDateTimeString();

        //Inserto el Producto
        Product::INSERT($producto);

        //Cojo el ultimo ID del producto para rellenar las tablas dependientes
        $productos = Product::all();
        $product_id=  $productos->last()['id'];
        
        //Recorriendo y comprobando los colores y tamaños
        foreach($contenidoCaracteristicas as $contenido){
            var_dump($contenido['id']);

            foreach($colorInput as $color){
                if(strtolower($contenido['contenido_caracteristica']) == strtolower($color)){
                    $newCaracteristica = ['id_product' =>$product_id,'id_caracteristica'=>$contenido['id']];
                    Prod_Caracteristicas::INSERT($newCaracteristica);
                }
            }

            foreach($size as $tamano){
                if(intval($contenido['contenido_caracteristica']) == intval($tamano)){
                    $newCaracteristica = ['id_product' =>$product_id,'id_caracteristica'=>$contenido['id']];
                    Prod_Caracteristicas::INSERT($newCaracteristica);

                }
            }
            
     
        }
        //Imagenes
        if(count($img) != 0 ){
    
            //Recorremos las Imagenes y las tratamos
            for($i =0; $i < count($img); $i++ ){

                //URl
                $imgPath  = $request->file('img')[$i]->store('uploads','public');
            
                $imgPreparada = [
                    'img' => $imgPath,
                    'id_product' => $product_id,
                    'created_at' =>  Carbon::now()->toDateTimeString() , 
                    'updated_at' =>  Carbon::now()->toDateTimeString()
                ];

                
                Img::INSERT($imgPreparada);
            }

        }
        //Releleno Oferta con las variantes del Si, que podríamos haber recibido
        IF ($offer == "Si" OR $offer == "SI" OR $offer =="si"){

            //Inserto la Oferta
            $oferta =[
                'id_product' => $product_id, 
                'Tiempo_Oferta' => $venthot,
                'created_at' =>  Carbon::now()->toDateTimeString(),
                'updated_at' =>  Carbon::now()->toDateTimeString()];
            Ofertas::INSERT($oferta);

        }



        //Comprobamos que las etiqutas no es nula, si no lo es, se añadira a sus dos correspondientes tablas
        IF($tags != null){
        
            $tags = explode(",",$tags);
            
            foreach($tags as $tag){
                $tag = [
                    'name' =>  $tag,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' =>Carbon::now()->toDateTimeString()
                    ] ;
                Etiquetas::INSERT($tag);
                $last_Etiqueta = Etiquetas::all();
                $last_Etiqueta = $last_Etiqueta->last()['id'];
                $etiquetas_Productos = [
                    'id_etiquetas'=> $last_Etiqueta  , 
                    'id_product' => $product_id,
                    
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' =>  Carbon::now()->toDateTimeString()
                ];
                Etiquetas_Product::INSERT($etiquetas_Productos);
            };
        }


        $marcas =  Marcas::get();
        $categorias = Categoria::get();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marcas =  Marcas::get();
        $subCategorias = SubCategorias::get();
        $producto = Product::findOrFail($id);
        $img = Img::where('id_product',$id)->get();
        $tag_p = Etiquetas_Product::where('id_product', $id)->get('id_etiquetas');
        $etiquetas = [];
        $texto = "";
        $offer = Ofertas::where('id_product',$id)->get('Tiempo_Oferta');



        foreach($tag_p as $tag){

            array_push($etiquetas, Etiquetas::where('id',$tag['id_etiquetas'])->get('name'));

        }
        foreach($etiquetas as $etiqueta){
            $texto = $texto . $etiqueta[0]['name'].',';
        }

        if(count($offer) == 0){
            $offer = "No";
        };

        return view('/Panel-Admin/Products/edit')
            ->with('marcas',$marcas)
            ->with('subCategorias',$subCategorias)
            ->with('producto',$producto)
            ->with('imagenes',$img)
            ->with('etiquetas', $texto)
            ->with('offer',$offer)
            ->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //Array Datos
        $array_datos = explode('-',$id);

        if($array_datos[0] == 'activo'){
            
            DB::update('update products set status = 1 where id = ?', [$array_datos[1]]);
            return "Dato actualizado a activo";
        }else{
            DB::update('update products set status = 0 where id = ?', [$array_datos[1]]);
            return "Dato actualizado a inactivo";
        }
    }

    


    //Funciones extraResource
    
    //Exportar Pdf
    public function exportPDF(){
        //
        $product =  Product::get();
        $pdf = PDF::loadView('Panel-Admin.pdf.pdf_product',compact('product'));

        return $pdf->download('Guia_productos.pdf');
        
    }
    //Exportar EXCEL
    public function exportEXCEL(){

        return Excel::download(new ProductExport , 'product-list.xlsx');

    }
    //Import Excel
    public function ImportExcel(Request $request){

        //Leo el Archivo
        $productos = (new ProductImport)->toArray($request->file('excelFile'));
        
        //Cojo las cabeceras
        $cabeceraExcel = array_keys($productos[0][0]);

        //Crivo todos los datos del excel en este array y tengo como resultado un array asociativo 
        $productos =  $productos[0];
        
        //Hago un array con las caracteristicas de los productos
        $caracteristicas = [ 'Nombre','Descripcion','Descripcion Corta','Precio de Venta','Canon','SubCategoria','Sku','Peso','EAN','stock','Marca'];

    
        return view('Panel-Admin.Media.excel.editExcel')
                ->with('cabecera',$cabeceraExcel)
                ->with('productos',$productos)
                ->with('caracteristicas',$caracteristicas);
        
    }

}
