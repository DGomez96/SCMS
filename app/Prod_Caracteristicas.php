<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prod_Caracteristicas extends Model
{
    //tabla
    protected $table = 'caracteristicas__productC';



    //Relaciones

    public function caracteristicas(){
        return $this->hasMany(caracteristicas__contenido::class,'id_caracteristica');
    }
}
