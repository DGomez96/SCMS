<?php

namespace App\Http\Controllers;

use App\canons__subCategorias;
use Illuminate\Http\Request;
use App\Categoria;
use App\SubCategorias;

class ApiController extends Controller
{
    //


    //Retorna todas las Categorias
    function getCategorias(){
        return Categoria::all();
    }

    //Retornar todas las SubCategorias
    function getSub(){
        return SubCategorias::all();
    }

    
}
