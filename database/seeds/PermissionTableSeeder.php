<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permisos

        //Paneles

        //Administración
        
        Permission::create([
            'name' => 'Ver Index',
            'slug' => 'PanelA.index',
            'description' => 'Acceso a index',
        ]);

        Permission::create([
            'name' => 'Ver Productos',
            'slug' => 'PanelA.productos',
            'description' => 'Acceso a Productos y Chat',
        ]);
        
        Permission::create([
            'name' => 'Ver Clientes',
            'slug' => 'PanelA.clientes',
            'description' => 'Acceso a Clientes',
        ]);

        Permission::create([
            'name' => 'Acceso Chat',
            'slug' => 'PanelA.chat',
            'description' => 'Acceso Chat',
        ]);

        Permission::create([
            'name' => 'Acceso a nueva Factura',
            'slug' => 'PanelA.factura',
            'description' => 'Acceso a crear Factura',
        ]);
        //Web



        
        //Roles

         //Admin
         Role::create([
            'name' => 'Administrador',
            'slug' => 'admin',
            'special' => 'all-access'
        ]);

        //Usuario Suspendido
        Role::create([
            'name' => 'Suspendido',
            'slug' => 'suspended',
            'description' => 'Usuario Suspendido',
            'special' => 'no-access'
        ]);

        //Gestor
        $gestor = Role::create([
            'name' => 'Gestor',
            'slug' => 'gestoria',
            'description' => 'Acceso a Facturas y Chat',
        ]);
        //Permisos de Gestor

        //Comercial
        $comercial = Role::create([
            'name' => 'Comercial',
            'slug' => 'comercial',
            'description' => 'Crear Facturas , Acceder a información del producto',
        ]);
        //Permisos de Comercial

        //Usuario Tienda
        $TUser = Role::create([
            'name' => 'Cliente de Web',
            'slug' => 'tiendaWeb',
            'description' => 'Usuario normal de la Tienda',
        ]);

        //Usuario de Tienda
        
    }
}
