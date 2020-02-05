<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //Tabla
    protected $table = 'categories';


    //Relaciones
    public function product(){
        return $this->hasMany(Product::class);
    }
}
