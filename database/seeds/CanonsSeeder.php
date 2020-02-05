<?php

use Illuminate\Database\Seeder;
use App\Canon;
use App\canons__subCategorias;
use App\SubCategorias;
use Carbon\Carbon;
class CanonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subcategorias = SubCategorias::get();
        $array_canones = [
        ['name' => 'Canon digital (disco externo)', 'tipo' => 'Fijo','impuesto' => 6.45,'status' => 1],
        ['name' =>'Canon digital (impresoras)', 'tipo' => 'Fijo','impuesto' => 5.25,'status' =>	1],	
        ['name' =>'Canon digital (móviles)', 'tipo' => 'Fijo','impuesto' => 1.1,'status' =>	1],	
        ['name' =>'Canon digital (ordenadores)', 'tipo' => 'Fijo','impuesto' => 5.45,'status' =>	1],	
        ['name' =>'Canon digital (pendrive)', 'tipo' => 'Fijo','impuesto' => 0.24,'status' =>	1	],
        ['name' =>'Canon digital (tablets)', 'tipo' => 'Fijo','impuesto' => 3.15,'status' =>	1	],
        ['name' =>'I.V.A.', 'tipo' => 'Porcentaje','impuesto' => 21,	'status' =>1	],
        ['name' =>'R.E.', 'tipo' => 'Porcentaje','impuesto' => 5.2,	'status' =>1	]];

        foreach($array_canones as $canon){
            Canon::create([
                'name' =>    $canon['name'],
                'tipo' =>    $canon['tipo'],
                'impuesto' =>    $canon['impuesto'],
                'status' =>    $canon['status']

            ]);
        }

        canons__subCategorias::create([
            'id_subCategories' => 33,
            'id_canon' => 1,
        ]);
        canons__subCategorias::create([
            'id_subCategories' => 36,
            'id_canon' => 2
        ]);
        canons__subCategorias::create([
            'id_subCategories' => 1,
            'id_canon' => 3
        ]);
        canons__subCategorias::create([
            'id_subCategories' => 3,
            'id_canon' => 3
        ]);

        canons__subCategorias::create([
            'id_subCategories' => 21,
            'id_canon' => 4
        ]);

        canons__subCategorias::create([
            'id_subCategories' => 22,
            'id_canon' => 4
        ]);

        canons__subCategorias::create([
            'id_subCategories' => 35,
            'id_canon' => 5
        ]);

        canons__subCategorias::create([
            'id_subCategories' => 12,
            'id_canon' => 5
        ]);

        canons__subCategorias::create([
            'id_subCategories' => 2,
            'id_canon' => 6
        ]);

        foreach($subcategorias as $subCategoria){
            canons__subCategorias::create([
                'id_subCategories' => $subCategoria['id'],
                'id_canon'  => 7,
            ]);
            canons__subCategorias::create([
                'id_subCategories' => $subCategoria['id'],
                'id_canon'  => 8,
            ]);
        }

    }
}
