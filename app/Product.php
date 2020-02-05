<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Tabla



    //Relaciones

    //Caracteristicas 
    public function conjunto_caracteristicas(){
        return $this->hasMany(Prod_Caracteristicas::class,'id_product');
    }

    //Subcategorias
    public function subcategory(){
        return $this->belongsTo(SubCategorias::class,'category_id');
    }

    //Marca
    public function marca(){
        return $this->belongsTo(Marcas::class,'brand_id');
    }
}


