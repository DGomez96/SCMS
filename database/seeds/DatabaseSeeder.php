<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(DocumentTypeSeeder::class);
        //$this->call(UsersTableSeeder::class);
        //$this->call(BrandSeeder::class);

        
        //$this->call(caracteristicasSeeder::class);
        //$this->call(CanonsSeeder::class);
        
    }
}
