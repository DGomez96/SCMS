<?php

use Illuminate\Database\Seeder;
use App\DocumentType;
class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Certificado Vendedor
        DocumentType::create([
            'name' => 'certificado-vendedor',
            'path' => '/DOCUMENTS/PDF/'
        ]);
        //Iae
        DocumentType::create([
            'name' => 'iae',
            'path' => '/DOCUMENTS/PDF/'
        ]);
        //PDF
        DocumentType::create([
            'name' => 'PDF',
            'path' => '/DOCUMENTS/PDF/'
        ]);
        //EXCEL
        DocumentType::create([
            'name' => 'EXCEL',
            'path' => '/DOCUMENTS/EXCEL/'
        ]);
        //IMG

        //Profile
        DocumentType::create([
            'name' => 'IMG',
            'path' => '/DOCUMENTS/IMG/'
        ]);

        

    }
}
