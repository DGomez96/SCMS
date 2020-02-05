<?php

use Illuminate\Database\Seeder;
use App\SubCategorias;
class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subCategoria_Movilidad = [      
            'SMARTPHONES','TABLETS','TELEFONOS SENIOR','TELEFONOS FIJOS','WEARABLES','CRISTALES TEMPLADOS','FUNDAS',
            'CARGADORES','POWERBANK','SELFIE','REALIDAD VIRTUAL','TARJETAS DE MEMORIA','CABLES','GPS','MAQUETAS','Seminuevo',
            'MANOS LIBRES','AURICULAR','BATERIAS','SOPORTES'
        ];
    
        $subCategoria_Ordenadores = ['PC SOBREMESA','PORTATILES','ACCESORIOS PORTATILES','SERVIDORES','PC KM0','SOFTWARE','BAREBONES','SAI/UPS'];

        $subCategoria_Perifericos = [
            'ALTAVOCES PC','MONITORES','TECLADOS','RATONES','DISCO DURO EXTERNO','AURICULARES','PENDRIVE','IMPRESORAS',
            'CONSUMIBLES IMPRESORAS','SONIDO PC','TABLETA DIGITAL','HERRAMIENTAS'];

        $subCategoria_componentes = [
            'COMPONENTES PC',
            'TPV',
            'IMPRESORAS TPV',
            'ACCESORIOS TPV',
            'SEGURIDAD PC',
            'LECTOR CODIGO BARRA',
            'PDA'
        ];

        $subCategoria_Conectividad = [
            'CABLEADO',
            'REDES',
            'VIDEOVIGILANCIA',
            'SWITCH',
            'INTRUSIÓN'
        ];

        $subCategoria_ImagenySonido = [
            'AUDIO / ALTAVOCES',
            'TELEVISORES',
            'ACCESORIOS TV',
            'FOTOGRAFIA',
            'ACCESORIOS FOTOGRAFIA',
            'VIDEO',
            'PROYECCION',
            'PIZARRA INTERACTIVA'
        ];

        $subCategoria_gaming = [
            'PERIFERICOS GAMING',
            'SONY PS4',
            'NINTENDO',
            'ACCESORIOS CONSOLAS',
            'XBOX',
            'AURICULARES GAMING',
            'SILLAS GAMING'
        ];

        $subCategoria_deporte = [
            'PATINETES / SCOOTER',
            'DRONES',
            'AUDIO',
            'SONIDO',
            'MALETAS',
            'CAMARAS DEPORTIVAS'
        ];

        $subCategoria_electrohogar = [
            'ILUMINACION',
            'CUIDADO PERSONAL',
            'CONSUMIBLES',
            'HOGAR',
            'OFICINA',
            'ELECTRONICA',
            'BRICOLAJE',
            'MATERIAL ELECTRICO',
            'PAE'
        ];

        $subCategoria_electrogrande = [
            'AIRE ACONDICIONADO',
            'FRIGORIFICO',
            'LAVADORAS',
            'COCINA'
        ];

        foreach ($subCategoria_Movilidad as &$subCategoria) {

            SubCategorias::create([
                'name' => $subCategoria,
                'id_category' => 1
            ]);
        }

        foreach ($subCategoria_Ordenadores as &$subCategoria) {

            SubCategorias::create([
                'name' => $subCategoria,
                'id_category' => 2
            ]);
        }

        foreach ($subCategoria_Perifericos as &$subCategoria) {

            SubCategorias::create([
                'name' => $subCategoria,
                'id_category' => 3
            ]);
        }

        foreach ($subCategoria_componentes as &$subCategoria) {

            SubCategorias::create([
                'name' => $subCategoria,
                'id_category' => 4
            ]);
        }

        foreach ($subCategoria_Conectividad as &$subCategoria) {

            SubCategorias::create([
                'name' => $subCategoria,
                'id_category' => 5
            ]);
        }

        foreach ($subCategoria_ImagenySonido as &$subCategoria) {

            SubCategorias::create([
                'name' => $subCategoria,
                'id_category' => 6
            ]);
        }

        foreach ($subCategoria_gaming as &$subCategoria) {

            SubCategorias::create([
                'name' => $subCategoria,
                'id_category' => 7
            ]);
        }

        foreach ($subCategoria_deporte as &$subCategoria) {

            SubCategorias::create([
                'name' => $subCategoria,
                'id_category' => 8
            ]);
        }

        foreach ($subCategoria_electrohogar as &$subCategoria) {

            SubCategorias::create([
                'name' => $subCategoria,
                'id_category' => 9
            ]);
        }

        foreach ($subCategoria_electrogrande as &$subCategoria) {

            SubCategorias::create([
                'name' => $subCategoria,
                'id_category' => 10
            ]);
        }
    }
}