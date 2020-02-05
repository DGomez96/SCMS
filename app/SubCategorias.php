<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategorias extends Model
{
    //Tabla
    protected $table = 'categories__subCategories';


    //Un canon  puede estar asignado  a varias Subcategorias
 
    //Subcategorias
    public function canon(){
        return $this->hasMany(canons__subCategorias::class,'id_subCategory');
    }
}
