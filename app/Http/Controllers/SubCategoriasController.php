<?php

namespace App\Http\Controllers;

use App\SubCategorias;
use Illuminate\Http\Request;

class SubCategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
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
        $peticion =  $request->except(['_token']);
        
        $id = $peticion["id"];
        $subcategorias = explode(",",$peticion["name"]);
        
        foreach($subcategorias as $subcategoria ){
            SubCategorias::INSERT([
                'name' => $subcategoria,
                'id_category' => $id
            ]);
        }
        return redirect('/panelAdministrador/Categorias');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategorias  $subCategorias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        //
        SubCategorias::destroy($id);

        return  redirect('/panelAdministrador/Categorias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategorias  $subCategorias
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategorias $subCategorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategorias  $subCategorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategorias $subCategorias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategorias  $subCategorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
