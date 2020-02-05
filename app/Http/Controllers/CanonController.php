<?php

namespace App\Http\Controllers;

use App\Canon;
use App\SubCategorias;
use App\canons__subCategorias;
use Illuminate\Http\Request;

use Carbon\Carbon;

class CanonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subCategorias = SubCategorias::get();
        $canones = Canon::get();
        $canon_sub = canons__subCategorias::get();
        return view('Panel-Admin.Canon.index')
        ->with('subCategorias',$subCategorias)
        ->with('canones',$canones)
        ->with('canon_sub',$canon_sub);
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
        
        $canon =  $request->except(['_token','id_subCategory']);

        $idSub =  $request->except(['_token','tipo','status','name']);

        //Comprobando si el Estatus estaba disponible o no
        if(isset($canon['status'])){
            $canon['status'] = 1;
        }else{
            $canon['status'] = 0;
        }
        
        $canon['created_at'] =  Carbon::now()->toDateTimeString();
        $canon['updated_at'] =  Carbon::now()->toDateTimeString();

        //Inserto el Producto
        Canon::INSERT($canon);

        //Insertando Subcategorias Asociadas
        list($id_cat) = explode("-", $idSub['id_subCategory']);

        $idSub['id_subCategory'] = $id_cat;
        $last_canon = Canon::all()->last()['id'];
        $canon_subcategoria = ['id_subCategory' => $idSub['id_subCategory'],'id_canon'=>$last_canon];
        canons__subCategorias::INSERT($canon_subcategoria);
        return $this->index();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Canon  $canon
     * @return \Illuminate\Http\Response
     */
    public function show(Canon $canon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Canon  $canon
     * @return \Illuminate\Http\Response
     */
    public function edit(Canon $canon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Canon  $canon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $canon = $request->except(['_method','_token','id_subCategory','id']);
        $id = $request->input('id');

        if ($canon['status'] == 'on'){
            $canon['status'] = 1;
        }else{
            $canon['status'] = 0;
        }

        Canon::where('id','=',$id)->update($canon);

        return redirect('/panelAdministrador/Canon');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Canon  $canon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Canon::destroy($id);
        return  redirect('/panelAdministrador/Canon');
    }
}
