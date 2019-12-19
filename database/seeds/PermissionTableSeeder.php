<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Liste des permissions
        $permissions = ['view_users', 'add_users', 'edit_users', 'delete_users', 'view_roles', 'add_roles', 'edit_roles', 'delete_roles'];
        /*$permissions = ['view_posts', 'add_posts', 'edit_posts', 'delete_posts',];*/
        //Boucle sur la liste des permissions
        foreach ($permissions as $permission) {

            //Creation de chaque permission
            Permission::create(['name' => $permission]);

        }
    }
}
