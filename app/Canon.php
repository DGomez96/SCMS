<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canon extends Model
{
    //Tabla
    protected $table = 'canons';

    //Caracteristicas 

    //Un canon puede tener muchas Subcategorias
    public function canonSubcategoria(){
        return $this->hasMany(canons__subCategorias::class,'id_canon');
    }
}
