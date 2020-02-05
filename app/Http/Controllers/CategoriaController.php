<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\SubCategorias;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoria = Categoria::all();
        $sub_Categorias = SubCategorias::all();
        $contador = 0;
        return view('Panel-Admin.Category.index')
                ->with('categorias',$categoria)
                ->with('subcategory',$sub_Categorias)
                ->with('contador',$contador);
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
        $categoria = $request->except(['_token','sub_cat']);
        $sub_Categorias = $request->except(['_token','category_name']);

        Categoria::INSERT($categoria);

        $allCategorias = Categoria::all();
        $id_categoria = $allCategorias->last()['id'];

        $subCategoriasArray = explode(",",$sub_Categorias['sub_cat']);

        foreach($subCategoriasArray as $categoria){
            $preparada = ['name' =>  $categoria,'id_category' => $id_categoria] ;
            SubCategorias::INSERT($preparada);
            
        };

        return $this->index();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Recogiendo nombre de categorias
        $nombreCategoria = $request->category_name;

        //La categoría ya editada
        $categoriaEditada = ['category_name' => $nombreCategoria];

        //Las Subcategorias que recibo
        $subcategorias_Recibida = explode(',',$request->subcategorias);
        
        //La id De estas subcategorias
        $id = explode(',',$request->id);

        //Crivo las ID para que solo quede la unica que hay
        $id = $id[0];

        //Creo un array para crivar el array de todas las subcategorias
        $subcategoriasCrivadas = [];

        Categoria::where('id','=',$id)->update($categoriaEditada);

        $subCategorias_Asociadas = explode("}",$request->sCategorias);
        array_pop($subCategorias_Asociadas);
         
        //Limpiando el String para  tratarlo
        foreach($subCategorias_Asociadas as $indice => $categoria ){

            $subCategorias_Asociadas[$indice] = substr($subCategorias_Asociadas[$indice],1); 

        }


        //Borro la ultima coma
        array_pop($subcategorias_Recibida);

        //Transformo  el array de String [JSON] en un Array asociativo
        foreach($subCategorias_Asociadas as $indice => $subCategoria){
            array_push($subCategorias_Asociadas,json_decode($subCategoria.'}',true));
            unset($subCategorias_Asociadas[$indice]);
        }

        //Relleno el Array Crivado con las categorias Asociadas 
        foreach($subCategorias_Asociadas as $subCategoria){
            
            if ($subCategoria['id_category']  == $id){
                array_push($subcategoriasCrivadas,$subCategoria);
            }
        }

        //Recorremos el Array Crivado y actualizamos cada subcategoria
        foreach($subcategoriasCrivadas as $indice => $elemento){
            //Actualizando todas las subcategorias
            
            //Compruebo que la subcategoria es renombrada y si lo es, machaco el nombre y la actualizo
            if( $id == $subcategoriasCrivadas[$indice]['id_category']){
               
                $subcategoriasCrivadas[$indice]['name'] = $subcategorias_Recibida[$indice] ;
                SubCategorias::where('id','=',$subcategoriasCrivadas[$indice]['id'])->update($subcategoriasCrivadas[$indice]);
            }



        };
 
        return  redirect('/panelAdministrador/Categorias');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Categoria::destroy($id);

        return  redirect('/panelAdministrador/Categorias');
       
    }
}
