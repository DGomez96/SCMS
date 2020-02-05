<?php

namespace App\Http\Controllers;

use App\canons__subCategorias;
use Illuminate\Http\Request;

class CanonsSubCategoriasController extends Controller
{

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
        $idCanon = $request->input('idCanon');
        $subCategorias = $request->except(['_token','idCanon']);

        $sub = [];
        foreach($subCategorias as $subcategoria){
            $asociacion = [
                'id_subCategory' => $subcategoria,
                'id_canon' => $idCanon
            ];

            canons__subCategorias::INSERT($asociacion);
        }

        return  redirect('/panelAdministrador/Canon');
    }

    /**
     * Uso Show como borrar.
     *
     * @param  \App\canons__subCategorias  $canons__subCategorias
     * @return \Illuminate\Http\Response
     * 
     */
    public function show(Request $request,$id)
    {
        //
        canons__subCategorias::destroy($id);
        
        return  redirect('/panelAdministrador/Canon');
    }

}
