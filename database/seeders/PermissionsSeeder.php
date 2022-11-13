<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit meals']);
        Permission::create(['name' => 'delete meals']);
        Permission::create(['name' => 'publish meals']);
        Permission::create(['name' => 'unpublish meals']);

        // create roles and assign existing permissions
        $chefRole = Role::create(['name' => 'chef']);
        $chefRole->givePermissionTo('edit meals');
        $chefRole->givePermissionTo('delete meals');
        $chefRole->givePermissionTo('publish meals');
        $chefRole->givePermissionTo('unpublish meals');
    }
}
