<?php

use Illuminate\Database\Seeder;
use App\Caracteristicas;
use App\caracteristicas__contenido;
class caracteristicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $colores = ['Rojo','Amarillo','Verde','Marron','Negro','Blanco','Violeta','Rosa','Azul'];
        //Tabla Caracteristicas

        Caracteristicas::create([
            'name'=> 'color'
        ]);
        
        Caracteristicas::create([
            'name'=> 'size'
        ]);

        foreach($colores as $color){
            caracteristicas__contenido::create([
                'contenido_caracteristica' => $color,
                'id_caracteristica' => 1
            ]);
        }

        caracteristicas__contenido::create([
            'contenido_caracteristica' => '64',
            'id_caracteristica' => 2
        ]);
        
        caracteristicas__contenido::create([
            'contenido_caracteristica' => '128',
            'id_caracteristica' => 2
        ]);

        
        caracteristicas__contenido::create([
            'contenido_caracteristica' => '512',
            'id_caracteristica' => 2
        ]);
    }
}
