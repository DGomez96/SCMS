<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
     //Tabla
    protected $table = 'products__producers';


    //Relaciones
    public function product(){
        return $this->hasMany(Product::class);
    }
}
